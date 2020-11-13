<?php
include_once "../classes/Applicants.php";
$applicants = new Applicants();
switch($_SERVER['REQUEST_METHOD']){
    case'POST':
        switch($_POST['cate']){
            case 'register':
                echo json_encode($applicants->save($_POST));break;
            case 'update':
                echo $applicants->update($_POST);break;
            case 'delete':
                echo $applicants->delete($_POST);break;
        }
        break;
        case'GET':switch($_GET['cate']){
                case 'load':
                    echo $applicants->get($_GET);break;
                case 'update':
                    echo $applicants->getById($_GET);break;
            }
        break;
            default: echo "uknown request method";
}

?>