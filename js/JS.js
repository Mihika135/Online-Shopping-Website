function validate()
                {
                    var fname = document.getElementById('fname');
                    var lname = document.getElementById('lname');
                    var mobile = document.getElementById('mobile');
                    var password = document.getElementById('password');
                    var cpassword = document.getElementById('cpassword');

                    if(fname == "")
                    {
                        alert("Please enter your first name");
                        fname.focus();
                        return false;
                    }
                    var f = isNaN(fname);
                    if(f == false)
                    {
                        alert("Name cannot have numbers!");
                        fname.focus();
                        return false;
                    }
                    else if(lname == "")
                    {
                        alert("Please enter your last name");
                        lname.focus();
                        return false;
                    }
                    var l = isNaN(lname);
                    if(l == false)
                    {
                        alert("Name cannot have numbers!");
                        lname.focus();
                        return false;
                    }
                    else if(mobile.length != 10)
                    {
                        alert("Mobile must be of 10 numbers only");
                        mobile.focus();
                        return false;
                    }
                    else if(password < 3 || passowrd > 10)
                    {
                        alert("Password must be of length 3 to 10!");
                        password.focus();
                        return false;
                    }
                    else if(cpassword != password)
                    {
                        alert("Password does not match!");
                        cpassword.focus();
                        return false;
                    }
                }


function Dropdown() {
    document.getElementById("myDropdown").classList.toggle("show");
  }
  
  // Close the dropdown if the user clicks outside of it
  window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
      var dropdowns = document.getElementsByClassName("dropdown-content");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
  }