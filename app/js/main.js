var aside = document.querySelector("aside");
var menu_btn = document.querySelector(".menu-btn");
var log = document.querySelector("#log");

menu_btn.addEventListener("click", function(){
    aside.classList.toggle("showing")
});

setTimeout(
    function(){
        log.style = 'display: none';
    }, 7000
);


function showWallet(){

    var method = document.querySelector("#payment-method");
    var address = document.querySelector("#wallet-address"); 

    if(method.value == 'bitcoin'){
        address.innerHTML = 'Send Bitcoin to : <br> <input id="btcAdd" value =""> <br> <a onclick="copyBtc()"> Copy </a> <br> <br> '
    }

    if(method.value == 'other'){
        address.innerHTML = "Please contact our Online support for other payment methods. <br> <br> "
    }

}

function copyItem() { 
    var copyText = document.querySelector("#myInput");
  
    copyText.select();
    copyText.setSelectionRange(0, 99999); /* For mobile devices */

    document.execCommand("copy");
  
    alert("Copied : " + copyText.value);
}

function copyUsdt() { 
    var copyText = document.querySelector("#usdtAdd");
  
    copyText.select();
    copyText.setSelectionRange(0, 99999); /* For mobile devices */

    document.execCommand("copy"); 
  
    alert("Copied : " + copyText.value);
}

function copyBtc() {
    var copyText = document.querySelector("#btcAdd");
  
    copyText.select();
    copyText.setSelectionRange(0, 99999); /* For mobile devices */

    document.execCommand("copy");
  
    alert("Copied : " + copyText.value);
}