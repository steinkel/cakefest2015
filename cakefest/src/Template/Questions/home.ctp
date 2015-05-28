

<?php $this->layout = 'bootstrap'; ?>
<?php $this->append('footer'); ?>
<span class="label label-success">My footer injected from home.ctp</span>
<?php $this->end(); ?>
<h2><?= __('Questions / Answers table'); ?></h2>
<table class="table table-striped">
	<tr>
		<th><?= __('Question'); ?></th>
		<th><?= __('Answer'); ?></th>
		<th><?= __('User'); ?></th>
	</tr>
	<?php foreach ($questions as $question): ?>
    		<tr>
    			<td><?= h($question->title); ?>&nbsp;</td>
    			<td>&nbsp;</td>
    			<td>&nbsp;</td>
    		</tr>
	    <?php foreach ($question->answers as $answer): ?>
    		<tr>
    			<td>&nbsp;</td>
    			<td><?= h($answer->answer); ?>&nbsp;</td>
    			<td><?= h($answer->user->full_name); ?>&nbsp;</td>
    		</tr>
    	<?php endforeach; ?>
	<?php endforeach; ?>
</table>


