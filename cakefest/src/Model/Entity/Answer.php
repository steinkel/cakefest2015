<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Answer Entity.
 */
class Answer extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'user_id' => true,
        'question_id' => true,
        'answer' => true,
        'user' => true,
        'question' => true,
    ];

    protected function _getAnswerDisplay()
    {
        if ($this->answer) {
            return __('YES');
        }
        return __('NO');
    }
}
