function actionDelete(event){
    event.preventDefault();
    let urlRequest = $(this).data('url');
    let that = $(this);
    Swal.fire({
        title: `Xoá dữ liệu`,
        text: `Tiếp tục sẽ xoá dữ liệu vĩnh viễn! Bạn có chắc chắn muốn xoá?`,
        icon: 'warning',
        timer: 10000,
        timerProgressBar: true,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Xoá!',

    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: urlRequest,
                method: 'GET',
                success: function (data) {
                    if(data.code == 200){
                        that.parent().parent().remove();
                        Swal.fire(
                            'Deleted!',
                            'Dữ liệu đã được xoá.',
                            'success'
                        )
                    }
                },
            })
        }
    })
}

$(function(){
    $(document).on('click', '.action_delete', actionDelete);
});