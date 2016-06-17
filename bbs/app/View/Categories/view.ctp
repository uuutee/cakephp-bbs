<?php echo $this->Session->flash(); ?>

<div class="category">
	<h2><?php echo $data['Category']['title']; ?></h2>
</div>

<div class="threds">
	<div class="threds-content">
		<?php foreach ($data['Thread'] as $thread): ?>
			<div class="comment">
				<div class="comment-header">
					<?php if ($thread['author_email']): ?>
						名前: <a href="mailto:<?php echo $thread['author_email']; ?>"><?php echo $thread['author_name']; ?></a>
					<?php else: ?>
						名前: <?php echo $thread['author_name']; ?>
					<?php endif; ?>
					
					<?php echo $thread['created']; ?>
				</div>
				<div class="comment-content">
					<p><?php echo $thread['body']; ?></p>
				</div>
			</div>			
		<?php endforeach; ?>
	</div>
</div>