

let smallImg = document.querySelectorAll(".images img");
let BigImg = document.querySelector(".main-image img");

smallImg.forEach((img)=>{
    img.addEventListener("click",()=>{
        BigImg.src = img.src;
    })
})


let plus = document.querySelector(".plus");
let num = document.querySelector(".num");
let minus = document.querySelector(".minus");

x = 1 ;

plus.addEventListener("click",()=>{
    num.innerHTML = x++ ;
    quantity.value = x
})

minus.addEventListener("click",()=>{
    quantity.value = x
    if(x===0){
        num.innerHTML = 0;
    }else{
        x--
        num.innerHTML = x ;
    }
})