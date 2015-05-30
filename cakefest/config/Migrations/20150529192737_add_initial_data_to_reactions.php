<?php

use Phinx\Migration\AbstractMigration;
use Cake\ORM\Table;

class AddInitialDataToReactions extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $table = new Table();
        $table->table('reactions');
        $data = [
            [
                'user_id' => 1,
                'description' => 'This answer is crap',
                'type' => 'comment',
                'votes' => 10,
                'created' => new \DateTime,
                'modified' => new \DateTime,
            ]
        ];

        $entities = $table->newEntities($data, [
            'accessibleFields' => ['*' => true],
            'validate' => false
        ]);
        array_map([$table, 'save'], $entities);
    }
}
