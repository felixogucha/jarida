<script type="text/javascript">
$(document).on("click", ".open-EditCategory", function (e) {
  e.preventDefault();
  var _self = $(this);
  var myBookId = _self.data('id');
  $("#edit_cat").val(myBookId);

  $(_self.attr('href')).modal('show');
});
</script>
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
                                <li class="active"> <a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> magazines list </a></li>
                                <li> <a href="#add" data-toggle="tab"><i class="icon-plus"></i> add a magazine </a></li>
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
                                          <th aria-label="magazine: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting"><div>magazine name</div></th>
                                          <th aria-label="magazine desc: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting"><div>magazine description</div></th>
                                          <th aria-label="category: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting"><div>category</div></th>
                                          <th aria-label="publisher: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting"><div>publisher</div></th>
                                          <th aria-label="publish: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting"><div>publish</div></th>
                                          <th aria-label="options: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting"><div>options</div></th>
                                        </tr>
                                      </thead>
                                      <tbody aria-relevant="all" aria-live="polite" role="alert">
                                        <?php
                                        if(!is_null($all_magazines))
                                        {
                                          $i = 1;
                                          foreach ($all_magazines as $al_magazines) {
                                            # code...
                                            if($i%2 == 0) {
                                              echo '<tr class="even">';
                                            } else {
                                              echo '<tr class="odd">';
                                            }
                                            echo '<td class="  sorting_1">'.$i.'</td>';
                                            echo '<td class=" ">'.$al_magazines->magazine_name.'</td>';
                                            echo '<td class=" ">'.$al_magazines->magazine_desc.'</td>';
                                            echo '<td class=" ">'.$al_magazines->category.'</td>';
                                            echo '<td class=" ">'.$al_magazines->publisher_name.'</td>';
                                            if ($al_magazines->status == "published") {
                                              echo '<td style="text-align: center;"><a href="unpublishMagazine?key='.$al_magazines->magazine_id.'" rel="tooltip" data-placement="top" data-original-title="un publish" class="btn btn-blue"> <i class="icon-cloud-upload"></i> </a></td>';
                                              //echo '<td class=" ">-</td>';
                                            } else {
                                              echo '<td style="text-align: center;"><a href="publishMagazine?key='.$al_magazines->magazine_id.'" rel="tooltip" data-placement="top" data-original-title="publish" class="btn btn-red"> <i class="icon-cloud-download"></i> </a></td>';
                                            }
                                            ?><td class=" " align="center"><a href="editMagazine?key=<?php echo $al_magazines->magazine_id;?>" rel="tooltip" data-placement="top" data-original-title="edit" class="btn btn-blue"> <i class="icon-wrench"></i> </a> <a href="deleteMagazine?key=<?php echo $al_magazines->magazine_id?>" onclick="return confirm('Are you sure you want to delete this recored?')" rel="tooltip" data-placement="top" data-original-title="delete" class="btn btn-red"> <i class="icon-trash"></i> </a></td>
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
                                      if (!is_null($all_publishers)) {
                                        foreach ($all_publishers as $al_publishers) {
                                          if($al_publishers->publisher_Id == $this->session->userdata('publisher_id'))
                                          {
                                            $attributes = array('class' => 'form-horizontal validatable');
                                            echo form_open('insert/addMagazine', $attributes);
                                            ?>
                                    
                                              <div style="" class="padded">

                                                <fieldset>
                                                  <legend>magazine information</legend>
                                                    <div class="control-group">
                                                    <label class="control-label">publisher</label>
                                                    <div class="controls">
                                                      <input class="validate[required]" name="publisher_id" value="<?php echo $this->session->userdata('publisher_id');?>" type="hidden" placeholder="publisher" readonly/>
                                                      <input class="validate[required]" name="added_by" value="<?php echo $this->session->userdata('user_id');?>" type="hidden" placeholder="added by" readonly/>
                                                      <input class="validate[required]" value="<?php echo $al_publishers->publisher_name;?>" type="text" placeholder="name of the publisher" readonly/>
                                                    </div>
                                                  </div>
                                                  <div class="control-group">
                                                    <label class="control-label">magazine name</label>
                                                    <div class="controls">
                                                      <input class="validate[required]" name="magazine_name" type="text" placeholder="name of the magazine" required/>
                                                    </div>
                                                  </div>
                                                  <div class="control-group">
                                                    <label class="control-label">magazine description</label>
                                                    <div class="controls">
                                                      <textarea class="textarea" name="magazine_desc" placeholder="short description about the magazine"></textarea>
                                                    </div>
                                                  </div>
                                                  <div class="control-group">
                                                    <label class="control-label">category</label>
                                                    <div class="controls">
                                                      <select name="category_id" id="class_name" class="validate[required]">
                                                        <option selected="selected" value="">Select category</option>
                                                        <?php
                                                        if (!is_null($all_categories)) {
                                                          foreach ($all_categories as $al_categories) {
                                                            echo '<option value="'.$al_categories->category_id.'">'.$al_categories->category.'</option>';
                                                          }
                                                        }
                                                        ?>
                                                      </select>
                                                    </div>
                                                  </div>
                                                </fieldset>
                                              </div>
                                              <div class="form-actions">
                                                <button type="submit" class="btn btn-blue">add magazine</button>
                                              </div>
                                            </form>
                                            <?php
                                          }
                                        }
                                      } else {
                                        # code...
                                      }
                                      
                                    ?>
                                  </div>
                                </div>
                                <!-- CREATION FORM ENDS -->

                                <!-- ADD A NEW CATEGORY ENDS-->
                              </div>
                            </div>
                          </div>
                        </div>

                        <!-- Edit Category starts-->

                        <div id="open-EditCategory" class="modal hide fade">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h6 id="modal-tablesLabel">edit category</h6>
                          </div>
                          <div class="modal-body">
                            <?php 
                                $attributes = array('class' => 'separate-sections');
                                echo form_open('update/magCategory', $attributes);
                                ?>
                                <input id="edit_cat" name="edit_cat" placeholder="category name" style="margin-bottom: 0px !important;" type="text">
                                <input value="update" class="btn btn-blue btn-medium" type="submit">
                            </form>
                        </div>
                          <div class="modal-footer">
                            <button class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                        </div>

                        <!-- Edit Category ends-->

                        <?php $this->load->view('includes/footer');?>
                        <?php
                            if ($this->session->userdata('add_mag')) {
                              if ($this->session->userdata('add_mag') == 'y') {
                                $msg = 'success! magazine has been added.';
                                echo '<script type="text/javascript">alert("'.$msg.'"); </script>';
                              } else {
                                $msg = 'sorry! magazine could not be added. please try again later';
                                echo '<script type="text/javascript">alert("'.$msg.'"); </script>';
                              }
                              $this->session->unset_userdata('add_mag');
                            }

                            if ($this->session->userdata('edit_mag')) {
                              if ($this->session->userdata('edit_mag') == 'y') {
                                $msg = 'success! magazine has been edited.';
                                echo '<script type="text/javascript">alert("'.$msg.'"); </script>';
                              } else {
                                $msg = 'sorry! magazine could not be edited. please try again later';
                                echo '<script type="text/javascript">alert("'.$msg.'"); </script>';
                              }
                              $this->session->unset_userdata('edit_mag');
                            }

                            if ($this->session->userdata('del_mag')) {
                              if ($this->session->userdata('del_mag') == 'y') {
                                $msg = 'success! magazine has been deleted.';
                                echo '<script type="text/javascript">alert("'.$msg.'"); </script>';
                              } else {
                                $msg = 'sorry! magazine could not be deleted. please try again later';
                                echo '<script type="text/javascript">alert("'.$msg.'"); </script>';
                              }
                              $this->session->unset_userdata('del_mag');
                            }

                            if ($this->session->userdata('publish_mag')) {
                              if ($this->session->userdata('publish_mag') == 'y') {
                                $msg = 'success! magazine has been updated.';
                                echo '<script type="text/javascript">alert("'.$msg.'"); </script>';
                              } else {
                                $msg = 'sorry! magazine could not be updated. please try again later';
                                echo '<script type="text/javascript">alert("'.$msg.'"); </script>';
                              }
                              $this->session->unset_userdata('publish_mag');
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