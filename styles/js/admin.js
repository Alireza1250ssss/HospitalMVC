var container = document.querySelector(".container");
var options = document.querySelectorAll("li");
let sectionType='';



function activation(element){
    document.querySelector("ul .active").classList.remove("active");
    element.classList.add("active");
    sectionType = element.parentElement.id;
    Array.from(container.querySelectorAll('h4 , table')).forEach(element => {
        element.style.display="none";
    });
    
    container.querySelectorAll("h4,table,div").forEach(element => {
        element.style.display="none";
    });
    document.getElementById(element.id+"-part").style.display="block";
}
function showUpdate(element){
    element.parentElement.parentElement.nextElementSibling.classList.toggle("hide");
}
function showParts(element){
    element.parentElement.parentElement.nextElementSibling.nextElementSibling.classList.toggle("hide");
}
