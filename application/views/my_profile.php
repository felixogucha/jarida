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
                                <li class="active"> <a href="#profile" data-toggle="tab"><i class="icon-align-justify"></i> my profile </a></li>
                                <li> <a href="#update" data-toggle="tab"><i class="icon-edit"></i> update my profile </a></li>
                              </ul>
                              <!-- CONTROL TABS END -->
                            </div>
                            <div class="box-content padded">
                              <div class="tab-content">
                                <!-- EDITING FORM STARTS -->
                                <!-- EDITING FORM ENDS -->
                                <!-- CREATION FORM STARTS -->
                                <div class="tab-pane box active" id="profile" style="padding: 5px;">
                                  <div style="" class="box-content">
                                    <form class="form-horizontal validatable">
                                      <div style="" class="padded">
                                        <?php
                                        if (!is_null($my_details)) {
                                          ?>
                                            <fieldset>
                                            <legend>personal information</legend>
                                              <div class="control-group">
                                              <label class="control-label">name</label>
                                              <div class="controls">
                                                <input class="validate[required]" value="<?php echo $my_details->surname;?>" name="surname" type="text" placeholder="surname" readonly/>
                                                <input class="validate[required]" value="<?php echo $my_details->other_names;?>" name="other_names" type="text" placeholder="other names" readonly/>
                                              </div>
                                            </div>
                                            <div class="control-group">
                                              <label class="control-label">phone number</label>
                                              <div class="controls">
                                                <input class="validate[required]" value="<?php echo $my_details->phone_number;?>" name="phone_number" type="text" placeholder="phone number" readonly/>
                                              </div>
                                            </div>
                                            <div class="control-group">
                                              <label class="control-label">email address</label>
                                              <div class="controls">
                                                <input class="validate[required]" value="<?php echo $my_details->email;?>" name="email" type="text" placeholder="email address" readonly/>
                                              </div>
                                            </div>
                                            <div class="control-group">
                                              <label class="control-label">gender</label>
                                              <div class="controls">
                                                <input class="validate[required]" value="<?php echo $my_details->sex;?>" name="gender" type="text" placeholder="gender" readonly/>
                                              </div>
                                            </div>
                                          </fieldset>
                                          <fieldset>
                                            <legend>residential information</legend>
                                            <div class="control-group">
                                              <label class="control-label">nationality</label>
                                              <div class="controls">
                                                <input class="validate[required]" value="<?php echo $my_details->nationality;?>" name="nationality" type="text" placeholder="nationality" readonly/>
                                              </div>
                                            </div>
                                            <div class="control-group">
                                              <label class="control-label">city</label>
                                              <div class="controls">
                                                <input class="validate[required]" value="<?php echo $my_details->city;?>" name="city" type="text" placeholder="city" readonly/>
                                              </div>
                                            </div>
                                            <div class="control-group">
                                              <label class="control-label">residence</label>
                                              <div class="controls">
                                                <input class="validate[required]" value="<?php echo $my_details->residence;?>" name="residence" type="text" placeholder="residence" readonly/>
                                              </div>
                                            </div>
                                          </fieldset>
                                          
                                          <fieldset>
                                              <legend>login information</legend>
                                              <div class="control-group">
                                              <label class="control-label">username</label>
                                              <div class="controls">
                                                <input class="validate[required]" value="<?php echo $my_details->username;?>" name="username" type="text" placeholder="username" readonly/>
                                              </div>
                                            </div>
                                          </fieldset>
                                          <?php
                                        }
                                        ?>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                                <!-- CREATION FORM ENDS -->
                                <!-- CREATION FORM STARTS -->
                                <div class="tab-pane box" id="update" style="padding: 5px;">
                                  <div style="" class="box-content">
                                    <?php 
                                    $attributes = array('class' => 'form-horizontal validatable', 'id' => 'update_password', 'onSubmit' => 'return checkPassword();');
                                    echo form_open('update/updatePassword', $attributes);?>
                                      <div style="" class="padded">
                                        <div class="control-group">
                                          <label class="control-label">current password</label>
                                          <div class="controls">
                                            <input class="validate[required]" name="password" type="password" placeholder = "current password" required  />
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label">new password</label>
                                          <div class="controls">
                                            <input class="validate[required]" id="new_password" name="new_password" type="password" placeholder = "new password" required  />
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label">confirm new password</label>
                                          <div class="controls">
                                            <input class="validate[required]" id="confirm_password" name="confirm_password" type="password" placeholder = "confirm new password" required  />
                                          </div>
                                        </div>
                                      </div>
                                      <div class="form-actions">
                                        <button type="submit" class="btn btn-blue">update profile</button>
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
                            if ($this->session->userdata('change_p')) {
                              if ($this->session->userdata('change_p') == 'y') {
                                $msg = 'success! your password has been changed.';
                                echo '<script type="text/javascript">alert("'.$msg.'"); </script>';
                              } else if($this->session->userdata('change_p') == 't'){
                                $msg = 'sorry! incorrect details.';
                                echo '<script type="text/javascript">alert("'.$msg.'"); </script>';
                              } else {
                                $msg = 'sorry! could not change your password. please try again later';
                                echo '<script type="text/javascript">alert("'.$msg.'"); </script>';
                              }
                              $this->session->unset_userdata('change_p');
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