<?php



class Database{
    public $conn;
    public function __construct(){
        $this ->conn = mysqli_connect("localhost","root","","crud");


    }

    public function read($query){
        $select = $this->conn->query($query) or die($this->conn->error.__LINE__);
        if(mysqli_num_rows($select) > 0){
            return $select;
        }
        else{
            return false;
        }
    }

    public function create($cquery){
        $insert_row = $this->conn->query($cquery) or die($this->conn->error.__LINE__);
        if($insert_row){
            echo "Data Added!";
            header('location:index.php');
        }
        else{
            echo "Data not Added";
        }


    }
    public function update($uquery){
        $update_row = $this->conn->query($uquery) or die($this->conn->error.__LINE__);
        if($update_row){
            echo "Data Updated!";
            header('location:index.php');
        }
        else{
            echo "Data not Added";
        }


    }
    public function delete($dquery){
        $delete_row = $this->conn->query($dquery) or die($this->conn->error.__LINE__);
        if($delete_row){
            echo "Data Deleted!";
            header('location:index.php');
        }
        else{
            echo "Data not Added";
        }
    }


}



?>
