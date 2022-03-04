$(function(){
    $(document).ready(function(){
        $('#collapseOne').addClass('show');
        $('.product_active').addClass('active');
        $("#product_alert").show().delay(5000).fadeOut();

    });
    $(document).ready(function(){
        $('input.numberformat').keyup(function(event) {
            // skip for arrow keys
            if(event.which >= 37 && event.which <= 40) return;
    
            // format number
            $(this).val(function(index, value) {
            return value
            .replace(/\D/g, "")
            .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
            ;
            });
        });
    
    })
    $(document).ready(function(){
        $('#thumbnail').change(function(){
            var err = '';
            var file = $('#thumbnail')[0].files;
            if(file.length > 5){
                err += '<p>Bạn chỉ được phép chọn tối đa 5 ảnh</p>'
            } else if(file.size > 2000000){
                err += '<p>File ảnh không được quá 2MB</p>'
            } else if(file.length < 3){
                err += '<p>Bạn không được chọn dưới 3 ảnh</p>'
            }

            if(err == ''){

            } else {
                $('#thumbnail').val('');
                $('#err_thumbnail').html(`<span class="text-danger">${err}</span>`)
                return false
            } 
        })
    });
})