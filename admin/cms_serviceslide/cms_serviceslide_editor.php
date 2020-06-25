<?php
 include("../template/header.php");
?>
<script language="javascript" src="cms_serviceslide.js"></script>
<script type="text/javascript" src="../../js/jquery.js"></script>
<script	src="../../js/main.js" type="text/javascript"></script>
<link rel="stylesheet" href="../../css/datepicker.css">

<a href="index.php?cmd=list" class="btn green">List</a> <br><br>
  <div class="portlet box blue">
      <div class="portlet-title">
          <div class="caption"><i class="fa fa-globe"></i><b><?=ucwords(str_replace("_"," ","cms_serviceslide"))?></b>
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

								 <form name="frm_cms_serviceslide" method="post"  enctype="multipart/form-data" onSubmit="return checkRequired();">			
								  <div class="portlet-body">
						         <div class="table-responsive">	
					                <table class="table">
										 <tr>
						 <td>Text1</td>
						 <td>
						    <input type="text" name="text1" id="text1"  value="<?=$text1?>" class="form-control">
						 </td>
				     </tr><tr>
						 <td>Text2</td>
						 <td>
						    <input type="text" name="text2" id="text2"  value="<?=$text2?>" class="form-control">
						 </td>
				     </tr><tr>
						 <td>Text3</td>
						 <td>
						    <input type="text" name="text3" id="text3"  value="<?=$text3?>" class="form-control">
						 </td>
				     </tr><tr>
						 <td>Link</td>
						 <td>
						    <input type="text" name="link" id="link"  value="<?=$link?>" class="form-control">
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
<?php
 include("../template/footer.php");
?>

