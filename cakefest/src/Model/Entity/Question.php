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

    protected $_hidden = [
        'id', 'user_id', 'election_id', 'created', 'modified'
    ];

    protected $_virtual = [
      //  '_link'
    ];

    protected function _getLink()
    {
        return \Cake\Routing\Router::url([
            'controller' => 'Questions',
            'action' => 'view',
            'id' => $this->id,
            '_full' => true
        ]);
    }
}
