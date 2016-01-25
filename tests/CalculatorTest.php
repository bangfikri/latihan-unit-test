<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Http\Controllers\Calculator;

class CalculatorTest extends TestCase
{

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

    public function testFrontendGet1() {
        $this->visit('/calculator?hitung=3%2B5')
            ->see('8');
    }

    public function testFrontendPost1() {
        $this->visit('/calculator/form')
            ->type('3+5', 'hitung')
            ->press('Hitung')
            ->see('8');
    }

    public function test2() {
    	$calc = new Calculator();
    	$hasil = $calc->hitung("3-6");
    	$this->assertEquals(-3, $hasil);
    }

    public function testFrontendGet2() {
        $this->visit('/calculator?hitung=3-6')
            ->see('-3');
    }

    public function testFrontendPost2() {
        $this->visit('/calculator/form')
            ->type('3-6', 'hitung')
            ->press('Hitung')
            ->see('-3');
    }

    public function test3() {
    	$calc = new Calculator();
    	$hasil = $calc->hitung("3*6");
    	$this->assertEquals(18, $hasil);
    }

    public function testFrontendGet3() {
        $this->visit('/calculator?hitung=3*6')
            ->see('18');
    }

    public function testFrontendPost3() {
        $this->visit('/calculator/form')
            ->type('3*6', 'hitung')
            ->press('Hitung')
            ->see('18');
    }

    public function test4() {
    	$calc = new Calculator();
    	$hasil = $calc->hitung("9/2");
    	$this->assertEquals(4.5, $hasil);
    }

    public function testFrontendGet4() {
        $this->visit('/calculator?hitung=9/2')
            ->see('4.5');
    }

    public function testFrontendPost4() {
        $this->visit('/calculator/form')
            ->type('9/2', 'hitung')
            ->press('Hitung')
            ->see('4.5');
    }

    public function test5() {
    	$calc = new Calculator();
    	$hasil = $calc->hitung("3*6-2");
    	$this->assertEquals(16, $hasil);
    }

    public function testFrontendGet5() {
        $this->visit('/calculator?hitung=3*6-2')
            ->see('16');
    }

    public function testFrontendPost5() {
        $this->visit('/calculator/form')
            ->type('3*6-2', 'hitung')
            ->press('Hitung')
            ->see('16');
    }

    public function test6() {
    	$calc = new Calculator();
    	$hasil = $calc->hitung("16/4*3");
    	$this->assertEquals(12, $hasil);
    }

    public function testFrontendGet6() {
        $this->visit('/calculator?hitung=16/4*3')
            ->see('12');
    }

    public function testFrontendPost6() {
        $this->visit('/calculator/form')
            ->type('16/4*3', 'hitung')
            ->press('Hitung')
            ->see('12');
    }

    public function test7() {
    	$calc = new Calculator();
    	$hasil = $calc->hitung("35*3/2+19");
    	$this->assertEquals(71.5, $hasil);
    }

    public function testFrontendGet7() {
        $this->visit('/calculator?hitung=35*3/2%2B19')
            ->see('71.5');
    }

    public function testFrontendPost7() {
        $this->visit('/calculator/form')
            ->type('35*3/2+19', 'hitung')
            ->press('Hitung')
            ->see('71.5');
    }

    public function test8() {
    	$calc = new Calculator();
    	$hasil = $calc->hitung("35*(3/2+19)");
    	$this->assertEquals(717.5, $hasil);
    }

    public function testFrontendGet8() {
        $this->visit('/calculator?hitung=35*(3/2%2B19)')
            ->see('717.5');
    }

    public function testFrontendPost8() {
        $this->visit('/calculator/form')
            ->type('35*(3/2+19)', 'hitung')
            ->press('Hitung')
            ->see('717.5');
    }

    public function test9() {
    	$calc = new Calculator();
    	$hasil = $calc->hitung("35-8*(3/2+19)");
    	$this->assertEquals(-129, $hasil);
    }

    public function testFrontendGet9() {
        $this->visit('/calculator?hitung=35-8*(3/2%2B19)')
            ->see('-129');
    }

    public function testFrontendPost9() {
        $this->visit('/calculator/form')
            ->type('35-8*(3/2+19)', 'hitung')
            ->press('Hitung')
            ->see('-129');
    }

    public function test10() {
    	$calc = new Calculator();
    	$hasil = $calc->hitung("35-8*(3/2+19)*-3/12");
    	$this->assertEquals(76, $hasil);
    }

    public function testFrontendGet10() {
        $this->visit('/calculator?hitung=35-8*(3/2%2B19)*-3/12')
            ->see('76');
    }

    public function testFrontendPost10() {
        $this->visit('/calculator/form')
            ->type('35-8*(3/2+19)*-3/12', 'hitung')
            ->press('Hitung')
            ->see('76');
    }

	/**
	 * @expectedException Exception
	 */
    public function test11() {
    	$calc = new Calculator();
    	$hasil = $calc->hitung("3**6");
    }

    public function testFrontendGet11() {
        $this->visit('/calculator?hitung=3**6')
            ->assertResponseStatus(404);
    }

    public function testFrontendPost11() {
        $this->visit('/calculator/form')
            ->type('3**6', 'hitung')
            ->press('Hitung')
            ->assertResponseStatus(404);
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
