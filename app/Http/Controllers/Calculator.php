<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class Calculator extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function hitung($str) {

        $operand = array("+", "-", "*", "/");
        
        if(preg_match("/[^0-9+\-*\/()(sqrt)(pow), ]+/", $str))
            abort(404, "invalid input");

        $hitung = preg_replace("/[^0-9+\-*\/()(sqrt)(pow), ]+/", "", $str);

        $split = str_split($hitung);

        #cek dua atau lebih operand bersebelahan
        for($i=0;$i<count($split);$i++) {
            if(in_array($split[$i],$operand) and in_array($split[$i+1],$operand)) {
                if($split[$i+1] == "-" and is_numeric($split[$i+2]))
                    continue;
                else
                    abort(404, "invalid input");
            }
        }

        #$hasil = create_function("", "return ($hitung);");
        $hasil = eval("return ($hitung);");

        if(!$hasil)
            abort(404, "invalid input");

        return $hasil;
    }
}
