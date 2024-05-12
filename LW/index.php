<?php

$db = new PDO("mysql:host=localhost;dbname=menu", "Viktoriia", "V1k.456789");

$query = $db->query("SELECT * FROM items");

$categories = [];

while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    $category = $row['category'];
    $categories[$category][] = $row; // Додаємо товар у відповідну категорію
}
?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arssaa Coffee</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <!-- header section starts  -->

    <header class="header">

        <a href="#" class="logo">
            <img src="img/(logo1).png" alt="">
        </a>

        <nav class="navbar">
            <a href="#home">home</a>
            <a href="#about">about</a>
            <a href="#menu">menu</a>
            <a href="#products">products</a>
            <a href="#review">review</a>
            <a href="#contact">contact</a>
        </nav>

        <div class="icons">
            <div class="fas fa-search" id="search-btn"></div>
            <div class="fas fa-shopping-cart" id="cart-btn">
                <span id="cart-count">0</span> <!-- Тут буде відображатися кількість товарів -->
            </div>
            
            <div class="fas fa-bars" id="menu-btn"></div>
        </div>

        <div class="search-form">
            <input type="search" id="search-box" placeholder="search here...">
            <label for="search-box" class="fas fa-search"></label>
        </div>

        <div class="cart-items-container">
            <h4>Preorder of items</h4>
            <div id="cart" class="cart-items">
                <!-- Сюди будуть додаватися товари -->
            </div>
            
            <div id="total-amount-container">
                Total Amount: <span id="total-amount">0.00€</span>
            </div>
            
            <a href="#" class="btn">preorder now</a>
        </div>
        
        
  

    </header>

    <!-- header section ends -->

    <!-- home section starts  -->

    <section class="home" id="home">

        <div class="content">
            <h3>fresh coffee in the morning</h3>
            <p> Dive into the ethos that drives our coffee shop, where quality, community, and sustainability are at the forefront of everything we do. 
            Save time and guarantee your favorite treats by pre-ordering ahead. Whether it's your morning brew or a special treat for later, we'll have it ready for you.
            </p>
            <a href="#menu" class="btn">Order now</a>
        </div>

    </section>

    <!-- home section ends -->

    <!-- about section starts  -->

    <section class="about" id="about">

        <h1 class="heading"> <span>about</span> us </h1>

        <div class="row">

            <div class="image">
                <img src="img/about.png" alt="">
            </div>

            <div class="content">
                <h3>what makes our coffee special?</h3>
                <p>Indulge your senses in the aromatic embrace of freshly brewed coffee and the tantalizing allure of our exquisite coffee beans. At our cozy café, we offer not only the finest selection of handcrafted brews but also the opportunity to take home the essence of our passion – our premium coffee beans.
                  Discover the art of coffee, from bean to cup, as you immerse yourself in our Home section. Take home a bag of our carefully sourced and expertly roasted coffee beans, ensuring that every morning begins with the promise of perfection.
                </p>
                <p>Join us in celebrating the essence of coffee – not just a beverage, but a way of life. Come, savor the moment, and elevate your coffee experience with us</p>
                
                <!-- This button will redirect to our Instagram page.  -->
                <a href="#" class="btn">learn more</a>
            </div>
         </div>
       

         <div class="row2">
         <div class="weather_container">
            <div class="search-box">
                <i class="fas fa-location-dot"></i>
                <input type="text" placeholder="Enter your location" />
                <button class="fas fa-search"></button>
            </div>
            <div class="error">
                <p>Invalid city name</p>
            </div>
            <div class="weather">
                <div class="weather-image">
                    <i class="fas fa-cloud"></i>
                </div>
                <h1 class="temp">22 &#8451</h1>
                <h2 class="city">New York</h2>
                <div class="details">
                    <div class="col">
                        <i class="fas fa-tint"></i>
                        <div>
                            <p class="humidity">50%</p>
                            <p>Humidity</p>
                        </div>
                    </div>
                    <div class="col">
                        <i class="fas fa-wind"></i>
                        <div>
                            <p class="wind">15 km/h</p>
                            <p>Wind Speed</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        

        <div class="content">
        <h1 class="heading"> Exciting news!</h1>
        <p>Starting May 7th, our patio is officially open! </p>
        <p>However, we recommend checking the weather before planning to eat out.</p>
    </div>
</div>
   

</section>

    <!-- about section ends -->

    <!-- menu section starts  -->

    <section class="menu" id="menu">

<h1 class="heading"> our <span>menu</span> </h1>

<?php foreach ($categories as $category => $items): ?>
            <h2 class="heading"><?= $category; ?></h2>
            <div class="box-container">
                <?php foreach ($items as $item): ?>
                    <!-- item -->
                    <div class="box">
                        <img src="<?= $item['image']; ?>" alt="">
                        <h3><?= $item['title']; ?></h3>
                        <p>Price: <?= $item['price']; ?></p> <!-- Відображення ціни -->
                        <button onclick="addToCart('<?= $item['title']; ?>', '<?= $item['price']; ?>', '<?= $item['image']; ?>')">add to cart</button>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>

    
