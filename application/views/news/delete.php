<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
<head>
	<title><?php $title ?></title>
</head>
<body>
	<h2>Confirm delete</h2>
	<p>Are you sure want to delete this item. if so please solve the below puzzle for verification</p>
	<div>
		<?php echo form_open('news/delete');	?>
			<input type="hidden" name="ref_no" value="<?= $news_item['id'] ?>">
			<label><?= rand(0,10) ?> + <?= rand(0,10) ?></label>
			<input type="text" name="answer">
			<button type="submit">Confirm</button>
			<button type="button" onclick="location.href='<?= base_url('news') ?>'">Cancel</button>
		<?php echo form_close(); ?>
	</div>
</body>
</html>