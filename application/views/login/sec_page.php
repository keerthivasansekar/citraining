<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Secured Page</title>
</head>
<body>
	<div>Welcome <?= $loggedin_user ?></div>
	<div><a href="<?= base_url('login/register') ?>">New user</a></div>
	<div><a href="<?= base_url('login/logout') ?>">Logout</a></div>

	<div>
		<table border="1px">
			<tr>
				<th>SI. No</th>
				<th>Full name</th>
				<th>Email</th>
				<th>Mobile</th>
				<th>Action</th>
			</tr>
			<?php foreach($users as $user): ?>
			<tr>
				<td><?= $user['id'] ?></td>
				<td><?= $user['fullname'] ?></td>
				<td><?= $user['email'] ?></td>
				<td><?= $user['mobile'] ?></td>
				<td>
					<a href="<?= base_url('login/edit/').$user['id'] ?>">Edit</a>
					<a href="<?= base_url('login/delete/').$user['id'] ?>">Delete</a>
				</td>
			</tr>
			<?php endforeach; ?>
		</table>
	</div>
</body>
</html>