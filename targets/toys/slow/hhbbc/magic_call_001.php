<?php
namespace slowhhbbcmagiccall001;

final class Asd {
  protected function heh() {
    echo "heh\n";
    return "foo";
  }

  public function __call($x, $y) {
    echo "__call\n";
    return "the call";
  }
}

function main() {
  $x = new Asd;
  echo "a\n";
  $y = $x->heh();
  echo "b\n";
  var_dump($y);
}


<<__EntryPoint>>
function main_magic_call_001() {
main();
}
