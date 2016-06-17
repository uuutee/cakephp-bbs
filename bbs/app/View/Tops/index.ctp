<?php echo $this->Session->flash(); ?>

<h2>カテゴリ一覧</h2>
<ul>
	<?php foreach ($categories as $category): ?>
		<li><a href="/bbs/categories/view/<?php echo $category['Category']['id']; ?>"><?php echo $category['Category']['title']; ?></a></li>
	<?php endforeach; ?>
</ul>

<h2>スレッド一覧</h2>
<ul>
	<?php foreach ($threads as $thread): ?>
		<li><a href="/bbs/threads/view/<?php echo $thread['Thread']['id']; ?>"><?php echo $thread['Thread']['title']; ?></a></li>
	<?php endforeach; ?>
</ul>

<h2>コメント一覧</h2>
<ul>
	<?php foreach ($comments as $comment): ?>
		<li><a href="/bbs/users/view/<?php echo $comment['Comment']['id']; ?>"><?php echo $comment['Comment']['title']; ?></a></li>
	<?php endforeach; ?>
</ul>