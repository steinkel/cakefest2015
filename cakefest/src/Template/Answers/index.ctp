<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Answer'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Questions'), ['controller' => 'Questions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Question'), ['controller' => 'Questions', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="answers index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('user_id') ?></th>
            <th><?= $this->Paginator->sort('question_id') ?></th>
            <th><?= $this->Paginator->sort('answer') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($answers as $answer): ?>
        <tr>
            <td><?= $this->Number->format($answer->id) ?></td>
            <td>
                <?= $answer->has('user') ? $this->Html->link($answer->user->id, ['controller' => 'Users', 'action' => 'view', $answer->user->id]) : '' ?>
            </td>
            <td>
                <?= $answer->has('question') ? $this->Html->link($answer->question->title, ['controller' => 'Questions', 'action' => 'view', $answer->question->id]) : '' ?>
            </td>
            <td><?= h($answer->answer) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $answer->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $answer->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $answer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $answer->id)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
