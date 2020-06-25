<?php
 include("../template/header.php");
 include("../template/header_extra.php");
?>
<script language="javascript" src="company.js"></script>
<script type="text/javascript" src="../../js/jquery.js"></script>
<script	src="../../js/main.js" type="text/javascript"></script>
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
<div id="authorize-container" class="desktop-md center-block">
<!--<div class="row-fluid">
<div class="span6">-->

<a href="index.php?cmd=list" class="btn green">List</a> <br><br>
  <div class="portlet box blue">
      <div class="portlet-title">
          <div class="caption"><i class="fa fa-globe"></i><b><?=ucwords(str_replace("_"," ","company"))?></b>
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

								 <form name="frm_company" method="post"  enctype="multipart/form-data" onSubmit="return checkRequired();">			
								  <div class="portlet-body">
						         <div class="table-responsive">	
					                <table class="table">
                                          <tr>
                                             <td>Company Name</td>
                                             <td>
                                                <input type="text" name="company_name" id="company_name"  value="<?=$company_name?>" class="form-control">
                                             </td>
                                         </tr><tr>
                                                 <td>Country</td>
                                                 <td><?php
                                                    $info['table']    = "country";
                                                    $info['fields']   = array("*");   	   
                                                    $info['where']    =  "1=1 ORDER BY country ASC";
                                                    $rescountry  =  $db->select($info);
                                                ?>
                                                <select  name="country_id" id="country_id"  onchange="fillState(this.value);"  class="form-control-static"  onblur="codeAddress();">
                                                    <option value="">--Select--</option>
                                                    <?php
                                                       foreach($rescountry as $key=>$each)
                                                       { 
                                                    ?>
                                                      <option value="<?=$rescountry[$key]['id']?>" <?php if($rescountry[$key]['id']==$country_id){ echo "selected"; }?>><?=$rescountry[$key]['country']?></option>
                                                    <?php
                                                     }
                                                    ?> 
                                                </select>
                                                 <input type="hidden" name="country_txt" id="country_txt"  value="<?=$country_txt?>" class="form-control-static">
                                               </td>
                                          </tr>
                                          <tr>
                                                 <td>State/Provience</td>
                                                 <td><?php
                                                    $info['table']    = "state";
                                                    $info['fields']   = array("*");   	   
                                                    $info['where']    =  "1=1 ORDER BY id DESC";
                                                    $resstate  =  $db->select($info);
                                                ?>
                                                <select  name="state_id" id="state_id"  onchange="fillCity(this.value);"  class="form-control-static"  onblur="codeAddress();">
                                                    <option value="">--Select--</option>
                                                    <?php
                                                       foreach($resstate as $key=>$each)
                                                       { 
                                                    ?>
                                                      <option value="<?=$resstate[$key]['id']?>" <?php if($resstate[$key]['id']==$state_id){ echo "selected"; }?>><?=$resstate[$key]['name']?></option>
                                                    <?php
                                                     }
                                                    ?> 
                                                </select>
                                                <div id="spinner2"></div>
                                                <input type="hidden" name="state_txt" id="state_txt"  value="<?=$state_txt?>" class="form-control-static">
                                                </td>
                                          </tr>                                                  
                                          <tr>
                                                 <td>City</td>
                                                 <td>
                                                 <?php
                                                    /*$info['table']    = "city";
                                                    $info['fields']   = array("*");   	   
                                                    $info['where']    =  "1=1 ORDER BY id DESC";
                                                    $rescity  =  $db->select($info);*/
                                                ?>
                                                <select  name="city_id" id="city_id"   class="form-control-static"  onblur="codeAddress();">
                                                    <option value="">--Select--</option>
                                                    <?php
                                                      if($Id)
                                                      {
                                                    ?>
                                                      <option value="<?=$city_id?>" <?php if($city_id==$city_id){ echo "selected"; }?>><?=$city_txt?></option>
                                                    <?php
                                                      }
                                                    ?> 
                                                </select>
                                                <div id="spinner3"></div>
                                                <input type="hidden" name="city_txt" id="city_txt"  value="<?=$city_txt?>" class="form-control-static">
                                                </td>
                                          </tr>
                                          <tr>
                                                 <td>Zip Code</td>
                                                 <td>
                                                    <input type="text" name="zip_code" id="zip_code"  value="<?=$zip_code?>" class="form-control">
                                                 </td>
                                             </tr><tr>
                                                 <td valign="top">Address</td>
                                                 <td>
                                                    <textarea name="address" id="address"  class="form-control" style="width:200px;height:100px;"><?=$address?></textarea>
                                                 </td>
                                             </tr><tr>
                                                 <td>Phone</td>
                                                 <td>
                                                    <input type="text" name="phone" id="phone"  value="<?=$phone?>" class="form-control">
                                                 </td>
                                             </tr><tr>
                                                 <td>Email</td>
                                                 <td>
                                                    <input type="text" name="email" id="email"  value="<?=$email?>" class="form-control">
                                                 </td>
                                             </tr><tr>
                                                 <td>Facebook</td>
                                                 <td>
                                                    <input type="text" name="facebook" id="facebook"  value="<?=$facebook?>" class="form-control">
                                                 </td>
                                             </tr><tr>
                                                 <td>Twitter</td>
                                                 <td>
                                                    <input type="text" name="twitter" id="twitter"  value="<?=$twitter?>" class="form-control">
                                                 </td>
                                             </tr><tr>
                                                 <td>Linkedin</td>
                                                 <td>
                                                    <input type="text" name="linkedin" id="linkedin"  value="<?=$linkedin?>" class="form-control">
                                                 </td>
                                             </tr><tr>
                                                 <td>Google</td>
                                                 <td>
                                                    <input type="text" name="google" id="google"  value="<?=$google?>" class="form-control">
                                                 </td>
                                             </tr><tr>
                                                 <td>Domain</td>
                                                 <td>
                                                    <input type="text" name="domain" id="domain"  value="<?=$domain?>" class="form-control">
                                                 </td>
                                             </tr><tr>
                                                 <td>Revenue</td>
                                                 <td>
                                                    <input type="text" name="revenue" id="revenue"  value="<?=$revenue?>" class="form-control">
                                                 </td>
                                             </tr><tr>
                                                 <td>Employees</td>
                                                 <td>
                                                    <input type="text" name="employees" id="employees"  value="<?=$employees?>" class="form-control">
                                                 </td>
                                             </tr><tr>
                                                 <td>SIC</td>
                                                 <td>
                                                    <input type="text" name="SIC" id="SIC"  value="<?=$SIC?>" class="form-control">
                                                 </td>
                                             </tr><tr>
                                                 <td>NAICS</td>
                                                 <td>
                                                    <input type="text" name="NAICS" id="NAICS"  value="<?=$NAICS?>" class="form-control">
                                                 </td>
                                             </tr><tr>
                                                 <td>Status</td>
                                                 <td><?php
                            $enumcompany = getEnumFieldValues('company','status');
                        ?>
                        <select  name="status" id="status"   class="form-control">
                        <?php
                           foreach($enumcompany as $key=>$value)
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
<!--</div>
</div>-->
</div>    		
<?php
	include("../template/footer_extra.php");
	include("../template/footer.php");
?>
