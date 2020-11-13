<?php
// include_once "../classes/Database.php";
include_once "/var/www/html/RUT/oia/api/classes/Database.php";
include_once "/var/www/html/RUT/oia/api/classes/Validator.php";

class Applicants {
	private $encoders;
	function __construct(){
		$db=new Database();
		$this->conn=$db->getInstance();
		$this->validate = new Validator();
	}
	function save($datas){
		$feed=['status'=>'ok','message'=>"<div class='alert alert-success'>Applicant registered successful</div>"];
		$fname = $datas['fname'];
		$lname = $datas['lname'];
		$phone = $datas['phone'];
		$email = $datas['email'];
		$institution = $datas['institution'];
		$acyear = $datas['academic_year'];
		$dept = $datas['department'];
        //validating
        $validationStatus = $this->validate->isEmpty(['First name'=>$fname,'Last name'=>$lname,'Phone'=>$phone,'Email'=>$email,'Institution'=>$institution,'Academic year'=>$acyear,'Department'=>$dept]);
        if($validationStatus['status']) return $feed = ['status'=>'fail','message'=>"<div class='alert alert-danger'>".$validationStatus['message']."</div>"];
        if($this->validate->email($email) == 0) return $feed = ['status'=>'fail',"message"=>"<div class='alert alert-danger'>Invalid email address</div>"];
        if($this->validate->phone('rwandan',$phone) == 0) return $feed = ['status'=>'fail',"message"=>"<div class='alert alert-danger'>Invalid phone number</div>"];
        //end validation


        $qy0=$this->conn->prepare("SELECT * FROM applicant WHERE email=:email or phone =:phone");
		$qy0->execute(array("email"=>$datas['email'],"phone"=>$datas['phone']));
		if($qy0->rowCount()==0){
		$qy=$this->conn->prepare("INSERT INTO applicant SET fname=:fname,lname=:lname,phone=:phone,email=:email,gender=:gender,institution=:institution,level=:levels,faculty_dept=:dept,academic_year=:acyear,password=:pwd");
				$qy->execute(array("fname"=>$datas['fname'],"lname"=>$datas['lname'],"phone"=>$datas['phone'],"email"=>$datas['email'],"gender"=>$datas['gender'],"institution"=>$datas['institution'],"levels"=>$datas['level'],"dept"=>$datas['department'],"acyear"=>$datas['academic_year'],"pwd"=>base64_encode($datas['password'])));
				// echo json_encode($qy->errorInfo());exit;
				if($qy->rowCount()!=1){
					$feed=['status'=>'fail',"message"=>"<div class='alert alert-danger'>Something went wrong,try again later</div>"];
				}
				return $this->conn->lastInsertId();
			} else $feed = $qy0->fetchAll(PDO::FETCH_ASSOC)[0]['applicant_id'];

				return $feed;
	}
	function checkApplicantExistance($datas){
	    $appid = 0;
		if(isset($datas['sessid'])) {
            $applicantInfo = $this->getById($datas);
            if (count($applicantInfo) > 0) $appid = $applicantInfo[0]['applicant_id'];
        } else $appid = $this->save($datas);
		return $appid;
	}
	function get($datas){
		$qy=$this->conn->prepare("SELECT * FROM applicant WHERE status!=:status");
				$qy->execute(array("status"=>$datas['deleted']));
				$data=$qy->fetchAll(PDO::FETCH_ASSOC);
				return json_encode($data);
    }
    function getById($datas){
        $qy=$this->conn->prepare("SELECT * FROM applicant WHERE applicant_id=:id");
				$qy->execute(array("id"=>$datas['sessid']));
				$data=$qy->fetchAll(PDO::FETCH_ASSOC);
				return $data;
    }
    function update($datas){
		$feed='ok';
		$qy=$this->conn->prepare("UPDATE applicants SET fname=:fname,lname=:lname,phone=:phone,email=:email,gender=:gender,institution=:institution,level=:levels,faculty_dept=:dept,academic_year=:acyear,status=:status WHERE applicant_id=:id");
		$qy->execute(array("fname"=>$datas['fname'],"lname"=>$datas['lname'],"phone"=>$datas['phone'],"email"=>$datas['email'],"gender"=>$datas['gender'],"institution"=>$datas['institution'],"level"=>$datas['levels'],"dept"=>$datas['department'],"acyear"=>$datas['academic_year'],"id"=>$datas['id']));
		        if($qy->rowCount()!=1){
					$feed='fail';
				}
				return $feed;
	}

	function delete($datas){
		$feed='ok';
		$qy=$this->conn->prepare("UPDATE applicant SET status=:status WHERE applicant_id=:id'");
				$qy->execute(array("status"=>'deleted',"id"=>$datas['id']));
				if($qy->rowCount()!=1){
					$feed='fail';
				}
				return $feed;
	}
}
?>