<?php
class UserComponent
{
	public static function checkAccessUser($actionName)
	{
		if(Yii::app()->user->hasState('_assignPer')){
			$assignTaskAll = Yii::app()->user->getState('_assignPer');
		}else{
			$assignTaskAll = self::getAllAssignments(Yii::app()->user->id);
		}
		return in_array($actionName, $assignTaskAll);
	}
	public static function getAllAssignments($userId)
	{
		$opers =array();
		$tasks = array();
		$roleArr = array();
		$roles = Helper::getUserAssignedRoles($userId);
		if(count($roles)>0){
			foreach ($roles as $key => $role){
				$roleArr[$role->name] = "'{$role->name}'";
			}
		}
		if(count($roleArr)>0){
			$sql = "SELECT t1.child
					FROM itemchildren t1
					WHERE parent IN (".implode(',', $roleArr).")
					";
			$tasks = Yii::app()->db->createCommand($sql)->queryColumn();
		}
		if(count($tasks)>0){
			foreach ($tasks as $task){
				$arrTask[] = "'{$task}'";
			}
			$sql = "SELECT t1.child
					FROM itemchildren t1
					WHERE parent IN (".implode(',', $arrTask).")
					";
			$opers = Yii::app()->db->createCommand($sql)->queryColumn();
		}
		return $opers;
	}
	private function getRoles($userid)
	{
		return Helper::getUserAssignedRoles($userid);
	}
	private function getTasks($role)
	{
		return Helper::getRoleAssignedTasks($role);
	}
	private function getOpers($task)
	{
		return Helper::getTaskAssignedOpers($task);
	}
}