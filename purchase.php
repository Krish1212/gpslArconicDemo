<?php 
  $pagetitle = "Arconic Service Application | GPSL | Purchase";
  include_once('header.php');
?>
<body>
    <?php 
        $navtitle = "Parts Shop";
        $from = "purchase";
        include_once('navbar.php');
    ?>

    <div class="products container">
        <div class="product">
            <div class="product-info" prod-id="1">
                <div class="product-select"></div>
                <div class="product-no">0435423</div>
                <div class="product-code">2573</div>
                <div class="product-photo">
                    <img src="images/placeholder.png" alt="">
                </div>
                <div class="product-id">Fabricated Item</div>
                <div class="product-desc">Accumulator Mounting Frame</div>
            </div>
            <div class="product-count">
                <input type="button" class="add" value="+">
                <label class="product-quantity">1</label>
                <input type="button" class="remove" value="-">
            </div>
        </div>
        <div class="product">
            <div class="product-info" prod-id="2">
                <div class="product-select"></div>
                <div class="product-no"></div>
                <div class="product-code"></div>
                <div class="product-photo">
                    <img src="images/placeholder.png" alt="">
                </div>
                <div class="product-id">Accumulator</div>
                <div class="product-desc">Lorem, ipsum dolor sit amet</div>
            </div>
            <div class="product-count">
                <input type="button" class="add" value="+">
                <label class="product-quantity">1</label>
                <input type="button" class="remove" value="-">
            </div>
        </div>
        <div class="product">
            <div class="product-info" prod-id="3">
                <div class="product-select"></div>
                <div class="product-no"></div>
                <div class="product-code">2577</div>
                <div class="product-photo">
                    <img src="images/placeholder.png" alt="">
                </div>
                <div class="product-id">Shutoff Valve</div>
                <div class="product-desc">Lorem ipsum dolor, sit amet</div>
            </div>
            <div class="product-count">
                <input type="button" class="add" value="+">
                <label class="product-quantity">1</label>
                <input type="button" class="remove" value="-">
            </div>
        </div>
        <div class="product">
            <div class="product-info" prod-id="4">
                <div class="product-select"></div>
                <div class="product-no"></div>
                <div class="product-code">2601</div>
                <div class="product-photo">
                    <img src="images/placeholder.png" alt="">
                </div>
                <div class="product-id">Special Paint</div>
                <div class="product-desc">Paint for Phosfate Ester Fluid</div>
            </div>
            <div class="product-count">
                <input type="button" class="add" value="+">
                <label class="product-quantity">1</label>
                <input type="button" class="remove" value="-">
            </div>
        </div>
        <div class="product">
            <div class="product-info" prod-id="5">
                <div class="product-select"></div>
                <div class="product-no"></div>
                <div class="product-code">2600</div>
                <div class="product-photo">
                    <img src="images/placeholder.png" alt="">
                </div>
                <div class="product-id">Engineering Dwg's</div>
                <div class="product-desc">Assembly Drawings, 946964, Sheet 2</div>
            </div>
            <div class="product-count">
                <input type="button" class="add" value="+">
                <label class="product-quantity">1</label>
                <input type="button" class="remove" value="-">
            </div>
        </div>
        <div class="product">
            <div class="product-info" prod-id="6">
                <div class="product-select"></div>
                <div class="product-no"></div>
                <div class="product-code">2600</div>
                <div class="product-photo">
                    <img src="images/placeholder.png" alt="">
                </div>
                <div class="product-id">Shutoff Valve</div>
                <div class="product-desc">Assembly and Piping Charge</div>
            </div>
            <div class="product-count">
                <input type="button" class="add" value="+">
                <label class="product-quantity">1</label>
                <input type="button" class="remove" value="-">
            </div>
        </div>
        <div class="product">
            <div class="product-info" prod-id="7">
                <div class="product-select"></div>
                <div class="product-no">0772071</div>
                <div class="product-code">2597</div>
                <div class="product-photo">
                    <img src="images/placeholder.png" alt="">
                </div>
                <div class="product-id">0772071</div>
                <div class="product-desc">2" 4-Bolt Flange Assy., Socket Weld</div>
            </div>
            <div class="product-count">
                <input type="button" class="add" value="+">
                <label class="product-quantity">1</label>
                <input type="button" class="remove" value="-">
            </div>
        </div>
        <div class="product">
            <div class="product-info" prod-id="8">
                <div class="product-select"></div>
                <div class="product-no">0430698</div>
                <div class="product-code">2597</div>
                <div class="product-photo">
                    <img src="images/placeholder.png" alt="">
                </div>
                <div class="product-id">Hyd. Pipe Fittings</div>
                <div class="product-desc">4-Bolt Flange, Socket Weld W61-32-32</div>
            </div>
            <div class="product-count">
                <input type="button" class="add" value="+">
                <label class="product-quantity">1</label>
                <input type="button" class="remove" value="-">
            </div>
        </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            var itemCnt=0;
            var itemObjArray = [];
            $('.product-info').bind('click', function(){
                if($(this).parent('.product').hasClass('active')){
                    var itemId = $(this).attr('prod-id');
                    $(this).parent('.product').removeClass('active');
                    $(this).children('div.product-select').css('display','none');
                    $(this).parent('div').children('.product-count').children('.product-quantity').text('1');
                    itemCnt--;
                    if(itemCnt <= 0) {
                        $('.item-count').css('display','none');
                        itemCnt=0;
                    } else 
                    $('.item-count').text(itemCnt);
                    for(var i = 0; i < itemObjArray.length; i++) {
                        if(itemObjArray[i]['prod-id'] == itemId) {
                            itemObjArray.splice(i, 1);
                            break;
                        }
                    }
                    console.log(itemObjArray);
                } else {
                    $(this).parent('.product').addClass('active');
                    $(this).children('.product-select').css('display','block');
                    itemCnt++;
                    if(itemCnt == 1) $('.item-count').css('display','block');
                    $('.item-count').text(itemCnt);
                    var itemObj = {};
                    itemObj['prod-id'] = $(this).attr('prod-id');
                    itemObj['product-quantity'] = $(this).parent('.product').children('.product-count').children('.product-quantity').text();
                    $.each($(this).children('div'), function(i, val){
                        //console.log("item = " + i + " == " + $(val).attr('class') + " == " + $(val).text() );
                        if($(val).attr('class') === 'product-select') return;
                        if($(val).attr('class') === 'product-photo'){
                            //console.log($(val).children('img').attr('src'));
                            itemObj[$(val).attr('class')] = $(val).children('img').attr('src');
                        } else 
                        itemObj[$(val).attr('class')] = $(val).text();
                    });
                    console.log(itemObj);
                    itemObjArray.push(itemObj);
                    console.log(itemObjArray);
                }
            });
            $('.product-count .add').bind('click', function(){
                var itemId = $(this).parent('.product-count').parent('.product').children('.product-info').attr('prod-id');
                var quantity = $(this).parent('div').children('.product-quantity').text();
                quantity++;
                $(this).parent('div').children('.product-quantity').text(quantity);
                updateItemObjArray(itemId, itemObjArray, quantity);
            });
            $('.product-count .remove').bind('click', function(){
                var itemId = $(this).parent('.product-count').parent('.product').children('.product-info').attr('prod-id');
                var quantity = $(this).parent('div').children('.product-quantity').text();
                if (quantity > 1) quantity--;
                $(this).parent('div').children('.product-quantity').text(quantity);
                updateItemObjArray(itemId, itemObjArray, quantity);
            });
            function updateItemObjArray(itemId,itemObjArray,quantity) {
                for(var i = 0; i < itemObjArray.length; i++) {
                    if(itemObjArray[i]['prod-id'] == itemId) {
                        itemObjArray[i]['product-quantity'] = quantity;
                        break;
                    }
                }
                console.log(itemObjArray);
            }
            $('.cart').bind('click', function(){
                //alert(JSON.stringify(itemObjArray));
                if(itemObjArray.length >= 1)
                    window.location = 'viewcart.html?cartItems='+JSON.stringify(itemObjArray);
                else
                    alert('Please select atleast 1 product to view the cart items');
            });
        });
    </script>
</body>
</html>