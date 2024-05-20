<?php
require_once APP_ROOT.'/app/services/PatientService.php';
class PatientController{
    private $patientService;
    public function __construct()
    {
        $this->patientService = new PatientService();
    }
    public function index(){
        echo "Patient Controller";
    }   
    public function create(){
        include APP_ROOT.'/app/views/patient/add.php';
    }
    public function store_patient(){
        if(isset($_POST['name']) && isset($_POST['gender'])){
            $name = $_POST['name'];
            $gender = $_POST['gender'];
            $this->patientService->insertPatient($name,$gender);
        }
    }
    public function edit($id){
        $patient = $this->patientService->getPatientById($id);
        include APP_ROOT.'/app/views/patient/edit.php';
    }
    public function update(){
        try{
            if(isset($_POST['id']) && isset($_POST['name']) && isset($_POST['gender'])){
                $id = $_POST['id'];
                $name = $_POST['name'];
                $gender = $_POST['gender'];
                $this->patientService->updatePatient($id,$name,$gender);
            }
        }catch(Exception $e){
            echo $e;
        }
    }
    public function delete(){
        try{
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $this->patientService->deletePatient($id);
            }
        }catch(Exception $e){
            echo $e;
        }
    }
    public function getViewPagination($page){
        $patients = $this->patientService->getAllPatientPagination($page);
        $total_page = (int)ceil(count($this->patientService->getAllPatient())/2);
        $isPagination = true;
        include APP_ROOT.'/app/views/home/index.php';
    }
}