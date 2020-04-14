

//variables initialization
var num=document.getElementById('no-of-seats');
var checkList=document.getElementsByName('seats');
var seat_no=document.getElementById('seat-no');
var no_of_seat=document.getElementById('no-of-seats');

var count=0;

num.addEventListener('keyup',calc);

//function to calculate total price.
function calc(){
    var total=0;
    var price=parseInt(document.getElementById('per-seat-price').value);
    var num=parseInt(document.getElementById('no-of-seats').value);
   
    total=price*num;
   document.getElementById('total-price').value=total;

}

//adding eventlistener to every checkbox.
for(var i=0;i<checkList.length;i++){

    checkList[i].addEventListener('click',adding,);

}
 while (i<checkList.length){
	if(checkList[i]!=0)
	{count++}
}

//function to add values to seat-no.


function adding(){
    seat_no.value='';
 no_of_seats='';
    
if(checkList[0].checked){
       seat_no.value+=checkList[0].value;
   }
if(checkList[1].checked){

    seat_no.value+=checkList[1].value;
   }


if(checkList[2].checked){

    seat_no.value+=checkList[2].value;
}
if(checkList[3].checked){

 seat_no.value+=checkList[3].value;
}


if(checkList[4].checked){

    seat_no.value+=checkList[4].value;
}
if(checkList[5].checked){

 seat_no.value+=checkList[5].value;
}



if(checkList[6].checked){

    seat_no.value+=checkList[6].value;
}
if(checkList[7].checked){

 seat_no.value+=checkList[7].value;
}




if(checkList[8].checked){

    seat_no.value+=checkList[8].value;
}
if(checkList[9].checked){

 seat_no.value+=checkList[9].value;
}



if(checkList[10].checked){

    seat_no.value+=checkList[10].value;
}
if(checkList[11].checked){

 seat_no.value+=checkList[11].value;
}
 


if(checkList[12].checked){

    seat_no.value+=checkList[12].value;
}
if(checkList[13].checked){

 seat_no.value+=checkList[13].value;
}

if(checkList[14].checked){

    seat_no.value+=checkList[14].value;
}
if(checkList[15].checked){

 seat_no.value+=checkList[15].value;
}


if(checkList[16].checked){

    seat_no.value+=checkList[16].value;
}
if(checkList[17].checked){

 seat_no.value+=checkList[17].value;
}
if(checkList[18].checked){

    seat_no.value+=checkList[18].value;
}
if(checkList[19].checked){

 seat_no.value+=checkList[19].value;
}
if(checkList[20].checked){

    seat_no.value+=checkList[20].value;
}
if(checkList[21].checked){

 seat_no.value+=checkList[21].value;
}


if(checkList[22].checked){

    seat_no.value+=checkList[22].value;
}
if(checkList[23].checked){

 seat_no.value+=checkList[23].value;
}



if(checkList[24].checked){

    seat_no.value+=checkList[24].value;
}
if(checkList[25].checked){

 seat_no.value+=checkList[25].value;
}
if(checkList[26].checked){

    seat_no.value+=checkList[26].value;
}
if(checkList[27].checked){

 seat_no.value+=checkList[27].value;
}



if(checkList[28].checked){

    seat_no.value+=checkList[28].value;
}
if(checkList[29].checked){

 seat_no.value+=checkList[29].value;
}


if(checkList[30].checked){

    seat_no.value+=checkList[30].value;
}
if(checkList[31].checked){

 seat_no.value+=checkList[31].value;
}



if(checkList[32].checked){

    seat_no.value+=checkList[32].value;
}
if(checkList[33].checked){

 seat_no.value+=checkList[33].value;
}


if(checkList[34].checked){

    seat_no.value+=checkList[34].value;
   }
   

}//end of adding ()




