const main = document.getElementById("main");
const ticket_machine = document.getElementById("ticket_machine");
const ticket_btn = document.getElementById("ticket_btn");
const ticket = document.getElementById("ticket");


// ticket_machine.addEventListener("click", function(){ //메인 타이틀을 눌렀을 때
//     ticket.className ='ticket'
// });


let target = document.querySelector("#welcome");

let stringArr = "Welcome to the Gallery".split("");

//한글자씩 텍스트를 출력하는 함수
function dynamic(Arr){
    if(Arr.length > 0){
        target.textContent += Arr.shift();
        setTimeout(function(){
            dynamic(Arr);
        }, 80);
    }else{
        setTimeout(resetTyping, 3000);
    }
}

function resetTyping(){
    target.textContent=""
    stringArr = "Welcome to the Gallery".split("");
    dynamic(stringArr)
}




dynamic(stringArr);

//4초 뒤 페이지 이동
function location_time(){
    setTimeout(function(){location.href='main.php'}, 4000);
}




function begin(){
    main.style.webkitAnimation = "fadeIn 2s forwards"
    main.style.webkitAnimationDelay = "2s";
    main.style.animation = "fadeIn 2s forwards"
    main.style.animationDelay = "2s";
    location_time();
}



function ticket_get(){
    ticket.style.webkitAnimation = "ticket_ani 2s forwards"
    ticket.style.animation = "ticket_ani 2s forwards"
    begin();
    
}

//ticket_machine.addEventListener("click", begin);
ticket_btn.addEventListener("click", ticket_get);