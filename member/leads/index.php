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
		 case "export_csv_data":
								   
				set_time_limit(10);
				
				require_once "../../php_writeexcel/class.writeexcel_workbook.inc.php";
				require_once "../../php_writeexcel/class.writeexcel_worksheet.inc.php";
				
				$fname = tempnam("/tmp", "simple.xls");
				$workbook = &new writeexcel_workbook($fname);
				$worksheet = &$workbook->addworksheet();
				
				
				//////////////////query/////////////////////
				$whrstr .= "AND  owner_users_id='".$_SESSION['users_id']."'";	  
				
				  unset($info);
				  unset($data);
				$info["table"] = "myleads";
				$info["fields"] = array("myleads.*"); 
				$info["where"]   = "1   $whrstr ORDER BY id DESC";
				$arr =  $db->select($info);
				//////////////////////////////////////
				
				
				# The general syntax is write($row, $column, $token). Note that row and
				# column are zero indexed
				#
				
				# Write some text
				$k = 0;
				$worksheet->write($k, 0,  'First name');          
				$worksheet->write($k, 1,  'Last name');    
				$worksheet->write($k, 2,  'Contact');    
				$worksheet->write($k, 3,  'Title');   
				$worksheet->write($k, 4,  'Company');          
				$worksheet->write($k, 5,  'Business Email');    
				$worksheet->write($k, 6,  'Company web');    
				$worksheet->write($k, 7,  'City');   
				$worksheet->write($k, 8,  'State'); 
				
				# Write some numbers
				for($i=0;$i<count($arr);$i++)
					{
						$first_name    = $arr[$i]['first_name'];
						$last_name    = $arr[$i]['last_name'];
						$contact    = $arr[$i]['contact'];
						$title    = $arr[$i]['title'];
						$company    = $arr[$i]['company'];
						$business_email    = $arr[$i]['business_email'];
						$company_web    = $arr[$i]['company_web'];
						$city    = $arr[$i]['city'];
						$state    = $arr[$i]['state'];
						$created_at    = $arr[$i]['created_at'];
						$updated_at    = $arr[$i]['updated_at'];
						$status    = $arr[$i]['status'];
						
						$k= $i+1;
						$worksheet->write($k, 0,  $first_name);          
						$worksheet->write($k, 1,  $last_name);    
						$worksheet->write($k, 2,  $contact);    
						$worksheet->write($k, 3,  $title);   
						$worksheet->write($k, 4,  $company);          
						$worksheet->write($k, 5,  $business_email);    
						$worksheet->write($k, 6,  $company_web);    
						$worksheet->write($k, 7,  $city);   
						$worksheet->write($k, 8,  $state);
						
					}
				
				$workbook->close();
				
				header("Content-Type: application/x-msexcel; name=\"example-simple.csv\"");
				header("Content-Disposition: inline; filename=\"example-simple.csv\"");
				$fh=fopen($fname, "rb");
				fpassthru($fh);
				unlink($fname);
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
				include("leads_list.php");
				break; 
        case "search_leads":
				$_REQUEST['page'] = 1;  
				$_SESSION["search"]="yes";
				$_SESSION['field_name'] = $_REQUEST['field_name'];
				$_SESSION["field_value"] = $_REQUEST['field_value'];
				include("leads_list.php");
				break;  								   
						
	     default :    
		       include("leads_list.php");		         
	   }

//Protect same image name
 function getMaxId($db)
 {	  
   $sql    = "SHOW TABLE STATUS LIKE 'leads'";
	$result = $db->execQuery($sql);
	$row    = $db->resultArray();
	return $row[0]['Auto_increment'];	   
 } 	 
?>