<?php
// include_once "../classes/Database.php";
include_once "/var/www/html/RUT/oia/api/classes/Database.php";
include_once "/var/www/html/RUT/oia/api/classes/Applicants.php";

// include_once "../classes/Applicants.php";
class Applications
{
    private $encoders;

    function __construct()
    {
        $db = new Database();
        $this->conn = $db->getInstance();
        $this->applicant = new Applicants();
    }

    function save($datas)
    {
        $atnid = 0;
        $feed = ['status' => 'ok', 'message' => "<div class='alert alert-success'>Application has been sent successful</div>"];

        $applicantId = $this->applicant->checkApplicantExistance($datas); //check applicant if exist


        $qy0 = $this->conn->prepare("SELECT * FROM applications WHERE company_id=:cmpid and applicant_id=:apnid and internship_id=:itnid");
        $qy0->execute(array("cmpid" => $datas['companyid'], "apnid" => $applicantId, "itnid" => $datas['internshipid']));
        if ($qy0->rowCount() == 0) {
            // echo json_encode(array("cmpid"=>$datas['companyid'],"itnid"=>$datas['internshipid'],"aptid"=>$applicantId));exit;
            $qy = $this->conn->prepare("INSERT INTO applications SET company_id=:cmpid,internship_id=:itnid,applicant_id=:aptid");
            $qy->execute(array("cmpid" => $datas['companyid'], "itnid" => $datas['internshipid'], "aptid" => $applicantId));
            $this->saveApplicationAttachments($this->conn->lastInsertId(), $datas);
            if ($qy->rowCount() != 1) {
                // $feed='fail';
                $feed = ['status' => 'fail', 'message' => "<div class='alert alert-danger'>Something went wrong,try again after sometime</div>"];
                // echo $applicantId." - ".json_encode($qy->errorInfo());
            }
        } else $feed = ['status' => 'exist', 'message' => "<div class='alert alert-danger'>You have already applied to this internship</div>"];

        return $feed;
    }
    function saveApplicationAttachments($id, $attachments)
    {
        $feed = ['status' => 'ok', 'message' => "<div class='alert alert-success'>Application registered successful</div>"];
        // $feed='ok';
        // echo json_encode($attachments);exit;
        //move files to uplaoded folder
        $recommendation = $attachments['recommendation'];
        $transcript = $attachments['transcript'];
        $letter = $attachments['letter'];
        $photo = $attachments['photo'];
        move_uploaded_file($recommendation['tmp_name'], "/var/www/html/RUT/oia/api/uploaded/applications/" . $recommendation['name']);
        move_uploaded_file($transcript['tmp_name'], "/var/www/html/RUT/oia/api/uploaded/applications/" . $transcript['name']);
        move_uploaded_file($letter['tmp_name'], "/var/www/html/RUT/oia/api/uploaded/applications/" . $letter['name']);
        move_uploaded_file($photo['tmp_name'], "/var/www/html/RUT/oia/api/uploaded/applications/" . $photo['name']);

        //update cols for application
        $qy = $this->conn->prepare("UPDATE applications SET application_letter=:letter,recommendation=:recommendation,transcript=:transcript,photo=:photo WHERE application_id=:id");
        $qy->execute(array("letter" => stripslashes($letter['name']), "recommendation" => stripslashes($recommendation['name']), "transcript" => stripslashes($transcript['name']), "photo" => stripslashes($photo['name']), "id" => $id));
        if ($qy->rowCount() != 1) {
            echo json_encode($qy->errorInfo());
            $feed = ['status' => 'fail', 'message' => "<div class='alert alert-danger'>Something went wrong,try again after sometime</div>"];
            // $feed='fail';
        }
        return $feed;
    }

    function sendToEmail()
    {
    }

    function get($datas)
    {
        $qy = $this->conn->prepare("SELECT app.*,u.fname,u.lname,u.phone,u.email,u.gender,u.level,u.institution,u.faculty_dept,u.academic_year,ci.department_name,ci.description FROM applications app
INNER JOIN applicant u ON u.applicant_id = app.applicant_id INNER JOIN company_internship ci ON ci.company_id=app.company_id WHERE app.company_id=:cmpid and ci.internship_id=:internship");
        $qy->execute(array("cmpid" => $datas['companyid'], 'internship' => $datas['internshipid']));
        $data = $qy->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($data);
    }

    function getById($datas)
    {
        $qy = $this->conn->prepare("SELECT * FROM applications WHERE application_id=:id");
        $qy->execute(array("id" => $datas['id']));
        $data = $qy->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($data);
    }

    function getByApplicant($datas)
    {
        $qy = $this->conn->prepare("SELECT app.*,ci.description,ci.department_name,CONCAT ('From ',ci.start,' to ',ci.end) as done_on,CONCAT (ci.application_start,' to ',ci.application_end) as application_date,c.phone,c.email,c.name as cmp_name
FROM applications app INNER JOIN applicant u ON u.applicant_id = app.applicant_id INNER JOIN company c ON c.company_id=app.company_id
INNER JOIN company_internship ci ON ci.company_id=app.company_id and ci.internship_id=app.internship_id and ci.company_id=c.company_id WHERE app.applicant_id=:applicantId");
        $qy->execute(array("applicantId" => $datas['applicantid']));
        $data = $qy->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($data);
    }

    function changeApplicationStatus($datas)
    {
        $feed = 'ok';
        $qy = $this->conn->prepare("UPDATE applications SET status=:status,response=:resp WHERE application_id=:id");
        $qy->execute(array("status" => $datas['status'], "resp" => $datas['response'], "id" => $datas['id']));

        if ($qy->rowCount() != 1) {
            $feed = 'fail';
        }
        return $feed;
    }
}

?>