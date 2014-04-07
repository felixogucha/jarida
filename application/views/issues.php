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
                                <li class="active"> <a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> issues list </a></li>
                                <li> <a href="#add" data-toggle="tab"><i class="icon-plus"></i> add an issue </a></li>
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
                                    <?php
                                    if (isset($image_name)) {
                                      # code...
                                      echo $image_name;
                                    }                                    
                                    /*
                                    if (!is_null($image_name)) {
                                      echo $image_name;
                                      }
                                    */
                                    ?>
                                    <table aria-describedby="DataTables_Table_0_info" id="DataTables_Table_0" class="dTable responsive dataTable" border="0" cellpadding="0" cellspacing="0">
                                      <thead>
                                        <tr role="row">
                                          <th aria-label="#: activate to sort column descending" aria-sort="ascending" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting_asc"><div>#</div></th>
                                          <th aria-label="magazine name: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting"><div>mag. name</div></th>
                                          <th aria-label="issue: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting"><div>issue no.</div></th>
                                          <th aria-label="headline: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting"><div>headline</div></th>
                                          <th aria-label="tag name: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting"><div>tag name</div></th>
                                          <th aria-label="date added: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting"><div>date added</div></th>
                                          <th aria-label="options: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting"><div>options</div></th>
                                        </tr>
                                      </thead>
                                      <tbody aria-relevant="all" aria-live="polite" role="alert">
                                        <?php
                                        if(!is_null($all_issues)) {
                                          $i = 1;
                                          foreach ($all_issues as $al_issues) {
                                              if($i%2 == 0) {
                                                  echo '<tr class="even">';
                                                } else {
                                                  echo '<tr class="odd">';
                                                  
                                                }
                                                //$file_path = realpath(APPPATH .'../mag_issues/'.$al_issues->issue_url);
                                                $file_path = base_url().'mag_issues/'.$al_issues->issue_url;
                                                echo '<td class="  sorting_1">'.$i.'</td>';
                                                echo '<td class=" ">'.$al_issues->magazine_name.'</td>';
                                                echo '<td class=" "><a href="'.$file_path.'" target="_blank">issue '.$al_issues->issue_no.'</a></td>';
                                                echo '<td class=" ">'.$al_issues->headline.'</td>';
                                                echo '<td class=" ">'.$al_issues->tag_name.'</td>';
                                                echo '<td class=" ">'.$al_issues->added_on.'</td>';

                                                echo '<td class=" " align="center">';
                                                if ($al_issues->status_id == 1) {
                                                  echo '<a href="unpublishIssue?key='.$al_issues->issue_id.'" rel="tooltip" data-placement="top" data-original-title="un publish" class="btn btn-blue"> <i class="icon-cloud-upload"></i> </a> ';
                                                } else {
                                                  echo '<a id="publish_issue" href="publishIssue?key='.$al_issues->issue_id.'" rel="tooltip" data-placement="top" data-original-title="publish" class="btn btn-red"> <i class="icon-cloud-download"></i> </a> ';
                                                }
                                                echo '<a href="editMagIssue?key='.$al_issues->issue_id.'" rel="tooltip" data-placement="top" data-original-title="edit" class="btn btn-blue"> <i class="icon-wrench"></i> </a> ';
                                                echo '<a href="deleteMagIssue?key='.$al_issues->issue_id.'" onclick="return confirm("Are you sure you want to delete this record?")" rel="tooltip" data-placement="top" data-original-title="delete" class="btn btn-red"> <i class="icon-trash"></i> </a>';
                                                echo '</td>';
                                                ?>
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
                                    echo form_open_multipart('insert/addIssue', $attributes);
                                    ?>
                                    <fieldset>
                                      <legend>Magazine issue information</legend>
                                      <div class="control-group">
                                          <label class="control-label">magazine</label>
                                          <div class="controls">
                                            <select name="magazine_id" id="class_name" class="validate[required]">
                                              <option selected="selected" value="">Select magazine</option>
                                              <?php
                                              if (!is_null($all_magazines)) {
                                                foreach ($all_magazines as $al_magazines) {
                                                  echo '<option value="'.$al_magazines->magazine_id.'">'.$al_magazines->magazine_name.'</option>';
                                                }
                                              }
                                              ?>
                                            </select>
                                          </div>
                                        </div>
                                      <div class="control-group">
                                          <label class="control-label">issue number</label>
                                          <div class="controls">
                                            <input class="validate[required]" name="issue_no" type="number" placeholder="issue number" required/>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label">issue headline</label>
                                          <div class="controls">
                                            <input class="validate[required]" name="headline" type="text" placeholder="headline for the issue" required/>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label">issue description</label>
                                          <div class="controls">
                                            <textarea class="textarea" name="description" placeholder="short description about the issue"></textarea>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label">price in dollars ($)</label>
                                          <div class="controls">
                                            <input class="validate[required]" name="price" type="text" placeholder="enter price in dollars" required/>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label">tag name</label>
                                          <div class="controls">
                                            <select name="tag_id" id="class_name" class="validate[required]">
                                              <option selected="selected" value="">Select tag</option>
                                              <?php
                                              if (!is_null($all_tags)) {
                                                foreach ($all_tags as $al_tags) {
                                                  echo '<option value="'.$al_tags->tag_id.'">'.$al_tags->tag_name.'</option>';
                                                }
                                              }
                                              ?>
                                            </select>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label">date of publication</label>
                                          <div class="controls">
                                            <input type="text" class="datepicker" name="created_on" data-date-format="yyyy-mm-dd" placeholder="Date when the issue was published">
                                          </div>
                                        </div>
                                    </fieldset>
                                    <fieldset>
                                      <legend>upload issue</legend>
                                      <div class="control-group">
                                          <label class="control-label">select file</label>
                                          <div class="controls">
                                            <input name="issue_url" type="file" required/>
                                          </div>
                                        </div>
                                    </fieldset>
                                      <div class="form-actions">
                                        <button type="submit" class="btn btn-blue">add issue</button>
                                      </div>

                                    </form>
                                  </div>
                                </div>
                                <!-- CREATION FORM ENDS -->
                                <!-- Creating dialog box begins-->
                                <div style="width: auto; margin: 0 auto; margin-left: 0px;" id="modal-simple" class="modal hide fade">
                                  <div class="modal-body">
                                    <img style="width: 90px; height: 90px;" src="<?php echo base_url();?>images/please_wait.gif" alt="Please wait..."/></br>Please wait...
                                  </div>
                                </div>
                                <!-- Creating dialog box ends-->

                              </div>
                            </div>
                          </div>
                        </div>
                        <?php $this->load->view('includes/footer');?>
                        <?php
                            if ($this->session->userdata('add_issue')) {
                              if ($this->session->userdata('add_issue') == 'y') {
                                $msg = 'success! issue has been added.';
                                echo '<script type="text/javascript">alert("'.$msg.'"); </script>';
                              } else {
                                $msg = 'sorry! could not add the issue. please try again later';
                                echo '<script type="text/javascript">alert("'.$msg.'"); </script>';
                              }
                              $this->session->unset_userdata('add_issue');
                            }

                            if ($this->session->userdata('edit_issue')) {
                              if ($this->session->userdata('edit_issue') == 'y') {
                                $msg = 'success! your issue has been updated.';
                                echo '<script type="text/javascript">alert("'.$msg.'"); </script>';
                              } else {
                                $msg = 'sorry! could not update your issue. please try again later';
                                echo '<script type="text/javascript">alert("'.$msg.'"); </script>';
                              }
                              $this->session->unset_userdata('edit_issue');
                            }

                            if ($this->session->userdata('del_issue')) {
                              if ($this->session->userdata('del_issue') == 'y') {
                                $msg = 'success! your issue has been deleted.';
                                echo '<script type="text/javascript">alert("'.$msg.'"); </script>';
                              } else {
                                $msg = 'sorry! could not delete the issue. please try again later';
                                echo '<script type="text/javascript">alert("'.$msg.'"); </script>';
                              }
                              $this->session->unset_userdata('del_issue');
                            }

                            if ($this->session->userdata('publish_iss')) {
                              if ($this->session->userdata('publish_iss') == 'y') {
                                $msg = 'success! your issue has been published.';
                                echo '<script type="text/javascript">alert("'.$msg.'"); </script>';
                              } else {
                                $msg = 'sorry! could not publish the issue. please try again later';
                                echo '<script type="text/javascript">alert("'.$msg.'"); </script>';
                              }
                              $this->session->unset_userdata('publish_iss');
                            }

                            if ($this->session->userdata('unpublish_iss')) {
                              if ($this->session->userdata('unpublish_iss') == 'y') {
                                $msg = 'success! your issue has been unpublished.';
                                echo '<script type="text/javascript">alert("'.$msg.'"); </script>';
                              } else {
                                $msg = 'sorry! could not unpublish the issue. please try again later';
                                echo '<script type="text/javascript">alert("'.$msg.'"); </script>';
                              }
                              $this->session->unset_userdata('unpublish_iss');
                            }
                              ?>
        </div>
    
<script type="text/javascript">
$('#publish_issue').click(function(){
  $("#modal-simple").modal("show");
  //unpublishIssue?key='.$al_issues->issue_id.'"
    
    var href = $('#publish_issue').attr('href');
    var st = href.split('?');
    var splitOther = st[1].split('=');

    var form_data = {
      key: splitOther[1],
      ajax: '1'
    };
    $.ajax({
      url: st[0],
      type: 'GET',
      data: form_data,
      success: function(msg){
        $("#modal-simple").modal("hide");
        if (msg == 'y') {alert('successfully published');} else if(msg == 't'){alert('could not generate images.');}else{alert('not successful published.');};
        //$('#DataTables_Table_0_wrapper').html();
        //$('#DataTables_Table_0_wrapper').html(data);
        //alert('success');
        
      }

    });

  return false;
});
</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-46775677-1', 'joyonto.net');
  ga('send', 'pageview');

</script><div class="ex-tooltip"></div><div id="galleryOverlay" style="display: none;"><div id="gallerySlider"></div><a id="prevArrow"><i class="icon-angle-left icon-4x"></i></a><a id="nextArrow"><i class="icon-angle-right icon-4x"></i></a></div></body></html>