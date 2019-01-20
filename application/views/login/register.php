<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title ?></title>
</head>
<body>
	<div><h2><?php echo $page ?></h2></div>
	<div>
		<form action="<?= base_url($url) ?>" method="post">
			<div>
				<label>Full Name</label>
				<div>
					<input type="text" name="name" placeholder="Name" value="<?= (isset($user['fullname'])? $user['fullname'] : set_value('name')) ?>" />
				</div>
				<div><?= form_error('name'); ?></div>
			</div>
			<div>
				<label>Mobile</label>
				<div>
					<input type="text" name="mobile" placeholder="Mobile" value="<?= (isset($user['mobile'])? $user['mobile'] : set_value('mobile')) ?>" />
				</div>
				<div><?= form_error('mobile'); ?></div>
			</div>
			<div>
				<label>Email</label>
				<div>
					<input type="email" name="email" placeholder="Email" value="<?= (isset($user['email'])? $user['email'] : set_value('email')) ?>">
				</div>
				<div><?= form_error('email'); ?></div>
			</div>
			<div>
				<label>Password</label>
				<div>
					<input type="password" name="pword" placeholder="Password" value="<?= set_value('pword'); ?>" />
				</div>
				<div><?= form_error('pword'); ?></div>
			</div>
			<div>
				<label>Confirm Password</label>
				<div>
					<input type="password" name="cfpword" placeholder="Re Enter Password" value="<?= set_value('cfpword'); ?>">
				</div>
				<div><?= form_error('cfpword'); ?></div>
			</div>
			<div>
				<div>
					<button type="submit">Save</button>
					<button type="reset">Reset</button>
				</div>
			</div>
		</form>
		<div><a href="<?= base_url('login/securepage') ?>">BACK</a></div>
	</div>
</body>
</html>