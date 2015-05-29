<?php $this->layout = 'bootstrap'; ?>
<?= $this->Html->tag('h2', __('Questions / Answers table')); ?>
<?= $this->Html->tag('h2', __('Totals')); ?>
<?= $this->cell('Totals'); ?>

<table class="table table-striped">
    <?=
    $this->Html->tableHeaders([
        __('Question'),
        __('Answer'),
        __('User'),
        __('Answer')
    ]);
    ?>
    <?php
    foreach ($questions as $question) {
        $yesLink = $this->Form->postLink(__('Yes'), [
            'controller' => 'answers',
            'action' => 'answer'
                ], [
            'data' => [
                'question_id' => $question->id,
                'answer' => 1
            ]
        ]);
        $noLink = $this->Form->postLink(__('No'), [
            'controller' => 'answers',
            'action' => 'answer'
                ], [
            'data' => [
                'question_id' => $question->id,
                'answer' => 0
            ]
        ]);
        echo $this->Html->tableCells([
            h($question->title),
            '&nbsp;',
            '&nbsp;',
            $yesLink . ' / ' . $noLink
        ]);
        foreach ($question->answers as $answer) {
            $answerCells = [
                '&nbsp;',
                h($answer->answer_display),
                h($answer->user->full_name)
            ];
            echo $this->Html->tableCells($answerCells);
        }
    }
    ?>
</table>