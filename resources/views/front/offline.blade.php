<!DOCTYPE html>
<html lang="az" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>İnternet yoxdur — RS Code</title>
    <meta name="robots" content="noindex">
    <link rel="manifest" href="/manifest.json">
    <meta name="theme-color" content="#6d28d9">
    <style>
        *{margin:0;padding:0;box-sizing:border-box}
        body{
            background:#09090b;color:#f4f4f5;
            font-family:system-ui,-apple-system,sans-serif;
            min-height:100vh;display:flex;align-items:center;
            justify-content:center;text-align:center;padding:24px;
        }
        .wrap{max-width:420px}
        .icon{
            width:80px;height:80px;background:#18101f;border:2px solid #6d28d9;
            border-radius:24px;display:flex;align-items:center;justify-content:center;
            margin:0 auto 28px;font-size:36px;
        }
        h1{font-size:28px;font-weight:700;margin-bottom:12px}
        p{color:#a1a1aa;font-size:15px;line-height:1.6;margin-bottom:32px}
        .btn{
            display:inline-block;padding:12px 32px;
            background:#6d28d9;color:#fff;border-radius:12px;
            font-size:15px;font-weight:600;text-decoration:none;
            cursor:pointer;border:none;
            transition:background .2s;
        }
        .btn:hover{background:#7c3aed}
        .logo{color:#8b5cf6;font-size:13px;margin-top:48px;opacity:.6}
    </style>
</head>
<body>
    <div class="wrap">
        <div class="icon">📡</div>
        <h1>İnternet bağlantısı yoxdur</h1>
        <p>Hal-hazırda internetə qoşulmaq mümkün olmadı.<br>
           Bağlantını yoxlayıb yenidən cəhd edin.</p>
        <button class="btn" onclick="window.location.reload()">Yenidən cəhd et</button>
        <p class="logo">rs-code.az</p>
    </div>
</body>
</html>
