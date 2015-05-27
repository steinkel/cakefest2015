<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Party Entity.
 */
class Party extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'logo' => true,
        'description' => true,
        'url' => true,
        'users' => true,
    ];
}
