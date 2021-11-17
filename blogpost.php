<?php
include 'model.php';
   class blogpost extends model {

        function __construct(){
            parent::__construct("blog_post");
            
        }


  }
  $blog = new model();
  $blog->insert( );