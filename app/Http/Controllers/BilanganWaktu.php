<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Bilangan;

class BilanganWaktu extends Controller {
    
    public function terbilang($time) {
        
        if(preg_match("/[^0-9:]/", $time))
            abort(404, "invalid input");

         //Inisialisasi
        $waktu = '';
        $menitt = '';
        $prefix='jam ';

        $time2 = explode(":", $time);

        $bilangan = new Bilangan();

        try
        {
            $jam = (int)$time2[0];
            $menit = (int)$time2[1];
            $timer=(int)str_replace(":",'',$time);  //22:30  = 2230, 18:00 -> 1800
            $date = date('H:i',strtotime($waktu));    //22:33 22,33
            if(strlen($time2[1])==1)                    //2:2
                abort(404, "invalid input");
            #echo $timer;
            //Ketentuan Waktu
            if($timer == 0 || $jam==0){
                $waktu = ' malam';
                $jam = 24;
            }
            else if($timer>=100 && $timer<=500)
                $waktu = ' subuh';
            elseif($timer>=501 && $timer<=1100)
                $waktu = ' pagi';
            elseif($timer>=1101 && $timer<=1400)
                $waktu = ' siang';
            elseif($timer>=1401 && $timer<=1800)
                $waktu = ' sore';
            elseif($timer>=1801 && $timer<=2359)
                $waktu = ' malam';
            elseif($timer>2359)                         //24:30. 25:00
                throw new \Exception("Input Salah");
            //Ketentuan jika > 12 siang
            if($timer>1200 || $timer==0 || $jam == 24)
                $jam = $jam-12;
            //Hitung Menit Cuy
            if($menit>59)
                abort(404, "invalid input");
            else if($menit==30)
            {
                $prefix .='setengah ';
                $jam+=1;
            }
            else if($menit==15)
            {
                $menitt = ' seperempat';
            }
            else if($menit==45)
            {
                $menitt = ' kurang seperempat';
                $jam+=1;
            }
            else if($menit>0)
            {
                $menitt = ' lewat '.$bilangan->pecahan($menit);
            }
            //echo $menit;
            return $prefix.$bilangan->pecahan($jam).$menitt.$waktu;
        }
        catch(Exception $ex){
            return $ex;
        }
    }
}
