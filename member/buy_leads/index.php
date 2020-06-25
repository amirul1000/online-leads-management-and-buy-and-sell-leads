<?php
        session_start();
       include("../../common/lib.php");
	   include("../../lib/class.db.php");
	   include("../../common/config.php");
	   include("../../lib/lib.php");
	   
	    if(empty($_SESSION['users_id'])) 
	   {
	     Header("Location: ../login/");
	   }
	  
	   $cmd = $_REQUEST['cmd'];
	   switch($cmd)
	   {
		 case "payment_success":
		         $credit = $_POST['inputvalue'];
				 $description = $_POST['stripeToken'].' '.$_POST['stripeTokenType'].' '.$_POST['stripeEmail'];
				 
					 unset($info);
					 unset($data);
				$info['table']    = "transaction";
				$data['users_id']   = $_SESSION['users_id'];
                $data['debit']   = 0;
                $data['credit']   = $credit;
                $data['description']   = $description;
                $data['trans_date']   = date("Y-m-d H:i:s");
				$info['data']     =  $data;
					 $db->insert($info);
					 
				  unset($info);
				  unset($data);	 
				$info['table']    = "leadtransaction";
				$data['users_id']   = $_SESSION['users_id'];
                $data['debit']   = 0;
                $data['credit']   = $_REQUEST['leads'];
                $data['description']   = "Leads on ".$credit;
                $data['trans_date']   = date("Y-m-d H:i:s");
				$info['data']     =  $data;
				  $db->insert($info);
					 
			    Header("Location:index.php?cmd=success");		 
		       break; 
		 case "success":
		       include("success.php");
			   break;		 	    
	     default :    
		       include("buy_leads_list.php");		         
	   }

//Protect same image name
 function getMaxId($db)
 {	  
   $sql    = "SHOW TABLE STATUS LIKE 'plan'";
	$result = $db->execQuery($sql);
	$row    = $db->resultArray();
	return $row[0]['Auto_increment'];	   
 } 	 
?>
