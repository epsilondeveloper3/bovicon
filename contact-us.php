<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <meta name="description" content="Bovica - Contact Us">
  <link href="assets/images/favicon/favicon.png" rel="icon">
  <title>Bovica - Contact Us</title>
  <?php include 'includes/style.php'; ?>
</head>

<body>
  <div class="wrapper">
    <div class="preloader">
      <div class="loading"><span></span><span></span><span></span><span></span></div>
    </div><!-- /.preloader -->

    <?php include 'includes/header.php'; ?>


    <!-- ========================= 
            Google Map
    =========================  -->
    <section class="map py-0">
      <iframe height="620"
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11971.627628962768!2d2.1354741829540913!3d41.39782801658141!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a49876ab903fb7%3A0x2600fae14082f492!2sSant%20Gervasi%20-%20Galvany%2C%20Barcelona%2C%20Spain!5e0!3m2!1sen!2sus!4v1667567027882!5m2!1sen!2sus"></iframe>
      <div class="map-container">
        <div class="contact-panel p-0">
          <div class="panel-header">
            <h3 class="panel-title color-white mb-0">Offices and Main Labs</h3>
          </div>
          <div class="accordion" id="accordion">
            <div class="accordion-item opened">
              <div class="accordion-header" data-bs-toggle="collapse" data-bs-target="#contact-collapse1">
                <a class="accordion-title" href="#">London Office</a>
              </div><!-- /.accordion-item-header -->
              <div id="contact-collapse1" class="collapse show" data-bs-parent="#accordion">
                <div class="accordion-body">
                  <ul class="contact-list list-unstyled mb-0">
                    <li>Phone: 010612457410</li>
                    <li>Email: <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="0b48636e66676a69784b3c647964646d25686466">[email&#160;protected]</a></li>
                    <li>Address: 2307 Beverley Rd Brooklyn, NY</li>
                    <li>Hours: Mon-Fri: 8am – 7pm</li>
                  </ul>
                </div><!-- /.accordion-item-body -->
              </div>
            </div><!-- /.accordion-item -->
            <div class="accordion-item">
              <div class="accordion-header" data-bs-toggle="collapse" data-bs-target="#contact-collapse2">
                <a class="accordion-title" href="#">Berlin Office</a>
              </div><!-- /.accordion-item-header -->
              <div id="contact-collapse2" class="collapse" data-bs-parent="#accordion">
                <div class="accordion-body">
                  <ul class="contact-list list-unstyled mb-0">
                    <li>Phone: 01001314999</li>
                    <li>Email: <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="2b68434e46474a49586b1c445944444d05484446">[email&#160;protected]</a></li>
                    <li>Address: 2307 Beverley Rd Brooklyn, NY</li>
                    <li>Hours: Mon-Fri: 8am – 7pm</li>
                  </ul>
                </div><!-- /.accordion-item-body -->
              </div>
            </div><!-- /.accordion-item -->
            <div class="accordion-item">
              <div class="accordion-header" data-bs-toggle="collapse" data-bs-target="#contact-collapse3">
                <a class="accordion-title" href="#">Manchester Office</a>
              </div><!-- /.accordion-item-header -->
              <div id="contact-collapse3" class="collapse" data-bs-parent="#accordion">
                <div class="accordion-body">
                  <ul class="contact-list list-unstyled mb-0">
                    <li>Phone: 010612457410</li>
                    <li>Email: <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="befdd6dbd3d2dfdccdfe89d1ccd1d1d890ddd1d3">[email&#160;protected]</a></li>
                    <li>Address: 2307 Beverley Rd Brooklyn, NY</li>
                    <li>Hours: Mon-Fri: 8am – 7pm</li>
                  </ul>
                </div><!-- /.accordion-item-body -->
              </div>
            </div><!-- /.accordion-item -->
          </div><!-- /.accordion -->
        </div>
      </div><!-- /.map-container -->
      <div class="curve-top-shape d-none d-xl-block">
        <svg class="curve-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none">
          <path class="curve-path" d="M1000,4.3V0H0v4.3C0.9,23.1,126.7,99.2,500,100S1000,22.7,1000,4.3z"></path>
        </svg>
      </div><!-- /.curve -->
    </section><!-- /.GoogleMap -->

    <!-- ==========================
        contact layout 1
    =========================== -->
    <section class="contact-layout1">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-7">
            <div class="heading-layout2 mb-50">
              <h2 class="heading-subtitle">Contact Us And We Will Respond Within The Next Two Working Days</h2>
              <h3 class="heading-title">Get In Touch With Your Nearest Local Health Business Sales</h3>
            </div>
          </div><!-- /.col-lg-7 -->
        </div><!-- /.row -->
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-4">
            <div class="text-block">
              <p class="text-block-desc">Our customer care staff will distribute your request for consultation to the
                appropriate Laboratory Medicine discipline.</p>
              <p class="text-block-desc">A member of the Medical/Scientific Staff will get back to the requesting
                healthcare provider within one business day.
              </p>
            </div>
            <a href="#" class="btn btn-secondary">
              <i class="icon-arrow-right"></i> <span>Find A Lab</span>
            </a>
          </div><!-- /.col-lg-4 -->
          <div class="col-sm-12 col-md-12 col-lg-8">
            <form class="contact-panel-form" method="post" action="assets/php/contact.php" id="contactForm">
              <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-4">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Name" id="contact-name" name="contact-name"
                      required>
                  </div>
                </div><!-- /.col-lg-4 -->
                <div class="col-sm-12 col-md-4 col-lg-4">
                  <div class="form-group">
                    <input type="email" class="form-control" placeholder="Email" id="contact-email" name="contact-email"
                      required>
                  </div>
                </div><!-- /.col-lg-4 -->
                <div class="col-sm-12 col-md-4 col-lg-4">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Phone" id="contact-Phone" name="contact-phone"
                      required>
                  </div>
                </div><!-- /.col-lg-4 -->
                <div class="col-12">
                  <div class="form-group">
                    <textarea class="form-control" placeholder="Additional Details" id="contact-message"
                      name="contact-message"></textarea>
                  </div>
                  <button type="submit" class="btn btn-primary btn-block btn-xhight mt-10">
                    <span>Submit Request</span> <i class="icon-arrow-right"></i>
                  </button>
                  <div class="contact-result"></div>
                </div><!-- /.col-lg-12 -->
              </div><!-- /.row -->
            </form>
          </div><!-- /.col-lg-8 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.contact layout 1 -->



    <?php include 'includes/footer.php'; ?>

    <svg class="svg-pathes" width="0" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1">
      <defs>
        <filter id="rounded-clippath-filter">
          <feGaussianBlur in="SourceGraphic" stdDeviation="8" result="blur"></feGaussianBlur>
          <feColorMatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9"
            result="rounded-clippath-filter">
          </feColorMatrix>
          <feComposite in="SourceGraphic" in2="rounded-clippath-filter" operator="atop"></feComposite>
        </filter>
      </defs>
      <defs>
        <filter id="rounded-clippath-filter-small">
          <feGaussianBlur in="SourceGraphic" stdDeviation="2" result="blur"></feGaussianBlur>
          <feColorMatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 10 -4"
            result="rounded-clippath-filter-small"></feColorMatrix>
          <feComposite in="SourceGraphic" in2="rounded-clippath-filter-small" operator="atop"></feComposite>
        </filter>
      </defs>
      <clipPath id="curve-left" clipPathUnits="objectBoundingBox">
        <path
          d="M0,0.998 v0.002 H1 V0 h-0.059 C0.832,0.008,0.596,0.068,0.48,0.414 A1,1,0,0,0,0.445,0.551 C0.376,0.899,0.166,0.986,0,0.998">
        </path>
      </clipPath>
      <clipPath id="curve-right" clipPathUnits="objectBoundingBox">
        <path
          d="M1,0.998 v0.002 H0 V0 H0.059 C0.168,0.008,0.404,0.068,0.519,0.414 A1,1,0,0,1,0.555,0.551 C0.624,0.899,0.834,0.986,1,0.998">
        </path>
      </clipPath>
      <clipPath id="curve-shape" clipPathUnits="objectBoundingBox">
        <path d="M1600,3277.99c-152.02-27.95-453.41-46.99-800.382-46.99-346.4,0-647.36,19.12-799.618,47Z"
          transform="translate(0 -3231)">
        </path>
      </clipPath>
    </svg>


  </div><!-- /.wrapper -->

  <?php include 'includes/script.php'; ?>
</body>

</html>
