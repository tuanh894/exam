
<?php
	use yii\helpers\Html;
?>
<h1>admin/admin</h1>

<?= Html::a('User',['showuser/index'], ['class' => 'btn btn-success', 'name' => 'login-button'] ) ?>
<?= Html::a('Exam',['showexam/index'], ['class' => 'btn btn-success', 'name' => 'login-button'] ) ?>
<?= Html::a('Reslut',['showuser/create'], ['class' => 'btn btn-success', 'name' => 'login-button'] ) ?>