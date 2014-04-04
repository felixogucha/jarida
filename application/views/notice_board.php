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
                                <li class="active"> <a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> notices list </a></li>
                                <li> <a href="#add" data-toggle="tab"><i class="icon-plus"></i> add a notice </a></li>
                              </ul>
                              <!-- CONTROL TABS END -->
                            </div>
                            <div class="box-content padded">
                              <div class="tab-content">
                                <!-- EDITING FORM STARTS -->
                                <!-- EDITING FORM ENDS -->
                                <!-- TABLE LISTING STARTS -->
                                <div class="tab-pane box active" id="list">
                                  <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline" role="grid">
                                    <table aria-describedby="DataTables_Table_0_info" id="DataTables_Table_0" class="dTable responsive dataTable" border="0" cellpadding="0" cellspacing="0">
                                      <thead>
                                        <tr role="row">
                                          <th aria-label="#: activate to sort column descending" aria-sort="ascending" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting_asc"><div>#</div></th>
                                          <th aria-label="notice_title: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting"><div>notice title</div></th>
                                          <th aria-label="notice_details: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting"><div>notice details</div></th>
                                          <th aria-label="date_due: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting"><div>date due</div></th>
                                          <th aria-label="time_due: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting"><div>time due</div></th>
                                          <th aria-label="options: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting"><div>options</div></th>
                                        </tr>
                                      </thead>
                                      <tbody aria-relevant="all" aria-live="polite" role="alert">
                                        <?php
                                        if(!is_null($all_notices)) {
                                          $i = 1;
                                          foreach ($all_notices as $al_notices) {
                                            # code...
                                            if ($al_notices->due_date > date('Y-m-d')) {
                                              if($i%2 == 0) {
                                                  echo '<tr class="even">';
                                                } else {
                                                  echo '<tr class="odd">';
                                                  
                                                }
                                                echo '<td class="  sorting_1">'.$i.'</td>';
                                                echo '<td class=" ">'.$al_notices->notice_title.'</td>';
                                                echo '<td class=" ">'.$al_notices->notice_details.'</td>';
                                                echo '<td class=" ">'.$al_notices->due_date.'</td>';
                                                echo '<td class=" ">'.$al_notices->due_time.'</td>';
                                                ?><td class=" " align="center"><a href="editNotice?key=<?php echo $al_notices->notice_id;?>" rel="tooltip" data-placement="top" data-original-title="edit" class="btn btn-blue"> <i class="icon-wrench"></i> </a> <a href="deleteNotice?key=<?php echo $al_notices->notice_id;?>" onclick="return confirm('Are you sure you want to delete this recored?')" rel="tooltip" data-placement="top" data-original-title="delete" class="btn btn-red"> <i class="icon-trash"></i> </a></td>
                                              </tr>
                                              <?php
                                              $i++;
                                            }
                                          }
                                          //endforeach;
                                        }
                                        ?>
                                      </tbody>
                                      </table>
                                  </div>
                                </div>
                                <!-- TABLE LISTING ENDS -->
                                <!-- CREATION FORM STARTS -->
                                <div class="tab-pane box" id="add" style="padding: 5px;">
                                  <div style="" class="box-content">
                                    <?php 
                                    $attributes = array('class' => 'form-horizontal validatable');
                                    echo form_open('insert/notice', $attributes);?>
                                      <div style="" class="padded">
                                        <div class="control-group">
                                          <label class="control-label">notice title</label>
                                          <div class="controls">
                                            <input class="validate[required]" name="notice_title" type="text" placeholder="notice title" required/>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label">notice details</label>
                                          <div class="controls">
                                            <textarea class="textarea" name="notice_details" placeholder="more details about the notice"  required></textarea>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label">date due</label>
                                          <div class="controls">
                                            <input type="text" class="datepicker" name="date_due"  data-date-format="yyyy-mm-dd" value="<?php echo date('Y-m-d');?>">
                                          </div>
                                        </div>

                                        <div class="control-group">
                                          <label class="control-label">time due</label>
                                          <div class="controls">
                                            <input type="hidden" name="added_by" value="<?php echo $this->session->userdata('user_id');?>">
                                            <input class="validate[required]" name="time_due" type="time" placeholder="time due" required value="12:00"/>
                                          </div>
                                        </div>
                                        
                                      </div>
                                      <div class="form-actions">
                                        <button type="submit" class="btn btn-blue">create notice</button>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                                <!-- CREATION FORM ENDS -->
                              </div>
                            </div>
                          </div>
                        </div>
                        <?php $this->load->view('includes/footer');?>
                        <?php
                            if ($this->session->userdata('add_notice')) {
                              if ($this->session->userdata('add_notice') == 'y') {
                                $msg = 'success! your notice has been added.';
                                echo '<script type="text/javascript">alert("'.$msg.'"); </script>';
                              } else {
                                $msg = 'sorry! could not add notice. please try again later';
                                echo '<script type="text/javascript">alert("'.$msg.'"); </script>';
                              }
                              $this->session->unset_userdata('add_notice');
                            }

                            if ($this->session->userdata('edit_notice')) {
                              if ($this->session->userdata('edit_notice') == 'y') {
                                $msg = 'success! your notice has been edited.';
                                echo '<script type="text/javascript">alert("'.$msg.'"); </script>';
                              } else {
                                $msg = 'sorry! could not add edited. please try again later';
                                echo '<script type="text/javascript">alert("'.$msg.'"); </script>';
                              }
                              $this->session->unset_userdata('edit_notice');
                            }

                            if ($this->session->userdata('del_notice')) {
                              if ($this->session->userdata('del_notice') == 'y') {
                                $msg = 'success! your notice has been deleted.';
                                echo '<script type="text/javascript">alert("'.$msg.'"); </script>';
                              } else {
                                $msg = 'sorry! could not add deleted. please try again later';
                                echo '<script type="text/javascript">alert("'.$msg.'"); </script>';
                              }
                              $this->session->unset_userdata('del_notice');
                            }
                              ?>
        </div>
    

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-46775677-1', 'joyonto.net');
  ga('send', 'pageview');

</script><div class="ex-tooltip"></div><div id="galleryOverlay" style="display: none;"><div id="gallerySlider"></div><a id="prevArrow"><i class="icon-angle-left icon-4x"></i></a><a id="nextArrow"><i class="icon-angle-right icon-4x"></i></a></div></body></html>