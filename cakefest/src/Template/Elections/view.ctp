<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Election'), ['action' => 'edit', $election->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Election'), ['action' => 'delete', $election->id], ['confirm' => __('Are you sure you want to delete # {0}?', $election->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Elections'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Election'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Questions'), ['controller' => 'Questions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Question'), ['controller' => 'Questions', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="elections view large-10 medium-9 columns">
    <h2><?= h($election->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($election->name) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($election->id) ?></p>
            <h6 class="subheader"><?= __('Year') ?></h6>
            <p><?= $this->Number->format($election->year) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($election->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($election->modified) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Questions') ?></h4>
    <?php if (!empty($election->questions)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Title') ?></th>
            <th><?= __('User Id') ?></th>
            <th><?= __('Election Id') ?></th>
            <th><?= __('Created') ?></th>
            <th><?= __('Modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($election->questions as $questions): ?>
        <tr>
            <td><?= h($questions->id) ?></td>
            <td><?= h($questions->title) ?></td>
            <td><?= h($questions->user_id) ?></td>
            <td><?= h($questions->election_id) ?></td>
            <td><?= h($questions->created) ?></td>
            <td><?= h($questions->modified) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Questions', 'action' => 'view', $questions->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Questions', 'action' => 'edit', $questions->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Questions', 'action' => 'delete', $questions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $questions->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
