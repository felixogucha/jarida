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
                                <li class="active"> <a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> classes list </a></li>
                                <li> <a href="#add" data-toggle="tab"><i class="icon-plus"></i> create class </a></li>
                                <li> <a href="#add_stream" data-toggle="tab"><i class="icon-plus"></i> create stream </a></li>
                                <li> <a href="#add_specifics" data-toggle="tab"><i class="icon-plus"></i> add specific details </a></li>
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
                                          <th aria-label="class id: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting"><div>class id</div></th>
                                          <th aria-label="class name: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting"><div>class name</div></th>
                                          <th aria-label="term: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting"><div>term</div></th>
                                          <th aria-label="year: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting"><div>year</div></th>
                                          <th aria-label="class teacher: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting"><div>class teacher</div></th>
                                          <th aria-label="students: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting"><div>students</div></th>
                                          <th aria-label="options: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting"><div>options</div></th>
                                        </tr>
                                      </thead>
                                      <tbody aria-relevant="all" aria-live="polite" role="alert">
                                        <tr class="odd">
                                          <td class="  sorting_1">1</td>
                                          <td class=" ">7E/2/2014</td>
                                          <td class=" ">7 East</td>
                                          <td class=" ">3</td>
                                          <td class=" ">2014</td>
                                          <td class=" ">Eric Ayany</td>
                                          <td class=" "><a href="#">24</a></td>
                                          <td class=" " align="center"><a href="http://joyonto.net/projects/hms/index.php?admin/manage_doctor/edit/1" rel="tooltip" data-placement="top" data-original-title="edit" class="btn btn-blue"> <i class="icon-wrench"></i> </a> <a href="http://joyonto.net/projects/hms/index.php?admin/manage_doctor/delete/1" onclick="return confirm('delete?')" rel="tooltip" data-placement="top" data-original-title="delete" class="btn btn-red"> <i class="icon-trash"></i> </a></td>
                                        </tr>
                                      </tbody>
                                      </table>
                                  </div>
                                </div>
                                <!-- TABLE LISTING ENDS -->
                                <!-- CREATION FORM STARTS -->
                                <div class="tab-pane box" id="add" style="padding: 5px;">
                                  <div style="" class="box-content">
                                    <form style="" method="post" action="http://joyonto.net/projects/hms/index.php?admin/manage_doctor/create/" class="form-horizontal validatable">
                                      <div style="" class="padded">
                                        <div class="control-group">
                                          <label class="control-label">class code</label>
                                          <div class="controls">
                                            <input class="validate[required]" id="class_code" name="class_code" type="text" placeholder="This field is auto-generated" readonly/>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label">class name</label>
                                          <div class="controls">
                                            <select name="class_name" id="class_name" class="validate[required]" onChange="populateClassID()" >
                                              <option selected="selected" value="">Select class</option>
                                              <option value="1">1</option>
                                              <option value="2">2</option>
                                              <option value="3">3</option>
                                              <option value="4">4</option>
                                            </select>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label">stream</label>
                                          <div class="controls">
                                            <select name="stream_id" id="stream" class="validate[required]" onChange="populateClassID()">
                                              <option selected="selected" value="">Select Stream</option>
                                              <option value="N">North</option>
                                              <option value="E">East</option>
                                              <option value="S">South</option>
                                              <option value="W">West</option>
                                            </select>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label">class teacher</label>
                                          <div class="controls">
                                            <select name="teacher_id" class="validate[required]">
                                              <option selected="selected" value="">Select class teacher</option>
                                              <option value="16">Amos</option>
                                              <option value="7">Abel</option>
                                              <option value="8">Brenda</option>
                                              <option value="14">Lydia</option>
                                            </select>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label">term</label>
                                          <div class="controls">
                                            <select name="term_id" id="term" class="validate[required]" onChange="populateClassID()">
                                              <option selected="selected" value="">Select term</option>
                                              <option value="1">one</option>
                                              <option value="2">two</option>
                                              <option value="3">three</option>
                                            </select>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label">year</label>
                                          <div class="controls">
                                            <input class="validate[required]" id="year" name="year" type="text" onKeyup="populateClassID()" required/>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="form-actions">
                                        <button type="submit" class="btn btn-blue">create class</button>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                                <!-- CREATION FORM ENDS -->
                                <!-- CREATION FORM STARTS -->
                                <div class="tab-pane box" id="add_stream" style="padding: 5px;">
                                  <div style="" class="box-content">
                                    <form style="" method="post" action="http://joyonto.net/projects/hms/index.php?admin/manage_doctor/create/" class="form-horizontal validatable">
                                      <div style="" class="padded">
                                        <div class="control-group">
                                          <label class="control-label">stream name</label>
                                          <div class="controls">
                                            <input class="validate[required]" name="stream_name" type="text" placeholder = "stream name" required  />
                                          </div>
                                        </div>
                                      </div>
                                      <div class="form-actions">
                                        <button type="submit" class="btn btn-blue">create stream</button>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                                <!-- CREATION FORM ENDS -->
                                <!-- CREATING ANOTHER FORM STARTS -->
                                <div class="tab-pane box" id="add_specifics" style="padding: 5px;">
                                  <div style="" class="box-content">
                                    <?php 
                                      $attributes = array('class' => 'form-horizontal validatable');
                                      echo form_open('lispms/addNationality', $attributes);?>
                              
                                            <div class="control-group">
                                                <label class="control-label">fee amount (KShs.)</label>
                                                <div class="controls">
                                                    <input class="" name="fee_amount" placeholder="amount in KShs." type="text" requied>
                                                    <button type="submit" class="btn btn-blue">save</button>
                                                </div>
                                            </div>
                                    </form>
                                  </div>
                                </div>
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