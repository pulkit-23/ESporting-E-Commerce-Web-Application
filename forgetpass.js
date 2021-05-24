document.getElementById("senddata").addEventListener("click", func);
function func() {
    var email = document.myForm.username.value;
    
    var atposition=email.indexOf("@");  
    var dotposition=email.lastIndexOf(".");
    if (atposition<1 || dotposition<atposition+2 || dotposition+2>=email.length){
        alert("Invalid email address!");
        document.myForm.email.focus();
        return false;
    }
    alert("Password recovered successfully!");
 }

 