<?php
$title = $title_for_layout;
$page_meta_keywords = 0;
$page_meta_description = 0;
require_once $_SERVER['DOCUMENT_ROOT'] . '/module/config/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/module/config/require.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/module/template/default/parts/html_header.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/module/template/default/parts/header.php';
$bread = '<div class="bread"><div class="bread-inner clearfix"><span class="home"><a href="/">' . BREAD_HOMENAME . '</a></span>' . BREAD_SEPARATOR . '<span class="current">' . $title . '</span></div></div>';
?>

<?php echo $bread; ?>

<div id="main" class="cf-form"><div id="main-inner">
<h1 class="page-title"><?php echo $title; ?></h1>

<?php echo $this->fetch('content'); ?>

<?php echo $this->element('sql_dump');?>
</div></div><!-- #main -->

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/module/template/default/parts/sidebar.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/module/template/default/parts/footer.php';
?>
