<?hh
namespace slowvariadicargsmethodcompatgoodaddoptional;

interface DB {
  public function query($query, ...$params);
}

class MySQL implements DB {
  public function query($query, ?Foo $foo = null, ...$params) { }
}
