<?php
require_once './app/config/config.php';
require_once APP_ROOT.'/app/libs/DbConnection.php';
require_once APP_ROOT.'/app/controllers/HomeController.php';
require_once APP_ROOT.'/app/controllers/PatientController.php';
require_once APP_ROOT.'/app/controllers/HomeController.php';
$controller = isset($_GET['controller'])?$_GET['controller']:'home';
$action = isset($_GET['action'])?$_GET['action']:'index';
if($controller == 'home'){
    if(isset($_GET['page']) && $_GET['page'] > 0){
        $patientController = new PatientController();  
        $patientController->getViewPagination($_GET['page']);
    }else{
        // $patientController = new PatientController();  //View page pagination
        // $patientController->getViewPagination(1);
        $patientController = new HomeController(); //View page normally
        $patientController->index();
    }
}elseif($controller == 'patient'){

    $patientController = new PatientController();  
    if($action == "add"){
        $patientController->create();
        echo "<script>aleart('Ok')</script>";
    }
    elseif($action == "edit"){
        $patientController->edit($_GET['id']);
    }
    elseif($action == "update"){
        $patientController->update();
    }elseif($action == "delete"){
        $patientController->delete($_GET['id']);
    }   
    elseif($action == "store"){
        $patientController->store_patient();
    }
    // else
    // $patientController->index();
}else{
    echo "Nothing";
}