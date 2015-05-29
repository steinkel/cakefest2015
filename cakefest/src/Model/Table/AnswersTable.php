<?php
namespace App\Model\Table;

use App\Model\Entity\Answer;
use Cake\Error\Debugger;
use Cake\Event\Event;
use Cake\Network\Email\Email;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Routing\Router;
use Cake\Utility\Hash;
use Cake\Validation\Validator;

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
     * @param Validator $validator Validator instance.
     * @return Validator
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
     * @param RulesChecker $rules The rules object to be modified.
     * @return RulesChecker
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

    public function addOrEdit(array $data)
    {
        $answer = $this->find()
            ->where([
                'question_id' => Hash::get($data, 'question_id'),
                'user_id' => Hash::get($data, 'user_id')
            ])
            ->first();
        if (!$answer) {
            $answer = $this->newEntity();
        }
        $answer = $this->patchEntity($answer, $data);
        return $this->save($answer);
    }
}
