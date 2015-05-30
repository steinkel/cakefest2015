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

    public function answer()
    {
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->data;
            $data['user_id'] = $this->Auth->user('id');
            if ($this->Answers->addOrEdit($data)) {
                $this->Flash->success('The answer has been saved.');
            } else {
                $this->Flash->error('The answer could not be saved. Please, try again.');
            }
        }
        return $this->redirect($this->request->referer());
    }
}
