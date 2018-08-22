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
        <?php 
            //$cartItems = json_decode($_POST['cartItems']);
            //For demo purpose, the values are hard coded
            $cartItems = array(array("prod-id"=>"1","product-quantity"=>"1","product-no"=>"0435423","product-code"=>"2573","product-photo"=>"images\/placeholder.png","product-id"=>"Fabricated Item","product-desc"=>"Accumulator Mounting Frame"),array("prod-id"=>"10","product-quantity"=>"1","product-no"=>"","product-code"=>"2601","product-photo"=>"images\/placeholder.png","product-id"=>"Special Paint","product-desc"=>"Paint for Phosfate Ester Fluid"));
            //echo json_encode($cartItems);
            //To display on the web page
            $prodTable = "<table><tr><th>Item</th><th>No. Reqd.</th><th>List No.</th><th>Prod. code</th><th>Item Ordering Id.</th><th>Description</th><th>Unit List Price</th><th>% Osct Cust.</th></tr>";
            //To use it while downloading as a CSV file
            $thead = "\"Date\",\"" . date('Y/m/d') . "\"\n\"Item\",\"No. Reqd.\",\"List No.\",\"Prod. code\",\"Item Ordering Id.\",\"Description\",\"Unit List Price\",\"% Osct Cust.\"";
            $tbody = '';
            foreach($cartItems as $item){
                $prodTable .= "<tr>";
                $tbody .= "\n";
                foreach($item as $key=>$value){
                    if ($key == 'product-photo') continue;
                    $prodTable .= "<td>" . $value . "</td>";
                    $tbody .= '"' . $value . '",';
                }
                $prodTable .= "</td><td></td><td></td></tr>";
            }
            $content = $thead . $tbody;
            $prodTable .= "</table>";
        ?>
        <div class="cart-table"><?php echo $prodTable; ?></div>
        <button id="checkout" class="button active">Checkout</button>
        <button id="download" class="button active"><a href="download.php?content=<?php echo urlencode($content);?>" style="text-decoration:none;color:white;" target="_blank">Download</a></button>
        <button id="back" class="button active" onclick="history.back()"><< Back</button>
    </div>
    <?php include_once('footer.php');?>
    <script>
        $(document).ready(onviewcartPageload);
    </script>
</body>
</html>