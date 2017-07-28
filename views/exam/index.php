<?php 
use yii\helpers\Html;
?>

<div class="container">
	<div class="row ">
	<h1>List of Exam</h1>
	<hr>
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Index</th>
				<th>Exam</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($model as $key => $value): ?>
			<tr>
				<td> <?php echo $key ?></td>
				<td> <?= Html::a( $value['exam_title'] ,['exam/doexam','id'=>$value['exam_id']] ) ?></td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>

</div>