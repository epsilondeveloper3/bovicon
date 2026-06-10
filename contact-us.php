<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <meta name="description" content="Bovica - Contact Us">
  <link href="assets/images/favicon/favicon.png" rel="icon">
  <title>BOVICAN</title>
  <?php include 'includes/style.php'; ?>
</head>

<body>
  <div class="wrapper">
    <div class="preloader">
      <div class="loading"><span></span><span></span><span></span><span></span></div>
    </div><!-- /.preloader -->

    <?php include 'includes/header.php'; ?>


    <!-- ========================
       Page Title 
    =========================== -->
    <section class="page-title-layout2 page-title-light pb-30 bg-overlay bg-parallax">
      <div class="bg-img"><img src="assets/images/page-titles/9.jpg" alt="background"></div>
      <div class="container">
        <div class="row">
          <div class="col-12 col-xl-9">
            <span class="pagetitle-subheading">Contact BOVICAN diagnostics</span>
            <h1 class="pagetitle-heading">Get in Touch with Us</h1>
            <p class="pagetitle-desc">Have questions or want to request a demo or book a diagnostic test? Complete the form below and we will get back to you within one business day.</p>
          </div><!-- /.col-xl-6 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
      <div class="breadcrumb-area">
        <div class="container">
          <nav>
            <ol class="breadcrumb justify-content-center mt-80 mb-0">
              <li class="breadcrumb-item">
                <a href="index.php">Home</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
            </ol>
          </nav>
        </div><!-- /.container -->
      </div><!-- /.breadcrumb-area -->
    </section><!-- /.page-title -->

    <!-- ==========================
        Contact Layout 1
    =========================== -->
    <section class="contact-layout1">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12">
            <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
              <div class="alert alert-success alert-dismissible fade show mb-40" role="alert" style="border-radius: 8px; font-family: 'Lexend', sans-serif;">
                <strong>Thank you!</strong> Your request has been successfully submitted and saved. We will contact you shortly.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <?php elseif (isset($_GET['error'])): ?>
              <div class="alert alert-danger alert-dismissible fade show mb-40" role="alert" style="border-radius: 8px; font-family: 'Lexend', sans-serif;">
                <strong>Error!</strong> Something went wrong. Please check your fields and try again.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <?php endif; ?>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-7">
            <div class="heading-layout2 mb-50">
              <h2 class="heading-subtitle">Contact Us And We Will Respond Within One Working Day</h2>
              <h3 class="heading-title">Get In Touch With BOVICAN Diagnostics Sales & Support Team</h3>
            </div>
          </div><!-- /.col-lg-7 -->
        </div><!-- /.row -->
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-4">
            <div class="text-block">
              <p class="text-block-desc">Our customer care staff will distribute your request for consultation to the
                appropriate Veterinary Diagnostics discipline.</p>
              <p class="text-block-desc">A member of the Medical/Scientific Staff will get back to the requesting
                healthcare provider within one business day.
              </p>
            </div>
            <a href="tests.php" class="btn btn-secondary mb-30">
              <i class="icon-arrow-right"></i> <span>Explore Tests Menu</span>
            </a>
          </div><!-- /.col-lg-4 -->
          <div class="col-sm-12 col-md-12 col-lg-8">
            <form class="contact-panel-form" method="post" action="submit_inquiry.php" id="contactForm">
              <div class="row">
                

                <div class="col-sm-12 col-md-4 col-lg-4">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Name" id="contact-name" name="contact-name"
                      required style="height: 50px; font-size: 14px;">
                  </div>
                </div><!-- /.col-lg-4 -->
                <div class="col-sm-12 col-md-4 col-lg-4">
                  <div class="form-group">
                    <input type="email" class="form-control" placeholder="Email" id="contact-email" name="contact-email"
                      required style="height: 50px; font-size: 14px;">
                  </div>
                </div><!-- /.col-lg-4 -->
                <div class="col-sm-12 col-md-4 col-lg-4">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Phone" id="contact-Phone" name="contact-phone"
                      required style="height: 50px; font-size: 14px;">
                  </div>
                </div><!-- /.col-lg-4 -->
                <div class="col-12">
                  <div class="form-group">
                    <textarea class="form-control" placeholder="Additional Details" id="contact-message"
                      name="contact-message" rows="5" style="font-size: 14px; padding: 15px;"></textarea>
                  </div>
                  <button type="submit" class="btn btn-primary btn-block btn-xhight mt-10">
                    <span>Submit Request</span> <i class="icon-arrow-right"></i>
                  </button>
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
