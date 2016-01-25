<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Http\Controllers\BilanganWaktu;

class BilanganWaktuTest extends TestCase
{
    
    public function test1()
    {
    	$jam = new BilanganWaktu();
    	$terbilang = $jam->terbilang("14:00");
        $this->assertEquals("jam dua siang", $terbilang);
    }
    public function test2()
    {
    	$jam = new BilanganWaktu();
    	$terbilang = $jam->terbilang("11:00");
        $this->assertEquals("jam sebelas pagi", $terbilang);
    }
    public function test3()
    {
    	$jam = new BilanganWaktu();
    	$terbilang = $jam->terbilang("18:00");
        $this->assertEquals("jam enam sore", $terbilang);
    }
    public function test4()
    {
    	$jam = new BilanganWaktu();
    	$terbilang = $jam->terbilang("05:00");
        $this->assertEquals("jam lima subuh", $terbilang);
    }
	/**
	 * @expectedException Exception
	 */
    public function test5()
    {
    	$jam = new BilanganWaktu();
    	$terbilang = $jam->terbilang("24:00");
        $this->assertEquals("jam dua belas malam", $terbilang);
    }
    public function test6()
    {
    	$jam = new BilanganWaktu();
    	$terbilang = $jam->terbilang("13:30");
        $this->assertEquals("jam setengah dua siang", $terbilang);
    }
    public function test7()
    {
    	$jam = new BilanganWaktu();
    	$terbilang = $jam->terbilang("11:15");
        $this->assertEquals("jam sebelas seperempat siang", $terbilang);
    }
    public function test8()
    {
    	$jam = new BilanganWaktu();
    	$terbilang = $jam->terbilang("12:45");
        $this->assertEquals("jam satu kurang seperempat siang", $terbilang);
    }
    public function test9()
    {
    	$jam = new BilanganWaktu();
    	$terbilang = $jam->terbilang("05:30");
        $this->assertEquals("jam setengah enam pagi", $terbilang);
    }
    public function test10()
    {
    	$jam = new BilanganWaktu();
    	$terbilang = $jam->terbilang("10:45");
        $this->assertEquals("jam sebelas kurang seperempat pagi", $terbilang);
    }
    public function test11()
    {
    	$jam = new BilanganWaktu();
    	$terbilang = $jam->terbilang("07:15");
        $this->assertEquals("jam tujuh seperempat pagi", $terbilang);
    }
    public function test12()
    {
    	$jam = new BilanganWaktu();
    	$terbilang = $jam->terbilang("15:30");
        $this->assertEquals("jam setengah empat sore", $terbilang);
    }
    public function test13()
    {
    	$jam = new BilanganWaktu();
    	$terbilang = $jam->terbilang("16:15");
        $this->assertEquals("jam empat seperempat sore", $terbilang);
    }
    public function test14()
    {
    	$jam = new BilanganWaktu();
    	$terbilang = $jam->terbilang("14:45");
        $this->assertEquals("jam tiga kurang seperempat sore", $terbilang);
    }
    public function test15()
    {
    	$jam = new BilanganWaktu();
    	$terbilang = $jam->terbilang("01:30");
        $this->assertEquals("jam setengah dua subuh", $terbilang);
    }
    public function test16()
    {
    	$jam = new BilanganWaktu();
    	$terbilang = $jam->terbilang("04:45");
        $this->assertEquals("jam lima kurang seperempat subuh", $terbilang);
    }
    public function test17()
    {
    	$jam = new BilanganWaktu();
    	$terbilang = $jam->terbilang("03:15");
        $this->assertEquals("jam tiga seperempat subuh", $terbilang);
    }
    public function test18()
    {
    	$jam = new BilanganWaktu();
    	$terbilang = $jam->terbilang("20:30");
        $this->assertEquals("jam setengah sembilan malam", $terbilang);
    }
    public function test19()
    {
    	$jam = new BilanganWaktu();
    	$terbilang = $jam->terbilang("22:15");
        $this->assertEquals("jam sepuluh seperempat malam", $terbilang);
    }
    public function test20()
    {
    	$jam = new BilanganWaktu();
    	$terbilang = $jam->terbilang("23:45");
        $this->assertEquals("jam dua belas kurang seperempat malam", $terbilang);
    }
    public function test21()
    {
    	$jam = new BilanganWaktu();
    	$terbilang = $jam->terbilang("00:01");
        $this->assertEquals("jam dua belas lewat satu malam", $terbilang);
    }
    public function test22()
    {
    	$jam = new BilanganWaktu();
    	$terbilang = $jam->terbilang("00:59");
        $this->assertEquals("jam dua belas lewat lima puluh sembilan malam", $terbilang);
    }
    public function test23()
    {
    	$jam = new BilanganWaktu();
    	$terbilang = $jam->terbilang("18:01");
        $this->assertEquals("jam enam lewat satu malam", $terbilang);
    }
    public function test24()
    {
    	$jam = new BilanganWaktu();
    	$terbilang = $jam->terbilang("14:01"); 
        $this->assertEquals("jam dua lewat satu sore", $terbilang);
    }
    public function test25()
    {
    	$jam = new BilanganWaktu();
    	$terbilang = $jam->terbilang("00:00"); 
        $this->assertEquals("jam dua belas malam", $terbilang);
    }
    public function test26()
    {
    	$jam = new BilanganWaktu();
    	$terbilang = $jam->terbilang("11:01"); 
        $this->assertEquals("jam sebelas lewat satu siang", $terbilang);
    }
    public function test27()
    {
    	$jam = new BilanganWaktu();
    	$terbilang = $jam->terbilang("05:01"); 
        $this->assertEquals("jam lima lewat satu pagi", $terbilang);
    }
    public function test28()
    {
    	$jam = new BilanganWaktu();
    	$terbilang = $jam->terbilang("02:13"); 
        $this->assertEquals("jam dua lewat tiga belas subuh", $terbilang);
    }
    public function test29()
    {
    	$jam = new BilanganWaktu();
    	$terbilang = $jam->terbilang("21:31"); 
        $this->assertEquals("jam sembilan lewat tiga puluh satu malam", $terbilang);
    }
    public function test30()
    {
    	$jam = new BilanganWaktu();
    	$terbilang = $jam->terbilang("3:00"); 
        $this->assertEquals("jam tiga subuh", $terbilang);
    }
    
