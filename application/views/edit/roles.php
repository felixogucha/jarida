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
                                <li class="active"> <a href="#edit" data-toggle="tab"><i class="icon-edit"></i> edit role </a></li>
                                <li> <a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> roles list </a></li>
                                <li> <a href="#add" data-toggle="tab"><i class="icon-plus"></i> create a role </a></li>
                              </ul>
                              <!-- CONTROL TABS END -->
                            </div>
                            <div class="box-content padded">
                              <div class="tab-content">
                                <!-- EDITING FORM STARTS -->
                                <div class="tab-pane box active" id="edit" style="padding: 5px;">
                                  <div style="" class="box-content">
                                    <?php 
                                    $attributes = array('class' => 'form-horizontal validatable', 'id' => 'edit_roles');
                                    echo form_open('update/role', $attributes);?>
                                      <div style="" class="padded">
                                        <?php
                                        $mypermissions = array();
                                        if (!is_null($all_rps)) {
                                          foreach ($all_rps as $al_rps) {
                                            $mypermissions[] = $al_rps->permission_id;
                                          }
                                        } else {
                                          $mypermissions[] = null;
                                        }
                                        
                                        if (!is_null($all_roles)) {
                                          foreach ($all_roles as $al_roles) {
                                            if ($al_roles->role_id == $_GET['key']) {
                                              ?>
                                              <fieldset>
                                                <legend>role details</legend>
                                                <div class="control-group">
                                                  <label class="control-label">role name</label>
                                                  <div class="controls">
                                                    <input class="validate[required]" value="<?php echo $al_roles->role_name;?>" name="role_name" type="text" placeholder="role name" required/>
                                                    <input class="validate[required]" value="<?php echo $_GET['key'];?>" name="role_id" type="hidden" placeholder="role id" required/>
                                                  </div>
                                                </div>
                                                <div class="control-group">
                                                  <label class="control-label">role description</label>
                                                  <div class="controls">
                                                    <input class="validate[required]" value="<?php echo $al_roles->role_desc;?>" name="role_desc" type="text" placeholder="more information about the role" required/>
                                                    <input class="validate[required]" name="edited_on" type="hidden" value="<?php echo date('Y-m-d');?>" placeholder="added on" readonly/>
                                                  </div>
                                                </div>
                                              </fieldset>
                                              <fieldset>
                                                <legend>role permissions</legend>
                                                <table class="checkbox-table">
                                                  <tr>
                                                    <th style="text-align:center;" colspan="4"><input type="checkbox" id="edit_all" onClick='checkedAll("edit_roles");' value=""/><label class="css-label" for="edit_all">all permissions</label></th>
                                                  </tr>
                                                  <?php
                                                    if(!is_null($all_permissions)) {
                                                      $permissions = array();
                                                      foreach ($all_permissions as $al_permissions) {
                                                        $permissions[] = $al_permissions;
                                                      }
                                                      $all = count($all_permissions);
                                                      $numrows = 0;
                                                      if ($all%4 == 0) {
                                                        $numrows = $all/4;
                                                      } else if($all%4 == 1){
                                                        $numrows = round($all/4+1);
                                                      } else if($all%4 > 1){
                                                        $numrows = round($all/4);
                                                      }                                                
                                                      for ($i=0; $i < $numrows; $i++) {
                                                        $stt = $i*4;
                                                        echo '<tr>';
                                                          if (isset($permissions[$stt]->permission_name)) {
                                                            if (in_array($permissions[$stt]->permission_id, $mypermissions)) {
                                                              echo '<td><input type="checkbox" checked="checked" id="check'.$permissions[$stt]->permission_id.'" name="permission[]" value="'.$permissions[$stt]->permission_id.'"/><label class="css-label" for="check'.$permissions[$stt]->permission_id.'">'.$permissions[$stt]->permission_name.'</label></td>';
                                                            } else {
                                                              echo '<td><input type="checkbox" id="check'.$permissions[$stt]->permission_id.'" name="permission[]" value="'.$permissions[$stt]->permission_id.'"/><label class="css-label" for="check'.$permissions[$stt]->permission_id.'">'.$permissions[$stt]->permission_name.'</label></td>';
                                                            }
                                                          } else echo '<td></td>';
                                                          if (isset($permissions[($stt+1)]->permission_name)) {
                                                            if (in_array($permissions[($stt+1)]->permission_id, $mypermissions)) {
                                                              echo '<td><input type="checkbox" checked="checked" id="check'.$permissions[($stt+1)]->permission_id.'" name="permission[]" value="'.$permissions[($stt+1)]->permission_id.'"/><label class="css-label" for="check'.$permissions[($stt+1)]->permission_id.'">'.$permissions[($stt+1)]->permission_name.'</label></td>';
                                                            } else {
                                                              echo '<td><input type="checkbox" id="check'.$permissions[($stt+1)]->permission_id.'" name="permission[]" value="'.$permissions[($stt+1)]->permission_id.'"/><label class="css-label" for="check'.$permissions[($stt+1)]->permission_id.'">'.$permissions[($stt+1)]->permission_name.'</label></td>';
                                                            }
                                                          } else echo '<td></td>';
                                                          if (isset($permissions[($stt+2)]->permission_name)) {
                                                            if (in_array($permissions[($stt+2)]->permission_id, $mypermissions)) {
                                                              echo '<td><input type="checkbox" checked="checked" id="check'.$permissions[($stt+2)]->permission_id.'" name="permission[]" value="'.$permissions[($stt+2)]->permission_id.'"/><label class="css-label" for="check'.$permissions[($stt+2)]->permission_id.'">'.$permissions[($stt+2)]->permission_name.'</label></td>';
                                                            } else {
                                                              echo '<td><input type="checkbox" id="check'.$permissions[($stt+2)]->permission_id.'" name="permission[]" value="'.$permissions[($stt+2)]->permission_id.'"/><label class="css-label" for="check'.$permissions[($stt+2)]->permission_id.'">'.$permissions[($stt+2)]->permission_name.'</label></td>';
                                                            }
                                                          } else echo '<td></td>';
                                                          if (isset($permissions[($stt+3)]->permission_name)) {
                                                            if (in_array($permissions[($stt+3)]->permission_id, $mypermissions)) {
                                                              echo '<td><input type="checkbox" checked="checked" id="check'.$permissions[($stt+3)]->permission_id.'" name="permission[]" value="'.$permissions[($stt+3)]->permission_id.'"/><label class="css-label" for="check'.$permissions[($stt+3)]->permission_id.'">'.$permissions[($stt+3)]->permission_name.'</label></td>';
                                                            } else {
                                                              echo '<td><input type="checkbox" id="check'.$permissions[($stt+3)]->permission_id.'" name="permission[]" value="'.$permissions[($stt+3)]->permission_id.'"/><label class="css-label" for="check'.$permissions[($stt+3)]->permission_id.'">'.$permissions[($stt+3)]->permission_name.'</label></td>';
                                                            }
                                                          } else echo '<td></td>';
                                                        echo '</tr>';
                                                      }
                                                    }
                                                    ?>
                                                </table>
                                            </fieldset>
                                              <?php
                                            }
                                          }
                                        }
                                        ?>
                                        
                                      </div>
                                      <div class="form-actions">
                                        <button type="submit" class="btn btn-blue">update role</button>
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
                                          <th aria-label="role name: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting"><div>role name</div></th>
                                          <th aria-label="role desc: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting"><div>role description</div></th>
                                          <th aria-label="options: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting"><div>options</div></th>
                                        </tr>
                                      </thead>
                                      <tbody aria-relevant="all" aria-live="polite" role="alert">
                                        <?php
                                        if(!is_null($all_roles))
                                        {
                                          $i = 1;
                                          foreach ($all_roles as $al_roles) {
                                            # code...
                                            if($i%2 == 0) {
                                              echo '<tr class="even">';
                                            } else {
                                              echo '<tr class="odd">';
                                            }
                                            echo '<td class="  sorting_1">'.$i.'</td>';
                                            echo '<td class=" ">'.$al_roles->role_name.'</td>';                                            
                                            echo '<td class=" ">'.$al_roles->role_desc.'</td>';                                            
                                            ?><td class=" " align="center"><a href="editRole?key=<?php echo $al_roles->role_id?>" rel="tooltip" data-placement="top" data-original-title="edit" class="btn btn-blue"> <i class="icon-wrench"></i> </a> <a href="deleteRole?key=<?php echo $al_roles->role_id?>" onclick="return confirm('Are you sure you want to delete this recored?')" rel="tooltip" data-placement="top" data-original-title="delete" class="btn btn-red"> <i class="icon-trash"></i> </a></td>
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
                                    $attributes = array('class' => 'form-horizontal validatable', 'id' => 'create_role');
                                    echo form_open('insert/createRole', $attributes);?>
                                      <div style="" class="padded">
                                        <fieldset>
                                          <legend>role details</legend>
                                          <div class="control-group">
                                            <label class="control-label">role name</label>
                                            <div class="controls">
                                              <input class="validate[required]" name="role_name" type="text" placeholder="role name" required/>
                                            </div>
                                          </div>
                                          <div class="control-group">
                                            <label class="control-label">role description</label>
                                            <div class="controls">
                                              <input class="validate[required]" name="role_desc" type="text" placeholder="more information about the role" required/>
                                              <input class="validate[required]" name="added_on" type="hidden" value="<?php echo date('Y-m-d');?>" placeholder="added on" readonly/>
                                            </div>
                                          </div>
                                        </fieldset>
                                        <fieldset>
                                          <legend>role permissions</legend>
                                          <table class="checkbox-table">
                                            <tr>
                                              <th style="text-align:center;" colspan="4"><input type="checkbox" id="create_all" onClick='checkedAll("create_role");' value=""/><label class="css-label" for="create_all">all permissions</label></th>
                                            </tr>
                                            <?php
                                              if(!is_null($all_permissions)) {
                                                $permissions = array();
                                                foreach ($all_permissions as $al_permissions) {
                                                  $permissions[] = $al_permissions;
                                                }
                                                $all = count($all_permissions);
                                                $numrows = 0;
                                                if ($all%4 == 0) {
                                                  $numrows = $all/4;
                                                } else if($all%4 == 1){
                                                  $numrows = round($all/4+1);
                                                } else if($all%4 > 1){
                                                  $numrows = round($all/4);
                                                }                                                
                                                for ($i=0; $i < $numrows; $i++) {
                                                  $stt = $i*4;
                                                  echo '<tr>';
                                                    if (isset($permissions[$stt]->permission_name)) {
                                                      echo '<td><input type="checkbox" id="create'.$permissions[$stt]->permission_id.'" name="permission[]" value="'.$permissions[$stt]->permission_id.'"/><label class="css-label" for="create'.$permissions[$stt]->permission_id.'">'.$permissions[$stt]->permission_name.'</label></td>';
                                                    } else echo '<td></td>';
                                                    if (isset($permissions[($stt+1)]->permission_name)) {
                                                      echo '<td><input type="checkbox" id="create'.$permissions[($stt+1)]->permission_id.'" name="permission[]" value="'.$permissions[($stt+1)]->permission_id.'"/><label class="css-label" for="create'.$permissions[($stt+1)]->permission_id.'">'.$permissions[($stt+1)]->permission_name.'</label></td>';
                                                    } else echo '<td></td>';
                                                    if (isset($permissions[($stt+2)]->permission_name)) {
                                                      echo '<td><input type="checkbox" id="create'.$permissions[($stt+2)]->permission_id.'" name="permission[]" value="'.$permissions[($stt+2)]->permission_id.'"/><label class="css-label" for="create'.$permissions[($stt+2)]->permission_id.'">'.$permissions[($stt+2)]->permission_name.'</label></td>';
                                                    } else echo '<td></td>';
                                                    if (isset($permissions[($stt+3)]->permission_name)) {
                                                      echo '<td><input type="checkbox" id="create'.$permissions[($stt+3)]->permission_id.'" name="permission[]" value="'.$permissions[($stt+3)]->permission_id.'"/><label class="css-label" for="create'.$permissions[($stt+3)]->permission_id.'">'.$permissions[($stt+3)]->permission_name.'</label></td>';
                                                    } else echo '<td></td>';
                                                  echo '</tr>';
                                                }
                                              }
                                              ?>
                                          </table>
                                        </fieldset>
                                        
                                      </div>
                                      <div class="form-actions">
                                        <button type="submit" class="btn btn-blue">create role</button>
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