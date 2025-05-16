🎯 Objektif UX

Membina landing page responsif yang:

    Mesra pengguna (mudah faham, cepat akses)

    Fokus kepada branding individu

    Mudah dihubungi (WhatsApp 1 klik)

    Mampu menjual (produk & info tersusun)

    Skalabel (boleh ditambah borang, produk, payment)

🧱 Struktur Halaman vCard (Susun Atur UI)
🔳 1. vCard Section (Statik di atas semua tab)
Komponen	Tujuan	UI
Gambar profil (bulat)	Identiti utama	Tengah
Nama penuh	Branding personal	Saiz besar
Nombor WhatsApp	Butang “Chat Sekarang”	Hijau
Ikon Sosial Media	Hubungkan pelawat ke platform lain	Barisan ikon
Link Website	Arahkan ke domain luar	(optional)
Bio Ringkas	Penerangan pendek siapa pengguna	Text kecil
Senarai Servis Ringkas	1–3 item (tanpa gambar)	Bullet list

📌 Ditarik daripada table user_vcards
📱 Responsif penuh (mobile-first design)
🔄 2. Tab Navigation (Fixed Bawah vCard)

    Tab 1: Maklumat Perniagaan

    Tab 2: WhatsApp Store

📍 UI Design

    Dua butang di tengah (50% width)

    Guna highlight/tab indicator (Tailwind border-b)

    Aktifkan tab guna Alpine.js atau Laravel Livewire (switch view)

📑 Tab 1: Maklumat Perniagaan (Konsep ala Onpay.my)
Komponen	Fungsi	Sumber
Headline	Tarik perhatian	forms.title
Banner Gambar	Gambar visual produk/servis	forms.banner_image
Senarai Kelebihan	Selling points (✔️, ⭐️)	forms.features
Penerangan	Ayat panjang (descriptive)	forms.description
Gambar Produk / Testimoni	Bukti visual / sosial	forms.gallery
Borang Pelanggan	Nama, No, Email	forms.fields[]
CTA Button	WhatsApp / Bayar	forms.cta_link

➡️ Blok modular → boleh susun / aktifkan
🛍️ Tab 2: WhatsApp Store
Komponen	Fungsi
Gambar Produk	Tarik minat
Nama Produk	Jelas & pendek
Harga	Jika ada
Butang “Tempah Sekarang”	Link ke WhatsApp dengan pre-fill mesej
Deskripsi	Penerangan ringkas

➡️ Data dari table products
⚙️ Interaksi UX & Responsif
Perkara	UX Implementasi
Sticky Tab	Kekal di bawah vCard
CTA Button	Saiz besar, warna terang, mudah ditekan
Scroll ke tab aktif	Smooth scroll animasi
Gambar auto-scale	Sesuai pelbagai saiz peranti
Icon sosial hover	Perubahan warna/scale
Bio & servis pendek	Jangan lebih 300 aksara
📱 UX Mobile-First Flow

    Pengguna buka 0123456789.dkad.my

    Terus nampak profil + bio + butang WhatsApp

    Scroll → boleh pilih Tab 1 atau Tab 2

    Akses info promosi atau senarai produk

    Klik butang → terus ke WhatsApp / Pembayaran

📌 Notis Reka Bentuk UX

    Tidak overload di atas (vCard ringkas tapi kuat)

    Info & jualan disusun dalam tab

    Setiap pengguna boleh pilih elemen yang aktif (modular)

    Sesuai untuk pengguna bukan teknikal (agen, peniaga kecil, freelancer)