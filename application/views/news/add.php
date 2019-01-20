<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open($action); ?>

    <label for="title">Title</label>
    <input type="input" name="title" value="<?= (isset($news_item['title'])? $news_item['title'] : set_value('title')) ?>" /><br />

    <label for="text">Text</label>
    <textarea name="text"><?= (isset($news_item['text'])? $news_item['text'] : set_value('text')) ?></textarea><br />

    <input type="submit" name="submit" value="Save" />

</form>