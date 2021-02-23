<?php
namespace Carts\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Carts Model
 *
 * @property \Carts\Model\Table\ProductsTable&\Cake\ORM\Association\BelongsTo $Products
 * @property \Carts\Model\Table\PhinxlogTable&\Cake\ORM\Association\BelongsToMany $Phinxlog
 *
 * @method \Carts\Model\Entity\Cart get($primaryKey, $options = [])
 * @method \Carts\Model\Entity\Cart newEntity($data = null, array $options = [])
 * @method \Carts\Model\Entity\Cart[] newEntities(array $data, array $options = [])
 * @method \Carts\Model\Entity\Cart|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Carts\Model\Entity\Cart saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Carts\Model\Entity\Cart patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Carts\Model\Entity\Cart[] patchEntities($entities, array $data, array $options = [])
 * @method \Carts\Model\Entity\Cart findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CartsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('carts');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Products', [
            'foreignKey' => 'product_id',
            'className' => 'Carts.Products',
        ]);
        $this->belongsToMany('Phinxlog', [
            'foreignKey' => 'cart_id',
            'targetForeignKey' => 'phinxlog_id',
            'joinTable' => 'carts_phinxlog',
            'className' => 'Carts.Phinxlog',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('quantity')
            ->maxLength('quantity', 255)
            ->requirePresence('quantity', 'create')
            ->notEmptyString('quantity');

        $validator
            ->scalar('Price')
            ->maxLength('Price', 255)
            ->requirePresence('Price', 'create')
            ->notEmptyString('Price');

        $validator
            ->scalar('Name')
            ->maxLength('Name', 255)
            ->requirePresence('Name', 'create')
            ->notEmptyString('Name');

        $validator
            ->scalar('Image')
            ->maxLength('Image', 255)
            ->requirePresence('Image', 'create')
            ->notEmptyString('Image');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['product_id'], 'Products'));

        return $rules;
    }
}
