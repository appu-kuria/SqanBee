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