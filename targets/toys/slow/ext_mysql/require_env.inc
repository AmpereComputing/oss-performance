<?php
namespace slowextmysqlrequireenv;
if (!getenv('MYSQL_TEST_HOST')) {
  die('SKIP');
}
