<?php 
  $pagetitle = "Arconic Service Application | GPSL | View Cart";
  include_once('header.php');
  session_start();
  if(!$_SESSION['uname']){
      header('Location: index.php');
  } 
?>
<body>
    <script>whereami = 'viewcart';</script>
    <?php 
        $navtitle = "View Cart & Checkout";
        $from = "viewcart";
        include_once('navbar.php');
        include_once('breadscrumb.php');
    ?>
    <div class="viewcart container">
        <?php $cartItems = json_decode($_POST['cartItems']);
            //echo $cartItems;
            $prodTable = "<table><tr><th>Item</th><th>No. Reqd.</th><th>List No.</th><th>Prod. code</th><th>Item Ordering Id.</th><th>Description</th><th>Unit List Price</th><th>% Osct Cust.</th></tr>";
            foreach($cartItems as $item){
                $prodTable .= "<tr>";
                foreach($item as $key=>$value){
                    if ($key == 'product-photo') continue;
                    $prodTable .= "<td>" . $value . "</td>";
                }
                $prodTable .= "</td><td></td><td></td></tr>";
            }
            $prodTable .= "</table>";
        ?>
        <div class="cart-table"><?php echo $prodTable; ?></div>
        <button id="checkout" class="button active">Checkout</button>
        <button id="back" class="button active" onclick="history.back()"><< Back</button>
    </div>
    <?php include_once('footer.php');?>
    <script>
        $(document).ready(onviewcartPageload);
    </script>
</body>
</html>