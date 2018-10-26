<?hh
namespace slowasyncgenvavariadic;

async function test() {
  $args = array(async {});
  await genva(...$args);
}
