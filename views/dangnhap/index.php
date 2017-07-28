<?php 
	use yii\helpers\Html;
	use yii\bootstrap\ActiveForm;
 ?>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<?php $form = ActiveForm::begin(); ?>

				<?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

        		<?= $form->field($model, 'password')->passwordInput() ?>
        		
				<?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
        
	  		<?php $form = ActiveForm::end(); ?>
		</div>
	</div>
</div>