# RS Code loqo faylları: python tools/logo/build.py
# 2026-10-29: WhatsApp möhürü ilə eyni üslub — tünd yaşıl dairə, gümüşü halqa, ağ "RS", nanə xətt
import pathlib, subprocess, tempfile, io
from PIL import Image

root = pathlib.Path(__file__).resolve().parents[2]
img = root / 'public' / 'img'
chrome = r'C:\Program Files\Google\Chrome\Application\chrome.exe'

GREEN, DEEP, SILVER, MINT = '#0B3B2E', '#06231B', '#D9E4DF', '#34D399'
GRAD = f'<radialGradient id="g" cx="50%" cy="35%" r="70%"><stop offset="0" stop-color="#0F4A3A"/><stop offset="1" stop-color="{GREEN}"/></radialGradient>'
# İşarə: 64×64 koordinatda halqa + "RS" + nanə xətt
MARK = (f'<circle cx="32" cy="32" r="26.5" fill="none" stroke="{SILVER}" stroke-width="1.3" stroke-opacity=".85"/>'
        f'<text x="32" y="37.5" text-anchor="middle" font-family="Montserrat" font-weight="800" font-size="21" letter-spacing="-.4" fill="#fff">RS</text>'
        f'<rect x="24" y="42" width="16" height="2.2" rx="1.1" fill="{MINT}"/>')
FONT = '<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;800&family=Inter:wght@500;600&display=swap" rel="stylesheet">'


def icon_svg(shape):
    bg = '<circle cx="32" cy="32" r="32" fill="url(#g)"/>' if shape == 'circle' else '<rect width="64" height="64" fill="url(#g)"/>'
    return f'<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64"><defs>{GRAD}</defs>{bg}{MARK}</svg>'


def render(html, w, h, transparent=True):
    with tempfile.TemporaryDirectory() as d:
        p = pathlib.Path(d) / 'p.html'
        p.write_text(f'<!doctype html><html><head><meta charset="utf-8">{FONT}<style>*{{margin:0}}html,body{{background:transparent}}</style></head><body>{html}</body></html>', encoding='utf-8')
        out = pathlib.Path(d) / 'o.png'
        args = [chrome, '--headless=new', '--disable-gpu', '--hide-scrollbars', '--virtual-time-budget=7000',
                f'--window-size={w},{h}', f'--screenshot={out}']
        if transparent:
            args.append('--default-background-color=00000000')
        subprocess.run(args + [p.as_uri()], capture_output=True)
        return Image.open(io.BytesIO(out.read_bytes())).convert('RGBA')


def wordmark(rs_color, code_color=MINT):
    # 3x ölçüdə çəkilir, sonra boşluqlar kəsilir
    html = (f'<div style="display:flex;align-items:center;gap:40px;padding:30px;font-family:Montserrat,sans-serif">'
            f'<div style="width:192px;height:192px">{icon_svg("circle")}</div>'
            f'<div style="font-size:140px;font-weight:800;letter-spacing:-3px;line-height:1;color:{rs_color}">RS '
            f'<span style="color:{code_color}">Code</span></div></div>')
    im = render(html, 1300, 260)
    return im.crop(im.getbbox())


# Header/footer wordmark: tünd və açıq rejim
for name, color, code in [('rs-code.png', '#ffffff', MINT), ('rs-code-light.png', '#18181b', '#047857')]:
    wm = wordmark(color, code)
    wm.save(img / name, optimize=True)
    print(name, wm.size)

# İkonlar
circle = render(f'<div style="width:512px;height:512px">{icon_svg("circle")}</div>', 512, 512)
square = render(f'<div style="width:512px;height:512px">{icon_svg("square")}</div>', 512, 512, transparent=False)
# Maskable: işarə təhlükəsiz zonada (80%) qalsın — dairə yox, tam kvadrat fon
safe = render(f'<div style="width:512px;height:512px;background:radial-gradient(circle at 50% 35%,#0F4A3A,{GREEN});display:flex;align-items:center;justify-content:center">'
              f'<svg viewBox="0 0 64 64" width="400" height="400">{MARK}</svg></div>', 512, 512, transparent=False)

circle.resize((144, 144), Image.LANCZOS).save(img / '132.png', optimize=True)
safe.resize((192, 192), Image.LANCZOS).save(img / 'icon-192.png', optimize=True)
safe.resize((512, 512), Image.LANCZOS).save(img / 'icon-512.png', optimize=True)
safe.convert('RGB').resize((180, 180), Image.LANCZOS).save(img / 'apple-touch-icon.png', optimize=True)
circle.save(root / 'public' / 'favicon.ico', sizes=[(16, 16), (32, 32), (48, 48)])
print('icons ok')

# Sosial paylaşım şəkli 1200×630
og = render(f'''<div style="width:1200px;height:630px;position:relative;overflow:hidden;font-family:Inter,sans-serif;
 background:radial-gradient(ellipse at 25% 50%,#0F4A3A 0%,{GREEN} 45%,{DEEP} 100%)">
 <div style="position:absolute;inset:0;background-image:linear-gradient(rgba(255,255,255,.03) 1px,transparent 1px),linear-gradient(90deg,rgba(255,255,255,.03) 1px,transparent 1px);background-size:60px 60px"></div>
 <div style="position:absolute;left:90px;top:165px;display:flex;align-items:center;gap:44px">
  <div style="width:210px;height:210px">{icon_svg("circle")}</div>
  <div><div style="font-family:Montserrat;font-size:112px;font-weight:800;letter-spacing:-3px;line-height:1;color:#fff">RS <span style="color:{MINT}">Code</span></div>
  <div style="margin-top:20px;font-family:Montserrat;font-weight:600;font-size:34px;color:#E8EFEC">Biznesiniz üçün rəqəmsal həllər</div></div></div>
 <div style="position:absolute;left:90px;bottom:70px;font-size:24px;font-weight:500;color:#A7C4B8">Veb sayt · Mobil tətbiq · POS · LMS · SEO</div>
 <div style="position:absolute;right:90px;bottom:70px;font-size:24px;color:{MINT};font-weight:600">rs-code.az</div>
</div>''', 1200, 630, transparent=False)
og.convert('RGB').save(img / 'og-default.jpg', quality=88, optimize=True)
print('og ok')
