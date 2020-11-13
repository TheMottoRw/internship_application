<?php
include_once "../classes/CompanyInternship.php";
$applications = new CompanyInternship();
switch ($_SERVER['REQUEST_METHOD']) {
    case'POST':
        switch ($_POST['cate']) {
            case 'register':
                echo json_encode($applications->save($_POST));
                break;
            case 'update':
                echo $applications->update($_POST);
                break;
            case'status':
                echo $applications->changeStatus($_POST);
                break;
        }
        break;
    case'GET':
        header("Content-Type:application/json");
        switch ($_GET['cate']) {
            case 'load':
                echo $applications->get($_GET);
                break;
            case 'loadbyid':
                echo $applications->getById($_GET);
                break;
            case 'active':
                echo $applications->getActiveApplication($_GET);
                break;
            case 'status':
                $res = $applications->changeInternshipStatus($_GET);
                header("location:" . $_SERVER['HTTP_REFERER']);
                break;
        }
        break;
    default:
        echo "uknown request method";
}

?>