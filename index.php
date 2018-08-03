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
        <input type='text' size='90' name='search' placeholder="Search in Application...">
        <div class="searchbtn">
          <input type='submit' name='submit' value='Search'>
        </div>
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