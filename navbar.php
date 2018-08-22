<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="header">
    <div class="logo"><a href="/"><img src="images/logo.svg" alt=""></a></div>
    <div class="title"><?= isset($navtitle) ? $navtitle : ""?></div>

    <?php if(isset($from) && $from == "purchase") {?>
        <div class="cart-container">
            <div class="cart">
                <img src="images/cart.svg" alt="">
            </div>
            <span class="item-count"></span>
        </div>
    <?php } ?>
</div>
<?php if(isset($from) && ($from != 'viewcart')){?> 
<div class="search-container">
		<form class="searchform" action="searchdata.php" method="GET" onsubmit="return validateForm()" style="max-width:200px">
			<input type="text" placeholder="Search.." name="search">
			<button type="submit"><i class="fa fa-search"></i></button>
		</form>
</div>
<?php } ?>
<?php if(isset($from) && ($from == 'wiring' || $from == 'hydraulic' || $from == 'pdf-viewer')) {?>
<div class="cart-container">
    <div class="cart">
        <!-- <a href="purchase.php">Parts Shop </a> -->
        <a href="viewcart.php">View Cart </a>
        <img src="images/cart.svg" alt="">
    </div>
    <span class="item-count"></span>
</div>
<?php } ?>
<div style="clear:left;">
</div>
