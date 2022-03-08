$('#button-cart').on('click',function(){
    var qty = $('#qty-input').val()
    var total = $('#price').val() * qty
    setTimeout(function () {
        $('#cart > button').html('<span id="cart-total"> ' +qty +' item(s) - $' +total+ '</span>');
    }, 100);
});


