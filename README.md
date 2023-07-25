# SIAKAD :: Tugas Project Pemrograman Web 2
Sebuah project base tentang sistem akademik menggunakan PHP, Codeigniter 4 dan MySQL.

## Gert Started
- Pastikan sudah mengaktifkan ekstensi intl. Jika anda menggunakan xampp di windows, silahkan baca artikel [Mengaktifkan intl di xampp windows](https://medium.com/@rima98/mengaktifkan-ekstensi-php-intl-6c6c64ceae24)
- git clone https://github.com/jacky-htg/tugas-project-web-2.git
- Copy file env dan rename menjadi .env
- Buka file .env, hapus # pada baris 23 untuk megaktifkan kode pada baris tersebut. Ubah value app.baseUrl dengan url Anda, misalkan http://localhost/tugas-project-web-2/public

## Database
- Buka file .env, hapus # pada baris 33 sampai 37. Kemudian isi dengan data-data koneksi database milik Anda.
- Buka database studio seperti phpMyAdmin, pilih database Anda, kemudian jalankan import file path-document-root/app/Database/Migrations/siakad-mysql.sql

## Email
- Buka file .env dan tambahkan baris berikut 
```
  email_config_protocol = smtp
	email_config_SMTPHost = sandbox.smtp.mailtrap.io
	email_config_SMTPPort = 2525
	email_config_SMTPUser = user-mailtrap-anda
	email_config_SMTPPass = password-mailtrap-anda
  email_config_mailType = html
  email_config_senderName = nama-anda
```