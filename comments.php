<?php 
    
    if(comments_open()){
    	?>

    	<h3 class="comment-count">
    	 <?php comments_number('0 Comments','1 Comment','% Comments');?>
    	  </h3>
          
     <?php
       
    	echo '<ul class="list-unstyled comments-list">';
    	$comments_argument = array(
               
              'max_depth'     =>3,
              'type'          =>'comment',
              'avatar_size'   =>64
    	 );
        wp_list_comments($comments_argument);
       echo '</ul>';
         echo '<hr class="comment-separator">';
         $commentform_arguments = array(
               
              'title_reply'            =>'Add Your Comment',
              'title_reply_to'         =>'Add a Reply To [%s]',
              'class_submit'           =>'btn btn-primary btn-md',
              'comment_notes_before'   =>''
         );
         comment_form($commentform_arguments);

    }else{
        echo 'sorry comments are disabled';
    }

?>