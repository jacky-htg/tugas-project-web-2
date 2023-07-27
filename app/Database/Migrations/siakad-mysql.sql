-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2023 at 01:49 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siakad`
--

-- --------------------------------------------------------

--
-- Table structure for table `ijazah`
--

CREATE TABLE `ijazah` (
                          `id` int(11) NOT NULL,
                          `taruna` int(11) DEFAULT NULL,
                          `program_studi` int(11) DEFAULT NULL,
                          `tanggal_ijazah` date DEFAULT NULL,
                          `tanggal_pengesahan` date DEFAULT NULL,
                          `gelar_akademik` varchar(255) DEFAULT NULL,
                          `nomer_sk` varchar(255) DEFAULT NULL,
                          `wakil_direktur` int(11) DEFAULT NULL,
                          `direktur` int(11) DEFAULT NULL,
                          `nomer_ijazah` varchar(255) DEFAULT NULL,
                          `nomer_seri` varchar(255) DEFAULT NULL,
                          `tanggal_yudisium` date DEFAULT NULL,
                          `judul_kkw` varchar(255) DEFAULT NULL,
                          `nilai_kkw` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
                        `id` int(11) NOT NULL,
                        `kode_kota` varchar(255) DEFAULT NULL,
                        `nama` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

CREATE TABLE `matakuliah` (
                              `id` int(11) NOT NULL,
                              `kode` varchar(255) DEFAULT NULL,
                              `matakuliah` varchar(255) DEFAULT NULL,
                              `sks` int(11) DEFAULT NULL,
                              `nilai_angka` int(11) DEFAULT NULL,
                              `nilai_huruf` enum('A','B','C','D','E') DEFAULT NULL,
                              `semester` enum('semester I','semester II','semester III','semester IV','semester V','semester VI','semester VII','semester VIII') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
                         `id` int(11) NOT NULL,
                         `taruna` int(11) DEFAULT NULL,
                         `nilai_angka` int(11) DEFAULT NULL,
                         `nilai_huruf` varchar(2) DEFAULT NULL,
                         `matakuliah` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pejabat`
--

