/*$(document).ready(function () {
    $("form").submit(function (event) {
        $(".form-group").removeClass("has-error");
        $(".help-block").remove();
        var formData = {
        name: $("#name").val(),
        email: $("#email").val(),
        password: $("#password").val(),
        password_confirmation: $("#confirmpassword").val(),
      };
  
      $.ajax({
        type: "POST",
        url: "process.php",
        data: formData,
        dataType: "json",
        encode: true,
      }).done(function (data) {
        if (!data.success) {
            if (data.errors.name) {
              $("#name-group").addClass("has-error");
              $("#name-group").append(
                '<div class="help-block">' + data.errors.name + "</div>"
              );
            }
    
            if (data.errors.email) {
              $("#email-group").addClass("has-error");
              $("#email-group").append(
                '<div class="help-block">' + data.errors.email + "</div>"
              );
            }
    
            if (data.errors.password) {
              $("#password-group").addClass("has-error");
              $("#password-group").append(
                '<div class="help-block">' + data.errors.password + "</div>"
              );
            }
            if(data.errors.confirmedPassword){
                $("#confirmedPassword-group").addClass("has-error");
                $("#confirmedPassword-group").append(
                    '<div class="help-block">' + data.errors.confirmedPassword + "</div>"
                );
            }
          } else {
            $("form").html(
              '<div class="alert alert-success">' + data.message + "</div>"
             
            ); window.location.href.replace(connexion.php)
          }   
      })
      .fail(function (data) {
        $("form").html(
          '<div class="alert alert-danger">Could not reach server, please try again later.</div>'
        );
      });
  
      event.preventDefault();
    });
  });*/
  /*
  fetch("process.php", {
    method: "POST",
    body: JSON.stringify(data),
    headers: {
      "Content-Type": "application/json",
    },
  })
  let uri =root + 'posts';
  let fromdata = new FormData();
  fromdata.append('title', 'foo');
  fromdata.append('body', 'bar');
  fromdata.append('userId', 1);
  fromdata.append('name',)
  let options = {
    method: 'POST',
    mode: 'cors',
    body: 'fromdata',
  }
  let req = new Request(uri, options);
  fetch(req)
  .then((response) => {
    if(response.ok){
      return response.json();
      }
      throw new Error('Network response was not ok.');
      })
      .then((data) => {
        console.log(data);
        })
      .catch((error) => {
        console.log('There has been a problem with your fetch operation: ' + error.message);
        });
*/

  console.log("name error");
function formSubmit(e) {
  e.preventDefault();
  
  var name = document.getElementById("name").value;
  var email = document.getElementById("email").value;
  var password = document.getElementById("password").value;
  var confirmpassword = document.getElementById("confirmpassword").value;
  var data = {
    name: name,
    email: email,
    password: password,
    confirmpassword: confirmpassword,
  };
  console.log(name);
  console.log(email);
  console.log(password);
  
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "process.php", true);
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
  console.log(users);
  if (this.status == 200) {
    //var response = document.getElementById("response");
    //response.innerHTML = users.message;
  }
  if(users.success){
    window.location.href="connexion.php";
  }else{
    console.log(users.errors);
    if(users.errors.name!=undefined){
      document.getElementById("name-error").innerHTML = users.errors.name;
    }else{
      document.getElementById("name-error").innerHTML = "";
    }
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
    if(users.errors.confirmedPassword!=undefined){
      document.getElementById("confirmedpassword-error").innerHTML = users.errors.confirmedPassword;
    }else{
      document.getElementById("confirmedpassword-error").innerHTML = "";
    }
  }
}
console.log("envoie");
xhr.send(JSON.stringify(data));
}
var form = document.getElementById("forma");
form.addEventListener("submit",formSubmit);

/*
$(document).ready(function () {
    $("form").submit(function (event) {
        $(".form-group").removeClass("has-error");
        $(".help-block").remove();
        var formData = {
        name: $("#name").val(),
        email: $("#email").val(),
        superheroAlias: $("#superheroAlias").val(),
        confirmedPassword: $("#confirmedPassword").val(),
      };
  
      $.ajax({
        type: "POST",
        url: "process.php",
        data: formData,
        dataType: "json",
        encode: true,
      }).done(function (data) {
        console.log(data);

        if (!data.success) {
            if (data.errors.name) {
              $("#name-group").addClass("has-error");
              $("#name-group").append(
                '<div class="help-block">' + data.errors.name + "</div>"
              );
            }
    
            if (data.errors.email) {
              $("#email-group").addClass("has-error");
              $("#email-group").append(
                '<div class="help-block">' + data.errors.email + "</div>"
              );
            }
    
            if (data.errors.password) {
              $("#password-group").addClass("has-error");
              $("#password-group").append(
                '<div class="help-block">' + data.errors.password + "</div>"
              );
            }
            if(data.errors.confirmedPassword) {
              $("#confirmedPassword-group").addClass("has-error");
              $("#confirmedPassword-group").append(
                '<div class="help-block>' + data.errors.confirmedPassword + "</div>"
              );
            }
          } else {
            $("form").html(
              '<div class="alert alert-success">' + data.message + "</div>"
            );
          }   
      })
      .fail(function (data) {
        $("form").html(
          '<div class="alert alert-danger">Could not reach server, please try again later.</div>'
        );
      });
  
      event.preventDefault();
    });
  });*/