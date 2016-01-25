<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class Bilangan extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function pecahan($x) {

        if(preg_match("/[^0-9+]/", $x))
            abort(404, "invalid input");

        if($x >= 1000000000)
            abort(404, "invalid input");

        $hasil = trim($this->terbilang(ltrim($x, '0')));

        $hasil = str_replace("  ", " ", $hasil);

        return $hasil;

    }

    public function terbilang($x) {

        $abil = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
        if ($x < 12)
            return " " . $abil[$x];
        elseif ($x < 20)
            return $this->terbilang($x - 10) . " belas";
        elseif ($x < 100)
            return $this->terbilang($x / 10) . " puluh" . $this->terbilang($x % 10);
        elseif ($x < 200)
            return " seratus" . $this->terbilang($x - 100);
        elseif ($x < 1000)
            return $this->terbilang($x / 100) . " ratus" . $this->terbilang($x % 100);
        elseif ($x < 2000)
            return " seribu" . $this->terbilang($x - 1000);
        elseif ($x < 1000000)
            return $this->terbilang($x / 1000) . " ribu" . $this->terbilang($x % 1000);
        elseif ($x < 1000000000)
            return $this->terbilang($x / 1000000) . " juta" . $this->terbilang($x % 1000000);

    }
}
