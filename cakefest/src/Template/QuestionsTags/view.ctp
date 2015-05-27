<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Questions Tag'), ['action' => 'edit', $questionsTag->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Questions Tag'), ['action' => 'delete', $questionsTag->id], ['confirm' => __('Are you sure you want to delete # {0}?', $questionsTag->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Questions Tags'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Questions Tag'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Questions'), ['controller' => 'Questions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Question'), ['controller' => 'Questions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tag'), ['controller' => 'Tags', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="questionsTags view large-10 medium-9 columns">
    <h2><?= h($questionsTag->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Question') ?></h6>
            <p><?= $questionsTag->has('question') ? $this->Html->link($questionsTag->question->title, ['controller' => 'Questions', 'action' => 'view', $questionsTag->question->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Tag') ?></h6>
            <p><?= $questionsTag->has('tag') ? $this->Html->link($questionsTag->tag->name, ['controller' => 'Tags', 'action' => 'view', $questionsTag->tag->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($questionsTag->id) ?></p>
        </div>
    </div>
</div>
