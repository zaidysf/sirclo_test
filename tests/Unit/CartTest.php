<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Cart;

class CartTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
    	$cart = new Cart;
		$cart->addProduct("Baju Merah Mantap", 1);
		$cart->addProduct("Baju Merah Mantap", 1);
		$cart->addProduct("Bukuku", 3);
		$cart->removeProduct("Bukuku");
		$cart->addProduct("Singlet Hijau", 1);
		$cart->removeProduct("ProdukBohongan");
		echo "\n\n".$cart->showCart()."\n";
        $this->assertTrue(true);
    }
}
