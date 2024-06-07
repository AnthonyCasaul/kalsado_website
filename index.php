<?php
include './inc/header.php';
?>
<body>
<style>
    .container2 {
  height: 100vh;
  justify-content: center;
  display: grid;
  grid-template-rows: 200px 100px 100px 100px 100px 100px;
  grid-template-columns: 400px 100px 200px 100px 400px 100px;
}
.box {
  padding: 5px;
}
#box1 {
  background-image: url("./assets/images/shop_now.jpg");
  background-size: cover;
  background-position: center;
  border-radius: 30px;
  grid-column: 1/5;
  grid-row: 1/4;
}
#box2 {
  margin-left: 25px;
  background-image: url("./assets/images/kalsado_ann.jpg");
  background-size: cover;
  border-radius: 30px;
  grid-column: 5/7;
  grid-row: 1/7;
}

#box3 {
  margin-top: 25px;
  border-radius: 30px;
  grid-column: 1/3;
  grid-row: 4/7;
  position: relative;
  overflow: hidden;
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  padding: 0;
  padding-top: 0px;
  padding-left: 0px;
}
#box3 .slider {
  height: 300%;
  display: flex;
  transition: transform 0.5s ease-in-out;
}
#box3 .slider img {
  width: auto;
  max-width: 100%;
  max-height: 100%;
  object-fit: contain;
  object-position: top;
  opacity: 0.9;
}
.arrow {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  font-size: 24px;
  color: white;
  cursor: pointer;
  z-index: 1;
  background: rgba(0, 0, 0, 0.5);
  padding: 10px;
  border-radius: 50%;
}
.arrow.left {
  left: 10px;
}
.arrow.right {
  right: 10px;
}
#box4 {
  margin-left: 25px;
  margin-top: 25px;
  background-color: #f1d0b4;
  border-radius: 30px;
  grid-column: 3/5;
  grid-row: 4/7;
}
.line {
  padding-left: 50px;
  padding-right: 50px;
}
#line1 {
  font-family: "Poetsen One", sans-serif;
  color: white;
  font-size: 56px;
  margin-bottom: 0;
}
#line2 {
  font-family: "Rubik", sans-serif;
  color: white;
  font-size: 26px;
  font-style: italic;
}
.shopNowButton {
  font-family: "Teachers", sans-serif;
  border-radius: 10px;
  background-color: black;
  color: white;
  margin: 0;
  padding: 10px 15px;
  font-size: 15px;
}
.cont4 {
  position: relative;
}
.cont4 .wrapper {
  border-radius: 30px;
  width: 100%;
  height: 265px;
  background-size: cover;
  overflow: hidden;
}
.cont4 .wrapper-holder {
  display: grid;
  grid-template-columns: repeat(100, 100%);
  height: 100%;
  width: 100%;
  background-size: cover;
  animation: slider 10s ease-in-out infinite alternate;
}
.cont4 #slider-img-1 {
  background-image: url("./assets/images/adidas.png");
  background-position: center;
  background-size: cover;
}
.cont4 #slider-img-2 {
  background-image: url("./assets/images/nike.png");
  background-position: center;
  background-size: cover;
}
.cont4 #slider-img-3 {
  background-image: url("./assets/images/reebok.png");
  background-position: center;
  background-size: cover;
}
.cont4 #slider-img-4 {
  background-image: url("./assets/images/newbalance.png");
  background-position: center;
  background-size: cover;
}
.cont4 #slider-img-5 {
  background-image: url("./assets/images/onitsuka.png");
  background-position: center;
  background-size: cover;
}
.cont4 #slider-img-6 {
  background-image: url("./assets/images/puma.png");
  background-position: center;
  background-size: cover;
}
.cont4 #slider-img-7 {
  background-image: url("./assets/images/asics.png");
  background-position: center;
  background-size: cover;
}
.cont4 #slider-img-8 {
  background-image: url("./assets/images/converse.png");
  background-position: center;
  background-size: cover;
}
.cont4 #slider-img-9 {
  background-image: url("./assets/images/jordan.png");
  background-position: center;
  background-size: cover;
}
.button:hover {
  box-shadow: 0px 0px 7px 4px rgba(219, 148, 16, 0.6);
}
@keyframes slider {
  0% {
    transform: translateX(0%);
  }
  10% {
    transform: translateX(-100%);
  }
  20% {
    transform: translateX(-100%);
  }
  30% {
    transform: translateX(-200%);
  }
  40% {
    transform: translateX(-200%);
  }
  50% {
    transform: translateX(-200%);
  }
  60% {
    transform: translateX(-300%);
  }
  70% {
    transform: translateX(-300%);
  }
  80% {
    transform: translateX(-300%);
  }
  90% {
    transform: translateX(0%);
  }
  100% {
    transform: translateX(0%);
  }
}
</style>
<div class="container-fluid">
  <div class="container2">
      <div class="box" id="box1">
          <div class="cont1">
              <div class="line">
                  <p id="line1">Take Your Style to New Heights</p>
                  <p id="line2">We can outsource any pair! Message us, and consider it already found, just for you!</p>
                  <a href=""><button class="shopNowButton" title="Shop Now!">Place your Order Now!</button></a>
              </div>
          </div>
      </div>
      <div class="box" id="box2"></div>
      <div class="box" id="box3">
          <div class="slider">
              <img src="./assets/images/image1.jpg" alt="Image 1">
              <img src="./assets/images/image2.jpg" alt="Image 2">
              <img src="./assets/images/image3.jpg" alt="Image 3">
              <img src="./assets/images/image4.jpg" alt="Image 4">
              <img src="./assets/images/image5.jpg" alt="Image 5">
              <img src="./assets/images/image6.jpg" alt="Image 6">
              <img src="./assets/images/image7.jpg" alt="Image 7">
              <img src="./assets/images/image8.jpg" alt="Image 8">
          </div>
          <div class="arrow left">&#10094;</div>
          <div class="arrow right">&#10093;</div>
      </div>
      <div class="box" id="box4">
          <div class="cont4">
              <div class="wrapper">
                  <div class="wrapper-holder">
                      <div id="slider-img-1"></div>
                      <div id="slider-img-2"></div>
                      <div id="slider-img-3"></div>
                      <div id="slider-img-4"></div>
                      <div id="slider-img-5"></div>
                      <div id="slider-img-6"></div>
                      <div id="slider-img-7"></div>
                      <div id="slider-img-8"></div>
                      <div id="slider-img-9"></div>
                  </div>
              </div>
              <div class="button-holder">
                  <a href="#slider-img-1" class="button"></a>
                  <a href="#slider-img-2" class="button"></a>
                  <a href="#slider-img-3" class="button"></a>
                  <a href="#slider-img-4" class="button"></a>
                  <a href="#slider-img-5" class="button"></a>
                  <a href="#slider-img-6" class="button"></a>
                  <a href="#slider-img-7" class="button"></a>
                  <a href="#slider-img-8" class="button"></a>
                  <a href="#slider-img-9" class="button"></a>
              </div>
          </div>
      </div>
  </div>
</div>
</body>