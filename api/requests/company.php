<?php
include_once "../classes/Company.php";
$company = new Company();
//echo json_encode($_POST)." - ".json_encode($_FILES);exit;
switch($_SERVER['REQUEST_METHOD']){
    case'POST':
        switch($_POST['cate']){
            case 'register':
                echo $company->save($_POST);break;
                case 'postman_register':
                    echo $company->save($_POST,$_FILES);break;
            case 'update':
                echo $company->update($_POST,$_FILES);break;
            case 'status':
                echo $company->changeStatus($_POST);break;
        }
        break;
        case'GET':
            header("Content-Type:application/json");
            switch($_GET['cate']){
                case 'load':
                    echo $company->get($_GET);break;
                case 'loadbyid':
                    echo $company->getById($_GET);break;
                case 'loadbystatus':
                    echo $company->getByStatus($_GET);break;
                case 'encrypt':
                    echo $company->encryptAllPassword($_GET);break;
                case 'decrypt':
                    echo $company->decryptAllPassword($_GET);break;
                case 'status':
                    $res = $company->changeCompanyStatus($_GET);
                    header("location:".$_SERVER['HTTP_REFERER']);break;
            }
        break;
            default: echo "uknown request method";break;
}

?>