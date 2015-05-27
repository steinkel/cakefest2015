<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Election Entity.
 */
class Election extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'year' => true,
        'questions' => true,
    ];
}
