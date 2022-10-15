<!DOCTYPE html>
<html>
<head>
    <title>CWS Laravel Machine Test</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"/>
    <!-- Bootstrap datepicker JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

    <style>
              .gradient-custom {
        /* fallback for old browsers */
        background: #f093fb;

        /* Chrome 10-25, Safari 5.1-6 */
        background: -webkit-linear-gradient(to bottom right, rgba(240, 147, 251, 1), rgba(245, 87, 108, 1));

        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        background: linear-gradient(to bottom right, rgba(240, 147, 251, 1), rgba(245, 87, 108, 1))
        }

        .card-registration .select-input.form-control[readonly]:not([disabled]) {
        font-size: 1rem;
        line-height: 2.15;
        padding-left: .75em;
        padding-right: .75em;
        }
        .card-registration .select-arrow {
        top: 13px;
        }
  </style>  
  
  </head>
<body>
       
    <section class="vh-150 gradient-custom">
        <div class="container py-5 h-100">
          <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-7">
              <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                <div class="card-body p-4 p-md-5">
                  
                  <h3 class="  pb-2 pb-md-0 mb-md-5">Applicant Registration Form <a href="/applicant" class="btn btn-primary pull-right" role="button" aria-pressed="true">View All Applicant</a>
                    <br><br></h3>
                  

                  <div class="alert alert-danger print-error-msg" style="display:none">
                    <ul></ul>
                  </div>

                  <form enctype="multipart/form-data" id="applicantForm">
                    @csrf
                    <div class="row">
                      <div class="col-md-6 mb-1 ">
      
                        <div class="form-outline">
                          <label class="form-label" for="firstName">First Name</label>
                          <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}" class="form-control form-control-lg" />
                          <span class="text-danger error-text first_name_err"></span>
                        </div>
      
                      </div>
                      <div class="col-md-6 mb-1 ">
                        <div class="form-outline">
                            <label class="form-label" for="lastName">Last Name</label>
                            <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}" class="form-control form-control-lg" />
                            <span class="text-danger error-text last_name_err"></span>
                          </div>
      
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-1  pb-2">
        
                          <div class="form-outline">
                            <label class="form-label" for="emailAddress">Email</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control form-control-lg" onchange="checkEmail()" />
                            <span class="text-danger error-text email_err"></span>
                          </div>
        
                        </div>
                        <div class="col-md-6 mb-1  pb-2">
        
                          <div class="form-outline">
                            <label class="form-label" for="phoneNumber">Phone Number</label>
                            <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" class="form-control form-control-lg" />
                            <span class="text-danger error-text phone_err"></span>
                          </div>
        
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mb-1">
        
                          <div class="form-outline">
                            <label class="form-label" for="emailAddress">Address</label>
                            <textarea class="form-control form-control-lg" name="address" value="{{ old('address') }}" id="address"></textarea>
                          </div>
        
                        </div>
                    </div>

                    <div class="row">
                      <div class="col-md-8 mb-1  d-flex align-items-center">
                        <div class="form-outline w-100 date" data-provide="datepicker"">
                           <label for="birthdayDate" class="form-label">Birthday</label>
                           <input type="text" class="form-control form-control-lg" onchange="dobCheck()" id="dobdata-date" name="dob" value="{{ old('dob') }} "/> 
                           <div class="input-group-addon">
                              <i class="fa fa-calendar" aria-hidden="true"></i>
                            </div>
                         </div>
                      </div>
                      <div class="col-md-4 mb-1">
                        <br>
                        <h6 class="mb-2 pb-1">Gender: </h6>
      
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" name="gender" type="radio" id="gender"
                            value="Male" checked />
                          <label class="form-check-label" for="femaleGender">Female</label>
                        </div>
      
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="gender" id="gender"
                            value="Female" />
                          <label class="form-check-label" for="maleGender">Male</label>
                        </div>
      
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-4">
        
                          <div class="form-outline">
                            <label class="form-label" for="emailAddress">Profile Photo</label>
                            <input type="file" class="form-control form-control-lg" name="applicant_photo" id="applicant_photo">
                            <span class="text-danger error-text applicant_photo_err"></span>
                          </div>
        
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-4">
        
                          <div class="form-outline">
                            <label class="form-label" for="emailAddress">Resume</label>
                            <input type="file" class="form-control form-control-lg" name="resume" id="resume">
                            <span class="text-danger error-text resume_err"></span>
                          </div>
        
                        </div>
                    </div>
                    <div class="mt-4 pt-2">
                      <button class="btn btn-success btn-submit btn-lg">Submit</button>&nbsp;&nbsp;
                      <input type="reset" name="reset" value="Reset" class="btn btn-dark btn btn-primary btn-lg">
                    </div>
                    <br>
                    <div class="alert alert-warning" id="successMsg" role="alert">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <script>
        function checkEmail() {
            var email = document.getElementById('email');
            var filter = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            if (!filter.test(email.value)) {
               $('.email_err').text('Please provide a valid email address');
                return false;
            }
            $('.email_err').text('');
        }
        </script> 

       
      <script type="text/javascript">
       
        jQuery(document).ready(function() {
          $('#successMsg').hide();
          jQuery(".btn-submit").click(function(e){
                
               e.preventDefault();
                
                var _token      =   $("input[name='_token']").val();
                var first_name  =   $("input[name='first_name']").val();
                var last_name   =   $("input[name='last_name']").val();
                var phone       =   $("input[name='phone']").val();
                var email       =   $("input[name='email']").val();
                var address     =   $("textarea[name='address']").val();
                var dob         =   $("input[name='dob']").val();
                var gender      =   $("input[name='gender']").val();

                let formData = new FormData();

                formData.append("_token", _token);
                formData.append("first_name", first_name);
                formData.append("last_name", last_name);
                formData.append("phone", phone);
                formData.append("email", email);
                formData.append("address", address);
                formData.append("dob", dob);
                formData.append("gender", gender);
                formData.append("applicant_photo", $('#applicant_photo')[0].files[0]);
                formData.append("resume", $('#resume')[0].files[0]);
                
                jQuery.ajax({
                    url: "{{ route('applicant.create') }}",
                    type:'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        if($.isEmptyObject(data.error)){
                          $('#successMsg').show();
                          $('#successMsg').text(data.success);
                          window.setTimeout(function() {
                            window.location.href = '/applicant';
                          }, 2000);

                          $('#first_name').val('');
                          $('#last_name').val('');
                          $('#phone').val('');
                          $('#email').val('');
                          $('#address').val('');
                          $('#dob').val('');
                          
                          $(".print-error-msg").find("ul").html('');
                          $(".print-error-msg").css('display','none');

                        }else{ 
                            printErrorMsg(data.error);
                        }
                    }
                });
           
            }); 
           
            function printErrorMsg (msg) {
              $(".print-error-msg").find("ul").html('');
              $(".print-error-msg").css('display','block');
              $.each( msg, function( key, value ) {
                $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
                });
            }
        });
    
    </script>

    <script>
     $(function(){
        $('.datepicker').datepicker({
        format: 'Y-m-d'
     });
});
    </script>  

</body>
</html>