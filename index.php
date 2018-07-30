<?php 
  $pagetitle = "Arconic Service Application | GPSL | Home";
  include_once('header.php');
?>
<body>

<div class="header" style="position:absolute;z-index: 99;">
    <div class="logo"><a href="/demo/arconic/"><img src="images/logo.svg" alt=""></a></div>
    <div class="title"></div>
</div>

<div class="branding-new">
  <div class="title">Service <br>Application</div>
  <div class="ft_wrap">
    <a href="plant.php">
      <div class="mainmap">Plant Map</div>
    </a>
    <div class="searchengine">
      <gcse:searchbox-only resultsUrl="searchpage.html" newWindow="true" queryParameterName="q"></gcse:searchbox-only>
    </div>    
  </div>
</div>

<!--div class="branding">
	<img id="cover" class="hidden-xs" src="images/banners/home-hero-cover.png" alt="">
	<img id="cover-mobile" class="visible-xs" src="images/banners/home-hero-cover-mobile.png" alt="">
	<div class="logo">
		<a href="/"><img src="images/logo.svg" width="100%"/></a>
	</div>
	<div class="title">Arconic <br>Web <br>Application</div>
</div-->

<?php
  $from = "home";
  include_once('footer.php');
?>
</body>

</html>