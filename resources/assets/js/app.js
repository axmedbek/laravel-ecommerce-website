
/**
 * First, we will load all of this project's Javascript utilities and other
 * dependencies. Then, we will be ready to develop a robust and powerful
 * application frontend using useful Laravel and JavaScript libraries.
 */

require('./bootstrap');


setTimeout(function(){
    $('.alert').slideUp(500);
},3000);

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('.product-increment , .product-decrement').on('click',function(){

    var id = $(this).attr('data-id');
    var qty = $(this).attr('data-qty');
    $.ajax({
        type   : 'PATCH',
        url    : '/cart/update/' + id,
        data   : {qty : qty},
        success: function(){
            window.location.href = '/cart';
        }
    })
});
