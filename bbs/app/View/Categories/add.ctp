<?php echo $this->Session->flash(); ?>

<div class="comments-open">
	<h2 class="comments-open-header">カテゴリを登録する</h2>
	<div class="comments-open-content">
		<?php 
		echo $this->Form->create(
			'Category',
			array(
				'class' => 'form-horizontal'
			)
		); 
		?>
			<div class="form-group">
				<div class="col-sm-3 control-label">
					タイトル <span class="required">*</span>
				</div>
				<div class="col-sm-6">
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
				<div class="col-sm-offset-3 col-sm-2">
					<?php 
					echo $this->Form->submit(
						'登録', 
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