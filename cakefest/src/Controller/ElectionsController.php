<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Elections Controller
 *
 * @property \App\Model\Table\ElectionsTable $Elections
 */
class ElectionsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('elections', $this->paginate($this->Elections));
        $this->set('_serialize', ['elections']);
    }

    /**
     * View method
     *
     * @param string|null $id Election id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $election = $this->Elections->get($id, [
            'contain' => ['Questions']
        ]);
        $this->set('election', $election);
        $this->set('_serialize', ['election']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $election = $this->Elections->newEntity();
        if ($this->request->is('post')) {
            $election = $this->Elections->patchEntity($election, $this->request->data);
            if ($this->Elections->save($election)) {
                $this->Flash->success(__('The election has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The election could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('election'));
        $this->set('_serialize', ['election']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Election id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $election = $this->Elections->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $election = $this->Elections->patchEntity($election, $this->request->data);
            if ($this->Elections->save($election)) {
                $this->Flash->success(__('The election has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The election could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('election'));
        $this->set('_serialize', ['election']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Election id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $election = $this->Elections->get($id);
        if ($this->Elections->delete($election)) {
            $this->Flash->success(__('The election has been deleted.'));
        } else {
            $this->Flash->error(__('The election could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }


    public function containableExample2($id) {
        debug($this->Elections->find()
            ->contain(['Questions.Answers' => [
                'conditions' => ['answer' => true]
                ]])
            ->where(['Elections.id' => $id])
            ->hydrate(false)
            ->toArray()
        );
        $this->render(false);
    }
}
