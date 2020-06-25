<?php
 include("../template/header.php");
?>
<script language="javascript" src="cms_homeslide.js"></script>
<script type="text/javascript" src="../../js/jquery.js"></script>
<script	src="../../js/main.js" type="text/javascript"></script>
<link rel="stylesheet" href="../../css/datepicker.css">

<a href="index.php?cmd=list" class="btn green">List</a> <br><br>
  <div class="portlet box blue">
      <div class="portlet-title">
          <div class="caption"><i class="fa fa-globe"></i><b><?=ucwords(str_replace("_"," ","cms_homeslide"))?></b>
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

								 <form name="frm_cms_homeslide" method="post"  enctype="multipart/form-data" onSubmit="return checkRequired();">			
								  <div class="portlet-body">
						         <div class="table-responsive">	
					                <table class="table">
										 <tr>
                                             <td>File Slide1 472x272</td>
                                             <td><input type="file" name="file_slide1_472_272" id="file_slide1_472_272"  value="<?=$file_slide1_472_272?>" class="form-control">
                                             </td>
                                         </tr><tr>
                                             <td>File Slide1 297x118</td>
                                             <td><input type="file" name="file_slide1_297_118" id="file_slide1_297_118"  value="<?=$file_slide1_297_118?>" class="form-control">
                                             </td>
                                         </tr><tr>
                                             <td>File Slide1 139x149</td>
                                             <td><input type="file" name="file_slide1_139_149" id="file_slide1_139_149"  value="<?=$file_slide1_139_149?>" class="form-control">
                                             </td>
                                         </tr><tr>
                                             <td>Slide1 Text1</td>
                                             <td>
                                                <input type="text" name="slide1_text1" id="slide1_text1"  value="<?=$slide1_text1?>" class="form-control">
                                             </td>
                                         </tr><tr>
                                             <td>Slide1 Text2</td>
                                             <td>
                                                <input type="text" name="slide1_text2" id="slide1_text2"  value="<?=$slide1_text2?>" class="form-control">
                                             </td>
                                         </tr><tr>
                                             <td>File Slide2 395x319 1</td>
                                             <td><input type="file" name="file_slide2_395_319_1" id="file_slide2_395_319_1"  value="<?=$file_slide2_395_319_1?>" class="form-control">
                                             </td>
                                         </tr><tr>
                                             <td>File Slide2 361x129</td>
                                             <td><input type="file" name="file_slide2_361_129" id="file_slide2_361_129"  value="<?=$file_slide2_361_129?>" class="form-control">
                                             </td>
                                         </tr><tr>
                                             <td>File Slide2 395x319 2</td>
                                             <td><input type="file" name="file_slide2_395_319_2" id="file_slide2_395_319_2"  value="<?=$file_slide2_395_319_2?>" class="form-control">
                                             </td>
                                         </tr><tr>
                                             <td>Slide2 Text1</td>
                                             <td>
                                                <input type="text" name="slide2_text1" id="slide2_text1"  value="<?=$slide2_text1?>" class="form-control">
                                             </td>
                                         </tr><tr>
                                             <td>Slide2 Text2</td>
                                             <td>
                                                <input type="text" name="slide2_text2" id="slide2_text2"  value="<?=$slide2_text2?>" class="form-control">
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

