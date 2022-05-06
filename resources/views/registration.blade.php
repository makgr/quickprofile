<!DOCTYPE html>
<html>
<head>
  <title>Registration | Quick Profile</title>
<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
  <style type="text/css">
     .allowed-submit{opacity: .5;cursor: not-allowed;}
  .valid-input{
    border:1px solid green !important;
  }
  .invalid-input{
    border:1px solid red !important;
  }
  .invalid-msg{
    color: red;
  }
.validation-form h3{
  background:#eae9e9;
  text-align:center;
  padding:5px 0px;
}
.validation-form{
  border:1px solid orange;
  width:50%;
margin: 0 auto;
  background:#dad9d9;
  padding:10px 30px;
}
.validation-form .form-group{
  margin:15px 0px;
}
.validation-form .form-group input{
  padding:10px;
  width:94%;
  boz-sizing:border-box;
   border:none;
   border-bottom:1px solid orange;
}
.validation-form .form-group input:focus{
 outline:unset;
}
.validation-form .form-group input[type="submit"]{
  width:100%;
 
  background:green;
  font-size:20px;
  color:white;
}
  </style>
</head>
<body>

<div class = "validation-form">

<form method = "post" action="" id="myForm">
 @csrf
   <h3>Registration Form</h3>

  <div class="form-group">
     <input type="text" placeholder="Full Name" name="full_name"  id="full_name">
     <div class="full-name-msg"></div>
  </div>
    
  <div class="form-group">
     <input type="text" placeholder="Email" name="email" id="email">
     <div class="email-msg"></div> 
  </div>

  <div class="form-group">
    <input type="text" placeholder="Username" id="user_name">
    <div class="user-name-msg"></div>
    <div id="uname_response"></div>
 </div>

 <div class="form-group">
    <input type="text" placeholder="Mobile" name="mobile" id="mobile">
    <div class="mobile-msg"></div>
 </div>

 <div class="form-group">
    <textarea id="about_me" name="about_me" placeholder="About Yourself" cols="97" rows="5"></textarea>
     <div class="about-me-msg"></div> 
  </div>

 <div class="form-group">
    <input type="password" placeholder="Password" name="password" id="password">
    <div class="password-msg"></div> 
 </div>

  <div class="form-group">
     <input type="submit" value="Submit" id="submit-btn" class="allowed-submit" disabled="desabled">
    
  </div>
</form>
    
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
  
   // valiadtion for Full Name
  $('#full_name').on('input', function () {
  
     var fullName = $(this).val();
     var validName = /^[a-zA-Z ]*$/;
     if (fullName.length == 0) {
  
        $('.full-name-msg').addClass('invalid-msg').text("Full Name is required");
        $(this).addClass('invalid-input').removeClass('valid-input');
        
     }
     else if (!validName.test(fullName)) {
  
        $('.full-name-msg').addClass('invalid-msg').text('only characters & Whitespace are allowed');
        $(this).addClass('invalid-input').removeClass('valid-input');
        
     }
     else {
        $('.full-name-msg').empty();
        $(this).addClass('valid-input').removeClass('invalid-input');
     }
    });

    // valiadtion for Email
  $('#email').on('input', function () {
  
    var emailAddress = $(this).val();
    var validEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

    if (emailAddress.length == 0) {

        $('.email-msg').addClass('invalid-msg').text('Email is required');
        $(this).addClass('invalid-input').removeClass('valid-input');
    }
    else if (!validEmail.test(emailAddress)) {

        $('.email-msg').addClass('invalid-msg').text('Invalid Email Address');
        $(this).addClass('invalid-input').removeClass('valid-input');
    }
    else {
        $('.email-msg').empty();
        $(this).addClass('valid-input').removeClass('invalid-input');
    }
 });
  
 // valiadtion for Mobile
 $('#mobile').on('input', function () {
  
  var mobile = $(this).val();
  var validMobile = /^[0-9]*$/;
  if (mobile.length == 0) {

     $('.mobile-msg').addClass('invalid-msg').text("Mobile no is required");
     $(this).addClass('invalid-input').removeClass('valid-input');
     
  }
  else if (!validMobile.test(mobile)) {

     $('.mobile-msg').addClass('invalid-msg').text('Allow only number');
     $(this).addClass('invalid-input').removeClass('valid-input');
     
  }
  else {
     $('.mobile-msg').empty();
     $(this).addClass('valid-input').removeClass('invalid-input');
  }
 });

 // valiadtion for About Me
 $('#about_me').on('input', function () {
  
  var about_me = $(this).val();
  if (about_me.length > 500) {

     $('.about-me-msg').addClass('invalid-msg').text("Allow only 500 character");
     $(this).addClass('invalid-input').removeClass('valid-input');
     
  }
  else {
     $('.about-me-msg').empty();
     $(this).addClass('valid-input').removeClass('invalid-input');
  }
 });
 
  // valiadtion for Password
  $('#password').on('input', function () {
  
     var password = $(this).val();
     var cpassword = $('#cpassword').val();
  
     var uppercasePassword = /(?=.*?[A-Z])/;
     var lowercasePassword = /(?=.*?[a-z])/;
     var digitPassword = /(?=.*?[0-9])/;
     var symbolPassword = /(?=.*?[#?!@$%^&*-])/;
  
  if (password.length == 0) {
  
     $('.password-msg').addClass('invalid-msg').text('Password is required');
     $(this).addClass('invalid-input').removeClass('valid-input');
  }
  else if (!uppercasePassword.test(password)) {
  
     $('.password-msg').addClass('invalid-msg').text('At least one Uppercase');
     $(this).addClass('invalid-input').removeClass('valid-input');
  }
  else if (!lowercasePassword.test(password)) {
  
     $('.password-msg').addClass('invalid-msg').text('At least one Lowercase');
     $(this).addClass('invalid-input').removeClass('valid-input');
  }
  else if (!digitPassword.test(password)) {
  
     $('.password-msg').addClass('invalid-msg').text('At least one digit');
     $(this).addClass('invalid-input').removeClass('valid-input');
  
  } else if (!symbolPassword.test(password)) {
  
     $('.password-msg').addClass('invalid-msg').text('At least one special character');
     $(this).addClass('invalid-input').removeClass('valid-input');
  }
  else {
     $('.password-msg').empty();
     $(this).addClass('valid-input').removeClass('invalid-input');
  }
  });
  
  
  // validation to submit the form
  $('input').on('input',function(e){
     if($('#myForm').find('.valid-input').length==5){
  
         $('#submit-btn').removeClass('allowed-submit');
         $('#submit-btn').removeAttr('disabled');
     }
    else{
         e.preventDefault();
         $('#submit-btn').attr('disabled','disabled')
         
        }
  });
  
  });
</script>

<script>
   $(document).ready(function(){

       $("#user_name").keyup(function(){

           var username = $(this).val().trim();
           var _token = $('input[name="_token"]').val();
   
           if(username != ''){
   
               $.ajax({
                   url: '{{ route('usernameAvailableCheck') }}',
                   type: 'post',
                   data: {username: username, _token: _token},
                   success: function(response){
                       $('#uname_response').html(response);
                     //   console.log(response);
                    }
               });
           }else{
               $("#uname_response").html("");
           }
   
       });

   });
</script>

</body>
</html>