<?hh
namespace slowsealedsealedclasses16;

<<__Sealed(SomeTrait::class)>>
interface SomeInterface {}

trait SomeTrait implements SomeInterface {}

trait SomeTrait2 {
  use SomeTrait;
}
