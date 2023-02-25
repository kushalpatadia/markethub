<script type="text/javascript" src="{SITE_JS}image_crop/cropper.js"></script>
<script type="text/javascript" src="{SITE_JS}image_crop/tooltip.min.js"></script>
<script type="text/javascript" src="{SITE_JS}image_crop/main.js"></script>

<section class="inner-section">
    <div class="container">
      <div class="section-titile">
        <h2>Profile</h2>
        <div class="line">&nbsp;</div>
      </div>
      <div class="profile-content">
        <div class="row">
          <div class="col-md-3">
            <div class="drop-box-block">
              <div class="user-left-photo">
                <p><img src="%COVER_IMAGE%" alt=""> <a href="javascript:void(0);" class="edit-btn company-edit-btn" data-toggle="modal" data-target="#avatar-modal_cover"><i class="fa fa-pencil"></i></a> </p>
              </div>
            </div>
          </div>
          <div class="col-md-9">
            <div class="pro-right-content">
              <div class="drop-box-block">
                <h2 class="sec-title">Edit profile</h2>
                <div class="experience-content">
                  <div class="common-form pad-btm-none">
                    <form action="" method="POST" name="frm_profile" id="frm_profile">
                      <div class="row">
                        <div class="col-sm-3">
                          <div class="user-left-photo company-inside-photo">
                            <p><img src="%PROFILE_IMG%" alt="%COMPANY_NAME%"><a href="javascript:void(0);" class="edit-btn company-edit-btn" data-toggle="modal" data-target="#avatar-modal"><i class="fa fa-pencil"></i></a></p>
                          </div>
                        </div>
                        <div class="col-sm-6 col-sm-offset-1 pad-top20">
                          <div class="form-group">
                            <label>Company name<span class="red-text">*</span></label>
                            <input type="text" placeholder="Enter company name" class="form-control" id="company_name" name="company_name" value="%COMPANY_NAME%">
                          </div>
                          <div class="form-group">
                            <label>Industry type<span class="red-text">*</span></label>
                            <div class="form-control">
                              <div class="root"> <span class="value">Industry type</span>
                                <select id="industry" name="industry">
                                  %OPTION_INDUSTRY%
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label>Country</label>
                            <div class="form-control">
                              <div class="root"> <span class="value">Select country</span>
                                <select name="country" id="country">
                                  %OPTION_COUNTRY%
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label>State</label>
                            <div class="form-control">
                              <div class="root"> <span class="value">Select State</span>
                                <select id="state" name="state">
                                  %OPTION_STATE%
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label>City</label>
                            <div class="form-control">
                              <div class="root"> <span class="value">Select City</span>
                                <select name="city" id="city">
                                  %OPTION_CITY%
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label>Established date<span class="red-text"></span></label>
                            <input type="text" class="form-control" id="establish_date" name="establish_date" value="%ESTABLISH_DATE%" readonly>
                          </div>
                          <div class="form-group">
                            <label>Company description</label>
                            <textarea class="form-control" placeholder="About Company" value="%ABOUT_COMPANY%" name="about_company" id="about_company" >%ABOUT_COMPANY%</textarea>
                          </div>
                          <div class="form-group">
                            <input type="hidden" name="tbl_company_details_id" value="%TBL_COMPANY_DETAILS_ID%">
                            <input type="submit" class="transparent-btn btn-space" value="Save" name="sbt_profile">
                            <button type="button" class="common-btn">Cancel</button>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="clearfix"></div>
    </div>
  </section>

<!--Company Profile Image -->
<div id="crop-avatar">
  <div class="modal fade" id="avatar-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog" tabindex="-1">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <form class="avatar-form" id="avtar_form"  enctype="multipart/form-data" method="post">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title" id="avatar-modal-label">Change Profile Image</h4>
                  </div>
                  <div class="modal-body">
                  <div class="avatar-body">
                    <div class="avatar-upload">
                          <input type="hidden" class="avatar-src" name="avatar_src">
                          <input type="hidden" class="avatar-data" name="avatar_data"> 
                          <label for="avatarInput">Local upload</label>
                          <input type="file" class="avatar-input" id="avatarInput" name="avatar_file">
                      </div>
                      <div class="row">
                          <div class="col-md-9">
                              <div class="avatar-wrapper">    
                              </div>
                          </div>
                          <div class="col-md-3">
                              <div class="avatar-preview preview-lg"></div>
                              <div class="avatar-preview preview-md"></div>
                              <div class="avatar-preview preview-sm"></div>
                          </div>
                      </div>

                      <div class="row avatar-btns">
                          <div class="col-md-9">
                              <div class="btn-group">
                                  <button type="button" class="btn btn-primary" data-method="rotate" data-option="-90" title="Rotate -90 degrees">Rotate Left</button>
                                  <button type="button" class="btn btn-primary" data-method="rotate" data-option="-15">-15deg</button>
                                  <button type="button" class="btn btn-primary" data-method="rotate" data-option="-30">-30deg</button>
                                  <button type="button" class="btn btn-primary" data-method="rotate" data-option="-45">-45deg</button>
                              </div>
                              <div class="btn-group">
                                  <button type="button" class="btn btn-primary" data-method="rotate" data-option="90" title="Rotate 90 degrees">Rotate Right</button>
                                  <button type="button" class="btn btn-primary" data-method="rotate" data-option="15">15deg</button>
                                  <button type="button" class="btn btn-primary" data-method="rotate" data-option="30">30deg</button>
                                  <button type="button" class="btn btn-primary" data-method="rotate" data-option="45">45deg</button>
                              </div>
                          </div>
                          <div class="col-md-3">
                              <button type="submit" class="btn btn-primary btn-block avatar-save" onclick="return showdata();">Done</button>
                          </div>
                      </div>
                  </div>
                  </div>
              </form>
          </div>
      </div>
