<?php

namespace Calculation;

class Calculation
{
    public $daya;
    public int $biaya;

    public function __construct($biaya)
    {
        $this->biaya = $biaya;
        $this->daya = 0;
    }

    public function Limit(float $nilai)
    {
        $nilai > 1000000 ? print_r('Hasil Harus Dibawah 1000000') : printf(PHP_EOL, print_r('Hasil : ' . $nilai));
    }

    public function Hitung(float $bil1, float $bil2, float $bil)
    {
        $this->cekDaya();

        $this->daya -= $this->biaya;


        switch ($bil) {
            case "1":
                return $this->Limit($bil1 + $bil2);
            case "2":
                return $this->Limit($bil1 - $bil2);
            case "3":
                return $this->Limit($bil1 * $bil2);
            case "4":
                return $this->Limit($bil1 / $bil2);
            case "5":
                return $this->Limit($bil1 ** $bil2);
            default:
                throw new Exception("Tidak Menemukan opreasi");
        }

    }

    public function tambahDaya()
    {
        print_r("Daya Sekarang : " . $this->daya += 20);
    }

    public function cekDaya()
    {
        if ($this->daya <= 5) throw new Exception("Daya Kurang \n");
    }

}
