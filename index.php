<?php include_once 'admin/include/config.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <meta name="description" content="Chemlabs - Laboratory & Science Research HTML5 Template">
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

    <!-- ============================
        Slider
    ============================== -->
    <section class="slider">
      <div class="slick-carousel carousel-dots-light m-slides-0"
        data-slick='{"slidesToShow": 1,"autoplay": true, "arrows": false, "dots": false, "speed": 700,"fade": true,"cssEase": "linear"}'>
        <div class="slide-item bg-overlay align-v-h">
          <div class="bg-img"><img src="assets/images/sliders/3.jpg" alt="slide img"></div>
          <div class="container">
            <div class="row align-items-center">
              <div class="col-12 col-xl-10">
                <div class="slide-content">
                  <h2 class="slide-title">Advanced Veterinary Diagnostics for Healthier Animals</h2>
                  <p class="slide-desc" style="font-size: 18px; line-height: 1.5; font-weight: 400; color: #fff; margin-bottom: 20px;">
                    Providing accurate, reliable, and timely veterinary diagnostic solutions for livestock, dairy farms, pet clinics, veterinarians, and animal healthcare professionals across India.
                  </p>
                  <p class="slide-desc d-none d-md-block" style="font-size: 15px; opacity: 0.9; margin-bottom: 30px; max-width: 850px;">
                    At BOVICAN Veterinary Research & Diagnostics LLP, we combine scientific expertise, advanced laboratory technology, and veterinary excellence to deliver precise diagnostic results that support better animal health and disease management.
                  </p>
                  <div class="d-flex flex-wrap align-items-center">
                    <a href="tests.php" class="btn btn-white btn-xl mr-30 mb-2">
                      <i class="icon-arrow-right"></i>
                      <span>Book a Test</span>
                    </a>
                    <a href="contact-us.php" class="btn btn-white btn-outlined mb-2">
                      <span>Contact Us</span>
                    </a>
                  </div>
                </div><!-- /.slide-content -->
              </div><!-- /.col-xl-10 -->
            </div><!-- /.row -->
          </div><!-- /.container -->
        </div><!-- /.slide-item -->
      </div><!-- /.carousel -->
    </section><!-- /.slider -->

    <!-- ========================
      About Us Section
    =========================== -->
    <section id="about" class="about-section pt-100 pb-100">
      <div class="container">
        <!-- Part 1: Who We Are & Image -->
        <div class="row align-items-center mb-60">
          <div class="col-sm-12 col-md-12 col-lg-6 mb-30">
            <div class="position-relative">
              <div class="about-img" style="border-radius: 20px; overflow: hidden; box-shadow: 0 15px 45px rgba(10, 79, 138, 0.1);">
                <img src="assets/images/about/dog_goggles.png" alt="BOVICAN Veterinary Diagnostics" class="img-fluid" style="width: 100%; border-radius: 20px; transition: transform 0.5s ease;">
              </div>
            </div>
          </div><!-- /.col-lg-6 -->
          <div class="col-sm-12 col-md-12 col-lg-6 mb-30">
            <div class="about-text pl-40">
              <div class="heading-layout2 mb-25">
                <h2 class="heading-subtitle">Who We Are</h2>
                <h3 class="heading-title">Specialized Veterinary Diagnostic & Research Organization</h3>
              </div>
              <div class="about-desc" style="font-family: 'Roboto', sans-serif; font-size: 16px; line-height: 1.7; color: #555;">
                <p class="mb-20">
                  BOVICAN Veterinary Research & Diagnostics LLP is established with a vision to provide veterinarians, dairy farmers, livestock owners, and animal healthcare professionals with dependable diagnostic solutions that support informed clinical decisions and effective disease management.
                </p>
                <p class="mb-20">
                  With a strong focus on quality, innovation, and customer satisfaction, BOVICAN delivers comprehensive veterinary testing services covering pathology, microbiology, molecular diagnostics, serology, and specialized research-based investigations.
                </p>
              </div>
            </div><!-- /.about-text -->
          </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->

        <!-- Part 2: Core Values -->
        <div class="row">
          <div class="col-12 text-center mb-50">
            <div class="heading-layout2">
              <h2 class="heading-subtitle">Core Values</h2>
              <h3 class="heading-title">What Drives Us</h3>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-lg-2-5 col-md-4 col-sm-6 mb-30">
            <div class="bovicon-value-card">
              <div class="bovicon-value-icon mb-15" style="background-color: var(--color-primary) !important; color: #fff; width: 60px; height: 60px; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; font-size: 24px;"><i class="fas fa-award"></i></div>
              <h4 style="font-size: 18px; font-weight: 700; font-family:'Lexend',sans-serif;">Quality</h4>
              <p class="mb-0 text-muted" style="font-size:13.5px; line-height:1.5;">Maintaining the highest standards in testing and reporting.</p>
            </div>
          </div>
          <div class="col-lg-2-5 col-md-4 col-sm-6 mb-30">
            <div class="bovicon-value-card">
              <div class="bovicon-value-icon mb-15" style="background-color: var(--color-primary) !important; color: #fff; width: 60px; height: 60px; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; font-size: 24px;"><i class="fas fa-shield-alt"></i></div>
              <h4 style="font-size: 18px; font-weight: 700; font-family:'Lexend',sans-serif;">Integrity</h4>
              <p class="mb-0 text-muted" style="font-size:13.5px; line-height:1.5;">Ensuring transparency, ethics, and professionalism.</p>
            </div>
          </div>
          <div class="col-lg-2-5 col-md-4 col-sm-6 mb-30">
            <div class="bovicon-value-card">
              <div class="bovicon-value-icon mb-15" style="background-color: var(--color-primary) !important; color: #fff; width: 60px; height: 60px; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; font-size: 24px;"><i class="fas fa-lightbulb"></i></div>
              <h4 style="font-size: 18px; font-weight: 700; font-family:'Lexend',sans-serif;">Innovation</h4>
              <p class="mb-0 text-muted" style="font-size:13.5px; line-height:1.5;">Continuously adopting advanced technologies.</p>
            </div>
          </div>
          <div class="col-lg-2-5 col-md-4 col-sm-6 mb-30">
            <div class="bovicon-value-card">
              <div class="bovicon-value-icon mb-15" style="background-color: var(--color-primary) !important; color: #fff; width: 60px; height: 60px; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; font-size: 24px;"><i class="fas fa-hand-holding-heart"></i></div>
              <h4 style="font-size: 18px; font-weight: 700; font-family:'Lexend',sans-serif;">Reliability</h4>
              <p class="mb-0 text-muted" style="font-size:13.5px; line-height:1.5;">Providing accurate and timely diagnostic results.</p>
            </div>
          </div>
          <div class="col-lg-2-5 col-md-4 col-sm-6 mb-30">
            <div class="bovicon-value-card">
              <div class="bovicon-value-icon mb-15" style="background-color: var(--color-primary) !important; color: #fff; width: 60px; height: 60px; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; font-size: 24px;"><i class="fas fa-users"></i></div>
              <h4 style="font-size: 18px; font-weight: 700; font-family:'Lexend',sans-serif;">Customer Focus</h4>
              <p class="mb-0 text-muted" style="font-size:13.5px; line-height:1.5;">Building long-term relationships through service.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ========================
        Services Layout 3
    =========================== -->
    <section class="services-layout3 services-carousel bg-gray-gradient pt-130 pb-90">
      <div class="container">
        <div class="row">
          <div class="col-12 col-xl-6 offset-xl-3">
            <div class="heading-layout2 text-center mb-50">
              <h2 class="heading-subtitle color-primary">Our Services</h2>
              <h3 class="heading-title">Providing the Diverse Needs of Your Veterinary Practice</h3>
            </div>
          </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="slick-carousel"
              data-slick='{"slidesToShow": 3, "slidesToScroll": 3, "arrows": false, "dots": true, "responsive": [ {"breakpoint": 992, "settings": {"slidesToShow": 2}}, {"breakpoint": 767, "settings": {"slidesToShow": 2}}, {"breakpoint": 480, "settings": {"slidesToShow": 1}}]}'>
              <?php
              $servQuery = mysqli_query($con, "SELECT * FROM services ORDER BY id ASC");
              if ($servQuery && mysqli_num_rows($servQuery) > 0) {
                  while ($row = mysqli_fetch_assoc($servQuery)) {
              ?>
              <!-- service item -->
              <div class="service-item">
                <div class="service-body">
                  <div class="d-flex align-items-center justify-content-between">
                    <h4 class="service-title">
                      <a href="tests.php"><?php echo htmlspecialchars($row['title']); ?></a>
                    </h4>
                    <div class="service-icon">
                      <i class="<?php echo htmlspecialchars($row['icon']); ?>"></i>
                    </div>
                  </div>
                  <p class="service-desc"><?php echo htmlspecialchars($row['description']); ?></p>
                  <ul class="features-list-layout3 list-unstyled">
                    <?php
                    $feats = explode("\n", str_replace("\r", "", $row['features']));
                    foreach ($feats as $f) {
                        if (trim($f) !== '') {
                    ?>
                    <li class="feature-item">
                      <div class="feature-icon"><i class="icon-check"></i></div>
                      <h4 class="feature-title mb-0"><?php echo htmlspecialchars(trim($f)); ?></h4>
                    </li>
                    <?php
                        }
                    }
                    ?>
                  </ul>
                  <a href="tests.php" class="btn btn-secondary">
                    <i class="icon-arrow-right"></i> <span>Explore More</span>
                  </a>
                </div><!-- /.service-body -->
                <div class="service-shape">
                  <span class="hexagon-clippath"></span><span class="hexagon-clippath2"></span>
                </div>
              </div><!-- /.service-item -->
              <?php
                  }
              } else {
                  echo '<p class="text-center w-100">No services found.</p>';
              }
              ?>
            </div><!-- /.carousel -->
          </div><!-- /.col-12 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.Services Layout 3 -->

    <!-- ========================
        Industries We Serve
    =========================== -->
    <style>
      .bovicon-industry-card {
        background: #ffffff !important;
        border-radius: 16px !important;
        padding: 45px 30px !important;
        height: 100% !important;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.02) !important;
        border: 1px solid rgba(234, 234, 234, 0.8) !important;
        transition: all 0.35s cubic-bezier(0.25, 0.8, 0.25, 1) !important;
        display: flex !important;
        flex-direction: column !important;
        align-items: center !important;
        text-align: center !important;
        position: relative !important;
        overflow: hidden !important;
      }
      .bovicon-industry-card:hover {
        transform: translateY(-8px) !important;
        box-shadow: 0 20px 40px rgba(10, 79, 138, 0.08) !important;
        border-color: rgba(10, 79, 138, 0.2) !important;
      }
      .bovicon-industry-icon-box {
        width: 70px !important;
        height: 70px !important;
        border-radius: 50% !important;
        background-color: rgba(10, 79, 138, 0.06) !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        font-size: 28px !important;
        color: var(--color-primary) !important;
        margin-bottom: 25px !important;
        transition: all 0.3s ease !important;
        flex-shrink: 0 !important;
      }
      .bovicon-industry-card:hover .bovicon-industry-icon-box {
        background-color: var(--color-primary) !important;
        color: #ffffff !important;
        transform: scale(1.05) !important;
      }
      .bovicon-industry-card.card-secondary-hover:hover {
        border-color: rgba(255, 142, 37, 0.2) !important;
      }
      .bovicon-industry-card.card-secondary-hover:hover .bovicon-industry-icon-box {
        background-color: var(--color-secondary) !important;
      }
      .bovicon-industry-title {
        font-family: 'Lexend', sans-serif !important;
        font-size: 20px !important;
        font-weight: 700 !important;
        color: #1a1a1a !important;
        margin-bottom: 12px !important;
        transition: all 0.3s ease !important;
      }
      .bovicon-industry-card:hover .bovicon-industry-title {
        color: var(--color-primary) !important;
      }
      .bovicon-industry-card.card-secondary-hover:hover .bovicon-industry-title {
        color: var(--color-secondary) !important;
      }
      .bovicon-industry-desc {
        font-family: 'Roboto', sans-serif !important;
        font-size: 14.5px !important;
        line-height: 1.6 !important;
        color: #666666 !important;
        margin-bottom: 0 !important;
      }
    </style>

    <section class="industries-section bg-gray pt-100 pb-100">
      <div class="container">
        <div class="row">
          <div class="col-12 col-xl-6 offset-xl-3">
            <div class="heading-layout2 text-center mb-50">
              <h2 class="heading-subtitle">Industries We Serve</h2>
              <h3 class="heading-title">Supporting the Animal Healthcare Ecosystem</h3>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-6 mb-30">
            <div class="bovicon-industry-card">
              <div class="bovicon-industry-icon-box">
                <i class="fas fa-tractor"></i>
              </div>
              <h4 class="bovicon-industry-title">Dairy Farms</h4>
              <p class="bovicon-industry-desc">Supporting herd health and productivity through preventive diagnostics.</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-30">
            <div class="bovicon-industry-card card-secondary-hover">
              <div class="bovicon-industry-icon-box">
                <i class="fas fa-paw"></i>
              </div>
              <h4 class="bovicon-industry-title">Livestock Farms</h4>
              <p class="bovicon-industry-desc">Comprehensive testing solutions for cattle, buffalo, sheep, and goats.</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-30">
            <div class="bovicon-industry-card">
              <div class="bovicon-industry-icon-box">
                <i class="fas fa-stethoscope"></i>
              </div>
              <h4 class="bovicon-industry-title">Veterinary Clinics</h4>
              <p class="bovicon-industry-desc">Reliable diagnostic support for companion animal and livestock practitioners.</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-30">
            <div class="bovicon-industry-card card-secondary-hover">
              <div class="bovicon-industry-icon-box">
                <i class="fas fa-flask"></i>
              </div>
              <h4 class="bovicon-industry-title">Research Institutions</h4>
              <p class="bovicon-industry-desc">Specialized laboratory services for veterinary and animal health research.</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-30">
            <div class="bovicon-industry-card">
              <div class="bovicon-industry-icon-box">
                <i class="fas fa-building"></i>
              </div>
              <h4 class="bovicon-industry-title">Animal Health Companies</h4>
              <p class="bovicon-industry-desc">Diagnostic partnerships for disease surveillance and product evaluation.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ========================
        Mission & Vision
    =========================== -->
    <style>
      .bovicon-mv-card {
        background: #ffffff !important;
        border-radius: 16px !important;
        padding: 50px 40px !important;
        height: 100% !important;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.05) !important;
        transition: all 0.35s cubic-bezier(0.25, 0.8, 0.25, 1) !important;
        display: flex !important;
        flex-direction: column !important;
        align-items: flex-start !important;
        position: relative !important;
        overflow: visible !important;
      }
      .bovicon-mv-card.card-primary {
        border-top: 5px solid var(--color-primary) !important;
      }
      .bovicon-mv-card.card-secondary {
        border-top: 5px solid var(--color-secondary) !important;
      }
      .bovicon-mv-card:hover {
        transform: translateY(-8px) !important;
        box-shadow: 0 25px 45px rgba(0, 0, 0, 0.12) !important;
      }
      .bovicon-mv-icon-box {
        width: 65px !important;
        height: 65px !important;
        border-radius: 50% !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        font-size: 26px !important;
        color: #fff !important;
        margin-bottom: 25px !important;
        flex-shrink: 0 !important;
        box-shadow: 0 8px 16px rgba(10, 79, 138, 0.2) !important;
      }
      .bovicon-mv-card.card-secondary .bovicon-mv-icon-box {
        box-shadow: 0 8px 16px rgba(255, 142, 37, 0.25) !important;
      }
      .bovicon-mv-title {
        font-family: 'Lexend', sans-serif !important;
        font-size: 24px !important;
        font-weight: 700 !important;
        color: #1a1a1a !important;
        margin-bottom: 15px !important;
      }
      .bovicon-mv-text {
        font-family: 'Roboto', sans-serif !important;
        font-size: 16px !important;
        line-height: 1.65 !important;
        color: #4a5568 !important;
        margin-bottom: 0 !important;
      }
    </style>

    <section class="mission-vision-section pt-100 pb-100" style="background: linear-gradient(135deg, rgba(10, 79, 138, 0.95), rgba(5, 40, 70, 0.95)), url('assets/images/banners/7.jpg') no-repeat center center; background-size: cover; position: relative;">
      <div class="container" style="position: relative; z-index: 2;">
        <div class="row">
          <div class="col-sm-12 col-md-6 mb-30">
            <div class="bovicon-mv-card card-secondary">
              <div class="bovicon-mv-icon-box" style="background-color: var(--color-secondary);">
                <i class="fas fa-bullseye"></i>
              </div>
              <h3 class="bovicon-mv-title">Our Mission</h3>
              <p class="bovicon-mv-text">
                To provide world-class veterinary diagnostic solutions that improve animal health, support veterinarians, and contribute to the advancement of veterinary science.
              </p>
            </div>
          </div>
          <div class="col-sm-12 col-md-6 mb-30">
            <div class="bovicon-mv-card card-primary">
              <div class="bovicon-mv-icon-box" style="background-color: var(--color-primary);">
                <i class="fas fa-eye"></i>
              </div>
              <h3 class="bovicon-mv-title">Our Vision</h3>
              <p class="bovicon-mv-text">
                To become India's most trusted veterinary diagnostics and research organization by delivering excellence, innovation, and scientific accuracy.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ========================
        CTA Section
    =========================== -->
    <section class="cta-section text-center pt-80 pb-80" style="background-color: var(--color-primary); color: #fff;">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <h3 class="mb-20 text-white" style="font-family: 'Lexend', sans-serif; font-weight: 700; font-size: 32px;">Need Reliable Veterinary Diagnostics?</h3>
            <p class="mb-40 text-white" style="font-size: 18px; opacity: 0.9; line-height: 1.6;">
              Partner with BOVICAN for accurate testing, expert interpretation, and dependable veterinary laboratory services.
            </p>
            <a href="contact-us.php" class="btn btn-white btn-xl" style="background:#fff; color:var(--color-primary) !important; border:none; padding:15px 40px; border-radius:30px; font-weight:700; transition:all 0.3s ease;">
              <span>Contact Us Today</span>
              <i class="icon-arrow-right ml-10"></i>
            </a>
          </div>
        </div>
      </div>
    </section>



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