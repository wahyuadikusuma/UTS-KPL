-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Feb 2020 pada 03.51
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tppkkwonogiri`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id_user` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(128) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `image` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id_user`, `name`, `username`, `email`, `password`, `image`) VALUES
(1, 'Administrator', 'admintppkkwonogiri', 'tppkkwonogiri@gmail.com', '$2y$10$/LYTeI3iw.6U9sfIJlZcxerTCo2uREa5o.0ZuYbBPTpvmcsEphS2O', 'hoodie.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(11) UNSIGNED NOT NULL,
  `id_penulis` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi_artikel` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal` int(11) NOT NULL,
  `views` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `id_penulis`, `judul`, `isi_artikel`, `gambar`, `tanggal`, `views`) VALUES
(1, 1, 'Ketua TP PKK beri Edukasi Jajanan Sehat Sekolah bagi Persit Kartika Candra Kirana Cabang Kodim Wonogiri', 'Minggu, 31 Oktober 2019.\r\n\r\nBertempat di aula Kodim 0728 Wonogiri telah dilaksanakan pertemuan anggota dalam rangka edukasi jajanan sehat sekolah Persit Kartika Chandra Kirana cabang XLIX Kodim 0728 dan Yayasan Kartika Jaya Koordinator XLIX Kodim 0728 Wonogiri, Rabu(13/11).\r\n\r\nHadir dalam ke kegiatan tersebut Ketua Persit Kartika Chandra Kirana cabang XLIX Kodim 0728 Wonogiri Ny. Fara Heri Amrulloh, Ketua PKK Kabupaten Wonogiri Ny. Verawati Joko Sutopo beserta anggota, Pengurus persit KCK Cabang XLIX Kodim Wonogiri beserta anggota.\r\n\r\nKetua Persit KCK Cabang XLIX Kodim Wonogiri dalam sambutannya mengucapkan terima kasih atas kehadiran dari seluruh anggota persit, guru dan juga orang tua dari anak-anak didik TK Kartika berpesan kepada seluruh anggota agar lebih memperhatikan asupan makanan dalam hal ini jajanan disekolah.kita harus lebih selektif dalam memberikan makanan kepada anak-anak kita, jangan sampai sembarangan memberikan jajanan.\r\n\r\nSementara itu, Ketua PKK Kabupaten Wonogiri drh verawati joko sutopo yang sebagai narasumber dalam kesempatan tersebut menyampaikan tentang jajanan sehat sekolah. Keluarga 4 W 5 Sempurna meliputi Wareg, Waras, Wasis, Wanggon dan Waskito. Peran ibu dalam peningkatan gizi anak adalah ibu mengatur apa yang akan dimakan oleh anggota keluarga seperti menu jenis makanannya jumlah makanannya serta kandungan gizi yang dimakan.\r\n\r\nItu juga sebagai polisi jajanan untuk anak dengan mengawasi anaknya tentang apa yang dibeli mengawasi anaknya membeli jajan di mana serta mengawasi asupan gizi dari jajanan anak-anaknya. Untuk itu para orang tua yang diharapkan secara ketat Mengawasi apa yang dimakan dan dibeli oleh anak-anak kita.\r\nUntuk mengatasi hal tersebut ada tips dan trik yakni 3 oke yang meliputi Kantin Sekolah Oke bekal anak ke sekolah Oke dan pengaturan uang saku oke, Mari kita bersama-sama mewujudkan generasi penerus bangsa yang sehat dan berprestasi dengan asupan makanan yang sehat dan bergizi.', 'artikel1.jpeg', 1580139647, 52),
(2, 1, 'Gerakan Cuci Tangan Pakai Sabun', 'Mencuci tangan adalah kegiatan yang umum dilakukan manusia di dunia. Tapi membasuh tangan dengan air saja tidaklah cukup. Cuci Tangan Pakai Sabun (CTPS) merupakan upaya yang direkomendasikan untuk mencegah penyakit, dengan pertimbangan bahwa sabun mudah diperoleh dan terjangkau. Selain itu, air mengalir dapat diupayakan hampir di setiap rumah tangga. Supaya efektif, perilaku CTPS juga perlu dilakukan dengan benar.\r\n\r\nCTPS yang benar adalah dengan memakai sabun dan air mengalir. Alasan dibaliknya adalah bahwa sabun terdiri dari rantai karbon hidrofobik yang melekat pada kuman di tangan yang disabuni dan membentuk molekul yang sangat halus. Ketika tangan dibilas air, sabun menggelontorkan molekul tersebut bersama kuman dan air bilasan. Dengan mekanisme inilah sabun mampu memutus rantai penyebaran kuman penyebab penyakit menula\r\n\r\nBanyak penelitian menemukan bahwa CTPS dapat menurunkan insiden diare sebanyak 42-47%, pneumonia 50% dan Flu burung 50%. Di samping itu, CTPS juga dapat mencegah infeksi cacing, infeksi mata dan penyakit kulit. CTPS juga dapat mengurangi kematian bayi baru lahir, dimana 50% kematian bayi ini terjadi di rumah dimana ibunya kurang atau tidak mendapatkan informasi yang cukup mengenai perawatan bayi baru lahir\r\n\r\nTangan kita merupakan bagian tubuh yang paling aktif dipergunakan dalam kehidupan sehari-hari. Sering kali tidak disadari betapa banyak benda yang disentuh selama kurun waktu 1 jam saja. Terlebih lagi, ukuran kuman-kuman yang mungkin tersentuh oleh tangan sangat kecil dan tidak dapat terlihat oleh mata telanjang. Oleh sebab itu, perilaku CTPS sangat disarankan. Lima waktu terpenting untuk cuci tangan pakai sabun yaitu:\r\n\r\n1. sesudah ke WC atau Buang Air Besar\r\n2. sebelum makan\r\n3. sebelum menyusui bayi atau menyuapi bayi/anak\r\n4. sesudah menceboki bayi/anak\r\n5. sesudah memegang binatang/ternak\r\n\r\nTetapi, selain waktu terpenting diatas, CTPS dapat dianjurkan pada waktu lainnya, misalnya pada lingkungan sekolah:\r\n\r\n1. Sebelum makan/ jajan di kantin\r\n2. Setelah bermain di tanah/lumpur\r\n3. Setelah bersin/batuk\r\n4. Setelah mengeluarkan ingus\r\n5. Setelah menggambar\r\n6. Setelah menggunakan cat/crayon\r\n7. Dan waktu lainnya saat tangan kita kotor dan bau.\r\nApabila ada anggota keluarga yang sakit, CTPS dengan frekuensi yang lebih tinggi sangat dianjurkan\r\n\r\nDimulai sejak tahun 2008, PBB menetapkan tanggal 15 Oktober diperingati sebagai Hari Cuci Tangan Pakai Sabun Sedunia (HCTPS). Tema HCTPS tahun ini adalah tangan bersih untuk semua, sehingga yang menjadi fokus yaitu semua memiliki kesempatan untuk melakukan cuci tangan, termasuk peserta didik di sekolah.\r\n\r\nSedangkan Dalam Rangka Memperingati Hari Cuci Tangan Pakai Sabun (CTPS ) se dunia TP PKK Kab. Wonogiri Menyelenggarakan Apel Gerakan Cuci Tangan Pakai Sabun (CTPS) Se Dunia pada Tanggal 19 Oktober 2019 di SDN 2 Nambangan, Selogiri.\r\n\r\nTujuan penyelenggaraan Gerakan Cuci Tangan Pakai Sabun (CTPS) Se Dunia ini adalah :\r\n\r\nMengajak anak – anak untuk membiasakan Cuci Tangan Pakai Sabun Sejak usia dini.\r\nMembiasakan diri dan keluarga untuk Cuci Tangan Pakai Sabun dalam kegiatan sehari – hari.\r\nMemberikan pendidikan pada masyarakat akan pentingnya menjaga kebersihan dan kesehatan dengan Cuci Tangan Pakai Sabun.\r\nPeserta Yang Hadir diantaranya :\r\n\r\nOPD Terkait;\r\nPengurus TP PKK Kab. Wonogiri;\r\nCamat Selogiri beserta Forkompincam Selogiri;\r\nPengurus TP PKK Kec. Selogiri;\r\nKepala Desa/ Kelurahan beserta Ketua TP PKK Desa/ Kelurahan se Kec. Selogiri;\r\nGuru/ Karyawan SD N 2 Nambangan;\r\nSiswa – Siswi SD Negeri 2 Nambangan.\r\nKegiatan yang dilakukan diantaranya :\r\n\r\nSapa anak – anak SD dengan Kuis CTPS\r\nSenam CTPS\r\nCuci Tangan Pakai Sabun oleh semua peserta\r\nPermainan CTPS Bersama Palang Merah Indonesia (PMI)\r\nPemberian hadiah bagi murid yang mencuci tangannya dengan benar.', 'senam.jpeg', 1580257244, 63),
(3, 1, 'Penguatan Kapasitas Masyarakat Dalam Program Pencegahan GAKY dan Stunting', '', 'pencegahan_stunting.jpg', 1580261086, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto_kegiatan`
--

