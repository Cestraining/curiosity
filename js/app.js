//modal
const modalwa =document.getElementById('modal');
const amodalwa =document.getElementById('amodal');

const close=document.getElementById('close');
const form_m=document.getElementById('form_m');

close.addEventListener('click',function(){
    modalwa.style.display="none";
    form_m.style.display="none"
})

const aclose=document.getElementById('aclose');
const aform_m=document.getElementById('aform_m');

aclose.addEventListener('click',function(){
    amodalwa.style.display="none";
    aform_m.style.display="none"
})


//open modal
const getstart= document.getElementById('getstarted');
const signin= document.getElementById('signin');
//open ad modal
const adlogin=document.getElementById('adm_log');
if(adlogin != null){
adlogin.addEventListener('click',function(){
    amodalwa.style.display="block";
});
}

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
if(signin != null){
signin.addEventListener("click" , function(){ openwa(loga); });}
btnlog.addEventListener('click',function(){ openwa(loga); });

//signup
let regisa=["block","none","","royalblue"];
if(getstart !=null){
getstart.addEventListener('click', function(){ openwa(regisa); });}
btnregis.addEventListener('click',function(){ openwa(regisa); });


//close modal style1
window.onclick=function(event){
    if(event.target==amodalwa){
        amodalwa.style.display="none";
        aform_m.style.display="none"

    }
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