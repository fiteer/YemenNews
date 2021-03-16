<!DOCTYPE html>
<html <?php language_attributes();?>>
   <head>
      <meta charset="<?php bloginfo('charset');?>"/>
      <title>
        <?php wp_title('|','true','right');?>
        <?php bloginfo('name');?>
        </title>
	  <link rel="pingback" href="<?php bloginfo('pingback');?>"/>
	  <?php wp_head();?>
   </head>
   <body>
  
	 
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
  <div class="navbar-header">
  <a class="navbar-brand" href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
  <button type="button" class="navbar-toggler collapsed" data-toggle="collapse"  data-toggle="#bs-example-collapse-1"  data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
	
  </button>
    
  </div>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
   
  </div><?php YemenUp_bootstrap_menu()?></div>
</nav>
    