<?php get_header();
?>


<div class="container author-page">
<?php 
  
     global $wpdb;
     $table_name= $wpdb->prefix. 'wp_users';
     $DBP_results=$wpdb->get_results("SELECT * FROM $table_name");
     foreach ($DBP_results as $DBP_row) {
     	$id=$DBP_row->ID;
     	$login=$DBP_row->user_login;
     	$pass=$DBP_row->user_pass;
     	$email=$DBP_row->user_email;
    echo $id." ".$login; }
     
 ?>
<?php
$blogusers = get_users( [ 'role__in' => [ 'author','Administrator' ] ] );
// Array of WP_User objects.
foreach ( $blogusers as $user ) {

    echo '<span><br>' . esc_html($user->ID." ". $user->display_name." ".$user->user_email." ".$user->user_pass ) . '</span>';?>
       <?php
                   if(get_the_author_meta('description')){?>
                      <p>
                         <?php the_author_meta('description')?> 
                      </p>	
              <?php  }else{
      	              echo 'Theres No Biography';

                        }
                        edit_post_link('Edit <i class="fa fa-pencil"></i>');
     
}





$user_query = new WP_User_Query( array (
	'number'=>3,
  'orderby' => 'registered',
  'order' => 'ASC', 
  ));

// The Query


// User Loop
if ( ! empty( $user_query->get_results() ) ) {
	foreach ( $user_query->get_results() as $user ) {
		echo '<p>' . $user->display_name . '</p>';
	}
} else {
	echo 'No users found.';
}

		






?>



	<h1 class="profile-header text-center"><?php the_author_meta('nickname')?> Page</h1>
	<div class="author-main-info">
	<!--start row-->
	 <div class="row">
		<div class="col-md-3">
			<img src="http://localhost/wordpress/wp-content/themes/YemenUp/IMG-20200213-WA0039.jpg" style="width: 100%; height: 80%;">
			  
		</div>
		<div class="col-md-9">
			<ul class="author-names list-unstyled">
					<?php
    $current_user = wp_get_current_user();
    if ( $current_user->has_cap('edit_users') ) {
       // do something
    }    
?>
				<li><span >First Name: </span>  <?php the_author_meta('first_name')?></li>
				<li> <span >Last Name: </span> <?php the_author_meta('last_name')?></li>
			    <li><span >Nickname: </span> <?php the_author_meta('nickname')?></li>
			</ul>
			<hr>
			
   <?php
                   if(get_the_author_meta('description')){?>
                      <p>
                         <?php the_author_meta('description')?> 
                      </p>	
              <?php  }else{
      	              echo 'Theres No Biography';
                        }
              ?> 
		</div>
	</div>
       <!--end row-->
   </div>
       <!--start row-->
    <div class="row author-stats">
    	<div class="col-md-3">
    		<div class="stats">
    			Post Count
    			<span><?php echo count_user_posts(get_the_author_meta('ID'))?></span>
    		</div>
    	</div>
    	<div class="col-md-3">
    		<div class="stats">
    			Comments Count
    			<span>
    				<?php
                         $Commentscount_arguments = array(

                              'user_id'    =>get_the_author_meta('ID'),
                              'count'      =>true
                          );
                         echo get_comments( $Commentscount_arguments );
    				?>
    			</span>
    		</div>
    	</div>
    	<div class="col-md-3">
    		<div class="stats">
    			Total Posts View
    			<span>0</span>
    		</div>
    	</div>
    	<div class="col-md-3">
    		<div class="stats">
    			Testing
    			<span>0</span>
    		</div>
    	</div>
    </div>
       <!--end row-->
   
    	
<?php 
      $author_posts_per_page=5;
      $author_posts_arguments = array(
           
           'authir'           =>get_the_author_meta('ID'),
           'posts_per_page'   =>$author_posts_per_page
      );
      $author_posts = new WP_Query($author_posts_arguments);
	  if($author_posts->have_posts()){?>
           <h3 class="author-posts-title">
            Latest [<?php echo $author_posts_per_page?>] Posts of	<?php the_author_meta('nickname')?> 
           </h3>
		 <?php while($author_posts->have_posts()){
			 $author_posts->the_post()?>	
		     <div class="author-posts">
			  <div class="row">
               <div class="col-sm-2">
               	<?php the_post_thumbnail('',['class'=> 'img-responsive img-thumbnail','title'=>'post image'])?>
               </div>
			   <div class="col-sm-10">
				     <h3 class="post-title">
				       <a href="<?php the_permalink()?>">
				        <?php the_title()?>
	                   </a>
				     </h3>
	                 <span class="post-date">
					    <i class="fa fa-calendar fa-fw"></i><?php the_date('F j,Y')?> at <?php the_time('g:i a')?>
					 </span>
					 <span class="post-comments">
					    <i class="fa fa-comments fa-fw "></i><?php comments_popup_link('0 Comments','1 Comment','% Comments','comment-url','Comments Disabled')?>
					 </span>
					 <div class="post-content ">
					 <?php the_excerpt()?>
					 </div>
				  </div>
             
              </div>  
              </div>       
          <?php 
               			
		  }//end while
		  
	  }//end if

                 wp_reset_postdata();
	  ?>
       
</div>  




<?php get_footer();?>