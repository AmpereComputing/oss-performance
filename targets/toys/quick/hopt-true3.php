<?hh
namespace quickhopttrue3;

function foo() {
  if (true) { return false; }
  else { return true; }
}

var_dump(foo());