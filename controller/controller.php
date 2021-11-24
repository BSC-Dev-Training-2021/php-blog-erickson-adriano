<?php

require_once 'model/blogpost.php'; 


if( isset ( $_POST["post_blog"] ) )  { 
   		$data = new post();
        $user_id = "1";
        $created_by = '1';
        $created_date = date("l jS \of F Y ", time());
        //making arraykey and array value
        $insert_data = array(  
        'content'        =>     mysqli_real_escape_string( $data->con, $_POST['content'] ),  
        'title'          =>     mysqli_real_escape_string( $data->con, $_POST['title'] ),
        'created_by'     =>     mysqli_real_escape_string( $data->con, $created_by ), 
        'created_date'   =>     mysqli_real_escape_string( $data->con, $created_date ),
        'description'    =>     mysqli_real_escape_string( $data->con, $_POST['description'] )
      );  
       $lastid = $data->insert($insert_data);
        if( $lastid ){     
            foreach ( $_POST['checkboxvar'] as $value ) {
                   # code...
                $postcat= array(
                'category_id'   	=>     mysqli_real_escape_string( $data->con, $value ),
                'blog_post_id'    	=>     mysqli_real_escape_string( $data->con, $lastid ) ); 
                require_once 'model/blog_post_categories.php ';
                $data = new postcat(); 
               $result= $data->insert( $postcat );
            }


            header("location:index.php");	
               /*$success_message = '<div class="alert alert-success"> <strong>
                                    insert success Insert Again!</strong>
                                    </div>'  ;  */
        } 
};

if(isset($_POST['addcategory'])){

		$data = new post();
};








?>