CREATE TABLE `foto_kegiatan` (
  `id_item` int(11) NOT NULL,
  `id_kegiatan` int(11) NOT NULL,
  `foto` varchar(256) NOT NULL,
  `tanggal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `id_pokja` int(11) NOT NULL,
  `nama_kegiatan` varchar(50) NOT NULL,
  `gambar` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `materi`
--

CREATE TABLE `materi` (
  `id_materi` int(11) NOT NULL,
  `judul` varchar(256) NOT NULL,
  `nama_file` varchar(256) NOT NULL,
  `file_size` varchar(128) NOT NULL,
  `jumlah_unduh` int(11) NOT NULL,
  `tanggal` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telepon` varchar(50) DEFAULT NULL,
  `pesan` text NOT NULL,
  `tanggal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `nama`, `email`, `telepon`, `pesan`, `tanggal`) VALUES
(1, 'Wahyu', 'wahyuadikusuma@gmail.com', '', 'ini adalah contoh pesan / kritik / saran.', 1572508011),
(2, 'Wahyu Adi Kusuma', 'wahyuadikusuma@gmail.com', '082279179227', 'test pesan', 1579491677),
(4, 'Wahyu Adi Kusuma', 'wahyuadikusuma@gmail.com', '', 'test validasi', 1581992639);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pokja`
--

CREATE TABLE `pokja` (
  `id_pokja` int(11) NOT NULL,
  `nama_pokja` varchar(60) NOT NULL,
  `logo` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pokja`
--

INSERT INTO `pokja` (`id_pokja`, `nama_pokja`, `logo`) VALUES
(1, 'Pembinaan Karakter Dalam Keluarga', 'Screenshot_1.png'),
(2, 'Pendidikan dan Peningkatan Ekonomi Keluarga', 'Screenshot_2.png'),
(3, 'Penguatan Ketahanan Keluarga', 'Screenshot_31.png'),
(4, 'Kesehatan Keluarga dan Lingkungan', 'Screenshot_41.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `teks1` varchar(128) NOT NULL,
  `teks2` varchar(128) NOT NULL,
  `gambar` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `slider`
--

INSERT INTO `slider` (`id`, `teks1`, `teks2`, `gambar`) VALUES
(1, 'TPPKK Wonogiri', 'Tim Penggerak PKK Kabupaten Wonogiri', 'beranda2.jpeg'),
(2, 'TPPKK Wonogiri', 'Membangun keluarga bahagia', 'WhatsApp_Image_2019-12-30_at_10_03_19_(1).jpeg'),
(3, 'TPPKK Wonogiri', 'Maju Bersama Kita Bisa', 'pencegahan_stunting.jpg'),
(4, 'TPPKK Wonogiri', 'Bahagia Bersahaja', 'WhatsApp_Image_2019-12-30_at_10_02_34_(2).jpeg'),
(5, 'Tim Penggerak PKK Kabupaten Wonogiri', 'Guyub Rukun', 'WhatsApp_Image_2019-12-30_at_10_02_59.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`),
  ADD KEY `id_penulis` (`id_penulis`);

--
-- Indeks untuk tabel `foto_kegiatan`
--
ALTER TABLE `foto_kegiatan`
  ADD PRIMARY KEY (`id_item`),
  ADD KEY `id_kegiatan` (`id_kegiatan`);

--
-- Indeks untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`),
  ADD KEY `id_pokja` (`id_pokja`);

--
-- Indeks untuk tabel `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id_materi`);

--
-- Indeks untuk tabel `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indeks untuk tabel `pokja`
--
ALTER TABLE `pokja`
  ADD PRIMARY KEY (`id_pokja`);

--
-- Indeks untuk tabel `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `foto_kegiatan`
--
ALTER TABLE `foto_kegiatan`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `materi`
--
ALTER TABLE `materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pokja`
--
ALTER TABLE `pokja`
  MODIFY `id_pokja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD CONSTRAINT `artikel_ibfk_1` FOREIGN KEY (`id_penulis`) REFERENCES `akun` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `foto_kegiatan`
--
ALTER TABLE `foto_kegiatan`
  ADD CONSTRAINT `foto_kegiatan_ibfk_1` FOREIGN KEY (`id_kegiatan`) REFERENCES `kegiatan` (`id_kegiatan`);

--
-- Ketidakleluasaan untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD CONSTRAINT `kegiatan_ibfk_1` FOREIGN KEY (`id_pokja`) REFERENCES `pokja` (`id_pokja`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
