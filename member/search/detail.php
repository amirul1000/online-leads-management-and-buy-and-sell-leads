<?php
	$info["table"] = "leads";
	$info["fields"] = array("leads.*"); 
	$info["where"]   = "1  AND id='".$_REQUEST['id']."'";
	$arr =  $db->select($info);
	
	////////////////////////////////////
	  unset($info);
	  unset($data);
	$info["table"] = "myleads";
	$info["fields"] = array("myleads.*"); 
	$info["where"]   = "1  AND business_email='".$arr[0]['business_email']."'";
	$arrmylead =  $db->select($info);
	if(count($arrmylead)==0)
	{
		 unset($info);
		 unset($data);
		$info['table']    = "myleads";
		$data['owner_users_id']   = $_SESSION['users_id'];
		$data['first_name']   = $arr[0]['first_name'];
        $data['last_name']   = $arr[0]['last_name'];
		$data['contact']   = $arr[0]['contact'];
		$data['title']   = $arr[0]['title'];
		$data['company']   = $arr[0]['company'];
		$data['business_email']   = $arr[0]['business_email'];
		$data['company_web']   = $arr[0]['company_web'];
		$data['city']   = $arr[0]['city'];
		$data['state']   = $arr[0]['state'];
		$data['created_at']   = date("Y-m-d H:i:s");
		$info['data']     =  $data;
			 $db->insert($info);
	}
	///////////////////////////////////////////
	
	
?>
<table  border="1" width="100%">
   <tr>
        <td>First name:<?=$arr[0]['first_name']?></td>
        <td>Last name:<?=$arr[0]['last_name']?></td>
        <td>Contact:<?=$arr[0]['contact']?></td>
        <td>Title:<?=$arr[0]['title']?></td>
        <td>Company:<?=$arr[0]['company']?></td>
        
   </tr>
   <tr>     
        <td>Business email:<?=$arr[0]['business_email']?></td>
        <td>Company web:<?=$arr[0]['company_web']?></td>
        <td>City:<?=$arr[0]['city']?></td>
        <td>State:<?=$arr[0]['state']?></td>        
        <td></td>
   </tr>     
</table>   