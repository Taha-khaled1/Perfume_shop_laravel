
let plus = document.querySelector(".content .plus");
let num = document.querySelector(".content .num");
let minus = document.querySelector(".content .minus");

x = 1 ;

plus.addEventListener("click",()=>{
    num.innerHTML = x++;
})

minus.addEventListener("click",()=>{
    num.innerHTML = x--;
})