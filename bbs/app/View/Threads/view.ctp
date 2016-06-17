<?php echo $this->Session->flash(); ?>

<div class="thread">
	<h2><?php echo $data['Thread']['title']; ?></h2>
	<div class="comment">
		<div class="comment-header">
			名前: <a href="mailto:<?php echo $data['Thread']['author_email']; ?>"><?php echo $data['Thread']['author_name']; ?></a></span>
			<?php echo $data['Thread']['created']; ?>
		</div>
		<div class="comment-content">
			<p><?php echo $data['Thread']['body']; ?></p>
		</div>
	</div>
</div>

<div class="comments">
	<div class="comments-content">
		<?php foreach ($data['Comment'] as $comment): ?>
			<div class="comment">
				<div class="comment-header">
					<?php if ($comment['author_email']): ?>
						名前: <a href="mailto:<?php echo $comment['author_email']; ?>"><?php echo $comment['author_name']; ?></a>
					<?php else: ?>
						名前: <?php echo $comment['author_name']; ?>
					<?php endif; ?>
					
					<?php echo $comment['created']; ?>
				</div>
				<div class="comment-content">
					<p><?php echo $comment['body']; ?></p>
				</div>
			</div>			
		<?php endforeach; ?>
	</div>
</div>

<div class="comments-open">
	<h2 class="comments-open-header">コメントする</h2>
	<div class="comments-open-content">
		<?php 
			echo $this->Form->create(
				false,
				array(
					'url' => array(
						'controller' => 'comments',
						'action' => 'add'
					)
				)
			);
		?>
			<?php echo $this->Form->hidden('thread_id', array('value' => $data['Thread']['id'])); ?>
			<?php echo $this->Form->input('author_name', array('label' => '名前')); ?>
			<?php echo $this->Form->input('author_email', array('label' => 'メールアドレス')); ?>
			<?php echo $this->Form->textarea('body', array('label' => '本文')); ?>
			<?php echo $this->Form->input('author_passwd', array('label' => '削除用パスワード')); ?>
			<?php echo $this->Form->submit('保存', array('name' => 'submit')); ?>
		<?php echo $this->Form->end(); ?>
	</div>
</div>
