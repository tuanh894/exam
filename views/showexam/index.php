<?php 
use yii\helpers\Html;
?>

<div class="container">
	<div class="row ">
	<h1>List of Exam</h1>
	<hr>
	<?= Html::a('Create',['showexam/create'], ['class' => 'btn btn-success', 'name' => 'login-button'] ) ?>
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Index</th>
				<th>Exam</th>
				<th>Update</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($data as $key => $value): ?>
			<tr>
				<td> <?php echo $key ?></td>
				<td> <?= Html::a( $value['exam_title'] ,['exam/doexam','id'=>$value['exam_id']] ) ?></td>
				<td> <?= Html::a('Update',['showexam/update','id'=>$value['exam_id']], ['class' => 'btn btn-primary', 'name' => 'login-button'] ) ?> </td>
				<td> <?= Html::a('Delete',['showexam/delete','id'=>$value['exam_id']], ['class' => 'btn btn-danger', 'name' => 'login-button'] ) ?> </td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>

</div>