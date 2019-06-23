function formValidate(){
    var userUN = document.getElementsByName["username"].value;
   
    if(userUN == ""){
         document.getElementByName('spanUser').innerHTML= "This field is required";
    }

   
}