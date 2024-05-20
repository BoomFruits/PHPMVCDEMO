<?php
require_once APP_ROOT.'/app/models/Patient.php';
class PatientService{
    public $savePage;
    public $dbConn;
    public function __construct()
    {
        $this->dbConn = new DbConnection();
    }
    public function getAllPatient(){
        $patiens = [];
        if($this->dbConn != null){    
            $conn = $this->dbConn->getConnection();
            if($conn != null){
                $sql = "select * from patiens";
                $stmt = $conn->query($sql);
                while($row = $stmt->fetch()){
                    $patient = new Patient($row['id'],$row['name'],$row['gender']);
                    $patiens[] = $patient;
                }
                return $patiens;
            }
        }
    }
    public function getAllPatientPagination($page){ 
        $patiens = [];
        if($this->dbConn != null){
            $this->savePage = $page;
            $conn = $this->dbConn->getConnection();
            if($conn != null){
                $limit = 2;
                $offset = ($page - 1)*$limit;
                $sql = "select * from patiens LIMIT ".$offset.",".$limit;
                $stmt = $conn->query($sql);
                while($row = $stmt->fetch()){
                    $patient = new Patient($row['id'],$row['name'],$row['gender']);
                    $patiens[] = $patient;
                }
                return $patiens;
            }
        }
    }
    public function getPatientById($id){
        if($this->dbConn != null){
            $conn = $this->dbConn->getConnection();
            if($conn != null){
                $sql = "select * from patiens where id = $id";
                $stmt = $conn->query($sql);
                $patient = $stmt->fetch();
                return new Patient($patient['id'],$patient['name'],$patient['gender']);
            }
        }
    }
    public function insertPatient($name,$gender){
        if($this->dbConn != null){
            $conn = $this->dbConn->getConnection();
            if($conn != null){
                $sql = "insert into patiens(name,gender) values(?,?)";
                $query = $conn->prepare($sql);
                $query->bindParam(1,$name);
                $query->bindParam(2,$gender);
                $query->execute();
                session_start();
                $_SESSION['msg'] = "add";
                header("Location: index.php?page=$this->savePage");
            }
            }
    }
    public function updatePatient($id,$name,$gender){
        if($this->dbConn != null){
            $conn = $this->dbConn->getConnection();
            if($conn != null){
                $sql = "update patiens set name = ? , gender = ? where id = ?";
                $query = $conn->prepare($sql);  
                $query->bindParam(1,$name);
                $query->bindParam(2,$gender);
                $query->bindParam(3,$id);
                $query->execute();
                session_start();
                $_SESSION['msg'] = "edit";
                header("Location: index.php?page=$this->savePage");
            }
            }
    }
    public function deletePatient($id){
        if($this->dbConn != null){
            $conn = $this->dbConn->getConnection();
            if($conn != null){
                $sql = "delete from patiens where id = ?";
                $query = $conn->prepare($sql);  
                $query->bindParam(1,$id);
                $query->execute();
                header("Location: index.php?page=$this->savePage");
            }
            }
    }
}