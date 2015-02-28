<?php
require 'app/Mage.php';

Mage::init();

$mage = new Mage_Wrapper;

$time = microtime(true);

for ($i=0; $i < 10000; $i++) {
    $product = $mage->getModel('catalog/product');
}
$proxyTime = (microtime(true) - $time);

unset($mage);

Mage::reset();
Mage::init();

$time = microtime(true);

for ($i=0; $i < 10000; $i++) {
    $product = Mage::getModel('catalog/product');
}
$mageTime = (microtime(true) - $time);

echo "Proxy time was {$proxyTime}. Static time was {$mageTime}" . PHP_EOL;
echo ($mageTime / $proxyTime) . PHP_EOL;
