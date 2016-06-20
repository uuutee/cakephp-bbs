<?php echo $this->Session->flash(); ?>

<?php 
echo $this->Form->create(
	'User',
	array(
		'class' => 'form-horizontal',
	)
); 
?>
	<div class="form-group">
		<div class="col-sm-3 control-label">
			ユーザー名
		</div>
		<div class="col-sm-6">
			<?php 
			echo $this->Form->input(
				'username', 
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
			パスワード
		</div>
		<div class="col-sm-6">
			<?php 
			echo $this->Form->input(
				'password', 
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
				'ログイン', 
				array(
					'class' => 'btn btn-primary',
				)
			); 
			?>
		</div>
	</div>
<?php echo $this->Form->end(); ?>