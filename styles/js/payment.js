var finalpaybtn = document.getElementById('finalpaybtn');
finalpaybtn.onclick = function(){
    var cartNumber = document.getElementById('cartnumber').value;
    var cartPassword = document.getElementById('cartpassword').value;
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "paymentStep2");
    xhr.onload = function(){
        if(this.responseText === "200"){
            document.getElementById('status').innerHTML="Payment Was Successfull";
            setTimeout(function(){
                window.location.replace("reservation");
            },3000);
        }
        else if(this.responseText === "400") {
            document.getElementById('status').innerHTML="Payment Was Failed";
            setTimeout(function(){
                location.reload();
            },3000);
        }
        else if(this.responseText === "300") {
            document.getElementById('status').innerHTML="cart must be 6 numbers!";
            setTimeout(function(){
                location.reload();
            },3000);
        }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("cartnumber="+cartNumber+"&cartpassword="+cartPassword);
}