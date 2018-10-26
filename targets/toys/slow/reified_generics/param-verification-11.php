<?hh
namespace slowreifiedgenericsparamverification11;

type Ignore<T> = mixed;

class C<T> {}
class D {}

function f(Ignore<C<int>> $_) {}

f(new D());
echo "done\n";
