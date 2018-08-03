<?php 
  $pagetitle = "Arconic Service Application | GPSL | Home";
  include_once('header.php');
?>
<body>
<script>whereami = 'home';
function validateForm() {
    var x = document.forms["sform"]["search"].value;
    if (x == "") {
        alert("Search term must be filled out");
        return false;
    }
}
</script>

<div class="header" style="position:absolute;z-index: 99;">
    <div class="logo"><a href="/"><img src="images/logo.svg" alt=""></a></div>
    <div class="title"></div>
</div>

<div class="branding-new">
  <div class="title">Service <br>Application</div>
  <div class="ft_wrap">
    <a href="plant.php" style="text-decoration:none;">
      <div class="mainmap">Plant Map</div>
    </a>
    <div class="searchengine">
      <!--gcse:searchbox-only resultsUrl="searchpage.php" newWindow="true" queryParameterName="q"></gcse:searchbox-only-->
      <form name="sform" action='searchdata.php' method='GET' onsubmit="return validateForm()">
      <input type='text' size='90' name='search' style="width:180px;height:30px;border:3px solid #01B0BA;">
      <input type='submit' name='submit' style="position:absolute;width:50px;height:30px;background-color:#01B0BA;color:white;border:3px solid #01B0BA;font-weight:bold;margin-left:-5px;font-size:80%;" value='Search' >
      </form>
	</div>    
  </div>
</div>

<?php
  include_once('footer.php');
?>
<!--script>
/*    (function() {
        var cx = '008683130934383105744:-8atcd4pn0k';
        var gcse = document.createElement('script');
        gcse.type = 'text/javascript';
        gcse.async = true;
        gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(gcse, s);
    })();*
</script-->
</body>

</html>