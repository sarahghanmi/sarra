<!DOCTYPE HTML>
<html>
<head>

<link href="css/blog.css" rel="stylesheet" type="text/css" media="all">
<link href="<?php bloginfo('template_directory'); ?>/css/blog.css" rel="stylesheet"> 
<link href="<?php bloginfo('template_directory'); ?>/style.css" rel="stylesheet"> 

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,800,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
<script src="js/jquery.min.js"></script>				
</head>
<body>
<!-- header -->
	<div class="blog-header">   
	<h1 class="blog-title">     
	<center><a href="<?php bloginfo( 'wpurl' );?>"><?php echo get_bloginfo( 'name' ); ?></a></h1></center>  
	<em><p class="lead blog-description"><?php echo get_bloginfo( 'description' ); ?></p> </em>
	</div>
<div class="banner">
  	    <a href="about.html"><img src="<?php bloginfo('template_directory'); ?>/images/banner.jpg" class="img-responsive" alt="" /></a>
		<div class="container">
			
			<div class="logo">
				<a href="about.html"><img src="<?php bloginfo('template_directory'); ?>/images/logo.png" class="img-responsive" alt="" /></a>
			</div>
		</div> 
			<div class="header-bottom">
				<div class="container">
					<div class="head-nav">
						<span class="menu"> </span>
							<ul>
								<li class="active"><a href="index.html"><font color="black">Home</font></a></li>
								<li><a href="about.html"><font color="red">About</font></a></li>
								<li><a href="index.html"><font color="black">Categorie</font></a></li>
								

<div class="clearfix"> </div>
						
</ul>
				</div>
				<!-- script-for-nav -->
					<script>
						$( "span.menu" ).click(function() {
						  $( ".head-nav ul" ).slideToggle(300, function() {
							// Animation complete.
						  });
						});
					</script>
				<!-- script-for-nav -->		
					<div class="search-box">
						<form>
						
			 <a href="about.html"><img src="<?php bloginfo('template_directory'); ?>/images/search.png"/></a> <input                                                                                                                                       type="text" name="s" class="textbox" value="search something" onfocus="this.value = '';" onblur="if
				                  	(this.value == '') {this.value = 'search something';}">
				            
							
				        </form>
		            				      

					</div>
						<div class="clearfix"> </div>
				</div>
			</div>
	</div>
<!-- header -->