    /**
	 * @expectedException Exception
	 */
    public function testError1() 
    {
    	$jam = new BilanganWaktu();
    	$terbilang = $jam->terbilang("21.31"); 
    }
    /**
	 * @expectedException Exception
	 */
    public function testError2() 
    {
    	$jam = new BilanganWaktu();
    	$terbilang = $jam->terbilang("21,31"); 
    }
    /**
	 * @expectedException Exception
	 */
    public function testError3() 
    {
    	$jam = new BilanganWaktu();
    	$terbilang = $jam->terbilang("1/2 1"); 
    }
	/**
	 * @expectedException Exception
	 */
    public function testError4() 
    {
    	$jam = new BilanganWaktu();
    	$terbilang = $jam->terbilang("2:2"); 
    }
    /**
	 * @expectedException Exception
	 */
    public function testError5() 
    {
    	$jam = new BilanganWaktu();
    	$terbilang = $jam->terbilang("20;20"); 
    }
    /**
	 * @expectedException Exception
	 */
    public function testError6() 
    {
    	$jam = new BilanganWaktu();
    	$terbilang = $jam->terbilang("20:20:20"); 
    }
    /**
	 * @expectedException Exception
	 */
    public function testError7() 
    {
    	$jam = new BilanganWaktu();
    	$terbilang = $jam->terbilang("20:60"); 
    }
    /**
	 * @expectedException Exception
	 */
    public function testError8() 
    {
    	$jam = new BilanganWaktu();
    	$terbilang = $jam->terbilang("24:01"); 
    }
    /**
	 * @expectedException Exception
	 */
    public function testError9() 
    {
    	$jam = new BilanganWaktu();
    	$terbilang = $jam->terbilang("25:00"); 
    }
    /**
	 * @expectedException Exception
	 */
    public function testError10() 
    {
    	$jam = new BilanganWaktu();
    	$terbilang = $jam->terbilang("12 am"); 
    }
    /**
	 * @expectedException Exception
	 */
    public function testError11() 
    {
    	$jam = new BilanganWaktu();
    	$terbilang = $jam->terbilang("12:00 pm"); 
    }
    /**
	 * @expectedException Exception
	 */
    public function testError12() 
    {
    	$jam = new BilanganWaktu();
    	$terbilang = $jam->terbilang("9 lewat 1/4"); 
    }
}
