<?php
include_once "../classes/Database.php";
include_once "../classes/Validator.php";
include_once "Helper.php";

class CompanyInternship extends Helper
{
    private $encoders;

    function __construct()
    {
        $db = new Database();
        $this->conn = $db->getInstance();
        $this->validate = new Validator();
        parent::__construct($this->conn);
    }

    function save($datas)
    {
        $feed = ['status' => 'ok', 'message' => "<div class='alert alert-success'>Internship registered successful</div>"];

        $department = $datas['department'];
        $start = $datas['start'];
        $end = $datas['end'];
        $descr = $datas['description'];
        $eligibility = $datas['eligibility'];
        $position = $datas['position'];
        $appStart = $datas['application_start'];
        $appEnd = $datas['application_end'];
        $appLimit = $datas['application_limit'];

        //validating
        $validationStatus = $this->validate->isEmpty(['Department'=>$department,'Internship starting date'=>$start,'Internship end date'=>$end,'Description'=>$descr,'Eligibility'=>$eligibility,'Internship position'=>$position,'Application start'=>$appStart,'Application end'=>$appEnd,'limit'=>$appLimit]);
        if($validationStatus['status']) return $feed = ['status'=>'fail','message'=>"<div class='alert alert-danger'>".$validationStatus['message']."</div>"];
         //end validation

        $qy0 = $this->conn->prepare("SELECT * FROM company_internship WHERE department_name=:depname and start=:startdate and end =:enddate and description =:descr,needed_number=:position,application_limit=:limits and company_id=:cmpid");
        $qy0->execute(array("depname" => $datas['department'], "startdate" => $datas['start'], "end" => $datas['end'], "descr" => $datas['description'], "position" => $datas['position'], "limits" => $datas['application_limit'], "cmpid" => $datas['companyid']));
        if ($qy0->rowCount() == 0) {
            $qy = $this->conn->prepare("INSERT INTO company_internship SET company_id=:cmpid,department_name=:dept,description=:descr,start=:startdate,end=:enddate,eligibility=:eligibility,needed_number=:position,application_start=:appstart,application_end=:appends,application_limit=:limits");
            $qy->execute(array("cmpid" => $datas['companyid'], "dept" => $datas['department'], "descr" => $datas['description'], "startdate" => $datas['start'], "enddate" => $datas['end'], "eligibility" => $datas['eligibility'], "position" => $datas['position'], "appstart" => $datas['application_start'], "appends" => $datas['application_end'], "limits" => $datas['application_limit']));
            if ($qy->rowCount() != 1) {
                $feed = ['status' => 'fail', 'message' => "<div class='alert alert-danger'>Something went wrong,try again after sometime ".json_encode($qy->errorInfo())." </div>"];
            }
        } else    $feed = ['status' => 'exist', 'message' => "<div class='alert alert-danger'>Same internship information already exist</div>"];

        return $feed;
    }

    function get($datas)
    {
        $qy = $this->conn->prepare("SELECT ci.* FROM company_internship ci WHERE ci.company_id=:cmpid and ci.status!=:status  ");
        $qy->execute(array("cmpid" => $datas['companyid'],'status'=>'deleted'));
        $data = $qy->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($data);
    }

    function getActiveApplication($datas)
    {
//        $qy = $this->conn->query("SELECT ci.*,c.name as company_name,c.email as company_email,c.website FROM company_internship ci INNER JOIN company c ON c.company_id=ci.company_id WHERE ci.application_start<=CURRENT_DATE and ci.application_end>=CURRENT_DATE");
        $qy = $this->conn->query("SELECT ci.*,c.name as company_name,c.email as company_email,c.website,(ci.application_limit - t.applications) as remain
FROM company_internship ci INNER JOIN company c ON c.company_id=ci.company_id
LEFT JOIN (SELECT COUNT(*) as applications,internship_id,company_id FROM applications GROUP BY internship_id,company_id) t ON
t.internship_id = ci.internship_id AND t.company_id = c.company_id
WHERE ci.application_start<=CURRENT_DATE and ci.application_end>=CURRENT_DATE and ci.status!='deleted' AND c.status!='deleted'");
        // $qy->execute(array("cmpid"=>$datas['cmpid']));
        $data = $qy->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($data);
    }
    function getActiveApplicationByCompany($datas)
    {
        $qy = $this->conn->prepare("SELECT * FROM company_internship WHERE company_id=:cmpid and application_start<=CURRENT_DATE and application_end>=CURRENT_DATE");
        $qy->execute(array("cmpid" => $datas['cmpid']));
        $data = $qy->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($data);
    }

    function getById($datas)
    {
        $qy = $this->conn->prepare("SELECT * FROM company_internship WHERE internship_id=:id");
        $qy->execute(array("id" => $datas['id']));
        $data = $qy->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($data);
    }

    function update($datas)
    {
        $feed = ['status' => 'ok', 'message' => "<div class='alert alert-success'>Internship registered successful</div>"];
        $qy = $this->conn->prepare("UPDATE company_internship SET company_id=:cmpid,department_name=:dept,description=:descr,start=:startdate,end=:enddate,description=:descr,eligibility=:eligibility,needed_number=:position,application_start=:appstart,application_end=:appends,application_limit=:limits WHERE internship_id=:id");
        $qy->execute(array("cmpid" => $datas['companyid'], "dept" => $datas['department'], "descr" => $datas['description'], "startdate" => $datas['start'], "enddate" => $datas['end'], "descr" => $datas['description'], "eligibility" => $datas['eligibility'], "position" => $datas['position'], "appstart" => $datas['application_start'], "appends" => $datas['application_end'], "limits" => $datas['application_limit'], "id" => $datas['id']));
        if ($qy->rowCount() != 1) {
            $feed = ['status' => 'fail', 'message' => "<div class='alert alert-danger'>Update failed,something went wrong try again after sometime</div>"];
        }
        return json_encode($feed);
    }

    function changeInternshipStatus($datas)
    {
        $feed = 'ok';
        $qy = $this->conn->prepare("UPDATE company_internship SET status=:status WHERE internship_id=:id");
        $qy->execute(array("status" => $datas['status'], "id" => $datas['id']));
        if ($qy->rowCount() != 1) {
            echo json_encode($qy->errorInfo());
            $feed = 'fail';
        }
        return $feed;
    }
}

?>