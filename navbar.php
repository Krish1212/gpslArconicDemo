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
<?php if(isset($from) && $from == "machinery") {?>
<div class="cart-container">
    <div class="cart">
        <a href="purchase.php">Parts Shop </a>
        <img src="images/cart.svg" alt="">
    </div>
    <span class="item-count"></span>
</div>
<?php } ?>
