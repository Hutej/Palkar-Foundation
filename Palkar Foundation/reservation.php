<?PHP  date_default_timezone_set("Asia/Kolkata"); ?>
  <!DOCTYPE HTML>
  <html>
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Palkar Foundation</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <meta name="author" content="" />
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=|Roboto+Sans:400,700|Playfair+Display:400,700">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/animate.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/aos.css">

 
  <link rel="stylesheet" href="css/fancybox.min.css">

  <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

  <!-- Theme Style -->
  <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
  <div class="head-container">
    <div class="nav" id="nav">
      <input type="checkbox" name="click" id="click" />
      <label for="click" class="bars">
        <i class="fa fa-bars"></i>
      </label>
      <div class="menu">
        <img src="images/logorm.png" alt="" />
        <a href="index.html" class="menu-items">Home</a>
        <a href="reservation.php" class="menu-items">Booking Room</a>
        <a href="events.html" class="menu-items">Services</a>
        <a href="admin.php" class="menu-items">Login</a>
        <a href="#" class="menu-items">Contact Us</a>
      </div>
    </div>
  </div>
  <section class="site-hero overlay" style="background-image: url(images/hero_4.png)" data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row site-hero-inner justify-content-center align-items-center">
        <div class="col-md-10 text-center" data-aos="fade">
          <h1 class="heading mb-3">Reservation Form</h1>
          <ul class="custom-breadcrumbs mb-4">
            <li><a href="index.html">Home</a></li>
            <li>&bullet;</li>
            <li>Reservation</li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <!-- END section -->

  <section class="section contact-section" id="next">
    <div class="container">
      <div class="row">
        <div class="col-md-7" data-aos="fade-up" data-aos-delay="100">
          <form action="aft_res_pay.php" method="post" class="bg-white p-md-5 p-4 mb-5 border" id="reservation-form">
            <div class="row">
              <div class="col-md-6 form-group">
                <label class="text-black font-weight-bold" for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control">
              </div>
              <div class="col-md-6 form-group">
                <label class="text-black font-weight-bold" for="phone">Phone</label>
                <input type="text" id="phone" name="phone" class="form-control">
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 form-group">
                <label class="text-black font-weight-bold" for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control">
              </div>
            </div>
            <div class="row">
            
             <div class="col-md-6 ps-0 mb-3">
              <label class="form-label ">Check-In Date</label>
              <input name="checkin_date"  id="checkin_date" type="date" class="form-control shadow-none" required>
          </div>
          <div class="col-md-6 ps-0 mb-3">
            <label class="form-label ">Check-Out Date</label>
            <input  name="checkout_date" id="checkout_date" type="date" class="form-control shadow-none" required>
        </div>
            </div>
            <div class="row">
              <div class="col-md-6 form-group">
                <label for="adults" class="font-weight-bold text-black">Adults</label>
                <div class="field-icon-wrap">
                  <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                  <select name="adults" id="adults" class="form-control">
                    <option value="1">1</option>
                    <option value="2">2</option>
                  
                  </select>
                </div>
              </div>
              <div class="col-md-6 form-group">
                <label for="rooms" class="font-weight-bold text-black">Rooms</label>
                <div class="field-icon-wrap">
                  <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                  <select name="rooms" id="rooms" class="form-control">
                    <option value="ORD">ORD Room - $500</option>
                    <option value="AC">AC Room - $700</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row mb-4">
              <div class="col-md-12 form-group">
                <label class="text-black font-weight-bold" for="message">Notes</label>
                <textarea name="message" id="message" class="form-control" cols="30" rows="8"></textarea>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 form-group">
                  <label for="totalAmount" class="font-weight-bold text-black" style="display: none;">Total Amount:</label>
                  <input type="text" id="totalAmount" name="totalAmount" class="form-control" style="display: none;">
              </div>
            
              <div class="col-md-6 form-group">
              <h6 class="mb-3 text-danger" id="pay_info">Provide check-in & check-out date !</h6>
                  <input type="submit" id="reserve-button" value="Reserve Now" class="btn btn-primary text-white py-3 px-5 font-weight-bold">
              </div>
          </div>
          </form>
        </div>
        <div class="col-md-5" data-aos="fade-up" data-aos-delay="200">
          <div class="row">
            <div class="col-md-10 ml-auto contact-info">
              <p><span class="d-block">Address:</span> <span class="text-black"> S.No 24, H. No. 1/1, 23/1 25/1,24/2 <br />Panchayat Samiti,
                Sangameshwar (Devrukh) <br />
                Ratnagiri- Vighravali 415804 MH- India</span></p>
              <p><span class="d-block">Phone:</span> <span class="text-black">(+91) 8433920217</span></p>
              <p><span class="d-block">Email:</span> <span class="text-black"> info@palkarfoundationcom</span></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <footer class="footer-section" style="padding-top: 20px;">
    <div class="container">
      <div class="row mb-4">
        <div class="col-md-3 mb-5">
          <ul class="list-unstyled link">
            <li><a href="about.html">About Us</a></li>
            <li><a href="#">Terms &amp; Conditions</a></li>
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="rooms.html">Rooms</a></li>
          </ul>
        </div>
        <div class="col-md-3 mb-5 pr-md-5 contact-info">
          <p><span class="d-block"><span class="ion-ios-location h5 mr-3 text-primary"></span>Address:</span> <span>S.No 24, H. No. 1/1, 23/1 25/1,24/2 <br />Panchayat Samiti, Sangameshwar (Devrukh) <br /> Ratnagiri- Vighravali 415804 MH- India</span></p>
        </div>
        <div class="col-md-3 mb-5 pr-md-5 contact-info">
          <p><span class="d-block"><span class="ion-ios-telephone h5 mr-3 text-primary"></span>Phone:</span> <span>(+91) 8433920217</span></p>
          <p><span class="d-block"><span class="ion-ios-email h5 mr-3 text-primary"></span>Email:</span> <span> info@palkarfoundationcom</span></p>
        </div>
      </div>
    </div>
  </footer>
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/aos.js"></script>
  
  <script src="js/main.js"></script>
  
  <script>
  // Function to calculate the total price and update pay_info
  function calculatePrice() {
    // Get selected room and number of adults
    var roomType = document.getElementById('rooms').value;
    var adults = parseInt(document.getElementById('adults').value);
    
    // Get check-in and check-out dates
    var checkinDate = new Date(document.getElementById('checkin_date').value);
    var checkoutDate = new Date(document.getElementById('checkout_date').value);
    
    var oneDay = 24 * 60 * 60 * 1000; // hours*minutes*seconds*milliseconds
var nights = Math.round(Math.abs((checkoutDate - checkinDate) / oneDay));

var totalPrice = 0;

if (roomType === 'ORD') {
    if (nights === 1) {
        totalPrice = 1000 * adults;
    } else if (nights === 7) {
        totalPrice = 5000 * adults;
    } else if (nights === 15) {
        totalPrice = 10000 * adults;
    } else if (nights >= 30 && adults === 1) {
        totalPrice = 10000 * adults;
    } else if (nights >= 30 && adults === 2) {
        totalPrice = 18000;
    } else if (nights < 30) {
        totalPrice = 1000 * nights * adults;
    } else {
        // Calculate total price for stays exceeding 30 nights
        var additionalNights = nights - 30;
        totalPrice = 30000 * adults + additionalNights * 1000;
    }
} else if (roomType === 'AC') {
    if (nights === 1) {
        totalPrice = 1000 * adults;
    } else if (nights === 7) {
        totalPrice = 7000 * adults;
    } else if (nights === 15) {
        totalPrice = 12000 * adults;
    } else if (nights >= 30 && adults === 1) {
        totalPrice = 14000 * adults;
    } else if (nights >= 30 && adults === 2) {
        totalPrice = 11500 * adults;
    } else if (nights < 30) {
        totalPrice = 1000 * nights * adults;
    } else {
        // Calculate total price for stays exceeding 30 nights
        var additionalNights = nights + 30;
        totalPrice = 30000 * adults + additionalNights * 1000;
    }
}
    // Update the total amount field
    document.getElementById('totalAmount').value = totalPrice;
    
    // Update the pay_info element with the total price
    document.getElementById('pay_info').textContent = 'Total Price: ₹' + totalPrice.toFixed(2);
  }
  
  // Attach event listeners to update the total price when inputs change
  document.getElementById('adults').addEventListener('change', calculatePrice);
  document.getElementById('rooms').addEventListener('change', calculatePrice);
  document.getElementById('checkin_date').addEventListener('change', calculatePrice);
  document.getElementById('checkout_date').addEventListener('change', calculatePrice);
  
  // Calculate the initial price when the page loads
  calculatePrice();




  function setupDatepicker() {
    var today = new Date();
    var maxDate = new Date();
    maxDate.setDate(today.getDate() + 32); // Limit to 32 days from today  1 2 din aage piche sakta uske liye

    document.getElementById('checkin_date').setAttribute('min', today.toISOString().split('T')[0]);
    document.getElementById('checkin_date').setAttribute('max', maxDate.toISOString().split('T')[0]);

    document.getElementById('checkout_date').setAttribute('min', today.toISOString().split('T')[0]);
    document.getElementById('checkout_date').setAttribute('max', maxDate.toISOString().split('T')[0]);
  }

  // Call setupDatepicker function to set up date pickers
  setupDatepicker();
</script>



  </body>
  </html>

