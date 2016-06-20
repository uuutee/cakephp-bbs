<?php echo $this->Session->flash(); ?>

<div class="comment">
	<div class="comment-header row">
		<div class="name col-sm-4">
			<?php if ($comment['author_email']): ?>
				名前: <a href="mailto:<?php echo h($comment['author_email']); ?>"><?php echo h($comment['author_name']); ?></a>
			<?php else: ?>
				名前: <?php echo h($comment['author_name']); ?>
			<?php endif; ?>
		</div>
		
		<div class="date col-sm-7">
			<?php echo h($comment['created']); ?>
		</div>
	</div>
	<div class="comment-content">
		<p><?php echo nl2br(h($comment['body'])); ?></p>
	</div>
</div>

<hr class="section-rule" />

<div class="form-comment">
	<h2>コメントを削除する</h2>
	<div class="form-comment-content">
		<?php 
		echo $this->Form->create(
			false,
			array(
				'url' => array(
					'controller' => 'comments',
					'action' => 'delete'
				),
				'class' => 'form-horizontal'
			)
		);
		?>
			<?php echo $this->Form->hidden('thread_id', array('value' => $data['Thread']['id'])); ?>
			<?php echo $this->Form->hidden('id', array('value' => $comment['id'])); ?>
			<?php echo $this->Form->hidden('flag', array('value' => '1')); ?>

			<div class="form-group<?php if (isset($user)): ?> hidden<?php endif; ?>">
				<div class="col-sm-3 control-label">
					削除用パスワード <span class="required">*</span>
					<div class="comment-sub">4〜32文字</div>
				</div>
				<div class="col-sm-2">
					<?php 
					echo $this->Form->input(
						'author_passwd', 
						array(
							'div'   => false, 
							'label' => false, 
							'class' => 'form-control'
						)
					); 
					?>
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-offset-3 col-sm-2">
					<?php 
					echo $this->Form->submit(
						'削除', 
						array(
							'name' => 'submit',
							'class' => 'btn btn-danger',
						)
					); 
					?>
				</div>
			</div>
		<?php echo $this->Form->end(); ?>
	</div>
</div>