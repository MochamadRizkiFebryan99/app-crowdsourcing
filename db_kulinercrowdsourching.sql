-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2023 at 11:08 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kulinercrowdsourching`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(8) NOT NULL,
  `nama_admin` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama_admin`, `email`, `telepon`, `alamat`, `username`, `password`, `status`, `keterangan`) VALUES
(3, 'Mochamad Rizki Febryan', 'mochamadrizkifebryan@gmail.com', '089607361766', 'Jl. Raya Klapanunggal, Kembang Kuning, Kec. Klapanunggal, Kabupaten Bogor, Jawa Barat 16877', 'rizki', 'rizky2000', 'Aktif', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tb_komentar`
--

CREATE TABLE `tb_komentar` (
  `id_komentar` int(8) NOT NULL,
  `id_pengguna` varchar(8) NOT NULL,
  `id_kuliner` varchar(8) NOT NULL,
  `komentar` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_komentar`
--

INSERT INTO `tb_komentar` (`id_komentar`, `id_pengguna`, `id_kuliner`, `komentar`, `gambar`, `tanggal`, `jam`, `status`, `keterangan`) VALUES
(48, '3', '25', 'si mutya', 'avatar.jpg', '2023-06-26', '01:54:06', 'Aktif', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kuliner`
--

CREATE TABLE `tb_kuliner` (
  `id_kuliner` int(8) NOT NULL,
  `nama_kuliner` varchar(30) NOT NULL,
  `deskripsi` text NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(35) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `ragam_menu` text NOT NULL,
  `waktu_oprasional` varchar(40) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `emded` text NOT NULL,
  `gambar1` varchar(100) NOT NULL,
  `gambar2` varchar(100) NOT NULL,
  `gambar3` varchar(100) NOT NULL,
  `gambar4` varchar(100) NOT NULL,
  `gambar5` varchar(100) NOT NULL,
  `status` enum('Tersedia','Tidak Tersedia') NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kuliner`
--

INSERT INTO `tb_kuliner` (`id_kuliner`, `nama_kuliner`, `deskripsi`, `alamat`, `email`, `telepon`, `ragam_menu`, `waktu_oprasional`, `latitude`, `longitude`, `emded`, `gambar1`, `gambar2`, `gambar3`, `gambar4`, `gambar5`, `status`, `keterangan`) VALUES
(21, 'Bakmie Surabaya Cak Doel', 'Rata - rata harga Rp. 15.000.00 <br> .\r\nMakan di tempat · Bawa pulang · Antar tanpa bertemu · Parkir.', 'Jl. Raya Narogong No.22, Tlajung Udik, Kec. Gn. Putri, Kabupaten Bogor, Jawa Barat 16962', 'cakdoel@gmail.com', '08153227474', 'Bakmie, Kwitiau Goreng, Nasi Goreng, Oseng - oseng, Aneka Minuman', '16.00 s/d 24:00', -6.4529502179775, 106.92079805713242, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.5367005812445!2d106.91858791431248!3d-6.453467264897356!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6995bc883ba195%3A0x9ada8c4a71a938e5!2sBakmie%20Surabaya%20Cak%20Doel!5e0!3m2!1sid!2sid!4v1662002005186!5m2!1sid!2sid\" width=\"380\" height=\"350\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '1658908540_d6ec61a6906b18e3d91e.jpg', '1658908540_2a91102354b5f31a8aca.jpg', '1658908540_ed95bc98bd411f723170.jpg', '1658908540_7e709ae5a4a17ceea2b4.jpg', '1658908540_c66ecb994123bc1ec96e.jpg', 'Tersedia', '-'),
(22, 'Rm Sahara Ayam Penyet Special', 'Rata - rata harga Rp. 15.000.00 <br>\r\nMakan di tempat · Bawa pulang · Antar tanpa bertemu · Wifi · Toilet · Bangku Bayi · Parkir.', 'Jl. Raya Gn. Putri, Gn. Putri, Kec. Gn. Putri, Kabupaten Bogor, Jawa Barat 16961.', 'sahara@gmail.com', '081293220641', 'Ayam Penyet, Ayam Bakar, Sop Iga, Aneka Gorengan, Aneka Minuman.', '10:00 s/d 23:00', -6.459214218610504, 106.89591029994533, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d991.1227424593048!2d106.89488033173828!3d-6.45930749999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69eaa7407323e3%3A0x7c00068484fe51a0!2sRm%20Sahara%20Ayam%20Penyet%20Special!5e0!3m2!1sid!2sid!4v1658548334097!5m2!1sid!2sid\" width=\"380\" height=\"350\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '1658908594_a1d9d2280c37be8292c9.jpg', '1658908594_684d63630f5b17e7b260.jpg', '1658908594_964fd766ec68115b73ca.jpg', '1658908594_3433d35328d8d3e81322.jpg', '1658908594_333d6f02cfefff034fd5.jpg', 'Tersedia', '-'),
(24, 'Batagor Mang Udin Bandung', 'Rata - rata harga Rp. 13.000.00 <br>\r\nMakan di tempat · Bawa pulang · Antar tanpa bertemu.', 'Jl. Pahlawan No.95, Leuwinutug, Kec. Citeureup, Kabupaten Bogor, Jawa Barat 16810', 'testkuliner2@gmail.com', '+61***********', 'Batagor, Siomay', '10:00 s/d 23:00', -6.516237390510915, 106.86168491160012, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.041181233187!2d106.85960351744384!3d-6.516471899999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c11c4c41f96d%3A0x9fbf063c98edd586!2sBatagor%20Mang%20Udin%20Bandung!5e0!3m2!1sid!2sid!4v1658735011402!5m2!1sid!2sid\" width=\"380\" height=\"350\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '1658908632_f53ff881a046adcd7f46.jpg', '1658908632_a9c56888bea93e060038.jpg', '1658908632_28576669bf3050346eb7.jpg', '1658908632_b37fa0cc863dcf0f2e37.jpg', '1658908632_6d8a46d73b75b1da0ee8.jpg', 'Tersedia', '-'),
(25, 'Bakso Pak Epeng', 'Minuman. Rata - rata harga Rp. 15.000.00 <br>\r\nMakan di tempat · Bawa pulang · Antar tanpa bertemu · Wifi · Toilet · Bangku Bayi · Parkir.', 'Jl. Raya Kedep, Tlajung Udik, Kec. Gn. Putri, Kabupaten Bogor, Jawa Barat 16962', 'mochamadrizkifebryan@gmail.com', '089607361766', 'Bakso, Mie Ayam, Mie Ayam Bakso,Aneka Minuman.', '10:00 s/d 23:00', -6.451849738526084, 106.91686553905491, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.5478157177577!2d106.91469831431246!3d-6.452046964883441!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69955235b3b817%3A0xa7355b3690552f38!2sBakso%20Pak%20Epeng!5e0!3m2!1sid!2sid!4v1662002177696!5m2!1sid!2sid\" width=\"380\" height=\"430\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '1658906458_85e5ae2a29f4864217c0.jpg', '1658906458_df4b0a210cf1e3cf84f5.jpg', '1658906458_96b9281a3b76e42e559b.jpg', '1658906458_d51b7fe3c867eff7ce4e.jpg', '1658906458_1d00f5a9246aa151773b.jpg', 'Tersedia', '-'),
(26, 'Kedai sampira & mie ayam', 'Rata - rata harga Rp. 13.000.00 <br>\r\nMakan di tempat · Bawa pulang · Antar tanpa bertemu · Wifi · Toilet · Parkir.', 'Jl. Raya Klapanunggal, Kembang Kuning, Kec. Klapanunggal, Kabupaten Bogor, Jawa Barat 16877', 'testkuliner3@gmail.com', '087870712441', 'Aneka Bakso, Mie Ayam, Mie Ayam Bakso, Es Campur, Aneka Minuman', '10:00 s/d 17.00', -6.443674960677386, 106.94557791360957, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15858.623032146541!2d106.93291788788633!3d-6.438237791889538!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69957bfa963769%3A0xcee84b20ce1de280!2sKedai%20sampira%20%26%20mie%20ayam%20Teh%20Enung!5e0!3m2!1sid!2sid!4v1658907163188!5m2!1sid!2sid\" width=\"380\" height=\"350\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '1658907448_b0bc91554a3c9f28bb10.jpg', '1658907448_e95ba69d285423008fc1.jpg', '1658907448_439b900551c33f1ac694.jpg', '1658907448_03890fe99e377ab9f152.jpg', '1658907448_dbbdd35a5e45e15d3652.jpg', 'Tersedia', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(8) NOT NULL,
  `nama_pengguna` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `nama_pengguna`, `email`, `telepon`, `alamat`, `username`, `password`, `status`, `keterangan`) VALUES
(1, 'Mochamad Rizki Febryan', 'mochamadrizkifebryan@gmail.com', '089607361766', 'Jl. Raya Klapanunggal, Kembang Kuning, Kec. Klapanunggal, Kabupaten Bogor, Jawa Barat 16877', 'rizki', '622000FA', 'Aktif', ''),
(3, 'Mutya Siti Marwah', 'mutyasitimarwah@gmail.com', '', '', 'mutya', '123456', 'Aktif', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rating`
--

CREATE TABLE `tb_rating` (
  `id_rating` int(8) NOT NULL,
  `id_pengguna` varchar(15) NOT NULL,
  `id_kuliner` varchar(15) NOT NULL,
  `rating` int(8) NOT NULL,
  `rating2` int(8) NOT NULL,
  `rating3` int(8) NOT NULL,
  `rating4` int(8) NOT NULL,
  `rating5` int(8) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rating`
--

INSERT INTO `tb_rating` (`id_rating`, `id_pengguna`, `id_kuliner`, `rating`, `rating2`, `rating3`, `rating4`, `rating5`, `tanggal`, `jam`) VALUES
(48, '3', '25', 1, 1, 1, 1, 1, '2023-06-26', '01:56:50');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rekomendasi`
--

CREATE TABLE `tb_rekomendasi` (
  `id_rekomendasi` int(8) NOT NULL,
  `id_pengguna` varchar(15) NOT NULL,
  `nama_kuliner` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `status` enum('Proses','Selesai') NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rekomendasi`
--

INSERT INTO `tb_rekomendasi` (`id_rekomendasi`, `id_pengguna`, `nama_kuliner`, `alamat`, `gambar`, `status`, `keterangan`) VALUES
(1, '1', 'RM. Saung Apung - Harvest City', 'Perum Harvest City, Jl. Harvest City Boulevard, Cipenjo, Kec. Cileungsi, Kabupaten Bogor, Jawa Barat 16820', '1662002769_b7f36484735b88a63280.jpg', 'Selesai', ''),
(8, '3', 'makanan rizki', 'klapanunggal', '1688376638_bd7c2e40f8ad8144f7b0.jpg', 'Proses', 'karna makanan enak ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_komentar`
--
ALTER TABLE `tb_komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indexes for table `tb_kuliner`
--
ALTER TABLE `tb_kuliner`
  ADD PRIMARY KEY (`id_kuliner`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `tb_rating`
--
ALTER TABLE `tb_rating`
  ADD PRIMARY KEY (`id_rating`);

--
-- Indexes for table `tb_rekomendasi`
--
ALTER TABLE `tb_rekomendasi`
  ADD PRIMARY KEY (`id_rekomendasi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_komentar`
--
ALTER TABLE `tb_komentar`
  MODIFY `id_komentar` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tb_kuliner`
--
ALTER TABLE `tb_kuliner`
  MODIFY `id_kuliner` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_rating`
--
ALTER TABLE `tb_rating`
  MODIFY `id_rating` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tb_rekomendasi`
--
ALTER TABLE `tb_rekomendasi`
  MODIFY `id_rekomendasi` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
