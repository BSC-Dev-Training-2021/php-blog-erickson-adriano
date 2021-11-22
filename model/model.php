<?php
    class model {

        function __construct($tableName){

            $this->tableName = $tableName;
            $this->connect();
        }
        private function connect(){

            // connection of database
            $this->con = mysqli_connect("localhost", "root", "", "blog");  
           if(!$this->con){  
                echo 'Database Connection Error ' . mysqli_connect_error($this->con);  
           }  
        }
        function findAll(){
            /*
                put your generic SELECT query here
            */
           $array = array();  
           $query = "SELECT * FROM ". $this->tableName . "";  
           $result = mysqli_query($this->con, $query);
           while($row = mysqli_fetch_assoc($result)){   
             $array[] = $row;  
           }  
           return $array; 
        }
        function findById($id){
       
           $array = array();  
           $query = "SELECT * FROM ". $this->tableName ." where id = '" . $id . "'";  
           $result = mysqli_query($this->con, $query);  
           while($row = mysqli_fetch_assoc($result)) {    
            $array[] = $row;  
           }  
           return $array; 
        }
        //to get the comment
        function findcommentById($id ,$article){
       
           $array = array();  
           $query = "SELECT * FROM ". $this->tableName ." where user_id = '" . $id . "' && article_id = '" .$article. "'" ;  
           $result = mysqli_query($this->con, $query);  
           while($row = mysqli_fetch_assoc($result)) {    
            $array[] = $row;  
           }  
           return $array; 
        }
       function insert( $data){
            /*
                put your generic INSERT query here
    */
            $string = "INSERT INTO ". $this->tableName ." (";            
            $string .= implode(",", array_keys($data)) . ') VALUES (';            
            $string .= "'" . implode("','", array_values($data)) . "')";  
           if(mysqli_query($this->con, $string)){ 
            
              $last_id = $this->con->insert_id;
                
                return $last_id; 
            }  
           else{  
                echo mysqli_error($this->con);  

                return 0;
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