<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Questions Tag'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Questions'), ['controller' => 'Questions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Question'), ['controller' => 'Questions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tag'), ['controller' => 'Tags', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="questionsTags index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('question_id') ?></th>
            <th><?= $this->Paginator->sort('tag_id') ?></th>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($questionsTags as $questionsTag): ?>
        <tr>
            <td>
                <?= $questionsTag->has('question') ? $this->Html->link($questionsTag->question->title, ['controller' => 'Questions', 'action' => 'view', $questionsTag->question->id]) : '' ?>
            </td>
            <td>
                <?= $questionsTag->has('tag') ? $this->Html->link($questionsTag->tag->name, ['controller' => 'Tags', 'action' => 'view', $questionsTag->tag->id]) : '' ?>
            </td>
            <td><?= $this->Number->format($questionsTag->id) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $questionsTag->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $questionsTag->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $questionsTag->id], ['confirm' => __('Are you sure you want to delete # {0}?', $questionsTag->id)]) ?>
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
