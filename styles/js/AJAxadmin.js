var del_dis_btns = document.querySelectorAll('button[id^=delete] , button[id^=disable]');
del_dis_btns.forEach(element => {
    element.onclick = function(element){
        var xhr = new XMLHttpRequest();
        xhr.open("POST", sectionType);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("action="+this.id+"&id="+this.parentElement.parentElement.id);
        location.reload(true);
    }
})
var updateSubmits = document.querySelectorAll("td .updatebtn");
updateSubmits.forEach(element => {
    element.onclick = function(element){
    var inputs=this.parentElement.parentElement.querySelectorAll("td input, input,td select");
    var data = [];
    inputs.forEach(element => {
        data.push(element.value);
    });
    data=JSON.stringify(data);
    const xhttp = new XMLHttpRequest();
    xhttp.open("POST", sectionType);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("action=update&data="+data);
    location.reload(true);
    }
});
var insertbtns = document.querySelectorAll(".Insertbtn");
insertbtns.forEach(element => {
    element.onclick = function(element){
        var inputs = this.parentElement.querySelectorAll("input,select");
        var data=[];
        inputs.forEach(element => {
            data.push(element.value);
        });
        data=JSON.stringify(data);
        console.log(data);
        const xml = new XMLHttpRequest();
        xml.open("POST", sectionType);
        xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xml.send("action=insert&data="+data);
        location.reload(true);
    }
});

