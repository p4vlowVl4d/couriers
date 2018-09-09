function sendCourierData()
{
	var form = $('#create-courier').serialize();
	$.ajax({
		url:'/admin/ajax-create-courier/',
		type:'POST',
		data:form,
		success: function(data){
					if(data == 'fail'){
						$('.message-error').show();
						$('.message-error').html('Возникла ошибка');
					}else{
						$('.message').show();
						$('.message').html('Запись добавлена успешно #'+data);
						console.log(date);
						document.getElementById('create-courier').reset();
					}
		},	
		error:function(xhr, str){
			alert('Возникла ошибка '+xhr.responseCode);
		}
	});
}
function sendDeliveryData()
{
	var form = $('#create-delivery').serialize();
	$.ajax({
		url:'/admin/ajax-create-delivery/',
		type:'POST',
		data:form,
		success:function(data){
			if(data == 'fail'){
				$('.message-error').show();
				$('.message-error').html('Возникла ошибка');
			}else{
				$('.message').show();
				$('.message').html('Запись добавлена успешно #'+data);
				document.getElementById('create-delivery').reset();
			}
		},
		error:function(xhr, str){
			alert('Возникла ошибка'+xhr.responseCode);
		}
	});
}
function sortDelivList()
{
	var form = $('#sort-dev-list').serialize();
	$.ajax({
		url:'/admin/sort-dev-list/',
		type:'POST',
		data:form,
		success: function(data){
			var d = JSON.parse(data);
			$('#result-set tr').remove();
			for(var key in d){
				$('#result-set').append('<tr><td>'+d[key]['d_code']+'</td><td>'+d[key]['name']+'</td><td>'+d[key]['fname']+'&nbsp;'+d[key]['lname']+'</td><td>status</td></tr>');
			}
			console.log(d);
		},
		error: function(xhr, str){
			alert('Error code: '+xhr.responseCode);
		}
	});

}

