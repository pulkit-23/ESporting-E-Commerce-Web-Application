document.getElementById("submit").addEventListener("click", func);
function func() {
    var email = document.myForm.email.value;
    var pass = document.myForm.password.value;
    var atposition=email.indexOf("@");  
    var dotposition=email.lastIndexOf(".");
    if (atposition<1 || dotposition<atposition+2 || dotposition+2>=email.length){
        alert("Invalid email address!");
        document.myForm.email.focus();
        return false;
    }
    if(pass.length<5||pass.length>15){
        alert("Invalid password!");
        document.myForm.password.focus();
        return false;
    }
    alert("Logged in successfully!");
 }

 