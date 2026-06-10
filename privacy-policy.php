<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <meta name="description" content="BOVICAN - Veterinary Diagnostics and Research Privacy Policy">
  <link href="assets/images/favicon/favicon.png" rel="icon">
  <title>BOVICAN - Privacy Policy</title>
  <?php include 'includes/style.php'; ?>
  <style>
    .privacy-card h4 {
      font-family: 'Lexend', sans-serif;
      font-weight: 700;
      color: #0A4F8A;
      margin-top: 30px;
      margin-bottom: 15px;
      font-size: 20px;
      border-bottom: 2px solid #edf2f7;
      padding-bottom: 8px;
    }
    .privacy-card p {
      font-family: 'Roboto', sans-serif;
      font-size: 15px;
      line-height: 1.7;
      color: #555;
      margin-bottom: 18px;
    }
    .privacy-card ul {
      padding-left: 20px;
      margin-bottom: 20px;
    }
    .privacy-card ul li {
      list-style-type: disc;
      font-family: 'Roboto', sans-serif;
      font-size: 15px;
      color: #555;
      line-height: 1.7;
      margin-bottom: 8px;
    }
  </style>
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
            <span class="pagetitle-subheading">BOVICAN Diagnostics Safety Policies</span>
            <h1 class="pagetitle-heading">Privacy Policy</h1>
            <p class="pagetitle-desc">Read how BOVICAN collects, manages, and secures patient diagnostics records, farm info, and laboratory results.</p>
          </div>
        </div>
      </div>
      <div class="breadcrumb-area">
        <div class="container">
          <nav>
            <ol class="breadcrumb justify-content-center mt-80 mb-0">
              <li class="breadcrumb-item">
                <a href="index.php">Home</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Privacy Policy</li>
            </ol>
          </nav>
        </div>
      </div>
    </section>

    <!-- ==========================
        Privacy Content Section
    =========================== -->
    <section class="privacy-section pt-100 pb-100 bg-gray" style="background-color: #f8fafc;">
      <div class="container">
        <div class="row">
          <div class="col-12 col-lg-10 offset-lg-1">
            <div class="card border-0 p-5" style="border-radius: 16px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.02); background-color: #ffffff;">
              <div class="privacy-card text-left">
                <?php
                include_once 'admin/include/config.php';
                $pTitle = 'Privacy Policy';
                $pContent = '';
                $pUpdated = 'June 10, 2026';
                if (isset($con)) {
                    $pQuery = mysqli_query($con, "SELECT * FROM pages WHERE slug = 'privacy-policy'");
                    if ($pQuery && mysqli_num_rows($pQuery) > 0) {
                        $pRow = mysqli_fetch_assoc($pQuery);
                        $pTitle = $pRow['title'];
                        $pContent = $pRow['content'];
                        $pUpdated = date("F d, Y", strtotime($pRow['updated_at']));
                    }
                }
                ?>
                <h3 style="font-family: 'Lexend', sans-serif; font-weight: 700; color: #0A4F8A; font-size: 26px; margin-bottom: 10px;"><?php echo htmlspecialchars($pTitle); ?></h3>
                <p class="text-muted" style="font-size: 13px;">Last Updated: <?php echo $pUpdated; ?></p>
                <div style="width: 50px; height: 3px; background-color: #FF8E25; margin-bottom: 30px; border-radius: 2px;"></div>
                
                <?php echo $pContent; ?>
              </div>
            </div>
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
