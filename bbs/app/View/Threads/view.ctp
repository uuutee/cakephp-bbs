<?php echo $this->Session->flash(); ?>

<div class="thread">
	<h2><?php echo $data['Thread']['title']; ?></h2>
	<div class="comment">
		<div class="comment-header row">
			<div class="name col-sm-4">
				<?php if ($data['Thread']['author_email']): ?>
					<span class="no">0.</span>
					名前: <a href="mailto:<?php echo h($data['Thread']['author_email']); ?>"><?php echo h($data['Thread']['author_name']); ?></a>
				<?php else: ?>
					名前: <?php echo h($data['Thread']['author_name']); ?>
				<?php endif; ?>
			</div>
			
			<div class="date col-sm-7">
				<?php echo h($data['Thread']['created']); ?>
			</div>
		</div>

		<div class="comment-content">
			<p><?php echo h($data['Thread']['body']); ?></p>
		</div>
	</div>

	<?php if (!empty($data['Comment'])): ?>
		<div class="comments">
			<div class="comments-content">
				<?php foreach ($data['Comment'] as $key => $comment): ?>
					<?php if ($comment['flag'] !== '1'): ?>
						<div class="comment">
							<div class="comment-header row">
								<div class="name col-sm-4">
									<span class="no"><?php echo $key + 1; ?>.</span>
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
							<div class="comment-footer text-right">
								<a href="/bbs/comments/view/<?php echo h($comment['id']); ?>">詳細</a>
							</div>
						</div>				
					<?php endif ?>
				<?php endforeach; ?>
			</div>
		</div>
	<?php else: ?>
		コメントがありません。
	<?php endif; ?>
</div>

<hr class="section-rule" />

<div class="form-comment">
	<h2>コメントする</h2>
	<div class="form-comment-content">
		<?php 
		echo $this->Form->create(
			false,
			array(
				'url' => array(
					'controller' => 'comments',
					'action' => 'add'
				),
				'class' => 'form-horizontal'
			)
		);
		?>
			<?php echo $this->Form->hidden('thread_id', array('value' => $data['Thread']['id'])); ?>

			<div class="form-group">
				<div class="col-sm-3 control-label">
					名前 <span class="required">*</span>
				</div>
				<div class="col-sm-9">
					<?php 
					echo $this->Form->input(
						'author_name', 
						array(
							'div'   => false,
							'label' => false,
							'class' => 'form-control',
						)
					);
					?>
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-3 control-label">
					メールアドレス
				</div>
				<div class="col-sm-9">
					<?php 
					echo $this->Form->input(
						'author_email', 
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
				<div class="col-sm-3 control-label">
					本文 <span class="required">*</span>
				</div>
				<div class="col-sm-9">
					<?php 
					echo $this->Form->textarea(
						'body', 
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
						'投稿', 
						array(
							'name' => 'submit',
							'class' => 'btn btn-primary',
						)
					); 
					?>
				</div>
			</div>	
		<?php echo $this->Form->end(); ?>
	</div>
</div>

<hr class="section-rule" />

<div class="form-comment">
	<h2>スレッドを削除する</h2>
	<div class="form-comment-content">
		<?php 
		echo $this->Form->create(
			false,
			array(
				'url' => array(
					'controller' => 'threads',
					'action' => 'delete'
				),
				'class' => 'form-horizontal'
			)
		);
		?>
			<?php echo $this->Form->hidden('id', array('value' => $data['Thread']['id'])); ?>
			<?php echo $this->Form->hidden('category_id', array('value' => $data['Thread']['category_id'])); ?>
			<?php echo $this->Form->hidden('flag', array('value' => '1')); ?>

			<div class="form-group<?php if (isset($user)): ?> hidden<?php endif; ?>">
				<div class="col-sm-3 control-label">
					削除用パスワード <span class="required">*</span>
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