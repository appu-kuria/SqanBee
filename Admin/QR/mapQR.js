
function onBrandSelect() {
    var brand_id = document.getElementById("brand_id").value
    if (brand_id) {
        $.ajax({
            type: 'POST',
            url: './../Menu/backend-script.php',
            data: { 'brand_id': brand_id },
            success: function (result) {
                document.getElementById("outlet_id").innerHTML = result;

            }
        });
    } else {
        debugger
        //   $('#state').html('<option value="">Country</option>');
        //   $('#city').html('<option value=""> State </option>'); 
    }
};

function mapQR(){
 var outlet_id = document.getElementById("outlet_id").value;
 var qr = document.getElementById("qr").value;
 if (outlet_id && qr) {
    $.ajax({
        type: 'POST',
        url: './../Menu/backend-script.php',
        data: { 'qr': qr , 'outlet_id_to_map': outlet_id},
        success: function (result) {
            // document.getElementById("outlet_id").innerHTML = result;
            if(result==1){
                sessionStorage.removeItem('scanned_qr');
                alert ('Successfully mapped QR with outlet.')
                window.location = "./../ProfilePage/profile.php";
            }
            else{
                alert ('Error in mapping.')
            }

        }
        
    });
}
}
