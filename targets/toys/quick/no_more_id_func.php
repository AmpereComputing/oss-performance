<?hh
namespace quicknomoreidfunc;

class A {
  public function b() {
    return 'id';
  }
}

var_dump((new A)->b());