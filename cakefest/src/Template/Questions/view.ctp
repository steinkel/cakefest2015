<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Question'), ['action' => 'edit', $question->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Question'), ['action' => 'delete', $question->id], ['confirm' => __('Are you sure you want to delete # {0}?', $question->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Questions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Question'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Elections'), ['controller' => 'Elections', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Election'), ['controller' => 'Elections', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Answers'), ['controller' => 'Answers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Answer'), ['controller' => 'Answers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tag'), ['controller' => 'Tags', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="questions view large-10 medium-9 columns">
    <h2><?= h($question->title) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Title') ?></h6>
            <p><?= h($question->title) ?></p>
            <h6 class="subheader"><?= __('User') ?></h6>
            <p><?= $question->has('user') ? $this->Html->link($question->user->id, ['controller' => 'Users', 'action' => 'view', $question->user->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Election') ?></h6>
            <p><?= $question->has('election') ? $this->Html->link($question->election->name, ['controller' => 'Elections', 'action' => 'view', $question->election->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($question->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($question->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($question->modified) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Answers') ?></h4>
    <?php if (!empty($question->answers)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('User Id') ?></th>
            <th><?= __('Question Id') ?></th>
            <th><?= __('Answer') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($question->answers as $answers): ?>
        <tr>
            <td><?= h($answers->id) ?></td>
            <td><?= h($answers->user_id) ?></td>
            <td><?= h($answers->question_id) ?></td>
            <td><?= h($answers->answer) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Answers', 'action' => 'view', $answers->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Answers', 'action' => 'edit', $answers->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Answers', 'action' => 'delete', $answers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $answers->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Tags') ?></h4>
    <?php if (!empty($question->tags)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Name') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($question->tags as $tags): ?>
        <tr>
            <td><?= h($tags->id) ?></td>
            <td><?= h($tags->name) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Tags', 'action' => 'view', $tags->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Tags', 'action' => 'edit', $tags->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Tags', 'action' => 'delete', $tags->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tags->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
