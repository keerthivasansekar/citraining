<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>News - <?= $title ?></title>
</head>
<body>
	<?php
		echo '<h2>'.$news_item['title'].'</h2>';
		echo $news_item['text'];
	?>
	<br>
	<a href="<?= base_url('news') ?>">BACK</a>
</body>
</html>