<?php
namespace slowtraits2025;

error_reporting(E_ALL);

trait THello {
  public function hello() {
    echo 'Hello';
  }
}

class TraitsTest {
	use THello;
}

$test = new TraitsTest();
$test->hello();
?>
