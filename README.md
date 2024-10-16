Cara Mengkloning Projek ke Perangkat

-   Buka terlebih dahulu link projek github yang akan di kloning pada browser anda
-   Setelah terbuka, klik tombol hijau bertulisan "code" lalu copy link yang ada disitu
-   Lalu buka terminal/commands prompt anda, lalu cari lokasi directory anda akan digunakan untuk menyimpan projek
-   lalu ketik git clone dan paste link yang dicopy pada tahap ke-2 tadi (contoh: git clone https://github.com/Kanero095/PertaLetter.git)
-   Namun pastikan koneksi internet anda bagus, lalu tunggu proses kloning hingga selesai
-   jika telah selesai, silahkan masuk ke folder projek lalu ketik di terminal "copy .env.example .env" lalu enter
-   setelah itu ubah database pada file .env tersebut. pada bagian DB:CONNECTION ubah dari sqlite menjadi mysql dan hapus tanda hastag pada setiap line yang dibawahnya
-   setelah itu ketik "composer install" lalu enter
-   lalu ketik "php artisan key:generate" lalu enter
-   lalu tinggal membuat database pada mysql anda, silahkan ketik di terminal "php artisan migrate" dan enter
-   lalu ketik "php artisan db:seed" atau jika eror silahkan ketik di terminal "php artisan db:seed --class=RolesSeeder"
-   selanjutnya tinggal menjalankan program dengan cara mengetik di terminal "php artisan serve"
-   Selesai
