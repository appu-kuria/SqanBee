function  onLoad(){
    document.getElementById("submit").hidden=true;
    document.getElementById("otp").disabled=true;
}
function generateOTP(){
    var userDetails = {};
    userDetails.firstName = document.getElementById("firstName").value;
    userDetails.lastName = document.getElementById("lastName").value;
    userDetails.phone = document.getElementById("phone").value;
    userDetails.email = document.getElementById("email").value;
    userDetails.password = document.getElementById("password").value;
    userDetails.confirmPassword = document.getElementById("confirmPassword").value;
    document.getElementById("generateOTP").hidden=true;
    document.getElementById("otp").disabled=false;
    document.getElementById("otp").focus();
    document.getElementById("submit").hidden=false;
    validate(userDetails);
}
function validate(userDetails){
    console.log("User Details : ",userDetails);
}