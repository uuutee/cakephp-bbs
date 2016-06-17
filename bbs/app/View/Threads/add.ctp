<?php echo $this->Session->flash(); ?>

<div class="comments-open">
	<h2 class="comments-open-header">コメントする</h2>
	<div class="comments-open-content">
		<?php echo $this->Form->create('Thread'); ?>
			<div id="comments-open-data">
				<div id="comment-form-title">
					<?php echo $this->Form->input('title', array('label' => 'タイトル', 'class' => 'input-text')); ?>
				</div>
				<div id="comment-form-name">
					<?php echo $this->Form->input('author_name', array('label' => '名前')); ?>
				</div>
				<div id="comment-form-email">
					<?php echo $this->Form->input('author_email', array('label' => 'メールアドレス')); ?>
				</div>
			</div>

			<div id="comments-open-text">
				<?php echo $this->Form->input('body', array('label' => '本文')); ?>
			</div>

			<div id="comments-open-footer">
				<?php echo $this->Form->input('author_passwd' , array('label' => '削除用パスワード')); ?>
				<?php echo $this->Form->submit('保存'          , array('name' => 'submit')); ?>
			</div>
		<?php echo $this->Form->end(); ?>
	</div>
</div>