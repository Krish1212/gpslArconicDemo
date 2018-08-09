<?php 
  $pagetitle = "Arconic Service Application | GPSL | Hydraylic Drawings";
  include_once('header.php');
?>
<body>
    <script>whereami = 'pdf-viewer';</script>

    <?php 
        $navtitle = "2500 Ton Hydraulic Press – Vane Pump Manual";
        $from = 'pdf-viewer';
        include_once('navbar.php');
    ?>

    <?php include_once('breadscrumb.php'); ?>

    <object data="downloads/pll_2373.pdf" type="application/pdf" class="pdf-viewer" width="100%" height="100%" style="min-height: 800px">
        <p>Your browser doesn't support PDF viewer, so use this link to download.<br>
        <a href="downloads/pll_2373.pdf">Click here to download the PDF!</a></p>
    </object>

    <?php
        include_once('footer.php');
    ?>
    <script>
        $(document).ready(function(){
            // set pdf viewer height dynamically
            $('.pdf-viewer').height( $(window).height() - $(".header").height() - 16 );
        });
    </script>

</body>
</html>