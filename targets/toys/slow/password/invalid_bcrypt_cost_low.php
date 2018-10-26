<?php
namespace slowpasswordinvalidbcryptcostlow;
password_hash('foo', PASSWORD_BCRYPT, ["cost" => 3]);
