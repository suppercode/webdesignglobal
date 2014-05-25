<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div id="body-top">
	<div class="wrr-bd-top wrap-inner pane">
		<div class="wrr-title"><h1><?php echo $this->pageTitle?></h1></div>
	</div>
</div>
<div id="content">
	<div class="wrap-inner pane">
		<div class="wrr-page-content"><?php echo $content; ?></div>
	</div>
</div><!-- content -->
<?php $this->endContent(); ?>