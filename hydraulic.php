<?php 
  $pagetitle = "Arconic Service Application | GPSL | Hydraylic Drawings";
  include_once('header.php');
?>
<body>
    <script>whereami = 'hydraulic';</script>

    <?php 
        $navtitle = "2500 Ton Hydraulic Press Hydraulic Drawing";
        include_once('navbar.php');
    ?>

    <div class="drawings">
        <div class="leftbar">
            <div class="btn btn-primary">
                Highlight and comment
            </div>
            <div class="btn btn-primary prev-comments">
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

    <?php include("popups.php");?>
    <?php include_once('footer.php');?>

</body>
</html>