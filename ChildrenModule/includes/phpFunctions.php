<?php
	function countAge($cIC){
		$age = (int)substr($cIC, 0, 2);
		$currentYear = (int)date("Y");
		$age = (string)($currentYear - $age);
		$age = substr($age, -2);

		return $age;
	}
?>