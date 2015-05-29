<?php
namespace App\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Cake\Utility\Hash;

/**
 * App\Model\Table\QuestionsTable Test Case
 */
class QuestionsTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.questions',
        'app.users',
        'app.parties',
        'app.answers',
        'app.elections',
        'app.tags',
        'app.questions_tags'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Questions') ? [] : ['className' => 'App\Model\Table\QuestionsTable'];
        $this->Questions = TableRegistry::get('Questions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Questions);

        parent::tearDown();
    }

    /**
     * Test findHome method
     *
     * @return void
     */
    public function testFindHome() {
        $result = $this->Questions->find('home')->hydrate(false)->toArray();
        $expected = [3, 2, 1];
        $this->assertEquals($expected, Hash::extract($result, '{n}.id'));
        $this->assertArrayHasKey('answers', $result[2]);
        $this->assertArrayHasKey('user', $result[2]['answers'][0]);
    }
}
