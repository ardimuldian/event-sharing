-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2020 at 05:07 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `event_sharing`
--

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `id_config` int(11) NOT NULL,
  `meta_keyword` text NOT NULL,
  `meta_author` text NOT NULL,
  `meta_title` text NOT NULL,
  `meta_description` text NOT NULL,
  `facebook` text NOT NULL,
  `instagram` text NOT NULL,
  `twitter` text NOT NULL,
  `youtube` text NOT NULL,
  `favicon` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `tentang_kami` text NOT NULL,
  `no_wa` varchar(12) NOT NULL,
  `copyright` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id_config`, `meta_keyword`, `meta_author`, `meta_title`, `meta_description`, `facebook`, `instagram`, `twitter`, `youtube`, `favicon`, `logo`, `tentang_kami`, `no_wa`, `copyright`) VALUES
(1, 'Keyword1', 'Author1', 'Era Hiya HIya', 'Description1', 'https://facebook.com/event-sharing/', 'https://instagram.com/event-sharing/', 'https://twitter.com/event-sharing/', 'https://youtube.com/event-sharing/', 'favicon.ico', 'logo1_small_transparan.png', '<p>Event Sharing adalah platform yang memiliki Ticketing Management Service (TMS) teknologi unggul dalam mendukung seluruh penyelenggara event mulai dari distribusi &amp; manajemen tiket, hingga penyediaan laporan analisa event di akhir acara.</p><p>Beberapa teknologi yang kami sediakan siap untuk memfasilitasi penyelenggara event dalam setiap tahap persiapan yang meliputi:</p><ul><li>Distributor tiket terlengkap yang telah bekerja sama dengan Event Sharing untuk menjual tiket Anda.</li><li>Sistem pembayaran yang beragam dan aman memberikan kemudahan kepada calon pembeli, untuk mendapatkan konversi yang lebih tinggi.</li><li>Gate management yang paling aman dan nyaman untuk akses saat event berlangsung. Sehingga, event dengan jumlah penonton yang besar dapat ditangani dengan mudah.</li><li>Sistem analisis data yang lengkap dan komprehensif setelah acara berlangsung untuk memudahkan penyelenggara event dalam menentukan strategi event selanjutnya.</li></ul><p>Sudah ada ratusan event yang bekerja sama dengan kami dan semuanya tersebar di seluruh Indonesia. Kini, saatnya perkenalkan event Anda pada dunia untuk membawa penonton yang lebih banyak lagi bersama kami!</p>', '089538071975', 'Copyright © 2020 Event Sharing.');

-- --------------------------------------------------------

--
-- Table structure for table `dokumen_user`
--

CREATE TABLE `dokumen_user` (
  `id_dokumen_user` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `no_ktp` varchar(16) NOT NULL,
  `nama_ktp` varchar(150) NOT NULL,
  `alamat_ktp` text NOT NULL,
  `dokumen_ktp` varchar(255) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dokumen_user`
--

