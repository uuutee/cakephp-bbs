<?php echo $this->Session->flash(); ?>

<?php if (!empty($data['Thread'])): ?>
	<div class="threads">
		<?php foreach ($data['Thread'] as $key => $thread): ?>
			<?php if ($thread['flag'] !== '1'): ?>
				<div class="thread">
					<h2><a href="/bbs/threads/view/<?php echo $thread['id']; ?>"><?php echo h($thread['title']); ?></a></h2>
					<div class="comment">
						<div class="comment-header row">
							<div class="name col-sm-4">
								<?php if ($thread['author_email']): ?>
									名前: <a href="mailto:<?php echo h($thread['author_email']); ?>"><?php echo h($thread['author_name']); ?></a>
								<?php else: ?>
									名前: <?php echo h($thread['author_name']); ?>
								<?php endif; ?>
							</div>
							
							<div class="date col-sm-7">
								<?php echo h($thread['created']); ?>
							</div>
						</div>

						<div class="comment-content">
							<p><?php echo h($thread['body']); ?></p>
						</div>

						<div class="comment-footer">
							<p class="text-right"><a href="/bbs/threads/view/<?php echo $thread['id']; ?>"><?php echo h($thread['title']); ?>の詳細</a></p>
						</div>
					</div>
				</div>
				<hr class="thread-rule" />
			<?php endif; ?>
		<?php endforeach; ?>
	</div>
<?php else: ?>
	スレッドがありません。
<?php endif; ?>

<div class="form-comment">
	<h2>スレッドを作成する</h2>
	<div class="form-comment-content">
		<?php 
		echo $this->Form->create(
			false,
			array(
				'url' => array(
					'controller' => 'threads',
					'action' => 'add'
				),
				'class' => 'form-horizontal',
			)
		);
		?>
			<?php 
			echo $this->Form->hidden(
				'category_id',
				array(
					'value' => $data['Category']['id']
				)
			);
			?>

			<div class="form-group">
				<div class="col-sm-3 control-label">
					タイトル <span class="required">*</span>
				</div>
				<div class="col-sm-9">
					<?php 
					echo $this->Form->input(
						'title', 
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