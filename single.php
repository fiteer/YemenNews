
<?php get_header();?>

   <div class="container post-page">
  <?php 	
function my_title_filter($title) {
$first_name = get_user_meta($data->user->ID, 'first_name', true );

//The page where [wpum_profile] is
if (is_page('2')) {
$title = $first_name;
}
return $title;
}
add_filter('pre_get_document_title', 'my_title_filter', 1);?>
    
<?php 
      
	  if(have_posts()){
		  while(have_posts()){
			  the_post()?>	
			   
	              <div class="main-post ">
					  <?php edit_post_link('Edit <i class="fa fa-pencil"></i>')?>
					
                    <div class="header-title">
					 <div class="author-title">
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
					<div class="text-post"></div>
					 <h3 class="post-title">
				       <a href="<?php the_permalink()?>">
				        <?php the_title()?>
	                   </a>
					 </h3>
					</div>
					 <div class="img-content">
					 <?php the_post_thumbnail('',['class'=> 'img-responsive img-thumbnail','title'=>'post image'])?>
					 <div class="post-content ">
					 <?php the_content()?>
					 </div>
					</div>
					 <hr>
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
               	
          
            	<?php 
               			
		  }//end while
		  
	  }//end if
	      echo '<div class="clearfix"></div>';?>
	      <?php

              //Get Post ID  get_queried_object_id()

            $random_posts_arguments = array(
           
           'posts_per_page'           =>5,
           'orderby'                  =>'rand',
           'category__in'             =>wp_get_post_categories(get_queried_object_id()),
           'post__not_in'             =>array(get_queried_object_id())
      );
        $random_posts = new WP_Query($random_posts_arguments);
	     if($random_posts->have_posts()){
		    while($random_posts->have_posts()){
			   $random_posts->the_post()
	     ?>	
		         <div class="author-posts">
				     <h3 class="post-title">
				       <a href="<?php the_permalink()?>">
				        <?php the_title()?>
	                   </a>
				     </h3>
				     <br>
				 </div>
          <?php  }} 
              
              wp_reset_postdata();
          
          ?>
      
	      <div class="row">

	      	 <div class="col-md-3">
	      	 	<h1><i class="fa fa-user fa-5x"></i></h1>
                
            </div>

            <div class="col-md-9 author-info">
               <h4>
             
                  <?php the_author_meta('first_name')?>
                  <?php the_author_meta('last_name')?>
                  (<span class="nickname"><?php the_author_meta('nickname')?></span>)

              </h4>	
              <?php
           
            
                  if(get_the_author_meta('description')){?>
                     <p>
                         <?php the_author_meta('description')?> 
                     </p>	
              <?php }else{
      	           echo 'Theres No Biography';
                 }

              ?>
            </div>
       </div>
                           <!--end row-->

       <p class="author-stats">
       	
            <span class="posts-count  "><i class="fa fa-count fa-fw"></i> 
            	User Posts Count: <?php echo count_user_posts(get_the_author_meta('ID'))?></span>,<br>
            
            <span class="profile-link"><i class="fa fa-home fa-fw"></i>User Profile Link: <?php the_author_posts_link()?></span>

       </p>

                           <!--end author area-->
	      <?php
	      echo '<div class="post-pagination">';
	             if(get_previous_post_link()){
					 previous_post_link('%link','<i class="fa fa-chevron-left  fa-lg" aria-hidden="true"></i>Previous Article: %title');
				 }else{
					 echo '<span class="previous-span">Previous Article: None</span>';
				 }
				 
				  if(get_next_post_link()){
					 next_post_link('%link','Next Article: %title<i class="fa fa-chevron-right  fa-lg" aria-hidden="true"></i>');
				 }else{
					 echo '<span class="next-span">Next Article: None</span>';
				 }
		  echo '</div>';
		  echo '<hr class="comment-separator">';
		  comments_template();
?>       

	
	</div>
	<hr>
	<hr><hr>
	
	
	
	

  
	 
	
  

<?php get_footer();?>