</section>



      
    
    <!-- menu section ends -->
    <!-- products section starts -->

    <section class="products" id="products">

        <h1 class="heading"> our <span>products</span> </h1>

        <div class="box-container">

            <div class="box">
                <div class="icons">
                    <a href="#" class="fas fa-shopping-cart"></a>
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-eye"></a>
                </div>
                <div class="image">
                    <img src="img/product1.png" alt="">
                </div>
                <div class="content">
                    <h3>House Blend Light Roast Coffee</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <div class="price">14.99€ <span>20,50€</span></div>
                </div>
            </div>

            <div class="box">
                <div class="icons">
                    <a href="#" class="fas fa-shopping-cart"></a>
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-eye"></a>
                </div>
                <div class="image">
                    <img src="img/product2.png" alt="">
                </div>
                <div class="content">
                    <h3>Espresso Roast Blend Whole Beans 1lb bag</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <div class="price">18,40€ <span>24,99€</span></div>
                </div>
            </div>

            <div class="box">
                <div class="icons">
                    <a href="#" class="fas fa-shopping-cart"></a>
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-eye"></a>
                </div>
                <div class="image">
                    <img src="img/product3.png" alt="">
                </div>
                <div class="content">
                    <h3>Mocha Java Coffee</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <div class="price">19.95€</div>
                </div>
            </div>

        </div>

    </section>

    <!-- review section starts  -->

    <section class="review" id="review">

        <h1 class="heading"> customer's <span>review</span> </h1>

        <div class="box-container">

            <div class="box">
                <img src="img/qoute.png" alt="" class="quote">
                <p>This café is a must-visit for coffee enthusiasts! The aroma, variety, and quality of coffee are exceptional. Cozy ambiance, friendly staff, and an overall delightful experience!</p>
                <img src="img/review1.png" class="user" alt="">
                <h3>Alex Smith</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>

            <div class="box">
                <img src="img/qoute.png" alt="" class="quote">
                <p>Stumbled upon this café and found a treasure! Impressive coffee selection, meticulous preparation, and charming ambiance. Perfect for work or relaxation.</p>
                <img src="img/review2.png" class="user" alt="">
                <h3>Emily Johnson</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>

            <div class="box">
                <img src="img/qoute.png" alt="" class="quote">
                <p>A haven for coffee aficionados! Exceptional quality, diverse menu, and cozy atmosphere. Once you try their coffee, you'll be hooked!</p>
                <img src="img/review3.png" class="user" alt="">
                <h3>David Wilson</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>

        </div>

    </section>

    <!-- review section ends -->

    <!-- contact section starts  -->

    <section class="contact" id="contact">

        <h1 class="heading"> <span>contact</span> us </h1>

        <div class="row">

            <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2573.11886910223!2d24.022173835030827!3d49.840223967699416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x473add717532da69%3A0xf0cb97b8441ff1fe!2z0LLRg9C70LjRhtGPINCj0L3RltCy0LXRgNGB0LjRgtC10YLRgdGM0LrQsCwgMSwg0JvRjNCy0ZbQsiwg0JvRjNCy0ZbQstGB0YzQutCwINC-0LHQu9Cw0YHRgtGMLCDQo9C60YDQsNGX0L3QsCwgNzkwMDA!5e0!3m2!1suk!2slt!4v1715076344988!5m2!1suk!2slt" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

            <form omsubmit="sendEmail(); reset(); return false;">
                <h3>get in touch</h3>
                <div class="inputBox">
                    <span class="fas fa-user"></span>
                    <input type="text" id="text" placeholder="name">
                </div>
                <div class="inputBox">
                    <span class="fas fa-envelope"></span>
                    <input type="email"id="email" placeholder="email">
                </div>
                <div class="inputBox">
                    <span class="fas fa-phone"></span>
                    <input type="number" id="number"placeholder="number">
                </div>
                <input type="submit" value="contact now" class="btn">
            </form>
        </div>
            

    </section>

    <!-- contact section ends -->

    <!-- footer section starts  -->

    <section class="footer">

        <div class="share">
            <a href="https://www.instagram.com/lviv_university?igsh=MWhoZXliOWk3azhrMQ==" class="fab fa-instagram"></a>
        </div>

        <div class="links">
            <a href="#home">home</a>
            <a href="#about">about</a>
            <a href="#menu">menu</a>
            <a href="#products">products</a>
            <a href="#review">review</a>
        </div>

    </section>


    <!-- footer section ends -->

    <!-- custom js file link  -->
    <script src="script.js"></script>

</body>

</html>

