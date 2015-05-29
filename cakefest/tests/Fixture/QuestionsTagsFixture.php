<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * QuestionsTagsFixture
 *
 */
class QuestionsTagsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'question_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'tag_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
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
            'question_id' => 1,
            'tag_id' => 1,
            'id' => 1
        ],
        [
            'question_id' => 2,
            'tag_id' => 2,
            'id' => 2
        ],
        [
            'question_id' => 3,
            'tag_id' => 3,
            'id' => 3
        ],
        [
            'question_id' => 4,
            'tag_id' => 4,
            'id' => 4
        ],
        [
            'question_id' => 5,
            'tag_id' => 5,
            'id' => 5
        ],
        [
            'question_id' => 6,
            'tag_id' => 6,
            'id' => 6
        ],
        [
            'question_id' => 7,
            'tag_id' => 7,
            'id' => 7
        ],
        [
            'question_id' => 8,
            'tag_id' => 8,
            'id' => 8
        ],
        [
            'question_id' => 9,
            'tag_id' => 9,
            'id' => 9
        ],
        [
            'question_id' => 10,
            'tag_id' => 10,
            'id' => 10
        ],
    ];
}
