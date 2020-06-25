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
		  
		 case "detail":
					 $whrstr = " AND  users_id='".$_SESSION['users_id']."'";
					 unset($info);		
					 unset($data);		  
					$info["table"] = "transaction";
					$info["fields"] = array("sum(transaction.credit)-sum(transaction.debit) as balance"); 
					$info["where"]   = "1   $whrstr";
					$arr =  $db->select($info);
					$balance = $arr[0]['balance'];
					
					
					 $whrstr = " AND  users_id='".$_SESSION['users_id']."'";
					 unset($info);		
					 unset($data);		
					$info["table"] = "leadtransaction";
					$info["fields"] = array("sum(leadtransaction.credit)-sum(leadtransaction.debit) as leads_remaining"); 
					$info["where"]   = "1   $whrstr";
					$arr =  $db->select($info);
					$leads_remaining =  $arr[0]['leads_remaining'];
					
					if($leads_remaining>0)
					{
						
						   unset($info);
						   unset($data);
						$info['table']    = "leadtransaction";
						$data['users_id']   = $_SESSION['users_id'];
						$data['debit']   = 1;
						$data['credit']   = 0;
						$data['description']   = "expends";
						$data['trans_date']   = date("Y-m-d H:i:s");
						$info['data']     =  $data;
							 $db->insert($info);
						
						
						   unset($info);
						   unset($data);
						$info['table']    = "transaction";
						$data['users_id']   = $_SESSION['users_id'];
						$data['debit']   = round($balance/$leads_remaining,4);
						$data['credit']   = 0;
						$data['description']   = "expends";
						$data['trans_date']   = date("Y-m-d H:i:s");
						$info['data']     =  $data;
							 $db->insert($info);
							
						
						
						ob_start();
						include(dirname(__FILE__).'/detail.php');
						$html = ob_get_clean();
						echo $html;
					}
					else
					{
						echo "<font color=\"red\">Unsufficient balance.</font> <a href=\"../buy_leads/?cmd=list\" class=\"btn blue\">Buy Leads</a>";
					}
		        break;
         case "list" :    	 
			  if(!empty($_REQUEST['page'])&&$_SESSION["search"]=="yes")
				{
				  $_SESSION["search"]="yes";
				}
				else
				{
				   $_SESSION["search"]="no";
				   
					unset($_SESSION['first_name1']); 
					unset($_SESSION['last_name1']); 
					unset($_SESSION['contact']); 
					unset($_SESSION['title']);
					unset($_SESSION['company']);   
					unset($_SESSION['business_email']);  
					unset($_SESSION['company_web']); 
					unset($_SESSION['city']);  
					unset($_SESSION['state']); 
				}
				include("search_list.php");
				break; 
        case "search":
				$_REQUEST['page'] = 1;  
				$_SESSION["search"]="yes";
				$_SESSION['first_name']   = $_REQUEST['first_name1'];
                $_SESSION['last_name']   = $_REQUEST['last_name1'];
                $_SESSION['contact']   = $_REQUEST['contact'];
                $_SESSION['title']   = $_REQUEST['title'];
                $_SESSION['company']   = $_REQUEST['company'];
                $_SESSION['business_email']   = $_REQUEST['business_email'];
                $_SESSION['company_web']   = $_REQUEST['company_web'];
                $_SESSION['city']   = $_REQUEST['city'];
                $_SESSION['state']   = $_REQUEST['state'];
				
				include("search_list.php");
				break;  								   
						
	     default :    
		       include("search_list.php");		         
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