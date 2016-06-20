<?php echo $this->Session->flash(); ?>

<h2>管理者メニュー</h2>
<?php if (!empty($user)): ?>ようこそ <?php echo $user['username']; ?> さん<?php endif; ?>
<ul>
	<?php if (!empty($user)): ?>
		<li><a href="/bbs/users/logout">ログアウト</a></li>
	<?php else: ?>
		<li><a href="/bbs/users/login">ログイン</a></li>
	<?php endif; ?>
	<li><a href="/bbs/categories/add">カテゴリ作成</a></li>
	<li><a href="/bbs/categories/index">カテゴリ一覧</a></li>
</ul>

<hr class="section-rule" />			

<h2>カテゴリ一覧</h2>
<ul>
	<?php foreach ($categories as $category): ?>
		<?php if ($category['Category']['flag'] !== '1'): ?>
			<li><a href="/bbs/categories/view/<?php echo $category['Category']['id']; ?>"><?php echo $category['Category']['title']; ?></a></li>			
		<?php endif; ?>
	<?php endforeach; ?>
</ul>

<hr class="section-rule" />			

<div class="thrads">
	<h2>スレッド一覧</h2>
	<?php foreach ($threads as $key => $data): ?>
		<?php if ($data['Thread']['flag'] !== '1'): ?>
			<div class="thread">
				<h3><a href="/bbs/threads/view/<?php echo $data['Thread']['id']; ?>"><?php echo $data['Thread']['title']; ?></a></h3>
				<div class="comment">
					<div class="comment-header row">
						<div class="name col-sm-4">
							<?php if ($data['Thread']['author_email']): ?>
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

					<div class="comment-footer">
						<p class="text-right"><a href="/bbs/threads/view/<?php echo $data['Thread']['id']; ?>"><?php echo $data['Thread']['title']; ?>の詳細</a></p>
					</div>
				</div>		
			</div>
			<hr class="thread-rule" />			
		<?php endif; ?>
	<?php endforeach; ?>
</div>
