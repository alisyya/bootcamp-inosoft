<?php

namespace Calculator;

include_once 'Calculation.php';

use Calculation\Calculation;

class Calculator extends Calculation
{
    public function __construct()
    {
        return parent::__construct(5);
    }
}

function operasi($calc)
{
    while (1) {
        print_r("\n  1.Penambahan \n");
        print_r("  2.Pengurangan\n");
        print_r("  3.Perkalian  \n");
        print_r("  4.Pembagian  \n");
        print_r("  5.Pemangkatan\n");
        print_r("  6.Isi Daya   \n");
        $bil = readline("\nMasukan Operasi : ");
        if (is_numeric($bil)) {
            if ($bil == 6) {
                $calc->tambahDaya();
            } else if ($bil < 6 && $bil > 0) {
                $bil1 = readline("masukan bilangan pertama : ");
                $bil2 = readline("masukan bilangan kedua : ");
                echo $calc->Hitung($bil1,$bil2,$bil);
            }
        } else {
            print_r("Tidak Menemukan Operasi");
        }

    }
}

echo "<======= Pilih Kalkulator =========> \n";
echo "1.kalkulator biasa \n";
echo "2.kalkulator hemat \n";
$bil = readline("\t");
if ($bil == 1) {
    return operasi(new Calculation(10));
} else if ($bil == 2) {
    return operasi(new Calculator());
} else {
    throw new Exception("Tidak menemukan kalkulator");
}
