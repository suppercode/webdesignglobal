<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="sliding-nav relative overflow-hidden navtoggle">
<div class="brand-icon navtoggle"> <a href="<?php echo Yii::app()->createUrl('/site/index')?>" class="block"></a> </div>
<?php $this->widget('application.widgets.menuleft.MenuLeftWidget');?>
</div>
<div id="wrap" class="wrap selfclear nopadding relative">
	<?php if(!Yii::app()->user->isGuest):?>
	<div id="toolbar">
		<div class="wrr-t">
		<div class="t-l">
			<div class="btn-group">
			  <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-share-alt"></span> Quick Menu <span class="caret"></span></button>
			  <ul class="dropdown-menu" role="menu">
			    <li><a href="#">Quick Menu</a></li>
			    <li><a href="#">Another action</a></li>
			    <li><a href="#">Something else here</a></li>
			    <li class="divider"></li>
			    <li><a href="#">Separated link</a></li>
			  </ul>
			</div>
		</div>
		<div class="t-user">
		<div class="btn-group">
			<div class="btn-group">
		  		<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-bell"></span> 11</button>
		  		<ul class="dropdown-menu">
		      		<li><a href="#">Lorem Issue</a></li>
		      		<li><a href="#">Lorem Issue</a></li>
	    		</ul>
		  	</div>
		  	<div class="btn-group">
		  		<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-envelope"></span> 24</button>
		  		<ul class="dropdown-menu">
		  			<li><a href="#">Lorem Issue</a></li>
		      		<li><a href="#">Lorem Issue</a></li>
	    		</ul>
		  	</div>
		  	<div class="btn-group pull-right">
		    <button type="button" class="btn btn-info dropdown-toggle btn-sm" data-toggle="dropdown">
		      <?php echo 'Welcome, '.Yii::app()->user->username;?>
		      <span class="caret"></span>
		    </button>
		    <ul class="dropdown-menu">
		      	<li><a target="_blank" href="<?php echo Yii::app()->params['frontend_site_url'];?>"><span class="glyphicon glyphicon-cog"></span> <?php echo Yii::t('main','View Site');?></a></li>
		      	<li><a href="<?php echo Yii::app()->createUrl('/settings/admin/admin')?>"><span class="glyphicon glyphicon-cog"></span> <?php echo Yii::t('main','Settings');?></a></li>
		      	<li><a href="<?php echo Yii::app()->createUrl('/user/profile/edit');?>"><span class="glyphicon glyphicon-user"></span> <?php echo Yii::t('main','Profile');?></a></li>
		      	<?php if(UserComponent::checkAccessUser('srbac@AuthitemManage')):?>
		      	<li><a href="<?php echo Yii::app()->createUrl('/srbac/authitem/manage');?>"><span class="glyphicon glyphicon-record"></span> <?php echo Yii::t('main','Permission');?></a></li>
		      	<?php endif;?>
		      	<li class="divider"></li>
		      	<li><a href="<?php echo Yii::app()->createUrl('/user/logout');?>"><span class="glyphicon glyphicon-off "></span> <?php echo Yii::t('main','Logout');?></a></li>
		    </ul>
		  </div>
		</div>
		</div>
		<div class="clear"></div>
		</div>
	</div>
	<?php endif;?>
	<div class="main full-height relative">
		<div id="main-content" class="main-content">
			<div id="content" class="selfclear relative">
				<?php echo $content; ?>
			</div>
		</div> 
	</div>
</div>       
<?php $this->endContent(); ?>