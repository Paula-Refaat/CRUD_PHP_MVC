<?php

class Model{
    #connection..
    private $server = 'localhost';
    private $username = 'root';
    private $password = '';
    private $db = 'oop_crud';
    private $conn;

    public function __construct(){
        try {
            $this->conn = new mysqli($this->server,$this->username,$this->password,$this->db);
        }
        catch (Exception $e) {
            echo "connection failed" . $e->getMessage();

        }
    }
    public function insert(){
        if (isset($_POST['submit'])){
            if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['mobile']) && isset($_POST['address'])){
                if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['mobile']) && !empty($_POST['address'])){
                   
                        $name = $_POST['name'];
                        $mobile = $_POST['mobile'];
                        $email = $_POST['email'];
                        $address = $_POST['address'];
        
            $query = "INSERT INTO records VALUES ('','$name','$email','$mobile','$address')";
            if ($sql = $this->conn->query($query)) {   
                echo "<script>alert('records added successfully');</script>";
                echo "<script>window.location.href = 'records.php';</script>";
            }else{
                echo "<script>alert('failed');</script>";
                echo "<script>window.location.href = 'index.php';</script>";     
                }
        

                        }

                    else{
                        echo "<script>alert('Empty');</script>";
                        echo "<script>window.location.href = 'index.php';</script>";
                    }
            }
        }

    }
    
    public function search_fetch(){
        if(isset($_POST['search'])){
            $valueToSearch = $_POST['valueToSearch'];
            $data = null;
            $query = "SELECT * FROM records WHERE CONCAT(id,name,email,address,mobile) LIKE '%".$valueToSearch."%'";
            if ($sql = $this->conn->query($query)){
                while($row = mysqli_fetch_assoc($sql)){
                    $data[] = $row;
                }
            }
        }
        else
        {
            $data = null;
            $query = "SELECT * FROM records";
            if ($sql = $this->conn->query($query)){
                while ($row = mysqli_fetch_assoc($sql)){
                    $data[] = $row;
                }
            }
        }
        return $data;
    }
        /*
        $data = null;

        $query = "SELECT * FROM records";
        if ($sql = $this->conn->query($query)){
            while ($row = mysqli_fetch_assoc($sql)){
                $data[] = $row;

            }
            return $data;
        }}*/
   

    public function delete($id){
        $query = "DELETE from records where id = '$id' ";
        if ($sql= $this->conn->query($query)){
            return true;
            header("location : records.php");
        }
        else
        {
            return false;
        }

    }

    public function fetch_single($id){

        $data = null;

        $query = "SELECT * FROM records WHERE id = '$id'";
        if ($sql = $this->conn->query($query)) {
            while ($row = $sql->fetch_assoc()) {
                $data = $row;
            }
        }
        return $data;
    }

    /*
    public function edit($id){

        $data = null;

        $query = "SELECT * FROM records WHERE id = '$id'";
        if ($sql = $this->conn->query($query)) {
            while($row = $sql->fetch_assoc()){
                $data = $row;
            }
        }
        return $data;
    }
    */

    public function update($data){

        $query = "UPDATE records SET name='$data[name]', email='$data[email]', mobile='$data[mobile]', address='$data[address]' WHERE id='$data[id] '";

        if ($sql = $this->conn->query($query)) {
            return true;
        }else{
            return false;
        }
    }
}




?>