<?php 
	use yii\helpers\Html;
	use yii\bootstrap\ActiveForm;
 ?>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
		<h1>Create User</h1>
			<?php $form = ActiveForm::begin(); ?>
			
				<?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

        		<?= $form->field($model, 'password')->passwordInput() ?>
				
				<?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>
        		
				<?= Html::submitButton('Create', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
        
	  		<?php $form = ActiveForm::end(); ?>
		</div>
	</div>
</div>