-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Apr 2024 pada 14.29
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laraveltest`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akuntansi`
--

CREATE TABLE `akuntansi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `akunID` varchar(20) NOT NULL,
  `kodeID_debet` varchar(4) NOT NULL,
  `kodeID_kredit` varchar(4) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `jumlah_debet` int(11) NOT NULL,
  `jumlah_kredit` int(11) NOT NULL,
  `user_input` bigint(20) UNSIGNED NOT NULL,
  `user_ubah` bigint(20) UNSIGNED DEFAULT NULL,
  `token_ubah_data_akun` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `approval`
--

CREATE TABLE `approval` (
  `approvalID` bigint(20) UNSIGNED NOT NULL,
  `approval` varchar(255) NOT NULL,
  `userID` bigint(20) UNSIGNED NOT NULL,
  `sequence` int(11) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `approval`
--

INSERT INTO `approval` (`approvalID`, `approval`, `userID`, `sequence`, `jabatan`, `status`, `created_at`, `updated_at`) VALUES
(1, 'PO', 9, 1, 'Direktur', 'Active', '2024-04-01 08:52:43', '2024-04-01 08:52:43'),
(2, 'PR', 10, 1, 'Supervisor', 'Active', '2024-04-01 10:33:53', '2024-04-01 10:33:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `customerID` bigint(20) UNSIGNED NOT NULL,
  `customerIDs` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `customerName` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `deliveryAddress` text NOT NULL,
  `contact` varchar(255) NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `teleponHP` varchar(255) NOT NULL,
  `teleponFax` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `statusPKP` enum('Yes','No') NOT NULL,
  `userIDSales` bigint(20) UNSIGNED NOT NULL,
  `bayarPer` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`customerID`, `customerIDs`, `code`, `customerName`, `alamat`, `deliveryAddress`, `contact`, `telepon`, `teleponHP`, `teleponFax`, `email`, `kota`, `area`, `status`, `statusPKP`, `userIDSales`, `bayarPer`, `created_at`, `updated_at`) VALUES
(1, 'CUST-00001', '7.7', '7.7 MOTOR', 'JL.GAJAH MADA NO.26 PUNCAK JELUTUNG', 'JL.GAJAH MADA NO.26 PUNCAK JELUTUNG', 'Akiong', '0741258325', '081272668080', '0741258326', 'akiong@gmail.com', 'Kota Jambi', 'Sumatera', 'Active', 'No', 1, 'Lump Sum', '2024-04-01 09:11:00', '2024-04-01 09:11:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer_payment`
--

