<?php
namespace App\Test\TestCase\Model\Entity;

use App\Model\Entity\Answer;
use Cake\TestSuite\TestCase;
use Cake\I18n\I18n;

/**
 * App\Model\Entity\Answer Test Case
 */
class AnswerTest extends TestCase
{

    public function languagesProvider()
    {
        return [
            'Translation in english' => ['en_US'],
            'Translation in spanish' => ['es_ES']
        ];
    }

    /**
     * @dataProvider languagesProvider
     */
    public function testDisplayAnswerBoolean($language)
    {
        I18n::locale($language);
        $entity = new Answer();
        $entity->answer = true;
        $this->assertEquals($entity->answer_display, __('YES'), 'You suck at testing');

        $entity->answer = false;
        $this->assertEquals($entity->answer_display, __('NO'), 'You suck at testing');
    }
}
