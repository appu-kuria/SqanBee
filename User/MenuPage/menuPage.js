addedItems = [];

window.onload = function () {
    var acc = document.getElementsByClassName("category_name");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function () {
            /* Toggle between adding and removing the "active" class,
            to highlight the button that controls the panel */
            this.classList.toggle("active");

            /* Toggle between hiding and showing the active panel */
            var panel = this.nextElementSibling;
            if (panel.style.display === "block") {
                panel.style.display = "none";
            } else {
                panel.style.display = "block";
            }
        });
    }
}

function addItemToCart(itemId, itemName) {
    var index = addedItems.findIndex(i => i.id == itemId);
    if (index == -1) {
        var item = {};
        item.id = itemId;
        item.name = itemName;
        item.count = 1;
        addedItems.push(item);
        var count = document.getElementById('count_' + itemId);
        var add_btn = document.getElementById('add_btn_' + itemId);
        add_btn.style.display ="none";
        count.value = 1;
        var plusMinus_ = document.getElementById('plusMinus_' + itemId);
        plusMinus_.style.display ="flex";

        // var orderCount = document.getElementById('orderCount');
        // orderCount.style.display = "block";
        // var added_item = document.getElementById('added_item');
        // added_item.innerText = getTotalCount() + ' items';

    }
    else {
        addedItems[index].count++;
        var count = document.getElementById('count_' + itemId);
        count.value = addedItems[index].count;

        var add_btn = document.getElementById('add_btn_' + itemId);
        add_btn.style.display ="none";
        var plusMinus_ = document.getElementById('plusMinus_' + itemId);
        plusMinus_.style.display ="flex";

        
        // var added_item = document.getElementById('added_item');
        // added_item.innerText = getTotalCount() + ' items';
    }

}

function removeItemFromCart(itemId){
    var index = addedItems.findIndex(i => i.id == itemId);
    if (index == -1) {
    }
    else {
        addedItems[index].count--;
        var count = document.getElementById('count_' + itemId);
        count.value = addedItems[index].count;
        if(count.value ==0){
            var add_btn = document.getElementById('add_btn_' + itemId);
            add_btn.style.display ="block";
            var plusMinus_ = document.getElementById('plusMinus_' + itemId);
            plusMinus_.style.display ="none";
        }
    }
}

function getTotalCount() {
   var count =0;
   addedItems.forEach(function (item) {
    count += item.count;
   })
   return count;


}

function viewOrderList(){
    // var orderCount = document.getElementById('orderCount');
    // orderCount.style.display ="none";
    
    // var orderDetail = document.getElementById('orderDetail');
    // orderDetail.style.display ="block";


    var item_added_list = document.getElementById('item_added_list');
    item_added_list.innerHTML ='';
    addedItems.forEach(function (item, index) {
        var display_list_item = document.createElement('div');
        display_list_item.setAttribute('class', 'display_list_item');

        var itemName = document.createElement('div');
       itemName.innerHTML = item.name;

       var count = document.createElement('div');
       count.innerHTML = item.count;

       display_list_item.appendChild(itemName);
       display_list_item.appendChild(count);
       item_added_list.appendChild(display_list_item);
    })
}


function backToOrderpage(){
    var orderDetail = document.getElementById('orderDetail');
    orderDetail.style.display ="none";

    var orderCount = document.getElementById('orderCount');
    orderCount.style.display ="block";

    
    var item_added_list = document.getElementById('item_added_list');
    item_added_list.innerHTML ='';
}

