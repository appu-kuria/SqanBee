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

function editBrand(index){
  document.getElementById(index).disabled  =false;
  document.getElementById("delete_"+ index).style.display  ='none';
}

function deleteBrand(index){
}