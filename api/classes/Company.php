<?php
include_once "/var/www/html/RUT/oia/api/classes/Database.php";
include_once "/var/www/html/RUT/oia/api/classes/Validator.php";
class company {
	private $encoders;
	function __construct(){
		$db=new Database();
		$this->conn=$db->getInstance();
		$this->validate = new Validator();
	}
	function save($datas){
		$feed=['status'=>'ok','message'=>"<div class='alert alert-success'>Company account created succesfull</div>"];
		$name = $datas['names'];
		$phone = $datas['phone'];
		$email = $datas['email'];
		$tin = $datas['tin'];
		$password = $datas['password'];
        //validating
        $validationStatus = $this->validate->isEmpty(['Company name'=>$name,'Phone'=>$phone,'Email'=>$email,'Tin number'=>$tin,'Password'=>$password]);
        if($validationStatus['status']) return $feed = ['status'=>'fail','message'=>"<div class='alert alert-danger'>".$validationStatus['message']."</div>"];
        if($this->validate->phone('rwandan',$phone) == 0) return $feed = ['status'=>'fail',"message"=>"<div class='alert alert-danger'>Invalid phone number</div>"];
        if($this->validate->email($email) == 0) return $feed = ['status'=>'fail',"message"=>"<div class='alert alert-danger'>Invalid email address</div>"];
        if(!preg_match("/^[0-9]{9}$/i",$tin)) return $feed = ['status'=>'fail',"message"=>"<div class='alert alert-danger'>Invalid tin number</div>"];
        //end validation

		$qy0=$this->conn->prepare("SELECT * FROM company WHERE email=:email or phone =:phone or tin_number=:tin");
		$qy0->execute(array("email"=>$datas['email'],"phone"=>$datas['phone'],"tin"=>$datas['tin']));
		if($qy0->rowCount()==0){
		$qy=$this->conn->prepare("INSERT INTO company SET name=:names,phone=:phone,email=:email,tin_number=:tin,address=:address,gps_location=:location,website=:web,password=:pwd,photo=:pic");
				$qy->execute(array("names"=>$datas['names'],"phone"=>$datas['phone'],"email"=>$datas['email'],"tin"=>$datas['tin'],"address"=>$datas['address'],"location"=>$datas['location'],"web"=>$datas['website'],"pwd"=>base64_encode($datas['password']),"pic"=>''));
			//echo $this->conn->lastInsertId()." - ".json_encode($qy->errorInfo());exit;
				$this->saveAttachment($this->conn->lastInsertId(),$datas);
				if($qy->rowCount()!=1){
					$feed=['status'=>'fail','message'=>"<div class='alert alert-danger'>Something went wrong,try again after sometime</div>"];
				}
			} else {
				$companyInfo = $qy0->fetchAll(PDO::FETCH_ASSOC);
				if($companyInfo[0]['phone'] == $datas['phone']) $feed['message']="<div class='alert alert-danger'>Phone number already exist,use another one</div>";
				if($companyInfo[0]['email'] == $datas['email']) $feed['message']="<div class='alert alert-danger'>Email address already exist,use another one</div>";
				if($companyInfo[0]['tin'] == $datas['tin']) $feed['message']="<div class='alert alert-danger'>Tin number exist,use another one</div>";
				$feed['status'] = "exist";
			}
				return $feed;
	}
	
	function saveAttachment($id,$attachment){
		$feed='ok';
		//move files to uplaoded folder
		$photo = $attachment['photo'];
		$picName = $photo['name']; 
		move_uploaded_file($photo['tmp_name'],"/var/www/html/RUT/oia/api/uploaded/profiles/".$picName);
		//update cols for application
		$qy=$this->conn->prepare("UPDATE company SET photo=:photo WHERE company_id=:id");
			$qy->execute(array("id"=>$id,"photo"=>$picName));
			if($qy->rowCount()!=1){
					$feed='fail';
				}
				return $feed;
	}

	function get($datas){
		$qy=$this->conn->prepare("SELECT * FROM company WHERE status NOT IN ('deleted')");
				$qy->execute();
				$data=$qy->fetchAll(PDO::FETCH_ASSOC);
				return json_encode($data);
    }
    function getByStatus($datas){
	    $status = $datas['status'];
        $qy=$this->conn->prepare("SELECT * FROM company WHERE status=:status");
        $qy->execute(['status'=>$status]);
        $data=$qy->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($data);
    }

    function getById($datas){
        $qy=$this->conn->prepare("SELECT * FROM company WHERE id=:id");
				$qy->execute(array("id"=>$datas['userid']));
				$data=$qy->fetchAll(PDO::FETCH_ASSOC);
				return json_encode($data);
    }
    function update($datas){
		$feed='ok';
        $qy=$this->conn->prepare("UPDATE company SET name=:names,phone=:phone,email=:email,tin_number=:tin,address=:address,gps_location=:location,website=:web WHERE company_id=:id");
				$qy->execute(array("names"=>$datas['names'],"phone"=>$datas['phone'],"email"=>$datas['email'],"tin"=>$datas['tin'],"address"=>$datas['address'],"location"=>$datas['location'],"web"=>$datas['website'],"id"=>$datas['id']));
				saveAttachment($datas['id'],$datas);
				if($qy->rowCount()!=1){
					$feed='fail';
				}
				return $feed;
	}
	function changeCompanyStatus($datas){
		$feed='ok';
		$qy=$this->conn->prepare("UPDATE company SET status=:status WHERE company_id=:id");
				$qy->execute(array("status"=>$datas['status'],"id"=>$datas['id']));
				if($qy->rowCount()!=1){
					//echo json_encode($qy->errorInfo());
					$feed='fail';
				}
				return $feed;
	}
	function encryptAllPassword(){
		$qy=$this->conn->prepare("SELECT * FROM company WHERE status!=:status");
				$qy->execute(array("status"=>"deleted"));
				$data=$qy->fetchAll(PDO::FETCH_ASSOC);
				// return json_encode($data);exit;
				foreach($data as $obj){
					// echo base64_encode($obj['password']);exit;
					$qy=$this->conn->prepare("UPDATE company SET password =:pwd WHERE company_id=:id");
					$d = $qy->execute(array("pwd"=>base64_encode($obj['password']),'id'=>$obj['company_id']));
					// return $d;
				}
	}
	function decryptAllPassword(){
		$arr = [];
		$qy=$this->conn->prepare("SELECT * FROM company WHERE status!=:status");
				$qy->execute(array("status"=>"deleted"));
				$data=$qy->fetchAll(PDO::FETCH_ASSOC);
				// return json_encode($data);exit;
				foreach($data as $obj){
					$obj['password'] = base64_decode($obj['password']);
					$arr[] = $obj;
				}
				return json_encode($arr);
	}
}
?>