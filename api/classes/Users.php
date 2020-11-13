<?php
session_start();
include_once "../classes/Database.php";
include_once "../classes/Validator.php";

class Users
{
    private $encoders;

    function __construct()
    {
        $db = new Database();
        $this->conn = $db->getInstance();
        $this->validate = new Validator();
    }

    function adminExistance()
    {
        $feed = 'ok';
        $qy0 = $this->conn->prepare("SELECT * FROM admin WHERE email=:email");
        $qy0->execute(array("email" => 'hasua.mr@gmail.com'));
        if ($qy0->rowCount() == 0) {
            $qy = $this->conn->prepare("INSERT INTO admin SET fname=:fname,lname=:lname,email=:email,password=:pwd");
            $qy->execute(array("fname" => "System", "lname" => "Administrator", "email" => "hasua.mr@gmail.com", "pwd" => base64_encode("123")));
            if ($qy->rowCount() != 1) {
                $feed = 'fail';
            }
        } else $feed = "exist";
        return $feed;
    }

    function login($datas)
    {
        $this->adminExistance();
        $feed = array("category" => "none", "status" => "fail", "sessid" => "0", "name" => '','message'=>"<div class='alert alert-danger'>Wrong username or password</div>");
        if($this->validate->email($datas['email'])==0 && $this->validate->phone("rwandan",$datas['email'])!=1)
            return json_encode($feed = array("category" => "none", "status" => "fail", "sessid" => "0", "name" => '','message'=>"<div class='alert alert-danger'>Invalid passed email or phone</div>"));


        $qy = $this->conn->prepare("SELECT * FROM admin WHERE email=:email and password=:pwd");
        $qy->execute(array("email" => $datas['email'], "pwd" => base64_encode($datas['password'])));
        //check admin login
        if ($qy->rowCount() == 1) {
            $fetch = $qy->fetchAll(PDO::FETCH_ASSOC);
            $feed = array("category" => "admin", 'status' => "ok", "sessid" => $fetch[0]['id'], "name" => $fetch[0]['fname']);
            $this->setSessions($feed);
        } else {//check company login
            $qy = $this->conn->prepare("SELECT * FROM company WHERE (email=:email or phone=:email) and password=:pwd");
            $qy->execute(array("email" => $datas['email'], "pwd" => base64_encode($datas['password'])));
            if ($qy->rowCount() == 1) {
                $fetch = $qy->fetchAll(PDO::FETCH_ASSOC);
                if ($fetch[0]['status'] == 'approved') {
                    $feed = array("category" => "company", 'status' => "ok", "sessid" => $fetch[0]['company_id'], "name" => $fetch[0]['name']);
                    $this->setSessions($feed);
                } else {
                    $feed['status'] = 'fail';
                    if ($fetch[0]['status'] == 'pending')
                        $feed['message'] = "<div class='alert alert-primary'>Company registration is on hold,waiting for approval</div>";
                    else
                        $feed['message'] = "<div class='alert alert-danger'>Company registration has been rejected</div>";
                }
            } else {//check applicant login
                $qy = $this->conn->prepare("SELECT * FROM applicant WHERE (email=:email or phone=:email) and password=:pwd");
                $qy->execute(array("email" => $datas["email"],"pwd"=>base64_encode($datas['password'])));
					if($qy->rowCount() == 1){
						$fetch = $qy->fetchAll(PDO::FETCH_ASSOC);
						$feed=array("category"=>"applicant",'status'=>"ok","sessid"=>$fetch[0]['applicant_id'],"name"=>$fetch[0]['fname']);
						$this->setSessions($feed);
					} else {
                        $feed = ['message'=>"<div class='alert alert-danger'>Wrong username or password</div>"];
//                        $feed = array("status"=>'fail','category'=>null,'sessid'=>0);
					}
				}
            }
				return json_encode($feed);
    }
	function save($datas){
		$feed='ok';
		$qy0=$this->conn->prepare("SELECT * FROM admin WHERE email =:email");
		$qy0->execute(array("email"=>$datas['email']));
		if($qy0->rowCount()==0){
		$qy=$this->conn->prepare("INSERT INTO admin SET fname =:fname,lname =:lname,email =:email,password =:pwd");
				$qy->execute(array("fname"=>$datas['fname'],"lname"=>$datas['lname'],"email"=>$datas['email'],"pwd"=>base64_encode($datas['password'])));
			} else $feed = "exist";
				if($qy->rowCount()!=1){
					$feed='fail';
				}
				return $feed;
	}
	function setSessions($data){
		$_SESSION['sessid'] = $data['sessid'];
		$_SESSION['usercate'] = $data['category'];
		$_SESSION['name'] = $data['name'];
	}
	
	function saveAttachment($id,$attachment){
		
	}

	function get($datas){
		$qy=$this->conn->prepare("SELECT * FROM admin");
				$qy->execute(array());
				$data=$qy->fetchAll(PDO::FETCH_ASSOC);
				return json_encode($data);
    }
    function getById($datas){
        $qy=$this->conn->prepare("SELECT * FROM admin WHERE id =:id and status !=:status");
				$qy->execute(array("id"=>$datas['userid'],"status"=>'deleted'));
				$data=$qy->fetchAll(PDO::FETCH_ASSOC);
				return json_encode($data);
    }
    function update($datas){
		$feed='ok';
        $qy=$this->conn->prepare("INSERT INTO admin SET fname =:fname,lname =:lname,email =:email,password =:pwd WHERE id =:id");
				$qy->execute(array("id"=>$datas['id'],"fname"=>"System","lname"=>"Administrator","email"=>"hasua . mr@gmail . com","pwd"=>base64_encode("123")));
		        if($qy->rowCount()!=1){
					$feed='fail';
				}
				return $feed;
	}

	function delete($datas){
		$feed='ok';
		$qy=$this->conn->prepare("UPDATE admin SET status =:status WHERE id =:id'");
				$qy->execute(array("status"=>'deleted',"id"=>$datas['id']));
				if($qy->rowCount()!=1){
					$feed='fail';
				}
				return $feed;
	}
}
?>