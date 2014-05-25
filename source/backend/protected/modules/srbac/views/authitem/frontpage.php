<?php
/**
 * frontpage.php
 *
 * @author Spyros Soldatos <spyros@valor.gr>
 * @link http://code.google.com/p/srbac/
 */

/**
 * Srbac main administration page
 *
 * @author Spyros Soldatos <spyros@valor.gr>
 * @package srbac.views.authitem
 * @since 1.0.2
 */
 ?>
 <?php 
 $action = $this->action->id;
 ?>
<div class="marginBottom">
  <div class="iconSet">
  	<ul class="nav nav-tabs">
	  <li <?php if($action=='manage') echo 'class="active"';?>>
	  	<?php echo SHtml::link(
            SHtml::image($this->module->getIconsPath().'/manageAuth.png',
                    Helper::translate('srbac','Managing auth items'),
                    array(
                      'class'=>'icon',
                      'title'=>Helper::translate('srbac','Managing auth items'),
                      'border'=>0
                      )
                )." " .
                ($this->module->iconText ?
                Helper::translate('srbac','Managing auth items') :
                ""),
            array('authitem/manage'), array('class'=>'add-btn button'))
    	?>
	  </li>
	  <li <?php if($action=='assign') echo 'class="active"';?>><?php echo SHtml::link(
            SHtml::image($this->module->getIconsPath().'/usersAssign.png',
                    Helper::translate('srbac','Assign to users'),
                    array('class'=>'icon',
                      'title'=>Helper::translate('srbac','Assign to users'),
                      'border'=>0,
                      )
                )." " .
                ($this->module->iconText ?
                Helper::translate('srbac','Assign to users') :
                ""),
            array('authitem/assign'), array('class'=>'add-btn button'));?>
            </li>
	  <li <?php if($action=='assignments') echo 'class="active"';?>><?php echo SHtml::link(
            SHtml::image($this->module->getIconsPath().'/users.png',
                    Helper::translate('srbac','User\'s assignments'),
                    array('class'=>'icon',
                      'title'=>Helper::translate('srbac','User\'s assignments'),
                      'border'=>0
                      )
                )." " .
                ($this->module->iconText ?
                Helper::translate('srbac','User\'s assignments') :
                ""),
            array('authitem/assignments'), array('class'=>'add-btn button'));?></li>
	</ul>
  </div>
    <div class="reset"></div>
</div>