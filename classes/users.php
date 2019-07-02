<?php
if (file_exists("../db/Kanexon.php")) {
require_once '../db/Kanexon.php';
} else {
require_once 'db/Kanexon.php';
}
class users {

    private $conn = null;

    public function __construct() {
        $Data = new Kanexon();
        $this->conn = $Data->getDb();
    }
    
    
    public function Insert(){
$query = "INSERT INTO users(userMobile , userName , age , userEmail , userId , AddressLine1 , AddressLine2 , city , state , country , zip , AdharcardId , AdharRefno , edu , dist , companyname , role) 
	VALUES ( ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ?) " ; 
$success = 0;
try{
	$stmt = $this->conn->prepare($query);
	$stmt->bindParam (1 , $this->userMobile); 
	$stmt->bindParam (2 , $this->userName); 
	$stmt->bindParam (3 , $this->age); 
	$stmt->bindParam (4 , $this->userEmail); 
	$stmt->bindParam (5 , $this->userId); 
	$stmt->bindParam (6 , $this->AddressLine1); 
	$stmt->bindParam (7 , $this->AddressLine2); 
	$stmt->bindParam (8 , $this->city); 
	$stmt->bindParam (9 , $this->state); 
	$stmt->bindParam (10 , $this->country); 
	$stmt->bindParam (11 , $this->zip); 
	$stmt->bindParam (12 , $this->AdharcardId); 
	$stmt->bindParam (13 , $this->AdharRefno); 
	$stmt->bindParam (14 , $this->edu); 
	$stmt->bindParam (15 , $this->dist); 
	$stmt->bindParam (16 , $this->companyname); 
	$stmt->bindParam (17 , $this->role); 

	$stmt->execute(); 
	$success = 1;}
catch(PDOException $ex){ echo  $ex->getMessage(); } 
return $success;}

 /*----------------------------------------------------------*/

/*
$response = array(); 
$response['SUCCESS'] = 0;

$__use = new users();

$_usermobile = filter_input(INPUT_POST , 'userMobile');
$_username = filter_input(INPUT_POST , 'userName');
$_age = filter_input(INPUT_POST , 'age');
$_useremail = filter_input(INPUT_POST , 'userEmail');
$_userid = filter_input(INPUT_POST , 'userId');
$_addressline1 = filter_input(INPUT_POST , 'AddressLine1');
$_addressline2 = filter_input(INPUT_POST , 'AddressLine2');
$_city = filter_input(INPUT_POST , 'city');
$_state = filter_input(INPUT_POST , 'state');
$_country = filter_input(INPUT_POST , 'country');
$_zip = filter_input(INPUT_POST , 'zip');
$_adharcardid = filter_input(INPUT_POST , 'AdharcardId');
$_adharrefno = filter_input(INPUT_POST , 'AdharRefno');
$_edu = filter_input(INPUT_POST , 'edu');
$_dist = filter_input(INPUT_POST , 'dist');
$_companyname = filter_input(INPUT_POST , 'companyname');
$_role = filter_input(INPUT_POST , 'role');


$__use->setuserMobile($_usermobile);
$__use->setuserName($_username);
$__use->setage($_age);
$__use->setuserEmail($_useremail);
$__use->setuserId($_userid);
$__use->setAddressLine1($_addressline1);
$__use->setAddressLine2($_addressline2);
$__use->setcity($_city);
$__use->setstate($_state);
$__use->setcountry($_country);
$__use->setzip($_zip);
$__use->setAdharcardId($_adharcardid);
$__use->setAdharRefno($_adharrefno);
$__use->setedu($_edu);
$__use->setdist($_dist);
$__use->setcompanyname($_companyname);
$__use->setrole($_role);

if($__use->Insert()==1){$response['SUCCESS'] = 1;}

echo json_encode($response);
exit();

*/


public function Update($id){
$query = "UPDATE users SET userMobile = ? , userName = ? , age = ? , userEmail = ? , userId = ? , AddressLine1 = ? , AddressLine2 = ? , city = ? , state = ? , country = ? , zip = ? , AdharcardId = ? , AdharRefno = ? , edu = ? , dist = ? , companyname = ?, role = ? 
	WHERE userId = ? ";
$success = 0;
try{
	$stmt = $this->conn->prepare($query);
	$stmt->bindParam (1 , $this->userMobile); 
	$stmt->bindParam (2 , $this->userName); 
	$stmt->bindParam (3 , $this->age); 
	$stmt->bindParam (4 , $this->userEmail); 
	$stmt->bindParam (5 , $this->userId); 
	$stmt->bindParam (6 , $this->AddressLine1); 
	$stmt->bindParam (7 , $this->AddressLine2); 
	$stmt->bindParam (8 , $this->city); 
	$stmt->bindParam (9 , $this->state); 
	$stmt->bindParam (10 , $this->country); 
	$stmt->bindParam (11 , $this->zip); 
	$stmt->bindParam (12 , $this->AdharcardId); 
	$stmt->bindParam (13 , $this->AdharRefno); 
	$stmt->bindParam (14 , $this->edu); 
	$stmt->bindParam (15 , $this->dist); 
	$stmt->bindParam (16 , $this->companyname); 
	$stmt->bindParam (17 , $this->role); 
	$stmt->bindParam (18 , $id); 

	$stmt->execute(); 
	$success = 1;}
catch(PDOException $ex){ echo  $ex->getMessage(); } 
return $success;}

public function UpdateCompany($companyname, $id){
$query = "UPDATE users SET companyname = ? WHERE userId = ? ";
$success = 0;
try{
	$stmt = $this->conn->prepare($query);
	$stmt->bindParam (1 , $companyname); 
	$stmt->bindParam (2 , $id); 

	$stmt->execute(); 
	$success = 1;}
catch(PDOException $ex){ echo  $ex->getMessage(); } 
return $success;}

