ext Plan – Fasa Pembangunan vCard & Landing Page
🎯 Fokus Permulaan:

    Bahagian utama: vCard
    Kemudian disusuli dengan Tab 1 & Tab 2 secara modular

✅ Fasa 1: Pembangunan vCard (statik di atas tab)
🔧 Objektif:

Papar identiti pengguna secara ringkas & berkesan.
📂 Komponen View:
Fail	Fungsi
landing.blade.php	Fail utama vCard view
sections/banner.blade.php	Gambar latar (optional)
sections/profile_image.blade.php	Gambar bulat
sections/contact.blade.php	Nama + WhatsApp
sections/social.blade.php	Ikon sosial media
sections/bio.blade.php	Perkenalan
sections/service_list.blade.php	Senarai ringkas servis
📁 Controller:

    VcardController@show($phone)

📊 Database:

    Table: user_vcards

        user_id

        profile_image, cover_image

        phone, bio, facebook, instagram, website, etc.

✅ Fasa 2: Tab 1 – Info Gaya Onpay.my
🔧 Objektif:

Papar borang promosi / info jualan dengan blok modular (Onpay-style)
📂 Blok View:
Fail	Fungsi
blocks/headline.blade.php	Tajuk besar
blocks/features.blade.php	Selling point
blocks/description.blade.php	Ayat penuh
blocks/gallery.blade.php	Gambar produk
blocks/form.blade.php	Isian pelanggan
blocks/cta_button.blade.php	Butang WA / Pay
📁 Controller:

    FormController@show($slug)

    FormController@create/edit (dashboard premium user)

📊 Database:

    Table: forms

        user_id, type, title, content (json), cta_link

✅ Fasa 3: Tab 2 – WhatsApp Store
🔧 Objektif:

Paparan produk gaya katalog (mini eCommerce)
📂 Komponen View:

    store/index.blade.php

    store/item.blade.php

📁 Controller:

    ProductController@index

    ProductController@create/edit

📊 Database:

    Table: products

        user_id, name, image, price, description, wa_template

✅ Fasa 4: Tetapan & Admin Panel
Fungsi	Lokasi
Tetapan Pembayaran	payment_settings table
Admin Panel (list user)	/admin/users
Role control	Tetapan is_premium
Statistik klik / view (optional)	Table vcard_stats (future)
⏱️ Cadangan Urutan Pembangunan Mingguan
Minggu	Modul
✅ Sedia	Perancangan & dokumentasi
1	vCard: paparan penuh (view + DB)
2	Tab system + UI tab switch
3	Tab 1: builder + form blok pertama
4	Tab 2: katalog produk
5	Dashboard user: tambah/edit info
6	Admin: senarai user + kawalan
7	Styling penuh + responsive UX
8	Deployment + testing