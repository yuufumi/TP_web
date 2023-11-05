function confirmation(){
    const del= confirm("Are you sure you want to modify?")
    if(del){
        reloadData();
        setTimeout(reloadData, 10000);
    }else{
        return;
    }
}
function reloadData(){
    $(document).ready(() => {
        $.ajax({
            url: "./getData.php", 
            type: "GET",
            dataType: "json",
            success: function(data) {
                updateTable(data.valuesByFeatureId, data.features, data.phones);
                setTimeout(reloadData, 10000); 
            },
            error: function() {
                console.log("Failed to fetch data.");
                setTimeout(reloadData, 3000); 
            }
        });}
    );
}
    function updateTable(valuesByFeatureId, features, phones) {
        var $table = $("#my_table"); 
        $table.find("tbody").empty(); 
    
        var $thead = $table.find("thead");
        $thead.empty();
        var headerRow = '<tr id="phones" class="phones"><th scope="col">Features</th>';
      
        var phoneArray = Object.values(phones);
        phoneArray.forEach(function (phone) {
            headerRow += '<th>' + phone.Name_smartphone + '</th>';
        });
        headerRow += '</tr>';
        $thead.append(headerRow);
    
        
        var $tbody = $table.find("tbody");
        var featuresArray = Object.values(features);
       let i = 0;
       let color = "";
        featuresArray.forEach(function (feature) {
            if(i%2 === 0){
                color = "second_color";
            }else{
                color = "first_color";
            }
            var featureRow = `<tr class=${color}><th id=Features>`+ feature.Name_Features + '</th>';
                var values = valuesByFeatureId[feature.Id_Features];
                
                for (let index = 0; index < values.length; index++) {
                    featureRow += '<td>' + values[index] + '</td>';
                    console.log(index);
                }        
            featureRow += '</tr>';
            $tbody.append(featureRow);
            i++;
        });
    }
reloadData();
