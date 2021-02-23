<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class ProductsTable extends Table
{
	public function initialize(array $config)
		{
		$this->addBehavior('Timestamp');
		$this->belongsTo('Users', [
		'foreignKey' => 'user_id',
		]);
	}
	public function isOwnedBy($productId, $userId)
	{
		return $this->exists(['id' => $productId, 'user_id' => $userId]);
	}

}
?>