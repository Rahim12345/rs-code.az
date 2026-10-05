"""Bloq cover generatoru (1200x630, 3 dil, RS Code brend şablonu).

İstifadə:  python tools/blog-cover/cover.py tools/blog-cover/data/<ad>.json
JSON: {"name": "brif", "az": [t1, t2, acc, sub, pin, [[kart, dəyər, alt], x3]], "en": [...], "ru": [...]}
Nəticə: public/images/blog/cover-<name>-<lang>.png
"""
import json, sys, subprocess, pathlib, tempfile
from PIL import Image

root = pathlib.Path(__file__).resolve().parents[2]
tpl = (pathlib.Path(__file__).parent / 'template.html').read_text(encoding='utf-8')
chrome = r'C:\Program Files\Google\Chrome\Application\chrome.exe'
BADGE = {'az': 'BLOQ • 2026', 'en': 'BLOG • 2026', 'ru': 'БЛОГ • 2026'}
TAG = {'az': 'rs-code.az • Rəqəmsal həllər', 'en': 'rs-code.az • Digital solutions', 'ru': 'rs-code.az • Цифровые решения'}

data = json.loads(pathlib.Path(sys.argv[1]).read_text(encoding='utf-8'))
for lang in ('az', 'en', 'ru'):
    t1, t2, acc, sub, pin, cards = data[lang]
    title = f'{t1} {t2} {acc}'
    html = (tpl.replace('%%LANG%%', lang.upper()).replace('%%BADGE%%', BADGE[lang]).replace('%%T1%%', t1)
            .replace('%%T2%%', t2).replace('%%ACC%%', acc).replace('%%SUB%%', sub).replace('%%Q%%', title.lower())
            .replace('%%R1%%', title if '2026' in title else title + ' 2026').replace('%%R2%%', sub[:38] + '…')
            .replace('%%PIN%%', pin).replace('%%TAG%%', TAG[lang])
            .replace('%%CARDS%%', ''.join(f'<div class="card{" hl" if i == 1 else ""}"><small>{a}</small><b>{b}</b><em>{c}</em></div>' for i, (a, b, c) in enumerate(cards))))
    longest = max(len(t1), len(t2))
    fs = 68 if longest <= 13 else 58 if longest <= 16 else 50
    html = html.replace('font-weight:700;font-size:68px', f'font-weight:700;font-size:{fs}px')
    if len(acc) > 16:
        html = html.replace('font-size:54px', 'font-size:44px')
    f = pathlib.Path(tempfile.gettempdir()) / f'cover-{data["name"]}-{lang}.html'
    f.write_text(html, encoding='utf-8')
    png = root / 'public' / 'images' / 'blog' / f'cover-{data["name"]}-{lang}.png'
    subprocess.run([chrome, '--headless=new', '--disable-gpu', '--hide-scrollbars', '--force-device-scale-factor=1',
                    '--window-size=1200,630', f'--screenshot={png}', f.as_uri()], check=True, capture_output=True)
    Image.open(png).convert('RGB').quantize(colors=256, method=Image.Quantize.FASTOCTREE, dither=Image.Dither.NONE).save(png, optimize=True)
    print(png.name)
