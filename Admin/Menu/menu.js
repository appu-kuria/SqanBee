window.onload = function () {
    showAddCategoryScreen();
}

let categories = [];
let items = [];
let isEdit= false;
let editIndex =-1;
let editCatIndex =-1;

function createCategory() {
    var catName = document.getElementById("categoryName").value;
    if (catName != '') {
        categories.push(catName);
        hideAddCategoryScreen();
        document.getElementById("lblCategory").innerText = document.getElementById("lblCategory").innerText.concat(catName);
        document.getElementById("lblCategory").style.display = 'flex';
    }
    else{
        document.getElementById("errCatName").style.display = 'flex';
    }
}

function addItem() {
    hideValidations();
    var isValid = validateItem();
    if (isValid) {
        var item = {};
        item.category = document.getElementById("categoryName").value;
        item.name = document.getElementById("itemName").value;
        item.description = document.getElementById("description").value;
        item.price = document.getElementById("price").value;
        item.tag = document.getElementById("tag").value;

        if(isEdit){
            //TODO use id instead of name
            items[editIndex] = item;
            isEdit = false;
            editIndex = -1;
        }
        else{
            items.push(item);
        }
        clearItemsForm();

        var data = document.getElementById('addedItems');
        data.innerHTML = '';
         //TODO use id instead of category index
        categories.forEach(function (category, catIndex) {
            var cName = document.createElement('div');
            cName.innerHTML = category;
             //TODO use id instead of category name
            var itemsInCategory = items.filter(i => i.category == category);
            itemsInCategory.forEach(function (item, index) {
                var iName = document.createElement('div');
                iName.innerHTML = item.name;
                var btnEdit = document.createElement('button');
                btnEdit.type="button";
                btnEdit.textContent="Edit";
                var editFunction = 'editItem('.concat(index,',',catIndex,')')
                btnEdit.setAttribute('onclick',editFunction)
                btnEdit.id = 'btnEdit_'.concat(index)
                cName.appendChild(iName);
                cName.appendChild(btnEdit);
            })

            data.appendChild(cName);
        });

        document.getElementById("addNewCategory").style.display = 'flex';
    }
    else {
        if (document.getElementById("itemName").value == '')
            document.getElementById("errName").style.display = 'flex';
        if (document.getElementById("price").value == '' || !/^[0-9]+$/.test(document.getElementById("price").value))
            document.getElementById("errPrice").style.display = 'flex';

    }
}

function validateItem() {
    if (document.getElementById("itemName").value == '' || document.getElementById("price").value == '' ||
    !/^[0-9]+$/.test(document.getElementById("price").value)) {
        return false;
    }
    return true;
}


function addAnotherCategory() {
    clearItemsForm();
    showAddCategoryScreen();
}

function clearItemsForm() {
    document.getElementById("itemName").value = '';
    document.getElementById("description").value = '';
    document.getElementById("price").value = '';
    document.getElementById("tag").value = '';
}

function showAddCategoryScreen() {
    document.getElementById("categoryName").value = '';
    document.getElementById("categoryName").style.display = 'flex';
    document.getElementById("addNewCategory").style.display = 'none';
    document.getElementById("itemDetails").style.display = 'none';
    document.getElementById("lblCategory").style.display = 'none';
    document.getElementById("btnCreateCategory").style.display = 'flex';
    hideValidations();
}

function hideValidations(){
    document.getElementById("errPrice").style.display = 'none';
    document.getElementById("errName").style.display = 'none';
    document.getElementById("errCatName").style.display = 'none';
}

function hideAddCategoryScreen() {
    document.getElementById("categoryName").style.display = 'none';
    document.getElementById("btnCreateCategory").style.display = 'none';
    document.getElementById("itemDetails").style.display = 'flex';
}

function editItem(index, catIndex){   
    isEdit = true;
    editIndex = index;
    editCatIndex = catIndex;
    hideAddCategoryScreen();
    var cat = categories[catIndex];
    var itemsInCategory = items.filter(i => i.category == cat);
    document.getElementById("itemName").value = itemsInCategory[index].name;
    document.getElementById("description").value = itemsInCategory[index].description;
    document.getElementById("price").value = itemsInCategory[index].price;
    document.getElementById("tag").value =itemsInCategory[index].tag;
}

