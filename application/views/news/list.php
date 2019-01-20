<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html>
<head>
	<title>News List</title>
</head>
<body>
	<a href="<?= base_url('news/create') ?>">Create news</a>
	<?php foreach ($news as $news_item): ?>
		<h3><?php echo $news_item['title']; ?></h3>
        <div class="main">
            <?php echo $news_item['text']; ?>
        </div>
        <p>
        	<a href="<?= base_url('news/view/'.$news_item['slug']); ?>">View</a> 
        	<a href="<?= base_url('news/edit/'.$news_item['slug']); ?>">Edit</a> 
        	<a href="<?= base_url('news/delete/'.$news_item['slug']); ?>">Delete</a>
        </p>
	<?php endforeach; ?>
</body>
</html>
