
function addStu()
{
    var stuname=document.querySelector('#stuname').value;
    var stuemail=document.querySelector('#stuemail').value;
    var stupass=document.querySelector('#stupass').value;
    var myObj=  { name : stuname, email: stuemail,stupass: stupass};
    var myJSON = JSON.stringify(myObj);

    if(stupass=="" || stuemail=="" || stuname=="")
    {   
        form_m.style.display="block";
        form_m.innerHTML="please complete the form"
        form_m.style.color="white"
        form_m.style.backgroundColor="red"
    }
    else
    {
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange= function(){
        if(this.readyState==4 && this.status==200){
        
        }
    }
    xmlhttp.open("POST","../student/addstudent.php",true);
    xmlhttp.setRequestHeader("Content-Type", "application/json");
    xmlhttp.send(myJSON);

    }
}   