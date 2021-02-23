<?php
namespace This\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Products Model
 *
 * @property \This\Model\Table\CategoriesTable&\Cake\ORM\Association\BelongsTo $Categories
 * @property \This\Model\Table\CartsTable&\Cake\ORM\Association\HasMany $Carts
 * @property \This\Model\Table\PhinxlogTable&\Cake\ORM\Association\BelongsToMany $Phinxlog
 *
 * @method \This\Model\Entity\Product get($primaryKey, $options = [])
 * @method \This\Model\Entity\Product newEntity($data = null, array $options = [])
 * @method \This\Model\Entity\Product[] newEntities(array $data, array $options = [])
 * @method \This\Model\Entity\Product|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \This\Model\Entity\Product saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \This\Model\Entity\Product patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \This\Model\Entity\Product[] patchEntities($entities, array $data, array $options = [])
 * @method \This\Model\Entity\Product findOrCreate($search, callable $callback = null, $options = [])
 */
class ProductsTable extends Table
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

        $this->setTable('products');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id',
            'className' => 'This.Categories',
        ]);
        $this->hasMany('Carts', [
            'foreignKey' => 'product_id',
            'className' => 'This.Carts',
        ]);
        $this->belongsToMany('Phinxlog', [
            'foreignKey' => 'product_id',
            'targetForeignKey' => 'phinxlog_id',
            'joinTable' => 'products_phinxlog',
            'className' => 'This.Phinxlog',
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
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('image')
            ->maxLength('image', 255)
            ->requirePresence('image', 'create')
            ->notEmptyFile('image');

        $validator
            ->scalar('price')
            ->maxLength('price', 255)
            ->requirePresence('price', 'create')
            ->notEmptyString('price');

        $validator
            ->scalar('about')
            ->requirePresence('about', 'create')
            ->notEmptyString('about');

        $validator
            ->date('relese')
            ->requirePresence('relese', 'create')
            ->notEmptyDate('relese');

        $validator
            ->scalar('description')
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

        $validator
            ->scalar('ram')
            ->maxLength('ram', 255)
            ->requirePresence('ram', 'create')
            ->notEmptyString('ram');

        $validator
            ->scalar('processor')
            ->maxLength('processor', 255)
            ->requirePresence('processor', 'create')
            ->notEmptyString('processor');

        $validator
            ->scalar('storage')
            ->maxLength('storage', 255)
            ->requirePresence('storage', 'create')
            ->notEmptyString('storage');

        $validator
            ->scalar('gcard')
            ->maxLength('gcard', 255)
            ->requirePresence('gcard', 'create')
            ->notEmptyString('gcard');

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
        $rules->add($rules->existsIn(['category_id'], 'Categories'));

        return $rules;
    }
}
