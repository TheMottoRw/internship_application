<?php
include_once "../classes/Applications.php";
$applications = new Applications();

switch($_SERVER['REQUEST_METHOD']){
    case'POST':
        switch($_POST['cate']){
            case 'register':
                echo $applications->save($_POST,$_FILES);break;
            case 'update':
                echo $applications->update($_POST);break;
            case 'status':
                echo $applications->changeApplicationStatus($_POST);break;
        }
        break;
        case'GET':switch($_GET['cate']){
                case 'load':
                    echo $applications->get($_GET);break;
                case 'loadbyid':
                    echo $applications->getById($_GET);break;
                case 'loadbyapplicant':
                    echo $applications->getByApplicant($_GET);break;
            case 'status':
                $res = $applications->changeApplicationStatus($_GET);
                header("location:".$_SERVER['HTTP_REFERER']);
                break;
            }
        break;
            default: echo "uknown request method";
}

?>