<?php echo $this->Session->flash(); ?>

<div class="comments-open">
	<h2 class="comments-open-header">カテゴリを登録する</h2>
	<div class="comments-open-content">
		<?php echo $this->Form->create('Category'); ?>
			<?php echo $this->Form->input('title', array('label' => 'タイトル')); ?>
			<?php echo $this->Form->submit('保存', array('name' => 'submit')); ?>
		<?php echo $this->Form->end(); ?>
	</div>
</div>