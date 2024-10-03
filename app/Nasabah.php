<?php

namespace App;

class Nasabah
{
    private  $tabungan;

    public function __construct(Tabungan $tabungan)
    {
        $this->tabungan = $tabungan;
    }

    function lihatSaldo()
    {
        return $this->tabungan->checkSaldo();
    }
}
