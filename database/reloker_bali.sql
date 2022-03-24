-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2022 at 04:12 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reloker_bali`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama_admin` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `nama_admin`, `password`) VALUES
(1, 'admin', 'Administrator', '$2y$10$QNy/DJvKdilptG3CobzHOeaEkaaUJaAKTfC46Wb70ov6tBgDbvKk6');

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alternatif` int(11) NOT NULL,
  `nama_alternatif` varchar(255) NOT NULL,
  `nama_usaha` varchar(255) NOT NULL,
  `email_usaha` varchar(255) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `kabupaten_id` int(11) NOT NULL,
  `kecamatan_id` int(11) NOT NULL,
  `alamat` text DEFAULT NULL,
  `gender` varchar(15) DEFAULT NULL,
  `tgl_post` date NOT NULL,
  `batas_lamar` date NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `nama_alternatif`, `nama_usaha`, `email_usaha`, `kategori_id`, `kabupaten_id`, `kecamatan_id`, `alamat`, `gender`, `tgl_post`, `batas_lamar`, `deskripsi`, `foto`) VALUES
(1, 'PROGRAMMER', 'RajinCode', 'rajincode@protonmail.com', 1, 1, 1, 'Jl. Tukad Balian, Denpasar Selatan', 'umum', '2022-03-22', '2021-09-21', '<div><strong>Deskripsi Pekerjaan:</strong></div><div>Membuat program berdasarkan lembar spesifikasi software engineering<br><br><br><br></div>', 'Default.png'),
(2, 'IT PROGRAMMER', 'PT. KARYA INTI BERSAMA', 'bali.recruitment2021@gmail.com', 1, 4, 21, 'Jl. Belong I, Seminyak, Kuta, Kabupaten Badung, Bali', 'pria', '2022-03-22', '2021-11-29', '<div><strong>Deskripsi Perusahaan</strong></div><div>We are a representative company for an international marketing agency that repesent many reputable companies in Asia. What we do is to seek the prospective qualified clients all over the world to be connected to the companies that we represent.<br><br><strong>Deskripsi Pekerjaan</strong></div><div>* responsible HTML5, CSS3, Javascript/JQuery. * responsible in PHP, MySQL Database, Git, and PHP Framework (CodeIgniter). * Has good knowledge of server troubleshooting is an advantage. * Enjoy researching technical problems and learning new things. * Eager to learn.<br><br></div><div><br><br></div>', 'Default.png'),
(3, 'IT Web Programmer', 'Mitra Krida Mandiri', 'rekrut.krida@yahoo.com', 1, 4, 20, 'Ji. By Pass Ngurah Rai No.18, Jimbaran – Bali', 'umum', '2022-03-22', '2021-08-07', '<div><strong>Deskripsi Perusahaan</strong></div><div>Menjadi mitra terpercaya bagi masyrakat untuk kepemilikan sepeda motor Honda<br><strong><br>Deskripsi Pekerjaan</strong></div><div>Merancang, mendesain, mengembangkan dan memodifikasi situs web<br><br></div><div><br><br></div>', 'No_3.png'),
(4, 'Back End Programmer', 'BIT House', 'Info@bithouse.id', 1, 1, 3, 'Jalan Plawa Gang Xiii No. 8 Denpasar Timur', 'umum', '2022-03-22', '2021-04-21', '<div><strong>Deskripsi Perusahaan</strong></div><div>PT Bangun Inovasi Teknologi yang disebut juga BIT House merupakan sebuah perusahaan yang bergerak di bidang jasa konsultansi, penelitian, dan pendidikan di bidang teknologi informasi dan komunikasi (TIK) khususnya Software, Artificial Intelligence (AI), dan Internet of Things (IoT) di Indonesia.<br><strong><br>Deskripsi Pekerjaan</strong></div><div>Bertugas merancang alur website agar user experience yang dimiliki pengunjung lebih baik.<br><br></div><div><br><br></div>', 'Default.png'),
(5, 'Web Developer', 'Jinom', 'admin@jinom.net', 1, 5, 26, 'Jl. Gadung No.1, Br.luglug, Desa Lembeng Gianyar, Bali (80582)', 'umum', '2022-03-22', '2021-03-25', '<div><strong>Deskripsi Perusahaan</strong></div><div>Jinom memberikan solusi akses internet ke seluruh daerah di Indonesia hingga pelosok dimana karakter dataran seperti gunung, hutan, danau, lembah, bukit, hingga lintas pulau sering ditemui di Indonesia. Jinom memberikan layanan sesuai ekspektasi kepada pelanggan. Didukung dengan partner-partner seperti Reseller, ISP, dan perusahaan jaringan yang bisa memberi solusi internet dan konektivitas, JINOM terus bergerak dengan tujuan ke arah pemerataan internet dengan harga terjangkau untuk rumah dan stabil untuk bisnis di seluruh Indonesia. Sampai saat ini JINOM memiliki 5 cabang dan 100 reseller di Indonesia.<br><br><strong>Deskripsi Pekerjaan</strong></div><div>membangun situs melalui satu atau lebih bahasa pemrograman<br><br></div><div><br><br></div><div><br><br></div>', 'No_5.png'),
(6, 'Senior Programmer', 'PT Ganeshcom Mitra Solusi Digital', 'hrdganeshcom@gmail.com', 1, 1, 4, 'Jl. Kenyeri Iii No.b2,tonja,kec.denpasar Utara,kota Denpasar,bali 80236', 'umum', '2022-03-22', '2022-03-20', '<div><strong>Deskripsi Pekerjaan</strong></div><div>Penulis dan penguji kode yang digunakan untuk membuat program perangkat lunak<br><br></div>', 'No_6.png'),
(7, 'Backend Developer', 'PT. Varash Saddan Nusantara', 'varashcareer@gmail.com', 1, 1, 3, 'Jl. Gunung Andakasa No. 38 B Denpasar Bali', 'umum', '2022-03-22', '2021-04-17', '<div><strong>Deskripsi Perusahaan</strong></div><div>PT. Varash Saddan Nusantara adalah perusahaan yang bergerak di bidang industri obat herbal. Dengan visi menjadi perusahaan obat tradisional terbesar dan terbaik di Indonesia yang berbasis pada kearifan lokal dan warisan luhur nusantara.<br><br><strong>Deskripsi Pekerjaan</strong></div><div>menangani pengelolaan dari data, membuat aplikasi yang kompleks, dan lain sebagainya.<br><br></div><div><br><br></div>', 'No_7.jpg'),
(8, 'Grapic Designer', 'Starlight', 'karir.starlight@gmail.com', 2, 1, 1, 'Jalan Tukad Pakerisan Gg. Xxr No.8a, Panjer - Denpasar Selatan, Bali', 'umum', '2022-03-23', '2022-04-08', '<div><strong>Deskripsi Perusahaan</strong></div><div>Creative &amp; trusted convection in Bali since 2011<br><br><strong>Deskripsi Pekerjaan</strong></div><div>Bertanggung jawab dalam membuat segala kebutuhan grafis perusahaan<br><br></div><div><br><br></div>', 'no_8.jpg'),
(9, 'Content Creator', 'Sinar Bumi Menghijau', 'sinarbumimenghijau@gmail.com', 2, 1, 1, 'Jalan Pulau Singkep Gg. 12 No.2 Pedungan, Denpasar Selatan', 'umum', '2022-03-23', '2022-03-21', '<div><strong>Deskripsi Perusahaan</strong></div><div>Usaha yang bergerak di bidang pengelolaan Limbah Minyak Jelantah<br><br><strong>Deskripsi Pekerjaan</strong></div><div>Bertanggung jawab atas pembuatan konten berupa foto dan video, editing video dan foto<br><br></div>', 'no_9.png'),
(10, 'Video Editor', 'PT. Varash Saddan Nusantara', 'varashcareer@gmail.com', 2, 1, 3, 'Jl. Gunung Andakasa No. 38 B Denpasar Bali', 'umum', '2022-03-23', '2021-10-22', '<div><strong>Deskripsi Perusahaan</strong></div><div>PT. Varash Saddan Nusantara adalah perusahaan yang bergerak di bidang industri obat herbal. Dengan visi menjadi perusahaan obat tradisional terbesar dan terbaik di Indonesia yang berbasis pada kearifan lokal dan warisan luhur nusantara.<br><br></div><div><strong>Deskripsi Pekerjaan</strong></div><div>Bertugas untuk mengedit video untuk kebutuhan perusahaan<br><br></div>', 'No_71.jpg'),
(11, 'Graphic Designer Staff', 'Politeknik Internasional Bali', 'hrd@pib.ac.id', 2, 3, 15, 'Jl. Pantai Nyanyi, Desa Beraban Kec. Kediri, Kab. Tabanan 82121 Bali – Indonesia', 'umum', '2022-03-23', '2021-11-25', '<div><strong>Deskripsi Perusahaan</strong></div><div>PIB merupakan kampus pariwisata yang menawarkan tiga program untuk mempersiapkan mahasiswa agar siap bersaing sebagai “leader” di era globalisasi sekaligus memberikan akses terbaik ke industri pariwsata dan perhotelan.<br><br></div><div><strong>Deskripsi Pekerjaan</strong></div><div>Develop a design prototype that is in accordance with the objectives of PIB, think creatively to generate new ideas and concepts and develop interactive designs using innovation to redefine design within budget and time constraints, demonstraite illustration skill with skethces, work as part of a team with copywriters, photography, stylist, illustrators,other designers, web developers and marketing specialists<br><br></div>', 'no_10.png'),
(12, 'Penulis Konten Bahasa Inggris', 'BikinCV', 'karir@bikincv.com', 2, 1, 2, 'Jl. Sulatri No.168x, Penatih, Kec. Denpasar Tim., Kota Denpasar, Bali 80237', 'umum', '2022-03-23', '2021-10-20', '<div><strong>Deskripsi Perusahaan</strong></div><div>BikinCV adalah platform untuk membuat CV (Curriculum Vitae) atau Daftar Riwayat Hidup dan Surat lamaran Kerja secara online dengan Mudah, Cepat dan Praktis. Hanya perlu isi data dengan lengkap dan CV sudah bisa di download dalam bentuk PDF<br><br></div><div><strong>Deskripsi Pekerjaan</strong></div><div>Menterjemahkan artikel dari bahasa indonesia ke bahasa inggris, Membuat artikel bahasa inggris dengan tema yang diberikan, Melakukan riset sebelum melakukan penulisan artikel, Memasukkan artikel ke dalam Wordpress<br><br></div>', 'no_12.png'),
(13, 'Junior Graphic Designer', 'Sensatia Botanicals', 'hr@sensatia.com', 2, 1, 1, 'Jl. Danau Toba No.9, Sanur, Denpasar Selatan, Kota Denpasar, Bali 80228', 'umum', '2022-03-23', '2021-08-31', '<div><strong>Deskripsi Perusahaan</strong></div><div>Ditemukan di desa kecil bernama Jasri di Karangasem, Bali, pada tahun 2000, Sensatia Botanicals dibangun dari keinginan untuk menghasilkan produk kosmetik yang terbuat dari bahan-bahan alami. Dimulai dengan tim kecil yang memproduksi sabun mandi dari minyak kelapa, Sensatia Botanicals mulai menerima banyaknya permintaan untuk produk-produk lain. Dari sana Sensatia Botanicals berkembang hingga saat ini menjadi brand yang dikenal di skala internasional.<br><br></div><div><strong>Deskripsi Pekerjaan</strong></div><div>Actively involved in brainstorming ideas for content creation, Create social media content for company brand, Manage multiple social media accounts, Translate creative briefs or stories into powerful illustrations or designs, Create Illustration style for company brand, Develop a visual brand identity, Develop creative design &amp; videos for promotional, market ing campaigns, graphic artwork and more, Able to adapt and work with the design team, Able to work under target and able to give and receive constructive criticism<br><br></div>', 'no_13.jpg'),
(14, 'TEKNISI', 'PT. Hechen Jaya Abadi', 'hechenjayaabadibali@gmail.com', 3, 3, 14, 'Jalan Raya Pantai Yeh Gangga, Desa Gubug, Kecamatan Tabanan, Kabupaten Tabanan.', 'Pria', '2022-03-23', '2021-11-22', '<div><strong>Deskripsi Perusahaan</strong></div><div>PT. HECHEN JAYA ABADI adalah perusahaan yang bergerak dalam bidang Ekspor - Impor, yang berkantor pusat di Surakarta, Jawa Tengah. Kami mencari karyawan yang antusias dan loyal untuk mendukung pengembangan dan peningkatan bisnis kami yang berhubungan dengan produk pertanian, untuk penempatan Kantor Cabang kami diBali yang bertempat di jalan raya pantai yeh Gangga, Desa gubug, kecamatan Tabanan, kabupaten Tabanan.<br><br></div><div><strong>Deskripsi Pekerjaan</strong></div><div>Bertanggung jawab atas segala kegiatan teknis di perusahaan<br><br></div>', 'no_14.png'),
(15, 'Pelaksana Proyek', 'PT Desain Bangun Nusantara', 'dbnline@gmail.com', 3, 1, 4, 'Jl. Patih Nambi Utara, Bina Permai, Ubung Kaja, Kec. Denpasar Utara, Kota Denpasar, Bali 80115', 'umum', '2022-03-23', '2021-12-30', '<div><strong>Deskripsi Perusahaan</strong></div><div>Sebuah perusahaan yang bergerak di bidang kontraktor bangunan<br><br></div><div><strong>Deskripsi Pekerjaan</strong></div><div>Bertanggung jawab atas kegiatan pelaksanaan proyek<br><br></div>', 'no_15.jpg'),
(16, 'Mekanik', 'PT Surganya Motor Indonesia', 'hrd.dpr.admin@surganyamotor.co.id', 3, 4, 23, 'Jalan Lingk. Perang No. 88, Lukluk, Mengwi-badung, Bali', 'Pria', '2022-03-23', '2021-09-20', '<div><strong>Deskripsi Perusahaan</strong></div><div>Pusat Servis dan Ban Motor - Servis Motor dan Ganti Ban dengan Harga Murah &amp; Gratis Pasang<br><br></div><div><strong>Deskripsi Pekerjaan</strong></div><div>Melakukan pemeliharaan dan perbaikan<br><br></div>', '15.jpg'),
(17, 'Coord. Mekanikal Elektrikal &amp; Project', 'PT Surganya Motor Indonesia', 'hrd.dpr.admin@surganyamotor.co.id', 3, 4, 23, 'Jalan Lingk. Perang No. 88, Lukluk, Mengwi-badung, Bali', 'Pria', '2022-03-23', '2021-12-07', '<div><strong>Deskripsi Perusahaan</strong></div><div>Pusat Servis dan Ban Motor - Servis Motor dan Ganti Ban dengan Harga Murah &amp; Gratis Pasang<br><br></div><div><strong>Deskripsi Pekerjaan</strong></div><div>Memahami RAB Project, memahami konsep bangunan dan plumbing, memahami dasar kelistrikan, kerja mesin dan genset<br><br></div>', '151.jpg'),
(18, 'Teknisi', ' RSU Surya Husadha', 'personalia@suryahusadha.com', 3, 4, 20, 'Jalan Siligita, Jl. Nusa Dua No.14, Benoa, Kec. Kuta Sel., Kabupaten Badung, Bali 80363', 'umum', '2022-03-23', '2021-09-04', '<div><strong>Deskripsi Perusahaan</strong></div><div>Sebuah Rumah Sakit Umum<br><br></div><div><strong>Deskripsi Pekerjaan</strong></div><div>Bertanggung jawab pada urusan kelistrikan di suatu perusahaan. Teknisi listrik diwajibkan memiliki kemampuan dalam memperbaiki masalah kelistrikan dari mesin produksi atau peralatan lainnya yang ada demi kelancaran operasional perusahaan.<br><br></div>', '18.jpg'),
(19, 'Kepala Engineering', 'Bamboo Blonde', 'Sri@bambooblonde.com', 3, 4, 22, 'Jl. Intan Permai Gang Mulia Busana No 50/1b Kerobokan, Bali 80361 Indonesia', 'umum', '2022-03-23', '2021-03-08', '<div><strong>Deskripsi Perusahaan</strong></div><div>Bamboo Blonde is an Island lifestyle brand founded in 2007, and is proudly produced in Bali. Throughout the years the brand has been growing on this beautiful island of gods with Bamboo Blonde being the number one retail destination for trend-conscious girls.<br><br></div><div><strong>Deskripsi Pekerjaan</strong></div><div>Bertanggung jawab dalam membuat, mengatur, melaksanakan dan mengontrol kegiatan engineering<br><br></div>', 'Default.png'),
(20, 'Quantity Surveyor (QS)', 'PT Desain Bangun Nusantara', 'dbnline@gmail.com', 4, 1, 4, 'Jl. Patih Nambi Utara, Bina Permai, Ubung Kaja, Kec. Denpasar Utara, Kota Denpasar, Bali', 'umum', '2022-03-23', '2022-04-05', '<div><strong>Deskripsi Perusahaan</strong></div><div>Sebuah perusahaan yang bergerak di bidang kontraktor bangunan<br><br></div><div><strong>Deskripsi Pekerjaan</strong></div><div>Bertugas melakukan survei<br><br></div>', 'no_151.jpg'),
(21, 'Drafter Arsitektur', 'Aji Gallery Furniture', 'ajigalleryjobs@gmail.com', 4, 1, 3, 'Kerobokan Kelod, Denpasar Barat', 'umum', '2022-03-23', '2022-03-05', '<div><strong>Deskripsi Perusahaan</strong></div><div>Manufacture Custom Furniture, Home Decor, Home Accessories, Gifts, Engraving Service.<br><br></div><div><strong>Deskripsi Pekerjaan</strong></div><div>Menyiapkan gambar-gambar kerja teknik<br><br></div>', '16.png'),
(22, 'Architect', 'MIRALAND', 'info@miraland.id', 4, 4, 20, 'l. Goa Gong No.157a, Jimbaran, Kec. Kuta Sel., Kabupaten Badung, Bali', 'umum', '2022-03-23', '2022-03-03', '<div><strong>Deskripsi Perusahaan</strong></div><div>Developer Property Lokal Bali, Investasi Property paling Ideal, Villa Harga Terbaik<br><br></div><div><strong>Deskripsi Pekerjaan</strong></div><div>Controlling projects from start to finish to ensure high quality, innovative and functional design<br><br></div>', '19.jpg'),
(23, 'Arsitek', 'PT. Uma Konstruksi dan Properti (Uma Kopro)', 'umahrd@gmail.com', 4, 4, 22, 'Jl. Raya Anyar No.16 A, Kerobokan, Kec. Kuta Utara, Kabupaten Badung, Bali', 'umum', '2022-03-23', '2021-10-23', '<div><strong>Deskripsi Perusahaan</strong></div><div>Uma KoPro is a general building contractor, which works on various prjects of villas, offices, restaurant anf public buildings. Our talents are multiple and complementary to ensure each project the best realization possible,from its conception to its construction. Uma KoPro\'s management teams are from Indonesian and European culture. From this melting pot is born a permanent exchange which allows a rich technical and aesthetic offer. Uma KoPro is totally dedicated to project it takes care and has as a primary concern the satisfaction of its customers.<br><br></div><div><strong>Deskripsi Pekerjaan</strong></div><div>Mengambil bagian dalam perencanaan, perancangan desain, perkiraan anggaran, dan pengontrolan pembangunan bangunan<br><br></div>', '20.png'),
(24, 'Architect', 'Studio17', 'inquiries@architectstudio17.com', 4, 4, 22, 'Jl. Raya Kerobokan No.2, Kerobokan Kelod, Kuta, Kabupaten Badung, Bali', 'umum', '2022-03-23', '2021-08-21', '<div><strong>Deskripsi Perusahaan</strong></div><div>The company was founded in 2013 by a group of local and international professionals passionate about Architecture in Indonesia. Studio17 offers expedient and high level architectural services for both Indonesian and International investors. With extensive experience managing successful projects from the initial design phase to completion, our team works closely with contractors and subcontractors to ensure that each project is completed on time, within budget and at the highest-level of implementation. We have a perfect track record of successful developments for both private and commercial projects and are proud to always work in cooperation with local professionals. Studio 17 Architectural Services secures the complete realization of the client’s needs and dreams.<br><br></div><div><strong>Deskripsi Pekerjaan</strong></div><div>Perencanaan, perancangan desain, perkiraan anggaran, dan pengontrolan pembangunan bangunan (seperti perumahan, pertokoan, dan perkantoran).<br><br></div>', '21.jpg'),
(25, 'Senior Interior Designer', 'Senior Interior Designer', 'boutiquestudioisla@gmail.com', 4, 4, 22, 'Jl Raya Canggu No. 23, Padonan', 'umum', '2022-03-23', '2021-08-20', '<div><strong>Deskripsi Perusahaan</strong></div><div>We are interior designer company in Canggu<br><br></div><div><strong>Deskripsi Pekerjaan</strong></div><div>Undertaking design project from concept to completion<br><br></div>', '22.png'),
(26, 'Digital Marketing', 'Vissla', 'rahtu@visslaindonesia.com', 5, 1, 1, 'Jl. Gelogor Indah Gg. Arjuna No.1b, Pemogan, Denpasar Selatan, Kota Denpasar, Bali', 'umum', '2022-03-23', '2022-04-14', '<div><strong>Deskripsi Perusahaan</strong></div><div>Vissla is a brand that represents creative freedom, a forward-thinking philosophy, and a generation of creators and innovators. We embrace the modern do-it-yourself attitude within surf culture, performance surfing, and craftsmanship. We constantly strive to minimize our environmental impact and protect the oceans and waves that raised us. This is a surf-everything and ride-anything mentality.<br><br></div><div><strong>Deskripsi Pekerjaan</strong></div><div>Bertanggung jawab atas pemasaran produk secara online, mengelola sosial media perusahaan, merancang content strategy<br><br></div>', '23.jpg'),
(27, 'Digital Marketing', 'Chattra Lintang Konsultama', 'loker_chattra@emirtax.com', 5, 1, 3, 'Jl. Satelit No.4, Dauh Puri Klod, West Denpasar, Denpasar City, Bali', 'Wanita', '2022-03-23', '2022-03-21', '<div><strong>Deskripsi Perusahaan</strong></div><div>Konsultan Pajak terdaftar, yang hadir sebagai salah satu kantor Konsultan Manajemen Bisnis yang profesional dan terpercaya dalam memberikan layanan manajemen untuk bisnis. Telah berpengalaman lebih dari satu dekade dan didukung oleh tenaga yang profesional, kami hadir sebagai jendela dalam membuka potensi yang ada di dunia bisnis guna menunjang tumbuh kembang bisnis dan perusahaan anda.<br><br></div><div><strong>Deskripsi Pekerjaan</strong></div><div>Mengelola Web &amp; Seluruh Sosial Media perusahaan, menyiapkan segala kebutuhan sosial media perusahaan (konten sederhana, dll), merancang strategi digital marketing perusahaan<br><br></div>', '24.jpg'),
(28, 'Digital Marketing', 'Dreamboat Capital', 'dreamboat.capital@gmail.com', 5, 4, 21, 'Jl Kunti I No 117x, Seminyak', 'umum', '2022-03-23', '2022-03-16', '<div><strong>Deskripsi Perusahaan</strong></div><div>Perusahaan Pendanaan di bidang Blockchain<br><br></div><div><strong>Deskripsi Pekerjaan</strong></div><div>Tanggung jawab dalam brand awareness suatu produk dan sebagai perantara untuk berkomunikasi dengan pelanggan, Bertugas menciptakan konten yang berkualitas untuk memudahkan pengguna ataupun audiens mendapat informasi produk atau jasa yang ditawarka<br><br></div>', '25.png'),
(29, 'Digital Marketing', 'TOFFIN Bali', 'info.toffinbali@gmail.com', 5, 1, 3, 'Jl. Gatot Subroto Barat No.510 A, Padangsambian Kaja, Kec. Denpasar Bar., Kota Denpasar, Bali', 'umum', '2022-03-23', '2022-02-17', '<div><strong>Deskripsi Perusahaan</strong></div><div>Distributor Alat &amp; Bahan FnB<br><br></div><div><strong>Deskripsi Pekerjaan</strong></div><div>Bertanggung jawab dalam brand awareness suatu produk dan sebagai perantara untuk berkomunikasi dengan pelanggan<br><br></div>', '26.jpg'),
(30, 'Digital Marketing Officer (DMO)', 'Anugerah Photo', 'career@cmscorporate.co.id', 5, 1, 3, 'Jl. Letda Made Putra, Dauh Puri, Kec. Denpasar Bar., Kota Denpasar, Bali', 'umum', '2022-03-23', '2021-11-30', '<div><strong>Deskripsi Perusahaan</strong></div><div>Digital Photography Solution, providing all the equipment needs of photographic camera with ease, complete with warranty<br><br></div><div><strong>Deskripsi Pekerjaan</strong></div><div>Membuat, mengembangkan &amp; mengeksekusi strategi marketing serta mendatangkan potential leads ke bisnis baik secara offline &amp; digital, Membuat, menciptakan, mengatur schedule planning &amp; publikasi segala konten yang berhubungan dengan marketing perusahaan, Membuat content, copywriting dan artikel yang mendukung strategi-strategi digital yang dilakukan<br><br></div>', '28.jpeg'),
(31, 'Freelance Guru Kimia, Sejarah, Sosiologi &amp; Geografi', 'Edulab', 'rns.edulab@gmail.com', 6, 1, 4, 'Ji. Suli No.76, Dangin Puri Kangin, Kec. Denpasar Utara, Kota Denpasar, Bali', 'umum', '2022-03-23', '2022-01-25', '<div><strong>Deskripsi Perusahaan</strong></div><div>Edulab engaged as an education consultant that not only sees the student’s potential uniformly but also individually to provide personal services so each student can achieve their maximum potential. Edulab interpreted education by introducing the main concepts on profound learning so that education became an addictive, interesting, and exciting thing. The method adopted is also more flexible and varied, avoiding the stiff impression that has been presented all along in formal education.<br><br></div><div><strong>Deskripsi Pekerjaan</strong></div><div>Mengajar mata pelajaran Kimia, Sejarah, Sosiologi &amp; Geografi<br><br></div>', '29.jpg'),
(32, 'Staff Penutur /Pengajar Bahasa Indonesia Bagi Orang Asing', 'Interkultural Edukasi Partner Bali', 'recruitment.IEPBALI@gmail.com', 6, 1, 1, 'Jalan By Pass Ngurah Rai No.191, Sanur', 'umum', '2022-03-23', '2022-02-24', '<div><strong>Deskripsi Perusahaan</strong></div><div>Lembaga Kursus Bahasa<br><br></div><div><strong>Deskripsi Pekerjaan</strong></div><div>Mengajar bahasa Indonesia untuk orang asing<br><br></div>', '31.png'),
(33, 'Dosen Sistem Informasi', 'STMIK Primakara', 'sdm@primakara.ac.id', 6, 1, 1, 'Jl. Tukad Badung No.135, Renon, Kec. Denpasar Sel., Kota Denpasar, Bali', 'umum', '2022-03-23', '2021-03-17', '<div><strong>Deskripsi Perusahaan</strong></div><div>STMIK Primakara merupakan Sekolah Tinggi Manajemen Informatika dan Komputer dibawah naungan Yayasan Primakara. Berdiri sejak tahun 2012, STMIK Primakara telah membawa warna tersendiri dalam dunia pendidikan IT di Bali. STMIK Primakara menyelenggarakan pendidikan di bidang IT jenjang S1. Pada tanggal 27 September 2013 berdasarkan Surat Keputuasan Mnteri Pendidikan dan Kebudayaan RI Nomor 458/E/O/2013 secara resmi telah lahir STMIK Primakara yang beralamatkan di jalan Tukad Badung 135, Renon, Denpasar, dengan 3 Program Studi<br><br></div><div><strong>Deskripsi Pekerjaan</strong></div><div>Mengembangkan dan menyebarluaskan ilmu pengetahuan, teknologi<br><br></div>', '33.jpg'),
(34, 'Dosen Informatika', 'STMIK Primakara', 'sdm@primakara.ac.id', 6, 1, 1, 'Jl. Tukad Badung No.135, Renon, Kec. Denpasar Sel., Kota Denpasar, Bali', 'umum', '2022-03-23', '2021-06-29', '<div><strong>Deskripsi Perusahaan</strong></div><div>STMIK Primakara merupakan Sekolah Tinggi Manajemen Informatika dan Komputer dibawah naungan Yayasan Primakara. Berdiri sejak tahun 2012, STMIK Primakara telah membawa warna tersendiri dalam dunia pendidikan IT di Bali. STMIK Primakara menyelenggarakan pendidikan di bidang IT jenjang S1. Pada tanggal 27 September 2013 berdasarkan Surat Keputuasan Mnteri Pendidikan dan Kebudayaan RI Nomor 458/E/O/2013 secara resmi telah lahir STMIK Primakara yang beralamatkan di jalan Tukad Badung 135, Renon, Denpasar, dengan 3 Program Studi<br><br></div><div><strong>Deskripsi Pekerjaan</strong></div><div>Mengembangkan dan menyebarluaskan ilmu pengetahuan, teknologi<br><br></div>', 'Default.png'),
(35, 'Dosen Jurusan Manajemen Administrasi Rumah Saki', 'Alfa Prima', 'sdm@primakara.ac.id', 6, 1, 1, 'Jl. Nenas, Subagan, Kec. Karangasem, Kabupaten Karangasem, Bali', 'umum', '2022-03-23', '2021-08-28', '<div><strong>Deskripsi Perusahaan</strong></div><div>Alfa Prima merupakan Kampus terbaik di Bali<br><br></div><div><strong>Deskripsi Pekerjaan</strong></div><div>We are looking for experienced highly competent people with a pure heart, like you, to join our team. Alfa Prima merupakan Kampus terbaik di Bali. Jika anda merupakan orang yang highly competent dan memiliki passion yang tinggi untuk menjadi Dosen, Anda mungkin cocok untuk bergabung bersama kami!<br><br></div>', '35.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kabupaten`
--

