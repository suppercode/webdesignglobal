<?php 
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile("{$this->_url}/dropdown-menu.js", CClientScript::POS_END);
?>
<div class="nav-box">
<ul id="nav">
<?php 

foreach($items as $i => $item){
	$params = $item['params'];
	$classbase = 'item-'.$item['id'];
	if ($item['deeper']) {
		$class = $classbase.' deeper';
	}else{
		$class = $classbase;
	}
	
	if($item['active'] || $active==$item['id']){
		$class .=" active";
	}
	if (!empty($class)) {
		$class = ' class="'.trim($class) .'"';
	}
	$target="";
	if($item['view']=='fixed_url'){
		$link = $item['link'];
		$target = $item['url_open']=='new'?'target="_blank"':"";
	}else{
		$link = $item['link'];
	}
	echo '<li'.$class.'>';
	echo '<a href="'.$link.'" '.$target.'>'.$item['name'].'</a>';
	// The next item is deeper.
	if ($item['deeper']) {
		echo '<ul>';
	}else if ($item['shallower']) {
		echo '</li>';
		echo str_repeat('</ul></li>', $item['level_diff']);
	}
	// The next item is on the same level.
	else {
		echo '</li>';
	}
}

?>
</ul>
</div>