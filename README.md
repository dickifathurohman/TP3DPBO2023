# TP3DPBO2023
## Janji
Dicki Fathurohman_2103842_Ilmu Komputer TP1 DPBO2023

Saya Dicki Fathurohman [2103842] mengerjakan TP1 DPBO2023 dalam mata kuliah DPBO, untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikan. Aamiin.

## Deskripsi Tugas
Buatlah program menggunakan bahasa pemrograman PHP dengan spesifikasi sebagai berikut:
- Program bebas, kecuali program Ormawa
- Menggunakan minimal 3 buah tabel
- Terdapat proses Create, Read, Update, dan Delete data
- Memiliki fungsi pencarian dan pengurutan data (kata kunci bebas)
- Menggunakan template/skin form tambah data dan ubah data yang sama
- 1 tabel pada database ditampilkan dalam bentuk bukan tabel, 2 tabel sisanya ditampilkan dalam bentuk tabel (seperti contoh saat praktikum)
- Menggunakan template/skin tabel yang sama untuk menampilkan tabel

## Desain Database
![image](https://github.com/dickifathurohman/TP3DPBO2023/assets/100754802/b4bd7154-1e6f-46c2-a9bf-8d62e9b0d95d)

Pada desain database yang dibuat terdapat tiga tabel :
1. Tabel `idol` : Pada tabel ini terdapat kolom grup_id yang merupakan foreign key terhadap tabel grup, dan kolom posisi_id yang merupakan foreign key terhadap tabel posisi. Sehingga tiap idol memiliki satu grup dan memiliki satu posisi. 
2. Tabel `grup` : Tabel ini memiliki relasi one to many terhadap tabel idol.
3. Tabel `posisi` : Tabel ini memeiliki relasi one to many terhadap tabel posisi.

## Alur Program

1. User akan diarahkan ke halaman home (index.php) ketika pertama kali mengakses web. Pada halaman ini akan ditampilkan data-data idol yang terdapat pada database dalam bentuk Card. Jika user mengklik card data idol maka akan diarahkan ke halaman detail untuk menampilkan detail / atribut lengkap yang dimiliki idol. Pada halaman detail idol terdapat button update untuk mengubah data idol dan button hapus untuk menghapus data idol.
2. Pada navbar ada beberapa opsi yang bisa dilakukan :
- Home : Untuk mengarahkan ke halaman home untuk melihat data-data idol
- Tambah Idol : Form untuk menginputkan data idol baru atau mengupdate data, pada tabel ini terdapat dua dropdown untuk memilih grup dan posisi.
- Daftar Grup : Untuk melihat daftar grup yang tersedia, terdapat juga form untuk menginputkan data baru. Pada tabel grup yang tersedia terdapat button edit untuk mengubah data dan hapus untuk menghapus data. Ketika data pada grup dihapus, maka data idol dengan id grup tersebut akan ikut terhapus
- Daftar Posisi : Untuk melihat daftar posisi yang tersedia, terdapat juga form untuk menginputkan data baru. Pada tabel posisi yang tersedia terdapat button edit untuk mengubah data dan hapus untuk menghapus data. Jika data pada Posisi dihapus maka data idol dengan posisi tersebut juga akan ikut terhapus
- Textfield Cari : User dapat menginputkan keyword pencarian pada textfield pencarian yg tersedia pada navbar untuk menampilkan data yang ingin dicari.
- Filter (hanya tersedia pada halaman home) : Filter digunakan untuk mengurutkan data idol secara ascending berdasarkan nama atau posisi atau grup sesuai dengan pilihan yang dipilih user pada dropdown filter.

## Dokumentasi

`Home`
![image](https://github.com/dickifathurohman/TP3DPBO2023/assets/100754802/9c105ab6-7101-4080-b557-b0053c98e4a1)

`detail`
![image](https://github.com/dickifathurohman/TP3DPBO2023/assets/100754802/55f673d6-804e-4c04-a56e-7aa8e43eed6e)

`Tambah Idol`
![image](https://github.com/dickifathurohman/TP3DPBO2023/assets/100754802/5b224219-bb27-4898-8b6c-14d0206ed65d)

`Update Idol`
![image](https://github.com/dickifathurohman/TP3DPBO2023/assets/100754802/4e19e126-b80d-4b06-8541-e5b33f1ed0bb)

`Grup`
![image](https://github.com/dickifathurohman/TP3DPBO2023/assets/100754802/93e69201-a31b-4391-98ad-f5fe9b3e9bbf)

`Posisi`
![image](https://github.com/dickifathurohman/TP3DPBO2023/assets/100754802/2261e96c-bdfe-40f9-84b6-c3e9f64318d6)


Dokumentasi Video
https://github.com/dickifathurohman/TP3DPBO2023/assets/100754802/1aa1c9a8-e4b1-46f1-bb88-55ea3a42ec7a


