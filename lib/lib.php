<?php
function get_company_id($db,$company)
{
	if(empty($company)) return 0;
	
	  unset($info);
	  unset($data);
	$info["table"] = "company";
	$info["fields"] = array("company.*"); 
	$info["where"]   = "1 AND company_name='".$company."'";
	$arr =  $db->select($info);
	
	if(count($arr)>0)
	{
		return $arr[0]['id'];
	}
	else
	{
		 unset($info);
	     unset($data);
		$info['table']    = "company";
		$data['company_name']   = $company;
		$info['data']     =  $data;
		$db->insert($info);
		return $db->lastInsert($result);
	}
}
function  get_country_id($db,$country)
{
	if(empty($country)) return 0;
	
	 unset($info);
	 unset($data);
	$info["table"] = "country";
	$info["fields"] = array("country.*"); 
	$info["where"]   = "1 AND country='".$country."'";
	$arr =  $db->select($info);
	
	if(count($arr)>0)
	{
		return $arr[0]['id'];
	}
	else
	{
		 unset($info);
	     unset($data);
		$info['table']    = "country";
		$data['country']   = $country;
		$info['data']     =  $data;
		$db->insert($info);
		return $db->lastInsert($result);
	}
}
function  get_state_id($db,$state)
{
	if(empty($state)) return 0;
	
	 unset($info);
	 unset($data);
	$info["table"] = "state";
	$info["fields"] = array("state.*"); 
	$info["where"]   = "1 AND name='".$state."'";
	$arr =  $db->select($info);
	
	if(count($arr)>0)
	{
		return $arr[0]['id'];
	}
	else
	{
		 unset($info);
	     unset($data);
		$info['table']    = "state";
		$data['name']   = $state;
		$info['data']     =  $data;
		$db->insert($info);
		return $db->lastInsert($result);
	}
}
function  get_city_id($db,$city)
{
	if(empty($city)) return 0;
	
	 unset($info);
	 unset($data);
	$info["table"] = "city";
	$info["fields"] = array("city.*"); 
	$info["where"]   = "1 AND name='".$city."'";
	$arr =  $db->select($info);
	
	if(count($arr)>0)
	{
		return $arr[0]['id'];
	}
	else
	{
		 unset($info);
	     unset($data);
		$info['table']    = "city";
		$data['name']   = $city;
		$info['data']     =  $data;
		$db->insert($info);
		return $db->lastInsert($result);
	}
}


function company($db,$id)
{
		unset($info2);        
	$info2['table']    = "company";	
	$info2['fields']   = array("company_name");	   	   
	$info2['where']    =  "1 AND id='".$id."' LIMIT 0,1";
	$res2  =  $db->select($info2);
	$company_name = $res2[0]['company_name'];	
	return $company_name;
}
function country($db,$id)
{
	unset($info2);        
	$info2['table']    = "country";	
	$info2['fields']   = array("country");	   	   
	$info2['where']    =  "1 AND id='".$id."' LIMIT 0,1";
	$res2  =  $db->select($info2);
	$country = $res2[0]['country'];
	return $country;	
}
function state($db,$id)
{
	unset($info2);        
	$info2['table']    = "state";	
	$info2['fields']   = array("name");	   	   
	$info2['where']    =  "1 AND id='".$id."' LIMIT 0,1";
	$res2  =  $db->select($info2);
	$state = $res2[0]['name'];	
	return $state;
}
function city($db,$id)
{
	unset($info2);        
	$info2['table']    = "city";	
	$info2['fields']   = array("name");	   	   
	$info2['where']    =  "1 AND id='".$id."' LIMIT 0,1";
	$res2  =  $db->select($info2);
	$city = $res2[0]['name'];
	
	return $city;	
}

function check_duplicate($db,$email)
{
	$info["table"] = "leads";
	$info["fields"] = array("leads.*"); 
	$info["where"]   = "1  AND email='".$email."'";
	$arr =  $db->select($info);	
	if(count($arr)>0)
	{
		return true;
	}
	return false;
}
/////////////////////////Payment/////////////////////////////
	

/////////////////////////////////////////////////////////////
?>