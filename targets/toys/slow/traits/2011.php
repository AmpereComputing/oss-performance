<?php
namespace slowtraits2011;

trait foo {
	public function __construct() {
		var_dump(__FUNCTION__);
	}
}

class bar {
	use foo;
}

new bar;

?>
