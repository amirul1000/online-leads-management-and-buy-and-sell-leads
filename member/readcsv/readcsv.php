<?php
       session_start();
       include("../../common/lib.php");
	   include("../../lib/class.db.php");
	   include("../../common/config.php");
	   
	  /*  if(empty($_SESSION['users_id'])) 
	   {
	     Header("Location: ../login/login.php");
	   }*/
	  
	   $cmd = $_REQUEST['cmd'];
	   switch($cmd)
	   {
	     

		 case 'import_csv_data': 
		        set_time_limit(0);
				include("../library/CSVReader.php");
				$obj = new CSVReader();
				
				$filePath = '../csv_files/'.$_FILES['csv_file']['name'];
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
					
					  if(strlen($extracted_data[0])>0)
					   {
							 unset($info);
							 unset($data);
							$info['table']    = "sensor";
							$data['start_latitude']   = $extracted_data[0];
							$data['start_longitude']   = $extracted_data[1];
							$data['end_latitude']   = $extracted_data[2];
							$data['end_longitude']   = $extracted_data[3];
							$info['data']     =  $data;							
							  $db->insert($info);
				
						}
				} 				
				include("readcsv_list.php");
				break;
		   case 'delete': 
				$Id               = $_REQUEST['id'];
				
				$info['table']    = "sensor";
				$info['where']    = "id='$Id'";
				
				if($Id)
				{
					$db->delete($info);
				}
				include("readcsv_list.php");						   
				break;
	     case "read":
		           $link = "https://maps.googleapis.com/maps/api/geocode/json?latlng=".$_REQUEST['start_latitude'].",".$_REQUEST['end_longitude']."&key=AIzaSyA60w9Bb3l7_xjXzOu4IDFnaMpLTc1n3II";
		           $response =   file_get_contents($link); 
				   
				   $arr = json_decode($response);
				   
				   for($i=0;$i<count($arr->results);$i++)
				   {
					  echo $arr->results[$i]->formatted_address."<br>";
				   }
				   
				   debug($arr);
				   break;
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
				include("readcsv_list.php");
				break; 
        case "search_client_contact_info":
				$_REQUEST['page'] = 1;  
				$_SESSION["search"]="yes";
				$_SESSION['field_name'] = $_REQUEST['field_name'];
				$_SESSION["field_value"] = $_REQUEST['field_value'];
				include("readcsv_list.php");
				break;  								   
						
	     default :    
		       include("readcsv_list.php");		         
	   }

//Protect same image name
 function getMaxId($db)
 {
	   $info['table']    = "readcsv";
	   $info['fields']   = array("max(id) as maxid");   	   
	   $info['where']    =  "1=1";
	  
	   $resmax  =  $db->select($info);
	   if(count($resmax)>0)
	   {
		 $max = $resmax[0]['maxid']+1;
	   }
	   else
	   {
		$max=0;
	   }	  
	   return $max;
 } 	 
?>
