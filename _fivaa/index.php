<?php
/* link of test = https://gist.github.com/nigorice/fc8790b5d3935861dba0ad69fbc3baf3 */
/* PHP 7 */
function fivaa($n){
	if(!is_numeric($n)){
		return "Sorry must be number";
	}
	$result = "";
	for ($i=$n; $i>0; $i--) {
		for ($j=0; $j<2; $j++) {
			$result .= $i-1;
		}
	
		for ($k=0; $k<$i; $k++) {
			$result .= $i+1;
		}
	
		$result .= '<br/>';
	}
	return $result;
}
echo fivaa(5);