<?php
function check_pass($password1 , $password2){
if($password1 != $password2){
  return [FALSE , "your repeated password does not match the original one"];
}
else if(preg_match('/[0-9]/' , $password1) == 0 || preg_match('/[0-9]/' , $password2) == 0){
  return [FALSE , "your passwords should contain atleast one number"];
}
else if(preg_match('/[A-Z]/' , $password1) == 0 || preg_match('/[A-Z]/' , $password2) == 0){
  return [FALSE, "your passwords should contain atleast one upper case letter"];
}
else if(preg_match_all('/[a-zA-Z]/' , $password1 ) <5 || preg_match_all('/[a-zA-Z]/' , $password2) < 5){
  return [FALSE, "your passwords should have atleast 5 letters in them"];
}
else if(strlen($password1) < 8 || strlen($password2) < 8){
  return [FALSE, "your password should have atleast 8 characters"];
}
else if(preg_match('/[!@#$%^&*~]/' , $password1) != 1 || preg_match('/[!@#$%^&*~]/' , $password2) != 1){
  return [FALSE , "your passwords should have atleast 1 special character in them (!@#$%^&*)"];
}
else{
  return [TRUE , 'success'];
}
}
?>