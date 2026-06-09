<?php include_once 'admin/include/config.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <meta name="description" content="Bovica - Pathology Tests & Services">
  <link href="assets/images/favicon/favicon.png" rel="icon">
  <title>Bovica - Pathology Tests & Services</title>
  <?php include 'includes/style.php'; ?>
</head>

<body>
  <div class="wrapper">
    <div class="preloader">
      <div class="loading"><span></span><span></span><span></span><span></span></div>
    </div><!-- /.preloader -->

    <?php include 'includes/header.php'; ?>

    <!-- ========================
       page title 
    =========================== -->
    <section class="page-title-layout2 page-title-light pb-30 bg-overlay bg-parallax">
      <div class="bg-img"><img src="assets/images/page-titles/9.jpg" alt="background"></div>
      <div class="container">
        <div class="row">
          <div class="col-12 col-xl-9">
            <span class="pagetitle-subheading">Harnessing Our Medical Expertise To Build Best Test Offering!</span>
            <h1 class="pagetitle-heading">Quality Laboratory Testing Services!</h1>
            <p class="pagetitle-desc">With a belief that knowledge is power, we connect our patients directly with their
              results so they have valuable health information when they need it most, care about our people and are
              committed to excellence in the work we do.
            </p>
            <div class="d-flex flex-wrap align-items-center">
              <a href="contact-us.php" class="btn btn-white btn-xl mb-10 mr-30">
                <span>Book a Home Visit</span>
                <i class="icon-arrow-right"></i>
              </a>
              <a class="video-btn video-btn-sm popup-video mb-10" href="https://www.youtube.com/watch?v=TKnufs85hXk">
                <div class="video-player">
                  <i class="fa fa-play"></i>
                </div>
                <span class="video-btn-title color-white">How it works!</span>
              </a>
            </div>
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
              <li class="breadcrumb-item active" aria-current="page">Tests & Services</li>
            </ol>
          </nav>
        </div><!-- /.container -->
      </div><!-- /.breadcrumb-area -->
    </section><!-- /.page-title -->

    <!-- ========================
        Services Layout 3
    =========================== -->
    <section class="services-layout3 pt-130 pb-100">
      <div class="container">
        <div class="row">
          <div class="col-12 col-xl-6 offset-xl-3">
            <div class="heading-layout2 text-center mb-50">
              <h2 class="heading-subtitle color-primary">Find the Right Test for Your Needs!</h2>
              <h3 class="heading-title">Providing the Diverse Needs of Your Patient Community</h3>
            </div>
          </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
        <div class="row">
          <?php
          $servQuery = mysqli_query($con, "SELECT * FROM services ORDER BY id ASC");
          if ($servQuery && mysqli_num_rows($servQuery) > 0) {
              while ($row = mysqli_fetch_assoc($servQuery)) {
          ?>
          <!-- service item -->
          <div class="col-sm-6 col-md-6 col-lg-4 mb-30">
            <div class="service-item">
              <div class="service-body">
                <div class="d-flex align-items-center justify-content-between">
                  <h4 class="service-title">
                    <a href="contact-us.php"><?php echo htmlspecialchars($row['title']); ?></a>
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
                <a href="contact-us.php" class="btn btn-secondary">
                  <i class="icon-arrow-right"></i> <span>Explore More</span>
                </a>
              </div><!-- /.service-body -->
              <div class="service-shape">
                <span class="hexagon-clippath"></span><span class="hexagon-clippath2"></span>
              </div>
            </div><!-- /.service-item -->
          </div><!-- /.col-lg-4 -->
          <?php
              }
          } else {
              echo '<p class="text-center w-100">No services found.</p>';
          }
          ?>
        </div><!-- /.row -->
        <div class="row">
          <div class="col-md-12 col-lg-6 offset-lg-3 text-center">
            <p class="fw-bold px-xl-5 mb-0">With over 90% of health decisions based on diagnostic results, we are
              committed to
              being a trusted healthcare partner.
              <a href="contact-us.php" class="color-primary underlined-text-secondary">Contact Us</a>
            </p>
          </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.Services Layout 3 -->

    <!-- ========================
        Diagnostic Tests Section
    =========================== -->
    <style>
      /* Bovicon Dynamic Test Cards Styling */
      .tests-section {
        background-color: #f7f9fb;
      }
      .test-card {
        background: #fff;
        border: 1px solid #eaeaea;
        border-radius: 8px;
        padding: 24px;
        display: flex;
        flex-direction: column;
        height: 100%;
        min-height: 390px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.02);
      }
      .test-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 20px rgba(0, 0, 0, 0.08);
        border-color: #004b93;
      }
      .test-title {
        font-family: 'Lexend', sans-serif;
        font-size: 16px;
        font-weight: 700;
        line-height: 1.4;
        color: #1a1a1a;
        min-height: 48px;
        margin-bottom: 20px;
        text-transform: uppercase;
      }
      .test-info-row {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 12px;
      }
      .test-info-icon {
        width: 24px;
        height: 24px;
        font-size: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        flex-shrink: 0;
      }
      .info-blue {
        color: #0d6efd;
        background-color: #e7f1ff;
      }
      .info-red {
        color: #dc3545;
        background-color: #ffe8ea;
      }
      .info-orange {
        color: #fd7e14;
        background-color: #fff5eb;
      }
      .test-info-text {
        font-size: 13.5px;
        color: #555;
        font-family: 'Roboto', sans-serif;
      }
      .accordion-trigger {
        user-select: none;
        border-radius: 4px;
        padding: 4px 0;
        transition: background 0.2s ease;
      }
      .accordion-trigger[aria-expanded="true"] .chevron-arrow {
        transform: rotate(180deg);
      }
      .chevron-arrow {
        transition: transform 0.2s ease;
      }
      .parameter-collapse-box {
        width: 100%;
      }
      .parameter-list {
        padding-left: 0;
      }
      .parameter-list li {
        position: relative;
        padding-left: 15px;
        margin-bottom: 6px;
        font-size: 12.5px;
        color: #666;
        line-height: 1.4;
      }
      .parameter-list li::before {
        content: "•";
        color: #0d6efd;
        font-weight: bold;
        display: inline-block;
        width: 1em;
        margin-left: -1em;
        position: absolute;
        left: 10px;
      }
      .test-card-footer {
        margin-top: auto;
        border-top: 1px solid #f2f2f2;
        padding-top: 15px;
        width: 100%;
      }
      .price-lbl {
        font-family: 'Lexend', sans-serif;
        font-size: 22px;
        font-weight: 700;
        color: #198754;
      }
      .price-val {
        margin-left: 4px;
      }
      .btn-book-now {
        background: #004b93;
        color: #fff !important;
        border-radius: 30px;
        padding: 10px 20px;
        width: 100%;
        text-decoration: none;
        font-weight: 700;
        font-size: 14px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        transition: all 0.3s ease;
        border: none;
        font-family: 'Lexend', sans-serif;
      }
      .btn-book-now:hover {
        background: #003366;
        text-decoration: none;
      }
      .btn-book-now .btn-icon {
        background: #fff;
        color: #004b93;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 8px;
        transition: all 0.3s ease;
      }
      .btn-book-now:hover .btn-icon {
        transform: translateX(3px);
      }
    </style>

    <section class="tests-section pt-100 pb-100">
      <div class="container">
        <div class="row">
          <div class="col-12 col-xl-6 offset-xl-3">
            <div class="heading-layout2 text-center mb-50">
              <h2 class="heading-subtitle color-primary">Dynamic Pathology Packages</h2>
              <h3 class="heading-title">Choose from Our Diagnostic Tests</h3>
            </div>
          </div>
        </div>
        <div class="row g-4">
          <?php
          $testsQuery = mysqli_query($con, "SELECT * FROM tests ORDER BY id ASC");
          if ($testsQuery && mysqli_num_rows($testsQuery) > 0) {
              while ($test = mysqli_fetch_assoc($testsQuery)) {
                  $test_id = $test['id'];
          ?>
          <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
            <div class="test-card">
              <div class="test-title"><?php echo htmlspecialchars($test['name']); ?></div>
              
              <div class="test-info-row">
                <div class="test-info-icon info-blue">
                  <i class="fas fa-info-circle"></i>
                </div>
                <div class="test-info-text"><?php echo htmlspecialchars($test['preparation']); ?></div>
              </div>

              <div class="test-info-row">
                <div class="test-info-icon info-red">
                  <i class="far fa-file-alt"></i>
                </div>
                <div class="test-info-text"><?php echo htmlspecialchars($test['frequency']); ?></div>
              </div>

              <div class="test-info-row accordion-trigger collapsed" data-toggle="collapse" data-target="#collapse_<?php echo $test_id; ?>" aria-expanded="false" style="cursor: pointer;">
                <div class="test-info-icon info-orange">
                  <i class="fas fa-clipboard-list"></i>
                </div>
                <div class="test-info-text font-weight-bold" style="color: #004b93; display: flex; align-items: center; justify-content: space-between; width: 100%;">
                  <span><?php echo $test['parameter_count']; ?> parameter(s) covered</span>
                  <i class="fas fa-chevron-down chevron-arrow font-10 text-muted ml-2"></i>
                </div>
              </div>
              
              <div id="collapse_<?php echo $test_id; ?>" class="collapse parameter-collapse-box mb-3">
                <div style="background-color: #f8f9fa; border-radius: 4px; padding: 12px; margin-top: 5px;">
                  <ul class="parameter-list list-unstyled mb-0">
                    <?php
                    $params = explode("\n", str_replace("\r", "", $test['parameters']));
                    foreach ($params as $p) {
                        if (trim($p) !== '') {
                            echo '<li>' . htmlspecialchars(trim($p)) . '</li>';
                        }
                    }
                    ?>
                  </ul>
                </div>
              </div>

              <div class="test-card-footer">
                <div class="price-lbl mb-3">
                  <span>₹</span><span class="price-val"><?php echo number_format($test['price'], 2); ?></span>
                </div>
                
                <a href="contact-us.php?test=<?php echo urlencode($test['name']); ?>" class="btn-book-now">
                  <span>Book Now</span>
                  <span class="btn-icon">
                    <i class="fas fa-chevron-right"></i>
                  </span>
                </a>
              </div>
            </div>
          </div>
          <?php
              }
          } else {
              echo '<p class="text-center w-100">No diagnostic tests currently active.</p>';
          }
          ?>
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
