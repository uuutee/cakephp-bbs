<?php echo $this->Session->Flash(); ?>

<?php if (!empty($data)): ?>
	<?php 
	echo $this->Form->create(
		'Category', 
		array(
			'action' => 'delete', 
			'onSubmit' => 'return confirm(\'削除してもよろしいですか？\')'
		)
	); 
	?>
		<div class="table">
			<?php foreach ($data as $key => $value): ?>
				<div class="row">
					<div class="col-sm-6">
						<?php 
						echo $this->Form->input(
							$value['Category']['id'], 
							array(
								'div'   => false, 
								'label' => $value['Category']['title'], 
								'type'  => 'checkbox'
							)
						); 
						?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>

		<?php 
		echo $this->Form->submit(
			'削除', 
			array(
				'div'   => false,
				'label' => false,
				'class' => 'btn btn-danger'
			)
		); 
		?>
	<?php echo $this->Form->end(); ?>
<?php else: ?>
	<p>データがありません。</p>
<?php endif; ?>