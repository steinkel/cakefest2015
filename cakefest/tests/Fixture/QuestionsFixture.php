<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * QuestionsFixture
 *
 */
class QuestionsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'title' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'user_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'election_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'title' => 'question-1',
            'user_id' => 1,
            'election_id' => 1,
            'created' => '2015-05-27 15:50:22',
            'modified' => '2015-05-27 15:50:22'
        ],
        [
            'id' => 2,
            'title' => 'question-2',
            'user_id' => 1,
            'election_id' => 1,
            'created' => '2015-05-28 15:50:22',
            'modified' => '2015-05-27 15:50:22'
        ],
        [
            'id' => 3,
            'title' => 'question-3',
            'user_id' => 1,
            'election_id' => 1,
            'created' => '2015-05-29 15:50:22',
            'modified' => '2015-05-27 15:50:22'
        ],
        [
            'id' => 4,
            'title' => 'question-4',
            'user_id' => 1,
            'election_id' => 1,
            'created' => '2015-05-21 15:50:22',
            'modified' => '2015-05-27 15:50:22'
        ],
    ];
}
