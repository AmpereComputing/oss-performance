<?php
namespace slowhhbbcmagiccall003;

final class Asd {
  protected static function heh() {
    echo "heh\n";
    return "foo";
  }

  public static function __callStatic($x, $y) {
    echo "__call\n";
    return "the call";
  }
}

function main() {
  $x = new Asd;
  echo "a\n";
  $y = Asd::heh();
  echo "b\n";
  var_dump($y);
}


<<__EntryPoint>>
function main_magic_call_003() {
main();
}