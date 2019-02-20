<?php
namespace slowserialization1546;

class X {
  private $priv = 'priv';
  protected $prot = 'prot';
}
$x = new X;
$s = serialize($x);
$s = str_replace('X', 'Y', $s);
$x = unserialize($s);
var_dump($x,$x->prot,$x->priv);
