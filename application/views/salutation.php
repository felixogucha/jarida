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
                                <li class="active"> <a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> salutation list </a></li>
                                <li> <a href="#add" data-toggle="tab"><i class="icon-plus"></i> add salutation </a></li>
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
                                          <th aria-label="salutation: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting"><div>salutation</div></th>
                                          <th aria-label="salutation desc.: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting"><div>salutation description</div></th>
                                          <th aria-label="options: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting"><div>options</div></th>
                                        </tr>
                                      </thead>
                                      <tbody aria-relevant="all" aria-live="polite" role="alert">
                                        <?php
                                        if(!is_null($all_salutations))
                                        {
                                          $i = 1;
                                          foreach ($all_salutations as $al_salutations) {
                                            # code...
                                            if($i%2 == 0) {
                                              echo '<tr class="even">';
                                            } else {
                                              echo '<tr class="odd">';
                                            }
                                            echo '<td class="  sorting_1">'.$i.'</td>';
                                            echo '<td class=" ">'.$al_salutations->salutation.'</td>';                                            
                                            echo '<td class=" ">'.$al_salutations->salutation_description.'</td>';                                            
                                            ?><td class=" " align="center"><a href="editSalutation?key=<?php echo $al_salutations->salutation_id?>" rel="tooltip" data-placement="top" data-original-title="edit" class="btn btn-blue"> <i class="icon-wrench"></i> </a> <a href="deleteSalutation?key=<?php echo $al_salutations->salutation_id?>" onclick="return confirm('Are you sure you want to delete this recored?')" rel="tooltip" data-placement="top" data-original-title="delete" class="btn btn-red"> <i class="icon-trash"></i> </a></td>
                                          </tr>
                                          <?php
                                            $i++;
                                          }
                                        }

                                          //endforeach;
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
                                    echo form_open('insert/addSalutation', $attributes);?>
                                      <div style="" class="padded">
                                        <div class="control-group">
                                          <label class="control-label">salutation</label>
                                          <div class="controls">
                                            <input class="validate[required]" name="salutation" type="text" placeholder="salutation" required/>
                                          </div>
                                        </div>

                                        <div class="control-group">
                                          <label class="control-label">salutation description</label>
                                          <div class="controls">
                                            <input class="validate[required]" name="salutation_description" type="text" placeholder="salutation description" required/>
                                          </div>
                                        </div>
                                        
                                      </div>
                                      <div class="form-actions">
                                        <button type="submit" class="btn btn-blue">add salutation</button>
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
                            if ($this->session->userdata('add_sal')) {
                              if ($this->session->userdata('add_sal') == 'y') {
                                $msg = 'success! record has been added.';
                                echo '<script type="text/javascript">alert("'.$msg.'"); </script>';
                              } else {
                                $msg = 'sorry! record could not be added. please try again later';
                                echo '<script type="text/javascript">alert("'.$msg.'"); </script>';
                              }
                              $this->session->unset_userdata('add_sal');
                            } else if ($this->session->userdata('ed_sal')) {
                              if ($this->session->userdata('ed_sal') == 'y') {
                                $msg = 'success! record has been updated.';
                                echo '<script type="text/javascript">alert("'.$msg.'"); </script>';
                              } else {
                                $msg = 'sorry! record could not be updated. please try again later';
                                echo '<script type="text/javascript">alert("'.$msg.'"); </script>';
                              }
                              $this->session->unset_userdata('ed_sal');
                            } else if ($this->session->userdata('del_sal')) {
                              if ($this->session->userdata('del_sal') == 'y') {
                                $msg = 'success! record has been deleted.';
                                echo '<script type="text/javascript">alert("'.$msg.'"); </script>';
                              } else {
                                $msg = 'sorry! record could not be deleted. please try again later';
                                echo '<script type="text/javascript">alert("'.$msg.'"); </script>';
                              }
                              $this->session->unset_userdata('del_sal');
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