<div class="sidebar-background">
	<div class="primary-sidebar-background">
	</div>
</div>
<div class="primary-sidebar">
	<!-- Main nav -->
    <br>
    <div style="text-align:center;">
    	<a href="#">
        	<img src="<?php echo base_url();?>images/logo2.png" style="max-height:100px; max-width:100px;">
        </a>
    </div>
   	<br>
	<ul class="nav nav-collapse collapse nav-collapse-primary">
    
    <?php $this->load->view('includes/menus');?>
		
	</ul>
	
</div>    

</div>

<div class="main-content">
                <div class="container-fluid">
            <?php $this->load->view('includes/flash_message');?>
        </div>
        
        <!-- FLASH MESSAGES -->
        
        
                        <div class="container-fluid padded">
                          <div class="box">
                            <div class="box-header">
                              <!-- CONTROL TABS START -->
                              <ul class="nav nav-tabs nav-tabs-left">
                                <li class="active"> <a href="#backup" data-toggle="tab"><i class="icon-align-justify"></i> data backup </a></li>
                                <li> <a href="#restore" data-toggle="tab"><i class="icon-plus"></i> data restore </a></li>
                              </ul>
                              <!-- CONTROL TABS END -->
                            </div>
                            <div class="box-content padded">
                              <div class="tab-content">
                                <!-- EDITING FORM STARTS -->
                                <!-- EDITING FORM ENDS -->
                                <!-- TABLE LISTING STARTS -->
                                <div class="tab-pane box active span7" id="backup">
                                  <center>
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-normal">
                                        <tbody>
                                          <tr>
                                            <td>magazines</td>
                                            <td align="center">
                                              <a href="tableBackup?key=magazines" class="btn btn-default" rel="tooltip" data-original-title="download backup"><i class="icon-download-alt"></i>
                                                  </a>
                                              <a href="#" class="btn btn-default" rel="tooltip" data-original-title="delete data" onclick="return confirm(&#39;delete confirm?&#39;);"><i class="icon-trash"></i>
                                                  </a><div class="tooltip fade top in" style="top: 126px; left: 435.5px; display: block;"><div class="tooltip-arrow"></div><div class="tooltip-inner">delete data</div></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>issues</td>
                                            <td align="center">
                                              <a href="tableBackup?key=issues" class="btn btn-default" rel="tooltip" data-original-title="download backup"><i class="icon-download-alt"></i>
                                                  </a>
                                              <a href="#" class="btn btn-default" rel="tooltip" data-original-title="delete data" onclick="return confirm(&#39;delete confirm?&#39;);"><i class="icon-trash"></i>
                                                  </a><div class="tooltip fade top in" style="top: 126px; left: 435.5px; display: block;"><div class="tooltip-arrow"></div><div class="tooltip-inner">delete data</div></div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>all tables</td>
                                            <td align="center">
                                              <a href="databaseBackup" class="btn btn-default" rel="tooltip" data-original-title="download backup"><i class="icon-download-alt"></i>
                                                  </a>
                                              <a href="#" class="btn btn-default" rel="tooltip" data-original-title="delete data" onclick="return confirm(&#39;delete confirm?&#39;);"><i class="icon-trash"></i>
                                                  </a><div class="tooltip fade top in" style="top: 126px; left: 435.5px; display: block;"><div class="tooltip-arrow"></div><div class="tooltip-inner">delete data</div></div>
                                            </td>
                                        </tr>
                                    </tbody>
                                    </table>
                                  </center>
                                </div>
                                <!-- TABLE LISTING ENDS -->
                                <!-- CREATION FORM STARTS -->
                                <div class="tab-pane box  span6" id="restore">
                                  <form method="post" enctype="multipart/form-data" action="#">
                                      <div class="uploader"><input name="userfile" type="file"><span class="filename" style="-webkit-user-select: none;">No file selected</span><span class="action" style="-webkit-user-select: none;">+</span></div>
                                      <br><br>
                                      <center><input type="submit" class="btn btn-blue" value="restore data from backup"></center>
                                      <br>
                                  </form>
                                </div>
                                <!-- CREATION FORM ENDS -->
                              </div>
                            </div>
                          </div>
                        </div>
                        <?php $this->load->view('includes/footer');?>
        </div>
    

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-46775677-1', 'joyonto.net');
  ga('send', 'pageview');

</script><div class="ex-tooltip"></div><div id="galleryOverlay" style="display: none;"><div id="gallerySlider"></div><a id="prevArrow"><i class="icon-angle-left icon-4x"></i></a><a id="nextArrow"><i class="icon-angle-right icon-4x"></i></a></div></body></html>