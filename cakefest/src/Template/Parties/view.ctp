<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Party'), ['action' => 'edit', $party->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Party'), ['action' => 'delete', $party->id], ['confirm' => __('Are you sure you want to delete # {0}?', $party->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Parties'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Party'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="parties view large-10 medium-9 columns">
    <h2><?= h($party->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($party->name) ?></p>
            <h6 class="subheader"><?= __('Logo') ?></h6>
            <p><?= h($party->logo) ?></p>
            <h6 class="subheader"><?= __('Url') ?></h6>
            <p><?= h($party->url) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($party->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($party->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($party->modified) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Description') ?></h6>
            <?= $this->Text->autoParagraph(h($party->description)); ?>

        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Users') ?></h4>
    <?php if (!empty($party->users)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('First Name') ?></th>
            <th><?= __('Last Name') ?></th>
            <th><?= __('Email') ?></th>
            <th><?= __('Password') ?></th>
            <th><?= __('Role') ?></th>
            <th><?= __('Party Id') ?></th>
            <th><?= __('Created') ?></th>
            <th><?= __('Modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($party->users as $users): ?>
        <tr>
            <td><?= h($users->id) ?></td>
            <td><?= h($users->first_name) ?></td>
            <td><?= h($users->last_name) ?></td>
            <td><?= h($users->email) ?></td>
            <td><?= h($users->password) ?></td>
            <td><?= h($users->role) ?></td>
            <td><?= h($users->party_id) ?></td>
            <td><?= h($users->created) ?></td>
            <td><?= h($users->modified) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
