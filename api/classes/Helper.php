<?php
class Helper{
    public $db;
    public function __construct($dbInstance)
    {
        $this->db = $dbInstance;
    }

    function countApplications($internshipid){
        $qyLimit = $this->db->prepare("SELECT * FROM applications WHERE internship_id=:internishipid");
        $qyLimit->execute(array("internishipid" => $internshipid));
        return $qyLimit->rowCount();
    }
    function validateSession($allowedSession){
        if(!isset($_SESSION['sessid']) && isset($_SESSION['category'])) header("location:signin.php");
        else{//validate if allowed to access the page
            if($_SESSION['category'] != $allowedSession) {
                session_destroy();
                header("location:signin.php");
            }
        }
    }
}
?>