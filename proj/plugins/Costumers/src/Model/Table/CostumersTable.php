<?php
namespace Costumers\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Costumers Model
 *
 * @property \Costumers\Model\Table\PhinxlogTable&\Cake\ORM\Association\BelongsToMany $Phinxlog
 *
 * @method \Costumers\Model\Entity\Costumer get($primaryKey, $options = [])
 * @method \Costumers\Model\Entity\Costumer newEntity($data = null, array $options = [])
 * @method \Costumers\Model\Entity\Costumer[] newEntities(array $data, array $options = [])
 * @method \Costumers\Model\Entity\Costumer|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Costumers\Model\Entity\Costumer saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Costumers\Model\Entity\Costumer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Costumers\Model\Entity\Costumer[] patchEntities($entities, array $data, array $options = [])
 * @method \Costumers\Model\Entity\Costumer findOrCreate($search, callable $callback = null, $options = [])
 */
class CostumersTable extends Table
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

        $this->setTable('costumers');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Phinxlog', [
            'foreignKey' => 'costumer_id',
            'targetForeignKey' => 'phinxlog_id',
            'joinTable' => 'costumers_phinxlog',
            'className' => 'Costumers.Phinxlog',
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
            ->scalar('Name')
            ->maxLength('Name', 255)
            ->requirePresence('Name', 'create')
            ->notEmptyString('Name');

        $validator
            ->scalar('Password')
            ->maxLength('Password', 255)
            ->requirePresence('Password', 'create')
            ->notEmptyString('Password');

        $validator
            ->scalar('Email')
            ->maxLength('Email', 255)
            ->requirePresence('Email', 'create')
            ->notEmptyString('Email');

        return $validator;
    }
}
