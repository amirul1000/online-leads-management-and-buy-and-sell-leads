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
	  
	   if(empty($_SESSION["rowsPerPage2"]))
	   {
		   $_SESSION["rowsPerPage2"] = 100;
	   }
	  
	   $cmd = $_REQUEST['cmd'];
	   switch($cmd)
	   {
	     
		  case 'add': 
				$info['table']    = "leads";
				$data['owner_users_id']   = $_SESSION['users_id'];
				$data['first_name']   = $_REQUEST['first_name'];
                $data['last_name']   = $_REQUEST['last_name'];
                $data['contact']   = $_REQUEST['contact'];
                $data['title']   = $_REQUEST['title'];
                $data['company']   = $_REQUEST['company'];
                $data['business_email']   = $_REQUEST['business_email'];
                $data['company_web']   = $_REQUEST['company_web'];
                $data['city']   = $_REQUEST['city'];
                $data['state']   = $_REQUEST['state'];
                $data['status']   = 'active';
				if(empty($_REQUEST['id']))
				{
                	$data['created_at']   = date("Y-m-d H:i:s");
				}
				else
				{
                	$data['updated_at']   = date("Y-m-d H:i:s");
				}
				
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
				
				include("leads_list.php");						   
				break;    
		case "edit":      
				$Id               = $_REQUEST['id'];
				if( !empty($Id ))
				{
					$info['table']    = "leads";
					$info['fields']   = array("*");   	   
					$info['where']    =  "id=".$Id;
				   
					$res  =  $db->select($info);
				   
					$Id        = $res[0]['id']; 
					$owner_users_id    = $res[0]['owner_users_id'];
					$first_name    = $res[0]['first_name'];
					$last_name    = $res[0]['last_name'];
					$contact    = $res[0]['contact'];
					$title    = $res[0]['title'];
					$company    = $res[0]['company'];
					$business_email    = $res[0]['business_email'];
					$company_web    = $res[0]['company_web'];
					$city    = $res[0]['city'];
					$state    = $res[0]['state'];
					$created_at    = $res[0]['created_at'];
					$updated_at    = $res[0]['updated_at'];
					$status    = $res[0]['status'];
					
				 }
						   
				include("leads_editor.php");						  
				break;
						   
         case 'delete': 
				$Id               = $_REQUEST['id'];
				
				$info['table']    = "leads";
				$info['where']    = "id='$Id'";
				
				if($Id)
				{
					$db->delete($info);
				}
				include("leads_list.php");						   
				break; 
		case 'import_csv_data': 
		        set_time_limit(0);
				include("../../library/CSVReader.php");
				$obj = new CSVReader();
				
				$filePath = '../../csv_files/'.$_FILES['csv_file']['name'];
				if(strlen($_FILES['csv_file']['name'])>0 && $_FILES['csv_file']['size']>0)
				{
					/*
					if(!file_exists("../csv_files"))
					{ 
					   mkdir("../csv_files",0755);	
					}*/
					move_uploaded_file($_FILES['csv_file']['tmp_name'],$filePath);
				}
			   
				$csvarr = $obj->parse_file($filePath);
				//chmod($filePath,755);
				//unlink( $filePath);
				foreach($csvarr as $key=>$eachrecord)
				{	 
				    unset($extracted_data);
					foreach($eachrecord as $field=>$value)
					{   
						$extracted_data[] = $value;
						
					}
					
					//check exits link
					
					  if(strlen($extracted_data[5])>0 && check_duplicate($db,$extracted_data[5])==false)
					   {
							 unset($info);
							 unset($data);
							$info['table']    = "leads";
							$data['owner_users_id']   = $_SESSION['users_id'];
							$data['first_name']   = addslashes($extracted_data[0]);
							$data['last_name']   = addslashes($extracted_data[1]);
							$data['contact']   = addslashes($extracted_data[2]);
							$data['title']   = addslashes($extracted_data[3]);
							$data['company']   = addslashes($extracted_data[4]);
							$data['business_email']   = addslashes($extracted_data[5]);
							$data['company_web']   = addslashes($extracted_data[6]);
							$data['city']   = addslashes($extracted_data[7]);
							$data['state']   = addslashes($extracted_data[8]);
							$info['data']      =  $data;	
							  $db->insert($info);
				
						}
				} 		
				include("leads_list.php");
				break;	
		case "export_csv_data":
								   
				set_time_limit(10);
				
				require_once "../../php_writeexcel/class.writeexcel_workbook.inc.php";
				require_once "../../php_writeexcel/class.writeexcel_worksheet.inc.php";
				
				$fname = tempnam("/tmp", "simple.xls");
				$workbook = &new writeexcel_workbook($fname);
				$worksheet = &$workbook->addworksheet();
				
				
				//////////////////query/////////////////////
				if($_REQUEST['company']=='')
				{
					$whrstr = " AND 1";
				}
				else if(isset($_REQUEST['company']))
				{
					$whrstr = "AND company='".$_REQUEST['company']."'";
				}
				
				  unset($info);
				  unset($data);
				$info["table"] = "leads";
				$info["fields"] = array("leads.*"); 
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
		case "find_duplicate":
		          include("duplicate_view.php");
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
		 case "download_all":
				foreach($_REQUEST['chk'] as $key=>$value)
				{
					$arr_id[] = $value;
				}
				 
		        set_time_limit(10);
				
				require_once "../../php_writeexcel/class.writeexcel_workbook.inc.php";
				require_once "../../php_writeexcel/class.writeexcel_worksheet.inc.php";
				
				$fname = tempnam("/tmp", "simple.xls");
				$workbook = &new writeexcel_workbook($fname);
				$worksheet = &$workbook->addworksheet();
				
				
				//////////////////query/////////////////////
				if($_REQUEST['company_id']=='')
				{
					$whrstr = " AND 1";
				}
				else if(isset($_REQUEST['company_id']))
				{
					$whrstr = "AND company_id='".$_REQUEST['company_id']."'";
				}
				
				  unset($info);
				  unset($data);
				$info["table"] = "leads";
				$info["fields"] = array("leads.*"); 
				$info["where"]   = "1  AND id in (".implode(",", $arr_id).") ORDER BY id DESC";
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
		 case "delete_all":
		        foreach($_REQUEST['chk'] as $key=>$value)
				  {
					$Id               = $value;
				
					$info['table']    = "leads";
					$info['where']    = "id='$Id'";
					
					if($Id)
					{
						$db->delete($info);
					}
					$_SESSION['message'] = "Data has been deleted successfully";  
				  }
		        Header("Location: index.php");					   
				break;
		 case "show_perpage":
		            $_SESSION["rowsPerPage2"] = $_REQUEST['rowsPerPage'];
					if($_SESSION["rowsPerPage2"]==10)
					{
					  unset($_SESSION["rowsPerPage2"]); 	
					}
		            Header("Location: index.php");	   
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