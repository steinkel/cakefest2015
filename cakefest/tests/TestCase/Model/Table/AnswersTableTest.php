<?php
namespace App\Test\TestCase\Model\Table;

use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AnswersTable Test Case
 */
class AnswersTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.answers',
        'app.users',
        'app.parties',
        'app.questions',
        'app.elections',
        'app.tags',
        'app.questions_tags',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Answers') ? [] : ['className' => 'App\Model\Table\AnswersTable'];
        $this->Answers = TableRegistry::get('Answers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Answers);

        parent::tearDown();
    }

    /**
     * Test afterSave method
     *
     * @return void
     */
    public function testAfterSave()
    {
        $entity = $this->Answers->newEntity();
        $entity->id = 1;
        $this->Answers = $this->getMockBuilder('\App\Model\Table\AnswersTable')
                ->disableOriginalConstructor()
                ->setMethods(['_getEmailInstance'])
                ->getMock();
        $emailMock = $this->getMockBuilder('Email')
				->setMethods(['from', 'to', 'subject', 'send'])
				->getMock();
		$emailMock->expects($this->at(0))
				->method('from')
				->with($this->equalTo('noreply@factionquestions.org'))
				->will($this->returnSelf());
		$emailMock->expects($this->at(1))
				->method('to')
				->with($this->equalTo('admin@factionquestions.org'))
				->will($this->returnSelf());
		$emailMock->expects($this->at(2))
				->method('subject')
				->with($this->equalTo('New answer!!'))
				->will($this->returnSelf());
		$emailMock->expects($this->at(3))
				->method('send')
				->with($this->equalTo('Check the new answer here /answers/view/1'))
				->will($this->returnSelf());
        $this->Answers->expects($this->any())
                ->method('_getEmailInstance')
                ->will($this->returnValue($emailMock));
        $this->Answers->afterSave(new Event('name'), $entity, []);
    }
}
