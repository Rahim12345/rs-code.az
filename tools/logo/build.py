# RS Code loqo faylları: python tools/logo/build.py
# Konsepsiya: "Fikirdən məhsula" — S xətti iki nöqtəni birləşdirir (ideya → hazır məhsul)
import pathlib, subprocess, tempfile, io
from PIL import Image

root = pathlib.Path(__file__).resolve().parents[2]
img = root / 'public' / 'img'
chrome = r'C:\Program Files\Google\Chrome\Application\chrome.exe'

GRAD = '<linearGradient id="g" x1="0" y1="0" x2="1" y2="1"><stop offset="0" stop-color="#7c3aed"/><stop offset="1" stop-color="#d946ef"/></linearGradient>'
# İşarə: 64×64 koordinatda S xətti + iki düyün
MARK = ('<path d="M44 17H28a8 8 0 0 0 0 16h8a8 8 0 0 1 0 16H20" fill="none" stroke="#fff" stroke-width="5" stroke-linecap="round"/>'
        '<circle cx="44" cy="17" r="5" fill="#22d3ee"/><circle cx="20" cy="49" r="5" fill="#fff"/>')
FONT = '<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@700&display=swap" rel="stylesheet">'


def icon_svg(shape):
    bg = '<circle cx="32" cy="32" r="32" fill="url(#g)"/>' if shape == 'circle' else '<rect width="64" height="64" fill="url(#g)"/>'
    return f'<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64"><defs>{GRAD}</defs>{bg}{MARK}</svg>'


def render(html, w, h, transparent=True):
    with tempfile.TemporaryDirectory() as d:
        p = pathlib.Path(d) / 'p.html'
        p.write_text(f'<!doctype html><html><head><meta charset="utf-8">{FONT}<style>*{{margin:0}}html,body{{background:transparent}}</style></head><body>{html}</body></html>', encoding='utf-8')
        out = pathlib.Path(d) / 'o.png'
        args = [chrome, '--headless=new', '--disable-gpu', '--hide-scrollbars', '--virtual-time-budget=4000',
                f'--window-size={w},{h}', f'--screenshot={out}']
        if transparent:
            args.append('--default-background-color=00000000')
        subprocess.run(args + [p.as_uri()], capture_output=True)
        return Image.open(io.BytesIO(out.read_bytes())).convert('RGBA')


def wordmark(rs_color):
    # 3x ölçüdə çəkilir, sonra boşluqlar kəsilir
    html = (f'<div style="display:flex;align-items:center;gap:36px;padding:30px;font-family:\'Space Grotesk\',sans-serif">'
            f'<div style="width:192px;height:192px">{icon_svg("circle")}</div>'
            f'<div style="font-size:150px;font-weight:700;letter-spacing:-4px;line-height:1;color:{rs_color}">RS '
            f'<span style="background:linear-gradient(90deg,#8b5cf6,#d946ef);-webkit-background-clip:text;color:transparent">Code</span></div></div>')
    im = render(html, 1300, 260)
    return im.crop(im.getbbox())


# Header/footer wordmark: tünd və açıq rejim
for name, color in [('rs-code.png', '#ffffff'), ('rs-code-light.png', '#18181b')]:
    wm = wordmark(color)
    wm.save(img / name, optimize=True)
    print(name, wm.size)

# İkonlar
circle = render(f'<div style="width:512px;height:512px">{icon_svg("circle")}</div>', 512, 512)
square = render(f'<div style="width:512px;height:512px">{icon_svg("square")}</div>', 512, 512, transparent=False)
# Maskable: işarə təhlükəsiz zonada (80%) qalsın — dairə yox, tam kvadrat fon
safe = render(f'<div style="width:512px;height:512px;background:linear-gradient(135deg,#7c3aed,#d946ef);display:flex;align-items:center;justify-content:center">'
              f'<svg viewBox="8 8 48 48" width="330" height="330">{MARK}</svg></div>', 512, 512, transparent=False)

circle.resize((144, 144), Image.LANCZOS).save(img / '132.png', optimize=True)
safe.resize((192, 192), Image.LANCZOS).save(img / 'icon-192.png', optimize=True)
safe.resize((512, 512), Image.LANCZOS).save(img / 'icon-512.png', optimize=True)
safe.convert('RGB').resize((180, 180), Image.LANCZOS).save(img / 'apple-touch-icon.png', optimize=True)
circle.save(root / 'public' / 'favicon.ico', sizes=[(16, 16), (32, 32), (48, 48)])
print('icons ok')

# Sosial paylaşım şəkli 1200×630
og = render(f'''<div style="width:1200px;height:630px;position:relative;overflow:hidden;font-family:'Space Grotesk',sans-serif;
 background:radial-gradient(circle at 80% 15%,#7c3aed55 0,transparent 45%),radial-gradient(circle at 10% 90%,#d946ef33 0,transparent 40%),linear-gradient(135deg,#09090b,#18122b 60%,#0b0b12)">
 <div style="position:absolute;inset:0;background-image:linear-gradient(rgba(255,255,255,.04) 1px,transparent 1px),linear-gradient(90deg,rgba(255,255,255,.04) 1px,transparent 1px);background-size:48px 48px"></div>
 <div style="position:absolute;left:90px;top:170px;display:flex;align-items:center;gap:40px">
  <div style="width:200px;height:200px">{icon_svg("circle")}</div>
  <div><div style="font-size:120px;font-weight:700;letter-spacing:-3px;line-height:1;color:#fff">RS <span style="background:linear-gradient(90deg,#8b5cf6,#d946ef);-webkit-background-clip:text;color:transparent">Code</span></div>
  <div style="margin-top:18px;font-size:34px;color:#a1a1aa">Fikirdən hazır məhsula</div></div></div>
 <div style="position:absolute;left:90px;bottom:70px;font-size:24px;color:#d4d4d8;letter-spacing:.5px">Veb sayt · Proqram təminatı · Mobil tətbiq · SEO</div>
 <div style="position:absolute;right:90px;bottom:70px;font-size:24px;color:#22d3ee;font-weight:700">rs-code.az</div>
</div>''', 1200, 630, transparent=False)
og.convert('RGB').save(img / 'og-default.jpg', quality=88, optimize=True)
print('og ok')
