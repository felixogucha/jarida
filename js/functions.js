function printpage() {
   document.getElementById('printButton').style.visibility="hidden";
   window.print();
   document.getElementById('printButton').style.visibility="visible";  
}

function submitMagCategory()
{
   //get input field values
  var category = document.getElementById('category').value;
  var added_by = document.getElementById('added_by').value;
  var added_on = document.getElementById('added_on').value;

  var url = '<?php echo base_url();?>'+'index.php/insert/addMagazineCategory';

  if(category != "") 
  {
      var ajaxRequest;  // The variable that makes Ajax possible!
   
    try{
      // Opera 8.0+, Firefox, Safari
      ajaxRequest = new XMLHttpRequest();
    }catch (e){
      // Internet Explorer Browsers
      try{
         ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
      }catch (e) {
         try{
            ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
         }catch (e){
            // Something went wrong
            alert("Your browser broke!");
            return false;
         }
      }
    }

    // Now get the value from user and pass it to
 // server script.
 var queryString = url+"?category=" + category ;
 queryString +=  "&added_by=" + added_by + "&added_on=" + added_on;
 ajaxRequest.open("GET", queryString, true);
 ajaxRequest.send(null); 

  }
  
}
function checkPassword()
{
   var new_pass = document.getElementById('new_password').value;
   var conf_pass = document.getElementById('confirm_password').value;
   if (new_pass == conf_pass) {
      return true;
   } else{
      Growl.info({title:"passwords do not match.",text:" "})
      new_password.value = "";
      conf_password.value = "";
      return false;
   }
}

function numbersOnly(e){
      var unicode=e.charCode? e.charCode : e.keyCode
      if (unicode!=8)
      { //if the key isn't the backspace key (which we should allow)
      if (unicode<48||unicode>57) //if not a number
         return false //disable key press
      }
   }
function noNumbers(e){
      var unicode=e.charCode? e.charCode : e.keyCode
      if (unicode!=8)
      { //if the key isn't the backspace key (which we should allow)
      if (unicode>48 || unicode<57) //if not a number
         return false //disable key press
      }
   }

function toggle(source) {
     var aInputs = document.getElementsByTagName('input');
     for (var i=0;i<aInputs.length;i++) {
         if (aInputs[i] != source && aInputs[i].className == source.className) {
             aInputs[i].checked = source.checked;
         }
     }
 }
 checked = false;
 function checkedAll(formid) {
   if (checked == false){checked = true}else{checked = false}
      for (var i = 0; i < document.getElementById(formid).elements.length; i++) {
         document.getElementById(formid).elements[i].checked = checked;
      }
      }
function check_account_type()
{
   var account_type  =  document.getElementById('account_type').value;
   if (account_type == "") {
      Growl.info({title:"Please select an account type first",text:" "})
      //alert();
      return false;
   }
   else
      return true;
   
}