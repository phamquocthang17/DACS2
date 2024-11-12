$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function removeRow(id, url) {
    if (confirm('Bạn có chắc chắn muốn xóa?')) {
        $.ajax({
        
            type: 'DELETE',
            dataType: 'JSON',
            data: { id },
            url: url,
            success: function(result) {
               if (result === false) {
                alert('Xóa lỗi');
                location.reload();
               } else {
                     
                    alert(result.message);
                    location.reload();  
               }
            }
        });
    }
}

$('#upload').change(function() {
    const form = new FormData();
    form.append('file', $(this)[0].files[0]); // Đảm bảo đúng tên 'file'

    $.ajax({
        url: '/admin/upload/services',
        type: 'POST',
        data: form,
        processData: false,
        contentType: false,
        dataType: 'JSON',
        success: function(result) {
            if(result.error===false){
                

                $('#image_show').html('<a href="'+ result.url + '" target="_blank"><img src="'+ result.url + '" width="100px"></a>');
                $('#thumb').val(result.url);
               
            }else{
                alert ('error');
            }
        
        }
    });
});
$('#uploadpath').change(function() {
    const form = new FormData();
    form.append('file', $(this)[0].files[0]); // Đảm bảo đúng tên 'file'

    $.ajax({
        url: '/admin/upload/services',
        type: 'POST',
        data: form,
        processData: false,
        contentType: false,
        dataType: 'JSON',
        success: function(result) {
            if(result.error===false){

               
                $('#image_showpath').html('<a href="'+ result.url + '" target="_blank"><img src="'+ result.url + '" width="100px"></a>');
                $('#path').val(result.url);


            }else{
                alert ('error');
            }
        
        }
    });
});







