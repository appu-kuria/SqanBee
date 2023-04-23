function  onLoad(){
}


function onSubmit(){
    var outletDetails = {};
    outletDetails.outletName = document.getElementById("outletName").value;
    outletDetails.place = document.getElementById("place").value;
    outletDetails.locality = document.getElementById("locality").value;
    outletDetails.buildingNo = document.getElementById("buildingNo").value;
    outletDetails.city = document.getElementById("city").value;
    outletDetails.state = document.getElementById("state").value;
    validate(outletDetails);
}
function validate(outletDetails){
    console.log("User Details : ",outletDetails);
}

function onBrandSelect() {
    var brand_id = document.getElementById("brand_id").value
    if (brand_id) {
        $.ajax({
            type: 'POST',
            url: './../../Menu/backend-script.php',
            data: { 'brand_id': brand_id },
            success: function (result) {

                debugger;
                document.getElementById("outlet_id").innerHTML = result;

            }
        });
    } else {
        debugger
        //   $('#state').html('<option value="">Country</option>');
        //   $('#city').html('<option value=""> State </option>'); 
    }
};

function onOutletSelect() {
    var outlet_id = document.getElementById("outlet_id").value
    if (outlet_id) {
        $.ajax({
            type: 'POST',
            url: './../../Menu/backend-script.php',
            data: { 'outlet_id': outlet_id },
            success: function (result) {
                result = JSON.parse(result);
                document.getElementById("outletName").value = result.outlet_name;
                document.getElementById("buildingNo").value = result.building_no;
                document.getElementById("place").value = result.outlet_location;
                document.getElementById("city").value = result.city;
                document.getElementById("state").value = result.state;
                document.getElementById("phone").value = result.phone;

            }
        });
    } else {
        debugger
        //   $('#state').html('<option value="">Country</option>');
        //   $('#city').html('<option value=""> State </option>'); 
    }
};