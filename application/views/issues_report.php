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
                                <li class="active"> <a href="#details" data-toggle="tab"><i class="icon-align-justify"></i> classes list </a></li>
                              </ul>
                              <!-- CONTROL TABS END -->
                            </div>
                            <div class="box-content padded">
                              <div class="tab-content">
                                <!-- EDITING FORM STARTS -->
                                <!-- EDITING FORM ENDS -->
                                <!-- TABLE LISTING STARTS -->
                                <div class="tab-pane box active" id="details" style="padding: 5px;">
                                  <div style="" class="box-content">
                                    <form style="" method="post" action="http://joyonto.net/projects/hms/index.php?admin/manage_doctor/create/" class="form-horizontal validatable">
                                      <div style="" class="padded">
                                        <div class="control-group">
                                          <label class="control-label">publisher</label>
                                          <div class="controls">
                                            <select name="publisher_id" id="class_name" class="validate[required]">
                                              <option selected="selected" value="">Select publisher</option>
                                              <option value="1">1</option>
                                              <option value="2">2</option>
                                              <option value="3">3</option>
                                              <option value="4">4</option>
                                            </select>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label">magazine</label>
                                          <div class="controls">
                                            <select name="magazine_id" id="class_name" class="validate[required]">
                                              <option selected="selected" value="">Select magazine</option>
                                              <option value="1">1</option>
                                              <option value="2">2</option>
                                              <option value="3">3</option>
                                              <option value="4">4</option>
                                            </select>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label">Date From</label>
                                          <div class="controls">
                                            <input type="text" class="datepicker" name="date_from"  data-date-format="yyyy-mm-dd" value="2014-01-01">
                                          </div>
                                        </div>

                                        <div class="control-group">
                                          <label class="control-label">Date To</label>
                                          <div class="controls">
                                            <input type="text" class="datepicker" name="date_to"  data-date-format="yyyy-mm-dd" value="<?php echo date('Y-m-d');?>">
                                          </div>
                                        </div>
                                      </div>
                                      <div class="form-actions">
                                        <button type="submit" class="btn btn-blue">generate report</button>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                                <!-- TABLE LISTING ENDS -->
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