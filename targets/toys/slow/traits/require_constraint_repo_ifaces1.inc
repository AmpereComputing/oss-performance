<?php
namespace slowtraitsrequireconstraintrepoifaces1;

interface I {}

trait RequiresT {
  require implements I;
}

trait ChildRequiresT {
  use RequiresT;
}
