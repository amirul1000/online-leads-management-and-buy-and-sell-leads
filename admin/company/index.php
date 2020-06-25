<?php
       session_start();
       include("../../common/lib.php");
	   include("../../lib/class.db.php");
	   include("../../common/config.php");
	   
	    if(empty($_SESSION['users_id'])) 
	   {
	     Header("Location: ../login/");
	   }
	  
	   $cmd = $_REQUEST['cmd'];
	   switch($cmd)
	   {
	     
		  case 'add': 
				$info['table']    = "company";
				$data['users_id']   = $_REQUEST['users_id'];
                $data['company_name']   = $_REQUEST['company_name'];
                $data['country_id']   = $_REQUEST['country_id'];
                $data['state_id']   = $_REQUEST['state_id'];
                $data['city_id']   = $_REQUEST['city_id'];
                $data['zip_code']   = $_REQUEST['zip_code'];
                $data['address']   = $_REQUEST['address'];
                $data['phone']   = $_REQUEST['phone'];
                $data['email']   = $_REQUEST['email'];
                $data['facebook']   = $_REQUEST['facebook'];
                $data['twitter']   = $_REQUEST['twitter'];
                $data['linkedin']   = $_REQUEST['linkedin'];
                $data['google']   = $_REQUEST['google'];
                $data['domain']   = $_REQUEST['domain'];
                $data['revenue']   = $_REQUEST['revenue'];
                $data['employees']   = $_REQUEST['employees'];
                $data['SIC']   = $_REQUEST['SIC'];
                $data['NAICS']   = $_REQUEST['NAICS'];
                $data['status']   = $_REQUEST['status'];
                
				
				$info['data']     =  $data;
				
				if(empty($_REQUEST['id']))
				{
					 $db->insert($info);
				}
				else
				{
					$Id            = $_REQUEST['id'];
					$info['where'] = "id=".$Id;
					
					$db->update($info);
				}
				
				include("company_list.php");						   
				break;    
		case "edit":      
				$Id               = $_REQUEST['id'];
				if( !empty($Id ))
				{
					$info['table']    = "company";
					$info['fields']   = array("*");   	   
					$info['where']    =  "id=".$Id;
				   
					$res  =  $db->select($info);
				   
					$Id        = $res[0]['id'];  
					$users_id    = $res[0]['users_id'];
					$company_name    = $res[0]['company_name'];
					$country_id    = $res[0]['country_id'];
					$state_id    = $res[0]['state_id'];
					$city_id    = $res[0]['city_id'];
					$zip_code    = $res[0]['zip_code'];
					$address    = $res[0]['address'];
					$phone    = $res[0]['phone'];
					$email    = $res[0]['email'];
					$facebook    = $res[0]['facebook'];
					$twitter    = $res[0]['twitter'];
					$linkedin    = $res[0]['linkedin'];
					$google    = $res[0]['google'];
					$domain    = $res[0]['domain'];
					$revenue    = $res[0]['revenue'];
					$employees    = $res[0]['employees'];
					$SIC    = $res[0]['SIC'];
					$NAICS    = $res[0]['NAICS'];
					$status    = $res[0]['status'];
					
				 }
						   
				include("company_editor.php");						  
				break;
		 case "get_state":
		            $info["table"] = "state";
					$info["fields"] = array("state.*"); 
					$info["where"]   = "1   AND country_id='".$_REQUEST['country_id']."' Order BY name ASC";
					$arr =  $db->select($info);
					echo json_encode($arr);
		        break; 
		 case "get_city":
		            $info["table"] = "city";
					$info["fields"] = array("city.*"); 
					$info["where"]   = "1   AND state_id='".$_REQUEST['state_id']."' Order BY name ASC";
					$arr =  $db->select($info);
					echo json_encode($arr);
		        break;  								   
         case 'delete': 
				$Id               = $_REQUEST['id'];
				
				$info['table']    = "company";
				$info['where']    = "id='$Id'";
				
				if($Id)
				{
					$db->delete($info);
				}
				include("company_list.php");						   
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
				include("company_list.php");
				break; 
        case "search_company":
				$_REQUEST['page'] = 1;  
				$_SESSION["search"]="yes";
				$_SESSION['field_name'] = $_REQUEST['field_name'];
				$_SESSION["field_value"] = $_REQUEST['field_value'];
				include("company_list.php");
				break;  								   
						
	     default :    
		       include("company_list.php");		         
	   }

//Protect same image name
 function getMaxId($db)
 {	  
   $sql    = "SHOW TABLE STATUS LIKE 'company'";
	$result = $db->execQuery($sql);
	$row    = $db->resultArray();
	return $row[0]['Auto_increment'];	   
 } 	 
?>
