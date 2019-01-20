<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login - Home</title>
</head>
<body>
	<div align="center"><h1>Login</h1></div>
	<div>
		<?php if($this->session->flashdata('err_msg') != NULL)
		{	echo $this->session->flashdata('err_msg');	}
		?>
	</div>
	<div>
		<form action="<?= base_url('login') ?>" method="post">
			<div>
				<label>Email</label>
				<div>
					<input type="text" name="email" placeholder="Enter your email." value="<?php set_value('email') ?>" />
				</div>
				<div><?php echo form_error('email') ?></div>
			</div>
			<div>
				<label>Password</label>
				<div>
					<input type="password" name="pword" placeholder="Enter your password." value="">
				</div>
				<div><?php echo form_error('pword') ?></div>
			</div>
			<div>
				<button type="submit">Login</button>
				<button type="reset">Reset</button>
			</div>
		</form>
	</div>
	<div><a href="<?= base_url('login/forgot_password') ?>">Forgot password</a></div>
</body>
</html>