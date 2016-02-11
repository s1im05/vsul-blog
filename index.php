<?php
error_reporting(E_ALL & ~E_DEPRECATED);

require_once 'lib/SSCE/base.class.php';
require_once 'lib/SSCE/application.class.php';

$oApplication   = new SSCE\Application('lib/config.json');