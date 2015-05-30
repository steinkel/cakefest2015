<?php
namespace App\Test\TestCase\Controller;

use Cake\ORM\TableRegistry;
use App\Controller\QuestionsController;
use Cake\TestSuite\IntegrationTestCase;
use Symfony\Component\DomCrawler\Crawler;

/**
 * App\Controller\QuestionsController Test Case
 */
class QuestionsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.questions',
        'app.users',
        'app.elections',
        'app.answers',
        'app.tags',
        'app.questions_tags'
    ];

    public function tearDown()
    {
        TableRegistry::clear();
        parent::tearDown();
    }

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {

        $answersTable = $this->getMockForModel('Answers', ['find']);
        $queryMock = $this
            ->getMockBuilder('Cake\ORM\Query')
            ->disableOriginalConstructor()
            ->getMock();

        $answersTable
            ->expects($this->once())
            ->method('find')
            ->will($this->returnValue($queryMock));

        $queryMock->expects($this->once())
            ->method('all')
            ->will($this->returnValue(collection([1, 2, 3])));

        $this->get('/questions');
        $this->assertResponseOk();
        $response = new Crawler($this->_response->body());
        $rows = $response->filter('.questions > table > tbody > tr');
        $this->assertCount(4, $rows);
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAddPostSuccess()
    {
        $this->session([
            'Auth' => ['User' => ['id' => 1, 'role' => 2]]
        ]);
        $this->post('/questions/add', [
            'title' => 'This is a question',
            'user_id' => 1,
            'question_id' => 1,
            'election_id' => 1
        ]);
        $this->assertRedirect(['controller' => 'Questions', 'action' => 'index']);
    }
}
