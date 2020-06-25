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
				$info['table']    = "cms_homeslide";
				     
				if(strlen($_FILES['file_slide1_472_272']['name'])>0 && $_FILES['file_slide1_472_272']['size']>0)
				{
					
					if(!file_exists("../../cms_homeslide_images"))
					{ 
					   mkdir("../../cms_homeslide_images",0755);	
					}
					if(empty($_REQUEST['id']))
					{
					  $file=getMaxId($db)."_".str_replace(" ","_",strtolower(trim($_FILES['file_slide1_472_272']['name'])));
					}
					else
					{
					  $file=trim($_REQUEST['id'])."_".str_replace(" ","_",strtolower(trim($_FILES['file_slide1_472_272']['name'])));
					}
					$filePath="../../cms_homeslide_images/".$file;
					move_uploaded_file($_FILES['file_slide1_472_272']['tmp_name'],$filePath);
					$data['file_slide1_472_272']="cms_homeslide_images/".trim($file);
				}
                     
				if(strlen($_FILES['file_slide1_297_118']['name'])>0 && $_FILES['file_slide1_297_118']['size']>0)
				{
					
					if(!file_exists("../../cms_homeslide_images"))
					{ 
					   mkdir("../../cms_homeslide_images",0755);	
					}
					if(empty($_REQUEST['id']))
					{
					  $file=getMaxId($db)."_".str_replace(" ","_",strtolower(trim($_FILES['file_slide1_297_118']['name'])));
					}
					else
					{
					  $file=trim($_REQUEST['id'])."_".str_replace(" ","_",strtolower(trim($_FILES['file_slide1_297_118']['name'])));
					}
					$filePath="../../cms_homeslide_images/".$file;
					move_uploaded_file($_FILES['file_slide1_297_118']['tmp_name'],$filePath);
					$data['file_slide1_297_118']="cms_homeslide_images/".trim($file);
				}
                     
				if(strlen($_FILES['file_slide1_139_149']['name'])>0 && $_FILES['file_slide1_139_149']['size']>0)
				{
					
					if(!file_exists("../../cms_homeslide_images"))
					{ 
					   mkdir("../../cms_homeslide_images",0755);	
					}
					if(empty($_REQUEST['id']))
					{
					  $file=getMaxId($db)."_".str_replace(" ","_",strtolower(trim($_FILES['file_slide1_139_149']['name'])));
					}
					else
					{
					  $file=trim($_REQUEST['id'])."_".str_replace(" ","_",strtolower(trim($_FILES['file_slide1_139_149']['name'])));
					}
					$filePath="../../cms_homeslide_images/".$file;
					move_uploaded_file($_FILES['file_slide1_139_149']['tmp_name'],$filePath);
					$data['file_slide1_139_149']="cms_homeslide_images/".trim($file);
				}
                $data['slide1_text1']   = $_REQUEST['slide1_text1'];
                $data['slide1_text2']   = $_REQUEST['slide1_text2'];
                     
				if(strlen($_FILES['file_slide2_395_319_1']['name'])>0 && $_FILES['file_slide2_395_319_1']['size']>0)
				{
					
					if(!file_exists("../../cms_homeslide_images"))
					{ 
					   mkdir("../../cms_homeslide_images",0755);	
					}
					if(empty($_REQUEST['id']))
					{
					  $file=getMaxId($db)."_".str_replace(" ","_",strtolower(trim($_FILES['file_slide2_395_319_1']['name'])));
					}
					else
					{
					  $file=trim($_REQUEST['id'])."_".str_replace(" ","_",strtolower(trim($_FILES['file_slide2_395_319_1']['name'])));
					}
					$filePath="../../cms_homeslide_images/".$file;
					move_uploaded_file($_FILES['file_slide2_395_319_1']['tmp_name'],$filePath);
					$data['file_slide2_395_319_1']="cms_homeslide_images/".trim($file);
				}
                     
				if(strlen($_FILES['file_slide2_361_129']['name'])>0 && $_FILES['file_slide2_361_129']['size']>0)
				{
					
					if(!file_exists("../../cms_homeslide_images"))
					{ 
					   mkdir("../../cms_homeslide_images",0755);	
					}
					if(empty($_REQUEST['id']))
					{
					  $file=getMaxId($db)."_".str_replace(" ","_",strtolower(trim($_FILES['file_slide2_361_129']['name'])));
					}
					else
					{
					  $file=trim($_REQUEST['id'])."_".str_replace(" ","_",strtolower(trim($_FILES['file_slide2_361_129']['name'])));
					}
					$filePath="../../cms_homeslide_images/".$file;
					move_uploaded_file($_FILES['file_slide2_361_129']['tmp_name'],$filePath);
					$data['file_slide2_361_129']="cms_homeslide_images/".trim($file);
				}
                     
				if(strlen($_FILES['file_slide2_395_319_2']['name'])>0 && $_FILES['file_slide2_395_319_2']['size']>0)
				{
					
					if(!file_exists("../../cms_homeslide_images"))
					{ 
					   mkdir("../../cms_homeslide_images",0755);	
					}
					if(empty($_REQUEST['id']))
					{
					  $file=getMaxId($db)."_".str_replace(" ","_",strtolower(trim($_FILES['file_slide2_395_319_2']['name'])));
					}
					else
					{
					  $file=trim($_REQUEST['id'])."_".str_replace(" ","_",strtolower(trim($_FILES['file_slide2_395_319_2']['name'])));
					}
					$filePath="../../cms_homeslide_images/".$file;
					move_uploaded_file($_FILES['file_slide2_395_319_2']['tmp_name'],$filePath);
					$data['file_slide2_395_319_2']="cms_homeslide_images/".trim($file);
				}
                $data['slide2_text1']   = $_REQUEST['slide2_text1'];
                $data['slide2_text2']   = $_REQUEST['slide2_text2'];
                
				
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
				
				include("cms_homeslide_list.php");						   
				break;    
		case "edit":      
				$Id               = $_REQUEST['id'];
				if( !empty($Id ))
				{
					$info['table']    = "cms_homeslide";
					$info['fields']   = array("*");   	   
					$info['where']    =  "id=".$Id;
				   
					$res  =  $db->select($info);
				   
					$Id        = $res[0]['id'];  
					$file_slide1_472_272    = $res[0]['file_slide1_472_272'];
					$file_slide1_297_118    = $res[0]['file_slide1_297_118'];
					$file_slide1_139_149    = $res[0]['file_slide1_139_149'];
					$slide1_text1    = $res[0]['slide1_text1'];
					$slide1_text2    = $res[0]['slide1_text2'];
					$file_slide2_395_319_1    = $res[0]['file_slide2_395_319_1'];
					$file_slide2_361_129    = $res[0]['file_slide2_361_129'];
					$file_slide2_395_319_2    = $res[0]['file_slide2_395_319_2'];
					$slide2_text1    = $res[0]['slide2_text1'];
					$slide2_text2    = $res[0]['slide2_text2'];
					
				 }
						   
				include("cms_homeslide_editor.php");						  
				break;
						   
         case 'delete': 
				$Id               = $_REQUEST['id'];
				
				$info['table']    = "cms_homeslide";
				$info['where']    = "id='$Id'";
				
				if($Id)
				{
					$db->delete($info);
				}
				include("cms_homeslide_list.php");						   
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
				include("cms_homeslide_list.php");
				break; 
        case "search_cms_homeslide":
				$_REQUEST['page'] = 1;  
				$_SESSION["search"]="yes";
				$_SESSION['field_name'] = $_REQUEST['field_name'];
				$_SESSION["field_value"] = $_REQUEST['field_value'];
				include("cms_homeslide_list.php");
				break;  								   
						
	     default :    
		       include("cms_homeslide_list.php");		         
	   }

//Protect same image name
 function getMaxId($db)
 {	  
   $sql    = "SHOW TABLE STATUS LIKE 'cms_homeslide'";
	$result = $db->execQuery($sql);
	$row    = $db->resultArray();
	return $row[0]['Auto_increment'];	   
 } 	 
?>
