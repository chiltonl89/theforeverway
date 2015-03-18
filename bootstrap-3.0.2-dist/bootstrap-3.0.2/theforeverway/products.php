<?php 

include "scripts/connect_to_mysql.php"; 

$dynamicLi="";
$sql = mysql_query("SELECT * 
FROM Product_Data
ORDER BY  `IndexNo` DESC 
LIMIT 12");
$productCount = mysql_num_rows($sql); // count the output amount
if ($productCount > 0) {
  while($row = mysql_fetch_array($sql)){ 
       $ProductCode = $row["ProductNo"];
       $product_name = $row["Title"];
       $price = $row["Price"];
       $description = $row["Description"];
       $thumbnail = $row["Thumbnail"];
       $image = $row["Image"];
       $category1 = $row["Category1"];
       $category2 = $row["Category2"];
       $tags = $row["Tags"];
       $link = $row["Link"];
       $dynamicLi = '<li class="mix ' . $category1 . ' ' . $category2 . '"><img src="' . $thumbnail . '" alt="' . $product_name . '"></li>';
    }
} else {
  $dynamicLi = "";
}
mysql_close();
?>

<!DOCTYPE html>
<html lang="en" style="overflow-x: hidden">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

    <title>TheForeverWay - Product Range</title>

    <!-- Bootstrap core CSS -->
	
    <link href="../../dist/css/bootstrap.css" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
    <link href="hexagons.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css"> <!-- Resource style -->
    <link href="carousel.css" rel="stylesheet">
    
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300|Open+Sans:300,400|Maven+Pro:400' rel='stylesheet' type='text/css'>
  	<link href='https://fonts.googleapis.com/css?family=Maven+Pro' rel='stylesheet' type='text/css'>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="cssmap-continents/cssmap-continents.css">
    <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
    <!-- <link rel="stylesheet" href="css/reset.css"> -- CSS reset -->
    
    <!-- <script src="js/modernizr.js"></script> Modernizr -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script type="text/javascript" src="http://cssmapsplugin.com/4/jquery.cssmap.js"></script> 
    <script type="text/javascript">
        jQuery(document).ready(function($){

          $("#mapButton").on("click", function () {
            $('#map-continents').cssMap({
              size : 650,
              tooltips : "sticky",
              cities : true,
              'onClick': function(e){
                var region = e.children('a').eq(0).text(); // get url of the region;
                    fileName = region+".txt";                    
                $.ajax({
                url: fileName, 
                success: function(result){
                  $("#map-continents").html(result);
                },
                });
              }
            });
          });
        });



      $(document).ready(function(){

         $("#myModal").on('hidden.bs.modal', function () {
            var xmlhttp;
              if (window.XMLHttpRequest)
                {// code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp=new XMLHttpRequest();
                }
              else
                {// code for IE6, IE5
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange=function()
                {
                if (xmlhttp.readyState==4 && xmlhttp.status==200)
                  {
                  document.getElementById("map-continents").innerHTML=xmlhttp.responseText;
                  }
                }
              xmlhttp.open("GET","Default.txt",true);
              xmlhttp.send();
          });
      });

        $(document).ajaxComplete(function(){
            $('.my-slick').slick({
              dots: true,
              accessibility: true,
              arrows: true,
              draggable: true,
              
            });         
        });
      
    </script>
  </head>
<!-- NAVBAR
================================================== -->


  <body>
	<div id="grn-nav" class="navbar-default navbar-fixed-top">
		<div class="smcontainer">
			<div class="smpholder">
				<div class="smcontacticons">
          <span class="fa fa-phone "></span>
					<span class="hide-icon-span">07817034041</span>
          <a href="mailto:steff@theforeverway.co.uk" id="emailaddress" class="smicons">
            <span class="fa fa-envelope "></span>
            <span class="hide-icon-span">steff@theforeverway.co.uk</span>
          </a>
          <a target="_blank" href="https://www.facebook.com/TheForeverWay1" id="fbicon" class="smicons"><span class="fa fa-facebook"></span></a>
          <a target="_blank" href="https://twitter.com/TheForeverWay1" id="twittericon" class="smicons"><span class="fa fa-twitter"></span></a>
          <a target="_blank" href="https://plus.google.com/u/0/113544023775085172850/" id="gplusicon" class="smicons"><span class="fa fa-google-plus"></span></a>
          <a target="_blank" href="https://www.pinterest.com/TheForeverWay/" id="pinteresticon" class="smicons"><span class="fa fa-pinterest"></span></a>
				</div>
			</div>
		</div>	
		<div id="nav-phcontainer" class="navbar navbar-default" role="navigation">
			<div id="nav-pholder" class="container-fluid">
				<a id="logo" class="navbar-brand" href="#"></a>									
				<div class="navbar-header">
					<button type="button" style="top: 15px;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>							
					</button>
				</div>																
				<div class="navbar-collapse collapse">
					<ul id="navlist" class="nav navbar-nav">
						<li><a href="index.html">Home</a></li>
						<li><a href="contact.html">Contact</a></li>
						<li><a href="company.html">Company</a></li>
						<li><a href="opportunity.html">Opportunity</a></li>
						<li><a href="#">Products</a></li>
						<li><a id="mapButton" data-toggle="modal" data-target="#myModal" style="cursor:pointer;">Shop</a></li>
						<li><a target="_blank" href="http://www.discoverforever.com/blog/">Blog</a></li>							
					</ul>							
				</div>			
			</div>
		</div>
	</div>	
	<!-- /END OF NAVIGATION -->

  <header class="cd-header">
    <h1>Forever Living Product Range</h1>
  </header>

  <main class="cd-main-content">
    <div class="cd-tab-filter-wrapper">
      <div class="cd-tab-filter">
        <ul class="cd-filters">
          <li class="placeholder"> 
            <a data-type="all" href="#0">All</a> <!-- selected option on mobile -->
          </li> 
          <li class="filter"><a class="selected" href="#0" data-type="all">All</a></li>
          <li class="filter" data-filter=".LB"><a href="#0" data-type="LB">Life Balance</a></li>
          <li class="filter" data-filter=".FWM"><a href="#0" data-type="FWM">Fitness &amp; Weight Management</a></li>
          <li class="filter" data-filter=".BW"><a href="#0" data-type="BW">Beauty &amp; Wellness</a></li>
          <li class="filter" data-filter=".AH"><a href="#0" data-type="AH">Animal &amp; Home</a></li>
          <li class="filter" data-filter=".CP"><a href="#0" data-type="CP">Combination Packs</a></li>
          <li class="filter" data-filter=".FBS"><a href="#0" data-type="FBS">Flawless by Sonya</a></li>
          <li class="filter" data-filter=".SS"><a href="#0" data-type="SS">Sonya Skincare</a></li>
          <li class="filter" data-filter=".FDJ"><a href="#0" data-type="FDJ">Fleur de Jouvence</a></li>
          <li class="filter" data-filter=".ASC"><a href="#0" data-type="FWM">Aroma Spa Collection</a></li>
        </ul> <!-- cd-filters -->
      </div> <!-- cd-tab-filter -->
    </div> <!-- cd-tab-filter-wrapper -->

    <section class="cd-gallery ">
      <ul class="cd-container">
        <?php echo $dynamicLi; ?>
        <li class="gap"></li>
        <li class="gap"></li>
        <li class="gap"></li>
      </ul>
      <div class="cd-fail-message">No results found</div>
    </section> <!-- cd-gallery -->

    <div class="cd-filter">
      <form>
        <div class="cd-filter-block">
          <h4>Search</h4>
          
          <div class="cd-filter-content">
            <input type="search" placeholder="Try color-1...">
          </div> <!-- cd-filter-content -->
        </div> <!-- cd-filter-block -->

        <div class="cd-filter-block">
          <h4>Check boxes</h4>

          <ul class="cd-filter-content cd-filters list">
            <li>
              <input class="filter" data-filter=".check1" type="checkbox" id="checkbox1">
                <label class="checkbox-label" for="checkbox1">Option 1</label>
            </li>

            <li>
              <input class="filter" data-filter=".check2" type="checkbox" id="checkbox2">
              <label class="checkbox-label" for="checkbox2">Option 2</label>
            </li>

            <li>
              <input class="filter" data-filter=".check3" type="checkbox" id="checkbox3">
              <label class="checkbox-label" for="checkbox3">Option 3</label>
            </li>
          </ul> <!-- cd-filter-content -->
        </div> <!-- cd-filter-block -->

        <div class="cd-filter-block">
          <h4>Select</h4>
          
          <div class="cd-filter-content">
            <div class="cd-select cd-filters">
              <select class="filter" name="selectThis" id="selectThis">
                <option value="">Choose an option</option>
                <option value=".option1">Option 1</option>
                <option value=".option2">Option 2</option>
                <option value=".option3">Option 3</option>
                <option value=".option4">Option 4</option>
              </select>
            </div> <!-- cd-select -->
          </div> <!-- cd-filter-content -->
        </div> <!-- cd-filter-block -->

        <div class="cd-filter-block">
          <h4>Radio buttons</h4>

          <ul class="cd-filter-content cd-filters list">
            <li>
              <input class="filter" data-filter="" type="radio" name="radioButton" id="radio1" checked>
              <label class="radio-label" for="radio1">All</label>
            </li>

            <li>
              <input class="filter" data-filter=".radio2" type="radio" name="radioButton" id="radio2">
              <label class="radio-label" for="radio2">Choice 2</label>
            </li>

            <li>
              <input class="filter" data-filter=".radio3" type="radio" name="radioButton" id="radio3">
              <label class="radio-label" for="radio3">Choice 3</label>
            </li>
          </ul> <!-- cd-filter-content -->
        </div> <!-- cd-filter-block -->
      </form>

      <a href="#0" class="cd-close">Close</a>
    </div> <!-- cd-filter -->

    <a href="#0" class="cd-filter-trigger">Filters</a>
    
  </main> <!-- cd-main-content -->

    



      

      <!-- /END THE FEATURETTES -->
	  
      <!-- Footer -->  
    <div id="footerlogoholder">
      <div id="footerlogocircle">
          <a href="#"><span class="fa fa-arrow-up"></span></a>
      </div>
    </div>
    <footer id="footer" class="footer-type">
        <div class="container text-center">
          <p class="copyright no-margin-bottom">© 2015 The Forever Way. All rights reserved. Designed &amp; Created by <a target="_blank" href="http://www.lchilton.com">LChilton</a> of <a target="_blank" href="http://www.webstager.com">Web Stager</a></p>
        </div>
    </footer>
    
    <!-- End of Footer -->
    
	  
	  <!-- Modal -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">The Forever Way Store</h4>
			  </div>
			  <div class="modal-body">
            <div id="map-continents" class="map css-map-container m650">
             <ul class="continents css-map">
              <li class="c1">                
                <a href="#africa">Africa</a>                
              </li>
              <li class="c2">                
                <a href="#asia">Asia</a>
              </li>
              <li class="c3">
                <a href="#australia-and-southern-pacific">Australia and Southern Pacific</a>
              </li>
              <li class="c4">
                <a href="#europe">Europe</a>
              </li>
              <li class="c5">
                <a href="#north-america">North America</a>
              </li>
              <!-- <li class="c6">
                <a href="#south-america">South America</a>
              </li> -->
             </ul>
             <span class="map-loader" style="left: 325px; margin-left: -42.5px; margin-top: -13.5px; top: 170px; display: none;">Loading ...</span>
            </div>
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>				
			  </div>
			</div>
		  </div>
		</div>
	  
	  


      <!-- FOOTER -->
      




    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../dist/js/holder.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="js/jquery.mixitup.min.js"></script>
    <script src="js/main.js"></script> <!-- Resource jQuery -->
    <script type="text/javascript" src="slick/slick.min.js"></script>
  </body>
</html>
  