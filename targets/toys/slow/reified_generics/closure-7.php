<?hh
namespace slowreifiedgenericsclosure7;

class C {
  public function f() {
    var_dump("yep!");
  }
}

function f<reify T1>() {
  $a = 1;
  $x = function() use ($a) {
    $c = new T1();
    $c->f();
  };
  $x();
}

f<C>();
