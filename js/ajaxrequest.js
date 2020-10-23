/* 





   I HAVE TO MAKE ONE CODE COMMAN. REPEATED 3 TIMES,
   OBEY THE RULE OF DRY(DON'T REPEAT YOURSELF) 
   
   
   
   
   */



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

function logad()
{
    var ademail=document.getElementById('ad_email').value;
    var adpass=document.getElementById('ad_pass').value;
    var myObj=  {"ad_email": ademail,"ad_pass": adpass};
    var myJSON = JSON.stringify(myObj);

    if(ademail=="" || adpass=="")
    {   
        form_mess("please complete the form","failed","a");
    }
    else
    {
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange= function(){
        if(this.readyState==4 && this.status==200){

            let mC = JSON.parse(this.response);
          
            if(mC[1]=="success")
            {
                window.location.replace("../admin/admin_dashboard.php");
            }
            else
            {
                form_mess(mC[0],mC[1],"a");
            }

        }
    }
    xmlhttp.open("POST","../admin/addadmin.php",true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlhttp.send("xC="+myJSON);
    }



}

function form_mess(mess,status,w="s")
{   
    if(w=="s"){

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
    else
    {
        aform_m.style.display="block";
        aform_m.innerHTML=mess;
    
        if(status == "success"){
            aform_m.style.color="white";
            aform_m.style.backgroundColor="green";
        }
        else if(status == "failed")
        {
            aform_m.style.color="black";
            aform_m.style.backgroundColor="red";
        }
    }
    
    
}