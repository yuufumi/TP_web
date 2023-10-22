function toggleForm(){
    var form = document.getElementById("feature_form");
    if (form.style.display === "none") {    
        form.style.display = "flex";
    } else {
        form.style.display = "none";
}
}

function getFeatureData(){
    $(document).ready(function() {

        var table = $('#my_table');
        let formObject = {
            "feature": $("#feature").val(),
            "phone1": $("#phone1").val(),
            "phone2": $("#phone2").val(),
            "phone3": $("#phone3").val(),
            "phone4": $("#phone4").val(),
            }    
        var row = $('<tr>');
        var rows = $('#my_table tr');
        for (let key in formObject){
            if(key == "feature"){
                let th = $("<th/>");
                th.text(formObject[key]);
                th.attr("id","Features");
                row.append(th);
            }else{
                let td = $("<td/>");
                rows.length % 2 == 1 ? td.attr("class","second_color"): td.attr("class","first_color");
                td.text(formObject[key]);
                row.append(td);
            }
        }
        table.append(row)
    });
    }
/*
    function getPhoneData(){
    $(document).ready(function() {
    var table = $('#my_table');
    let formObject = {
    "Phone": $("#Phone"),
    "Display":$("#Display"),
    "RAM":$("#RAM"),
    "Storage":$("#Storage"),
    "OS":$("#OS"),
    "Removable Battery":$("#Removable Battery"),
    "Wireless Charging":$("#Wireless Charging"),
    }    
    var phone_ele = $('<th>');
    let column = {
        "Phone": $("<th />"),
        "Display":$("<td />"),
        "RAM":$("<td />"),
        "Storage":$("<td />"),
        "OS":$("<td />"),
        "Removable Battery":$("<td />"),
        "Wireless Charging":$("<td />"),
    }
    let rows = 
    for (let key in keyObject){
            column[key].text(formObject[key].val());
            row.append(th);
            let td = $("<td/>");
            rows.length % 2 == 1 ? td.attr("class","second_color"): td.attr("class","first_color");
            td.text(formObject[key]);
            row.append(td);
        }
    }
    table.append(row)
        });
        }
*/

