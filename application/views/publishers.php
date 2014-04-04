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
                                <li class="active"> <a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> publishers list </a></li>
                                <li> <a href="#add" data-toggle="tab"><i class="icon-plus"></i> add publisher </a></li>
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
                                          <th aria-label="status: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting"><div>status</div></th>
                                          <th aria-label="publisher_name: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting"><div>publisher name</div></th>
                                          <th aria-label="publisher_email: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting"><div>publisher email</div></th>
                                          <th aria-label="publisher_phone: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting"><div>publisher phone</div></th>
                                          <th aria-label="contact_person: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting"><div>contact person</div></th>
                                          <th aria-label="contact phone: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting"><div>person phone</div></th>
                                          <th aria-label="options: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting"><div>options</div></th>
                                        </tr>
                                      </thead>
                                      <tbody aria-relevant="all" aria-live="polite" role="alert">
                                        <?php
                                        if(!is_null($all_publishers))
                                        {
                                          $i = 1;
                                          foreach ($all_publishers as $al_publishers) {
                                            # code...
                                            if($i%2 == 0) {
                                              echo '<tr class="even">';
                                            } else {
                                              echo '<tr class="odd">';
                                            }
                                            echo '<td class="  sorting_1">'.$i.'</td>';
                                            echo '<td class=" ">'.$al_publishers->status.'</td>';
                                            echo '<td class=" ">'.$al_publishers->publisher_name.'</td>';
                                            echo '<td class=" ">'.$al_publishers->publisher_email.'</td>';
                                            echo '<td class=" ">'.$al_publishers->publisher_phone.'</td>';
                                            echo '<td class=" ">'.$al_publishers->surname.' '.$al_publishers->other_names.'</td>';
                                            echo '<td class=" ">'.$al_publishers->person_phone.'</td>';
                                            ?><td class=" " align="center"><a href="editPublisher?key=<?php echo $al_publishers->publisher_Id?>" rel="tooltip" data-placement="top" data-original-title="edit" class="btn btn-blue"> <i class="icon-wrench"></i> </a> <a href="deletePublisher?key=<?php echo $al_publishers->publisher_Id;?>" onclick="return confirm('Are you sure you want to delete this recored?')" rel="tooltip" data-placement="top" data-original-title="delete" class="btn btn-red"> <i class="icon-trash"></i> </a></td>
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
                                    echo form_open('insert/addPublisher', $attributes);

                                    $contactPersons = array();
                                    if (isset($all_publishers)) {
                                      foreach ($all_publishers as $pbz) {
                                      $contactPersons[] = $pbz->contact_person;
                                    }
                                    }
                                    ?>
                                      <div style="" class="padded">
                                        
                                        <fieldset>
                                          <legend>publisher information</legend>
                                          <div class="control-group">
                                              <label class="control-label">publisher name</label>
                                              <div class="controls">
                                                <input class="validate[required]" name="publisher_name" type="text" placeholder="publisher name" required/>
                                              </div>
                                            </div>
                                            <div class="control-group">
                                              <label class="control-label">email address</label>
                                              <div class="controls">
                                                <input class="validate[required]" name="publisher_email" type="text" placeholder="email address" required/>
                                              </div>
                                            </div>

                                            <div class="control-group">
                                              <label class="control-label">phone number</label>
                                              <div class="controls">
                                                <input class="validate[required]" name="publisher_phone" type="text" placeholder="phone number" required/>
                                              </div>
                                            </div>

                                            <div class="control-group">
                                              <label class="control-label">p.o. box</label>
                                              <div class="controls">
                                                <input class="validate[required]" name="box_number" type="text" placeholder="box number" required/>
                                                <input class="validate[required]" name="postal_code" type="text" placeholder="postal code" required/>
                                              </div>
                                            </div>

                                            <div class="control-group">
                                              <label class="control-label">physical location</label>
                                              <div class="controls">
                                                <input class="validate[required]" name="physical_location" type="text" placeholder="physical_location" required/>
                                              </div>
                                            </div>

                                        </fieldset>
                                        <fieldset>
                                          <legend>contact person</legend>

                                          <div class="control-group">
                                              <label class="control-label">contact person</label>
                                              <div class="controls">
                                                <select name="contact_person" class="validate[required]">
                                                      <option selected="selected" value="">Select contact person</option>
                                                      <?php
                                                        if(!is_null($all_users))
                                                        {
                                                          foreach ($all_users as $al_users) {
                                                            if (!in_array($al_users->user_id, $contactPersons)) {
                                                              echo '<option value="'.$al_users->user_id.'">'.$al_users->surname.' '.$al_users->other_names.'</option>';
                                                            }
                                                            
                                                            ?>
                                                            <?php
                                                          }
                                                        }

                                                          //endforeach;
                                                        ?>
                                              </select>
                                              </div>
                                            </div>
                                        </fieldset>
                                        <fieldset>
                                          <legend>official use</legend>
                                          <div class="control-group">
                                              <label class="control-label">status</label>
                                              <div class="controls">
                                                <select name="status_id" class="validate[required]">
                                                      <option selected="selected" value="">Select status</option>
                                                      <?php
                                                        if(!is_null($all_status))
                                                        {
                                                          $i = 1;
                                                          foreach ($all_status as $al_status) {
                                                            echo '<option value="'.$al_status->status_id.'">'.$al_status->status.'</option>';
                                                            ?>
                                                            <?php
                                                          }
                                                        }

                                                          //endforeach;
                                                        ?>
                                              </select>
                                              </div>
                                            </div>
                                        </fieldset>
                                        
                                      </div>
                                      <div class="form-actions">
                                        <button type="submit" class="btn btn-blue">add publisher</button>
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
                            if ($this->session->userdata('add_publisher')) {
                              if ($this->session->userdata('add_publisher') == 'y') {
                                $msg = 'success! publisher has been added.';
                                echo '<script type="text/javascript">alert("'.$msg.'"); </script>';
                              } else {
                                $msg = 'sorry! publisher could not be added. please try again later';
                                echo '<script type="text/javascript">alert("'.$msg.'"); </script>';
                              }
                              $this->session->unset_userdata('add_publisher');
                            } 
                            if ($this->session->userdata('ed_publisher')) {
                              if ($this->session->userdata('ed_publisher') == 'y') {
                                $msg = 'success! publisher has been edited.';
                                echo '<script type="text/javascript">alert("'.$msg.'"); </script>';
                              } else {
                                $msg = 'sorry! publisher could not be edited. please try again later';
                                echo '<script type="text/javascript">alert("'.$msg.'"); </script>';
                              }
                              $this->session->unset_userdata('ed_publisher');
                            }

                            if ($this->session->userdata('del_publisher')) {
                              if ($this->session->userdata('del_publisher') == 'y') {
                                $msg = 'success! publisher has been deleted.';
                                echo '<script type="text/javascript">alert("'.$msg.'"); </script>';
                              } else {
                                $msg = 'sorry! publisher could not be deleted. please try again later';
                                echo '<script type="text/javascript">alert("'.$msg.'"); </script>';
                              }
                              $this->session->unset_userdata('del_publisher');
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