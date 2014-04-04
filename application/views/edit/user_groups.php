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
                                <li class="active"> <a href="#edit" data-toggle="tab"><i class="icon-edit"></i> edit user group </a></li>
                                <li> <a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> user group list </a></li>
                                <li> <a href="#add" data-toggle="tab"><i class="icon-plus"></i> create user group </a></li>
                              </ul>
                              <!-- CONTROL TABS END -->
                            </div>
                            <div class="box-content padded">
                              <div class="tab-content">
                                <!-- EDITING FORM STARTS -->
                                <div class="tab-pane box active" id="edit" style="padding: 5px;">
                                  <div style="" class="box-content">
                                    <?php 
                                    $attributes = array('class' => 'form-horizontal validatable', 'id' => 'edit_ugroup');
                                    echo form_open('update/userGroup', $attributes);?>
                                      <div style="" class="padded">
                                        <?php
                                        $myroles = array();
                                        if (!is_null($all_grs)) {
                                          foreach ($all_grs as $al_grs) {
                                            $myroles[] = $al_grs->role_id;
                                          }
                                        } else {
                                          $myroles[] = null;
                                        }
                                        if (!is_null($all_groups)) {
                                          foreach ($all_groups as $al_groups) {
                                            if ($al_groups->group_id == $_GET['key']) {
                                              ?>
                                              <fieldset>
                                                <legend>group details</legend>
                                                <div class="control-group">
                                                  <label class="control-label">group name</label>
                                                  <div class="controls">
                                                    <input class="validate[required]" value="<?php echo $_GET['key'];?>" name="group_id" type="hidden" placeholder="group id" required/>
                                                    <input class="validate[required]" value="<?php echo $al_groups->group_name;?>" name="group_name" type="text" placeholder="group name" required/>
                                                  </div>
                                                </div>
                                                <div class="control-group">
                                                  <label class="control-label">group description</label>
                                                  <div class="controls">
                                                    <input class="validate[required]" value="<?php echo $al_groups->group_desc;?>" name="group_desc" type="text" placeholder="more information about the group" required/>
                                                    <input class="validate[required]" name="edited_on" type="hidden" value="<?php echo date('Y-m-d');?>" placeholder="edited on" readonly/>
                                                  </div>
                                                </div>
                                              </fieldset>
                                              <fieldset>
                                                  <legend>group roles</legend>
                                                  <table class="checkbox-table">
                                                    <tr>
                                                      <th style="text-align:center;" colspan="4"><input type="checkbox" id="edit_all" onClick='checkedAll("edit_ugroup");' value=""/><label class="css-label" for="edit_all">all roles</label></th>
                                                    </tr>
                                                    <?php
                                                      if(!is_null($all_roles)) {
                                                        $roles = array();
                                                        foreach ($all_roles as $al_roles) {
                                                          $roles[] = $al_roles;
                                                        }
                                                        $all = count($all_roles);
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
                                                            if (isset($roles[$stt]->role_name)) {
                                                              if (in_array($roles[$stt]->role_id, $myroles)) {
                                                                echo '<td><input type="checkbox" checked="checked" id="editrole'.$roles[$stt]->role_id.'" name="role[]" value="'.$roles[$stt]->role_id.'"/><label class="css-label" for="editrole'.$roles[$stt]->role_id.'">'.$roles[$stt]->role_name.'</label></td>';
                                                              } else {
                                                                echo '<td><input type="checkbox" id="editrole'.$roles[$stt]->role_id.'" name="role[]" value="'.$roles[$stt]->role_id.'"/><label class="css-label" for="editrole'.$roles[$stt]->role_id.'">'.$roles[$stt]->role_name.'</label></td>';
                                                              }
                                                            } else echo '<td></td>';
                                                            if (isset($roles[($stt+1)]->role_name)) {
                                                              if (in_array($roles[($stt+1)]->role_id, $myroles)) {
                                                                echo '<td><input type="checkbox" checked="checked" id="editrole'.$roles[($stt+1)]->role_id.'" name="role[]" value="'.$roles[($stt+1)]->role_id.'"/><label class="css-label" for="editrole'.$roles[($stt+1)]->role_id.'">'.$roles[($stt+1)]->role_name.'</label></td>';
                                                              } else {
                                                                echo '<td><input type="checkbox" id="editrole'.$roles[($stt+1)]->role_id.'" name="role[]" value="'.$roles[($stt+1)]->role_id.'"/><label class="css-label" for="editrole'.$roles[($stt+1)]->role_id.'">'.$roles[($stt+1)]->role_name.'</label></td>';
                                                              }
                                                            } else echo '<td></td>';
                                                            if (isset($roles[($stt+2)]->role_name)) {
                                                              if (in_array($roles[($stt+2)]->role_id, $myroles)) {
                                                                echo '<td><input type="checkbox" checked="checked" id="editrole'.$roles[($stt+2)]->role_id.'" name="role[]" value="'.$roles[($stt+2)]->role_id.'"/><label class="css-label" for="editrole'.$roles[($stt+2)]->role_id.'">'.$roles[($stt+2)]->role_name.'</label></td>';
                                                              } else {
                                                                echo '<td><input type="checkbox" id="editrole'.$roles[($stt+2)]->role_id.'" name="role[]" value="'.$roles[($stt+2)]->role_id.'"/><label class="css-label" for="editrole'.$roles[($stt+2)]->role_id.'">'.$roles[($stt+2)]->role_name.'</label></td>';
                                                              }
                                                              
                                                            } else echo '<td></td>';
                                                            if (isset($roles[($stt+3)]->role_name)) {
                                                              if (in_array($roles[($stt+3)]->role_id, $myroles)) {
                                                               echo '<td><input type="checkbox" checked="checked" id="editrole'.$roles[($stt+3)]->role_id.'" name="role[]" value="'.$roles[($stt+3)]->role_id.'"/><label class="css-label" for="editrole'.$roles[($stt+3)]->role_id.'">'.$roles[($stt+3)]->role_name.'</label></td>';
                                                              } else {
                                                                echo '<td><input type="checkbox" id="editrole'.$roles[($stt+3)]->role_id.'" name="role[]" value="'.$roles[($stt+3)]->role_id.'"/><label class="css-label" for="editrole'.$roles[($stt+3)]->role_id.'">'.$roles[($stt+3)]->role_name.'</label></td>';
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
                                        <button type="submit" class="btn btn-blue">edit user group</button>
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
                                          <th aria-label="group name: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting"><div>group name</div></th>
                                          <th aria-label="group description: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting"><div>group description</div></th>
                                          <th aria-label="options: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting"><div>options</div></th>
                                        </tr>
                                      </thead>
                                      <tbody aria-relevant="all" aria-live="polite" role="alert">
                                        <?php
                                        if(!is_null($all_groups))
                                        {
                                          $i = 1;
                                          foreach ($all_groups as $al_groups) {
                                            # code...
                                            if($i%2 == 0) {
                                              echo '<tr class="even">';
                                            } else {
                                              echo '<tr class="odd">';
                                            }
                                            echo '<td class="  sorting_1">'.$i.'</td>';
                                            echo '<td class=" ">'.$al_groups->group_name.'</td>';                                            
                                            echo '<td class=" ">'.$al_groups->group_desc.'</td>';                                            
                                            ?><td class=" " align="center"><a href="editGroup?key=<?php echo $al_groups->group_id?>" rel="tooltip" data-placement="top" data-original-title="edit" class="btn btn-blue"> <i class="icon-wrench"></i> </a> <a href="deleteGroup?key=<?php echo $al_groups->group_id?>" onclick="return confirm('Are you sure you want to delete this record?')" rel="tooltip" data-placement="top" data-original-title="delete" class="btn btn-red"> <i class="icon-trash"></i> </a></td>
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
                                    $attributes = array('class' => 'form-horizontal validatable', 'id' => 'create_ugroup');
                                    echo form_open('insert/createUserGroups', $attributes);?>
                                      <div style="" class="padded">
                                        <fieldset>
                                          <legend>group details</legend>
                                          <div class="control-group">
                                            <label class="control-label">group name</label>
                                            <div class="controls">
                                              <input class="validate[required]" name="group_name" type="text" placeholder="group name" required/>
                                            </div>
                                          </div>
                                          <div class="control-group">
                                            <label class="control-label">group description</label>
                                            <div class="controls">
                                              <input class="validate[required]" name="group_desc" type="text" placeholder="more information about the group" required/>
                                              <input class="validate[required]" name="added_on" type="hidden" value="<?php echo date('Y-m-d');?>" placeholder="added on" readonly/>
                                            </div>
                                          </div>
                                        </fieldset>
                                        <fieldset>
                                          <legend>group roles</legend>
                                          <table class="checkbox-table">
                                            <tr>
                                              <th style="text-align:center;" colspan="4"><input type="checkbox" id="check_all" onClick='checkedAll("create_ugroup");' value=""/><label class="css-label" for="check_all">all roles</label></th>
                                            </tr>
                                            <?php
                                              if(!is_null($all_roles)) {
                                                $roles = array();
                                                foreach ($all_roles as $al_roles) {
                                                  $roles[] = $al_roles;
                                                }
                                                $all = count($all_roles);
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
                                                    if (isset($roles[$stt]->role_name)) {
                                                      echo '<td><input type="checkbox" id="check'.$roles[$stt]->role_id.'" name="role[]" value="'.$roles[$stt]->role_id.'"/><label class="css-label" for="check'.$roles[$stt]->role_id.'">'.$roles[$stt]->role_name.'</label></td>';
                                                    } else echo '<td></td>';
                                                    if (isset($roles[($stt+1)]->role_name)) {
                                                      echo '<td><input type="checkbox" id="check'.$roles[($stt+1)]->role_id.'" name="role[]" value="'.$roles[($stt+1)]->role_id.'"/><label class="css-label" for="check'.$roles[($stt+1)]->role_id.'">'.$roles[($stt+1)]->role_name.'</label></td>';
                                                    } else echo '<td></td>';
                                                    if (isset($roles[($stt+2)]->role_name)) {
                                                      echo '<td><input type="checkbox" id="check'.$roles[($stt+2)]->role_id.'" name="role[]" value="'.$roles[($stt+2)]->role_id.'"/><label class="css-label" for="check'.$roles[($stt+2)]->role_id.'">'.$roles[($stt+2)]->role_name.'</label></td>';
                                                    } else echo '<td></td>';
                                                    if (isset($roles[($stt+3)]->role_name)) {
                                                      echo '<td><input type="checkbox" id="check'.$roles[($stt+3)]->role_id.'" name="role[]" value="'.$roles[($stt+3)]->role_id.'"/><label class="css-label" for="check'.$roles[($stt+3)]->role_id.'">'.$roles[($stt+3)]->role_name.'</label></td>';
                                                    } else echo '<td></td>';
                                                  echo '</tr>';
                                                }
                                              }
                                              ?>
                                          </table>
                                        </fieldset>
                                      </div>
                                      <div class="form-actions">
                                        <button type="submit" class="btn btn-blue">create user group</button>
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
                            if ($this->session->userdata('add_group')) {
                              if ($this->session->userdata('add_group') == 'y') {
                                $msg = 'success! group has been added.';
                                echo '<script type="text/javascript">alert("'.$msg.'"); </script>';
                              } else {
                                $msg = 'sorry! group could not be added. please try again later';
                                echo '<script type="text/javascript">alert("'.$msg.'"); </script>';
                              }
                              $this->session->unset_userdata('add_group');
                            }

                            if ($this->session->userdata('edit_group')) {
                              if ($this->session->userdata('edit_group') == 'y') {
                                $msg = 'success! group has been updated.';
                                echo '<script type="text/javascript">alert("'.$msg.'"); </script>';
                              } else {
                                $msg = 'sorry! group could not be updated. please try again later';
                                echo '<script type="text/javascript">alert("'.$msg.'"); </script>';
                              }
                              $this->session->unset_userdata('edit_group');
                            }

                            if ($this->session->userdata('del_group')) {
                              if ($this->session->userdata('del_group') == 'y') {
                                $msg = 'success! group has been deleted.';
                                echo '<script type="text/javascript">alert("'.$msg.'"); </script>';
                              } else {
                                $msg = 'sorry! group could not be deleted. please try again later';
                                echo '<script type="text/javascript">alert("'.$msg.'"); </script>';
                              }
                              $this->session->unset_userdata('del_group');
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