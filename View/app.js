let openShopping = document.querySelector('.shopping');
let closeShopping = document.querySelector('.closeShopping');
let list = document.querySelector('.list');
let listCard = document.querySelector('.listCard');
let body = document.querySelector('body');
let quantity = document.querySelector('.quantity');
let total = document.querySelector('.total');


openShopping.addEventListener('click', ()=>{
    body.classList.add('active');
})
closeShopping.addEventListener('click', ()=>{
    body.classList.remove('active');
})

let products = [
]
let listCards  = [];
function initApp(){
    products.forEach((value, key) =>{
         // Create a new div for each product and append it to the list
        // The div contains product information and an "Add to Cart" button
        let newDiv = document.createElement('div');
        newDiv.classList.add('item');
        newDiv.innerHTML = `
            <img src="\e_delish\View/${value.image}">
            <div class="title">${value.name}</div>
            <div class="price">${value.price.toLocaleString()}</div>
            <button onclick="addToCard(${key})">Add To Card</button>`;
        list.appendChild(newDiv);
    })
}
initApp();
function addToCard(key){
    if(listCards[key] == null){
         // If the product is not in the list card, copy it from the products list
        // and set the quantity to 1
        products[key].price = parseInt(products[key].price.replace('$', ''));
        // copy product form list to list card
        listCards[key] = JSON.parse(JSON.stringify(products[key]));
        listCards[key].quantity = 1;
    }
    reloadCard();
}

function changeQuantity(key, quantity){
    if(quantity == 0){
         // If the quantity is 0, remove the product from the list card
        delete listCards[key];
    }else{
        // Update the quantity and price of the product in the list card
        listCards[key].quantity = quantity;
        listCards[key].price = quantity * products[key].price;
    }
    reloadCard();
}
function reloadCard(){
    listCard.innerHTML = '';
    let count = 0;
    let totalPrice = 0;

    listCards.forEach((value, key)=>{
         // Iterate through the products in the list card and update the displayed information
        totalPrice = totalPrice + value.price;
        count = count + value.quantity;

        if(value != null){
            let newDiv = document.createElement('li');
            newDiv.innerHTML = `
                <div><img src="\e_delish\View/${value.image}"/></div>
                <div>${value.name}</div>
                <div>
                    <button onclick="changeQuantity(${key}, ${value.quantity - 1})">-</button>
                    <div class="count">${value.quantity}</div>
                    <button onclick="changeQuantity(${key}, ${value.quantity + 1})">+</button>
                </div>
                <div>${value.price.toLocaleString()} $</div>`;
                listCard.appendChild(newDiv);
  // Update the total quantity and price
        }
    })
    total.innerText = 'Total = '+ totalPrice + '$';
    quantity.innerText = count;
}