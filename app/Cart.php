<?php

namespace App;

class Cart
{
	private $products = [];

	function addProduct($productCode, $qty)
	{
		$key = array_search($productCode, array_column($this->products, 'product_code'));
		if(strlen($key)){
			$this->products[$key]['qty'] += $qty;
		}
		else{
			$this->products[] = ['product_code' => $productCode, 'qty' => $qty];
		}
	}

	function removeProduct($productCode)
	{
		foreach($this->products as $subKey => $subArray){
	          if($subArray['product_code'] == $productCode){
	               unset($this->products[$subKey]);
	          }
	     }
	}

	function showCart()
	{
		$result = "";
		foreach ($this->products as $key => $value) {
			$result .= $value['product_code']." (".$value['qty'].")<br/>";
		}
		return $result;
	}
}
?>