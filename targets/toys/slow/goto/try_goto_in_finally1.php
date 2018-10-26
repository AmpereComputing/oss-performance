<?php
namespace slowgototrygotoinfinally1;
  try {
  } finally {
    try {
       goto foo;
    }
    finally {}
    foo:
  }
?>
