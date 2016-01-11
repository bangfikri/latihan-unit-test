<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Http\Controllers\StringOrder;

class StringOrderTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test1()
    {
    	$order = new StringOrder();
    	$hasil = $order->sort("imam");
        $this->assertEquals("aim", $hasil);
    }

    public function test2()
    {
    	$order = new StringOrder();
    	$hasil = $order->sort("imam ramadhan");
        $this->assertEquals("adhimnr", $hasil);
    }

    public function test3()
    {
    	$order = new StringOrder();
    	$hasil = $order->sort("Imam Ramadhan Amin");
        $this->assertEquals("AIRadhimn", $hasil);
    }

    public function test4()
    {
    	$order = new StringOrder();
    	$hasil = $order->sort("Muhammad FIKri IsnAini AdalAh NAmA SAYA");
        $this->assertEquals("AFIKMNSYadhilmnrsu", $hasil);
    }

	/**
	 * @expectedException Exception
	 */
    public function testError1() {
    	$order = new StringOrder();
    	$hasil = $order->sort("Imam Ramadhan Amin 20");
    }

	/**
	 * @expectedException Exception
	 */
    public function testError2() {
    	$order = new StringOrder();
    	$hasil = $order->sort("123#$20 Fikri");
    }

	/**
	 * @expectedException Exception
	 */
    public function testError3() {
    	$order = new StringOrder();
    	$hasil = $order->sort("ini adalah?");
    }

	/**
	 * @expectedException Exception
	 */
    public function testError4() {
    	$order = new StringOrder();
    	$hasil = $order->sort("fikri@detik.com");
    }
}
