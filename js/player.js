//taking elements
let fra=document.getElementById('frame');
let list=document.getElementsByClassName('list');

//setting defalut to first element
let taken=list[0];
taken.style.backgroundColor="black";
taken.style.color="white";
fra.setAttribute('src','https://www.youtube.com/embed/'+taken.id+'');


//setting styles for all element on different actions
for(let i=0;i<list.length;i++)
{
    list[i].addEventListener('click',function(){
        //setting styles for click element
        fra.setAttribute('src','https://www.youtube.com/embed/'+this.id+'');
        this.style.color="white";
        this.style.backgroundColor="black";
        //taking styles from privious element
        taken.style.color="black";
        taken.style.backgroundColor="white";
        taken=this;
    });
    list[i].addEventListener('mouseover',function(){
        if(this !== taken)
        {
        this.style.backgroundColor="lightgray";
        }
    });
    list[i].addEventListener('mouseout',function(){
        if(this !== taken)
        {
        this.style.color="black";
        this.style.backgroundColor="";
        }
    });

}