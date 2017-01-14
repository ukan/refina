<style type="text/css">
    .modal-body .col-md-6 .form-group{
        margin-left: 10px;
        margin-right: 10px;
    }
</style>
    <div class="modal fade modal-getstart" id="editProfile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="" role="document" style="max-width:1027px;margin:10px auto">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Edit Profile</h4>
        </div>
        <div class="modal-body">

        {!! Form::open($form) !!}     
        <div class="row">            
            <div class="col-md-12">                
                <div class="form-group">
                    <div class="upload-msg" style="display: none;">
                        Upload a file to start cropping
                    </div>
                    <div class="box-upload-demo" style="display: none;"></div>
                    <div class="box-peview-avatar" align="center">
                        <img src="{{ user_info('avatar_path') }}" width="120" class="img-circle img-responsive">
                    </div>
                </div>
                        
                <div class="form-group demo-wrap upload-demo ">
                    {!! Form::label('avatar', 'Avatar', ['class' => 'col-md-3 control-label']) !!}
                    <div class="actions">
                        <a class="btn file-btn">
                            <span class="btn btn-primary">Upload</span>
                            <input type="file" id="avatar" name="avatar" value="Choose a file" accept="image/*" />
                            <input type="hidden" name="image_base64_edit" id="image_base64_edit" value=""></input>
                            <input type="hidden" name="filename_edit" id="image_filename_edit" value=""></input>
                        </a>
                        <button type="button" id="btn-crop" class="btn btn-success upload-result-edit" style="display: none;"><i class="fa fa-check"></i> Crop</button>
                        <p class="has-error text-danger edit-profile-avatar"></p>
                    </div>
                </div>
            </div>
        </div>            
            <div class="col-md-6">
                <div class="form-group">
                    <label for="inputReadOnly">Scoido ID</label>
                    <div>                        
                      <div class = "input-group">
                        <input type="text" value="{{ user_info('member_id') }}" id="inputReadOnly" class="form-control" readonly="readonly">                
                         <span class = "input-group-addon"><i class="fa fa-question-circle" rel="tooltip" title="Dapat Anda gunakan untuk mempromosikan halaman affiliate Anda (scoido.com/{{ user_info('member_id') }}) dan dapatkan komisi bulanan untuk setiap customer yang mendaftar"></i></span>
                      </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>First Name <b class="text-danger">*</b></label>
                    <div>
                        {!! Form::text('first_name', user_info('first_name'), ['class' => 'form-control']) !!}
                        <p class="has-error text-danger edit-profile-first_name"></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Last Name</label>
                    <div>
                        {!! Form::text('last_name', user_info('last_name'), ['class' => 'form-control']) !!}
                        <p class="has-error text-danger edit-profile-last_name"></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group{{ Form::hasError('gender') }}">
                    <label>Gender <b class="text-danger">*</b></label>
                    <div>
                        <div class="radio-inline">
                            <input id="radioExample1" name="gender" type="radio" value="male">
                            <label for="radioExample1">Male</label>
                        </div>
                        <div class="radio-inline">
                            <input id="radioExample1" name="gender" type="radio" value="female">
                            <label for="radioExample1">Female</label>
                        </div>
                        <p class="has-error text-danger edit-profile-gender"></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
      <!--           <div class="form-group{{ Form::hasError('last_name') }}">
                    <label>Place Of Birth <b class="text-danger">*</b></label>
                    <div>
                        {!! Form::text('place_of_birth', user_info('place_of_birth'), ['class' => 'form-control']) !!}
                        <p class="has-error text-danger edit-profile-place_of_birth"></p>
                    </div>
                </div> -->

                <div class="form-group">
                    <label>Date Of Birth <b class="text-danger">*</b></label>
                    <div>
                        {!! Form::text('date_of_birth', user_info('date_of_birth'), ['class' => 'form-control datepicker-birthday']) !!}
                        <p class="has-error text-danger edit-profile-date_of_birth"></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <!-- <div class="form-group{{ Form::hasError('email') }}">
                    {!! Form::label('email', 'Email', ['class' => 'col-md-3 control-label']) !!}
                    <div>
                        {!! Form::text('email', user_info('email'), ['class' => 'form-control']) !!}
                        {!! Form::errorMsg('email') !!}
                    </div>
                </div> -->

                <div class="form-group hidden">
                    {!! Form::label('pin_bbm', 'Pin BBm', ['class' => 'col-md-3 control-label']) !!}
                    <div>
                        {!! Form::text('pin_bbm', user_info('pin_bbm'), ['class' => 'form-control','maxlength' => 8 ]) !!}
                        <p class="text-helper">Min 6 Characters</p>
                        <p class="has-error text-danger edit-profile-pin_bbm"></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Phone <b class="text-danger">*</b></label>
                    <div>
                        {!! Form::text('phone', user_info('phone'), ['class' => 'form-control','maxlength' => 13 ]) !!}
                        <p class="text-helper">Max 13 Digit</p>
                        <p class="has-error text-danger edit-profile-phone"></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <!-- <div class="form-group{{ Form::hasError('country') }}">
                    {!! Form::label('country', 'Country', ['class' => 'col-md-3 control-label']) !!}
                    <div>
                        {!! Form::text('country', null, ['class' => 'form-control']) !!}
                        {!! Form::errorMsg('country') !!}
                    </div>
                </div> -->


                <div class="form-group">
                    <label>Province <b class="text-danger">*</b></label>
                    <div>
                        <select name="province" id="province_id" onchange="ajaxdistrict(this.value)" data-plugin-selectTwo class="form-control populate" style="width:100%">
                            
                            <option value="">Choice Province</option>                       
                            {{ user_info('select_province') }}  
                        </select>
                        <p class="has-error text-danger edit-profile-province"></p>
                    </div>
                </div>
                <div class="form-group">
                    <label>City / District <b class="text-danger">*</b></label>
                    <div>
                        <select name="city" id="district_id" onchange="ajaxsubdistrict(this.value)" data-plugin-selectTwo class="full-width" style="width:100%" >
                            <option value="">Choice City / District</option>                                
                            {{ user_info('select_city') }}  
                        </select>
                        <p class="has-error text-danger edit-profile-city"></p>
                    </div>
                </div>
                <div class="form-group">
                    <label>Sub District <b class="text-danger">*</b></label>
                    <div>
                       <select name="district" id="sub_district_id" onchange="ajaxvillage(this.value)" data-plugin-selectTwo class="full-width" style="width:100%">
                            <option value="">Choice Sub District</option>                                   
                            {{ user_info('select_district') }}                  
                        </select>
                        <p class="has-error text-danger edit-profile-district"></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Address <b class="text-danger">*</b></label>
                    <div>
                        
                        <textarea name="address" class="form-control" rows="4">{{ user_info('address') }}</textarea>
                        <p class="has-error text-danger edit-profile-address"></p>
                    </div>
                </div>
                <div class="form-group">
                    <label>Postal Code <b class="text-danger">*</b></label>
                    <div>
                        {!! Form::text('postal_code', user_info('postal_code'), ['class' => 'form-control' , 'maxlength' => 5]) !!}
                        <p class="has-error text-danger edit-profile-postal_code"></p>
                    </div>
                </div>
            </div>
            <div class="clearfix">&nbsp;</div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>KTP Number <b class="text-danger">*</b></label>
                    <div>
                        {!! Form::text('ktp_number', user_info('ktp_number'), ['class' => 'form-control','maxlength' => 16]) !!}
                        <p class="has-error text-danger edit-profile-ktp_number"></p>
                    </div>
                </div>

                <div class="form-group">
                    <label>KTP Photo <b class="text-danger">*</b></label>
                    <div class="">
                        {!! form_input_file_img('file','ktp_photo',user_info('ktp_photo_path')) !!}
                        <input type="hidden" name="value_ktp_photo" value="{{ user_info('ktp_photo') }}">
                        <p class="has-error text-danger edit-profile-value_ktp_photo"></p>
                        <p class="has-error text-danger edit-profile-ktp_photo"></p>
                    </div>
                </div>

                <div class="form-group">
                    <div id="box-image-ktp" class="col-md-offset-3"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>NPWP Number</label>                    
                    <div>
                        {!! Form::text('npwp_number', user_info('npwp_number'), ['class' => 'form-control','maxlength' => '15']) !!}
                        <p class="has-error text-danger edit-profile-npwp_number"></p>
                    </div>
                </div>
                <div class="form-group{{ Form::hasError('npwp_photo') }}">
                    <label>NPWP Photo</label>
                    <div class="">
                        {!! form_input_file_img('file','npwp_photo',user_info('npwp_photo_path')) !!}
                        <p class="has-error text-danger edit-profile-npwp_photo"></p>
                    </div>
                </div>
                <div class="form-group">
                    <div id="box-image-npwp" class="col-md-offset-3"></div>
                </div>
            </div>
            <div class="clearfix">&nbsp;</div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Know Scoido From <b class="text-danger">*</b></label>
                    <div>
                        <div class="radio-inline">
                            <input id="radioExample2" name="information" type="radio" value="Search_Engine">
                            <label for="radioExample2">Search Engine</label>
                        </div>
                        <div class="radio-inline">
                            <input id="radioExample1" name="information" type="radio" value="Sosial_Media">
                            <label for="radioExample1">Sosial Media</label>
                        </div>
                        <div class="radio-inline">
                            <input id="radioExample2" name="information" type="radio" value="Iklan_Banner">
                            <label for="radioExample2">Iklan Banner</label>
                        </div>
                        <div class="radio-inline">
                            <input id="radioExample1" name="information" type="radio" value="Saudara">
                            <label for="radioExample1">Saudara</label>
                        </div>
                        <div class="radio-inline">
                            <input id="radioExample2" name="information" type="radio" value="Teman-Kerabat">
                            <label for="radioExample2">Teman/Kerabat</label>
                        </div>
                        <div class="radio-inline">
                            <input id="radioExample1" name="information" type="radio" value="Lainnya">
                            <label for="radioExample1">Lainnya</label>
                        </div>
                        <p class="has-error text-danger edit-profile-information"></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <?php 
                if(user_info('funnels_name') != ''){
                    $input_status = 'readonly';
                    $agree = true;
                }else{
                    $input_status = '';
                    $agree = null;
                }
                ?>
                <div class="form-group{{ Form::hasError('funnels_name') }}">
                    <label>Funnels Name <b class="text-danger">*</b></label>
                    <div>
                                    
                      <div class = "input-group">
                        <input type="text" name="funnels_name" value="{{ user_info('funnels_name') }}" class="form-control" <?php echo $input_status; ?> >
                         <span class = "input-group-addon"><i class="fa fa-question-circle" rel="tooltip" title="Funnels Name akan digunakan sebagai URL master setiap funnels Anda, dan hanya dapat diinput 1x"></i></span>
                      </div>
                        <small class="text-muted">Anda hanya dapat melakukan 1 kali perubahan dalam field ini</small>
                        <p class="has-error text-danger edit-profile-funnels_name"></p>
                        <p class="has-error text-danger warning-after-save">Affter Save the progress, this field cannot be undone</p>
                    </div>
                </div>
            </div>
                <div class="form-group "> 
                    <div class="col-md-12">
                    <center>
                    {{ Form::checkbox('agree', 1, $agree) }}
                    Saya setuju mengikuti <a href="http://support.scoido.com/term" target="_blank">Syarat & Ketentuan</a> yang berlaku di Scoido
                    </center>
                        <p class="has-error text-danger edit-profile-agree"></p>
                                    
                    </div>                   
                </div>



                <div class="form-group">
                    <center>
                        {!! Form::submit('Save', ['class' => 'btn btn-primary', 'title' => 'Save']) !!}&nbsp;&nbsp;&nbsp;
                        <button class="btn btn-default modal-dismiss" type="button" data-dismiss="modal" aria-label="Close" styl>Cancel</button>
                    </center>
                </div>
            {!! Form::close() !!}
        </div>

      </div>
    </div>
  </div>