 /*----------------------------------------------------------*/

/*
$response = array(); 
$response['SUCCESS'] = 0;

$__use = new users();

$_usermobile = filter_input(INPUT_POST , 'userMobile');
$_username = filter_input(INPUT_POST , 'userName');
$_age = filter_input(INPUT_POST , 'age');
$_useremail = filter_input(INPUT_POST , 'userEmail');
$_userid = filter_input(INPUT_POST , 'userId');
$_addressline1 = filter_input(INPUT_POST , 'AddressLine1');
$_addressline2 = filter_input(INPUT_POST , 'AddressLine2');
$_city = filter_input(INPUT_POST , 'city');
$_state = filter_input(INPUT_POST , 'state');
$_country = filter_input(INPUT_POST , 'country');
$_zip = filter_input(INPUT_POST , 'zip');
$_adharcardid = filter_input(INPUT_POST , 'AdharcardId');
$_adharrefno = filter_input(INPUT_POST , 'AdharRefno');
$_edu = filter_input(INPUT_POST , 'edu');
$_dist = filter_input(INPUT_POST , 'dist');
$_companyname = filter_input(INPUT_POST , 'companyname');
$_role = filter_input(INPUT_POST , 'role');


$__use->setuserMobile($_usermobile);
$__use->setuserName($_username);
$__use->setage($_age);
$__use->setuserEmail($_useremail);
$__use->setuserId($_userid);
$__use->setAddressLine1($_addressline1);
$__use->setAddressLine2($_addressline2);
$__use->setcity($_city);
$__use->setstate($_state);
$__use->setcountry($_country);
$__use->setzip($_zip);
$__use->setAdharcardId($_adharcardid);
$__use->setAdharRefno($_adharrefno);
$__use->setedu($_edu);
$__use->setdist($_dist);
$__use->setcompanyname($_companyname);
$__use->setrole($_role);

if($__use->Update($_role)==1){$response['SUCCESS'] = 1;}

echo json_encode($response);
exit();
    
   */ 
    
    
    public function loadValue($userId) {
        $Q = "SELECT * FROM users WHERE userId = ? ";
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $userId);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            
            $this->userMobile = $row['userMobile'];
            $this->userName = $row['userName'];
            $this->age = $row['age'];
            $this->userEmail = $row['userEmail'];
            $this->userId = $row['userId'];
            $this->AddressLine1 = $row['AddressLine1'];
            $this->AddressLine2 = $row['AddressLine2'];
            $this->city = $row['city'];
            $this->state = $row['state'];
            $this->country = $row['country'];
            $this->zip = $row['zip'];
            $this->AdharcardId = $row['AdharcardId'];
            $this->AdharRefno = $row['AdharRefno'];
            $this->regn_date = $row['regn_date'];
            $this->edu = $row['edu'];
            $this->dist = $row['dist'];
            $this->admin = $row['admin'];
            $this->level = $row['level'];
            $this->designation = $row['designation'];
            $this->role = $row['role'];
            $this->companyname = $row['companyname'];
            
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }
    
    
    public function loadValueWithSession($userId) {
    if (!isset($_SESSION)) {session_start();}
        $Q = "SELECT * FROM users WHERE userId = ? ";
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $userId);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $this->userMobile = $row['userMobile'];
            $this->userName = $row['userName'];
            $_SESSION['name'] = $row['userName'];
            $this->age = $row['age'];            
            $this->userEmail = $row['userEmail'];
            $this->userId = $row['userId'];
            $this->AddressLine1 = $row['AddressLine1'];
            $_SESSION['AddressLine1']= $row['AddressLine1'];
            $this->AddressLine2 = $row['AddressLine2'];
            $_SESSION['AddressLine2']= $row['AddressLine2'];
            $this->city = $row['city'];
            $_SESSION['city'] = $row['city'];
            $this->state = $row['state'];
            $this->country = $row['country'];
            $this->zip = $row['zip'];
            $this->AdharcardId = $row['AdharcardId'];
            $this->AdharRefno = $row['AdharRefno'];
            $this->regn_date = $row['regn_date'];
            $this->edu = $row['edu'];
            $this->dist = $row['dist'];
            $_SESSION['dist'] = $row['dist'];
            $this->admin = $row['admin'];
            $this->level = $row['level'];
            $this->designation = $row['designation'];
            $_SESSION['designation'] = $row['designation'];
            $this->role = $row['role'];
            $_SESSION['role'] = $row['role'];
            $this->companyname = $row['companyname'];
            $_SESSION['companyname'] = $row['companyname'];
            
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }
    
    
        public function returnCompanyNmae($userId) {
        $Q = "SELECT companyname FROM users WHERE userId = ?";
        $cno = "";
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $userId);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $cno = $row["companyname"];
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $cno;
    }
    
        public function returnAddress($userId) {
        $Q = "SELECT * FROM users WHERE userId = ?";
        $cno = "";
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $userId);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $cno = $row["AddressLine1"]." ".$row["AddressLine2"]." ".$row["city"]." ".$row['state']." ".$row['country']." ".$row['zip'];
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $cno;
    }
    
    

    
        public function returnRole($userId) {
        $Q = "SELECT role FROM users WHERE userId = ?";
        $cno = "";
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $userId);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $cno1 = $row["role"];
            $cno = $cno1 === 'MNF' ? "Manufactory" : "Warehouse"; 
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $cno;
    }
    
        public function returnUserNmae($userId) {
        $Q = "SELECT userName FROM users WHERE userId = ?";
        $cno = "";
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $userId);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $cno = $row["userName"];
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $cno;
    }
    
    
    
    
        public function getTotalCountRow() {
        $Q = "SELECT COUNT(*) AS TOTAL FROM users ";
        $total = 0;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->execute();
            $total = $stmt->fetchColumn();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $total;
    }

    
    public function allFecth() {
        $Q = "SELECT * FROM users";
        $result = null;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $result;
    }
    
    
    public function captchaOTP($length, $chars){
            $chars_length = (strlen($chars) - 1);
            $string = $chars{rand(0, $chars_length)};
            for ($i = 1; $i < $length; $i = strlen($string))
            {
                $r = $chars{rand(0, $chars_length)};
                if ($r != $string{$i - 1}) $string .=  $r;
            }
            return $string;
    }
    
    public function checkPhoneUser($phone) {
        $ok = 0;
        $query = "SELECT userId FROM users WHERE userMobile = ? AND designation = 'USR' ";
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $phone);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row) {
                $ok = 1;
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }

        return $ok;
    }
    
    public function checkPhoneAdmin($phone) {
        $ok = 0;
        $query = "SELECT userId FROM users WHERE userMobile = ? AND designation != 'USR' ";
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $phone);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row) {
                $ok = 1;
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }

        return $ok;
    }
    
    public function returnUserId($phone) {
        $ok = 0;
        $query = "SELECT userId FROM users WHERE userMobile = ? ";
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $phone);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row) {
                $ok = $row["userId"];
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }

        return $ok;
    }

    public function GenerateOtp($mobile) {
        if(session_status()==PHP_SESSION_NONE){session_start();}
        $setotp = mt_rand(100000, 999999);
        $this->loadValue($this->returnUserId($mobile));
        $_SESSION['email'] = $this->getUserEmail();
        $_SESSION['email'] = $this->getUserEmail();
        $_SESSION['setotp'] = $setotp;
        $_SESSION['mobile'] = $mobile;
        $captcha = $this->captchaOTP(6, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz1234567890!@#$%*=_-:?+');
        $_SESSION['captcha'] = $captcha;

        $MSG = "One Time Password (OTP) for Excise Online is " . $setotp . "\n";
        $msg = urlencode($MSG);


        $to = $mobile;
        $fields = "username=excise&password=exercise&groupname=EXCISE&to=" . $to . "&msg=" . $msg;
        $url = "http://103.8.249.55/smsgwam/form_/send_api_excise_get.php?" . $fields;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPGET, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Accept: application/json'));
        $result = curl_exec($ch);
        curl_close($ch);
 
        return $setotp;
    }
    
    public function SendOtp(){
        
        if(session_status()==PHP_SESSION_NONE){session_start();}

        $MSG = "One Time Password (OTP) for Excise Online is " . $_SESSION['setotp'] . "\n";
        $msg = urlencode($MSG);


        $to = $_SESSION['mobile'];
        
        $fields = "username=excise&password=exercise&groupname=EXCISE&to=" . $to . "&msg=" . $msg;
        $url = "http://103.8.249.55/smsgwam/form_/send_api_excise_get.php?" . $fields;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPGET, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Accept: application/json'));
        $result = curl_exec($ch);
        curl_close($ch);        
    }
    
    
        public function returnRoleStr($str) {
        $type = "";
        switch ($str) {
            case "WHS":
                $type = "WholeSaler";
                break;
            case "MNF":
                $type = "Manufacturer";
                break;
            case "RTL":
                $type = "Retailer";
                break;
            case "IOS":
                $type = "Importer(other than Assam)";
                break;
            case "EOS":
                $type = "Exporter(other than Assam)";
                break;
        }
        return $type;
    }
    
        public function returnDesignation($str) {
        $type = "";
        switch ($str) {
            case "DSE":
                $type = "Deputy Superintendent";
                break;
            case "SE":
                $type = "Superintendent";
                break;
            case "CE":
                $type = "Commissioner of Excise";
                break;
            case "DA":
                $type = "Dealing Assistant";
                break;
            case "DC":
                $type = "District Collector";
                break;
            case "SMS":
                $type = "Commissioner & Secretary";
                break;
            case "DCE":
                $type = "Deputy Commisioner";
                break;
            case "JCE":
                $type = "Joint Commissioner";
                break;
            case "ACE":
                $type = "Additional Commissioner";
                break;
            case "MOE":
                $type = "Minister of Excise";
                break;
            case "JSE":
                $type = "Joint Secretary";
                break;
            case "OIC":
                $type = "Officer InCharge";
                break;
            case "PRO":
                $type = "PRO Excise Commissionerate";
                break;
            case "CEE":
                $type = "Chemical Examiner(Excise)";
                break;
            case "ST":
                $type = "Secretary";
                break;
            case "IE":
                $type = "Inspector Of Excise";
                break;
        }
        return $type;
    }







    /* ---------------------------------------------------------- */

    //This javascript function will redirect a another page
    //after the execution of a function.
    public function pageRedirect($page) {
        echo "<script type=\"text/javascript\">	";
        echo "document.location = '" . $page . "' ";
        echo "</script>";
    }

private $userName;
private $userMobile;
private $age;
private $userEmail;
private $userId;
private $AddressLine1;
private $AddressLine2;
private $city;
private $state;
private $country;
private $zip;
private $AdharcardId;
private $AdharRefno;
private $regn_date;
private $edu;
private $dist;
private $admin;
private $level;
private $designation;
private $role;
private $companyname;

function setUserName($userName) { $this->userName = $userName; }
function getUserName() { return $this->userName; }
function setUserMobile($userMobile) { $this->userMobile = $userMobile; }
function getUserMobile() { return $this->userMobile; }
function setAge($age) { $this->age = $age; }
function getAge() { return $this->age; }
function setUserEmail($userEmail) { $this->userEmail = $userEmail; }
function getUserEmail() { return $this->userEmail; }
function setUserId($userId) { $this->userId = $userId; }
function getUserId() { return $this->userId; }
function setAddressLine1($AddressLine1) { $this->AddressLine1 = $AddressLine1; }
function getAddressLine1() { return $this->AddressLine1; }
function setAddressLine2($AddressLine2) { $this->AddressLine2 = $AddressLine2; }
function getAddressLine2() { return $this->AddressLine2; }
function setCity($city) { $this->city = $city; }
function getCity() { return $this->city; }
function setState($state) { $this->state = $state; }
function getState() { return $this->state; }
function setCountry($country) { $this->country = $country; }
function getCountry() { return $this->country; }
function setZip($zip) { $this->zip = $zip; }
function getZip() { return $this->zip; }
function setAdharcardId($AdharcardId) { $this->AdharcardId = $AdharcardId; }
function getAdharcardId() { return $this->AdharcardId; }
function setAdharRefno($AdharRefno) { $this->AdharRefno = $AdharRefno; }
function getAdharRefno() { return $this->AdharRefno; }
function setRegn_date($regn_date) { $this->regn_date = $regn_date; }
function getRegn_date() { return $this->regn_date; }
function setEdu($edu) { $this->edu = $edu; }
function getEdu() { return $this->edu; }
function setDist($dist) { $this->dist = $dist; }
function getDist() { return $this->dist; }
function setAdmin($admin) { $this->admin = $admin; }
function getAdmin() { return $this->admin; }
function setLevel($level) { $this->level = $level; }
function getLevel() { return $this->level; }
function setDesignation($designation) { $this->designation = $designation; }
function getDesignation() { return $this->designation; }
function setRole($role) { $this->role = $role; }
function getRole() { return $this->role; }
function setcompanyname($companyname) { $this->companyname = $companyname; }
function getcompanyname() { return $this->companyname; }

}
