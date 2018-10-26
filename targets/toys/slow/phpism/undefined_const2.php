<?hh
namespace slowphpismundefinedconst2;

use const SomeNamespace\AN_UNDEFINED_CONST;

function f(): void {
  var_dump(AN_UNDEFINED_CONST);
}

f();
