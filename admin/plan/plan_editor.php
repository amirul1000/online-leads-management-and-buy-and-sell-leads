<?php
 include("../template/header.php");
?>
<script language="javascript" src="plan.js"></script>
<script type="text/javascript" src="../../js/jquery.js"></script>
<script	src="../../js/main.js" type="text/javascript"></script>
<link rel="stylesheet" href="../../css/datepicker.css">

<a href="index.php?cmd=list" class="btn green">List</a> <br><br>
  <div class="portlet box blue">
      <div class="portlet-title">
          <div class="caption"><i class="fa fa-globe"></i><b><?=ucwords(str_replace("_"," ","plan"))?></b>
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

								 <form name="frm_plan" method="post"  enctype="multipart/form-data" onSubmit="return checkRequired();">			
								  <div class="portlet-body">
						         <div class="table-responsive">	
					                <table class="table">
										 <tr>
						 <td>Plan Name</td>
						 <td>
						    <input type="text" name="plan_name" id="plan_name"  value="<?=$plan_name?>" class="textbox">
						 </td>
				     </tr><tr>
						 <td>Price</td>
						 <td>
						    <input type="text" name="price" id="price"  value="<?=$price?>" class="textbox">
						 </td>
				     </tr><tr>
						 <td>No Of Leads Allow</td>
						 <td>
						    <input type="text" name="no_of_leads_allow" id="no_of_leads_allow"  value="<?=$no_of_leads_allow?>" class="textbox">
						 </td>
				     </tr><tr>
						 <td valign="top">Description</td>
						 <td>
						    <textarea name="description" id="description"  class="textbox" style="width:200px;height:100px;"><?=$description?></textarea>
						 </td>
				     </tr><tr>
		           		 <td>Status</td>
				   		 <td><?php
	$enumplan = getEnumFieldValues('plan','status');
?>
<select  name="status" id="status"   class="textbox">
<?php
   foreach($enumplan as $key=>$value)
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

