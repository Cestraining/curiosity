//modal
const modalwa =document.getElementById('modal');
const close=document.getElementById('close');
const form_m=document.getElementById('form_m');

close.addEventListener('click',function(){
    modalwa.style.display="none";
    form_m.style.display="none"
})

//open modal
const getstart= document.getElementById('getstarted');
const signin= document.getElementById('signin');

//modal two buttons
const btnregis=document.getElementById('btnregis');
const btnlog=document.getElementById('btnlog');

let rc=btnregis.style;
let lc=btnlog.style;

//modal two forms
const form2=document.getElementById('form2');
const form1=document.getElementById('form1');

// login
let loga=["none","block","royalblue",""];
signin.addEventListener("click" , function(){ openwa(loga); });
btnlog.addEventListener('click',function(){ openwa(loga); });

//signup
let regisa=["block","none","","royalblue"];
getstart.addEventListener('click', function(){ openwa(regisa); });
btnregis.addEventListener('click',function(){ openwa(regisa); });


//close modal style1
window.onclick=function(event){
    if(event.target== modalwa){
        lc.backgroundColor="";
        rc.backgroundColor="";
        modalwa.style.display="none";
        form_m.style.display="none"
        
    }
};

//open modal with values
function openwa(pa)
{
    modalwa.style.display="block";
    form1.style.display=pa[0];
     form2.style.display=pa[1];

     lc.backgroundColor=pa[2];
     rc.backgroundColor=pa[3];
}