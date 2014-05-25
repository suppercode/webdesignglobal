/**
 * 
 */
function jSelectArticle_jform_request_id(id, title, catid, object) {
		document.id("jform_request_id_id").value = id;
		document.id("jform_request_id_name").value = title;
		SqueezeBox.close();
	}
function jInsertFieldValue(value, id) {
		var old_id = document.id(id).value;
		if (old_id != id) {
			var elem = document.id(id)
			elem.value = value;
			elem.fireEvent("change");
		}
}

var CoreJs = {
		checkAll: function(id){
			if(jQuery("#"+id+" input").attr("checked")){
				$("input[name='rad_ID[]']").each(function(){
					this.checked = true;
				})
			}
			else
			{
				$("input[name='rad_ID[]']").each(function(){
					this.checked = false;
				})
			}
		},
		
		deleteAll: function(url, msg){
			var data = new Array()
			i=0
			$("input[name='rad_ID[]']").each(function(){
					if(this.checked==true && this.value!='')
							data[i] = this.value;
					i++;
				
			})
			if(data.join(':')!=''){
				if(confirm(msg)){
					jQuery.ajax({
						url: url,
						data: {data:data.join(':')},
						dataType:'html',
						type: 'post',
						success: function(msg){
							window.location.reload();
						  }
					})
				}
			}else{
				alert("You must choice a record to remove.")
			}
		},
		buildAlias: function(str,delimiter,result){
			jQuery.ajax({
				url: 'index.php?r=allowed/buildAlias',
				data: {
					title:str,
					delimiter:delimiter
				},
				dataType:'json',
				type: 'post',
				success: function(data){
					jQuery("#"+result).attr('value',data.result);
				  }
			})
		},
}