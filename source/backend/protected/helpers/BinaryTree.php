<?php
class BinaryTree{
	//connect db
	private $_db = null;
	
	//id 9
	private $_id = null;
	//id cha
	private $_parent_id = null;
	
	//table
	private $_table = null;
	
	//value of where
	private $_where = null;
	
	//name to show
	private $_name = null;
	
	private $_limit = null;
	
	private $_order = '';
	
	
	public function BinaryTree($id,$name,$parent_id,$table,$where='',$limit='',$order=''){
		$this->_id = $id;
		$this->_parent_id = $parent_id;
		$this->_table = $table;
		$this->_where = $where;
		$this->_name = $name;
		$this->_limit = $limit;
		$this->_order = ($order!='')?"ORDER BY $order asc":"";
	}
	
	public function getTreeResult(){
		$sql = "SELECT * FROM {$this->_table} {$this->_where} {$this->_order}";
		if($this->_limit!=''){
			$sql .=" $this->_limit";
		}
		$result = Yii::app()->db->createCommand($sql)->queryAll();
		$children = array();
		
		if ( count($result)>0 )
		{
			// first pass - collect children
			foreach($result as $v )
			{
				
				$pt 	= $v[$this->_parent_id];
				$list 	= @$children[$pt] ? $children[$pt] : array();
				array_push( $list, $v );
				$children[$pt] = $list;
			}
		}
		
		// second pass - get an indent list of the items
		$items = $this->treerecurse( 0, '', array(), $children, 9999, 0, 1 );
		// third pass, set into different menus
		foreach($items as $key=>$item)
		{
			$menulist[$key] = $item;
		}
		
		return $menulist;
		
	}
	
	public function treerecurse( $id, $indent, $list, &$children, $maxlevel=9999, $level=0, $type=1 )
	{
		if (@$children[$id] && $level <= $maxlevel)
		{
			foreach ($children[$id] as $v)
			{
				$id = $v[$this->_id];
				
				if ( $type )
				{
					$pre 	= '- ';
					$spacer = '-   ';
				} else {
					$pre 	= '- ';
					$spacer = '  ';
				}
				
				if ( $v[$this->_parent_id]== 0 )
				{
					$txt 	= $v[$this->_name];
				} else {
					$txt 	= $pre . $v[$this->_name];
				}
				$pt = $v[$this->_parent_id];
				$list[$id] = $v;
				$list[$id]['treename'] = "$indent$txt";
				$list[$id]['children'] = count( @$children[$id] );
				$list[$id]['level'] = $level;
				$list = $this->treerecurse( $id, $indent . $spacer, $list, $children, $maxlevel, $level+1, $type );
			}
		}
		return $list;
	}
}
?>