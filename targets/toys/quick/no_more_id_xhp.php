<?hh
namespace quicknomoreidxhp;

class :foo {
  public function bar() { return 'baz'; }
}

var_dump((<foo />)->bar());
