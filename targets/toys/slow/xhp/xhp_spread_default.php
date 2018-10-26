<?hh // strict
namespace slowxhpxhpspreaddefault;

class :bar {
  attribute string name;
}

function foo($x = <bar {...<bar name="foo" />} />) { }
