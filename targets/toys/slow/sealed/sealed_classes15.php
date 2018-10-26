<?hh
namespace slowsealedsealedclasses15;

<<__Sealed(SomeOtherInterface::class)>>
interface SomeSealedInterface {}

interface SomeOtherInterface extends SomeSealedInterface {}

interface SomeOtherOtherInterface extends SomeOtherInterface {}
