<?php
require('vendor/autoload.php');

use Ramsey\Uuid\Uuid;

$uuid = Uuid::uuid4();
echo $uuid . PHP_EOL;