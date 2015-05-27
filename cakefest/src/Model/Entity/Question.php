<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Question Entity.
 */
class Question extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'title' => true,
        'user_id' => true,
        'election_id' => true,
        'user' => true,
        'election' => true,
        'answers' => true,
        'tags' => true,
    ];
}
