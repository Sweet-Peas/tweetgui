<?php 
function disabled_form($d){
	if($d== 1) {
		echo " disabled";
	}
}

function return_GET($value){
	if(isset($_GET[$value])){
		return $_GET[$value];
	}
	else {
		return "";
	}
}

?>