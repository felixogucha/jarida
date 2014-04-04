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
                                <li class="active"> <a href="#edit" data-toggle="tab"><i class="icon-edit"></i> permissions list </a></li>
                                <li> <a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> permissions list </a></li>
                                <li> <a href="#add" data-toggle="tab"><i class="icon-plus"></i> create permission </a></li>
                              </ul>
                              <!-- CONTROL TABS END -->
                            </div>
                            <div class="box-content padded">
                              <div class="tab-content">
                                <!-- EDITING FORM STARTS -->
                                <div class="tab-pane box active" id="edit" style="padding: 5px;">
                                  <div style="" class="box-content">
                                    <?php 
                                    $attributes = array('class' => 'form-horizontal validatable');
                                    echo form_open('update/permission', $attributes);?>
                                      <div style="" class="padded">
                                        <?php
                                        if(!is_null($all_permissions)) {
                                          foreach ($all_permissions as $al_permissions) {
                                            if ($al_permissions->permission_id == $_GET['key']) {
                                              ?>
                                            <div class="control-group">
                                              <label class="control-label">permission name</label>
                                              <div class="controls">
                                                <input class="validate[required]" value="<?php echo $_GET['key'];?>" name="permission_id" type="hidden" placeholder="permission id" required/>
                                                <input class="validate[required]" value="<?php echo $al_permissions->permission_name;?>" name="permission_name" type="text" placeholder="permission name" required/>
                                              </div>
                                            </div>
                                            <div class="control-group">
                                              <label class="control-label">permission description</label>
                                              <div class="controls">
                                                <input class="validate[required]" value="<?php echo $al_permissions->permission_desc;?>" name="permission_desc" type="text" placeholder="more about the permission" required/>
                                                <input class="validate[required]" name="edited_on" type="hidden" value="<?php echo date('Y-m-d');?>" placeholder="added on" readonly/>
                                              </div>
                                            </div>
                                            <?php
                                            }
                                          }
                                          //endforeach;
                                        }
                                        ?>
                                      </div>
                                      <div class="form-actions">
                                        <button type="submit" class="btn btn-blue">edit permission</button>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                                <!-- EDITING FORM ENDS -->
                                <!-- TABLE LISTING STARTS -->
                                <div class="tab-pane box" id="list">
                                  <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline" role="grid">
                                    <table aria-describedby="DataTables_Table_0_info" id="DataTables_Table_0" class="dTable responsive dataTable" border="0" cellpadding="0" cellspacing="0">
                                      <thead>
                                        <tr role="row">
                                          <th aria-label="#: activate to sort column descending" aria-sort="ascending" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting_asc"><div>#</div></th>
                                          <th aria-label="permission_name: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting"><div>permission name</div></th>
                                          <th aria-label="permission_desc: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting"><div>permission description</div></th>
                                          <th aria-label="options: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting"><div>options</div></th>
                                        </tr>
                                      </thead>
                                      <tbody aria-relevant="all" aria-live="polite" role="alert">
                                        <?php
                                        if(!is_null($all_permissions)) {
                                          $i = 1;
                                          foreach ($all_permissions as $al_permissions) {
                                            # code...
                                            if($i%2 == 0) {
                                              echo '<tr class="even">';
                                            } else {
                                              echo '<tr class="odd">';
                                              
                                            }
                                            echo '<td class="  sorting_1">'.$i.'</td>';
                                            echo '<td class=" ">'.$al_permissions->permission_name.'</td>';
                                            echo '<td class=" ">'.$al_permissions->permission_desc.'</td>';
                                            ?><td class=" " align="center"><a href="editPermissions?key=<?php echo $al_permissions->permission_id;?>" rel="tooltip" data-placement="top" data-original-title="edit" class="btn btn-blue"> <i class="icon-wrench"></i> </a> <a href="deletePermissions?key=<?php echo $al_permissions->permission_id;?>" onclick="return confirm('Are you sure you want to delete this record?')" rel="tooltip" data-placement="top" data-original-title="delete" class="btn btn-red"> <i class="icon-trash"></i> </a></td>
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
                                <!-- TABLE LISTING ENDS -->
                                <!-- CREATION FORM STARTS -->
                                <div class="tab-pane box" id="add" style="padding: 5px;">
                                  <div style="" class="box-content">
                                    <?php 
                                    $attributes = array('class' => 'form-horizontal validatable');
                                    echo form_open('insert/createPermission', $attributes);?>
                                      <div style="" class="padded">
                                        <div class="control-group">
                                          <label class="control-label">permission name</label>
                                          <div class="controls">
                                            <input class="validate[required]" name="permission_name" type="text" placeholder="permission name" required/>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label">permission description</label>
                                          <div class="controls">
                                            <input class="validate[required]" name="permission_desc" type="text" placeholder="more about the permission" required/>
                                            <input class="validate[required]" name="added_on" type="hidden" value="<?php echo date('Y-m-d');?>" placeholder="added on" readonly/>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="form-actions">
                                        <button type="submit" class="btn btn-blue">add permission</button>
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
        </div>
    

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-46775677-1', 'joyonto.net');
  ga('send', 'pageview');

</script><div class="ex-tooltip"></div><div id="galleryOverlay" style="display: none;"><div id="gallerySlider"></div><a id="prevArrow"><i class="icon-angle-left icon-4x"></i></a><a id="nextArrow"><i class="icon-angle-right icon-4x"></i></a></div></body></html>