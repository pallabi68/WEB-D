//function for vlaidation of pattern of password
var source = new EventSource('time.php');
    source.onmessage = function(e) {
       document.getElementById("time").innerHTML = e.data + '<br>';
    };
function  validate_pass(){
var str=document.getElementById("txtPassword").value;
if(str.length <6){
 document.getElementById("pass").innerHTML = "password must contain atleast 6 charcters";
 return false;
}
document.getElementById("pass").innerHTML ="";
return true;
}
//validation pf ph number 
function check_no(){
var str= document.getElementById("contact_no").value;
if(!(/^\d{10}$/.test(str))){
 
 document.getElementById("ph").innerHTML="NOT A VALID MOBILE NUMBER";
 }
 document.getElementById("ph").innerHTML="";
 }
//function  to check if the registration no already registered or not
function check_reg(){
var str= document.getElementById("reg_no").value;
//alert("hi reg");
var xmlhttp = new XMLHttpRequest();
  this.responseType = 'text';
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                  console.log(this.responseText);
                if( this.responseText== 1){
                     document.getElementById("rn").innerHTML= "OOPS! THIS REGISTRATION_NO ALREADY EXIST";
                }
                else {
                  document.getElementById("rn").innerHTML="";
                }
            }
        };
        xmlhttp.open("GET", "gethint.php?reg_no=" + str, true);
        xmlhttp.send();
}
//function for validating email
function valid() 
{   var email = document.getElementById("email").value;
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    document.getElementById("em").innerHTML="";
  // var re=/\S+@\S+\.\S+/;
    if( re.test(String(email).toLowerCase())){
    return true;
    }
  else
  { 
 document.getElementById("em").innerHTML="You have entered an invalid email address!";
//document.form1.text1.focus();
return false;
}
}

//adding for upper caseing the letter 
function myFunction() {
  var x = document.getElementById("fname");
  var z=x.value;
  //var pattern=/^\d+$/;
   if(/^[0-9]+$/.test(z)){
       
	 document.getElementById("na").innerHTML="name can not contain number";
	return false;
 }
 else{
  //alert("hi");
  document.getElementById("na").innerHTML="";
  x.value = x.value.toUpperCase();
  return true;
  }
}
//hobby
function hobby_validate(){
console.log("hello");
var h=document.getElementById("hobby_o");
//var hobby=document.getElementById("hobby").value;
//if(hobby=="other"){
 h.style.display='inline-block';
/*}
else {
h.style.display='none';
}*/
}
function Validate() {
var password = document.getElementById("txtPassword").value;
var confirmPassword = document.getElementById("txtConfirmPassword").value;
if (password != confirmPassword) {
	 document.getElementById("ma").innerHTML="Passwords do not match.";
			return false;
		}
		
document.getElementById("ma").innerHTML="";		
return true;
}

//calculation of age									
function findage(){									
var dob= document.getElementById("dob").value;
  var value=getAge(dob);
  function getAge(dateString) 
{
    var today = new Date();
    var birthDate = new Date(dateString);
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
    var d=today.getDate()-birthDate.getDate();
    if(m<0){
    age=age-1;
    m=12+m;
    }
    if(d<0){
    d=d+30;
    }
 /*   if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) 
    {
        age--;
    }*/
    return age+" years	"+m+"	months	"+d+"	days";
}
  document.getElementById("demo").innerHTML = value;
 } 									
function loadDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("customers").innerHTML =
      this.responseText;
    }
  };
  var sem= document.getElementById("current_sem").value;
  
  
  //sem="6";
  if(sem==1){
  xhttp.open("GET", "sem1.html", true);
  }
  else if(sem==2){
  xhttp.open("GET", "sem2.html", true);
  }
  else if(sem==3){
  xhttp.open("GET", "sem3.html", true);
  }
  else if(sem==4){
  xhttp.open("GET", "sem4.html", true);
  }
  else if(sem==5){
  xhttp.open("GET", "sem5.html", true);
  }
  else if(sem==6){
  xhttp.open("GET", "sem6.html", true);
  }
  else if(sem==7){
  xhttp.open("GET", "sem7.html", true);
  }
  else {
   xhttp.open("GET", "grades.html", true);
  }
  
  
  xhttp.send();
}
