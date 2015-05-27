<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $party->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $party->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Parties'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="parties form large-10 medium-9 columns">
    <?= $this->Form->create($party) ?>
    <fieldset>
        <legend><?= __('Edit Party') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('logo');
            echo $this->Form->input('description');
            echo $this->Form->input('url');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
