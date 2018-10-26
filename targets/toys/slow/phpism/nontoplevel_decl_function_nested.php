<?hh
namespace slowphpismnontopleveldeclfunctionnested;

function toplevel(): void {
  function nested(): void {} // bad
}
