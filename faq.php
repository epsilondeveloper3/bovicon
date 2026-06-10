<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <meta name="description" content="BOVICAN - Veterinary Diagnostics and Research Frequently Asked Questions">
  <link href="assets/images/favicon/favicon.png" rel="icon">
  <title>BOVICAN - FAQs</title>
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
            <span class="pagetitle-subheading">BOVICAN Diagnostics Help & Support</span>
            <h1 class="pagetitle-heading">Frequently Asked Questions</h1>
            <p class="pagetitle-desc">Find quick answers to common questions about our veterinary diagnostic panels, sample collection, turnaround times, and patient reports.</p>
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
              <li class="breadcrumb-item active" aria-current="page">FAQs</li>
            </ol>
          </nav>
        </div>
      </div>
    </section>

    <!-- ==========================
        FAQ Section
    =========================== -->
    <section class="faq-section pt-100 pb-100 bg-gray" style="background-color: #f8fafc;">
      <div class="container">
        <div class="row">
          <div class="col-12 col-lg-8 offset-lg-2">
            <div class="heading-layout2 text-center mb-50">
              <h2 class="heading-subtitle" style="font-family: 'Lexend', sans-serif; color: var(--color-secondary); font-weight: 700; text-transform: uppercase; font-size: 13px; letter-spacing: 1.5px;">Got Questions?</h2>
              <h3 class="heading-title" style="font-family: 'Lexend', sans-serif; font-weight: 700; color: var(--color-primary); font-size: 32px; margin-bottom: 20px;">Diagnostic Services FAQs</h3>
              <div style="width: 60px; height: 3px; background-color: var(--color-secondary); margin: 0 auto; border-radius: 2px;"></div>
            </div>
            
            <div class="faq-container">
              <?php
              include_once 'admin/include/config.php';
              if (isset($con)) {
                  $fQuery = mysqli_query($con, "SELECT * FROM faqs WHERE status = 1 ORDER BY id ASC");
                  if ($fQuery && mysqli_num_rows($fQuery) > 0) {
                      while ($fRow = mysqli_fetch_assoc($fQuery)) {
              ?>
                        <div class="faq-item" style="border: 1px solid #e2e8f0; border-radius: 12px; margin-bottom: 20px; overflow: hidden; background: #ffffff; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.01), 0 2px 4px -1px rgba(0,0,0,0.01); transition: all 0.25s ease;">
                          <button class="faq-toggle-btn" style="width: 100%; background: none; border: none; padding: 22px 28px; display: flex; justify-content: space-between; align-items: center; text-align: left; cursor: pointer; outline: none;">
                            <span style="font-family: 'Lexend', sans-serif; font-weight: 700; color: var(--color-primary); font-size: 16px; padding-right: 15px;"><?php echo htmlspecialchars($fRow['question']); ?></span>
                            <i class="fas fa-chevron-down faq-arrow" style="font-size: 14px; color: var(--color-secondary); transition: transform 0.3s ease;"></i>
                          </button>
                          <div class="faq-content-box" style="max-height: 0; overflow: hidden; transition: max-height 0.3s cubic-bezier(0.4, 0, 0.2, 1); background-color: #f8fafc;">
                            <div style="padding: 24px 28px; border-top: 1px solid #edf2f7; font-family: 'Roboto', sans-serif; font-size: 15px; color: #555; line-height: 1.6; text-align: left;">
                              <?php echo htmlspecialchars($fRow['answer']); ?>
                            </div>
                          </div>
                        </div>
              <?php
                      }
                  } else {
                      echo '<p class="text-center text-muted">No FAQs found.</p>';
                  }
              }
              ?>
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

  <script>
    document.addEventListener("DOMContentLoaded", function() {
        var faqItems = document.querySelectorAll(".faq-item");
        faqItems.forEach(function(item) {
            var btn = item.querySelector(".faq-toggle-btn");
            var content = item.querySelector(".faq-content-box");
            var arrow = item.querySelector(".faq-arrow");
            
            btn.addEventListener("click", function() {
                // Close other items
                faqItems.forEach(function(otherItem) {
                    if (otherItem !== item) {
                        otherItem.querySelector(".faq-content-box").style.maxHeight = "0";
                        otherItem.querySelector(".faq-arrow").style.transform = "rotate(0deg)";
                        otherItem.style.borderColor = "#e2e8f0";
                        otherItem.style.boxShadow = "0 4px 6px -1px rgba(0,0,0,0.01), 0 2px 4px -1px rgba(0,0,0,0.01)";
                    }
                });
                
                // Toggle current item
                if (content.style.maxHeight === "0px" || content.style.maxHeight === "") {
                    content.style.maxHeight = content.scrollHeight + "px";
                    arrow.style.transform = "rotate(180deg)";
                    item.style.borderColor = "rgba(0, 128, 129, 0.4)";
                    item.style.boxShadow = "0 10px 15px -3px rgba(0, 128, 129, 0.05), 0 4px 6px -2px rgba(0, 128, 129, 0.02)";
                } else {
                    content.style.maxHeight = "0";
                    arrow.style.transform = "rotate(0deg)";
                    item.style.borderColor = "#e2e8f0";
                    item.style.boxShadow = "0 4px 6px -1px rgba(0,0,0,0.01), 0 2px 4px -1px rgba(0,0,0,0.01)";
                }
            });
        });
    });
  </script>
</body>

</html>
