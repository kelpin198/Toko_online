from pathlib import Path

mimes = Path(r'c:\xampp1\htdocs\toko_online\application\config\mimes.php')
text = mimes.read_text(encoding='utf-8')
lines = text.splitlines(True)
for i, line in enumerate(lines):
    if "'mjp2'" in line and not any("webp" in l for l in lines):
        lines.insert(i + 1, "\t'webp' =>  'image/webp',\n")
        break
else:
    raise SystemExit('mjp2 line not found in mimes.php or webp already present')
text = ''.join(lines)
mimes.write_text(text, encoding='utf-8')

ht = Path(r'c:\xampp1\htdocs\toko_online\.htaccess')
text = ht.read_text(encoding='utf-8')
if 'AddType image/webp .webp' not in text:
    if 'RewriteEngine On\n' in text:
        text = text.replace('RewriteEngine On\n', 'RewriteEngine On\nAddType image/webp .webp\n', 1)
    else:
        text = 'AddType image/webp .webp\n' + text
    ht.write_text(text, encoding='utf-8')
print('updated')