</div><!-- /.modal -->

<!--Company Cover Image -->
<div id="crop-avatar">
  <div class="modal fade" id="avatar-modal_cover" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog" tabindex="-1">
      <div class="modal-dialog modal-md">
          <div class="modal-content">
              <form class="avatar-form" id="avtar_form_cover"  enctype="multipart/form-data" method="post">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title" id="avatar-modal-label">Change Cover Image</h4>
                  </div>
                  <div class="modal-body">
                  <div class="avatar-body">
                    <div class="avatar-upload">
                          <input type="hidden" class="avatar-src" name="avatar_src">
                          <input type="hidden" class="avatar-data" name="avatar_data"> 
                          <label for="avatarInput">Local upload</label>
                          <input type="file" class="avatar-input" id="avatarInput" name="avatar_file">
                      </div>
                      <!-- <div class="row">
                          <div class="col-md-9">
                              <div class="avatar-wrapper">    
                              </div>
                          </div>
                          <div class="col-md-3">
                              <div class="avatar-preview preview-lg"></div>
                              <div class="avatar-preview preview-md"></div>
                              <div class="avatar-preview preview-sm"></div>
                          </div>
                      </div> -->

                      <div class="row avatar-btns">
                          <!-- <div class="col-md-9">
                              <div class="btn-group">
                                  <button type="button" class="btn btn-primary" data-method="rotate" data-option="-90" title="Rotate -90 degrees">Rotate Left</button>
                                  <button type="button" class="btn btn-primary" data-method="rotate" data-option="-15">-15deg</button>
                                  <button type="button" class="btn btn-primary" data-method="rotate" data-option="-30">-30deg</button>
                                  <button type="button" class="btn btn-primary" data-method="rotate" data-option="-45">-45deg</button>
                              </div>
                              <div class="btn-group">
                                  <button type="button" class="btn btn-primary" data-method="rotate" data-option="90" title="Rotate 90 degrees">Rotate Right</button>
                                  <button type="button" class="btn btn-primary" data-method="rotate" data-option="15">15deg</button>
                                  <button type="button" class="btn btn-primary" data-method="rotate" data-option="30">30deg</button>
                                  <button type="button" class="btn btn-primary" data-method="rotate" data-option="45">45deg</button>
                              </div>
                          </div> -->
                          <div class="col-md-3">
                              <button type="submit" class="btn btn-primary btn-block avatar-save" onclick="return showdata_cover();">Done</button>
                          </div>
                      </div>
                  </div>
                  </div>
              </form>
          </div>
      </div>
</div><!-- /.modal -->

<script type="text/javascript">
function showdata(){
    var formnew = document.getElementById("avtar_form"); 
    var formData = new FormData(formnew);
    jQuery.ajax({
      url: 'modules-nct/edit_company_profile-nct/crop.php',
      type: 'post',
      dataType:'json',
      data:  formData,
      processData: false,  // tell jQuery not to process the data
      contentType: false ,  // tell jQuery not to set contentType
      enctype: 'multipart/form-data',
      mimeType: 'multipart/form-data',
      cache: false,
      success: function(data) {
        console.log(data.result);
        //$("#profile_photo_id").attr('src', data.result);
        window.location.href=SITE_URL+"Edit-company-profile";
      }
    });
}
</script>

<script type="text/javascript">
function showdata_cover(){

    var formnew = document.getElementById("avatar-modal_cover"); 
    var formData = new FormData(formnew);
    
    jQuery.ajax({
      url: 'modules-nct/edit_company_profile-nct/crop_cover.php',
      type: 'post',
      dataType:'json',
      data:  formData,
      processData: false,  // tell jQuery not to process the data
      contentType: false ,  // tell jQuery not to set contentType
      enctype: 'multipart/form-data',
      mimeType: 'multipart/form-data',
      cache: false,
      success: function(data) {
        console.log(data.result);
        //$("#profile_photo_id").attr('src', data.result);
        window.location.href=SITE_URL+"Edit-company-profile";
      }
    });
}
</script>

<script>

    $('#establish_date').datepicker();

    $(document).ready(function(){
        $(document).on("change","#country",function(){
            var cId=$(this).val();
            if (cId > 0) {
                $.ajax({
                    url: '{SITE_URL}modules-nct/'+MODULE+'/ajax.'+MODULE+'.php',
                    type: 'post',
                    dataType: 'json',
                    data: {action : 'getStates',cid:cId},
                    success:function(response){
                        $("#state").html(response.states)
                    }
                })
            }
            else{
                $('#state').html('<option value="">Select Country</option>');
                $('#city').html('<option value="">Select State</option>');
            }
        });
        $(document).on("change","#state",function(){
            var sId=$(this).val();
            if (sId > 0) {
                $.ajax({
                    url: '{SITE_URL}modules-nct/'+MODULE+'/ajax.'+MODULE+'.php',
                    type: 'post',
                    dataType: 'json',
                    data: {action : 'getCities',sid:sId},
                    success:function(response){
                        $("#city").html(response.cities)
                    }
                })
            }else{
                $('#city').html('<option value="">Select State</option>');
            }
        });
    });
</script>

