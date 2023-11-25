
  document.addEventListener('DOMContentLoaded', function () {
    var mySwiper = new Swiper('.swiper-custom-container', {
      // Optional: Set the direction (horizontal by default)
      direction: 'horizontal',
      // Optional: Set the speed of the transition
      speed: 1000, // 1 second
      // Optional: Set autoplay and specify the time between slides
      autoplay: {
        delay: 1000, // 3 seconds
        disableOnInteraction: false,
      },
    });
  });