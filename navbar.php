<div class="header">
    <div class="logo"><a href="/demo/arconic/"><img src="images/logo.svg" alt=""></a></div>
    <div class="title"><?= isset($navtitle) ? $navtitle : ""?></div>
    <?php if($from == "purchase") {?>
        <div class="cart-container">
            <div class="cart">
                <img src="images/cart.svg" alt="">
            </div>
            <span class="item-count"></span>
        </div>
    <?php } ?>
</div>
<?php if($from == "machinery") {?>
<div class="cart-container">
    <div class="cart">
        <a href="purchase.php">Parts Shop </a>
        <img src="images/cart.svg" alt="">
    </div>
    <span class="item-count"></span>
</div>
<?php } ?>
