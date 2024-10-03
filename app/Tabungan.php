<?php

namespace App;

class Tabungan
{
    private  $saldo;

    public function __construct($saldo = 1000)
    {
        $this->saldo = $saldo;
    }

    function checkSaldo()
    {
        return $this->saldo;
    }
}
