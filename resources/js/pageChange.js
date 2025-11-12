import $ from 'jquery'
window.$ = $
window.jQuery = $

$(document).on('click','' ,function(e){
    e.preventDefault()
    var url = (this).attr('href');

    $.ajax({
        url: url,
        type: 'GET',
        
    })
})