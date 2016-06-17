<?php
$title = $title_for_layout;
$page_meta_keywords = 0;
$page_meta_description = 0;
require_once $_SERVER['DOCUMENT_ROOT'] . '/module/config/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/module/config/require.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/module/template/mobile/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/module/template/mobile/parts/header.php';
?>

<div style="color:<?php echo $caption_cl; ?>;font-size:medium;background:<?php echo $caption_bg; ?>;"><?php echo $title; ?></div>

<div>
<?php echo $this->fetch('content'); ?><br />
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/module/template/mobile/parts/footer.php';?>
