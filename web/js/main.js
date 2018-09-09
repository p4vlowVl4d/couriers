function sendUserData(){
	var message = $('#login').serialize();
	$.ajax({
		url:'/chat/sendjoint/',
		type:'POST',
		data:message,
		success:function(data){
			$('.view-chat').append(data);
			$('#text').val(' ');
		},
		error:function(xhr,str){
			alert('Возникла ошибка: '+xhr.responseCode);
		}
	});
}