<?hh // strict
namespace slowreifiedgenericsnewnestedgenerics;

class A {}
class B<reify T> {}
class C<reify T> {}

function f<reify T>() {
  return (new T());
}

$c = f<C<B<A>>>();
var_dump($c is C<_>);
var_dump($c is C<B<_>>);
var_dump($c is C<B<A>>);
var_dump($c is C<A>);
var_dump($c is C<C<_>>);
