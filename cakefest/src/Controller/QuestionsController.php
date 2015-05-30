<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Table\QuestionsTable;
use App\Model\Table\UsersTable;
use App\Model\Formatter\LinksEnricher;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;

/**
 * Questions Controller
 *
 * @property QuestionsTable $Questions
 */
class QuestionsController extends AppController
{

    public $paginate = [
        'contain' => ['Users', 'Elections']
    ];

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['home']);
    }

    public function home()
    {
        $this->Crud->mapAction('home', 'Crud.Index');
        $this->Crud->on('beforePaginate', function ($event) {
            $this->paginate = ['finder' => 'home'];
        });
        return $this->Crud->execute();
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
