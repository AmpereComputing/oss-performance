<?hh
namespace slowsealedsealedclasses14;

<<__Sealed(SomeOtherClass::class)>>
class SomeSealedClass {}

class SomeOtherClass extends SomeSealedClass {}

class SomeOtherOtherClass extends SomeOtherClass {}
