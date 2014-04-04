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
                                <li class="active"> <a href="#edit" data-toggle="tab"><i class="icon-edit"></i> edit user </a></li>
                                <li> <a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> users list </a></li>
                                <li> <a href="#add_user" data-toggle="tab"><i class="icon-plus"></i> add user </a></li>
                              </ul>
                              <!-- CONTROL TABS END -->
                            </div>
                            <div class="box-content padded">
                              <div class="tab-content">
                                <!-- EDITING FORM STARTS -->
                                <div class="tab-pane box active" id="edit" style="padding: 5px;">
                                  <div style="" class="box-content">
                                    <?php 
                                    $attributes = array('class' => 'form-horizontal validatable', 'id' => 'edit_user');
                                    echo form_open('update/user', $attributes);?>
                                      <div style="" class="padded">
                                        <?php
                                        $mygroups = array();
                                        if (!is_null($all_ugs)) {
                                          foreach ($all_ugs as $al_ugs) {
                                            $mygroups[] = $al_ugs->group_id;
                                          }
                                        } else {
                                          $mygroups[] = null;
                                        }
                                        if (!is_null($all_users)) {
                                          foreach ($all_users as $al_users) {
                                            if ($al_users->user_id == $_GET['key']) {
                                              ?>
                                              <fieldset>
                                                  <legend>personal information</legend>
                                                  <div class="control-group">
                                                      <label class="control-label">salutation</label>
                                                      <div class="controls">
                                                        <select name="salutation_id" class="validate[required]">
                                                              <option  value="">Select salutation</option>
                                                              <?php
                                                                if(!is_null($all_salutations))
                                                                {
                                                                  foreach ($all_salutations as $al_salutations) {
                                                                    if ($al_salutations->salutation == $al_users->salutation) {
                                                                      echo '<option selected="selected" value="'.$al_salutations->salutation_id.'">'.$al_salutations->salutation.'</option>';
                                                                    } else {
                                                                      echo '<option value="'.$al_salutations->salutation_id.'">'.$al_salutations->salutation.'</option>';
                                                                    }
                                                                    
                                                                  }
                                                                }

                                                                  //endforeach;
                                                                ?>
                                                      </select>
                                                      </div>
                                                    </div>
                                                    <div class="control-group">
                                                    <label class="control-label">name</label>
                                                    <div class="controls">
                                                      <input class="validate[required]" value="<?php echo $_GET['key'];?>" name="user_id" type="hidden" placeholder="user_id" required/>
                                                      <input class="validate[required]" value="<?php echo $al_users->surname;?>" name="surname" type="text" placeholder="surname" required/>
                                                      <input class="validate[required]" value="<?php echo $al_users->other_names;?>" name="other_names" type="text" placeholder="other names" required/>
                                                    </div>
                                                  </div>
                                                  <div class="control-group">
                                                    <label class="control-label">phone number</label>
                                                    <div class="controls">
                                                      <input class="validate[required]" value="<?php echo $al_users->phone_number;?>" name="phone_number" type="text" placeholder="phone number" required/>
                                                    </div>
                                                  </div>
                                                  <div class="control-group">
                                                    <label class="control-label">email address</label>
                                                    <div class="controls">
                                                      <input class="validate[required]" value="<?php echo $al_users->email;?>" name="email" type="text" placeholder="email address" required/>
                                                    </div>
                                                  </div>
                                                  <div class="control-group">
                                                    <label class="control-label">gender</label>
                                                    <div class="controls">
                                                      <select name="sex_id" class="validate[required]">
                                                        <option value="">Select gender</option>
                                                        <?php
                                                            if(!is_null($all_gender)) {
                                                              $i = 1;
                                                              foreach ($all_gender as $al_gender) {
                                                                if ($al_gender->sex == $al_users->sex) {
                                                                  echo '<option selected="selected" value="'.$al_gender->sex_id.'">'.$al_gender->sex.'</option>';
                                                                } else {
                                                                  echo '<option value="'.$al_gender->sex_id.'">'.$al_gender->sex.'</option>';
                                                                }
                                                                
                                                              $i++;
                                                              }
                                                              //endforeach;
                                                            }
                                                            ?>
                                                      </select>
                                                    </div>
                                                  </div>
                                                </fieldset>
                                                <fieldset>
                                                  <legend>residential information</legend>
                                                  <div class="control-group">
                                                    <label class="control-label">nationality</label>
                                                    <div class="controls">
                                                      <select name="nationality_id" class="validate[required]">
                                                        <option value="">Select nationality</option>
                                                          <?php
                                                            if(!is_null($all_nationality)) {
                                                              $i = 1;
                                                              foreach ($all_nationality as $al_nationality) {
                                                                if ($al_nationality->nationality == $al_users->nationality) {
                                                                  echo '<option selected="selected"  value="'.$al_nationality->nationality_id.'">'.$al_nationality->nationality.'</option>';
                                                                } else {
                                                                  echo '<option value="'.$al_nationality->nationality_id.'">'.$al_nationality->nationality.'</option>';
                                                                }
                                                                
                                                              $i++;
                                                              }
                                                              //endforeach;
                                                            }
                                                            ?>
                                                      </select>
                                                    </div>
                                                  </div>
                                                  <div class="control-group">
                                                    <label class="control-label">city</label>
                                                    <div class="controls">
                                                      <input class="validate[required]" value="<?php echo $al_users->city;?>" name="city" type="text" placeholder="city" required/>
                                                    </div>
                                                  </div>
                                                  <div class="control-group">
                                                    <label class="control-label">residence</label>
                                                    <div class="controls">
                                                      <input class="validate[required]" value="<?php echo $al_users->residence;?>" name="residence" type="text" placeholder="residence" required/>
                                                    </div>
                                                  </div>
                                                </fieldset>
                                                
                                                <fieldset>
                                                    <legend>login information</legend>
                                                    <div class="control-group">
                                                    <label class="control-label">username</label>
                                                    <div class="controls">
                                                      <input class="validate[required]" value="<?php echo $al_users->username;?>" name="username" type="text" placeholder="username" required/>
                                                    </div>
                                                  </div>
                                                </fieldset>
                                                <fieldset>
                                                  <legend>user group</legend>
                                                  <table class="checkbox-table">
                                                    <tr>
                                                      <th style="text-align:center;" colspan="4"><input type="checkbox" id="edit_all" onClick='checkedAll("edit_user");' value=""/><label class="css-label" for="edit_all">all roles</label></th>
                                                    </tr>
                                                    <?php
                                                      if(!is_null($all_groups)) {
                                                        $groups = array();
                                                        foreach ($all_groups as $al_groups) {
                                                          $groups[] = $al_groups;
                                                        }
                                                        $all = count($all_groups);
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
                                                            if (isset($groups[$stt]->group_name)) {
                                                              if (in_array($groups[($stt)]->group_id, $mygroups)) {
                                                                echo '<td><input checked="checked" type="checkbox" id="edit'.$groups[$stt]->group_id.'" name="group[]" value="'.$groups[$stt]->group_id.'"/><label class="css-label" for="edit'.$groups[$stt]->group_id.'">'.$groups[$stt]->group_name.'</label></td>';
                                                              } else {
                                                                echo '<td><input type="checkbox" id="edit'.$groups[$stt]->group_id.'" name="group[]" value="'.$groups[$stt]->group_id.'"/><label class="css-label" for="edit'.$groups[$stt]->group_id.'">'.$groups[$stt]->group_name.'</label></td>';
                                                              }
                                                              
                                                            } else echo '<td></td>';
                                                            if (isset($groups[($stt+1)]->group_name)) {
                                                              if (in_array($groups[($stt+1)]->group_id, $mygroups)) {
                                                                echo '<td><input checked="checked" type="checkbox" id="edit'.$groups[($stt+1)]->group_id.'" name="group[]" value="'.$groups[($stt+1)]->group_id.'"/><label class="css-label" for="edit'.$groups[($stt+1)]->group_id.'">'.$groups[($stt+1)]->group_name.'</label></td>';
                                                              } else {
                                                                echo '<td><input type="checkbox" id="edit'.$groups[($stt+1)]->group_id.'" name="group[]" value="'.$groups[($stt+1)]->group_id.'"/><label class="css-label" for="edit'.$groups[($stt+1)]->group_id.'">'.$groups[($stt+1)]->group_name.'</label></td>';
                                                              }
                                                              
                                                            } else echo '<td></td>';
                                                            if (isset($groups[($stt+2)]->group_name)) {
                                                              if (in_array($groups[($stt+2)]->group_id, $mygroups)) {
                                                                echo '<td><input checked="checked" type="checkbox" id="edit'.$groups[($stt+2)]->group_id.'" name="group[]" value="'.$groups[($stt+2)]->group_id.'"/><label class="css-label" for="edit'.$groups[($stt+2)]->group_id.'">'.$groups[($stt+2)]->group_name.'</label></td>';
                                                              } else {
                                                                echo '<td><input type="checkbox" id="edit'.$groups[($stt+2)]->group_id.'" name="group[]" value="'.$groups[($stt+2)]->group_id.'"/><label class="css-label" for="edit'.$groups[($stt+2)]->group_id.'">'.$groups[($stt+2)]->group_name.'</label></td>';
                                                              }
                                                              
                                                            } else echo '<td></td>';
                                                            if (isset($groups[($stt+3)]->group_name)) {
                                                              if (in_array($groups[($stt+3)]->group_id, $mygroups)) {
                                                                echo '<td><input checked="checked" type="checkbox" id="edit'.$groups[($stt+3)]->group_id.'" name="group[]" value="'.$groups[($stt+3)]->group_id.'"/><label class="css-label" for="edit'.$groups[($stt+3)]->group_id.'">'.$groups[($stt+3)]->group_name.'</label></td>';
                                                              } else {
                                                                echo '<td><input type="checkbox" id="edit'.$groups[($stt+3)]->group_id.'" name="group[]" value="'.$groups[($stt+3)]->group_id.'"/><label class="css-label" for="edit'.$groups[($stt+3)]->group_id.'">'.$groups[($stt+3)]->group_name.'</label></td>';
                                                              }
                                                              
                                                            } else echo '<td></td>';
                                                          echo '</tr>';
                                                        }
                                                      }
                                                      ?>
                                                  </table>
                                                </fieldset>
                                                <fieldset>
                                                  <legend>user status</legend>
                                                  <div class="control-group">
                                                    <label class="control-label">nationality</label>
                                                    <div class="controls">
                                                      <select name="status_id" class="validate[required]">
                                                        <option value="">Select status</option>
                                                          <?php
                                                            if(!is_null($all_status)) {
                                                              $i = 1;
                                                              foreach ($all_status as $al_status) {
                                                                if ($al_status->status == $al_users->status) {
                                                                  echo '<option selected="selected" value="'.$al_status->status_id.'">'.$al_status->status.'</option>';
                                                                } else {
                                                                  echo '<option value="'.$al_status->status_id.'">'.$al_status->status.'</option>';
                                                                }
                                                                
                                                              $i++;
                                                              }
                                                              //endforeach;
                                                            }
                                                            ?>
                                                      </select>
                                                    </div>
                                                  </div>
                                              </fieldset>

                                              <?php
                                            }
                                          }
                                        }
                                              ?>
                                      </div>
                                      <div class="form-actions">
                                        <button type="submit" class="btn btn-blue">edit user</button>
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
                                          <th aria-label="name: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting"><div>name</div></th>
                                          <th aria-label="phone: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting"><div>phone no.</div></th>
                                          <th aria-label="email: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting"><div>email add.</div></th>
                                          <th aria-label="sex: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting"><div>sex</div></th>
                                          <th aria-label="nationality: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting"><div>nationality</div></th>
                                          <th aria-label="options: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting"><div>options</div></th>
                                        </tr>
                                      </thead>
                                      <tbody aria-relevant="all" aria-live="polite" role="alert">
                                        <?php
                                        if(!is_null($all_users))
                                        {
                                          $i = 1;
                                          foreach ($all_users as $al_users) {
                                            # code...
                                            if($i%2 == 0) {
                                              echo '<tr class="even">';
                                            } else {
                                              echo '<tr class="odd">';
                                            }
                                            echo '<td class="  sorting_1">'.$i.'</td>';
                                            echo '<td class=" ">'.$al_users->surname.' '.$al_users->other_names.'</td>';                                            
                                            echo '<td class=" ">'.$al_users->phone_number.'</td>';
                                            echo '<td class=" ">'.$al_users->email.'</td>';
                                            echo '<td class=" ">'.$al_users->sex.'</td>';
                                            echo '<td class=" ">'.$al_users->nationality.'</td>';
                                            ?><td class=" " align="center"><a href="editUser?key=<?php echo $al_users->user_id;?>" rel="tooltip" data-placement="top" data-original-title="edit" class="btn btn-blue"> <i class="icon-wrench"></i> </a> <a href="deleteUser?key=<?php echo $al_users->user_id;;?>" onclick="return confirm('Are you sure you want to delete this record?')" rel="tooltip" data-placement="top" data-original-title="delete" class="btn btn-red"> <i class="icon-trash"></i> </a></td>
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
                                <div class="tab-pane box" id="add_user" style="padding: 5px;">
                                  <div style="" class="box-content">
                                    <?php 
                                    $attributes = array('class' => 'form-horizontal validatable', 'id' => 'create_user');
                                    echo form_open('insert/createUser', $attributes);?>
                                      <div style="" class="padded">
                                        <fieldset>
                                          <legend>personal information</legend>
                                            <div class="control-group">
                                            <label class="control-label">name</label>
                                            <div class="controls">
                                              <input class="validate[required]" name="surname" type="text" placeholder="surname" required/>
                                              <input class="validate[required]" name="other_names" type="text" placeholder="other names" required/>
                                            </div>
                                          </div>
                                          <div class="control-group">
                                            <label class="control-label">phone number</label>
                                            <div class="controls">
                                              <input class="validate[required]" name="phone_number" type="text" placeholder="phone number" required/>
                                            </div>
                                          </div>
                                          <div class="control-group">
                                            <label class="control-label">email address</label>
                                            <div class="controls">
                                              <input class="validate[required]" name="email" type="text" placeholder="email address" required/>
                                            </div>
                                          </div>
                                          <div class="control-group">
                                            <label class="control-label">gender</label>
                                            <div class="controls">
                                              <select name="sex_id" class="validate[required]">
                                                <option selected="selected" value="">Select gender</option>
                                                <?php
                                                    if(!is_null($all_gender)) {
                                                      $i = 1;
                                                      foreach ($all_gender as $al_gender) {
                                                        # code...
                                                        echo '<option value="'.$al_gender->sex_id.'">'.$al_gender->sex.'</option>';
                                                      $i++;
                                                      }
                                                      //endforeach;
                                                    }
                                                    ?>
                                              </select>
                                            </div>
                                          </div>
                                        </fieldset>
                                        <fieldset>
                                          <legend>residential information</legend>
                                          <div class="control-group">
                                            <label class="control-label">nationality</label>
                                            <div class="controls">
                                              <select name="nationality_id" class="validate[required]">
                                                <option selected="selected" value="">Select nationality</option>
                                                  <?php
                                                    if(!is_null($all_nationality)) {
                                                      $i = 1;
                                                      foreach ($all_nationality as $al_nationality) {
                                                        # code...
                                                        echo '<option value="'.$al_nationality->nationality_id.'">'.$al_nationality->nationality.'</option>';
                                                      $i++;
                                                      }
                                                      //endforeach;
                                                    }
                                                    ?>
                                              </select>
                                            </div>
                                          </div>
                                          <div class="control-group">
                                            <label class="control-label">city</label>
                                            <div class="controls">
                                              <input class="validate[required]" name="city" type="text" placeholder="city" required/>
                                            </div>
                                          </div>
                                          <div class="control-group">
                                            <label class="control-label">residence</label>
                                            <div class="controls">
                                              <input class="validate[required]" name="residence" type="text" placeholder="residence" required/>
                                            </div>
                                          </div>
                                        </fieldset>
                                        
                                        <fieldset>
                                            <legend>login information</legend>
                                            <div class="control-group">
                                            <label class="control-label">username</label>
                                            <div class="controls">
                                              <input class="validate[required]" name="username" type="text" placeholder="username" required/>
                                            </div>
                                          </div>
                                        </fieldset>
                                        <fieldset>
                                          <legend>user group</legend>
                                          <table class="checkbox-table">
                                            <tr>
                                              <th style="text-align:center;" colspan="4"><input type="checkbox" id="check_all" onClick='checkedAll("create_user");' value=""/><label class="css-label" for="check_all">all roles</label></th>
                                            </tr>
                                            <?php
                                              if(!is_null($all_groups)) {
                                                $groups = array();
                                                foreach ($all_groups as $al_groups) {
                                                  $groups[] = $al_groups;
                                                }
                                                $all = count($all_groups);
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
                                                    if (isset($groups[$stt]->group_name)) {
                                                      echo '<td><input type="checkbox" id="check'.$groups[$stt]->group_id.'" name="group[]" value="'.$groups[$stt]->group_id.'"/><label class="css-label" for="check'.$groups[$stt]->group_id.'">'.$groups[$stt]->group_name.'</label></td>';
                                                    } else echo '<td></td>';
                                                    if (isset($groups[($stt+1)]->group_name)) {
                                                      echo '<td><input type="checkbox" id="check'.$groups[($stt+1)]->group_id.'" name="group[]" value="'.$groups[($stt+1)]->group_id.'"/><label class="css-label" for="check'.$groups[($stt+1)]->group_id.'">'.$groups[($stt+1)]->group_name.'</label></td>';
                                                    } else echo '<td></td>';
                                                    if (isset($groups[($stt+2)]->group_name)) {
                                                      echo '<td><input type="checkbox" id="check'.$groups[($stt+2)]->group_id.'" name="group[]" value="'.$groups[($stt+2)]->group_id.'"/><label class="css-label" for="check'.$groups[($stt+2)]->group_id.'">'.$groups[($stt+2)]->group_name.'</label></td>';
                                                    } else echo '<td></td>';
                                                    if (isset($groups[($stt+3)]->group_name)) {
                                                      echo '<td><input type="checkbox" id="check'.$groups[($stt+3)]->group_id.'" name="group[]" value="'.$groups[($stt+3)]->group_id.'"/><label class="css-label" for="check'.$groups[($stt+3)]->group_id.'">'.$groups[($stt+3)]->group_name.'</label></td>';
                                                    } else echo '<td></td>';
                                                  echo '</tr>';
                                                }
                                              }
                                              ?>
                                          </table>
                                        </fieldset>
                                        <fieldset>
                                          <legend>user status</legend>
                                          <div class="control-group">
                                            <label class="control-label">status</label>
                                            <div class="controls">
                                              <select name="status_id" class="validate[required]">
                                                <option selected="selected" value="">Select status</option>
                                                  <?php
                                                    if(!is_null($all_status)) {
                                                      $i = 1;
                                                      foreach ($all_status as $al_status) {
                                                        # code...
                                                        echo '<option value="'.$al_status->status_id.'">'.$al_status->status.'</option>';
                                                      $i++;
                                                      }
                                                      //endforeach;
                                                    }
                                                    ?>
                                              </select>
                                            </div>
                                          </div>
                                        </fieldset>
                                      </div>
                                      <div class="form-actions">
                                        <button type="submit" class="btn btn-blue">add user</button>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                                <!-- CREATION FORM ENDS -->
                                <!-- CREATING ANOTHER FORM ENDS-->
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