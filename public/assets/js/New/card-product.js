

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
    if (x < $(num).data("max")) { // Check if x is less than the maximum value
        x++;
        num.innerHTML = x;
        quantity.value = x;
      } else {
        num.innerHTML = $(num).data("max");
        quantity.value = $(num).data("max");
      }
    
})

minus.addEventListener("click",()=>{
    quantity.value = x
    if(x===1){
        num.innerHTML = 1;
    }else{
        x--
        num.innerHTML = x ;
    }
})