
<?php
	use yii\helpers\Html;
?>

<div class="container">
	<div class="row ">
	<h1>List of User</h1>
	<hr>
	<?= Html::a('Create',['showuser/create'], ['class' => 'btn btn-success', 'name' => 'login-button'] ) ?>

		<table class="table table-hover">
			<thead>
				<tr>
					<th>ID</th>
					<th>Username</th>
					<th>Password</th>
					<th>Email</th>
					<th>Administration</th>
					<th>Update</th>
					<th>Delete</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($data as $value): ?>
				<tr>
					<td><?php echo $value['id_user'] ?></td>
					<td><?php echo $value['username'] ?></td>
					<td><?php echo $value['password'] ?></td>
					<td><?php echo $value['email'] ?></td>
					<td><?php echo $value['is_admin'] ?></td>
					<td> <?= Html::a('Update',['showuser/update','id'=>$value['id_user']], ['class' => 'btn btn-primary', 'name' => 'login-button'] ) ?> </td>
					<td> <?= Html::a('Delete',['showuser/delete','id'=>$value['id_user']], ['class' => 'btn btn-danger', 'name' => 'login-button'] ) ?> </td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>