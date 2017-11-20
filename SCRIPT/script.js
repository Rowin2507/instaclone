
//PREVIEW UPLOAD AFBEELDING
 function readURL(input) {
         if (input.files && input.files[0]) {
             var reader = new FileReader();

             reader.onload = function (e) {
                 $('#preview')
                     .attr('src', e.target.result)
                     .height(150)
                     .width(auto);
             };

             reader.readAsDataURL(input.files[0]);
         }
     }

//PASSWORD CHECK
  var password = document.getElementById("password")
   , confirm_password = document.getElementById("password_repeat");

  function validatePassword(){
   if(password.value != confirm_password.value) {
     confirm_password.setCustomValidity("Wachtwoorden komen niet overeen");
   } else {
     confirm_password.setCustomValidity('');
   }
  }

  password.onchange = validatePassword;
  confirm_password.onkeyup = validatePassword;
