<?php 
  $pagetitle = "Arconic Service Application | GPSL | Purchase";
  include_once('header.php');
?>
<body>
    <script>whereami = 'purchase';</script>
    <?php 
        $navtitle = "Parts Shop";
        $from = "purchase";
        include_once('navbar.php');
    ?>
    <?php include_once('breadscrumb.php'); ?>
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
    <form id="hiddenform" method="POST" action="viewcart.php" hidden></form>
    <?php include_once('footer.php');?>
    <script>
        $(document).ready(onPartspageload);
    </script>
    <style>
        .breadscrumb{
            margin-left:24px;
        }
    </style>
</body>
</html>