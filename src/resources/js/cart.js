$('#button-cart').on('click',function(){
    var qty = $('#qty-input').val()
    var price = $('#price').val()
    if (qty >0 && price>0){
        var total = price * qty
        setTimeout(function () {
            $('#cart > button').html('<span id="cart-total"> ' +qty +' item(s) - $' +total+ '</span>');
        }, 100);
    }

});