CREATE TABLE `customer_payment` (
  `paymentID` bigint(20) UNSIGNED NOT NULL,
  `paymentNo` varchar(255) NOT NULL,
  `paymentDate` date NOT NULL,
  `invoiceID` bigint(20) UNSIGNED NOT NULL,
  `paymentTotal` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `payment_type` varchar(255) NOT NULL,
  `bank_noRek` varchar(255) NOT NULL,
  `payment_reference` varchar(255) NOT NULL,
  `notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `delivery_order`
--

CREATE TABLE `delivery_order` (
  `deliveryOrderID` bigint(20) UNSIGNED NOT NULL,
  `SO` bigint(20) UNSIGNED NOT NULL,
  `invoiceIDs` bigint(20) UNSIGNED NOT NULL,
  `forwarderID` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `forwarder`
--

CREATE TABLE `forwarder` (
  `forwaderID` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `forwaderName` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `teleponHP` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `forwarder`
--

INSERT INTO `forwarder` (`forwaderID`, `code`, `forwaderName`, `alamat`, `city`, `contact`, `telepon`, `teleponHP`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'FOR-162989', 'PT. JNE', 'Jl. Tomang Raya No.11 Jakarta Barat 11440 Indonesia', 'Jakarta Barat', 'Freight', '02129278888', '02129278888', 'freight@jne.co.id', 'Active', '2024-04-01 09:03:43', '2024-04-01 09:03:43'),
(2, 'FOR-144079', 'Tes Forwarder', 'Tes Forwarder', 'Test', 'Test', '0216595348', '0216595348', 'testNama@gmail.com', 'Active', '2024-04-15 04:40:43', '2024-04-15 04:40:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto_product`
--

CREATE TABLE `foto_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `productID` bigint(20) UNSIGNED NOT NULL,
  `namaFile` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `foto_product`
--

INSERT INTO `foto_product` (`id`, `productID`, `namaFile`, `created_at`, `updated_at`) VALUES
(1, 1, '61EGdu3sNGL._AC_SL1198_.jpg', '2024-04-01 09:41:25', '2024-04-01 09:41:25'),
(2, 2, '61EGdu3sNGL._AC_SL1198_.jpg', '2024-04-03 04:08:44', '2024-04-03 04:08:44'),
(3, 3, 'Screenshot 2024-02-18 134056.jpg', '2024-04-16 07:18:55', '2024-04-16 07:18:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `goods_recieved_notes`
--

CREATE TABLE `goods_recieved_notes` (
  `goodsRecievedID` bigint(20) UNSIGNED NOT NULL,
  `code` int(11) NOT NULL,
  `tanggalPenerimaan` date NOT NULL,
  `warehouseID` bigint(20) UNSIGNED NOT NULL,
  `purchaseOrderID` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `histori_beli`
--

CREATE TABLE `histori_beli` (
  `historiPembelianID` bigint(20) UNSIGNED NOT NULL,
  `pembelianDate` date NOT NULL,
  `purchaseOrderIDs` bigint(20) UNSIGNED NOT NULL,
  `stock_no` varchar(255) NOT NULL,
  `part_no` bigint(20) UNSIGNED NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `tunai` int(11) NOT NULL,
  `kredit` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `histori_harga_beli`
--

CREATE TABLE `histori_harga_beli` (
  `historiHargaPembelianID` bigint(20) UNSIGNED NOT NULL,
  `purchaseOrderIDs` bigint(20) UNSIGNED NOT NULL,
  `stock_no` varchar(255) NOT NULL,
  `part_no` bigint(20) UNSIGNED NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `notes` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `histori_harga_jual`
--

CREATE TABLE `histori_harga_jual` (
  `historiHargaJualID` bigint(20) UNSIGNED NOT NULL,
  `salesOrderIDs` bigint(20) UNSIGNED NOT NULL,
  `stock_no` varchar(255) NOT NULL,
  `part_no` bigint(20) UNSIGNED NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `notes` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `histori_jual`
--

CREATE TABLE `histori_jual` (
  `historiJualID` bigint(20) UNSIGNED NOT NULL,
  `pembelianDate` date NOT NULL,
  `salesOrderIDs` bigint(20) UNSIGNED NOT NULL,
  `stock_no` varchar(255) NOT NULL,
  `part_no` bigint(20) UNSIGNED NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `tunai` int(11) NOT NULL,
  `kredit` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `inventory`
--

CREATE TABLE `inventory` (
  `inventoryID` bigint(20) UNSIGNED NOT NULL,
  `productIDs` bigint(20) UNSIGNED NOT NULL,
  `productQuantity` int(11) NOT NULL,
  `satuan` varchar(5) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoices_recieved`
--

CREATE TABLE `invoices_recieved` (
  `invoicesRecievedID` bigint(20) UNSIGNED NOT NULL,
  `goodsRecievedID` bigint(20) UNSIGNED NOT NULL,
  `tanggalPenerimaan` date NOT NULL,
  `warehouseID` bigint(20) UNSIGNED NOT NULL,
  `purchaseOrderID` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kode_akun`
--

CREATE TABLE `kode_akun` (
  `kode_akun` varchar(4) NOT NULL,
  `nama_akun` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_03_11_032139_create_user_access_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(4, '2014_10_12_100000_create_password_resets_table', 1),
(5, '2019_08_19_000000_create_failed_jobs_table', 1),
(6, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2024_03_11_013841_create_product_category_table', 1),
(8, '2024_03_11_021119_create_vehicle_type_table', 1),
(9, '2024_03_11_023007_create_kode_akun_table', 1),
(10, '2024_03_11_023750_create_approval_table', 1),
(11, '2024_03_11_023808_create_product_table', 1),
(12, '2024_03_11_023816_create_foto_product_table', 1),
(13, '2024_03_11_024417_create_photo_user_table', 1),
(14, '2024_03_11_031158_create_salesman_table', 1),
(15, '2024_03_11_031203_create_customer_table', 1),
(16, '2024_03_11_031216_create_supplier_table', 1),
(17, '2024_03_11_031230_create_warehouse_table', 1),
(18, '2024_03_11_031243_create_forwarder_table', 1),
(19, '2024_03_11_031257_create_purchase_request_table', 1),
(20, '2024_03_11_031308_create_purchase_request_approval_table', 1),
(21, '2024_03_11_031324_create_purchase_order_table', 1),
(22, '2024_03_11_031329_create_purchase_order_approval_table', 1),
(23, '2024_03_11_031346_create_goods_recieved_notes_table', 1),
(24, '2024_03_11_031358_create_invoices_recieved_table', 1),
(25, '2024_03_11_031418_create_histori_harga_beli_table', 1),
(26, '2024_03_11_031426_create_histori_beli_table', 1),
(27, '2024_03_11_031440_create_sales_order_table', 1),
(28, '2024_03_11_031454_create_picking_list_table', 1),
(29, '2024_03_11_031519_create_sales_order_approval_table', 1),
(30, '2024_03_11_031532_create_sales_invoices_table', 1),
(31, '2024_03_11_031618_create_unfulfilled_sales_order_table', 1),
(32, '2024_03_11_031649_create_histori_harga_jual_table', 1),
(33, '2024_03_11_031657_create_histori_jual_table', 1),
(34, '2024_03_11_031734_create_delivery_order_table', 1),
(35, '2024_03_11_031829_create_inventory_table', 1),
(36, '2024_03_11_031849_create_supplier_payment_table', 1),
(37, '2024_03_11_031855_create_customer_payment_table', 1),
(38, '2024_03_11_031901_create_akuntansi_table', 1),
(39, '2024_04_16_085137_add_columns_to_supplier_payment_table', 2),
(40, '2024_04_16_093841_add_columns_to_customer_payment_table', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `photo_user`
--

CREATE TABLE `photo_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userID` bigint(20) UNSIGNED NOT NULL,
  `namaFile` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `photo_user`
--

INSERT INTO `photo_user` (`id`, `userID`, `namaFile`, `created_at`, `updated_at`) VALUES
(1, 8, '2021_Toyota_Vellfire_Z_G_Edition_(front).jpg', '2024-04-01 06:12:29', '2024-04-01 06:12:29'),
(2, 9, 'byd_240129235333-621.jpeg', '2024-04-01 06:13:34', '2024-04-01 06:13:34'),
(3, 10, 'kegiatan-media-test-drive-wuling-binguo-ev-di-tangerang-foto-ajqt.jpg', '2024-04-01 06:17:16', '2024-04-01 06:17:16'),
(4, 11, 'Masalah-Toyota-Calya.jpg', '2024-04-16 07:06:20', '2024-04-16 07:06:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `picking_list`
--

CREATE TABLE `picking_list` (
  `pickingListID` bigint(20) UNSIGNED NOT NULL,
  `salesOrders` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `productID` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `partNo` varchar(50) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `vehicleType` bigint(20) UNSIGNED NOT NULL,
  `productCategory` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) NOT NULL,
  `min_stock` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `hpp` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `notes` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`productID`, `code`, `partNo`, `productName`, `vehicleType`, `productCategory`, `status`, `min_stock`, `stock`, `satuan`, `harga_beli`, `hpp`, `harga_jual`, `notes`, `created_at`, `updated_at`) VALUES
(1, '877-250', '37302-87502', 'Camshaft Avanza/Xenia/Gran Max 1.3', 1, 1, 'Active', 2, 20, 'SET', 250000, 275000, 308000, 'Test', '2024-04-01 09:41:25', '2024-04-01 09:41:25'),
(2, '877-247', '37302-87150', 'Camshaft Avanza/Xenia/Gran Max 1.5', 1, 1, 'Active', 3, 50, 'SET', 250000, 300000, 330000, 'Tes produk', '2024-04-03 04:08:44', '2024-04-03 04:08:44'),
(3, '877-287', '37302-87152', 'Camshaft Avanza/Xenia/Gran Max 1.33', 1, 1, 'Active', 5, 60, 'SET', 250000, 275000, 300000, 'Test', '2024-04-16 07:18:55', '2024-04-16 07:18:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_category`
--

CREATE TABLE `product_category` (
  `productCategoryID` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `product_category`
--

INSERT INTO `product_category` (`productCategoryID`, `category`, `created_at`, `updated_at`) VALUES
(1, 'FUJI BRAND AUTOMOTIVE PART', '2024-04-01 08:52:26', '2024-04-01 08:52:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `purchase_order`
--

CREATE TABLE `purchase_order` (
  `purchaseOrderID` bigint(20) UNSIGNED NOT NULL,
  `purchaseOrderNo` varchar(255) NOT NULL,
  `version` int(11) NOT NULL,
  `PODate` date NOT NULL,
  `supplier` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `purchase_order_approval`
--

CREATE TABLE `purchase_order_approval` (
  `purchaseOrderApprovalID` bigint(20) UNSIGNED NOT NULL,
  `purchaseOrderIDs` bigint(20) UNSIGNED NOT NULL,
  `approvalID` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `purchase_request`
--

CREATE TABLE `purchase_request` (
  `purchaseRequestID` bigint(20) UNSIGNED NOT NULL,
  `noPurchaseRequest` varchar(255) NOT NULL,
  `version` int(11) NOT NULL,
  `purchaseRequestDate` date NOT NULL,
  `requestor` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `requestorID` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `purchase_request_approval`
--

CREATE TABLE `purchase_request_approval` (
  `purchaseRequestApprovalID` bigint(20) UNSIGNED NOT NULL,
  `purchaseRequestIDs` bigint(20) UNSIGNED NOT NULL,
  `approvalID` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `salesman`
--

CREATE TABLE `salesman` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userID` bigint(20) UNSIGNED NOT NULL,
  `alias` varchar(20) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `salesman`
--

INSERT INTO `salesman` (`id`, `userID`, `alias`, `status`, `created_at`, `updated_at`) VALUES
(1, 8, 'AC', 'Active', '2024-04-01 06:17:49', '2024-04-01 06:17:49'),
(2, 10, 'IT', 'Active', '2024-04-01 08:53:47', '2024-04-01 08:53:47'),
(3, 9, 'UT', 'Active', '2024-04-01 08:54:05', '2024-04-01 08:54:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sales_invoices`
--

CREATE TABLE `sales_invoices` (
  `invoiceID` bigint(20) UNSIGNED NOT NULL,
  `SO` bigint(20) UNSIGNED NOT NULL,
  `invoiceNo` varchar(255) NOT NULL,
  `InvoiceDate` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sales_order`
--

CREATE TABLE `sales_order` (
  `salesOrderID` bigint(20) UNSIGNED NOT NULL,
  `salesOrderIDs` varchar(255) NOT NULL,
  `SODateCreated` date NOT NULL,
  `customers` bigint(20) UNSIGNED NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sales_order_approval`
--

CREATE TABLE `sales_order_approval` (
  `salesOrderApprovalID` bigint(20) UNSIGNED NOT NULL,
  `salesOrders` bigint(20) UNSIGNED NOT NULL,
  `approvalID` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `supplierID` bigint(20) UNSIGNED NOT NULL,
  `supplierIDs` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `supplierName` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `teleponHP` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `bayarPer` varchar(255) NOT NULL,
  `teleponFax` varchar(255) NOT NULL,
  `npwp` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`supplierID`, `supplierIDs`, `code`, `supplierName`, `alamat`, `contact`, `telepon`, `teleponHP`, `email`, `kategori`, `status`, `bayarPer`, `teleponFax`, `npwp`, `created_at`, `updated_at`) VALUES
(1, 'SUP-00001', '7.7', 'EN Production', 'Palmerah 250', 'EN', '02129278888', '081316446816', 'enproduction@gmail.com', 'Test', 'Active', 'Lump Sum', '0741258326', '--', '2024-04-01 09:23:54', '2024-04-01 09:23:54'),
(4, 'SUP-00002', '7.7', 'EN Productions', 'Test', 'EN', '0741258325', '081272668080', 'enproduction@gmail.com', 'Test', 'Active', 'Lump Sum', '0741258326', '--', '2024-04-15 04:47:41', '2024-04-15 04:47:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier_payment`
--

CREATE TABLE `supplier_payment` (
  `paymentID` bigint(20) UNSIGNED NOT NULL,
  `paymentNo` varchar(255) NOT NULL,
  `paymentDate` date NOT NULL,
  `invoiceIDs` bigint(20) UNSIGNED NOT NULL,
  `paymentTotal` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `payment_type` varchar(255) NOT NULL,
  `bank_noRek` varchar(255) NOT NULL,
  `payment_reference` varchar(255) NOT NULL,
  `notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `unfulfilled_sales_order`
--

CREATE TABLE `unfulfilled_sales_order` (
  `unfulfilledID` bigint(20) UNSIGNED NOT NULL,
  `SO` bigint(20) UNSIGNED NOT NULL,
  `version` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `userIDNo` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `perusahaan` varchar(255) NOT NULL,
  `branch` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `user_access` bigint(20) UNSIGNED NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`userIDNo`, `code`, `userName`, `nama`, `perusahaan`, `branch`, `department`, `user_access`, `status`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '1234', 'master123', 'Tes Master Data', 'PT. CHIS', 'master', 'Master', 1, 'Active', 'master@test.com', NULL, '$2y$12$pi4dyBNK4NUHcpMVBmmbRuo45cLtzU.3iUmnHMdNka9Hy7/7i7FRa', NULL, '2024-04-01 05:55:30', '2024-04-01 05:55:30'),
(2, '1475', 'admin123', 'Tes Admin Data', 'PT. CHIS', 'Admin', 'Admin', 3, 'Active', 'admin@test.com', NULL, '$2y$12$CmT9xX0unn15YxXTnmvtp.Bip2wv8GbWeQuDlHCdUEPv36ZvxJfey', NULL, '2024-04-01 05:55:30', '2024-04-01 05:55:30'),
(3, '2369', 'superadmin123', 'Tes Super Admin Data', 'PT. CHIS', 'Admin', 'Admin', 2, 'Active', 'superadmin@test.com', NULL, '$2y$12$hczOaMZNH35KK2fZR147X.3sqxcuVkr57LtLHS1KzUERRCDXicSK2', NULL, '2024-04-01 05:55:30', '2024-04-01 05:55:30'),
(4, '1596', 'warehouse', 'Warehouse', 'PT. CHIS', 'pusat', 'Warehouse', 4, 'Active', 'warehouse@test.com', NULL, '$2y$12$GQYAE04KWWNZtTA1wcHFSeEWe/8QHWSry3AFScTxE3/0JJ03nw7Ay', NULL, '2024-04-01 05:55:30', '2024-04-01 05:55:30'),
(5, '3214', 'sales123', 'Sales', 'PT. CHIS', 'pusat', 'Sales', 5, 'Active', 'sales@test.com', NULL, '$2y$12$mqkNeA1XvkpY3ubsDFtutOTnkFKqNawtbMdPLWbz2JlFPhJpJKFf.', NULL, '2024-04-01 05:55:30', '2024-04-01 05:55:30'),
(6, '4789', 'production123', 'Production', 'PT. CHIS', 'pusat', 'Production', 6, 'Active', 'production@test.com', NULL, '$2y$12$N6Wuh0ZHKcmBl2TMQhvnFOOfzHMFTgPLTI3wPy9LjY4lj/pL8QCyW', NULL, '2024-04-01 05:55:30', '2024-04-01 05:55:30'),
(7, '6357', 'finance123', 'Finance', 'PT. CHIS', 'pusat', 'Finance', 7, 'Active', 'finance@test.com', NULL, '$2y$12$VfMua1z.F1EHng2VEYRRbeT1OOpYot4BNbXK094xKQ.L5TVlx.L3W', NULL, '2024-04-01 05:55:30', '2024-04-01 05:55:30'),
(8, '6092', 'akiong', 'Aciap Kiong', 'PT. Cipta Harapan Indah Strategi', 'Pusat', 'Sales', 5, 'Active', 'akiong@gmail.com', NULL, '$2y$12$HGhszU4F50LFEV/BMTo8aObWKtpBkB0nOnnKNNb7KPsEa1JghtZLK', NULL, '2024-04-01 06:12:29', '2024-04-01 06:12:29'),
(9, '9330', 'untungHidayat', 'Untung Hidayat', 'PT. Cipta Harapan Indah Strategi', 'Pusat', 'Sales', 5, 'Active', 'untunghidayat@gmail.com', NULL, '$2y$12$Z8K3VxO4zFGLkkyJzTIO7udVlkCQ1My7kQRatyrlmacU/CdADWaDe', NULL, '2024-04-01 06:13:34', '2024-04-01 06:13:34'),
(10, '2893', 'iwan', 'Iwan Tan', 'PT. Cipta Harapan Indah Strategi', 'Pusat', 'Sales', 3, 'Active', 'iwan.tan@gmail.com', NULL, '$2y$12$bAeoZH5JdUvpg3QG7c9fkOxAbi8l1NgPCmgN4ZsiC6wkM.s7wkldy', NULL, '2024-04-01 06:17:16', '2024-04-01 10:55:32'),
(11, '1849', 'testcopydata', 'Test Copy Data', 'PT. Cipta Harapan Indah Strategi', 'Pusat', 'Sales', 3, 'Active', 'testcopy@gmail.com', NULL, '$2y$12$WyO/sodhN7FUS2UALc2oJuOafq0T59/ydi0NYqLsSdoNq9Xd7zvCq', NULL, '2024-04-16 07:06:20', '2024-04-16 07:06:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access`
--

CREATE TABLE `user_access` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_access` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `user_access`
--

INSERT INTO `user_access` (`id`, `user_access`, `created_at`, `updated_at`) VALUES
(1, 'Master', '2024-04-01 05:55:27', '2024-04-01 05:55:27'),
(2, 'Super Admin', '2024-04-01 05:55:27', '2024-04-01 05:55:27'),
(3, 'Admin', '2024-04-01 05:55:27', '2024-04-01 05:55:27'),
(4, 'Warehouse', '2024-04-01 05:55:27', '2024-04-01 05:55:27'),
(5, 'Sales', '2024-04-01 05:55:27', '2024-04-01 05:55:27'),
(6, 'Production', '2024-04-01 05:55:27', '2024-04-01 05:55:27'),
(7, 'Finance', '2024-04-01 05:55:27', '2024-04-01 05:55:27'),
(8, 'Back Office', '2024-04-01 05:55:27', '2024-04-01 05:55:27'),
(9, 'Admin Gudang', '2024-04-01 05:55:27', '2024-04-01 05:55:27'),
(10, 'Warehouse 2', '2024-04-01 05:55:27', '2024-04-01 05:55:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `vehicle_type`
--

CREATE TABLE `vehicle_type` (
  `vehicleTypeID` bigint(20) UNSIGNED NOT NULL,
  `ID` varchar(255) NOT NULL,
  `kendaraan` varchar(255) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `vehicle_type`
--

INSERT INTO `vehicle_type` (`vehicleTypeID`, `ID`, `kendaraan`, `type`, `created_at`, `updated_at`) VALUES
(1, '031-138', 'TOYOTA', 'TOYOTA AVANZA 1.3 VVT-i (K3-VE)', '2024-04-01 08:53:08', '2024-04-01 08:53:08'),
(2, '031-110', 'HINO', 'HINO 500 RANGER', '2024-04-01 08:53:19', '2024-04-01 08:53:19'),
(3, '031-139', 'DAIHATSU', 'DAIHATSU XENIA/GRAN MAX/YR-V 1.3 VVT-i', '2024-04-01 08:53:30', '2024-04-01 08:53:30'),
(4, '031-140', 'TOYOTA', 'TOYOTA AVANZA 1.5 VVT-i (3SZ-VE)', '2024-04-03 04:06:38', '2024-04-03 04:06:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `warehouse`
--

CREATE TABLE `warehouse` (
  `warehouseID` bigint(20) UNSIGNED NOT NULL,
  `warehouseIDs` varchar(255) NOT NULL,
  `warehouseName` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `teleponHP` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `warehouse`
--

INSERT INTO `warehouse` (`warehouseID`, `warehouseIDs`, `warehouseName`, `alamat`, `contact`, `telepon`, `teleponHP`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Test', 'Test Warehouse', 'Alamat Test Warehouse', 'Akiongs', '0271223565', '085700088831', 'warehouse1@gmail.com', 'Active', '2024-04-15 13:49:32', '2024-04-15 13:49:32');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akuntansi`
--
ALTER TABLE `akuntansi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `akuntansi_akunid_unique` (`akunID`),
  ADD KEY `akuntansi_kodeid_debet_foreign` (`kodeID_debet`),
  ADD KEY `akuntansi_kodeid_kredit_foreign` (`kodeID_kredit`),
  ADD KEY `akuntansi_user_input_foreign` (`user_input`),
  ADD KEY `akuntansi_user_ubah_foreign` (`user_ubah`);

--
-- Indeks untuk tabel `approval`
--
ALTER TABLE `approval`
  ADD PRIMARY KEY (`approvalID`),
  ADD KEY `approval_userid_foreign` (`userID`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerID`),
  ADD UNIQUE KEY `customer_customerids_unique` (`customerIDs`),
  ADD KEY `customer_useridsales_foreign` (`userIDSales`);

--
-- Indeks untuk tabel `customer_payment`
--
ALTER TABLE `customer_payment`
  ADD PRIMARY KEY (`paymentID`),
  ADD KEY `customer_payment_invoiceid_foreign` (`invoiceID`);

--
-- Indeks untuk tabel `delivery_order`
--
ALTER TABLE `delivery_order`
  ADD PRIMARY KEY (`deliveryOrderID`),
  ADD KEY `delivery_order_so_foreign` (`SO`),
  ADD KEY `delivery_order_invoiceids_foreign` (`invoiceIDs`),
  ADD KEY `delivery_order_forwarderid_foreign` (`forwarderID`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `forwarder`
--
ALTER TABLE `forwarder`
  ADD PRIMARY KEY (`forwaderID`);

--
-- Indeks untuk tabel `foto_product`
--
ALTER TABLE `foto_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foto_product_productid_foreign` (`productID`);

--
-- Indeks untuk tabel `goods_recieved_notes`
--
ALTER TABLE `goods_recieved_notes`
  ADD PRIMARY KEY (`goodsRecievedID`),
  ADD KEY `goods_recieved_notes_warehouseid_foreign` (`warehouseID`),
  ADD KEY `goods_recieved_notes_purchaseorderid_foreign` (`purchaseOrderID`);

--
-- Indeks untuk tabel `histori_beli`
--
ALTER TABLE `histori_beli`
  ADD PRIMARY KEY (`historiPembelianID`),
  ADD KEY `histori_beli_purchaseorderids_foreign` (`purchaseOrderIDs`),
  ADD KEY `histori_beli_part_no_foreign` (`part_no`);

--
-- Indeks untuk tabel `histori_harga_beli`
--
ALTER TABLE `histori_harga_beli`
  ADD PRIMARY KEY (`historiHargaPembelianID`),
  ADD KEY `histori_harga_beli_purchaseorderids_foreign` (`purchaseOrderIDs`),
  ADD KEY `histori_harga_beli_part_no_foreign` (`part_no`);

--
-- Indeks untuk tabel `histori_harga_jual`
--
ALTER TABLE `histori_harga_jual`
  ADD PRIMARY KEY (`historiHargaJualID`),
  ADD KEY `histori_harga_jual_salesorderids_foreign` (`salesOrderIDs`),
  ADD KEY `histori_harga_jual_part_no_foreign` (`part_no`);

--
-- Indeks untuk tabel `histori_jual`
--
ALTER TABLE `histori_jual`
  ADD PRIMARY KEY (`historiJualID`),
  ADD KEY `histori_jual_salesorderids_foreign` (`salesOrderIDs`),
  ADD KEY `histori_jual_part_no_foreign` (`part_no`);

--
-- Indeks untuk tabel `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`inventoryID`),
  ADD KEY `inventory_productids_foreign` (`productIDs`);

--
-- Indeks untuk tabel `invoices_recieved`
--
ALTER TABLE `invoices_recieved`
  ADD PRIMARY KEY (`invoicesRecievedID`),
  ADD KEY `invoices_recieved_warehouseid_foreign` (`warehouseID`),
  ADD KEY `invoices_recieved_purchaseorderid_foreign` (`purchaseOrderID`);

--
-- Indeks untuk tabel `kode_akun`
--
ALTER TABLE `kode_akun`
  ADD PRIMARY KEY (`kode_akun`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `photo_user`
--
ALTER TABLE `photo_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `photo_user_userid_foreign` (`userID`);

--
-- Indeks untuk tabel `picking_list`
--
ALTER TABLE `picking_list`
  ADD PRIMARY KEY (`pickingListID`),
  ADD KEY `picking_list_salesorders_foreign` (`salesOrders`);

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productID`),
  ADD KEY `product_vehicletype_foreign` (`vehicleType`),
  ADD KEY `product_productcategory_foreign` (`productCategory`);

--
-- Indeks untuk tabel `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`productCategoryID`);

--
-- Indeks untuk tabel `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD PRIMARY KEY (`purchaseOrderID`),
  ADD UNIQUE KEY `purchase_order_purchaseorderno_unique` (`purchaseOrderNo`),
  ADD KEY `purchase_order_supplier_foreign` (`supplier`);

--
-- Indeks untuk tabel `purchase_order_approval`
--
ALTER TABLE `purchase_order_approval`
  ADD PRIMARY KEY (`purchaseOrderApprovalID`),
  ADD KEY `purchase_order_approval_purchaseorderids_foreign` (`purchaseOrderIDs`);

--
-- Indeks untuk tabel `purchase_request`
--
ALTER TABLE `purchase_request`
  ADD PRIMARY KEY (`purchaseRequestID`),
  ADD KEY `purchase_request_requestorid_foreign` (`requestorID`);

--
-- Indeks untuk tabel `purchase_request_approval`
--
ALTER TABLE `purchase_request_approval`
  ADD PRIMARY KEY (`purchaseRequestApprovalID`),
  ADD KEY `purchase_request_approval_purchaserequestids_foreign` (`purchaseRequestIDs`);

--
-- Indeks untuk tabel `salesman`
--
ALTER TABLE `salesman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `salesman_userid_foreign` (`userID`);

--
-- Indeks untuk tabel `sales_invoices`
--
ALTER TABLE `sales_invoices`
  ADD PRIMARY KEY (`invoiceID`),
  ADD KEY `sales_invoices_so_foreign` (`SO`);

--
-- Indeks untuk tabel `sales_order`
--
ALTER TABLE `sales_order`
  ADD PRIMARY KEY (`salesOrderID`),
  ADD UNIQUE KEY `sales_order_salesorderids_unique` (`salesOrderIDs`),
  ADD KEY `sales_order_customers_foreign` (`customers`);

--
-- Indeks untuk tabel `sales_order_approval`
--
ALTER TABLE `sales_order_approval`
  ADD PRIMARY KEY (`salesOrderApprovalID`),
  ADD KEY `sales_order_approval_salesorders_foreign` (`salesOrders`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplierID`),
  ADD UNIQUE KEY `supplier_supplierids_unique` (`supplierIDs`);

--
-- Indeks untuk tabel `supplier_payment`
--
ALTER TABLE `supplier_payment`
  ADD PRIMARY KEY (`paymentID`),
  ADD KEY `supplier_payment_invoiceids_foreign` (`invoiceIDs`);

--
-- Indeks untuk tabel `unfulfilled_sales_order`
--
ALTER TABLE `unfulfilled_sales_order`
  ADD PRIMARY KEY (`unfulfilledID`),
  ADD KEY `unfulfilled_sales_order_so_foreign` (`SO`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userIDNo`),
  ADD UNIQUE KEY `users_username_unique` (`userName`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_user_access_foreign` (`user_access`);

--
-- Indeks untuk tabel `user_access`
--
ALTER TABLE `user_access`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `vehicle_type`
--
ALTER TABLE `vehicle_type`
  ADD PRIMARY KEY (`vehicleTypeID`);

--
-- Indeks untuk tabel `warehouse`
--
ALTER TABLE `warehouse`
  ADD PRIMARY KEY (`warehouseID`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akuntansi`
--
ALTER TABLE `akuntansi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `approval`
--
ALTER TABLE `approval`
  MODIFY `approvalID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `customerID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `customer_payment`
--
ALTER TABLE `customer_payment`
  MODIFY `paymentID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `delivery_order`
--
ALTER TABLE `delivery_order`
  MODIFY `deliveryOrderID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `forwarder`
--
ALTER TABLE `forwarder`
  MODIFY `forwaderID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `foto_product`
--
ALTER TABLE `foto_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `goods_recieved_notes`
--
ALTER TABLE `goods_recieved_notes`
  MODIFY `goodsRecievedID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `histori_beli`
--
ALTER TABLE `histori_beli`
  MODIFY `historiPembelianID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `histori_harga_beli`
--
ALTER TABLE `histori_harga_beli`
  MODIFY `historiHargaPembelianID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `histori_harga_jual`
--
ALTER TABLE `histori_harga_jual`
  MODIFY `historiHargaJualID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `histori_jual`
--
ALTER TABLE `histori_jual`
  MODIFY `historiJualID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `inventory`
--
ALTER TABLE `inventory`
  MODIFY `inventoryID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `invoices_recieved`
--
ALTER TABLE `invoices_recieved`
  MODIFY `invoicesRecievedID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `photo_user`
--
ALTER TABLE `photo_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `picking_list`
--
ALTER TABLE `picking_list`
  MODIFY `pickingListID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `productID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `product_category`
--
ALTER TABLE `product_category`
  MODIFY `productCategoryID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `purchase_order`
--
ALTER TABLE `purchase_order`
  MODIFY `purchaseOrderID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `purchase_order_approval`
--
ALTER TABLE `purchase_order_approval`
  MODIFY `purchaseOrderApprovalID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `purchase_request`
--
ALTER TABLE `purchase_request`
  MODIFY `purchaseRequestID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `purchase_request_approval`
--
ALTER TABLE `purchase_request_approval`
  MODIFY `purchaseRequestApprovalID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `salesman`
--
ALTER TABLE `salesman`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `sales_invoices`
--
ALTER TABLE `sales_invoices`
  MODIFY `invoiceID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `sales_order`
--
ALTER TABLE `sales_order`
  MODIFY `salesOrderID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `sales_order_approval`
--
ALTER TABLE `sales_order_approval`
  MODIFY `salesOrderApprovalID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplierID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `supplier_payment`
--
ALTER TABLE `supplier_payment`
  MODIFY `paymentID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `unfulfilled_sales_order`
--
ALTER TABLE `unfulfilled_sales_order`
  MODIFY `unfulfilledID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `userIDNo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `user_access`
--
ALTER TABLE `user_access`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `vehicle_type`
--
ALTER TABLE `vehicle_type`
  MODIFY `vehicleTypeID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `warehouse`
--
ALTER TABLE `warehouse`
  MODIFY `warehouseID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `akuntansi`
--
ALTER TABLE `akuntansi`
  ADD CONSTRAINT `akuntansi_kodeid_debet_foreign` FOREIGN KEY (`kodeID_debet`) REFERENCES `kode_akun` (`kode_akun`),
  ADD CONSTRAINT `akuntansi_kodeid_kredit_foreign` FOREIGN KEY (`kodeID_kredit`) REFERENCES `kode_akun` (`kode_akun`),
  ADD CONSTRAINT `akuntansi_user_input_foreign` FOREIGN KEY (`user_input`) REFERENCES `users` (`userIDNo`),
  ADD CONSTRAINT `akuntansi_user_ubah_foreign` FOREIGN KEY (`user_ubah`) REFERENCES `users` (`userIDNo`);

--
-- Ketidakleluasaan untuk tabel `approval`
--
ALTER TABLE `approval`
  ADD CONSTRAINT `approval_userid_foreign` FOREIGN KEY (`userID`) REFERENCES `users` (`userIDNo`);

--
-- Ketidakleluasaan untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_useridsales_foreign` FOREIGN KEY (`userIDSales`) REFERENCES `salesman` (`id`);

--
-- Ketidakleluasaan untuk tabel `customer_payment`
--
ALTER TABLE `customer_payment`
  ADD CONSTRAINT `customer_payment_invoiceid_foreign` FOREIGN KEY (`invoiceID`) REFERENCES `sales_invoices` (`invoiceID`);

--
-- Ketidakleluasaan untuk tabel `delivery_order`
--
ALTER TABLE `delivery_order`
  ADD CONSTRAINT `delivery_order_forwarderid_foreign` FOREIGN KEY (`forwarderID`) REFERENCES `forwarder` (`forwaderID`),
  ADD CONSTRAINT `delivery_order_invoiceids_foreign` FOREIGN KEY (`invoiceIDs`) REFERENCES `sales_invoices` (`invoiceID`),
  ADD CONSTRAINT `delivery_order_so_foreign` FOREIGN KEY (`SO`) REFERENCES `sales_order` (`salesOrderID`);

--
-- Ketidakleluasaan untuk tabel `foto_product`
--
ALTER TABLE `foto_product`
  ADD CONSTRAINT `foto_product_productid_foreign` FOREIGN KEY (`productID`) REFERENCES `product` (`productID`);

--
-- Ketidakleluasaan untuk tabel `goods_recieved_notes`
--
ALTER TABLE `goods_recieved_notes`
  ADD CONSTRAINT `goods_recieved_notes_purchaseorderid_foreign` FOREIGN KEY (`purchaseOrderID`) REFERENCES `purchase_order` (`purchaseOrderID`),
  ADD CONSTRAINT `goods_recieved_notes_warehouseid_foreign` FOREIGN KEY (`warehouseID`) REFERENCES `warehouse` (`warehouseID`);

--
-- Ketidakleluasaan untuk tabel `histori_beli`
--
ALTER TABLE `histori_beli`
  ADD CONSTRAINT `histori_beli_part_no_foreign` FOREIGN KEY (`part_no`) REFERENCES `product` (`productID`),
  ADD CONSTRAINT `histori_beli_purchaseorderids_foreign` FOREIGN KEY (`purchaseOrderIDs`) REFERENCES `purchase_order` (`purchaseOrderID`);

--
-- Ketidakleluasaan untuk tabel `histori_harga_beli`
--
ALTER TABLE `histori_harga_beli`
  ADD CONSTRAINT `histori_harga_beli_part_no_foreign` FOREIGN KEY (`part_no`) REFERENCES `product` (`productID`),
  ADD CONSTRAINT `histori_harga_beli_purchaseorderids_foreign` FOREIGN KEY (`purchaseOrderIDs`) REFERENCES `purchase_order` (`purchaseOrderID`);

--
-- Ketidakleluasaan untuk tabel `histori_harga_jual`
--
ALTER TABLE `histori_harga_jual`
  ADD CONSTRAINT `histori_harga_jual_part_no_foreign` FOREIGN KEY (`part_no`) REFERENCES `product` (`productID`),
  ADD CONSTRAINT `histori_harga_jual_salesorderids_foreign` FOREIGN KEY (`salesOrderIDs`) REFERENCES `sales_order` (`salesOrderID`);

--
-- Ketidakleluasaan untuk tabel `histori_jual`
--
ALTER TABLE `histori_jual`
  ADD CONSTRAINT `histori_jual_part_no_foreign` FOREIGN KEY (`part_no`) REFERENCES `product` (`productID`),
  ADD CONSTRAINT `histori_jual_salesorderids_foreign` FOREIGN KEY (`salesOrderIDs`) REFERENCES `sales_order` (`salesOrderID`);

--
-- Ketidakleluasaan untuk tabel `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_productids_foreign` FOREIGN KEY (`productIDs`) REFERENCES `product` (`productID`);

--
-- Ketidakleluasaan untuk tabel `invoices_recieved`
--
ALTER TABLE `invoices_recieved`
  ADD CONSTRAINT `invoices_recieved_purchaseorderid_foreign` FOREIGN KEY (`purchaseOrderID`) REFERENCES `purchase_order` (`purchaseOrderID`),
  ADD CONSTRAINT `invoices_recieved_warehouseid_foreign` FOREIGN KEY (`warehouseID`) REFERENCES `warehouse` (`warehouseID`);

--
-- Ketidakleluasaan untuk tabel `photo_user`
--
ALTER TABLE `photo_user`
  ADD CONSTRAINT `photo_user_userid_foreign` FOREIGN KEY (`userID`) REFERENCES `users` (`userIDNo`);

--
-- Ketidakleluasaan untuk tabel `picking_list`
--
ALTER TABLE `picking_list`
  ADD CONSTRAINT `picking_list_salesorders_foreign` FOREIGN KEY (`salesOrders`) REFERENCES `sales_order` (`salesOrderID`);

--
-- Ketidakleluasaan untuk tabel `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_productcategory_foreign` FOREIGN KEY (`productCategory`) REFERENCES `product_category` (`productCategoryID`),
  ADD CONSTRAINT `product_vehicletype_foreign` FOREIGN KEY (`vehicleType`) REFERENCES `vehicle_type` (`vehicleTypeID`);

--
-- Ketidakleluasaan untuk tabel `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD CONSTRAINT `purchase_order_supplier_foreign` FOREIGN KEY (`supplier`) REFERENCES `supplier` (`supplierID`);

--
-- Ketidakleluasaan untuk tabel `purchase_order_approval`
--
ALTER TABLE `purchase_order_approval`
  ADD CONSTRAINT `purchase_order_approval_purchaseorderids_foreign` FOREIGN KEY (`purchaseOrderIDs`) REFERENCES `purchase_order` (`purchaseOrderID`);

--
-- Ketidakleluasaan untuk tabel `purchase_request`
--
ALTER TABLE `purchase_request`
  ADD CONSTRAINT `purchase_request_requestorid_foreign` FOREIGN KEY (`requestorID`) REFERENCES `warehouse` (`warehouseID`);

--
-- Ketidakleluasaan untuk tabel `purchase_request_approval`
--
ALTER TABLE `purchase_request_approval`
  ADD CONSTRAINT `purchase_request_approval_purchaserequestids_foreign` FOREIGN KEY (`purchaseRequestIDs`) REFERENCES `purchase_request` (`purchaseRequestID`);

--
-- Ketidakleluasaan untuk tabel `salesman`
--
ALTER TABLE `salesman`
  ADD CONSTRAINT `salesman_userid_foreign` FOREIGN KEY (`userID`) REFERENCES `users` (`userIDNo`);

--
-- Ketidakleluasaan untuk tabel `sales_invoices`
--
ALTER TABLE `sales_invoices`
  ADD CONSTRAINT `sales_invoices_so_foreign` FOREIGN KEY (`SO`) REFERENCES `sales_order` (`salesOrderID`);

--
-- Ketidakleluasaan untuk tabel `sales_order`
--
ALTER TABLE `sales_order`
  ADD CONSTRAINT `sales_order_customers_foreign` FOREIGN KEY (`customers`) REFERENCES `customer` (`customerID`);

--
-- Ketidakleluasaan untuk tabel `sales_order_approval`
--
ALTER TABLE `sales_order_approval`
  ADD CONSTRAINT `sales_order_approval_salesorders_foreign` FOREIGN KEY (`salesOrders`) REFERENCES `sales_order` (`salesOrderID`);

--
-- Ketidakleluasaan untuk tabel `supplier_payment`
--
ALTER TABLE `supplier_payment`
  ADD CONSTRAINT `supplier_payment_invoiceids_foreign` FOREIGN KEY (`invoiceIDs`) REFERENCES `invoices_recieved` (`invoicesRecievedID`);

--
-- Ketidakleluasaan untuk tabel `unfulfilled_sales_order`
--
ALTER TABLE `unfulfilled_sales_order`
  ADD CONSTRAINT `unfulfilled_sales_order_so_foreign` FOREIGN KEY (`SO`) REFERENCES `sales_order` (`salesOrderID`);

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_user_access_foreign` FOREIGN KEY (`user_access`) REFERENCES `user_access` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
