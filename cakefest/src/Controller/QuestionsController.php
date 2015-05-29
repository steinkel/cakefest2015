<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Table\QuestionsTable;
use App\Model\Table\UsersTable;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;

/**
 * Questions Controller
 *
 * @property QuestionsTable $Questions
 */
class QuestionsController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['home']);
    }

    public function home()
    {
        $questions = $this->Questions->find()
            ->limit(10)
            ->contain(['Answers.Users'])
            ->order(['Questions.created' => 'desc'])
            ->all();
        $this->set(compact('questions'));
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Elections']
        ];
        $this->set('questions', $this->paginate($this->Questions));
        $this->set('_serialize', ['questions']);
    }

    /**
     * View method
     *
     * @param string|null $id Question id.
     * @return void
     * @throws NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $question = $this->Questions->get($id, [
            'contain' => ['Users', 'Elections', 'Tags', 'Answers']
        ]);
        $this->set('question', $question);
        $this->set('_serialize', ['question']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $question = $this->Questions->newEntity();
        if ($this->request->is('post')) {
            $question = $this->Questions->patchEntity($question, $this->request->data);
            if ($this->Questions->save($question)) {
                $this->Flash->success(__('The question has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The question could not be saved. Please, try again.'));
            }
        }
        $users = $this->Questions->Users->find('list', ['limit' => 200]);
        $elections = $this->Questions->Elections->find('list', ['limit' => 200]);
        $tags = $this->Questions->Tags->find('list', ['limit' => 200]);
        $this->set(compact('question', 'users', 'elections', 'tags'));
        $this->set('_serialize', ['question']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Question id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $question = $this->Questions->get($id, [
            'contain' => ['Tags']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $question = $this->Questions->patchEntity($question, $this->request->data);
            if ($this->Questions->save($question)) {
                $this->Flash->success(__('The question has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The question could not be saved. Please, try again.'));
            }
        }
        $users = $this->Questions->Users->find('list', ['limit' => 200]);
        $elections = $this->Questions->Elections->find('list', ['limit' => 200]);
        $tags = $this->Questions->Tags->find('list', ['limit' => 200]);
        $this->set(compact('question', 'users', 'elections', 'tags'));
        $this->set('_serialize', ['question']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Question id.
     * @return void Redirects to index.
     * @throws NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $question = $this->Questions->get($id);
        if ($this->Questions->delete($question)) {
            $this->Flash->success(__('The question has been deleted.'));
        } else {
            $this->Flash->error(__('The question could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function saveExamples1()
    {
        $question = $this->Questions->newEntity([]); // O_O
        $question->title = 'This is a new question';
        debug($question->errors());
        debug($this->Questions->save($question));

        $question2 = $this->Questions->newEntity([
		    'title' => 'This is another question',
		    'user_id' => 2,
		    'election_id' => 'non-existing-election',
	        ]);
        debug($this->Questions->save($question2));
        debug($question2->errors());

        $this->render(false);
    }

    public function downloadErrorLog() {
        $this->response->file(
            LOGS . 'error.log', [
                'download' => true,
                'name' => __("error{0}.log", date('YmdHis'))
            ]
        );
        $this->response->disableCache();
        return $this->response;
    }
}
