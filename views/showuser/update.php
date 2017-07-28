<?php 
	use yii\helpers\Html;
	use yii\bootstrap\ActiveForm;
	$user_data = $user[0];
	// var_dump($username);
 ?>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
		<h1>Update User</h1>
			<?php $form = ActiveForm::begin(); ?>
			
				<?= $form->field($model, 'username')->textInput(['autofocus' => true, 'value' => $user_data['username'] ]) ?>

        		<?= $form->field($model, 'password')->textInput(['value' => $user_data['password']]) ?>
				
				<?= $form->field($model, 'email')->textInput(['autofocus' => true, 'value' => $user_data['email'] ]) ?>
        		
				<?= Html::submitButton('Update', ['class' => 'btn btn-primary ', 'name' => 'login-button']) ?>
        
	  		<?php $form = ActiveForm::end(); ?>
		</div>
	</div>
</div>