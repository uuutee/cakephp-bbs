<?php
echo '<pre>';
print_r($comment);
echo '</pre>';
?>

<div class="comments">		
	<div class="comments-content">
		<div class="comment">
			<div class="comment-header">
				<div class="asset-meta">
					<span class="byline">
						名前: <a href="<?php echo $comment['Comment']['author_email']; ?>"><?php echo $comment['Comment']['author_name']; ?></a></span>
						<?php echo $comment['Comment']['created']; ?>
				   </span>
				</div>
			</div>
			<div class="comment-content">
				<p><?php echo $comment['Comment']['body']; ?></p>
			</div>
		</div>			
	</div>
</div>