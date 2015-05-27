<?php
namespace App\Model\Table;

use App\Model\Entity\Answer;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Network\Email\Email;
use Cake\Routing\Router;
use Cake\Error\Debugger;

/**
 * Answers Model
 */
class AnswersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('answers');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Questions', [
            'foreignKey' => 'question_id',
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
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');
            
        $validator
            ->add('answer', 'valid', ['rule' => 'boolean'])
            ->requirePresence('answer', 'create')
            ->notEmpty('answer');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['question_id'], 'Questions'));
        return $rules;
    }

    public function afterSave(Event $event, Answer $entity, $options)
    {
        $email = new Email('default');
        $result = $email->from('noreply@factionquestions.org')
            ->to('admin@factionquestions.org')
            ->subject(__('New answer!!'))
            ->send(__("Check the new answer here {0}", Router::url([
                'controller' => 'answers',
                'action' => 'view',
                $entity->id,
         ], true)));
         Debugger::log($result);
    }
}
