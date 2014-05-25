<?php 
if(isset($data->content_id) && !empty($data->content_id))
	$title = BackendPagesModel::model()->findByPk($data->content_id)->title;
?>
<div class="row" style="overflow: hidden;">
<label><?php echo Yii::t('main','Select page')?></label>
<input style="float: left;width: 335px" type="text" readonly="readonly" disabled="disabled" id="slpage_title" value="<?php if(isset($title)) echo $title;?>" />
<input type="hidden" name="BackendMenuItemsModel[content_id]" id="slpage_id" value="<?php if(isset($data->content_id)) echo $data->content_id;?>" />
<a class="btn btn-primary btn-sm" style="float: left;margin: 3px 10px;" id="newDialog" class="btn" href="#"><i class="glyphicon glyphicon-record"></i></a>
<div id="dialog-page"></div>
<script type="text/javascript">
    $("#newDialog").click(function ()    {
        $('#dialog-page').html('<iframe frameborder="0" width="800" height="450" src="<?php echo Yii::app()->createUrl('/menu/dataPage/list')?>"></iframe>')
        .dialog({
            modal: true,
            dialogClass: 'dialog-chose',
            buttons: {"Close":function(){$("#dialog-page").dialog("close");}},
            height: 550,
            width: 830,
            title: '<?php echo Yii::t('app','Select a page')?>'
        });
    });

    function selectPage(id) {
	$.ajax({
	  url: "<?php echo Yii::app()->createUrl('/menu/dataPage/getPage')?>",
	  data: "id="+id,
	  dataType: 'JSON',
	  success: function(data){
		  $("#slpage_id").attr("value",data.id);
		  $("#slpage_title").attr("value",data.title);
	  }
	});
	$("#dialog-page").dialog("close");
}
</script>
</div>