let navbar = document.querySelector('.navbar');

document.querySelector('#menu-btn').onclick = () =>{
    navbar.classList.toggle('active');
    searchForm.classList.remove('active');
    cartItem.classList.remove('active');
}

let searchForm = document.querySelector('.search-form');

document.querySelector('#search-btn').onclick = () =>{
    searchForm.classList.toggle('active');
    navbar.classList.remove('active');
    cartItem.classList.remove('active');
}

let cartItem = document.querySelector('.cart-items-container');

document.querySelector('#cart-btn').onclick = () =>{
    cartItem.classList.toggle('active');
    navbar.classList.remove('active');
    searchForm.classList.remove('active');
}

window.onscroll = () =>{
    navbar.classList.remove('active');
    searchForm.classList.remove('active');
    cartItem.classList.remove('active');
}

let totalAmount = 0;
let cart = []; // Масив для збереження даних про товари у кошику

// Функція для оновлення загальної суми замовлення
function updateTotalAmount() {
    document.getElementById('total-amount').textContent = totalAmount.toFixed(2) + '€';
}

// Функція для оновлення кількості товарів у кошику
function updateCartCount() {
    let cartCountElement = document.getElementById('cart-count');
    cartCountElement.textContent = cart.length;
}

// Функція для додавання товарів до кошика
function addToCart(itemName, price, imageSrc) {
    // Створюємо новий елемент товару
    let cartItem = document.createElement('div');
    cartItem.classList.add('cart-item');

    // Додаємо зображення товару
    let itemImage = document.createElement('img');
    itemImage.src = imageSrc;
    itemImage.classList.add('item-image');
    cartItem.appendChild(itemImage);

    // Додаємо назву товару
    let itemNameElement = document.createElement('h3');
    itemNameElement.textContent = itemName;
    itemNameElement.classList.add('item-name');
    cartItem.appendChild(itemNameElement);

    // Додаємо ціну товару
    let itemPriceElement = document.createElement('p');
    itemPriceElement.textContent = price;
    cartItem.appendChild(itemPriceElement);

    // Обчислюємо загальну суму замовлення
    totalAmount += parseFloat(price.replace('€', '').replace(',', '.'));

    // Оновлюємо загальну суму замовлення
    updateTotalAmount();

    // Додаємо кнопку для видалення товару
    let removeButton = document.createElement('button');
    removeButton.innerHTML = '&#10006;'; // Іконка хрестика
    removeButton.classList.add('remove-button');
    removeButton.addEventListener('click', function() {
        // Видаляємо товар при натисканні на кнопку
        cartItem.remove();

        // Зменшуємо загальну суму замовлення на ціну видаленого товару
        totalAmount -= parseFloat(price.replace('€', '').replace(',', '.'));

        // Оновлюємо загальну суму замовлення
        updateTotalAmount();

        // Зменшуємо кількість товарів у кошику
        cart.splice(cart.indexOf(itemName), 1);
        updateCartCount();
    });
    cartItem.appendChild(removeButton);

    // Додаємо товар до кошика
    document.getElementById('cart').appendChild(cartItem);

    // Додаємо товар до масиву з даними про товари у кошику
    cart.push(itemName);
    updateCartCount();
}

// Обробник подій для кнопок "add to cart"
document.querySelectorAll('.btn').forEach(button => {
    button.addEventListener('click', function(event) {
        // Отримуємо дані товару з його батьківського елементу
        let itemBox = event.target.closest('.box');
        let itemName = itemBox.querySelector('h3').textContent;
        let itemPrice = itemBox.querySelector('.price').textContent;
        let itemImageSrc = itemBox.querySelector('img').src;

        // Додаємо товар до кошика
        addToCart(itemName, itemPrice, itemImageSrc);
    });
});


let preorderButton = document.querySelector('.btn');

// Додайте обробник подій 'click'
preorderButton.addEventListener('click', function(event) {
    // Запобігти стандартній поведінці посилання
    event.preventDefault();

    // Вивести повідомлення
    alert('Preorder has been successfully completed!');
});


const apiKey = "768e0288406389e6e0f9840659813b24";

const apiUrl = `https://api.openweathermap.org/data/2.5/weather?units=metric&q=`;

const searchInput = document.querySelector(".search-box input");

const searchButton = document.querySelector(".search-box button");

const weatherIcon = document.querySelector(".weather-image i");

const weather = document.querySelector(".weather");

const errorText = document.querySelector(".error");

async function checkWeather(city) {
  const response = await fetch(apiUrl + city + `&appid=${apiKey}`);

  if (response.status === 404) {
    errorText.style.display = "block";
    weather.style.display = "none";
  } else {
    const data = await response.json();
    console.log(data);

    document.querySelector(".city").innerHTML = data.name;
    document.querySelector(".temp").innerHTML =
      Math.round(data.main.temp) + "&#8451";
    document.querySelector(".humidity").innerHTML = data.main.humidity + "%";
    document.querySelector(".wind").innerHTML = data.wind.speed + " km/h";

    if (data.weather[0].main == "Clear") {
      weatherIcon.className = "fa-solid fa-sun";
    } else if (data.weather[0].main == "Rain") {
      weatherIcon.className = "fa-solid fa-cloud-rain";
    } else if (data.weather[0].main == "Mist") {
      weatherIcon.className = "fa-solid fa-cloud-mist";
    } else if (data.weather[0].main == "Drizzle") {
      weatherIcon.className = "fa-solid fa-cloud-drizzle";
    }

    weather.style.display = "block";
    errorText.style.display = "none";
  }
}

searchButton.addEventListener("click", () => {
  checkWeather(searchInput.value);
  searchInput.value = "";
});

searchInput.addEventListener("keydown", (event) => {
  if (event.keyCode === 13) {
    checkWeather(searchInput.value);
    searchInput.value = "";
  }
});

src=" https://smtpjs.com/v3/smtp.js"
function sendEmail(){
    Email.send({
        Host : "smtp.elasticemail.com",
        Username : "vikasobolta7@gmail.com",
        Password : "p",
        To : 'them@website.com',
        From : "you@isp.com",
        Subject : "This is the subject",
        Body : "And this is the body"
    }).then(
      message => alert(message)
    );
}