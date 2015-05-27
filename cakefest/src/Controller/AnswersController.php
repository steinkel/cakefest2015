<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Answers Controller
 *
 * @property \App\Model\Table\AnswersTable $Answers
 */
class AnswersController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Questions']
        ];
        $this->set('answers', $this->paginate($this->Answers));
        $this->set('_serialize', ['answers']);
    }

    /**
     * View method
     *
     * @param string|null $id Answer id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $answer = $this->Answers->get($id, [
            'contain' => ['Users', 'Questions']
        ]);
        $this->set('answer', $answer);
        $this->set('_serialize', ['answer']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $answer = $this->Answers->newEntity();
        if ($this->request->is('post')) {
            $answer = $this->Answers->patchEntity($answer, $this->request->data);
            if ($this->Answers->save($answer)) {
                $this->Flash->success(__('The answer has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The answer could not be saved. Please, try again.'));
            }
        }
        $users = $this->Answers->Users->find('list', ['limit' => 200]);
        $questions = $this->Answers->Questions->find('list', ['limit' => 200]);
        $this->set(compact('answer', 'users', 'questions'));
        $this->set('_serialize', ['answer']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Answer id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $answer = $this->Answers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $answer = $this->Answers->patchEntity($answer, $this->request->data);
            if ($this->Answers->save($answer)) {
                $this->Flash->success(__('The answer has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The answer could not be saved. Please, try again.'));
            }
        }
        $users = $this->Answers->Users->find('list', ['limit' => 200]);
        $questions = $this->Answers->Questions->find('list', ['limit' => 200]);
        $this->set(compact('answer', 'users', 'questions'));
        $this->set('_serialize', ['answer']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Answer id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $answer = $this->Answers->get($id);
        if ($this->Answers->delete($answer)) {
            $this->Flash->success(__('The answer has been deleted.'));
        } else {
            $this->Flash->error(__('The answer could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
