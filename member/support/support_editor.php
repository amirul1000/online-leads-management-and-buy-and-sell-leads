<?php
 include("../template/header.php");
?>
<div id="authorize-container" class="desktop-md center-block">
<!--<div class="row-fluid">
<div class="span6">-->


<a href="index.php?cmd=list" class="btn green">List</a> <br><br>
  <div class="portlet box blue">
      <div class="portlet-title">
          <div class="caption"><i class="fa fa-globe"></i><b><?=ucwords(str_replace("_"," ","support"))?></b>
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

								 <form name="frm_support" method="post"  enctype="multipart/form-data" onSubmit="return checkRequired();">			
								  <div class="portlet-body">
						         <div class="table-responsive">	
					                <table class="table">
                                         <tr>
                                     <td>Email</td>
                                     <td>
                                        <input type="text" name="email" id="email"  value="<?=$email?>" class="form-control" required>
                                     </td>
                                 </tr><tr>
                                     <td>Subject</td>
                                     <td>
                                        <input type="text" name="subject" id="subject"  value="<?=$subject?>" class="form-control" required>
                                     </td>
                                 </tr><tr>
                                     <td valign="top">Message</td>
                                     <td>
                                        <textarea name="message" id="message"  class="form-control" style="width:600px;height:200px;"><?=$message?></textarea>
                                     </td>
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
include("../template/footer.php");
?>
