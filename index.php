
<?php get_header();?>

   <div class="container home-page">
   	
    <div class="row">
<?php 
      
	  if(have_posts()){
		  while(have_posts()){
			  the_post()?>	
			   <div class="col-sm-6">
	              <div class="main-post">
				     <h3 class="post-title">
				       <a href="<?php the_permalink()?>">
				        <?php the_title()?>
	                   </a>
					 </h3>
					 <div class="com-post">
				     <span class="post-author">
					    <i class="fa fa-user fa-fw"></i><?php the_author_posts_link()?>,
					 </span>
	                 <span class="post-date">
					    <i class="fa fa-calendar fa-fw"></i><?php the_date('F j,Y')?> at <?php the_time('g:i a')?>
					 </span>
					 <span class="post-comments">
					    <i class="fa fa-comments fa-fw "></i><?php comments_popup_link('0 Comments','1 Comment','% Comments','comment-url','Comments Disabled')?>
					 </span>
					</div>
					 <?php the_post_thumbnail('',['class'=> 'img-responsive img-thumbnail','title'=>'post image'])?>
					 <div class="post-content ">
					 <?php the_excerpt()?>
					 </div>
					 <hr>
					 <div class="tag-post">
					 <p class="categories">
	                  <i class="fa fa-tag fa fw fa-lg"></i>
	                    <?php the_category(' , ')?>
					 </p>
					 <p class="post-tags">
					   <?php 
					      if(has_tag()){
							  the_tags();
						  }else{
							  echo 'Tags: there\'s No Tags';
						  }
					   ?>
					 </p>
					</div>
				  </div>
               </div>	
          
            	<?php 
               			
		  }//end while
		  
	  }//end if
	     /* 
	      echo '<div class="post-pagination">';
                
	             if(get_previous_posts_link()){
					 previous_posts_link('Next<i class="fa fa-chevron-right  fa-lg" aria-hidden="true"></i>');
				 }else{
					 echo '<span class="previous-span ">Next</span>';
				 }
				  if(get_next_posts_link()){
					 next_posts_link('<i class="fa fa-chevron-left  fa-lg" aria-hidden="true"></i>Prev');
				 }else{
					 echo '<span class="next-span">Prev</span>';
				 }
		  echo '</div>'; */
 
?> 
      </div>  <!--end the row-->

        <div class="pagination-numbers">
		 <?php echo numbering_pagination();?>
     
        </div>
	
	</div>
	<hr>
	
	
	
	
	

  
       <!--<div class="col-sm-6">
	  <div class="main-post">
	   
	   
	   
	   <img class="img-responsive img-thumbnail" src="http://localhost/wordpress/wp-content/themes/YemenUp/107582.jpg" alt="" />
	   <p class="post-content ">Documentation and examples for Bootstrap’s powerful, responsive navigation header, the navbar. Includes support for branding, navigation, and more, including support for our collapse plugin.</p>
	   <hr>
	   <p class="categories">
	   <i class="fa fa-tag fa fw fa-lg"></i>
	   html, test, testing, coding</p>
	  </div>
	 </div>--!>
	 
	
  

<?php get_footer();?>


