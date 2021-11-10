var checkboxes = document.querySelectorAll('input[name=resdetails]');
var bankitems = document.querySelectorAll('.bank label input');
var reserveDetails='';
var bank = '';
checkboxes.forEach(element => {
    element.addEventListener('change', e=>{
        reserveDetails=e.target.value;
        var bankPart = document.querySelector(".bank");
        bankPart.style.display="block";
    })
});
bankitems.forEach(element => {
    element.addEventListener("change" , e => {
        bank= e.target.value;
        document.getElementById("paybtn").style.display="block";
    })
});

