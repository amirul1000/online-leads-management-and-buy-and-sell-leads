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
	     
		  case 'add': 
				$info['table']    = "support";
				$data['users_id']   = $_SESSION['users_id'];
                $data['email']   = $_REQUEST['email'];
                $data['subject']   = $_REQUEST['subject'];
                $data['message']   = $_REQUEST['message'];
				$info['data']     =  $data;
				 $db->insert($info);
				
				$subject = $_REQUEST['subject'];
				
				$body = $_REQUEST['message'];
				//send email
				$headers  = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				$headers .= 'From: CorrectLeads <'.$_REQUEST["email"].'>' . "\r\n";
					
				mail('tandrew2489@gmail.com', $subject, $body, $headers);
				$message ="An email has been sent to your E-mail address";	
				
				include("support_list.php");						   
				break;    
		case 'edit': 
				include("support_editor.php");						   
				break; 
						   
         case 'delete': 
				$Id               = $_REQUEST['id'];
				
				$info['table']    = "support";
				$info['where']    = "id='$Id' AND users_id='".$_SESSION['users_id']."'";
				
				if($Id)
				{
					$db->delete($info);
				}
				include("support_list.php");						   
				break; 
						   
         case "list" :    	 
			  if(!empty($_REQUEST['page'])&&$_SESSION["search"]=="yes")
				{
				  $_SESSION["search"]="yes";
				}
				else
				{
				   $_SESSION["search"]="no";
					unset($_SESSION["search"]);
					unset($_SESSION['field_name']);
					unset($_SESSION["field_value"]); 
				}
				include("support_list.php");
				break; 
        case "search_support":
				$_REQUEST['page'] = 1;  
				$_SESSION["search"]="yes";
				$_SESSION['field_name'] = $_REQUEST['field_name'];
				$_SESSION["field_value"] = $_REQUEST['field_value'];
				include("support_list.php");
				break;  								   
						
	     default :    
		       include("support_list.php");		         
	   }

//Protect same image name
 function getMaxId($db)
 {	  
   $sql    = "SHOW TABLE STATUS LIKE 'support'";
	$result = $db->execQuery($sql);
	$row    = $db->resultArray();
	return $row[0]['Auto_increment'];	   
 } 	 
?>
