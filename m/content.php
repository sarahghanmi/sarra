<!-- content -->


<div class="container">
		<div class="content">
			<a href="single.html"><img src="<?php bloginfo('template_directory'); ?>/images/menu.png" class="img-responsive" alt="h5" /></a>
			<a href="single.html"><img src="<?php bloginfo('template_directory'); ?>/images/3.png" class="img-responsive" alt="h5" /></a>
			<i class="aeroplane"> </i>
	<div class="travelling">
			<div class="col-md-10 travelling1">
				
<h1></h1>
				
				<p>Un Institut supérieur des études technologiques (ISET) est un institut universitaire tunisien rattaché à une université. L'enseignement y est assuré en grande partie par des enseignants du corps des technologues. </p>
			</div>
			
				<div class="clearfix"> </div>
	</div>
	<div class="lequotes">
			<div class="blog-post"> 

<h2 class="blog-post-title"><i><b><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></b></i></h2>
  <p class="blog-post-meta">
<?php the_date(); ?> par <a href="#"><?php the_author(); ?></a></p>   
<?php the_excerpt(); ?> 

</div><!-- /.blog-post --> 

			<div class="col-md-12 lequotes3 ">
				<div class="lequotes1">
					<img src="<?php bloginfo('template_directory'); ?>/images/row2.jpg" class="img-responsive" alt="" />
	
</div>
				
					<div class="clearfix"> </div>
			</div>
				<div class="billgates">
							
				<div class="col-md-1 billgates2">

<div class="row">  
<div class="col-md-4">
<?php if ( has_post_thumbnail() ) {?> 
 <?php the_post_thumbnail('thumbnail'); ?> 
</div> 
 <div class="col-md-6"> 
 <?php the_excerpt(); ?> 
 </div> </div>  <?php } else { ?> 
 <?php the_excerpt(); ?> <?php } ?>
    
     <p>Enseignant :</p>
     <ul>
         <li><?php echo get_post_meta($post->ID , 'meta-prof' , true); ?></li>
     </ul>

     <p>Charge Horaire :</p>
     <ul>
         <li><?php echo get_post_meta($post->ID , 'meta-ch' , true); ?></li>
     </ul>
 </div>
				
					<div class="clearstatcache"> </div>
					<h4>“welcome in my project“</h4>
					
				</div>
	</div>	
	
</div>	
</div>
<!-- content -->