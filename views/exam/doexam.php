<?php 
	use yii\helpers\Html;
	use yii\bootstrap\Modal;
	
	$model = $data['model'];
	foreach ($model as $key => $value) {
		$model[$key]['checked'] = 0;
	}
	//use JS.
	$url = Yii::getAlias('@web') . "/exam/ajax_exam_result";
	// print_r(Yii::getAlias('@web') . "exam/ajax_exam_result");
	// die();
	//chuyen array thanh json
	$question_data = json_encode($model);

	$this->registerJsFile(Yii::$app->request->baseUrl.'/js/doexam.js',['depends' => [\yii\web\JqueryAsset::className()]])
?>

<div class="container">
	<div class="row ">
	<h1>Exam <?php echo $data['exam_id'] ?></h1>
	<hr>
	<!-- data-model: send data to js -->
	<div class="col-md-8 col-md-offset-2 question-data" data-model='<?php echo $question_data; ?>' 
	data-url ='<?php echo $url; ?>' data-id = '<?php echo $data['exam_id'] ?>'>
		<p class ="ques-id" id="<?php echo $model[0]['question_id'] ?>">Question: 1</p>
		<p class ="ques-content"> <?php echo $model[0]['content_question'] ?> </p>
		<div class="radio">
			<label><input type="radio" name="answer" class="answer" value="A" > <p class="answer_a"> <?php echo $model[0]['answer_a'] ?> </p> </label>	
		</div>
		<div class="radio">
			<label> <input type="radio" name="answer" class="answer" value="B" > <p class="answer_b"> <?php echo $model[0]['answer_b'] ?> </p> </label>
		</div>
		<div class="radio">
			<label> <input type="radio" name="answer" class="answer" value="C" > <p class="answer_c"> <?php echo $model[0]['answer_c'] ?> </p> </label>
		</div>
		<div class="radio">
			<label> <input type="radio" name="answer" class="answer" value="D" > <p class="answer_d"> <?php echo $model[0]['answer_d'] ?> </p> </label>
		</div>
		
			<?= Html::submitButton('Back', ['class' => 'btn btn-primary btn-back', 'name' => 'login-button']) ?>
			<?= Html::submitButton('Next', ['class' => 'btn btn-primary btn-next' , 'id' => 0 , 'name' => 'login-button', 'disabled' => 'disabled']) ?>
			
			<?php 

				Modal::begin([
			    'header' => '<h2>Result</h2>',
			    'toggleButton' => ['label' => 'Submit',
			    					'class' => 'btn btn-primary btn-submit',
			    					'id' => 0,
			    					'style' => 'display: none;'
			    				],
				]);
			?>
				<div>
					<label>Result: </label><p class="modal-answer"> </p>
					<label>Your score: </label><p class="modal-score"> </p>
				</div>
			<?php
				Modal::end();
			 ?>
	</div>
	
</div>