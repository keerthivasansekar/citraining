<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Forget Password</title>
</head>
<body>
	<div><h2>Forgot Password</h2></div>
	<div>
		<div>
			<?php 
			if($this->session->flashdata('err_msg') !== NULL)
			{ echo $this->session->flashdata('err_msg'); }
			?>			
		</div>
		<form action="<?= base_url('login/forgot_password') ?>" method="post">
			<div>
				<label>Enter your Email</label>
				<div>
					<input type="text" name="email" placeholder="Enter your email" value="<?= set_value('email') ?>">
				</div>
				<div><?= form_error('email') ?></div>
			</div>
			<div>
				<div>
					<button type="submit">Reset password</button>
				</div>
			</div>
		</form>
	</div>
</body>
</html>