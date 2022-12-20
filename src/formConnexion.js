console.log("arrive");
function formSubmit(e) {
    e.preventDefault();
    
    var email = document.getElementById("connexion-email").value;
    var password = document.getElementById("connexion-password").value;
    var data = {
      email: email,
      password: password,
    };
    console.log(email);
    console.log(password);
    
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "processConnexion.php", true);
    xhr.setRequestHeader("Content-type", "application/json");
    xhr.onload = function () {
  
      /*if (!data.success) {
        if (data.errors.name) {
          console.log("name error");
        }
      var users = JSON.parse(this.responseText);
      if (this.status == 200) {
        var response = document.getElementById("response");
        response.innerHTML = users.message;
      }
    }else{
      window.location.href="connexion.php";
    };*/
    console.log(this.responseText);
    var users = JSON.parse(this.responseText);
    if (this.status == 200) {
      //var response = document.getElementById("response");
      //response.innerHTML = users.message;
    }
    if(users.success){
      window.location.href="index.php";
    }else{
      if(users.errors.email!=undefined){
        document.getElementById("email-error").innerHTML = users.errors.email;
      }else{
        document.getElementById("email-error").innerHTML = "";
      }
      if(users.errors.password!=undefined){
        document.getElementById("password-error").innerHTML = users.errors.password;
      }else{
        document.getElementById("password-error").innerHTML = "";
      }
      if(users.errors.login!=undefined){
        console.log(users.errors.login);
        document.getElementById("connexion-error").innerHTML = users.errors.login;
      }else{
        document.getElementById("connexion-error").innerHTML = "";
      }
    }
  }
  xhr.send(JSON.stringify(data));
  }
  var form = document.getElementById("form");
  form.addEventListener("submit",formSubmit);