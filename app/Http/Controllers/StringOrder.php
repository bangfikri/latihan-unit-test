<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class StringOrder extends Controller
{
    public function sort($string)
    {
        if(preg_match("/[^a-zA-Z ]/", $string))
            abort(404, "invalid input");
        $string = preg_replace("/[^a-zA-Z]+/", "", $string);
        $stringPart = str_split($string);
        sort($stringPart);
        #$stringSorted = implode('', $stringPart);
        $temp = '';
        $stringSorted = '';
        foreach ($stringPart as $value) {
            if($value == $temp)
                continue;
            $stringSorted .= $value;
            $temp = $value;
        }
        return $stringSorted;
    }
}
