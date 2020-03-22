<?php

use Doctrine\Common\Collections\ArrayCollection;

include_once "vendor/autoload.php";

$collection = new ArrayCollection();
$collection->set('name','John');
echo $collection['name'];

echo Tag::div();
