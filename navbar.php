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
<?php if(isset($from) && ($from == "machinery" || $from == "plant" || $from == 'wiring' || $from == 'hydraulic' || $from == 'pdf-viewer' || $from == 'search')) {?>
<div class="search-container">
	<div class="searchbox">
		<form name="sform" action='searchdata.php' method='GET' onsubmit="return validateForm()">
			<input type='text' size='50' name='search' placeholder="Search in Application...">
				<div class="searchbtn2">
				<input type='submit' name='submit' value='xxx'>
				</div>
		</form>
	  </div>
</div>
<div class="cart-container">
    <div class="cart">
        <a href="purchase.php">Parts Shop </a>
        <img src="images/cart.svg" alt="">
    </div>
    <span class="item-count"></span>
</div>

<?php } ?>
