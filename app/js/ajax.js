function bringOut(){
    var bank = document.getElementById('select_bank')
    var other_detail = document.getElementById('other_detail')

    if(bank.value == 'bristlecitybank'){
        other_detail.style.display = 'block';
    }else if(bank.value == ''){
        other_detail.style.display = 'none';
    }else{
        other_detail.style.display = 'block';    
    }
}

function checkLength(x){
    if(x.value.length < 10 ){
        x.style.border= "1px solid red";
        document.querySelector('#receiverResponse').value = "A/c number must be 8-10 Digits.";
    }

    if(x.value.length > 7 ){
        x.style.border = "1px solid green";

        checkUser();
    }
}

function checkAmount(x){
        
    if(x.value.length >= 1){
        document.querySelector('#amount_response').style.display = "block";
        document.querySelector('#amount_response').innerHTML = "<span style='color:green'> $" + balance + " available </span>";
    }else{document.querySelector('#amount_response').style.display = "none";}
}


function checkUser(){
        
    var url = "checkUser.php";
    var receiverResponse = document.querySelector('#receiverResponse');
    var receiver_id =  document.querySelector('#receiver_id').value;
    var select_bank =  document.querySelector('#select_bank').value;

    var xhttp = new XMLHttpRequest();
    
    receiverResponse.value = "Checking Details..."; 
    
    xhttp.onload = function(){
        receiverResponse.value = this.responseText;
    }
    
    xhttp.open("POST",url,true);
    
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("receiver_id="+receiver_id+"&select_bank="+select_bank+"&user_check=submitted"); 
    return false;
    
}


function checkPin(x){

    if(x.value.length < 4 || x.value.length > 4 ){
        document.querySelector('#pin_response').style.display= "block";
        document.querySelector('#pin_response').innerHTML = "Pin must be 4 Digits.";
    }

    if(x.value.length == 4 ){

        var url = "checkUser.php";
        var pin_response = document.querySelector('#pin_response');
        var pin =  document.querySelector('#pin').value;

        var xhttp = new XMLHttpRequest();
        
        pin_response.innerHTML = "Validating Pin..."; 
        
        xhttp.onload = function(){
            pin_response.innerHTML = this.responseText;
        }
        
        xhttp.open("POST",url,true);
        
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("pin="+pin+"&user_id="+user_id); 
        return false;
    }
        
}


var Name;
var footer = document.querySelector(".fine-dashboard");


if (navigator.userAgent.indexOf("Win") != -1) Name =  
"Windows OS"; 
if (navigator.userAgent.indexOf("Mac") != -1) Name =  
"Macintosh"; 
if (navigator.userAgent.indexOf("Linux") != -1) Name =  
"Linux OS"; 
if (navigator.userAgent.indexOf("Android") != -1) Name =  
"Android OS"; 
if (navigator.userAgent.indexOf("like Mac") != -1) Name =  
"iOS"; 


if(Name == "iOS"){
    footer.style.backgroundAttachment = "initial";
}