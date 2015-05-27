<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $election->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $election->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Elections'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Questions'), ['controller' => 'Questions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Question'), ['controller' => 'Questions', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="elections form large-10 medium-9 columns">
    <?= $this->Form->create($election) ?>
    <fieldset>
        <legend><?= __('Edit Election') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('year');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
