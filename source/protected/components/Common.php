<?php
class Common{
	public static function setPageTitle($title)
	{
		//return $title.' | '.Yii::app()->name;
		Yii::app()->controller->pageTitle = $title;
	}
}