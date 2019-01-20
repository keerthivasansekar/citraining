<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
</head>
<body>
	<div>
		<div><h2>Dashboard</h2></div>
		<div>Welcome <?= $name ?></div>
		<div><a href="<?= base_url('login/logout') ?>">Logout</a></div>
	</div>
	<div>
		<table>
			<tr>
				<td><a href="<?= base_url('news'); ?>">News</a></td>
				<td><a href="<?= base_url('login/securepage'); ?>">Users</a></td>
			</tr>
		</table>
	</div>
</body>
</html>