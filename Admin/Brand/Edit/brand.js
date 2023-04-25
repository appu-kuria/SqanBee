function  onLoad(){
}


function validate(){
    let x = document.forms["brandForm"]["brandName"].value;
  if (x == "") {
    alert("Brand name cannot be empty!");
    return false;
  }
  return true;
}

function editBrand(id, name){
  document.getElementById(id).disabled  =false;
  document.getElementById("edit_"+ id).style.display  ='none';
  document.getElementById("delete_"+ id).style.display  ='none';
  // document.getElementById("save_"+ id).style.display  ='block';
  // document.getElementById("cancel_"+ id).style.display  ='block';
  document.getElementById("editPopup").style.display  ='block';
  document.getElementById("editName").value= name;
  var saveFunc = 'saveBrand('.concat(id, ',\'', name, '\')');
  document.getElementById("btnSave").setAttribute('onclick', saveFunc)

  
  var cancelFunc = 'cancel('.concat(id,')');
  document.getElementById("btnCancel").setAttribute('onclick', cancelFunc)
  
}
function cancel(id){
  document.getElementById("editPopup").style.display  ='none';
  document.getElementById("editName").value= '';
  '';
}
function saveBrand(id, name){
  debugger;
}

function deleteBrand(index){
}