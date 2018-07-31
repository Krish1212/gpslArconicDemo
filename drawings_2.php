<?php 
  $pagetitle = "Arconic Service Application | GPSL | Hydraylic Drawings";
  include_once('header.php');
?>
<body>

    <?php 
        $navtitle = "2500 Ton Hydraulic Press Hydraulic Drawing";
        include_once('navbar.php');
    ?>

    <div class="drawings">
        <div class="leftbar">
            <div class="btn btn-primary">
                Highlight and comment
            </div>
            <div class="btn btn-primary">
                Previous Comments
            </div>
            <div class="btn btn-primary flush-bottom" onclick="history.back()">
                << Back
            </div>
        </div>
        <div id="canvas" draggable="false">
            <img src="images/drawings/hydraulic_drawing.jpg" alt="" draggable="false">
        </div>
    </div>

    <div class="scroll-top"></div>

    <?php include("popups.html");?>
    <script src="js/jquery.min.js"></script>
    <script src="js/bundle.js"></script>

</body>
</html>