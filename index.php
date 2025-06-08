<!-- /*
* Template Name: LuxuryHotel
* Template Author: Untree.co
* Tempalte URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<?php include 'model.php'; ?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="favicon.png">

  <meta name="description" content="" />
  <meta name="keywords" content="" />

  <link
    href="https://fonts.googleapis.com/css?family=Cormorant+Garamond:400,500i,700|Roboto:300,400,500,700&display=swap"
    rel="stylesheet">

  <link rel="stylesheet" href="css/vendor/icomoon/style.css">
  <link rel="stylesheet" href="css/vendor/owl.carousel.min.css">
  <link rel="stylesheet" href="css/vendor/aos.css">
  <link rel="stylesheet" href="css/vendor/animate.min.css">
  <link rel="stylesheet" href="css/vendor/bootstrap.css">

  <!-- Theme Style -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/php_styles.css">

  <title>MK Hotel</title>
  <style>
    .loader {
      display: inline-block;
      width: 14px;
      height: 14px;
      border: 2px solid #999;
      border-top: 2px solid transparent;
      border-radius: 50%;
      animation: spin 0.7s linear infinite;
      vertical-align: middle;
      margin-left: 5px;
    }

    @keyframes spin {
      0% {
        transform: rotate(0deg);
      }

      100% {
        transform: rotate(360deg);
      }
    }

    .input-error {
      border: 1px solid red;
      background-color: #ffe5e5;
    }

    .error-text {
      color: red;
      font-size: 0.9em;
      margin-top: 3px;
    }

    .input-error {
      border-color: red;
    }

    .error-text {
      color: red;
      font-size: 0.9em;
    }

    .loader {
      display: inline-block;
      width: 1em;
      height: 1em;
      border: 2px solid #ccc;
      border-top-color: #333;
      border-radius: 50%;
      animation: spin 0.6s linear infinite;
    }

    @keyframes spin {
      to {
        transform: rotate(360deg);
      }
    }
  </style>


</head>

<body>

  <div id="untree_co--overlayer"></div>
  <div class="loader">
    <div class="spinner-border text-primary" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>

  <nav class="untree_co--site-mobile-menu">
    <div class="close-wrap d-flex">
      <a href="#" class="d-flex ml-auto js-menu-toggle">
        <span class="close-label">Close</span>
        <div class="close-times">
          <span class="bar1"></span>
          <span class="bar2"></span>
        </div>
      </a>
    </div>
    <div class="site-mobile-inner"></div>
  </nav>


  <div class="untree_co--site-wrap">

    <nav class="untree_co--site-nav js-sticky-nav">
      <div class="container d-flex align-items-center justify-content-between">

        <!-- Logo -->
        <div class="logo-wrap">
          <a href="index.php" class="untree_co--site-logo d-flex align-items-center">

            <!-- Image logo for desktop only -->
            <img src="images/mk_hotel/logo/mk_text.png" alt="MK Logo" class="d-none d-md-block" height="40">

            <!-- Text logo for mobile only -->
            <span class="d-block d-md-none h5 mb-0 ml-2 text-dark">MK Hotel</span>

          </a>
        </div>

        <!-- Book Now button - center on mobile only -->
        <div class="d-flex d-lg-none justify-content-center flex-grow-1">
          <button id="openModalBtn" class=" btn btn-dark btn-sm mx-auto">Book Now</button>
        </div>

        <!-- Hamburger Icon - right on mobile -->
        <div class="icons-wrap d-lg-none">
          <a href="#" class="burger js-menu-toggle" data-toggle="collapse" data-target="#main-navbar">
            <span></span>
          </a>
        </div>

        <!-- Full menu for desktop -->
        <div class="site-nav-ul-wrap text-center d-none d-lg-block ms-auto">
          <ul class="site-nav-ul js-clone-nav">
            <li class="active"><a href="index.html">Home</a></li>
            <li class="has-children">
              <a href="rooms.html">Rooms</a>
              <ul class="dropdown">
                <li><a href="#">Executive Suite</a></li>
                <li><a href="#">Twin Bedroom</a></li>
                <li><a href="#">Delux</a></li>
                <li><a href="#">Standard</a></li>
                <li><a href="#">Mini Standard</a></li>
              </ul>
            </li>
            <li><a href="amenities.html">Amenities</a></li>
            <li><a href="gallery.html">Gallery</a></li>
            <li><a href="about.html">About Us</a></li>
            <li><a href="contact.html">Contact</a></li>
            <!-- Only visible on desktop (nav expanded) -->
            <li class="d-none d-lg-inline-block">
              <button id="openModalBtn2" class="btn btn-dark rounded">Book Now</button>
            </li>
          </ul>
        </div>

        <div class="icons-wrap text-md-right">

          <ul class="icons-top d-none d-lg-block">

            <li>
              <a href="#"><span class="icon-facebook"></span></a>
            </li>
            <li>
              <a href="#"><span class="icon-twitter"></span></a>
            </li>
            <li>
              <a href="https://www.instagram.com/mkhotel_ltd?igsh=bXc3NGZyaDRqMHN0"><span
                  class="icon-instagram"></span></a>
            </li>
          </ul>

          <!-- Mobile Toggle -->
          <a href="#" class="d-block d-lg-none burger js-menu-toggle" data-toggle="collapse" data-target="#main-navbar">
            <span></span>
          </a>
        </div>
      </div>
    </nav>


    <div class="untree_co--site-main">


      <div class="owl-carousel owl-hero">

        <div class="untree_co--site-hero overlay" style="background-image: url('images/mk_hotel/up.jpg')">
          <div class="container">
            <div class="row align-items-center justify-content-center">
              <div class="col-md-8">
                <div class="site-hero-contents text-center" data-aos="fade-up">
                  <h1 class="hero-heading"> Welcome to MK Hotel </h1>
                  <div class="sub-text">
                    <p>Experience comfort, elegance, and exceptional hospitality at MK Hotel — your perfect destination
                      for business, leisure, or a relaxing escape. Let us make your stay unforgettable.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="untree_co--site-hero overlay" style="background-image: url('images/mk_hotel/vip.jpg')">
          <div class="container">
            <div class="row align-items-center justify-content-center">
              <div class="col-md-7">
                <div class="site-hero-contents text-center" data-aos="fade-up">
                  <h1 class="hero-heading">Enjoy Your Stay</h1>
                  <div class="sub-text">
                    <p>From executive suites to serene spaces, MK Hotel offers a wide range of amenities tailored to
                      your comfort and relaxation.</p>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="untree_co--site-hero overlay" style="background-image: url('images/mk_hotel/recep.jpg')">
          <div class="container">
            <div class="row align-items-center justify-content-center">
              <div class="col-md-10">
                <div class="site-hero-contents text-center" data-aos="fade-up">
                  <h1 class="hero-heading">Away from the Hustle and Bustle of City Life</h1>
                  <div class="sub-text">
                    <p>Let our dedicated staff provide you with the warm hospitality and exceptional care that makes
                      every guest feel at home.</p>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

      <div class="untree_co--site-section float-left pb-0 featured-rooms">

        <div class="container pt-0 pb-5">
          <div class="row justify-content-center text-center">
            <div class="col-lg-6 section-heading" data-aos="fade-up">
              <h3 class="text-center">Featured Rooms</h3>
            </div>
          </div>
        </div>
        <!-- booking start -->

        <div class="container pt-0 pb-5">
          <div class="row justify-content-center text-center">
            <!-- Trigger Button -->
            <!-- Trigger Button -->

            <!-- Modal Structure -->
            <div id="bookingModal" class="modal">
              <div class="modal-content">
                <span class="close-btn">&times;</span>
                <!-- <h2>Add Room</h2> -->
                <h2>Book a Room</h2>
                <form id="bookingForm" action="book.php" method="POST" class="booking-form">
                  <div class="form-group">
                    <input type="text" name="name" placeholder="Your Name" required>
                  </div>

                  <div class="form-group">
                    <input type="email" name="email" placeholder="Email Address">
                  </div>

                  <div class="form-group">
                    <input type="tel" name="phone" placeholder="Phone Number" required pattern="[0-9+ ]{6,15}">
                  </div>

                  <div class="form-group">
                    <label>Check-in:</label>
                    <input type="datetime-local" id="check_in" name="check_in" required>
                  </div>

                  <div class="form-group">
                    <label>Check-out:</label>
                    <input type="datetime-local" id="check_out" name="check_out" required>
                  </div>

                  <div class="form-group">
                    <label>Room Type:</label>
                    <select name="room_type_id" id="room_type_id" required>
                      <option value="">Select a Room</option>
                      <?php echo getAllRooms($conn); ?>
                    </select>
                    <p id="availability" style="margin-top: 5px; color: green;"></p>
                  </div>

                  <div class="form-group" id="room-count-group" style="display: none;">
                    <label>Number of Rooms:</label>
                    <input type="number" name="number_of_rooms" id="number_of_rooms" min="1" required>
                  </div>
                  <div id="formErrors"></div>
                  <button type="submit" class="btn btn-dark">Submit</button>
                </form>


              </div>
            </div>

          </div>
        </div>

        <!-- ajax fotrm -->

        <!-- booking end -->
        <div class="container-fluid pt-5">
          <div class="suite-wrap overlap-image-1">

            <div class="suite">
              <div class="image-stack">
                <div class="image-stack-item image-stack-item-top" data-jarallax-element="-50">
                  <div class="overlay"></div>
                  <img src="images/mk_hotel/VIP/vip4.JPG" alt="Image" class="img-fluid pic1">
                </div>
                <div class="image-stack-item image-stack-item-bottom">
                  <div class="overlay"></div>
                  <img src="images/mk_hotel/VIP/vip.JPG" alt="Image" class="img-fluid pic2">
                </div>
              </div>
            </div> <!-- .suite -->

            <div class="suite-contents" data-jarallax-element="50">
              <h2 class="suite-title">Executive Bedroom</h2>
              <div class="suite-excerpt">
                <p>Experience the height of luxury in our Executive Suite — a spacious, elegantly furnished room
                  designed for both relaxation and productivity. Enjoy premium amenities, a private lounge area, and
                  breathtaking views, all tailored to make your stay extraordinary.</p>
                <p><a href="rooms.html#exec" class="readmore">Room Details</a></p>
              </div>
            </div>
          </div>

          <div class="suite-wrap overlap-image-2">

            <div class="suite">
              <div class="image-stack">
                <div class="image-stack-item image-stack-item-top">
                  <div class="overlay"></div>
                  <img src="images/mk_hotel/twin_bed/twin.JPG" alt="Image" class="img-fluid pic1">
                </div>
                <div class="image-stack-item image-stack-item-bottom" data-jarallax-element="-50">
                  <div class="overlay"></div>
                  <img src="images/mk_hotel/twin_bed/twin2.JPG" alt="Image" class="img-fluid pic2">
                </div>
              </div>
            </div>

            <div class="suite-contents" data-jarallax-element="50">
              <h2 class="suite-title">Twin Bedroom</h2>
              <div class="suite-excerpt pr-5">
                <p>Perfect for friends or colleagues, our Twin Bedroom features two comfortable beds, modern finishes,
                  and thoughtful touches to ensure a relaxing and convenient stay. Ideal for shared travel without
                  sacrificing space or comfort.</p>
                <p><a href="rooms.html#twin" class="readmore">Room Details</a></p>
              </div>
            </div>

          </div>

        </div>
      </div>

      <div class="untree_co--site-section">
        <div class="container">
          <div class="container pt-0 pb-5">
            <div class="row justify-content-center text-center">
              <div class="col-lg-6 section-heading" data-aos="fade-up">
                <h3 class="text-center">Hotel Amenities</h3>
              </div>
            </div>
          </div>
          <div class="row custom-row-02192 align-items-stretch">
            <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up" data-aos-delay="100">
              <div class="media-29191 text-center h-100">
                <div class="media-29191-icon">
                  <img src="images/svg/swimming.png" alt="Image" class="img-fluid">
                </div>
                <h3>Swimming Pool</h3>
                <p>Take a refreshing dip in our crystal-clear swimming pool — the perfect spot to unwind, soak up the
                  sun, or enjoy a serene evening swim. Whether you’re here for leisure or business, our pool offers a
                  tranquil escape from the day.</p>
                <p>
                <p><a href="amenities.html" class="readmore reverse">Read More</a></p>
                </p>
              </div>
            </div>

            <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up" data-aos-delay="200">
              <div class="media-29191 text-center h-100">
                <div class="media-29191-icon">
                  <img src="images/svg/parking.svg" alt="Image" class="img-fluid">
                </div>
                <h3>Free Parking</h3>
                <p>Enjoy the convenience of secure, complimentary parking throughout your stay. Whether you're arriving
                  by car or rental, rest easy knowing your vehicle is safely accommodated just steps away from the hotel
                  entrance.</p>
                <p>
                <p><a href="amenities.html" class="readmore reverse">Read More</a></p>
                </p>
              </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up" data-aos-delay="100">
              <div class="media-29191 text-center h-100">
                <div class="media-29191-icon">
                  <img src="images/svg/wifi.svg" alt="Image" class="img-fluid">
                </div>
                <h3>Free WiFi</h3>
                <p>Stay connected with high-speed, complimentary WiFi available in all rooms and public areas. Whether
                  you're catching up on work or streaming your favorite shows, we’ve got you covered with seamless
                  internet access.</p>
                <p>
                <p><a href="amenities.html" class="readmore reverse">Read More</a></p>
                </p>
              </div>
            </div>

            <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up" data-aos-delay="200">
              <div class="media-29191 text-center h-100">
                <div class="media-29191-icon">
                  <img src="images/svg/elevator.svg" alt="Image" class="img-fluid">
                </div>
                <h3>Elevators</h3>
                <p>Access every floor with ease using our modern, spacious elevators. Designed for comfort and
                  accessibility, they ensure a smooth and convenient experience for all guests, including those with
                  mobility needs.</p>
                <p>
                <p><a href="amenities.html" class="readmore reverse">Read More</a></p>
                </p>
              </div>
            </div>

            <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up" data-aos-delay="100">
              <div class="media-29191 text-center h-100">
                <div class="media-29191-icon">
                  <img src="images/svg/partners.svg" alt="Image" class="img-fluid">
                </div>

                <h3>Conference rooms</h3>
                <p>Host your next meeting or event in our fully-equipped conference rooms. Featuring modern technology,
                  flexible layouts, and professional ambiance, they’re perfect for business gatherings, workshops, or
                  private functions.</p>
                <p>
                <p><a href="amenities.html" class="readmore reverse">Read More</a></p>
                </p>
              </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up" data-aos-delay="200">
              <div class="media-29191 text-center h-100">
                <div class="media-29191-icon">
                  <img src="images/svg/restaurant.png" alt="Image" class="img-fluid">
                </div>
                <h3> Restaurant &amp; Bar</h3>
                <p>Indulge in delicious local and international cuisine at our on-site bar and restaurant. From gourmet
                  meals to handcrafted cocktails, our culinary team delivers an exceptional dining experience morning to
                  night.</p>
                <p>
                <p><a href="amenities.html" class="readmore reverse">Read More</a></p>
                </p>
              </div>
            </div>

          </div>
        </div>
      </div>


      <div class="untree_co--site-section">
        <div class="container">
          <div class="row">
            <div class="col-md-4 section-heading" data-aos="fade-up">
              <h3 class="text-left">News &amp; Events</h3>
              <div class="w-75">
                <p>Stay updated with the latest news, special events, and highlights from MK Hotel. Discover what’s
                  happening around our hotel and the experiences we create for our guests.</p>
              </div>
              <p><a href="#" class="readmore">All Posts</a></p>
            </div>
            <div class="col-md-4">
              <div class="post-entry" data-aos="fade-up" data-aos-delay="100">
                <a href="#" class="thumb"><img src="images/mk_hotel/BAR/bar.JPG" alt="Image" class="img-fluid"></a>
                <div class="post-entry-contents">
                  <h3><a href="#">Unwind at the MK Hotel Bar</a></h3>
                  <div class="date">June 5, 2025 &bullet; by <a href="#">MK Hotel Staff</a></div>
                  <p>Whether you're wrapping up your day or starting the night, our stylish bar offers the perfect
                    atmosphere to relax with handcrafted cocktails and a curated wine list.</p>
                  <p><a href="#" class="readmore">Read more</a></p>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="post-entry" data-aos="fade-up" data-aos-delay="200">
                <a href="#" class="thumb"><img src="images/mk_hotel/BAR/bar2.JPG" alt="Image" class="img-fluid"></a>
                <div class="post-entry-contents">
                  <h3><a href="#">Live Music Nights Are Back</a></h3>
                  <div class="date">May 28, 2025 &bullet; by <a href="#">MK Hotel Events</a></div>
                  <p>Join us every Friday for live music at MK Hotel. Enjoy great food, drinks, and entertainment in a
                    vibrant setting that's perfect for friends, families, and travelers alike.</p>
                  <p><a href="#" class="readmore">Read more</a></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="untree_co--site-section py-5 bg-body-darker cta">
        <div class="container">
          <div class="row">
            <div class="col-12 text-center">
              <h3 class="m-0 p-0">If you have any special requests, please feel free to call us. <a
                  href="tel://++25575780001">+255 757 800 001</a></h3>
            </div>
          </div>
        </div>
      </div>


    </div>
    <footer class="untree_co--site-footer">

      <div class="container">
        <div class="row">
          <div class="col-md-4 pr-md-5">
            <h3>About Us</h3>
            <p> This establishment provides paid lodging on a short-term basis. Facilities provided may range from a
              modest-quality.</p>
            <p><a href="#" class="readmore"><img src="images/mk_hotel/logo/mk_text.png" class="img-fluid" height="500"
                  alt="MK Logo"></a></p>

          </div>
          <div class="col-md-8 ml-auto">
            <div class="row">
              <div class="col-md-3">
                <h3>Navigation</h3>
                <ul class="list-unstyled">
                  <li><a href="#">Home</a></li>
                  <li><a href="rooms.html">Rooms</a></li>
                  <li><a href="amenities.html">Amenities</a></li>
                  <li><a href="gallery.html">Gallery</a></li>
                  <li><a href="about.html">About Us</a></li>
                  <li><a href="contact.html">Contact</a></li>
                </ul>
              </div>
              <div class="col-md-9 ml-auto">
                <div class="row mb-3">
                  <div class="col-md-6">
                    <h3>Address</h3>

                    <address>1007 Mwisenge, Musoma Urban, <br>Mara Tanzania</address>
                  </div>
                  <div class="col-md-6">
                    <h3>Telephone</h3>
                    <p>
                      <a href="#">+255 767 492 809</a> <br>
                      <a href="#">+255 713 300 306</a> <br>
                      <a href="#">+255 757 800 001</a> <br>
                      <a href="#">+255 715 014 785</a>

                    </p>
                  </div>
                </div>

                <h3 class="mb-0">Join our newsletter</h3>
                <p>Be the first to know our latest updates and news!</p>
                <form action="#" method="" class="form-subscribe">
                  <div class="form-group d-flex">
                    <input type="email" class="form-control mr-2" placeholder="Enter your email">
                    <input type="submit" value="Subscribe" class="btn btn-black px-4 text-white">
                  </div>
                </form>
              </div>

            </div>
          </div>
        </div>
        <div class="row mt-5 pt-5 align-items-center">
          <div class="col-md-6 text-md-left">
            <!-- Link back to Untree.co can't be removed. Template is licensed under CC BY 3.0. If you purchased a license you can remove this. -->
            <p>
              Copyright &copy;
              <script>document.write(new Date().getFullYear());</script> <a href="index.php">MK Hotel</a>. All Rights
              Reserved. Design by <a href="#" target="_blank" class="text-primary">Pamoja INC</a>
            </p>
            <!-- Link back to Untree.co can't be removed. Template is licensed under CC BY 3.0. If you purchased a license you can remove this. -->
          </div>
          <div class="col-md-6 text-md-right">
            <ul class="icons-top icons-dark">
              <li>
                <a href="#"><span class="icon-facebook"></span></a>
              </li>
              <li>
                <a href=""><span class="icon-twitter"></span></a>
              </li>
              <li>
                <a href="https://www.instagram.com/mkhotel_ltd?igsh=bXc3NGZyaDRqMHN0"><span
                    class="icon-instagram"></span></a>
              </li>
              <li>
                <a href=""><span class="icon-tripadvisor"></span></a>
              </li>
            </ul>

          </div>
        </div>
      </div>

    </footer>
  </div>

  <!-- Search -->
  <script src="js/vendor/jquery-3.3.1.min.js"></script>
  <script src="js/vendor/popper.min.js"></script>
  <script src="js/vendor/bootstrap.min.js"></script>

  <script src="js/vendor/owl.carousel.min.js"></script>

  <script src="js/vendor/jarallax.min.js"></script>
  <script src="js/vendor/jarallax-element.min.js"></script>
  <script sr c="js/vendor/ofi.min.js"></script>

  <script src="js/vendor/aos.js"></script>

  <script src="js/vendor/jquery.lettering.js"></script>
  <script src="js/vendor/jquery.sticky.js"></script>

  <script src="js/vendor/TweenMax.min.js"></script>
  <script src="js/vendor/ScrollMagic.min.js"></script>
  <script src="js/vendor/scrollmagic.animation.gsap.min.js"></script>
  <script src="js/vendor/debug.addIndicators.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


  <script src="js/main.js"></script>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const modal = document.getElementById("bookingModal");
      const openBtn = document.getElementById("openModalBtn");
      const openBtn2 = document.getElementById("openModalBtn2");
      const closeBtn = document.querySelector(".close-btn");
      const openModal = () => modal.style.display = "block";
      if (openBtn) openBtn.onclick = openModal;
      if (openBtn2) openBtn2.onclick = openModal;
      if (closeBtn) closeBtn.onclick = () => modal.style.display = "none";
      window.onclick = (event) => { if (event.target === modal) modal.style.display = "none"; };

      const today = new Date().toISOString().split('T')[0];
      const checkInInput = document.getElementById('check_in');
      const checkOutInput = document.getElementById('check_out');
      const roomSelect = document.getElementById('room_type_id');
      const availabilityText = document.getElementById('availability');
      const roomCountInput = document.getElementById('number_of_rooms');
      const roomCountGroup = document.getElementById('room-count-group');
      const errorContainer = document.getElementById('formErrors');

      if (checkInInput) checkInInput.min = today;
      if (checkOutInput) checkOutInput.min = today;

      let maxAvailableRooms = 0;

      // ✅ Define fetchAvailability first to avoid hoisting errors
      const fetchAvailability = () => {
        const roomTypeId = roomSelect?.value;
        const checkIn = checkInInput?.value;
        const checkOut = checkOutInput?.value;

        if (!roomTypeId || !checkIn || !checkOut) {
          availabilityText.innerHTML = `<span class="error-text">Please select room type and dates.</span>`;
          roomCountGroup.style.display = 'none';
          return;
        }

        availabilityText.innerHTML = 'Checking availability... <span class="loader"></span>';

        fetch(`get_room_availability.php?room_type_id=${roomTypeId}&check_in=${checkIn}&check_out=${checkOut}`)
          .then(response => response.json())
          .then(data => {
            if (data.available_rooms > 0) {
              maxAvailableRooms = data.available_rooms;
              availabilityText.innerHTML = `Available: <strong>${data.available_rooms}</strong> out of <strong> ${data.total_rooms} </strong> room(s)`;
              roomCountInput.max = data.available_rooms;
              roomCountInput.value = 1;
              roomCountGroup.style.display = 'block';
            } else {
              availabilityText.innerHTML = `<span class="error-text">No rooms available for selected dates.</span>`;
              roomCountGroup.style.display = 'none';
            }
          })
          .catch(error => {
            console.error('Availability fetch failed:', error);
            availabilityText.innerHTML = `<span class="error-text">Error checking availability.</span>`;
            roomCountGroup.style.display = 'none';
          });
      };

      // 🔁 Auto-update checkout date if it's earlier than checkin
      checkInInput?.addEventListener('change', () => {
        const checkInDate = new Date(checkInInput.value);
        const checkOutDate = new Date(checkOutInput.value);

        if (!checkOutInput.value || checkOutDate <= checkInDate) {
          checkOutInput.value = checkInInput.value;
          checkOutInput.min = checkInInput.value;
        }

        fetchAvailability(); // refetch when check-in changes
      });

      checkOutInput?.addEventListener('change', fetchAvailability);
      if (roomSelect) roomSelect.addEventListener('change', fetchAvailability);

      // 🛑 Real-time validation on room count input
      roomCountInput?.addEventListener('input', () => {
        if (parseInt(roomCountInput.value) > maxAvailableRooms) {
          roomCountInput.classList.add('input-error');
          availabilityText.innerHTML = `<span class="error-text">You can't book more than ${maxAvailableRooms} room(s).</span>`;
        } else {
          roomCountInput.classList.remove('input-error');
          availabilityText.innerHTML = `Available: <strong>${maxAvailableRooms}</strong> room(s)`;
        }
      });

      // 🚀 Booking form submission
      const bookingForm = document.getElementById('bookingForm');
      if (bookingForm) {
        bookingForm.addEventListener('submit', function (e) {
          e.preventDefault();
          errorContainer.innerHTML = '';
          let errors = [];
          let isValid = true;

          const fields = [
            { id: 'name', label: 'Name' },
            { id: 'email', label: 'Email' },
            { id: 'phone', label: 'Phone' },
            { id: 'check_in', label: 'Check-in date' },
            { id: 'check_out', label: 'Check-out date' },
            { id: 'room_type_id', label: 'Room type' },
          ];

          fields.forEach(field => {
            const input = document.getElementById(field.id);
            if (input && !input.value.trim()) {
              input.classList.add('input-error');
              errors.push(`${field.label} is required.`);
              isValid = false;
            } else {
              input?.classList.remove('input-error');
            }
          });

          const checkInDate = new Date(checkInInput.value);
          const now = new Date();
          now.setHours(0, 0, 0, 0);
          if (checkInDate < now) {
            checkInInput.classList.add('input-error');
            errors.push("Check-in date cannot be in the past.");
            isValid = false;
          }

          if (parseInt(roomCountInput.value) > maxAvailableRooms) {
            roomCountInput.classList.add('input-error');
            errors.push(`You can't book more than ${maxAvailableRooms} room(s).`);
            isValid = false;
          } else {
            roomCountInput.classList.remove('input-error');
          }

          if (!isValid) {
            errorContainer.innerHTML = errors.map(err => `<div class="error-text">${err}</div>`).join('');
            return;
          }

          const formData = new FormData(bookingForm);
          fetch('book.php', {
            method: 'POST',
            body: formData
          })
            .then(response => {
              if (!response.ok) throw new Error('Network response was not ok');
              return response.text();
            })
          .then(data => {
            console.log('Server response:', data); // Add this line
            if (data.trim() === 'success') {
              alert('Booking successful!');
              bookingForm.reset();
              modal.style.display = 'none';
            } else {
              errorContainer.innerHTML = `<div class="error-text">${data}</div>`;
            }
          })
          .catch(error => {
            console.error('Error:', error);
            errorContainer.innerHTML = `<div class="error-text">Failed to submit booking.</div>`;
          });

        });
      }
    });
  </script>


</body>

</html>