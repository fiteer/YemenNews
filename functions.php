<?php 

   


	
        add_theme_support('post-thumbnails');

       function YemenUp_add_styles(){
	
	    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css');
	    wp_enqueue_style('fontawesome-css', get_template_directory_uri() . '/font-awesome-4.7.0/css/font-awesome.min.css');
		wp_enqueue_style('main', get_template_directory_uri() . '/css/main.css');
}
       function YemenUp_add_scripts(){
	    wp_deregister_script('jquery');
	    wp_enqueue_script('jquery');
		wp_register_script('jquery.min', includes_url('/js/jquery.min.js'), false, '', true);
	    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), false, true);
	    wp_enqueue_script('html5-js', get_template_directory_uri() . '/js/html5.js');
	    wp_script_add_data('html5','conditional','lt IE 9');
} 
        
		
		/**
		*Add cusomt menu support
		*/
		function YemenUp_Menu(){
			register_nav_menus(array(
			'bootstrap-menu' => 'Navigation Bar',
			'footer-menu' => 'footer bar'
			));
			
		}
		function YemenUp_bootstrap_menu(){
			wp_nav_menu(array(
			'theme_location' => 'bootstrap-menu',
			'menu_class' => 'nav navbar-nav nav navbar-left ',
			
			'container' => false,
			'depth'     =>2,
			
			));
		}

		/* customaize the extend word*/

		function YemenUp_extend_excerpt_length($length){
			if (is_author()){
                return 20;
			}else{
			return 200;}
		}

		add_filter('excerpt_length','YemenUp_extend_excerpt_length');

		function YemenUp_excerpt_chenge_dots($more){
			return '....';
		}

		add_filter('excerpt_more','YemenUp_excerpt_chenge_dots');

		/* add action*/
		add_action('wp_enqueue_scripts','YemenUp_add_styles');
	    add_action('wp_enqueue_scripts','YemenUp_add_scripts');
		add_action('init', 'YemenUp_Menu');

		/* Numbering pagination*/
		function numbering_pagination(){

			global $wp_query;
			$all_pages=$wp_query->max_num_pages;
			$current_page = max(1,get_query_var('paged'));
			 if($all_pages > 1){
			 	return paginate_links(array(

                     'base'       =>get_pagenum_link() . '%_%',
                     'format'     =>'page/%#%',
                     'current'    =>$current_page
			 	));
			 }
		}


 ?>