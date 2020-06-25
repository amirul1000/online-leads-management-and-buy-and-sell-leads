<?php
 include("../template/header.php");
?>
<script language="javascript" src="subscription_type.js"></script>
<script type="text/javascript" src="../../js/jquery.js"></script>
<script	src="../../js/main.js" type="text/javascript"></script>
<link rel="stylesheet" href="../../css/datepicker.css">

<a href="index.php?cmd=list" class="btn green">List</a> <br><br>
  <div class="portlet box blue">
      <div class="portlet-title">
          <div class="caption"><i class="fa fa-globe"></i><b><?=ucwords(str_replace("_"," ","subscription_type"))?></b>
          </div>
          <div class="tools">
              <a href="javascript:;" class="reload"></a>
              <a href="javascript:;" class="remove"></a>
          </div>
      </div>
	   <div class="portlet-body">
		         <div class="table-responsive">	
	                <table class="table">
							 <tr>
							  <td>  

								 <form name="frm_subscription_type" method="post"  enctype="multipart/form-data" onSubmit="return checkRequired();">			
								  <div class="portlet-body">
						         <div class="table-responsive">	
					                <table class="table">
										 <tr>
							 <td>Subscription</td>
							 <td><?php
	$info['table']    = "subscription";
	$info['fields']   = array("*");   	   
	$info['where']    =  "1=1 ORDER BY id DESC";
	$ressubscription  =  $db->select($info);
?>
<select  name="subscription_id" id="subscription_id"   class="textbox">
	<option value="">--Select--</option>
	<?php
	   foreach($ressubscription as $key=>$each)
	   { 
	?>
	  <option value="<?=$ressubscription[$key]['id']?>" <?php if($ressubscription[$key]['id']==$subscription_id){ echo "selected"; }?>><?=$ressubscription[$key]['current_period_start']?></option>
	<?php
	 }
	?> 
</select></td>
					  </tr><tr>
							 <td>Users</td>
							 <td><?php
	$info['table']    = "users";
	$info['fields']   = array("*");   	   
	$info['where']    =  "1=1 ORDER BY id DESC";
	$resusers  =  $db->select($info);
?>
<select  name="users_id" id="users_id"   class="textbox">
	<option value="">--Select--</option>
	<?php
	   foreach($resusers as $key=>$each)
	   { 
	?>
	  <option value="<?=$resusers[$key]['id']?>" <?php if($resusers[$key]['id']==$users_id){ echo "selected"; }?>><?=$resusers[$key]['email']?></option>
	<?php
	 }
	?> 
</select></td>
					  </tr><tr>
							 <td>Plan</td>
							 <td><?php
	$info['table']    = "plan";
	$info['fields']   = array("*");   	   
	$info['where']    =  "1=1 ORDER BY id DESC";
	$resplan  =  $db->select($info);
?>
<select  name="plan_id" id="plan_id"   class="textbox">
	<option value="">--Select--</option>
	<?php
	   foreach($resplan as $key=>$each)
	   { 
	?>
	  <option value="<?=$resplan[$key]['id']?>" <?php if($resplan[$key]['id']==$plan_id){ echo "selected"; }?>><?=$resplan[$key]['plan_name']?></option>
	<?php
	 }
	?> 
</select></td>
					  </tr><tr>
						 <td>Plan</td>
						 <td>
						    <input type="text" name="plan" id="plan"  value="<?=$plan?>" class="textbox">
						 </td>
				     </tr><tr>
						 <td>Susbcription</td>
						 <td>
						    <input type="text" name="susbcription" id="susbcription"  value="<?=$susbcription?>" class="textbox">
						 </td>
				     </tr><tr>
						 <td>Customers</td>
						 <td>
						    <input type="text" name="customers" id="customers"  value="<?=$customers?>" class="textbox">
						 </td>
				     </tr><tr>
						 <td>Cards</td>
						 <td>
						    <input type="text" name="cards" id="cards"  value="<?=$cards?>" class="textbox">
						 </td>
				     </tr><tr>
		           		 <td>Status</td>
				   		 <td><?php
	$enumsubscription_type = getEnumFieldValues('subscription_type','status');
?>
<select  name="status" id="status"   class="textbox">
<?php
   foreach($enumsubscription_type as $key=>$value)
   { 
?>
  <option value="<?=$value?>" <?php if($value==$status){ echo "selected"; }?>><?=$value?></option>
 <?php
  }
?> 
</select></td>
				  </tr>
										 <tr> 
											 <td align="right"></td>
											 <td>
												<input type="hidden" name="cmd" value="add">
												<input type="hidden" name="id" value="<?=$Id?>">			
												<input type="submit" name="btn_submit" id="btn_submit" value="submit" class="button_blue">
											 </td>     
										 </tr>
										</table>
										</div>
										</div>
								</form>
							  </td>
							 </tr>
							</table>
			      </div>
			</div>
  </div>			
<?php
 include("../template/footer.php");
?>

