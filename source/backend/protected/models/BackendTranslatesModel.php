<?php

Yii::import('common.models.db.TranslatesModel');

class BackendTranslatesModel extends TranslatesModel
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	public function beforeSave()
	{
		$this->update_time = new CDbExpression('NOW()');
		return parent::beforeSave();
	}
	public static function getUpdateX($id, $where='')
	{
		$paramsTrans = Yii::app()->user->getState('paramsTrans');
		$params = HelpTranslate::Params();
		$fields = $params[$paramsTrans['key']]['fields'];
		$table = $params[$paramsTrans['key']]['table'];
		$language = $paramsTrans['language'];
		$field_array = array();
		foreach ($fields as $key => $value){
			$field_array[$key] = 'tb.'.$value;
		}
		$f = implode(',', $field_array);
		$where =($params[$paramsTrans['key']]['where']!="")?" AND ".$params[$paramsTrans['key']]['where']:"";
		$sql = "SELECT $f, tt.published, tt.id as tid,tt.trans_content
		FROM $table as tb
		LEFT JOIN tbl_translates as tt ON tt.pri_id={$field_array[0]}
		WHERE true $where AND {$field_array[0]}=:id AND tt.language = :lang AND tt.table_name = '$table'
		";
		$Command = Yii::app()->db->createCommand($sql);
		$Command->bindParam(':id',$id);
		$Command->bindParam(':lang',$language,PDO::PARAM_STR);
		return $Command->queryRow();
	}
	
	public static function GetListTransNews($language, $limit='', $offset='',$type='post')
	{
		$limit = ($limit!='')?" LIMIT $limit":"";
		$offset= ($offset!='')?" OFFSET $offset":"";
		$sql = "SELECT tc.id, tc.title,tc.alias,tc.introtext,tc.fulltext, tt.published, tt.id as tid,tt.trans_content, tt.table_name
		FROM tbl_content as tc
		LEFT JOIN tbl_translates as tt ON tt.table_name = 'tbl_content' AND tt.pri_id=tc.id AND tt.language = '$language'
		WHERE true AND tc.type='$type'
		$limit
		$offset
		";
		$Command =  Yii::app()->db->createCommand($sql);
		return $Command->queryAll();
	}
	public static function GetListTransMenus($language, $limit='', $offset='')
		{
		$limit = ($limit!='')?" LIMIT $limit":"";
		$offset= ($offset!='')?" OFFSET $offset":"";
		$sql = "SELECT tmi.id, tmi.name,tmi.alias, tt.published, tt.id as tid,tt.trans_content, tt.table_name
		FROM tbl_menu_items as tmi
		LEFT JOIN tbl_translates as tt ON tt.pri_id=tmi.id AND tt.table_name = 'tbl_menu_items' AND tt.language = '$language'
		WHERE true
		$limit
		$offset
		";
		$Command =  Yii::app()->db->createCommand($sql);
		return $Command->queryAll();
	}
	public static function GetListTransCategories($language, $limit='', $offset='')
	{
		$limit = ($limit!='')?" LIMIT $limit":"";
		$offset= ($offset!='')?" OFFSET $offset":"";
		$sql = "SELECT tc.id, tc.title,tc.alias,tc.description, tt.published, tt.id as tid,tt.trans_content, tt.table_name
		FROM tbl_categories as tc
		LEFT JOIN tbl_translates as tt ON tt.table_name = 'tbl_categories' AND tt.pri_id=tc.id AND tt.language = '$language'
		WHERE true AND tc.published=1
		$limit
		$offset
		";
		$Command =  Yii::app()->db->createCommand($sql);
		return $Command->queryAll();
	}
	public static function getListData($language, $limit='', $offset=0)
	{
		$limit = ($limit!='')?" LIMIT $limit":"";
		$offset= ($offset!='')?" OFFSET $offset":"";
		$params = HelpTranslate::Params();
		$paramsTrans = Yii::app()->user->getState('paramsTrans');
		$table = $params[$paramsTrans['key']]['table'];
		$priKey = $params[$paramsTrans['key']]['pri_key'];
		$fieldsShow =  $params[$paramsTrans['key']]['field_to_show'];
		$fieldsShow = implode(',', $fieldsShow);
		$sql = "SELECT $fieldsShow, c2.published, c2.id as tid,c2.trans_content, c2.table_name
		FROM $table as c1
		LEFT JOIN tbl_translates as c2 ON c2.table_name = '$table' AND c2.pri_id=c1.$priKey AND c2.language = '$language'
		WHERE true 
		ORDER BY c1.$priKey DESC
		$limit
		$offset
		";
		$Command =  Yii::app()->db->createCommand($sql);
		return $Command->queryAll();
	}
	public static function getTotalData($language,$table,$field_count,$where='')
		{
		$where = ($where!='')?" AND $where":"";
		$sql = "SELECT count($field_count) as num
		FROM $table
		WHERE true $where
		";
		$Command =  Yii::app()->db->createCommand($sql);
		return $Command->queryScalar();
	}
	public static function removeTranslate($arrayId=array())
	{
		if(count($arrayId)>0){
			$arrayId = array_filter($arrayId);
			$ids = implode(',', $arrayId);
			$sql = "DELETE FROM tbl_translates WHERE id IN ($ids)";
			$command =  Yii::app()->db->createCommand($sql);
			return $command->query();
		}
		return true;
	}
		
}