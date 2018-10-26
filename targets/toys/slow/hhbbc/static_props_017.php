<?hh
namespace slowhhbbcstaticprops017;

class Foo {
  private static $a = array('foo' => 'a', 'bar' => 'b');

  public static function main() {
    unset(self::$a['foo']);
  }
  public static function get() {
    return self::$a;
  }
}

function main() {
  Foo::main();
  var_dump(Foo::get());
}

<<__EntryPoint>>
function main_static_props_017() {
main();
}