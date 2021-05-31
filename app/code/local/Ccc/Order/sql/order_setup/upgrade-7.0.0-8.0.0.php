<?php 
$installer = $this;
$installer->startSetup();
$installer->run("ALTER TABLE {$installer->getTable('order/cart_item')} ADD name varchar(10);");
$installer->run("ALTER TABLE {$installer->getTable('order/cart_item')} ADD sku varchar(10);");

$installer->run("ALTER TABLE {$installer->getTable('order/order_item')} ADD name varchar(10);");
$installer->run("ALTER TABLE {$installer->getTable('order/order_item')} ADD sku varchar(10);");

$installer->run("ALTER TABLE {$installer->getTable('order/cart_address')} ADD firstname varchar(10);");
$installer->run("ALTER TABLE {$installer->getTable('order/cart_address')} ADD lastname varchar(10);");

$installer->run("ALTER TABLE {$installer->getTable('order/order_address')} ADD firstname varchar(10);");
$installer->run("ALTER TABLE {$installer->getTable('order/order_address')} ADD lastname varchar(10);");
$installer->endSetup();
 ?>