function getFeatureData(){

let table = document.getElementById('my_table');

let formObject = {
    "feature":document.getElementById("feature").value,
    "phone1":document.getElementById("phone1").value,
    "phone2":document.getElementById("phone2").value,
    "phone3":document.getElementById("phone3").value,
    "phone4":document.getElementById("phone4").value,
}
let tr = document.createElement("tr");
var rows = table.getElementsByTagName('tr');
rows.length % 2 == 1 ? tr.className = "second_color": tr.className = "first_color"; 
for (let key in formObject){
    if(key == "feature"){
        let th = document.createElement("th");
        th.id = "Features"
        th.innerText = formObject[key];
        tr.appendChild(th);
    }else{
        let td = document.createElement("td");
        td.innerText = formObject[key];
        tr.appendChild(td);
    }
    
}
table.appendChild(tr);



}