INSERT INTO `dokumen_user` (`id_dokumen_user`, `id_user`, `no_ktp`, `nama_ktp`, `alamat_ktp`, `dokumen_ktp`, `status`) VALUES
(1, 21, '3273070903710001', 'Achmad Hidayat', 'Jl.Hasan Saputra IV No.10 RT 002/002 Kel.Turangga, Kec.Lengkong, Kota Bandung, Jawa Barat.', 'KTP_Achmad_Hidayat.jpg', 1),
(2, 22, '3175072305730003', 'Anggoro Andi Prasetyo', 'Jl. Kejaksaan Blok E No.99 RT 011/011 Kel.Pondok Bambu, Kec.Duren Sawit', 'KTP-Andi.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id_event` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_event` varchar(100) NOT NULL,
  `banner` varchar(255) NOT NULL,
  `tgl_mulai_acara` date NOT NULL,
  `tgl_berakhir_acara` date NOT NULL,
  `waktu_mulai_acara` time NOT NULL,
  `waktu_berakhir_acara` time NOT NULL,
  `lokasi_acara` varchar(150) NOT NULL,
  `deskripsi_event` text NOT NULL,
  `url_event` varchar(255) NOT NULL,
  `status` enum('Publish','Not Publish') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id_event`, `id_kategori`, `id_user`, `nama_event`, `banner`, `tgl_mulai_acara`, `tgl_berakhir_acara`, `waktu_mulai_acara`, `waktu_berakhir_acara`, `lokasi_acara`, `deskripsi_event`, `url_event`, `status`) VALUES
(2, 6, 21, 'Seminar Pranikah Vol.1', 'Seminar_Pra_Nikah.jpg', '2020-01-20', '2020-01-21', '08:00:00', '12:00:00', 'Sentul, Gringsing, Batang, Jawa Tengah', '<p>Tahun baru identik dengan target - target baru,&nbsp;seperti&nbsp;target kebiasaan / pola hidup, target jumlah buku yang dibaca, target&nbsp;<em>travelling&nbsp;</em>untuk mengelilingi beberapa tempat baik di dalam / luar negeri hingga target untuk melepas masa&nbsp;<em>single</em>nya. Biasanya bertambahnya angka usia menjadikan orang lebih serius dalam menentukan target di tahun yang baru.&nbsp;</p><p>Saat berbicada tentang melepas masa&nbsp;<em>single</em>, tidak sedikit dari kita yang bisa di bilang &quot;merevisi&quot; nya setiap tahun. Ada yang memiliki target ingin menikah di usia 23 ternyata sampai usia 28 masih sendiri sehingga setiap ganti tahun target menikah terus tertulis dan jadi target tahunan yang entah kapan bisa terealisasi.</p><p>Tidak sedikit dari kita hingga merasa putus asa bahkan depresi karena jodoh tak kunjung datang, sehingga saat ditanya &quot;Kapan Nikah&quot; merasa minder, merasa kurang beruntung dan lain sebagainya. Berawal dari cerita teman - teman yang merasa terbebani saat ada yang bertanya &quot;Kapan Nikah&quot; dan angka usia terus bertambah, maka kami dari Warahmah Wedding ingin mengadakan Seminar Pra Nikah Vol 1 yang berjudul &quot;Ketika Mereka Bertanya, Kapan Nikah?&quot;.</p><p>Adapun pengisi acara di Seminar Pra Nikah Vol 1 : Ketika Mereka Bertanya, Kapan Nikah? adalah sebagai berikut :</p><p><strong>1. Ustadh M. Fatih Karim : CEO dan Fouder Cinta Qur&#39;an Foundation, Ritra Travel &amp; Umroh, Produk AlanabiID, Majelis Yuk Ngaji.</strong></p><p><strong>2. Ustadzah Aini Aryani Lc : Narasumber Islam Itu Indah TransTV, Khazanah Trans 7, Redaktur dan Penulis Rumahqikih.com</strong></p><p><strong>3. Kak La Ode Munafar : Founder Indonesia Tanpa Pacaran, Penulis @GaulFresh</strong></p><p><strong>4. Couple Guest (Masih dalam konfirmasi) : Inspirasi Pasangan Ta&#39;aruf, Penulis Buku</strong></p><p>Serta akan di pandu oleh Sdri Amel Wisda Sannie : MC, Host, Moderator, None Jakarta Pusat 2019</p><p>&nbsp;</p><p>Acara ini insyaa allah akan di laksanakan pada :<br />Hari , Tanggal : Minggu, 26 Januari 2020</p><p>Waktu : 08.00 - 16.00 (Open Registrasi 07.00 WIB)</p><p>Lokasi : Aula Universitas Al Azhar, Blok M</p><p><strong>Investasi PRESALE I : 300.000, dengan Benefit :</strong></p><p><strong>1. Seminar Kit Special Design</strong></p><p><strong>2. Snack, Makan Siang 1x</strong></p><p><strong>3. Souvenir Paket Go Green (alat makan)</strong></p><p><strong>3. E-Certifikat</strong></p><p><strong>4. Voucher Warahmah Wedding 500.000</strong></p><p><strong>5. Ilmu, Pengalaman &amp; Relasi</strong></p><p><strong>Serta berkesempatan mendapatkan doorpize 2 logam mulia 0.5gr</strong></p><p>Kami berharap dengan adanya seminar ini bisa menjadi solusi untuk teman - teman lebih tegar lagi, lebih kuat lagi serta memiliki mental yang kuat saat menghadapi pertanyaan itu sehingga tidak membuat&nbsp;<em>down</em>&nbsp;hingga depresi.</p><p>Sampai bertemu teman - teman.</p><p>Terima kasih,</p><p>Salam Persahabatan.</p><p>Warahmah Wedding</p><p><br /><br />&nbsp;</p><p><strong>SYARAT &amp; KETENTUAN</strong></p><p>1. Kuota terbatas.</p><p>2. Datang tepat waktu.</p><p>3.&nbsp;Dipersilahkan membawa Tumbler sendiri dari rumah.</p>', 'seminar-pranikah-vol.1', 'Publish'),
(3, 7, 21, 'WORKSHOP Desainer Grafis', '20191210180712_5def7c60048fb.jpg', '2020-01-22', '2020-01-23', '18:00:00', '18:00:00', 'Queen garden Hotel, Jawa Tengah', '<p>Rio Purba dan&nbsp;Yoko Bomb bersama HOW Learning Club akan menggelar workshop di Queen Garden Hotel - Baturaden - Banyumas pada 11 dan 12 Januari 2020 yang bertajuk Desainer Grafis Profesi Masa Depan. Workshop ini akan menjadi workshop yang menyuguhkan semua detail tentang bagaimana cara untuk memulai profesi sebagai freelancer khususnya desainner grafis untuk dapat keluar dari bleeding zone dan dan memberikan kepastian untuk berpenghasilan dollar lebih maksimal dari hasil menjual hasil karya dan sebagai freelancer.</p><p>HOW Learning Club merupakan club para desainer grafis di Kota Banyumas Jawa Tengah. Berdedikasi dalam berbagi informasi dan tutorial di dunia desain grafis yang untuk saat ini berfocus di Kota Banyumas. Besar harapan untuk dapat menjadi sebuah club atau komunitas yang lebih besar lagi.</p><p><strong>Fasilitas Paket Yoko Bomb</strong></p><ol><li>Workshop (Pelatihan)</li><li>Kaos + Souvenir Acara</li><li>Perangkat Laptop sudah disediakan</li><li>Makan Siang dan Snack</li><li>Sertifikat Workshop</li><li>Modul Workshop</li></ol>', 'workshop-desainer-grafis', 'Publish'),
(4, 3, 22, 'Tresno Ambyar: Didi Kempot Live In Concert', '20200104130612_5e102b54f0e55.jpg', '2020-01-24', '2020-01-25', '20:00:00', '23:00:00', 'M Bloc Live House, DKI Jakarta, Jakarta Selatana', '<p><strong>MBOK NDORO X M BLOC LIVE HOUSE<br />present</strong></p><p><strong>TRESNO AMBYAR:<br />DIDI KEMPOT&nbsp;LIVE IN CONCERT<br />(Grand Opening Party of Mbok Ndoro)</strong></p><p><strong>FRIDAY, FEBRUARY 14th 2020<br />Open Gate: 19:00<br />Show Starts: 20:00</strong></p><p><strong>Tickets:<br />Free Standing </strong></p><p><strong>M Bloc Live House<br />Jl. Panglima Polim Raya No.37<br />Melawai, Kebayoran Baru<br />Jakarta Selatan</strong></p><p><strong>Further info:</strong></p><p><strong>mbloclivehouse@gmail.com</strong></p>', 'tresno-ambyar-didi-kempot-live-in-concert', 'Publish'),
(5, 1, 22, 'Telkom Edutainment 2020', '20191205224604_5de9263c57a30.jpg', '2020-01-26', '2020-01-27', '07:00:00', '16:30:00', 'SMK Telkom Sandhyputra Purwokerto, Jawa Tengah, Kab.Banyumas', '<p>TELKOM EDUTAINMENT adalah sebuah acara dari Ikatan mahasiswa Eks-Karesidenan Banyumas Telkom University Bandung untuk Siswa SMA sederajat, dan Umum yang berisi edukasi dan entertainment. Gueststars : Pamungkas, Pembicara : Aef Nandi, Mahasiswa Berprestasi : Setyo Nugroho. More Info : WA 082221631455, Line : @_avabelbintang</p>', 'telkom-edutainment-2020', 'Publish');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `cover` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `cover`, `deskripsi`) VALUES
(1, 'Festival', 'festival1.png', ''),
(3, 'Konser', 'konser2.png', ''),
(6, 'Seminar', 'seminar2.png', ''),
(7, 'Workshop', 'workshop2.png', '');

-- --------------------------------------------------------

--
-- Table structure for table `pengunjung`
--

CREATE TABLE `pengunjung` (
  `id_pengunjung` int(11) NOT NULL,
  `id_tiket` int(11) NOT NULL,
  `no_tiket` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jml_tiket` int(2) NOT NULL,
  `status_cek_in` int(2) NOT NULL DEFAULT '0',
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pengunjung`
--

INSERT INTO `pengunjung` (`id_pengunjung`, `id_tiket`, `no_tiket`, `nama`, `email`, `jml_tiket`, `status_cek_in`, `id_user`) VALUES
(12, 1, '012001', 'Zarco', 'zarco@gmail.com', 1, 1, 0),
(13, 1, '012002', 'Zedhio Pratama Zulzaq', 'zedhiopratama@gmail.com', 2, 1, 0),
(15, 1, '012003', 'Bottani', 'fahmimaulanalewenussa@gmail.com', 1, 1, 22),
(16, 2, '012004', 'Lavesto', 'lavesto_wikwik@gmail.com', 1, 0, 0),
(17, 3, '012005', 'Taufig Hidayat', 'taufik2h@gmail.com', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `respon`
--

CREATE TABLE `respon` (
  `id_respon` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pesan_visitor` text NOT NULL,
  `pesan_admin` text NOT NULL,
  `status` enum('Has Not Reply','Has Reply') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `respon`
--

INSERT INTO `respon` (`id_respon`, `nama_lengkap`, `email`, `pesan_visitor`, `pesan_admin`, `status`) VALUES
(1, 'Tauvig Hidayat', 'taufik2h@gmail.com', 'Cucok brohh', '<p>Hai Taufik, terimakasih telah menghubungi kami.</p>', 'Has Reply'),
(2, 'Lek Nowo', 'lek_nowo@gmail.com', 'Jadikan platform ini platform berbayar', '', 'Has Not Reply'),
(3, 'Anton Tri Pamungkas', 'trianstagram@gmail.com', 'Jadikan platform ini platform berbayar', '', 'Has Not Reply'),
(4, 'Astrianto Widura', 'widura@gmail.com', 'Jadikan platform ini platform berbayar', '', 'Has Not Reply'),
(5, 'Rahardian Era Muliawan', 'azzuraera@gmail.com', 'Jadikan platform ini platform berbayar', '', 'Has Not Reply'),
(6, 'Santra Prabowohendhi', 'kopet@gmail.com', 'Jadikan platform ini platform berbayar', '', 'Has Not Reply');

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

CREATE TABLE `support` (
  `id_support` int(11) NOT NULL,
  `cover_support1` varchar(255) NOT NULL,
  `cover_support2` varchar(255) NOT NULL,
  `cover_support3` varchar(255) NOT NULL,
  `cover_support4` varchar(255) NOT NULL,
  `cover_support5` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `support`
--

INSERT INTO `support` (`id_support`, `cover_support1`, `cover_support2`, `cover_support3`, `cover_support4`, `cover_support5`) VALUES
(1, 'abp.jpg', 'amikom.png', 'denistore.png', 'digitalent.png', 'bottani.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE `tiket` (
  `id_tiket` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  `nama_tiket` varchar(100) NOT NULL,
  `deskripsi_tiket` varchar(100) NOT NULL,
  `tgl_mulai_order` date NOT NULL,
  `tgl_berakhir_order` date NOT NULL,
  `tiket_disediakan` int(2) NOT NULL,
  `1_email_1_trans` enum('Ya','Tidak') NOT NULL,
  `maks_trans` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tiket`
--

INSERT INTO `tiket` (`id_tiket`, `id_event`, `nama_tiket`, `deskripsi_tiket`, `tgl_mulai_order`, `tgl_berakhir_order`, `tiket_disediakan`, `1_email_1_trans`, `maks_trans`) VALUES
(1, 2, 'Seminar Pranikah Vol.1', 'Ketika mereka bertanya, kapan nikah ?', '2020-01-18', '2020-01-19', 100, 'Ya', 2),
(2, 3, 'WORKSHOP Desainer Grafis', 'Rincian tercantum pada deskripsi event.', '2020-01-20', '2020-01-21', 25, 'Ya', 1),
(3, 4, 'Tresno Ambyar: Didi Kempot Live In Concert', 'Free Standing', '2020-01-22', '2020-02-23', 100, 'Ya', 1),
(4, 5, 'Telkom Edutainment 2020', 'Rincian tertera pada deskripsi event.', '2020-01-24', '2020-01-25', 100, 'Ya', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `tentang_kami` text NOT NULL,
  `level` enum('member','admin') NOT NULL DEFAULT 'member',
  `status` varchar(50) NOT NULL,
  `date_created` datetime NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `no_hp`, `email`, `password`, `logo`, `tentang_kami`, `level`, `status`, `date_created`, `token`) VALUES
(11, 'Zedhio Pratama', '', 'zedhiopratama@gmail.com', '5750c68bcb40421faccab4219e6d80aca0fb9fdf', 'profil.jpg', '', 'admin', '', '2019-11-28 13:29:42', ''),
(21, 'Team Coding', '089538071975', 'zedhio.z@students.amikom.ac.id', '5750c68bcb40421faccab4219e6d80aca0fb9fdf', 'teamit-logo11.png', 'Lembaga Trainer IT seperti Web Programming, Mobile Programming dan Dekstop Programming dibawah Badan Nasional Standar Profesi', 'member', '1', '2019-11-29 13:00:57', 'DFSoCphSiG6bFyBO1PbsxsHqCIhcm0wey99GxdLCGZE='),
(22, 'Bottani', '089538071975', 'fahmimaulanalewenussa@gmail.com', 'c889f815cde4544e0a44a330b5643e35c64b9e09', 'denistore.png', 'Sistem teknologi pertanian yang kreatif dan inovatif', 'member', '1', '2019-12-29 21:20:04', '1fe06bf15d92191a9a4fecd892c74c43a1413fc9');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id_config`);

--
-- Indexes for table `dokumen_user`
--
ALTER TABLE `dokumen_user`
  ADD PRIMARY KEY (`id_dokumen_user`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id_event`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `pengunjung`
--
ALTER TABLE `pengunjung`
  ADD PRIMARY KEY (`id_pengunjung`);

--
-- Indexes for table `respon`
--
ALTER TABLE `respon`
  ADD PRIMARY KEY (`id_respon`);

--
-- Indexes for table `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`id_support`);

--
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id_tiket`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `id_config` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dokumen_user`
--
ALTER TABLE `dokumen_user`
  MODIFY `id_dokumen_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pengunjung`
--
ALTER TABLE `pengunjung`
  MODIFY `id_pengunjung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `respon`
--
ALTER TABLE `respon`
  MODIFY `id_respon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `support`
--
ALTER TABLE `support`
  MODIFY `id_support` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tiket`
--
ALTER TABLE `tiket`
  MODIFY `id_tiket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
