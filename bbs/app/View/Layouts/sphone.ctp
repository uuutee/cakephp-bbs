<?php
$title = $title_for_layout;
$page_meta_keywords = 0;
$page_meta_description = 0;
require_once $_SERVER['DOCUMENT_ROOT'] . '/module/config/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/module/config/require.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/module/template/sphone/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/module/template/sphone/parts/header.php';
?>

<h1 class="page-title tshadow01 gradient01"><?php echo $title; ?></h1>

<div class="dm-members">
<?php echo $this->fetch('content'); ?>
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/module/template/sphone/parts/footer.php';?>
