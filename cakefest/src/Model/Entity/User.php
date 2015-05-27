<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity.
 */
class User extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'first_name' => true,
        'last_name' => true,
        'email' => true,
        'password' => true,
        'role' => true,
        'party_id' => true,
        'party' => true,
        'answers' => true,
        'questions' => true,
    ];

    protected function _getFullName() 
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
