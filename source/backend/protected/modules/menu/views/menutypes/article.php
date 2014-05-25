<?php 
if(isset($data->content_id) && !empty($data->content_id))
	$title = BackendNewsModel::model()->findByPk($data->content_id)->title;
?>
<div class="row" style="overflow: hidden;">
<label><?php echo Yii::t('main','Select article')?></label>
<input style="float: left;width: 335px" type="text" readonly="readonly" disabled="disabled" id="slnews_title" value="<?php if(isset($title)) echo $title;?>" />
<input type="hidden" name="BackendMenuItemsModel[content_id]" id="slnews_id" value="<?php if(isset($data->content_id)) echo $data->content_id;?>" />
<a style="float: left;margin: 5px 10px;" id="newDialog" rel="tooltip" class="btn" href="#"><i class="icon-plus-sign"></i></a>
<div id="dialog-news"></div>
<script type="text/javascript">
    $("#newDialog").click(function ()    {
        $('#dialog-news').html('<iframe frameborder="0" width="800" height="450" src="<?php echo Yii::app()->createUrl('/menu/dataNews/list')?>"></iframe>')
        .dialog({
            modal: true,
            dialogClass: 'dialog-chose',
            //buttons: {"Chose":function(){alert('chosed')}},
            height: 550,
            width: 830,
            title: 'Dynamically Loaded Page'
        });
    });
</script>
<script>
function selectNews(id) {
	$.ajax({
	  url: "<?php echo Yii::app()->createUrl('/menu/dataNews/getNews')?>",
	  data: "id="+id,
	  dataType: 'JSON',
	  success: function(data){
		  $("#slnews_id").attr("value",id);
		  $("#slnews_title").attr("value",data.title);
	  }
	});
	$("#dialog-news").dialog("close");
}
</script>
</div>