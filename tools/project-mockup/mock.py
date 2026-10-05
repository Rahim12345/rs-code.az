import pathlib, subprocess, tempfile
from PIL import Image

out = pathlib.Path(r'C:\laragon\www\rs-code\public\images\projects')
chrome = r'C:\Program Files\Google\Chrome\Application\chrome.exe'

# İstifadə: python tools/project-mockup/mock.py tools/project-mockup/data/<slug>.json
# JSON: {"slug": "...", "name": "...", "url": "domen və ya ad", "accent": "#hex", "src": "<src qovluğu adı>",
#        "desktop": ["home", ...], "mobile": ["m_home", ...]}
# Mənbə PNG-lər: tools/project-mockup/src/<src>/<ad>.png ; nəticə: public/images/projects/<slug>-cover.jpg, -mockup-2.jpg
import json, sys
cfg = json.loads(pathlib.Path(sys.argv[1]).read_text(encoding='utf-8'))
P = {cfg['slug']: (cfg['name'], cfg['url'], cfg['accent'], cfg['desktop'], cfg.get('mobile', []))}
SRC = {cfg['slug']: cfg['src']}
here = pathlib.Path(__file__).parent / 'src'
CSS = '''*{margin:0;padding:0;box-sizing:border-box}
body{width:1920px;height:1080px;overflow:hidden;font-family:Arial,Helvetica,sans-serif;position:relative;
 background:radial-gradient(circle at 78% 22%,ACC55 0,transparent 38%),radial-gradient(circle at 12% 88%,#6d28d955 0,transparent 35%),linear-gradient(135deg,#09090b,#18122b 55%,#0b0b12)}
.grid{position:absolute;inset:0;background-image:linear-gradient(rgba(255,255,255,.035) 1px,transparent 1px),linear-gradient(90deg,rgba(255,255,255,.035) 1px,transparent 1px);background-size:48px 48px}
.win{position:absolute;border-radius:14px;overflow:hidden;background:#111;box-shadow:0 40px 90px rgba(0,0,0,.65),0 0 0 1px rgba(255,255,255,.08)}
.bar{height:34px;background:#1c1c22;display:flex;align-items:center;gap:8px;padding:0 14px}
.bar i{width:11px;height:11px;border-radius:50%} .url{margin-left:14px;flex:1;max-width:340px;height:20px;border-radius:10px;background:#0c0c10;color:#a1a1aa;font:12px monospace;line-height:20px;padding-left:12px}
.shot{background-size:100% auto;background-repeat:no-repeat;background-position:top center}
.phone{position:absolute;border-radius:46px;background:#0a0a0a;padding:12px;box-shadow:0 40px 90px rgba(0,0,0,.7),0 0 0 2px #2a2a30}
.phone .shot{width:100%;height:100%;border-radius:36px}
.notch{position:absolute;top:22px;left:50%;transform:translateX(-50%);width:110px;height:28px;border-radius:14px;background:#0a0a0a;z-index:2}
.label{position:absolute;left:80px;bottom:70px;color:#fff}
.label b{display:block;font-size:44px;font-weight:800;letter-spacing:-.5px}
.label span{display:inline-block;margin-top:10px;font-size:15px;color:ACC;border:1px solid ACC88;border-radius:20px;padding:6px 16px}
.brand{position:absolute;right:70px;top:48px;color:#a1a1aa;font-size:14px;letter-spacing:2px}
.brand em{font-style:normal;color:#fff;font-weight:800}'''

def win(x, y, w, h, img, url, rot=0, z=1):
    return (f'<div class="win" style="left:{x}px;top:{y}px;width:{w}px;height:{h}px;transform:rotate({rot}deg);z-index:{z}">'
            f'<div class="bar"><i style="background:#f87171"></i><i style="background:#fbbf24"></i><i style="background:#4ade80"></i><div class="url">{url}</div></div>'
            f'<div class="shot" style="height:{h - 34}px;background-image:url({img})"></div></div>')

def phone(x, y, w, h, img, rot=0, z=3, pos='top'):
    return (f'<div class="phone" style="left:{x}px;top:{y}px;width:{w}px;height:{h}px;transform:rotate({rot}deg);z-index:{z}"><div class="notch"></div>'
            f'<div class="shot" style="background-image:url({img});background-position:center {pos}"></div></div>')

def page(body, name, dom, acc, tag):
    css = CSS.replace('ACC', acc)
    return (f'<!doctype html><html><head><meta charset="utf-8"><style>{css}</style></head><body><div class="grid"></div>{body}'
            f'<div class="label"><b>{name}</b><span>{tag}</span></div><div class="brand">DESIGN &amp; DEV BY <em>RS CODE</em></div></body></html>')

def render(html, png):
    f = pathlib.Path(tempfile.gettempdir()) / (png.stem + '.html')
    f.write_text(html, encoding='utf-8')
    subprocess.run([chrome, '--headless=new', '--disable-gpu', '--hide-scrollbars', '--force-device-scale-factor=1',
                    '--window-size=1920,1080', '--virtual-time-budget=8000', f'--screenshot={png}', f.as_uri()], check=True, capture_output=True)
    Image.open(png).convert('RGB').save(png.with_suffix('.jpg'), quality=86, optimize=True, progressive=True)
    png.unlink()

for slug, (name, dom, acc, desk, mob) in P.items():
    src = here / SRC[slug]
    u = lambda n: (src / f'{n}.png').as_uri()
    tag = 'Veb sayt • UI/UX dizayn' + (' • Mobil' if mob else '')

    # Variant A — kompozisiya
    b = ''
    if desk:
        b += win(560, 110, 1180, 740, u(desk[0]), dom, -2, 2)
        if len(desk) > 1:
            b += win(1180, 250, 640, 420, u(desk[1]), dom, 4, 1)
        if mob:
            b += phone(1480, 420, 300, 610, u(mob[0]), 6, 3)
        elif len(desk) > 2:
            b += win(420, 560, 520, 340, u(desk[2]), dom, -6, 3)
    else:
        b += phone(760, 90, 330, 680, u(mob[0]), -8, 2)
        b += phone(1130, 160, 330, 680, u(mob[1]), 6, 3)
        b += phone(1480, 250, 300, 620, u(mob[0]), 12, 1, '40%')
    render(page(b, name, dom, acc, tag), out / f'{slug}-cover.png')

    # Variant B — scroll görünüşü (uzun səhifələr)
    pics = (desk + mob)[:3] if desk else mob + mob[:1]
    b = ''
    xs = [260, 820, 1380]
    for i, n in enumerate(pics[:3]):
        is_m = n in mob
        w = 300 if is_m else 520
        x = xs[i] + (110 if is_m else 0)
        y = 110 + (i % 2) * 60
        if is_m:
            b += phone(x, y, w, 770, u(n), 0, 2, '15%' if i == 2 else 'top')
        else:
            b += win(x, y, w, 780, u(n), dom, 0, 2)
    render(page(b, name, dom, acc, tag), out / f'{slug}-mockup-2.png')
    print(slug, 'ok')
