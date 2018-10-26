<?php
namespace slowtraits2046;

trait TestTrait {
		public static function __callStatic($name, $arguments) {
			return $name;
		}
	}

	class A {
		use TestTrait;
	}

	echo A::Test();

?>
