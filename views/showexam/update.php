<?php 
	use yii\helpers\Html;
	use yii\bootstrap\ActiveForm;
	// print_r($model);
	// die();

?>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
		<h1>Update Exam</h1>
		
			<?php foreach ($model as $value): ?>
				<div>
					
				<?= Html::a( $value['content_question'] ,['showexam/examdetail','question_id' => $value['question_id'] ,'id'=>$value['exam_id']] ) ?>
				</div>

			<?php endforeach; ?>
		</div>
	</div>
</div>