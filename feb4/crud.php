<?php
    require_once "Database.php";

    class CRUD{
        private $conn;

        public function __construct(){
            $database = new Database();
            $this->conn = $database->getConnection();
        }

        public function create($table, $data){
            $colums = implode(", ", array_keys($data));
            $placeholders = ":" .implode(",:", array_keys($data));
            $sql = "INSERT INTO $table ($colums) VALUES ($placeholders)";
            $stmt = $this->conn->prepare($sql);

            foreach($data as $key => &$val){
                $stmt->bindParam(":$key", $val);
            }
            return $stmt->execute();
        }

        public function read($table, $conditions =[]){
            $sql = "SELECT * FROM $table";

            if(!empty($conditions)){
                $whereClause =[];
                foreach($conditions as $key => $value){
                    $whereClause[] ="$key = :$key";
                }
                $sql .="WHERE" .implode("AND", $whereClause);
            }

            $stmt = $this->conn->prepare($sql);
            foreach ($conditions as $key => &$val){
                $stmt->bindParam(":key", $val);
            }

            $stmt->execute();
            return $stmt->fetchall(PDO:: FETCH_ASSOC);
        }

        public function update($table,$data,$conditions){
            $updateFields = [];

            foreach ($data as $key => $value){
                $updateFields[]="$key= :$key";
                }
                $sql ="UPDATE $table SET" .implode(",",$updateFields) ."WHERE". implode("AND", $whereClause);
                $stmt = $this->conn->prepare($sql);

                foreach ($data as $key => &$val){
                    $stmt->bindParam(":$key",$val);
                }

                foreach ($conditions as $key => &$val){
                    $stmt->bindParam(":where_$key", $val);
                }
            return $stmt->execute();
        }
            
        public function delete($table,$conditions){
            $whereClause =[];

            foreach ($conditions as $key => $value){
                $whereClause[] ="$key =:$key";
            }

            $sql ="DELETE FROM $table WHERE" . implode("AND", $whereClause);
            $stmt = $this->conn->prepare($sql);

            foreach($conditions as $key => &$val){
                $stmt->bindParam(":$key", $val);
            }
            return $stmt->execute();
        } 
    }



    $crud = new CRUD();
        
?>