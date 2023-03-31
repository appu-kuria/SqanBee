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