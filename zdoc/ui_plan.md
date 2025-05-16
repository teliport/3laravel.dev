PART 2 – UI/UX DESIGN STRUCTURE
📐 Struktur Visual Keseluruhan:

╭────────────────────────────╮
│ 🔳 vCard (Banner)          │  ← statik atas
│  - Gambar profil           │
│  - Nama, No WhatsApp       │
│  - Link Sosial / Bio Ringkas│
│  - Servis Ringkas          │
╰────────────────────────────╯

╭────────────┬──────────────╮
│ Tab 1      │ Tab 2        │
│ Maklumat   │ WhatsApp     │
│ Perniagaan │ Store        │
╰────────────┴──────────────╯

→ Kandungan masing-masing dipaparkan ikut tab

✅ 🔳 vCard Section (di Luar Tab) — Dipaparkan Di Atas Semua
Elemen:

    Cover/banner image (optional)

    Gambar profil (bulat)

    Nama pengguna

    Nombor WhatsApp + butang "Chat Sekarang"

    Ikon sosial media (FB, IG, TikTok, WhatsApp)

    Link website (optional)

    Bio ringkas (1–2 baris)

    Senarai servis ringkas (text-list)

➡️ Semua data ambil dari table user_vcards
✅ 🧭 Tab Navigation Di Bawah vCard
📑 Tab 1: Maklumat Perniagaan (gaya Onpay.my)

    Headline (tajuk besar)

    Selling points

    Penerangan lanjut

    Gambar produk / galeri

    Butang CTA WhatsApp / Bayaran

    Borang isi maklumat (jika perlu)

➡️ Diambil dari table forms (type = promo)
🛍️ Tab 2: WhatsApp Store

    Senarai produk dari table products

    Setiap item:

        Gambar, nama, harga

        Butang WhatsApp "Tempah Sekarang"

        (Optional: stok, variasi)

📁 View Laravel Yang Akan Digunakan

resources/views/vcard/
├── landing.blade.php      <-- halaman utama subdomain
├── _vcard.blade.php       <-- paparan tetap atas
├── tabs/
│   ├── info.blade.php     <-- Tab 1
│   └── store.blade.php    <-- Tab 2

🔁 Interaksi UI (Responsif)

    Mobile-first: gambar profil di tengah

    Tab fixed: sticky scroll, highlight tab aktif

    vCard tidak reload semula bila tukar tab

    Smooth scroll ke bahagian bawah (tab)

🧠 Kelebihan Struktur Ini
Struktur	Kelebihan
vCard atas	Branding kekal & mudah dikenali
Tab di bawah	Fokus kepada kandungan promosi & jualan
Susunan ringkas	Tak ganggu perhatian pelawat
Boleh dinaik taraf	Tambah borang tempahan, galeri, statistik