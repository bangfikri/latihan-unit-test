<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Http\Controllers\Calculator;

class CalculatorTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

	/**
	 * @expectedException Exception
	 */
    public function testError() {
    	$calc = new Calculator();
    	$hasil = $calc->hitung("3*6-abc");
    }

    public function test1() {
    	$calc = new Calculator();
    	$hasil = $calc->hitung("3+5");
    	$this->assertEquals(8, $hasil);
    }

    public function test2() {
    	$calc = new Calculator();
    	$hasil = $calc->hitung("3-6");
    	$this->assertEquals(-3, $hasil);
    }

    public function test3() {
    	$calc = new Calculator();
    	$hasil = $calc->hitung("3*6");
    	$this->assertEquals(18, $hasil);
    }

    public function test4() {
    	$calc = new Calculator();
    	$hasil = $calc->hitung("9/2");
    	$this->assertEquals(4.5, $hasil);
    }

    public function test5() {
    	$calc = new Calculator();
    	$hasil = $calc->hitung("3*6-2");
    	$this->assertEquals(16, $hasil);
    }

    public function test6() {
    	$calc = new Calculator();
    	$hasil = $calc->hitung("16/4*3");
    	$this->assertEquals(12, $hasil);
    }

    public function test7() {
    	$calc = new Calculator();
    	$hasil = $calc->hitung("35*3/2+19");
    	$this->assertEquals(71.5, $hasil);
    }

    public function test8() {
    	$calc = new Calculator();
    	$hasil = $calc->hitung("35*(3/2+19)");
    	$this->assertEquals(717.5, $hasil);
    }

    public function test9() {
    	$calc = new Calculator();
    	$hasil = $calc->hitung("35-8*(3/2+19)");
    	$this->assertEquals(-129, $hasil);
    }

    public function test10() {
    	$calc = new Calculator();
    	$hasil = $calc->hitung("35-8*(3/2+19)*-3/12");
    	$this->assertEquals(76, $hasil);
    }

	/**
	 * @expectedException Exception
	 */
    public function test11() {
    	$calc = new Calculator();
    	$hasil = $calc->hitung("3**6");
    }

	/**
	 * @expectedException Exception
	 */
    public function test12() {
    	$calc = new Calculator();
    	$hasil = $calc->hitung("3*6/");
    }

    public function test13() {
    	$calc = new Calculator();
    	$hasil = $calc->hitung("1+2+3+4*5*6/8-100");
    	$this->assertEquals(-79, $hasil);
    }

    public function test14() {
    	$calc = new Calculator();
    	$hasil = $calc->hitung("4 + 8 * 2 / 4 - 1 ");
    	$this->assertEquals(7, $hasil);
    }

    public function test15() {
    	$calc = new Calculator();
    	$hasil = $calc->hitung("35 - 8 * (3/2+19) * -3 / 12");
    	$this->assertEquals(76, $hasil);
    }

    public function test16() {
    	$calc = new Calculator();
    	$hasil = $calc->hitung("(35 - 8) * (3/2+19) * (-3 / 12)");
    	$this->assertEquals(-138.375, $hasil);
    }

	/**
	 * @expectedException Exception
	 */
    public function test17() {
    	$calc = new Calculator();
    	$hasil = $calc->hitung("(35 - 8 * (3/2+19) * -3) / 12)");
    }

	/**
	 * @expectedException Exception
	 */
    public function test18() {
    	$calc = new Calculator();
    	$hasil = $calc->hitung("(35 - 8 * (3/2+19) * -3)) / 12)");
    }

    public function test19() {
        $calc = new Calculator();
        $hasil = $calc->hitung("sqrt(144)");
        $this->assertEquals(12, $hasil);
    }

    public function test20() {
        $calc = new Calculator();
        $hasil = $calc->hitung("pow(6,2)");
        $this->assertEquals(36, $hasil);
    }

}
