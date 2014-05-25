<?php 
$module = Yii::app()->controller->module->id;
$controller = Yii::app()->controller->getId();
?>
<ul class="menu-top-level">
	<li class="menu-section">
		<div class="menu-section-item">
		<ul class="apps-link">
			<li><a class="yt-valign" href="<?php echo Yii::app()->createUrl('/dashboard');?>"><i class="glyphicon glyphicon-home"></i>&nbsp;Dashboard</a></li>
			<li><a class="yt-valign <?php if($module =='news' && $controller=='news') echo 'actived';?>" href="<?php echo Yii::app()->createUrl('/news/news/admin');?>"><i class="glyphicon glyphicon-list-alt"></i>&nbsp;Articles Manager</a>
				<?php if($module =='news' && ($controller=='news' || $controller=='categories') || $module=='files'){?>
				<ul class="sub-menu">
					<li><a class="yt-valign <?php if($module =='news' && $controller=='categories') echo 'actived';?>" href="<?php echo Yii::app()->createUrl('/news/categories/admin');?>">Categories Manager</a></li>
					<li><a class="yt-valign <?php if($module =='files') echo 'actived';?>" href="<?php echo Yii::app()->createUrl('/files/files/admin');?>">File Manager</a></li>
				</ul>
				<?php }?>
			</li>
			<li><a class="yt-valign <?php if($module =='news' && $controller=='pages') echo 'actived';?>" href="<?php echo Yii::app()->createUrl('/news/pages/admin');?>"><i class="glyphicon glyphicon-book icon-blue"></i>&nbsp;Page Manager</a></li>
			<li><a class="yt-valign <?php if($module=='media') echo 'actived';?>" href="<?php echo Yii::app()->createUrl('/media/manage');?>"><i class="glyphicon glyphicon-folder-open"></i>&nbsp;Media Manager</a></li>
			<li><a class="yt-valign <?php if($module=='polls') echo 'actived';?>" href="<?php echo Yii::app()->createUrl('/polls/poll/admin');?>"><i class="glyphicon glyphicon-tasks"></i>&nbsp;Polls Manager</a></li>
			<li><a class="yt-valign <?php if($module=='menu') echo 'actived';?>" href="<?php echo Yii::app()->createUrl('/menu/menus/admin');?>"><i class="glyphicon glyphicon-align-justify"></i>&nbsp;Menu Manager</a></li>
			<li><a class="yt-valign <?php if($module=='gallery') echo 'actived';?>" href="<?php echo Yii::app()->createUrl('/gallery/galleryItems/admin');?>"><i class="glyphicon glyphicon-picture"></i>&nbsp;Gallery Manager</a></li>
			<li><a class="yt-valign <?php if($module=='comment') echo 'actived';?>" href="<?php echo Yii::app()->createUrl('/comment/manage/admin');?>"><i class="glyphicon glyphicon-comment"></i>&nbsp;Comment Manager</a></li>
			<li><a class="yt-valign <?php if($module=='widget') echo 'actived';?>" href="<?php echo Yii::app()->createUrl('/widget/manage/admin');?>"><i class="glyphicon glyphicon-th-large"></i>&nbsp;Wigets Manager</a></li>
			<li><a class="yt-valign <?php if($module=='translate') echo 'actived';?>" href="<?php echo Yii::app()->createUrl('/translate/filterTranslate/Filterlayout');?>"><i class="glyphicon glyphicon-globe"></i>&nbsp;Languages Translate</a></li>
			<li><a class="yt-valign <?php if($module=='settings' && $controller=='default') echo 'actived';?>" href="<?php echo Yii::app()->createUrl('/settings');?>"><i class="glyphicon glyphicon-cog"></i>&nbsp;Settings</a>
				<?php if($module=='settings'){?>
				<ul class="sub-menu">
					<li><a class="yt-valign <?php if($module =='settings' && $controller=='admin') echo 'actived';?>" href="<?php echo Yii::app()->createUrl('/settings/admin/admin');?>">System</a></li>
				</ul>
				<?php }?>
			</li>
		</ul>
		</div>
	</li>
</ul>