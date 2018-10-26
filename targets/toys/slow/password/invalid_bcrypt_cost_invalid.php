<?php
namespace slowpasswordinvalidbcryptcostinvalid;
password_hash('foo', PASSWORD_BCRYPT, ["cost" => 'foo']);
