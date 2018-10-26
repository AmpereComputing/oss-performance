<?hh
namespace slowinoutbadtrait2;

trait T {
  function C(inout $x) {}
}

class C {
  use T;
}
