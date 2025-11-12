import $ from 'jquery'
window.$ = $
window.jQuery =$

export function UpdateTotal(){
    $.ajax({
        url: '/cart/total',
        type: 'GET',
        success: function(response){
            $('.cartTotal').html(response.totalHTML)
        }
    })
}
$(document).ready(function(){
    UpdateTotal();
});
