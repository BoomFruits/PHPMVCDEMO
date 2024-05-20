<?php
require_once APP_ROOT.'/app/services/PatientService.php';
class HomeController{
    private $patientService;
    public function __construct()
    {
        $this->patientService = new PatientService();
    }
    public function index(){
        $patients = $this->patientService->getAllPatient();
        //tao view
        $isPagination = null;
        include APP_ROOT.'/app/views/home/index.php';
    }
    public function home(){
        echo "Hello";
    }
}