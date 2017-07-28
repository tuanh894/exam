<?php 
	use yii\helpers\Html;
	use yii\bootstrap\ActiveForm;
	// $url = Yii::getAlias('@web') . "/exam/ajax_exam_result";
	$url_exam = Yii::getAlias('@web') . "/showexam/ajax_create_exam";
	$url_question = Yii::getAlias('@web') . "/showexam/ajax_create_question";

	$this->registerJsFile(Yii::$app->request->baseUrl.'/js/createexam.js',['depends' => [\yii\web\JqueryAsset::className()]])
	 // $url = Yii::getAlias('@web') . "/exam/ajax_exam_result";
	 ?>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 exam" data-exam = " <?php echo $url_exam ?>" data-question = "<?php echo $url_question ?>">
		<h1>Create Exam</h1>
			<?php $form = ActiveForm::begin(); ?>
			
				<?= $form->field($exam, 'exam_title')->textInput(['autofocus' => true ,'class' => 'form-control exam_title']) ?>
			<div class="question" style="display: none">
				<label>Question: </label><p class ="ques-id">1</p>
				<?= $form->field($question, 'content_question')->textInput(['autofocus' => true,'class' => 'form-control content_question']) ?>
				<?= $form->field($question, 'answer')->textInput(['autofocus' => true, 'class' => 'form-control answer']) ?>
				<?= $form->field($question, 'answer_a')->textInput(['autofocus' => true, 'class' => 'form-control answer_a']) ?>
				<?= $form->field($question, 'answer_b')->textInput(['autofocus' => true, 'class' => 'form-control answer_b']) ?>
				<?= $form->field($question, 'answer_c')->textInput(['autofocus' => true, 'class' => 'form-control answer_c']) ?>
				<?= $form->field($question, 'answer_d')->textInput(['autofocus' => true, 'class' => 'form-control answer_d']) ?>
			</div>
				
				
				<?= Html::submitButton('Add', ['class' => 'btn btn-primary addQuestion','style' => 'display : none;', 'name' => 'login-button']) ?>
				
				<?= Html::submitButton('Create', ['class' => 'btn btn-primary create', 'name' => 'login-button']) ?>

				<?= Html::a('Done',['index'], ['class' => 'btn btn-primary done', 'style' => 'display : none;', 'name' => 'login-button'] ) ?>

				
        
	  		<?php $form = ActiveForm::end(); ?>
		</div>
	</div>
</div>