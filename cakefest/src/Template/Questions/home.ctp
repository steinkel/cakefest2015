<?php $this->layout = 'bootstrap'; ?>
<?php $this->append('footer'); ?>
<span class="label label-success">My footer injected from home.ctp</span>
<?php $this->end(); ?>
<h2><?= __('Questions / Answers table'); ?></h2>
<table class="table table-striped">
    <?= $this->Html->tableHeaders([
		__('Question'),
		__('Answer'),
		__('User')]); ?>
		<?php foreach ($questions as $question): ?>
		    <?= $this->Html->tableCells([
		        h($question->title),
		        '&nbsp',
		        '&nbsp'
		     ]); ?>
	    <?php foreach ($question->answers as $answer): ?>
		    <?= $this->Html->tableCells([
		        '&nbsp',
		        h($answer->answer),
		        h($answer->user->full_name)
		     ]); ?>
    	<?php endforeach; ?>
	<?php endforeach; ?>
</table>

