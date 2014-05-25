<div class="toolbar-action">
	<div class="ta-inner div-table">
		<div class="div-row">
			<div class="div-column-l" style="vertical-align: middle">
			<h3 class="page-title"><?php echo Yii::app()->controller->pageTitle;?></h3></div>
			<div class="div-column-r">
				<?php if(empty($this->btnOptions)):?>
					<?php 
					$action = Yii::app()->controller->action->id;
					?>
					<?php if($action=='admin'):?>
					<a class="btn btn-primary btn-sm" href="<?php echo $this->createUrl('create')?>">Create New</a>
					<a class="btn btn-primary btn-sm search-button" href="<?php echo $this->createUrl('create')?>">Search</a>
					<?php elseif(in_array($action, array('create','update'))):?>
					<a class="btn btn-primary btn-sm submit" href="#">Save</a>
					<a class="btn btn-primary btn-sm apply" href="#">Save & Continue</a>
					<a class="btn btn-primary btn-sm" href="<?php echo $this->createUrl('admin')?>">Close</a>
					<?php elseif(in_array($action, array('view'))):?>
					<a class="btn btn-primary btn-sm submit" href="<?php echo $this->createUrl('update', array('id'=>$_GET['id']))?>">Update</a>
					<a class="btn btn-primary btn-sm" href="<?php echo $this->createUrl('admin')?>">Close</a>
					<?php endif;?>
				<?php else:?>
					<?php echo $this->btnOptions; ?>
				<?php endif;?>
			</div>
		</div>
		<?php echo $this->clips['toolbar-ac'];?>
	</div>
</div>
<script>
jQuery(function(){
	$(".submit").live("click", function(){
		$("form").submit();
	})
	$(".apply").live("click", function(){
		$("#apply").attr("value",1);
		$("form").submit();
	})
})
</script>