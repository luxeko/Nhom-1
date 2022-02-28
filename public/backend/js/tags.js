$(document).ready(function(){
    $(".tags_select_choose").select2({
        tags: true,
        tokenSeparators: [',', ' ']
    })
});