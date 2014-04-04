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
                                <li class="active"> <a href="#edit" data-toggle="tab"><i class="icon-edit"></i> edit tag </a></li>
                                <li> <a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> magazine tags </a></li>
                                <li> <a href="#add" data-toggle="tab"><i class="icon-plus"></i> new tag </a></li>
                              </ul>
                              <!-- CONTROL TABS END -->
                            </div>
                            <div class="box-content padded">
                              <div class="tab-content">
                                <!-- EDITING FORM STARTS -->
                                <div class="tab-pane box active" id="edit" style="padding: 5px;">
                                  <div style="" class="box-content"><!--  -->
                                    <?php
                                    if (!is_null($all_tags)) {
                                      $attributes = array('class' => 'form-horizontal validatable');
                                        echo form_open('update/updateTag', $attributes);
                                        foreach ($all_tags as $al_tags) {
                                          if ($al_tags->tag_id == $this->input->get('key')) {
                                            ?>
                                            <div style="" class="padded">
                                              <div class="control-group">
                                                <label class="control-label">magazine tag</label>
                                                <div class="controls">
                                                  <input class="validate[required]" name="tag_id" type="hidden" value="<?php echo $al_tags->tag_id;?>" required/>
                                                  <input class="validate[required]" name="tag_name" type="text" value="<?php echo $al_tags->tag_name;?>"placeholder="specify tag name" required/>
                                                  <!-- <input class="validate[required]" id="added_on" name="added_on" type="hidden" value="<?php echo date('Y-m-d');?>" placeholder="added on" required/> -->
                                                </div>
                                              </div>
                                            <?php
                                          }
                                        }
                                    }
                                        ?>
                                        
                                      </div>
                                      <div class="form-actions">
                                        <button type="submit" class="btn btn-blue">update tag</button>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                                <!-- EDITING FORM ENDS -->
                                <!-- TABLE LISTING STARTS -->
                                <div class="tab-pane box" id="list" style="padding: 5px">
                                  <div class="box-content padded">
                                    <div class="tab-pane box">
                                      <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline" role="grid">
                                        <table aria-describedby="DataTables_Table_0_info" id="DataTables_Table_0" class="dTable responsive dataTable" border="0" cellpadding="0" cellspacing="0">
                                          <thead>
                                            <tr role="row">
                                              <th aria-label="#: activate to sort column descending" aria-sort="ascending" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting_asc"><div>#</div></th>
                                              <th aria-label="tag: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting"><div>tag name</div></th>
                                              <th aria-label="options: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting"><div>options</div></th>
                                            </tr>
                                          </thead>
                                          <tbody aria-relevant="all" aria-live="polite" role="alert">
                                            <?php
                                        if(!is_null($all_tags)) {
                                          $i = 1;
                                          foreach ($all_tags as $al_tags) {
                                              if($i%2 == 0) {
                                                  echo '<tr class="even">';
                                                } else {
                                                  echo '<tr class="odd">';
                                                  
                                                }
                                                echo '<td class="  sorting_1">'.$i.'</td>';
                                                echo '<td class=" ">'.$al_tags->tag_name.'</td>';
                                                ?><td class=" " align="center"><a href="editMagTag?key=<?php echo $al_tags->tag_id;?>" rel="tooltip" data-placement="top" data-original-title="edit" class="btn btn-blue"> <i class="icon-wrench"></i> </a> <a href="deleteMagTag?key=<?php echo $al_tags->tag_id;?>" onclick="return confirm('Are you sure you want to delete this record?')" rel="tooltip" data-placement="top" data-original-title="delete" class="btn btn-red"> <i class="icon-trash"></i> </a></td>
                                              </tr>
                                              <?php
                                              $i++;
                                          }
                                          //endforeach;
                                        }
                                        ?>
                                          </tbody>
                                          </table>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <!-- TABLE LISTING ENDS -->
                                <!-- CREATION FORM STARTS -->
                                <div class="tab-pane box" id="add" style="padding: 5px;">
                                  <div style="" class="box-content">
                                    <?php 
                                        $attributes = array('class' => 'form-horizontal validatable');
                                        echo form_open('insert/addMagazineTag', $attributes);?>
                                      <div style="" class="padded">
                                        <div class="control-group">
                                          <label class="control-label">magazine tag</label>
                                          <div class="controls">
                                            <input class="validate[required]" name="tag_name" type="text" placeholder="specify tag name" required/>
                                            <!-- <input class="validate[required]" id="added_on" name="added_on" type="hidden" value="<?php echo date('Y-m-d');?>" placeholder="added on" required/> -->
                                          </div>
                                        </div>
                                        
                                      </div>
                                      <div class="form-actions">
                                        <button type="submit" class="btn btn-blue">add tag</button>
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
                            if ($this->session->userdata('add_tag')) {
                              if ($this->session->userdata('add_tag') == 'y') {
                                $msg = 'success! your tag has been added.';
                                echo '<script type="text/javascript">alert("'.$msg.'"); </script>';
                              } else {
                                $msg = 'sorry! could not add tag. please try again later';
                                echo '<script type="text/javascript">alert("'.$msg.'"); </script>';
                              }
                              $this->session->unset_userdata('add_tag');
                            }

                            if ($this->session->userdata('edit_tag')) {
                              if ($this->session->userdata('edit_tag') == 'y') {
                                $msg = 'success! your tag has been updated.';
                                echo '<script type="text/javascript">alert("'.$msg.'"); </script>';
                              } else {
                                $msg = 'sorry! could not update tag. please try again later';
                                echo '<script type="text/javascript">alert("'.$msg.'"); </script>';
                              }
                              $this->session->unset_userdata('edit_tag');
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