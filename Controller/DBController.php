<?php
class DBController
{
        #connection..
        public $server = 'localhost';
        public $username = 'root';
        public $password = '';
        public $db = 'oop_crud';
        public $conn;
    
        public function openConnection()
        {
            $this->connection= new mysqli($this->server,$this->username,$this->password,$this->db);
            if($this->connection->connect_error)
            {
                echo "Error in connection: " . $this->connection->connect_error;
                return false;
            }
            else
            {
                return true;
            }
        }

        public function add_patient($name,$mobile,$email,$address)
        {
            $query = "INSERT INTO records VALUES ('','$name','$email','$mobile','$address')";
            if ($sql = $this->conn->query($query)) {   
                echo "<script>alert('records added successfully');</script>";
                echo "<script>window.location.href = 'records.php';</script>";
            }else{
                echo "<script>alert('failed');</script>";
                echo "<script>window.location.href = 'index.php';</script>";     
                }
        }
}



?>