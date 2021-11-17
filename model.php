<?php
    class model {
        public $table;

       function __construct($tablename= ''){

            $this->table = $tablename; 
            $this->connect();  
        }


        private function connect(){

            $db_user = "root";
            $db_pass = "";
            $db_name ="blog";
            $this->db = new PDO('mysql:host=localhost;dbname=' . $db_name . ';charset=utf8', $db_user, $db_pass);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        function findAll(){
       
                
            
                $query ="select * from  blog_post";
                $d = $this->db->query($query);
               
            

           
        }

        function findById($id){


        }

        public function gettable(){

            return $this->table;
        }
        function insert(){
            
            

           if(isset($_POST['post_blog'])){

                     $title = $_POST['title'];
                     $description = $_POST['description'];
                    $content = $_POST['content'];
                    $created_by = '1';
                     $created_date = date('y/m/d ', time());
                     
                    if (isset($_POST['checkboxvar'])) {
                       $category = implode(',', $_POST['checkboxvar']) ;   
                      $cate = count($_POST['checkboxvar']);
                    }
                    else {
                        $error = 'you need to select category';
                    }

                    
                        $sql ="INSERT INTO blog_post ( `content`, `title`,  `created_by`, `created_date`, `description`) VALUES (?,?,?,?,?)";
                        $stmtinsert = $this->db->prepare($sql);
                        $result = $stmtinsert->execute([$content,$title,$created_by,$created_date,$description]);

                        $id = $this->db->lastInsertId();
                        if ( $result ) {
                                foreach ($_POST['checkboxvar'] as $value) {
                                    $sql ="INSERT INTO blog_post_categories ( blog_post_id, category_id  ) VALUES (?,?)";
                                    $stmtinsert = $this->db->prepare($sql);
                                    $result = $stmtinsert->execute([$id ,$value]);

                                    header('location:index.php');

                                    
                                }
                              
                            
                        }
                        else {
                                echo'error';
                        }

           }
            else {
                echo'error';
            }
            
            
        }
        
    
        

        function update($id, $fields){
              /*
                put your generic UPDATE query here
            */
        }


        function delete(){

        }


}