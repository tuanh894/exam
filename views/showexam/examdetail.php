<?php 
	use yii\helpers\Html;
	use yii\bootstrap\ActiveForm;

	 ?>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
		<h1>Create Exam</h1>
			<?php $form = ActiveForm::begin(); ?>
			
				<?= $form->field($question, 'content_question')->textInput(['autofocus' => true, 'value' => $getQuestion['content_question'] ]) ?>
				<?= $form->field($question, 'answer')->textInput(['autofocus' => true, 'value' => $getQuestion['answer'] ]) ?>
				<?= $form->field($question, 'answer_a')->textInput(['autofocus' => true, 'value' => $getQuestion['answer_a'] ]) ?>
				<?= $form->field($question, 'answer_b')->textInput(['autofocus' => true, 'value' => $getQuestion['answer_b'] ]) ?>
				<?= $form->field($question, 'answer_c')->textInput(['autofocus' => true, 'value' => $getQuestion['answer_c'] ]) ?>
				<?= $form->field($question, 'answer_d')->textInput(['autofocus' => true, 'value' => $getQuestion['answer_d'] ]) ?>
				
				<?= Html::submitButton('Update', ['class' => 'btn btn-primary addQuestion', 'name' => 'login-button']) ?>

        
	  		<?php $form = ActiveForm::end(); ?>
		</div>
	</div>
</div>