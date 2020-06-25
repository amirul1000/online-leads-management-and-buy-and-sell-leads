<?php
 include("../template/header.php");
?>
<script language="javascript" src="leads.js"></script>
<script type="form-control-static/javascript" src="../../js/jquery.js"></script>
<script	src="../../js/main.js" type="form-control-static/javascript"></script>
<link rel="stylesheet" href="../../css/datepicker.css">
<script language="javascript">
	function fillState(value)
	{
	
		objselect = document.getElementById("state_id");
		objselect.options.length = 0;
		$("#spinner2").html('<img src="../../images/indicator.gif" alt="Wait" />');
		$.ajax({  
		  url: 'index.php?cmd=get_state&country_id='+value,
		  success: function(data) {
				  var obj = eval(data);
				  objselect.add(new Option('-- Select State/Provience  --',''), null);
				  for(var i=0;i<obj.length;i++)
				  {
					 objselect.add(new Option(obj[i].name,obj[i].id), null);
				  }
				$("#spinner2").html('');
			  }
			});
	}
	function fillCity(value)
	{
	
		objselect = document.getElementById("city_id");
		objselect.options.length = 0;
		$("#spinner3").html('<img src="../../images/indicator.gif" alt="Wait" />');
		$.ajax({  
		  url: 'index.php?cmd=get_city&state_id='+value,
		  success: function(data) {
				  var obj = eval(data);
				  objselect.add(new Option('-- Select City  --',''), null);
				  for(var i=0;i<obj.length;i++)
				  {
					 objselect.add(new Option(obj[i].name,obj[i].id), null);
				  }
				$("#spinner3").html('');
			  }
			});
	}
</script>
<a href="index.php?cmd=list" class="btn green">List</a> <br><br>
  <div class="portlet box blue">
      <div class="portlet-title">
          <div class="caption"><i class="fa fa-globe"></i><b><?=ucwords(str_replace("_"," ","leads"))?></b>
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

								 <form name="frm_leads" method="post"  enctype="multipart/form-data" onSubmit="return checkRequired();">			
								  <div class="portlet-body">
						         <div class="table-responsive">	
					                <table class="table">
                                         <tr>
                                             <td>Owner Users</td>
                                             <td><?php
                                                $info['table']    = "users";
                                                $info['fields']   = array("*");   	   
                                                $info['where']    =  "1=1 ORDER BY id DESC";
                                                $resusers  =  $db->select($info);
                                            ?>
                                            <select  name="owner_users_id" id="owner_users_id"   class="form-control-static">
                                                <option value="">--Select--</option>
                                                <?php
                                                   foreach($resusers as $key=>$each)
                                                   { 
                                                ?>
                                                  <option value="<?=$resusers[$key]['id']?>" <?php if($resusers[$key]['id']==$owner_users_id){ echo "selected"; }?>><?=$resusers[$key]['first_name']?> <?=$resusers[$key]['last_name']?></option>
                                                <?php
                                                 }
                                                ?> 
                                            </select>
                                          </td>
                                         </tr>
                                         <tr>
                                             <td>First Name</td>
                                             <td>
                                                <input type="form-control-static" name="first_name" id="first_name"  value="<?=$first_name?>" class="form-control-static">
                                             </td>
                                         </tr><tr>
                                             <td>Last Name</td>
                                             <td>
                                                <input type="form-control-static" name="last_name" id="last_name"  value="<?=$last_name?>" class="form-control-static">
                                             </td>
                                         </tr><tr>
                                             <td>Contact</td>
                                             <td>
                                                <input type="form-control-static" name="contact" id="contact"  value="<?=$contact?>" class="form-control-static">
                                             </td>
                                         </tr><tr>
                                             <td>Title</td>
                                             <td>
                                                <input type="form-control-static" name="title" id="title"  value="<?=$title?>" class="form-control-static">
                                             </td>
                                         </tr><tr>
                                             <td>Company</td>
                                             <td>
                                                <input type="form-control-static" name="company" id="company"  value="<?=$company?>" class="form-control-static">
                                             </td>
                                         </tr><tr>
                                             <td>Business Email</td>
                                             <td>
                                                <input type="form-control-static" name="business_email" id="business_email"  value="<?=$business_email?>" class="form-control-static">
                                             </td>
                                         </tr><tr>
                                             <td>Company Web</td>
                                             <td>
                                                <input type="form-control-static" name="company_web" id="company_web"  value="<?=$company_web?>" class="form-control-static">
                                             </td>
                                         </tr><tr>
                                             <td>City</td>
                                             <td>
                                                <input type="form-control-static" name="city" id="city"  value="<?=$city?>" class="form-control-static">
                                             </td>
                                         </tr><tr>
                                             <td>State</td>
                                             <td>
                                                <input type="form-control-static" name="state" id="state"  value="<?=$state?>" class="form-control-static">
                                             </td>
                                         </tr>
										 <tr>
                                             <td>Status</td>
                                             <td><?php
                                                    $enumleads = array('active'=>'active','inactive'=>'inactive');
                                                ?>
                                                <select  name="status" id="status"   class="form-control-static">
                                                <?php
                                                   foreach($enumleads as $key=>$value)
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

