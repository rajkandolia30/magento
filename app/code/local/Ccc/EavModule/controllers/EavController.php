<?php 
class Ccc_EavModule_EavController extends Mage_Core_Controller_Front_Action{

	public function testAction(){
		$model = Mage::getModel('eavmodule/eavmodule');
		echo '<pre>';
		// print_r($model);
		//$setup = new Mage_Eav_Model_Entity_Setup('core_setup');
		/*$setup->addAttribute('ccc_eav_entity', 'firstname', [
			'input' => 'text',
			'type' => 'varchar',
			'label' => 'First name',
			'backend' => '',
			'visible' => 1,
			'required' => 0,
			'user_defined' => 1
		]);*/
		/*$setup->addAttribute('ccc_eav_entity', 'lastname', [
			'input' => 'text',
			'type' => 'varchar',
			'label' => 'Last name',
			'backend' => '',
			'visible' => 1,
			'required' => 0,
			'user_defined' => 1
		]);*/
		// $model->setFirstname('raj');
		// $model->setLastname('kandolia');
		// $model->save();
		// print_r($model);
	}

	public function newAction(){
		$model = Mage::getModel('catalog/product');
		echo '<pre>';
		/*$data = [
			'name' => 'xyz',
			'type' => 'simple product',
			'sku' => '2',
			'price' => 200,
			'attribute_set_id' => 4
 		];*/
 		// $model->addData($data)->save();
 		/*$data = [
 			'price' => 200,
 			'sku' => '2'
 		];
 		$modelData = $model->load(3)->getData();
 		$model->addData($data )->setPrice(200)->save();
 		print_r($model);*/
 		// print_r($model->getData());
		/*print_r($model->getCollection()
   			->joinAttribute('name', 'catalog_product/name', "entity_id", null, 'inner', 0)->joinAttribute('price', 'catalog_product/price', "entity_id", null, 'inner', 0)->getData());*//*alias , table/columnname ,*/

   		/*$data = [
   			'name' => 'pqr',
   			'type' => 'simple product',
			'sku' => '3',
			'attribute_set_id' => 4
   		];*/
   		//$model->addData($data)->setPrice(200)->save();
   		// print_r($model->getCollection()->getData());

   		/*$model
		    ->setAttributeSetId(4) //ID of a attribute set named 'default'
		    ->setTypeId('simple') //product type
		    ->setSku('testsku61') //SKU
		    ->setName('test product21') //product name 
		    ->setPrice(11.22);//price in form 11.22
		$model->save();
   		print_r($model->getCollection()
   			->joinAttribute('name', 'catalog_product/name', "entity_id", null, 'inner', 0)->joinAttribute('price', 'catalog_product/price', "entity_id", null, 'inner', 0)->getData());*/

   		// $model->setName('abcde')->setAttributeSetId(4)->setSku(5)->setPrice(200)->setTypeId('simple');
   		// $model->save();
   		/*print_r($model->getCollection()
   			->joinAttribute('name', 'catalog_product/name', "entity_id", null, 'left', 0)->joinAttribute('price', 'catalog_product/price', "entity_id", null, 'left', 0)->getData());*/

   		$model
		    ->setAttributeSetId(4) //ID of a attribute set named 'default'
		    ->setTypeId('simple') //product type
		    ->setSku('6') //SKU
		    ->setName('test product21')
		    ->setVisibility(4)
		    ->setStatus(2) //product name 
		    ->setPrice(11.22);//price in form 11.22
		$model->save();
   	}
   
}
?>