CREATE TABLE `kabupaten` (
  `id_kab` int(11) NOT NULL,
  `nama_kab` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kabupaten`
--

INSERT INTO `kabupaten` (`id_kab`, `nama_kab`) VALUES
(1, 'DENPASAR'),
(2, 'JEMBRANA'),
(3, 'TABANAN'),
(4, 'BADUNG'),
(5, 'GIANYAR'),
(6, 'KLUNGKUNG'),
(7, 'BANGLI'),
(8, 'KARANGASEM'),
(9, 'BULELENG');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'IT/Komputer'),
(2, 'Periklanan/Media/Komunikasi'),
(3, 'Teknisi'),
(4, 'Bangunan/Kontruksi'),
(5, 'Penjualan/Marketing'),
(6, 'Pelatihan/Pendidikan');

-- --------------------------------------------------------

--
-- Table structure for table `keahlian`
--

CREATE TABLE `keahlian` (
  `id_keahlian` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `nama_keahlian` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keahlian`
--

INSERT INTO `keahlian` (`id_keahlian`, `kategori_id`, `nama_keahlian`) VALUES
(1, 1, 'PHP'),
(2, 1, 'YII'),
(3, 1, 'Codeigniter'),
(4, 1, 'GIT'),
(5, 1, 'GITHUB'),
(6, 1, 'Database MySQL'),
(7, 1, 'Database PostgreSQL'),
(8, 1, 'HTML'),
(9, 1, 'CSS'),
(10, 1, 'Javascript'),
(11, 1, 'Python'),
(12, 1, 'Laravel'),
(13, 1, 'Django'),
(14, 1, 'Vue JS'),
(15, 1, 'React JS'),
(16, 1, 'Next JS'),
(17, 1, 'Bootstrap'),
(18, 1, 'Materialize'),
(19, 1, 'Tailwind'),
(20, 1, 'Restful API'),
(21, 1, 'JSON'),
(22, 1, 'Database MongoDB'),
(23, 1, 'SSH'),
(24, 1, 'Remote Server'),
(25, 1, 'Flask'),
(26, 1, 'Bahasa Inggris'),
(27, 2, 'Adobe Ilustrator'),
(28, 2, 'Adobe Photoshop'),
(29, 2, 'CorelDraw'),
(30, 2, 'Photography'),
(31, 2, 'VideoGraphy'),
(32, 2, 'Adobe Premiere'),
(33, 2, 'Editing Video (Inshoot)'),
(34, 2, 'Editing Video (VN)'),
(35, 2, 'StoryBoard Writing'),
(36, 2, 'Desain Grafis (Tilda)'),
(37, 2, 'UI/UX (Figma)'),
(38, 2, 'UI/UX (Adobe XD)'),
(39, 2, 'Typography'),
(40, 2, 'Layouting'),
(41, 2, 'Copywriting'),
(42, 2, 'Search Engine Optimization (SEO)'),
(43, 2, 'SEO Content Writing'),
(44, 2, 'Adobe Creative Suite'),
(45, 2, 'Digital Drawing'),
(46, 2, 'Motion Graphic'),
(47, 2, 'Digital Imaging'),
(48, 2, 'Bahasa Inggris'),
(49, 3, 'Autocad'),
(50, 3, 'Mesin Otomotif'),
(51, 3, 'Mesin Produksi'),
(52, 3, 'Kelistrikan'),
(53, 3, 'Pemeliharan dan Perbaikan Peralatan'),
(54, 3, 'Elektronik'),
(55, 3, 'Plumbing'),
(56, 3, 'MEP (MECHANICAL, ELECTRICITY, PLUMBING)'),
(57, 3, 'Sistem Pabx'),
(58, 3, 'Microsoft Excel'),
(59, 3, 'Microsoft Project'),
(60, 3, 'Microsoft Office'),
(61, 3, 'Bahasa Inggris'),
(62, 4, 'Autocad'),
(63, 4, 'SAP 2000/Etabs'),
(64, 4, 'SKP'),
(65, 4, 'Sketchup'),
(66, 4, 'Rendering'),
(67, 4, 'Lumion'),
(68, 4, 'Vray'),
(69, 4, 'Revit'),
(70, 4, 'Design (Adobe Ilustrator)'),
(71, 4, 'Design (Adobe Photoshop)'),
(72, 4, 'Design (CorelDraw)'),
(73, 4, 'Microsoft Excel'),
(74, 4, 'Microsoft Project'),
(75, 4, 'Microsoft Office'),
(76, 4, 'Bahasa Inggris'),
(77, 6, 'Kimia'),
(78, 6, 'Sejarah'),
(79, 6, 'Sosiologi'),
(80, 6, 'Geografi'),
(81, 6, 'Kemampuan Mengajar'),
(82, 6, 'Administrasi Rumah Sakit'),
(83, 6, 'Rekam Medis'),
(84, 6, 'Keperawatan'),
(85, 6, 'Bahasa Inggris'),
(86, 6, 'Bahasa Jepang'),
(87, 6, 'Bahasa Bali'),
(88, 5, 'Digital Marketing'),
(89, 5, 'Social Media Marketing'),
(90, 5, 'Social Media Content'),
(91, 5, 'Social Media Management'),
(92, 5, 'Content Strategy'),
(93, 5, 'Content Management System'),
(94, 5, 'Copywriting'),
(95, 5, 'Search Engine Optimization (SEO)'),
(96, 5, 'Google Ads'),
(97, 5, 'Google Adwors'),
(98, 5, 'Design (Adobe Ilustrator)'),
(99, 5, 'Design (Adobe Photoshop)'),
(100, 5, 'Design (CorelDraw)'),
(101, 5, 'Microsoft Excel'),
(102, 5, 'Microsoft Office'),
(103, 5, 'Bahasa Inggris'),
(104, 1, 'Jquery'),
(105, 2, 'Adobe After Effect'),
(106, 5, 'Photography'),
(107, 5, 'Adobe Premiere'),
(108, 6, 'Bahasa Indonesia'),
(109, 6, 'sistem informasi'),
(110, 6, 'Programming'),
(111, 6, 'IOT');

-- --------------------------------------------------------

--
-- Table structure for table `keahlian_alternatif`
--

CREATE TABLE `keahlian_alternatif` (
  `id_keahlian_alternatif` int(11) NOT NULL,
  `keahlian_id` int(11) NOT NULL,
  `alternatif_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keahlian_alternatif`
--

INSERT INTO `keahlian_alternatif` (`id_keahlian_alternatif`, `keahlian_id`, `alternatif_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 1),
(7, 1, 2),
(8, 3, 2),
(9, 4, 2),
(10, 5, 2),
(11, 8, 2),
(12, 9, 2),
(13, 10, 2),
(14, 104, 2),
(15, 1, 3),
(16, 3, 3),
(17, 6, 3),
(18, 7, 3),
(19, 10, 3),
(20, 1, 4),
(21, 10, 4),
(22, 11, 4),
(23, 12, 4),
(24, 13, 4),
(25, 1, 5),
(26, 6, 5),
(27, 8, 5),
(28, 9, 5),
(29, 10, 5),
(30, 12, 5),
(31, 14, 5),
(32, 17, 5),
(33, 4, 6),
(34, 6, 6),
(35, 15, 6),
(36, 16, 6),
(37, 17, 6),
(38, 18, 6),
(39, 19, 6),
(40, 20, 6),
(41, 21, 6),
(42, 1, 7),
(43, 6, 7),
(44, 12, 7),
(45, 20, 7),
(46, 22, 7),
(47, 23, 7),
(48, 24, 7),
(49, 27, 8),
(50, 28, 8),
(51, 29, 8),
(52, 30, 8),
(53, 31, 8),
(54, 27, 9),
(55, 28, 9),
(56, 29, 9),
(57, 30, 9),
(58, 36, 9),
(59, 37, 9),
(60, 39, 9),
(61, 40, 9),
(62, 41, 9),
(63, 30, 10),
(64, 31, 10),
(65, 32, 10),
(66, 105, 10),
(67, 27, 11),
(68, 28, 11),
(69, 29, 11),
(70, 30, 11),
(71, 31, 11),
(72, 42, 12),
(73, 43, 12),
(74, 48, 12),
(75, 44, 13),
(76, 45, 13),
(77, 46, 13),
(78, 47, 13),
(79, 50, 14),
(80, 51, 14),
(81, 52, 14),
(82, 53, 14),
(83, 49, 15),
(84, 59, 15),
(85, 60, 15),
(86, 50, 16),
(87, 54, 17),
(88, 55, 17),
(89, 56, 17),
(90, 51, 18),
(91, 54, 18),
(92, 56, 19),
(93, 62, 20),
(94, 63, 20),
(95, 64, 20),
(96, 75, 20),
(97, 62, 21),
(98, 65, 21),
(99, 66, 21),
(100, 71, 21),
(101, 72, 21),
(102, 73, 21),
(103, 75, 21),
(104, 76, 21),
(105, 62, 22),
(106, 65, 22),
(107, 67, 22),
(108, 68, 22),
(109, 75, 22),
(110, 76, 22),
(111, 62, 23),
(112, 65, 23),
(113, 66, 23),
(114, 67, 23),
(115, 76, 23),
(116, 62, 24),
(117, 65, 24),
(118, 66, 24),
(119, 69, 24),
(120, 71, 24),
(121, 62, 25),
(122, 65, 25),
(123, 66, 25),
(124, 72, 25),
(125, 76, 25),
(126, 88, 26),
(127, 89, 26),
(128, 92, 26),
(129, 95, 26),
(130, 96, 26),
(131, 89, 27),
(132, 98, 27),
(133, 99, 27),
(134, 100, 27),
(135, 90, 28),
(136, 94, 28),
(137, 103, 28),
(138, 91, 29),
(139, 94, 29),
(140, 98, 29),
(141, 99, 29),
(142, 100, 29),
(143, 103, 29),
(144, 106, 29),
(145, 92, 30),
(146, 93, 30),
(147, 95, 30),
(148, 97, 30),
(149, 98, 30),
(150, 99, 30),
(151, 107, 30),
(152, 77, 31),
(153, 78, 31),
(154, 79, 31),
(155, 80, 31),
(156, 85, 32),
(157, 86, 32),
(158, 87, 32),
(159, 108, 32),
(160, 81, 33),
(161, 85, 33),
(162, 109, 33),
(166, 81, 34),
(167, 85, 34),
(168, 110, 34),
(169, 111, 34),
(170, 82, 35),
(171, 83, 35),
(172, 84, 35);

-- --------------------------------------------------------

--
-- Table structure for table `keahlian_user`
--

CREATE TABLE `keahlian_user` (
  `id_keahlian_user` int(11) NOT NULL,
  `keahlian_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keahlian_user`
--

INSERT INTO `keahlian_user` (`id_keahlian_user`, `keahlian_id`, `user_id`) VALUES
(11, 1, 1),
(12, 3, 1),
(13, 4, 1),
(14, 5, 1),
(15, 6, 1),
(16, 8, 1),
(17, 9, 1),
(18, 10, 1),
(19, 12, 1),
(20, 17, 1),
(21, 104, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kecamatan` int(11) NOT NULL,
  `id_kabupaten` int(11) NOT NULL,
  `nama_kec` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `id_kabupaten`, `nama_kec`) VALUES
(1, 1, 'DENPASAR SELATAN'),
(2, 1, 'DENPASAR TIMUR'),
(3, 1, 'DENPASAR BARAT'),
(4, 1, 'DENPASAR UTARA'),
(5, 2, 'MELAYA'),
(6, 2, 'NEGARA'),
(7, 2, 'JEMBRANA'),
(8, 2, 'MENDOYO'),
(9, 2, 'PEKUTATAN'),
(10, 3, 'SELEMADEG'),
(11, 3, 'SELEMADEG TIMUR'),
(12, 3, 'SELEMADEG BARAT'),
(13, 3, 'KERAMBITAN'),
(14, 3, 'TABANAN'),
(15, 3, 'KEDIRI'),
(16, 3, 'MARGA'),
(17, 3, 'BATURITI'),
(18, 3, 'PENEBEL'),
(19, 3, 'PUPUAN'),
(20, 4, 'KUTA SELATAN'),
(21, 4, 'KUTA'),
(22, 4, 'KUTA UTARA'),
(23, 4, 'MENGWI'),
(24, 4, 'ABIANSEMAL'),
(25, 4, 'PETANG'),
(26, 5, 'SUKAWATI'),
(27, 5, 'BLAHBATUH'),
(28, 5, 'GIANYAR'),
(29, 5, 'TAMPAKSIRING'),
(30, 5, 'UBUD'),
(31, 5, 'TEGALLALANG'),
(32, 5, 'PAYANGAN'),
(33, 6, 'NUSAPENIDA'),
(34, 6, 'BANJARANGKAN'),
(35, 6, 'KLUNGKUNG'),
(36, 6, 'DAWAN'),
(37, 7, 'SUSUT'),
(38, 7, 'BANGLI'),
(39, 7, 'TEMBUKU'),
(40, 7, 'KINTAMANI'),
(41, 8, 'RENDANG'),
(42, 8, 'SIDEMEN'),
(43, 8, 'MANGGIS'),
(44, 8, 'KARANGASEM'),
(45, 8, 'ABANG'),
(46, 8, 'BEBANDEM'),
(47, 8, 'SELAT'),
(48, 8, 'KUBU'),
(49, 9, 'GEROKGAK'),
(50, 9, 'SERIRIT'),
(51, 9, 'BUSUNGBIU'),
(52, 9, 'BANJAR'),
(53, 9, 'SUKASADA'),
(54, 9, 'BULELENG'),
(55, 9, 'SAWAN'),
(56, 9, 'KUBUTAMBAHAN'),
(57, 9, 'TEJAKULA');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(255) NOT NULL,
  `alias` varchar(4) NOT NULL,
  `jenis_kriteria` varchar(20) NOT NULL,
  `bobot_kriteria` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama_kriteria`, `alias`, `jenis_kriteria`, `bobot_kriteria`) VALUES
(10, 'Pendidikan', 'PD', 'benefit', 4),
(11, 'Pengalaman', 'PG', 'benefit', 5),
(12, 'Usia', 'AGE', 'benefit', 3),
(13, 'Keahlian', 'KH', 'benefit', 5),
(14, 'Lokasi', 'LK', 'benefit', 4);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_alternatif`
--

CREATE TABLE `nilai_alternatif` (
  `id_nilai_alternatif` int(11) NOT NULL,
  `alternatif_id` int(11) NOT NULL,
  `kriteria_id` int(11) NOT NULL,
  `parameter` varchar(255) NOT NULL,
  `nilai_alternatif` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai_alternatif`
--

INSERT INTO `nilai_alternatif` (`id_nilai_alternatif`, `alternatif_id`, `kriteria_id`, `parameter`, `nilai_alternatif`) VALUES
(1, 1, 10, 'SMA-SMK', 1),
(2, 1, 11, 'Tanpa Pengalaman', 1),
(3, 1, 12, '35', 5),
(4, 2, 10, 'D3-S1', 3),
(5, 2, 11, 'Tanpa Pengalaman', 1),
(6, 2, 12, '35', 5),
(7, 3, 10, 'D3-S1', 3),
(8, 3, 11, 'Tanpa Pengalaman', 1),
(9, 3, 12, '32', 5),
(10, 4, 10, 'SMA-SMK', 1),
(11, 4, 11, '1 Tahun', 2),
(12, 4, 12, '35', 5),
(13, 5, 10, 'SMA-SMK', 1),
(14, 5, 11, 'Tanpa Pengalaman', 1),
(15, 5, 12, '27', 3),
(16, 6, 10, 'D3-S1', 3),
(17, 6, 11, '3 Tahun', 4),
(18, 6, 12, '35', 5),
(19, 7, 10, 'D3-S1', 3),
(20, 7, 11, '1 Tahun', 2),
(21, 7, 12, '35', 5),
(22, 8, 10, 'SMA-SMK', 1),
(23, 8, 11, 'Tanpa Pengalaman', 1),
(24, 8, 12, '30', 4),
(25, 9, 10, 'SMA-SMK', 1),
(26, 9, 11, 'Tanpa Pengalaman', 1),
(27, 9, 12, '35', 5),
(28, 10, 10, 'SMA-SMK', 1),
(29, 10, 11, '1 Tahun', 2),
(30, 10, 12, '25', 2),
(31, 11, 10, 'D3-S1', 3),
(32, 11, 11, '2 Tahun', 3),
(33, 11, 12, '35', 5),
(34, 12, 10, 'D3-S1', 3),
(35, 12, 11, 'Tanpa Pengalaman', 1),
(36, 12, 12, '30', 4),
(37, 13, 10, 'D3-S1', 3),
(38, 13, 11, '1 Tahun', 2),
(39, 13, 12, '35', 5),
(40, 14, 10, 'D3-S1', 3),
(41, 14, 11, '3 Tahun', 4),
(42, 14, 12, '35', 5),
(43, 15, 10, 'D3-S1', 3),
(44, 15, 11, '2 Tahun', 3),
(45, 15, 12, '30', 4),
(46, 16, 10, 'SMA-SMK', 1),
(47, 16, 11, 'Tanpa Pengalaman', 1),
(48, 16, 12, '27', 3),
(49, 17, 10, 'D3-S1', 3),
(50, 17, 11, '1 Tahun', 2),
(51, 17, 12, '33', 5),
(52, 18, 10, 'SMA-SMK', 1),
(53, 18, 11, 'Tanpa Pengalaman', 1),
(54, 18, 12, '35', 5),
(55, 19, 10, 'SMA-SMK', 1),
(56, 19, 11, '1 Tahun', 2),
(57, 19, 12, '35', 5),
(58, 20, 10, 'D3-S1', 3),
(59, 20, 11, '1 Tahun', 2),
(60, 20, 12, '30', 4),
(61, 21, 10, 'SMA-SMK', 1),
(62, 21, 11, 'Tanpa Pengalaman', 1),
(63, 21, 12, '30', 4),
(64, 22, 10, 'D3-S1', 3),
(65, 22, 11, '2 Tahun', 3),
(66, 22, 12, '35', 5),
(67, 23, 10, 'D3-S1', 3),
(68, 23, 11, '1 Tahun', 2),
(69, 23, 12, '35', 5),
(70, 24, 10, 'D3-S1', 3),
(71, 24, 11, '1 Tahun', 2),
(72, 24, 12, '35', 5),
(73, 25, 10, 'D3-S1', 3),
(74, 25, 11, '3 Tahun', 4),
(75, 25, 12, '35', 5),
(76, 26, 10, 'D3-S1', 3),
(77, 26, 11, '1 Tahun', 2),
(78, 26, 12, '30', 4),
(79, 27, 10, 'D3-S1', 3),
(80, 27, 11, '1 Tahun', 2),
(81, 27, 12, '25', 2),
(82, 28, 10, 'D3-S1', 3),
(83, 28, 11, 'Tanpa Pengalaman', 1),
(84, 28, 12, '35', 5),
(85, 29, 10, 'D3-S1', 3),
(86, 29, 11, '2 Tahun', 3),
(87, 29, 12, '25', 2),
(88, 30, 10, 'D3-S1', 3),
(89, 30, 11, '1 Tahun', 2),
(90, 30, 12, '35', 5),
(91, 31, 10, 'D3-S1', 3),
(92, 31, 11, '1 Tahun', 2),
(93, 31, 12, '27', 3),
(94, 32, 10, 'D3-S1', 3),
(95, 32, 11, '1 Tahun', 2),
(96, 32, 12, '35', 5),
(97, 33, 10, 'S3', 5),
(98, 33, 11, '1 Tahun', 2),
(99, 33, 12, '35', 5),
(100, 34, 10, 'S3', 5),
(101, 34, 11, '1 Tahun', 2),
(102, 34, 12, '35', 5),
(103, 35, 10, 'D3-S1', 3),
(104, 35, 11, '1 Tahun', 2),
(105, 35, 12, '35', 5);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_rekomendasi`
--

CREATE TABLE `nilai_rekomendasi` (
  `id_nilai_rekomendasi` int(100) NOT NULL,
  `alternatif_id` int(11) NOT NULL,
  `kriteria_id` int(11) NOT NULL,
  `nilai_alternatif` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai_rekomendasi`
--

INSERT INTO `nilai_rekomendasi` (`id_nilai_rekomendasi`, `alternatif_id`, `kriteria_id`, `nilai_alternatif`, `user_id`) VALUES
(1, 1, 10, 8, 1),
(2, 2, 10, 10, 1),
(3, 3, 10, 10, 1),
(4, 4, 10, 8, 1),
(5, 5, 10, 8, 1),
(6, 6, 10, 10, 1),
(7, 7, 10, 10, 1),
(8, 1, 11, 9, 1),
(9, 2, 11, 9, 1),
(10, 3, 11, 9, 1),
(11, 4, 11, 10, 1),
(12, 5, 11, 9, 1),
(13, 6, 11, 6, 1),
(14, 7, 11, 10, 1),
(15, 1, 12, 5, 1),
(16, 2, 12, 5, 1),
(17, 3, 12, 5, 1),
(18, 4, 12, 5, 1),
(19, 5, 12, 3, 1),
(20, 6, 12, 5, 1),
(21, 7, 12, 5, 1),
(22, 1, 13, 4, 1),
(23, 2, 13, 5, 1),
(24, 3, 13, 4, 1),
(25, 4, 13, 3, 1),
(26, 5, 13, 4, 1),
(27, 6, 13, 1, 1),
(28, 7, 13, 1, 1),
(29, 1, 14, 5, 1),
(30, 2, 14, 1, 1),
(31, 3, 14, 1, 1),
(32, 4, 14, 3, 1),
(33, 5, 14, 1, 1),
(34, 6, 14, 3, 1),
(35, 7, 14, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_user`
--

CREATE TABLE `nilai_user` (
  `id_nil_user` int(11) NOT NULL,
  `kriteria_id` int(11) NOT NULL,
  `parameter` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nilai_user` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai_user`
--

INSERT INTO `nilai_user` (`id_nil_user`, `kriteria_id`, `parameter`, `user_id`, `nilai_user`) VALUES
(1, 10, 'D3-S1', 1, 3),
(2, 11, '1 Tahun', 1, 2),
(3, 12, '24', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `parameter`
--

CREATE TABLE `parameter` (
  `id_parameter` int(11) NOT NULL,
  `kriteria_id` int(11) NOT NULL,
  `nama_parameter` varchar(255) NOT NULL,
  `nilai` int(5) NOT NULL,
  `nilai_parameter` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parameter`
--

INSERT INTO `parameter` (`id_parameter`, `kriteria_id`, `nama_parameter`, `nilai`, `nilai_parameter`) VALUES
(56, 10, 'S3', 5, '5|S3'),
(57, 10, 'S2', 4, '4|S2'),
(58, 10, 'D3-S1', 3, '3|D3-S1'),
(59, 10, 'D1-D2', 2, '2|D1-D2'),
(60, 10, 'SMA-SMK', 1, '1|SMA-SMK'),
(61, 11, 'Lebih 4 Tahun', 5, '5|Lebih 4 Tahun'),
(62, 11, '3 Tahun', 4, '4|3 Tahun'),
(63, 11, '2 Tahun', 3, '3|2 Tahun'),
(64, 11, '1 Tahun', 2, '2|1 Tahun'),
(65, 11, 'Tanpa Pengalaman', 1, '1|Tanpa Pengalaman');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `kategori_id` int(11) DEFAULT NULL,
  `kabupaten_id` int(11) NOT NULL,
  `kecamatan_id` int(11) NOT NULL,
  `gender` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `email`, `nama_lengkap`, `password`, `kategori_id`, `kabupaten_id`, `kecamatan_id`, `gender`) VALUES
(1, 'firdauszulkarnain03@gmail.com', 'Firdaus Zulkarnain', '$2y$10$gOQ9VYHSTroaBqszik5AVeoSEKyR8jszJvynX261.6DsqNIZ3JW5y', 1, 1, 1, 'Pria'),
(2, 'virenameidy@gmail.com', 'Virena Meidy Zulkarnaen', '$2y$10$msU3z0g8XzhBM0x4V6rnwOgjN.Br4OKO0rqK69cGGwZlEw2mVTmvG', NULL, 0, 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD PRIMARY KEY (`id_kab`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `keahlian`
--
ALTER TABLE `keahlian`
  ADD PRIMARY KEY (`id_keahlian`);

--
-- Indexes for table `keahlian_alternatif`
--
ALTER TABLE `keahlian_alternatif`
  ADD PRIMARY KEY (`id_keahlian_alternatif`);

--
-- Indexes for table `keahlian_user`
--
ALTER TABLE `keahlian_user`
  ADD PRIMARY KEY (`id_keahlian_user`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `nilai_alternatif`
--
ALTER TABLE `nilai_alternatif`
  ADD PRIMARY KEY (`id_nilai_alternatif`);

--
-- Indexes for table `nilai_rekomendasi`
--
ALTER TABLE `nilai_rekomendasi`
  ADD PRIMARY KEY (`id_nilai_rekomendasi`);

--
-- Indexes for table `nilai_user`
--
ALTER TABLE `nilai_user`
  ADD PRIMARY KEY (`id_nil_user`);

--
-- Indexes for table `parameter`
--
ALTER TABLE `parameter`
  ADD PRIMARY KEY (`id_parameter`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `kabupaten`
--
ALTER TABLE `kabupaten`
  MODIFY `id_kab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `keahlian`
--
ALTER TABLE `keahlian`
  MODIFY `id_keahlian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `keahlian_alternatif`
--
ALTER TABLE `keahlian_alternatif`
  MODIFY `id_keahlian_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- AUTO_INCREMENT for table `keahlian_user`
--
ALTER TABLE `keahlian_user`
  MODIFY `id_keahlian_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `nilai_alternatif`
--
ALTER TABLE `nilai_alternatif`
  MODIFY `id_nilai_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `nilai_rekomendasi`
--
ALTER TABLE `nilai_rekomendasi`
  MODIFY `id_nilai_rekomendasi` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `nilai_user`
--
ALTER TABLE `nilai_user`
  MODIFY `id_nil_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `parameter`
--
ALTER TABLE `parameter`
  MODIFY `id_parameter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
