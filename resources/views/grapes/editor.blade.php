<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>GrapesJS Editor - DKAD</title>
  <link href="https://unpkg.com/grapesjs/dist/css/grapes.min.css" rel="stylesheet"/>
  <style>
    body, html { margin: 0; height: 100%; }
    #gjs { height: 100vh; }
    .save-btn {
      position: fixed;
      top: 10px;
      right: 10px;
      z-index: 9999;
      padding: 10px 15px;
      background: #10b981;
      color: white;
      border: none;
      border-radius: 5px;
      font-weight: bold;
      cursor: pointer;
    }
  </style>
</head>
<body>

<button class="save-btn" onclick="savePage()">💾 Simpan</button>

<div id="gjs"></div>

<script src="https://unpkg.com/grapesjs"></script>
<script>
  const editor = grapesjs.init({
    container: '#gjs',
    fromElement: false,
    height: '100%',
    storageManager: false,
    plugins: [],
    components: `<section style="padding:100px; text-align:center">
        <h1>Selamat datang ke DKAD.my</h1>
        <p>Bina kad digital anda dengan mudah.</p>
      </section>`,
  });

  function savePage() {
    const html = editor.getHtml();
    const css = editor.getCss();

    fetch('/api/save-landing', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': '{{ csrf_token() }}',
      },
      body: JSON.stringify({ html, css })
    }).then(res => {
      if (res.ok) {
        alert('✅ Berjaya simpan!');
      } else {
        alert('❌ Gagal simpan!');
      }
    });
  }
</script>

</body>
</html>
