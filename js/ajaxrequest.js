var f1reset=document.querySelector('#f1reset');
var f2reset=document.querySelector('#f2reset');


function addStu()
{
    var stuname=document.querySelector('#stuname').value;
    var stuemail=document.querySelector('#stuemail').value;
    var stupass=document.querySelector('#stupass').value;
    var myObj=  { "name" : stuname, "email": stuemail,"stupass": stupass};
    var myJSON = JSON.stringify(myObj);

    if(stupass=="" || stuemail=="" || stuname=="")
    {   
        form_mess("please complete the form","failed");
    }
    else
    {
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange= function(){
        if(this.readyState==4 && this.status==200){
            let m=JSON.parse(this.response);
            form_mess(m[0],m[1]);
            if(m[1]=="success")
            {
                f1reset.reset();
            }
        }
    }
    xmlhttp.open("POST","../student/addstudent.php",true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlhttp.send("x="+myJSON);
    }
}  
function logStu()
{
    var stuemailC=document.getElementById('stuemailC').value;
    var stupassC=document.getElementById('stupassC').value;
    var myObj=  {"emailC": stuemailC,"passC": stupassC};
    var myJSON = JSON.stringify(myObj);

    if(stupassC=="" || stuemailC=="")
    {   
        form_mess("please complete the form","failed");
    }
    else
    {
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange= function(){
        if(this.readyState==4 && this.status==200){

            let mC = JSON.parse(this.response);
          
            if(mC[1]=="success")
            {
                console.log("yes iam");
                window.location.replace("index.php");
            }
            else
            {
                form_mess(mC[0],mC[1]);
            }

        }
    }
    xmlhttp.open("POST","../student/addstudent.php",true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlhttp.send("xC="+myJSON);
    }



}

function form_mess(mess,status)
{
    form_m.style.display="block";
    form_m.innerHTML=mess;

    if(status == "success"){
        form_m.style.color="white";
        form_m.style.backgroundColor="green";
    }
    else if(status == "failed")
    {
        form_m.style.color="black";
        form_m.style.backgroundColor="red";
    }
    
}