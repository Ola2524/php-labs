<?php

    class MYSQLHandler implements DbHandler
    {

        private $link;
        private $table;

        public function __construct($table) {
            $this->connect();
            $this->table = $table;
        }

        public function connect(){
            try {
                $this->link = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
            } catch (Exception $ex) {
                echo $ex->getMessage();
                exit();
            }
        }
        
        public function get_data($fields = array(),  $start = 0){
        
            $columns = implode($fields);
            $sql = "SELECT $columns from $this->table limit $start";
            $result = mysqli_query($this->link,$sql);

            $items = array();
            while($row = mysqli_fetch_all($result)){
                $items[] = $row;
            }

            return $items;
        }

        public function disconnect(){
            mysqli_close($this->link);
        }

        public function get_record_by_id($id){
            $sql = "SELECT * FROM items WHERE id = $id";
            $result = mysqli_query($this->link,$sql);
            $row = mysqli_fetch_array($result);
            return $row;
        }
    }
    
    