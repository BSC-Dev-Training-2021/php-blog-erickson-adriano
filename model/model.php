<?php
    class model {

        function __construct(){

            
            $this->connect();
        }


        private function connect(){

            // connection of database
            $this->con = mysqli_connect("localhost", "root", "", "blog");  
           if(!$this->con)  
           {  
                echo 'Database Connection Error ' . mysqli_connect_error($this->con);  
           }  
        }

        function findAll($table){
            /*
                put your generic SELECT query here
            */

           $array = array();  
           $query = "SELECT * FROM ".$table."";  
           $result = mysqli_query($this->con, $query);  
           while($row = mysqli_fetch_assoc($result))  
           {  
                $array[] = $row;  
           }  
           return $array;  

        }

        function findById($table,$id){
       
           $array = array();  
           $query = "SELECT * FROM ".$table." where id = '" . $id . "'";  
           $result = mysqli_query($this->con, $query);  
           while($row = mysqli_fetch_assoc($result))  
           {  
                $array[] = $row;  
           }  
           return $array;  

        }
      }


        function insert($table_name, $data){
            /*
                put your generic INSERT query here
            */
                    $string = "INSERT INTO ".$table_name." (";            
                   $string .= implode(",", array_keys($data)) . ') VALUES (';            
                   $string .= "'" . implode("','", array_values($data)) . "')";  
                    $last_id = $this->con->insert_id;
                   if($table_name == 'blog_post'){
                      
                        echo "sa postblog to";
                        

                   }
                   else{
                          

                           if(mysqli_query($this->con, $string))  
                           {  
                            
                                return true;  
                           }  
                           else  
                           {  
                                echo mysqli_error($this->con);  
                           }  
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