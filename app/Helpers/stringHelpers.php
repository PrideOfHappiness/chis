<!-- Untuk mengembangkan kode tersebut agar dapat menghapus kata belakang yang mengandung nama brand, kita bisa mengambil daftar nama brand dari model Brand dan memeriksa apakah kata terakhir pada part_no mengandung salah satu nama brand tersebut. Jika iya, kita akan menghapus kata tersebut.

Berikut adalah langkah-langkahnya:

    Membuat fungsi helper untuk menghapus kata belakang yang mengandung nama brand:
    Modifikasi pada Controller untuk mengambil nama brand:
    Modifikasi pada View untuk menerapkan fungsi penghapusan kata belakang

1. Membuat fungsi helper

Buat file helper baru di dalam folder app/Helpers (jika belum ada, buat foldernya), misalnya StringHelpers.php, dan tambahkan fungsi berikut: -->

<?php

namespace App\Helpers;

use App\Models\Brand;

class StringHelpers {
    public static function removeBrandFromEnd($string, $brands) {
        $words = explode(' ', $string);
        $lastWord = end($words);

        foreach ($brands as $brand) {
            if (stripos($lastWord, $brand->brand) !== false) {
                array_pop($words);
                break;
            }
        }

        return implode(' ', $words);
    }
}