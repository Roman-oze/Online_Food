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
    {
        id: 1,
        name: 'Veg Chick',
        image: '1.png',
        price: '$7'
    },
    {
        id: 2,
        name: 'Grill Chiken',
        image: '2.PNG',
        price: '$8'
    },
    {
        id: 3,
        name: 'Veg Fish',
        image: '3.PNG',
        price: '$9'
    },
    {
        id: 4,
        name: 'Momo',
        image: 'momo.jpg',
        price: '$5'
    },
    {
        id: 5,
        name: 'Meat-Box',
        image: 'meat-box.jpg',
        price: '$6'
    },
    {
        id: 6,
        name: 'Doi',
        image: 'dui.jpg',
        price: '$10'
    },
    {
        id: 7,
        name: 'Kabab',
        image: 'kabab.jpg',
        price: '$10'
    },
    {
        id: 8,
        name: 'kalavuna',
        image: 'kalavuna.jpg',
        price: '$10'
    },
    {
        id: 9,
        name: 'Halim',
        image: 'halim.jpg',
        price: '$5'
    },
    {
        id: 10,
        name: 'Kacchi',
        image: 'kacchi.jpg',
        price: '$10'
    },
    {
        id: 11,
        name: 'Rosmolay',
        image: 'roshmolay.jpg',
        price: '$10'
    },
    {
        id: 12,
        name: 'Biriyani',
        image: 'biriyani.webp',
        price: '$10'
    },
    {
        id: 13,
        name: 'Doi-Fuska',
        image: 'doi-fuchka.jpg',
        price: '$5'
    },
    {
        id: 14,
        name: 'Khichuri',
        image: 'khichuri.jpg',
        price: '$10'
    },
    {
        id: 15,
        name: 'Elish Fish',
        image: 'mach.jpg',
        price: '$10'
    }
];
let listCards  = [];
function initApp(){
    products.forEach((value, key) =>{
        let newDiv = document.createElement('div');
        newDiv.classList.add('item');
        newDiv.innerHTML = `
            <img src="/View/${value.image}">
            <div class="title">${value.name}</div>
            <div class="price">${value.price.toLocaleString()}</div>
            <button onclick="addToCard(${key})">Add To Card</button>`;
        list.appendChild(newDiv);
    })
}
initApp();
function addToCard(key){
    if(listCards[key] == null){
        products[key].price = parseInt(products[key].price.replace('$', ''));
        // copy product form list to list card
        listCards[key] = JSON.parse(JSON.stringify(products[key]));
        listCards[key].quantity = 1;
    }
    reloadCard();
}

function changeQuantity(key, quantity){
    if(quantity == 0){
        delete listCards[key];
    }else{
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
        totalPrice = totalPrice + value.price;
        count = count + value.quantity;
        if(value != null){
            let newDiv = document.createElement('li');
            newDiv.innerHTML = `
                <div><img src="/View/${value.image}"/></div>
                <div>${value.name}</div>
                <div>
                    <button onclick="changeQuantity(${key}, ${value.quantity - 1})">-</button>
                    <div class="count">${value.quantity}</div>
                    <button onclick="changeQuantity(${key}, ${value.quantity + 1})">+</button>
                </div>
                <div>${value.price.toLocaleString()} $</div>`;
                listCard.appendChild(newDiv);
        }
    })
    total.innerText = 'Total = '+ totalPrice + '$';
    quantity.innerText = count;
}