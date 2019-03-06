<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Installments Model
 *
 * @property \App\Model\Table\PurchasesTable|\Cake\ORM\Association\BelongsTo $Purchases
 *
 * @method \App\Model\Entity\Installment get($primaryKey, $options = [])
 * @method \App\Model\Entity\Installment newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Installment[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Installment|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Installment|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Installment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Installment[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Installment findOrCreate($search, callable $callback = null, $options = [])
 */
class InstallmentsTable extends Table
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

        $this->setTable('installments');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Purchases', [
            'foreignKey' => 'purchase_id',
            'joinType' => 'INNER'
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
            ->allowEmptyString('id', 'create');

        $validator
            ->numeric('value')
            ->requirePresence('value', 'create')
            ->allowEmptyString('value', false);

        $validator
            ->date('start')
            ->requirePresence('start', 'create')
            ->allowEmptyDate('start', false);

        $validator
            ->integer('installments')
            ->requirePresence('installments', 'create')
            ->allowEmptyString('installments', false);

        $validator
            ->integer('remaning_installments')
            ->requirePresence('remaning_installments', 'create')
            ->allowEmptyString('remaning_installments', false);

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
        $rules->add($rules->existsIn(['purchase_id'], 'Purchases'));

        return $rules;
    }
}
