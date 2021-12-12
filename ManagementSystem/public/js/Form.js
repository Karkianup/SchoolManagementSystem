function showDiv(select){
    if(select.value=="student"){
        document.getElementById('hidden_div').style.display="block";
    }else{
        document.getElementById('hidden_div').style.display="none";

    }
}
/*function formValidation(){
    let name=document.forms["myForm"]["fullname"].value;
    let pw=document.forms["myForm"]["password"].value;

   if(name.length<5){
      alert("ma kasam"); 
      return false;
   }
   if(name!==pw){
       alert("vayena bey");
       return false;
   }


} */

