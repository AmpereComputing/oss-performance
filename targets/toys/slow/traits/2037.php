<?php
namespace slowtraits2037;

trait foo {
	public function abc() {
	}
}

interface baz {
	public function abc();
}

class bar implements baz {
	use foo;

}

new bar;
print "OK\n";

?>