CREATE TABLE `pejabat` (
                           `id` int(11) NOT NULL,
                           `nama` varchar(255) DEFAULT NULL,
                           `nip` varchar(255) DEFAULT NULL,
                           `golongan` varchar(255) DEFAULT NULL,
                           `jabatan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `program_studi`
--

CREATE TABLE `program_studi` (
                                 `id` int(11) NOT NULL,
                                 `nama` varchar(255) DEFAULT NULL,
                                 `program_pendidikan` enum('Diploma III','Diploma IV') DEFAULT NULL,
                                 `akreditasi` enum('Baik','Baik Sekali','Unggul') DEFAULT NULL,
                                 `sk_akreditasi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `request_passwords`
--

CREATE TABLE `request_passwords` (
                                     `id` binary(16) NOT NULL,
                                     `user_id` binary(16) NOT NULL,
                                     `is_used` tinyint(1) NOT NULL DEFAULT 0,
                                     `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Triggers `request_passwords`
--
DELIMITER $$
CREATE TRIGGER `before_insert_request_passwords` BEFORE INSERT ON `request_passwords` FOR EACH ROW BEGIN
    SET NEW.id = UNHEX(REPLACE(UUID(), '-', ''));
END
    $$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `taruna`
--

CREATE TABLE `taruna` (
                          `id` int(11) NOT NULL,
                          `nama` varchar(255) DEFAULT NULL,
                          `nomer_taruna` varchar(255) DEFAULT NULL,
                          `tempat_lahir` int(11) DEFAULT NULL,
                          `tanggal_lahir` date DEFAULT NULL,
                          `program_studi` int(11) DEFAULT NULL,
                          `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transkrip_nilai`
--

CREATE TABLE `transkrip_nilai` (
                                   `id` int(11) NOT NULL,
                                   `taruna` int(11) DEFAULT NULL,
                                   `ijazah` int(11) DEFAULT NULL,
                                   `program_studi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
                         `id` binary(16) NOT NULL,
                         `email` varchar(60) NOT NULL,
                         `name` varchar(50) NOT NULL,
                         `password` varchar(255) NOT NULL,
                         `is_actived` tinyint(1) NOT NULL DEFAULT 0,
                         `is_verified` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `before_insert_users` BEFORE INSERT ON `users` FOR EACH ROW BEGIN
    SET NEW.id = UNHEX(REPLACE(UUID(), '-', ''));
END
    $$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ijazah`
--
ALTER TABLE `ijazah`
    ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ijazah_taruna` (`taruna`),
  ADD KEY `fk_ijazah_program_studi` (`program_studi`),
  ADD KEY `fk_ijazah_wakil_direktur` (`wakil_direktur`),
  ADD KEY `fk_ijazah_direktur` (`direktur`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matakuliah`
--
ALTER TABLE `matakuliah`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
    ADD PRIMARY KEY (`id`),
  ADD KEY `fk_nilai_taruna` (`taruna`),
  ADD KEY `fk_nilai_matakuliah` (`matakuliah`);

--
-- Indexes for table `pejabat`
--
ALTER TABLE `pejabat`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program_studi`
--
ALTER TABLE `program_studi`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_passwords`
--
ALTER TABLE `request_passwords`
    ADD PRIMARY KEY (`id`),
  ADD KEY `fk_request_passwords_to_users` (`user_id`);

--
-- Indexes for table `taruna`
--
ALTER TABLE `taruna`
    ADD PRIMARY KEY (`id`),
  ADD KEY `fk_taruna_kota` (`tempat_lahir`),
  ADD KEY `fk_taruna_program_studi` (`program_studi`);

--
-- Indexes for table `transkrip_nilai`
--
ALTER TABLE `transkrip_nilai`
    ADD PRIMARY KEY (`id`),
  ADD KEY `fk_transkrip_taruna` (`taruna`),
  ADD KEY `fk_transkrip_ijazah` (`ijazah`),
  ADD KEY `fk_transkrip_program_studi` (`program_studi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
    ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ijazah`
--
ALTER TABLE `ijazah`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `matakuliah`
--
ALTER TABLE `matakuliah`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pejabat`
--
ALTER TABLE `pejabat`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `program_studi`
--
ALTER TABLE `program_studi`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `taruna`
--
ALTER TABLE `taruna`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transkrip_nilai`
--
ALTER TABLE `transkrip_nilai`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ijazah`
--
ALTER TABLE `ijazah`
    ADD CONSTRAINT `fk_ijazah_direktur` FOREIGN KEY (`direktur`) REFERENCES `pejabat` (`id`),
  ADD CONSTRAINT `fk_ijazah_program_studi` FOREIGN KEY (`program_studi`) REFERENCES `program_studi` (`id`),
  ADD CONSTRAINT `fk_ijazah_taruna` FOREIGN KEY (`taruna`) REFERENCES `taruna` (`id`),
  ADD CONSTRAINT `fk_ijazah_wakil_direktur` FOREIGN KEY (`wakil_direktur`) REFERENCES `pejabat` (`id`);

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
    ADD CONSTRAINT `fk_nilai_matakuliah` FOREIGN KEY (`matakuliah`) REFERENCES `matakuliah` (`id`),
  ADD CONSTRAINT `fk_nilai_taruna` FOREIGN KEY (`taruna`) REFERENCES `taruna` (`id`);

--
-- Constraints for table `request_passwords`
--
ALTER TABLE `request_passwords`
    ADD CONSTRAINT `fk_request_passwords_to_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `taruna`
--
ALTER TABLE `taruna`
    ADD CONSTRAINT `fk_taruna_kota` FOREIGN KEY (`tempat_lahir`) REFERENCES `kota` (`id`),
  ADD CONSTRAINT `fk_taruna_program_studi` FOREIGN KEY (`program_studi`) REFERENCES `program_studi` (`id`);

--
-- Constraints for table `transkrip_nilai`
--
ALTER TABLE `transkrip_nilai`
    ADD CONSTRAINT `fk_transkrip_ijazah` FOREIGN KEY (`ijazah`) REFERENCES `ijazah` (`id`),
  ADD CONSTRAINT `fk_transkrip_program_studi` FOREIGN KEY (`program_studi`) REFERENCES `program_studi` (`id`),
  ADD CONSTRAINT `fk_transkrip_taruna` FOREIGN KEY (`taruna`) REFERENCES `taruna` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
