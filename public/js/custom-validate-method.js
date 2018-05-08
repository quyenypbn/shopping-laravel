




var checkExistedResult = false;

jQuery.validator.addMethod("checkExisted",
 function(value, element,attr){
 	$.ajaxSetup({
			    headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    }
			});

	$.ajax({
		url: attr.requestUrl,
		method: 'post',
		data: {
			id: attr.modelId,
			name:value,
			_token: $('#ajaxToken').val()
		},
		dataType: 'JSON',
		beforeSend: function(){

        },
		success: function(rs){
			checkExistedResult = rs
		},
		complete: function(){

        },
		error: function(err, xhr){
            console.log(err);
        }
	});
  	return checkExistedResult;
}, "Tên đã tồn tại!"); 