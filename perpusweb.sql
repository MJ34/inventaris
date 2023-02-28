/*
 Navicat Premium Data Transfer

 Source Server         : muji
 Source Server Type    : MySQL
 Source Server Version : 80030
 Source Host           : localhost:3306
 Source Schema         : perpusweb

 Target Server Type    : MySQL
 Target Server Version : 80030
 File Encoding         : 65001

 Date: 28/02/2023 11:31:29
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for buku
-- ----------------------------
DROP TABLE IF EXISTS `buku`;
CREATE TABLE `buku`  (
  `id_buku` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `id_kategori` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `id_penerbit` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `id_rak` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `judul` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `pengarang` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `isbn` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `jmlhal` int(0) NULL DEFAULT NULL,
  `jmlbuku` int(0) NULL DEFAULT NULL,
  `tahun` int(0) NULL DEFAULT NULL,
  `sinopsis` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL,
  `foto` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of buku
-- ----------------------------
INSERT INTO `buku` VALUES ('B0001', 'K0001', 'P0002', 'Rak-01', 'Lancar JavaScript', 'Jubile Enterprice', '12345678', 140, 56, 2019, '-', 'lancar_javascript.jpg');
INSERT INTO `buku` VALUES ('B0002', 'K0001', 'P0002', 'Rak-01', 'Belajar Otodidak CodeIgniter', 'Budi Raharjo', '12345679', 130, 61, 2020, '-', 'belajar_codeigniter.jpg');
INSERT INTO `buku` VALUES ('B0003', 'K0001', 'P0002', 'Rak-01', 'Pro PHP & Jquery 7 Hari', 'WARDANA', '12345681', 100, 15, 2020, '-', 'web_profesional_dengan_php_jquery.jpg');
INSERT INTO `buku` VALUES ('B0004', 'K0006', 'P0004', 'Rak-04', 'Otodidak Web Programming', 'Muhammad Ibnu Sa\'ad', '123523453424', 100, 20, 2019, '-', 'ID_OWP2020MTH01WP.jpg');
INSERT INTO `buku` VALUES ('B0005', 'K0006', 'P0004', 'Rak-03', 'jak', 'bayu', '123456', 356, 3, 2023, 'Gak tau baca sendirilah', 'book.png');

-- ----------------------------
-- Table structure for buku_keliling
-- ----------------------------
DROP TABLE IF EXISTS `buku_keliling`;
CREATE TABLE `buku_keliling`  (
  `id` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tanggal` date NULL DEFAULT NULL,
  `asal` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `judul` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `pengarang` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `penanggungjawab` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `kota` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `penerbit` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `tahun` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `jumlahjudul` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `jumlaheks` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `no_inventaris` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `foto` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of buku_keliling
-- ----------------------------
INSERT INTO `buku_keliling` VALUES ('BK0001', '2022-08-19', 'budi', 'Sang senja', 'Ismail', 'airlangga', 'Majapahit', 'Widi P', '2', '1', '1', '101010B', 'book.png');
INSERT INTO `buku_keliling` VALUES ('BK0002', '2022-08-17', 'budi', 'Pemprograma framework', 'abdul kadir', 'prof. irvan', 'Denpasar', 'Radhian Sobarna', '8', '1', '1', '101010', 'book.png');
INSERT INTO `buku_keliling` VALUES ('BK0003', '2022-08-11', 'budi', 'Sang senja', 'iwan', 'kodam', 'Demak', 'Radhian Sobarna', '11', '1', '1', '101010A', 'book.png');
INSERT INTO `buku_keliling` VALUES ('BK0004', '2022-08-05', 'budi', 'budalimo', 'iwan', 'nasnck', 'Majapahit', 'Ria Ricis', '2', '2', '2', '101010A', 'book.png');
INSERT INTO `buku_keliling` VALUES ('BK0005', '2022-08-19', 'ncjsbjb', 'jbyugytf', 'assda', 'jc', 'hghgggyftdtd', 'Widi P', '3', '3', '3', '101010A', 'palidasi.jpg');

-- ----------------------------
-- Table structure for hibah
-- ----------------------------
DROP TABLE IF EXISTS `hibah`;
CREATE TABLE `hibah`  (
  `id` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tanggal` date NULL DEFAULT NULL,
  `asal` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `judul` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `pengarang` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `penanggungjawab` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `kota` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `penerbit` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `tahun` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `jumlahjudul` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `jumlaheks` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `no_inventaris` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `foto` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of hibah
-- ----------------------------
INSERT INTO `hibah` VALUES ('H0001', '2022-08-24', 'kmknk', 'Sang senja', 'Burhan hanif', 'airlangga', 'Denpasar', 'Boy William', '1', '2', '1', '101010B', 'AAAAA3.jpg');

-- ----------------------------
-- Table structure for kategori
-- ----------------------------
DROP TABLE IF EXISTS `kategori`;
CREATE TABLE `kategori`  (
  `id_kategori` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `kategori` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kategori
-- ----------------------------
INSERT INTO `kategori` VALUES ('K0001', 'Agama', '');
INSERT INTO `kategori` VALUES ('K0002', 'Filsafat dan Psikologi', '');
INSERT INTO `kategori` VALUES ('K0004', 'Biografi', '');
INSERT INTO `kategori` VALUES ('K0005', 'Ensiklopedia', '');
INSERT INTO `kategori` VALUES ('K0006', 'Komputer, Informasi dan Referensi Umum', '');
INSERT INTO `kategori` VALUES ('K0007', 'Ilmu Sosial', '');
INSERT INTO `kategori` VALUES ('K0008', 'Bahasa', '');
INSERT INTO `kategori` VALUES ('K0009', 'Sains dan Matematika', '');
INSERT INTO `kategori` VALUES ('K0010', 'Teknologi', '');
INSERT INTO `kategori` VALUES ('K0011', 'Kesenian dan Hiburan', '');
INSERT INTO `kategori` VALUES ('K0012', 'Sastra', '');
INSERT INTO `kategori` VALUES ('K0013', 'Sejarah dan Geografi', '');

-- ----------------------------
-- Table structure for lokasi
-- ----------------------------
DROP TABLE IF EXISTS `lokasi`;
CREATE TABLE `lokasi`  (
  `id` int(0) NOT NULL AUTO_INCREMENT,
  `lokasi` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lokasi
-- ----------------------------
INSERT INTO `lokasi` VALUES (1, 'Ruang Anak dan Remaja');
INSERT INTO `lokasi` VALUES (2, 'Ruang Dewasa');
INSERT INTO `lokasi` VALUES (3, 'Ruang Referensi');
INSERT INTO `lokasi` VALUES (4, 'Ruang Deposit');
INSERT INTO `lokasi` VALUES (5, 'Ruang Berkala');
INSERT INTO `lokasi` VALUES (6, 'Ruang LTPS');

-- ----------------------------
-- Table structure for pegawai
-- ----------------------------
DROP TABLE IF EXISTS `pegawai`;
CREATE TABLE `pegawai`  (
  `id_pegawai` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nama_lengkap` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `notelp` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `jk` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `tempat` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `tgllahir` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `umur` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL,
  `foto` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_pegawai`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pegawai
-- ----------------------------
INSERT INTO `pegawai` VALUES ('P-0001', 'Muhammad Irvan Ali', '08976391220', 'Laki-laki', 'Demak', '08/17/2022', '21', 'Demak', 'ch_bgs1.jpg');

-- ----------------------------
-- Table structure for pembelian
-- ----------------------------
DROP TABLE IF EXISTS `pembelian`;
CREATE TABLE `pembelian`  (
  `id` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tanggal` date NULL DEFAULT NULL,
  `kategori` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `judul` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `cetakan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `penanggungjawab` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `kota` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `penerbit` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `tahun` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `lokasi` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `jumlahjudul` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `no_inventaris` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `foto` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `unique_no_inventaris`(`no_inventaris`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pembelian
-- ----------------------------
INSERT INTO `pembelian` VALUES ('P0001', '2023-02-27', 'Sastra', 'Sebuah Ilusi', '1', 'Marga T.', 'Jakarta', 'Radhian Sobarna', '2023', 'Ruang Dewasa', '1', '5671/B', 'book.png');
INSERT INTO `pembelian` VALUES ('P0002', '2023-02-27', 'Sastra', 'Sebuah Ilusi', '1', 'Marga T.', 'Jakarta', 'Gramedia Pustaka Utama', '', 'Ruang Dewasa', '', '5672/B', 'book.png');
INSERT INTO `pembelian` VALUES ('P0003', '2023-02-27', 'Sastra', 'Sebuah Ilusi', '1', 'Marga T.', 'Jakarta', 'Widi P', '2023', 'Ruang Dewasa', '1', '3457/B', 'book.png');

-- ----------------------------
-- Table structure for penerbit
-- ----------------------------
DROP TABLE IF EXISTS `penerbit`;
CREATE TABLE `penerbit`  (
  `id_penerbit` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `penerbit` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of penerbit
-- ----------------------------
INSERT INTO `penerbit` VALUES ('P0001', 'Ria Ricis', '');
INSERT INTO `penerbit` VALUES ('P0002', 'Boy William', '');
INSERT INTO `penerbit` VALUES ('P0003', 'Radhian Sobarna', '');
INSERT INTO `penerbit` VALUES ('P0004', 'Widi P', '');
INSERT INTO `penerbit` VALUES ('P0005', 'Gramedia Pustaka Utama', '');
INSERT INTO `penerbit` VALUES ('P0006', 'Mizan', '');
INSERT INTO `penerbit` VALUES ('P0007', 'Erlangga', '');
INSERT INTO `penerbit` VALUES ('P0008', 'Aznan', '');

-- ----------------------------
-- Table structure for pengadaan
-- ----------------------------
DROP TABLE IF EXISTS `pengadaan`;
CREATE TABLE `pengadaan`  (
  `id_pengadaan` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `id_buku` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `asal_buku` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `jml` int(0) NULL DEFAULT NULL,
  `ket` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL,
  `tgl` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pengadaan
-- ----------------------------
INSERT INTO `pengadaan` VALUES ('PNG0001', 'B0003', 'Sumedang', 5, '-', '2020-04-15');
INSERT INTO `pengadaan` VALUES ('PNG0002', 'B0002', 'Sumedang', 6, '-', '2020-04-22');
INSERT INTO `pengadaan` VALUES ('PNG0003', 'B0001', 'Sumedang', 6, '-', '2020-04-21');

-- ----------------------------
-- Table structure for pengguna
-- ----------------------------
DROP TABLE IF EXISTS `pengguna`;
CREATE TABLE `pengguna`  (
  `id_user` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` varchar(60) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pass` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `notelp` varchar(13) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` enum('Aktif','Tidak Aktif') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `level` enum('Petugas','Kepala','Administrasi') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `foto` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pengguna
-- ----------------------------
INSERT INTO `pengguna` VALUES ('U0001', 'Admin', 'Irvanadmin@gmail.com', 'admin123', '087892878222', 'Aktif', 'Administrasi', 'WhatsApp_Image_2023-02-27_at_11_42_45.jpeg');
INSERT INTO `pengguna` VALUES ('U0002', 'Petugas', 'Petugas@gmail.com', 'Petugas123', '0897639999', 'Aktif', 'Petugas', 'user.png');
INSERT INTO `pengguna` VALUES ('U0003', 'Kepala', 'Kepala123@gmail.com', 'Kepala123', '123', 'Aktif', 'Kepala', 'user.png');

-- ----------------------------
-- Table structure for rak
-- ----------------------------
DROP TABLE IF EXISTS `rak`;
CREATE TABLE `rak`  (
  `id_rak` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `rak` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of rak
-- ----------------------------
INSERT INTO `rak` VALUES ('Rak-01', 'Khusus Pemula', '');
INSERT INTO `rak` VALUES ('Rak-02', 'Khusus Pelajar', '');
INSERT INTO `rak` VALUES ('Rak-03', 'Sastra', '');
INSERT INTO `rak` VALUES ('Rak-04', 'Coding', '');

SET FOREIGN_KEY_CHECKS = 1;
