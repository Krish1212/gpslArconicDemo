<!DOCTYPE html>
<html lang="en">
<head>
    <title>Arconic Service Application | GPSL</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bundle.css"/>
</head>
<body>
    <div class="header">
        <div class="logo"><a href="/demo/arconic/"><img src="images/logo.svg" alt=""></a></div>
        <div class="title">View Cart & Checkout</div>
    </div>
    <div class="viewcart container">
        <div class="cart-table"></div>
        <button id="checkout" class="button active">Checkout</button>
        <button id="back" class="button active" onclick="history.back()"><< Back</button>
    </div>
    <script src="js/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            var url = window.location.href;
            var decodedUrl = decodeURIComponent(url);
            var cartItems = JSON.parse(decodedUrl.slice(decodedUrl.indexOf('?') + 1).split('=')[1]);
            //alert(cartItems);
            //console.log(cartItems);
            var prodTable = `<table><tr><th>Item</th><th>No. Reqd.</th><th>List No.</th><th>Prod. code</th><th>Item Ordering Id.</th><th>Description</th><th>Unit List Price</th><th>% Osct Cust.</th></tr>`;
            //console.log('items = ' + cartItems.length);
            $.each(cartItems, function(idx,obj){
                prodTable += `<tr><td>` + ++idx + `</td><td>` + obj['product-quantity'] + `</td><td>` + obj['product-no'] + `</td><td>` + obj['product-code'] + `</td><td>` + obj['product-id'] + `</td><td>` + obj['product-desc'] + `</td><td></td><td></td></tr>`;
            });
            prodTable += `</table>`;
            $('.cart-table').html(prodTable);
            $('#checkout').bind('click',function(){
                $.ajax({
                    url:"send_email.php",
                    type:"POST",
                    data:{'message':prodTable},
                    beforeSend: function(){
                        $('#checkout').text('Sending Email...').addClass('process').removeClass('active').attr('disabled','disabled');
                    },
                    complete: function(){
                        $('#checkout').text('Checkout').addClass('active').removeClass('process');
                    },
                    success: function(result){
                        console.log(result);
                        alert('Cart items emailed to: mbakos@gpsl.co');
                    },
                    error: function(error){
                        console.error(error);
                    }
                });
            });
        });
    </script>
</body>
</html>