<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Parties Controller
 *
 * @property \App\Model\Table\PartiesTable $Parties
 */
class PartiesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('parties', $this->paginate($this->Parties));
        $this->set('_serialize', ['parties']);
    }

    /**
     * View method
     *
     * @param string|null $id Party id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $party = $this->Parties->get($id, [
            'contain' => ['Users']
        ]);
        $this->set('party', $party);
        $this->set('_serialize', ['party']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $party = $this->Parties->newEntity();
        if ($this->request->is('post')) {
            $party = $this->Parties->patchEntity($party, $this->request->data);
            if ($this->Parties->save($party)) {
                $this->Flash->success(__('The party has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The party could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('party'));
        $this->set('_serialize', ['party']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Party id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $party = $this->Parties->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $party = $this->Parties->patchEntity($party, $this->request->data);
            if ($this->Parties->save($party)) {
                $this->Flash->success(__('The party has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The party could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('party'));
        $this->set('_serialize', ['party']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Party id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $party = $this->Parties->get($id);
        if ($this->Parties->delete($party)) {
            $this->Flash->success(__('The party has been deleted.'));
        } else {
            $this->Flash->error(__('The party could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
