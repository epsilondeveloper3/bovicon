<?php include_once 'admin/include/config.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <meta name="description" content="Bovica - Pathology Tests & Services">
  <link href="assets/images/favicon/favicon.png" rel="icon">
  <title>BOVICAN</title>
  <?php include 'includes/style.php'; ?>
  <style>
    /* Force Modal to always display in front of the backdrop overlay */
    #bookingModal {
      z-index: 99999 !important;
    }
    .modal-backdrop {
      z-index: 99990 !important;
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
        Redesigned Diagnostic Tests Listing
    =========================== -->
    <style>
      .tests-section {
        background-color: #f7f9fb;
      }
      
      /* Sidebar styling */
      .categories-sidebar-card {
        background: #fff;
        border: 1px solid #eaeaea;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.02);
        overflow: hidden;
      }
      .sidebar-header {
        background: var(--color-primary);
        color: #fff;
        font-family: 'Lexend', sans-serif;
        font-weight: 700;
        font-size: 16px;
        padding: 16px 20px;
        display: flex;
        align-items: center;
      }
      .sidebar-list {
        padding: 0;
      }
      .sidebar-list li {
        border-bottom: 1px solid #f2f2f2;
        transition: all 0.2s ease;
      }
      .sidebar-list li:last-child {
        border-bottom: none;
      }
      .sidebar-list li a {
        display: flex;
        align-items: center;
        padding: 14px 20px;
        font-size: 13.5px;
        color: #444;
        font-weight: 500;
        text-decoration: none;
        transition: all 0.2s ease;
      }
      .sidebar-list li:hover {
        background-color: #f8fafd;
      }
      .sidebar-list li:hover a {
        color: var(--color-primary);
      }
      .sidebar-list li.active {
        background-color: #eef5fc;
      }
      .sidebar-list li.active a {
        color: var(--color-primary);
        font-weight: 700;
      }
      .sidebar-list li .list-icon {
        margin-right: 12px;
        font-size: 12px;
        opacity: 0.6;
        transition: transform 0.2s ease;
      }
      .sidebar-list li:hover .list-icon {
        transform: translateX(3px);
        opacity: 1;
        color: var(--color-primary);
      }
      .sidebar-list li.active .list-icon {
        opacity: 1;
        color: var(--color-primary);
      }
      .badge-count {
        background-color: #e9ecef;
        color: #495057;
        font-size: 11px;
        padding: 4px 8px;
        border-radius: 20px;
        font-weight: 500;
      }
      .sidebar-list li:hover .badge-count {
        background-color: var(--color-primary);
        color: #fff;
      }
      .sidebar-list li.active .badge-count {
        background-color: var(--color-primary);
        color: #fff;
      }
      
      /* Mobile Filter Dropdown */
      .mobile-category-select {
        height: 45px;
        border-radius: 8px;
        border: 1px solid #ced4da;
        box-shadow: none;
        font-size: 14px;
      }
      .mobile-category-select:focus {
        border-color: var(--color-primary);
        box-shadow: 0 0 0 0.2rem rgba(var(--color-primary-rgb), 0.15);
      }
      
      /* Search styling */
      .search-form-wrapper {
        width: 100%;
        max-width: 320px;
      }
      @media(max-width: 767px) {
        .search-form-wrapper {
          max-width: 100%;
        }
      }
      .search-input-group {
        position: relative;
        display: flex;
        align-items: center;
      }
      .search-input {
        border-radius: 30px;
        border: 1px solid #ced4da;
        padding-left: 20px;
        padding-right: 70px;
        height: 44px;
        font-size: 14px;
        box-shadow: none !important;
        transition: border-color 0.2s ease;
      }
      .search-input:focus {
        border-color: var(--color-primary);
      }
      .search-btn {
        position: absolute;
        right: 5px;
        top: 4px;
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background-color: var(--color-primary);
        border: none;
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: background-color 0.2s ease;
      }
      .search-btn:hover {
        background-color: var(--color-secondary);
      }
      .search-clear-btn {
        position: absolute;
        right: 48px;
        top: 10px;
        color: #999;
        font-size: 14px;
        text-decoration: none;
      }
      .search-clear-btn:hover {
        color: #333;
      }
      
      /* Cards Styling */
      .test-card {
        background: #fff;
        border: 1px solid #eaeaea;
        border-radius: 12px;
        padding: 24px;
        display: flex;
        flex-direction: column;
        height: 100%;
        /* Allow card height to collapse to content so there's no large empty space */
        min-height: 0;
        transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.015);
      }
      .test-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 16px 30px rgba(0, 0, 0, 0.08);
        border-color: rgba(var(--color-primary-rgb), 0.2);
      }
      .test-title {
        font-family: 'Lexend', sans-serif;
        font-size: 15px;
        font-weight: 700;
        line-height: 1.4;
        color: #111;
        min-height: 45px;
        margin-bottom: 20px;
        text-transform: uppercase;
        letter-spacing: 0.2px;
      }
      .test-info-row {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 12px;
      }
      .test-info-icon {
        width: 26px;
        height: 26px;
        font-size: 11px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        flex-shrink: 0;
      }
      .info-blue {
        color: #0b63e0;
        background-color: #eaf1fb;
      }
      .info-red {
        color: #dc3545;
        background-color: #fdf2f4;
      }
      .info-orange {
        color: #e65100;
        background-color: #fff3e0;
      }
      .test-info-text {
        font-size: 13px;
        color: #555;
        font-family: 'Roboto', sans-serif;
      }
      .chevron-arrow {
        transition: transform 0.25s ease;
      }
      .accordion-trigger:not(.collapsed) .chevron-arrow {
        transform: rotate(180deg);
        color: var(--color-primary) !important;
      }
      .parameter-collapse-box {
        width: 100%;
        animation: slideDownFade 0.2s ease-out;
      }
      .parameter-list {
        padding-left: 0;
      }
      .parameter-list li {
        position: relative;
        padding-left: 15px;
        margin-bottom: 6px;
        font-size: 12px;
        color: #666;
        line-height: 1.4;
      }
      .parameter-list li::before {
        content: "•";
        color: var(--color-primary);
        font-weight: bold;
        display: inline-block;
        width: 1em;
        margin-left: -1em;
        position: absolute;
        left: 10px;
      }
      .test-card-footer {
        /* Reduce spacing above the button to make footer closer to content */
        margin-top: 12px;
        border-top: 1px solid #f2f2f2;
        padding-top: 10px;
        width: 100%;
      }
      /* Prices hidden as requested */
      .price-lbl {
        display: none !important;
        font-family: 'Lexend', sans-serif;
        font-size: 22px;
        font-weight: 700;
        color: #2e7d32;
      }
      .price-val {
        display: none !important;
        margin-left: 4px;
      }
      .btn-book-now {
        background: var(--color-primary);
        color: #fff !important;
        border-radius: 30px;
        padding: 10px 20px;
        width: 100%;
        text-decoration: none;
        font-weight: 700;
        font-size: 13.5px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        transition: all 0.25s ease;
        border: none;
        font-family: 'Lexend', sans-serif;
      }
      .btn-book-now:hover {
        background: var(--color-secondary);
        text-decoration: none;
      }
      .btn-book-now .btn-icon {
        background: #fff;
        color: var(--color-primary);
        width: 20px;
        height: 20px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 8px;
        transition: all 0.25s ease;
      }
      .btn-book-now:hover .btn-icon {
        color: var(--color-secondary);
        transform: translateX(3px);
      }
      .no-results-box {
        background: #fff;
        border: 1px solid #eaeaea;
        border-radius: 12px;
        padding: 50px 30px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.015);
      }
      
      /* Pagination Styling */
      .pagination-list {
        display: flex;
        gap: 8px;
      }
      .pagination-list li a {
        width: 40px;
        height: 40px;
        border-radius: 8px;
        border: 1px solid #e0e0e0;
        background: #fff;
        color: #555;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
        font-weight: 700;
        text-decoration: none;
        transition: all 0.2s ease;
        font-family: 'Lexend', sans-serif;
      }
      .pagination-list li:hover a {
        background: #f5f5f5;
        border-color: #ccc;
        color: var(--color-primary);
      }
      .pagination-list li.active a {
        background: var(--color-primary);
        border-color: var(--color-primary);
        color: #fff;
      }
      .pagination-list li.disabled a {
        color: #ccc;
        background: #f9f9f9;
        border-color: #eaeaea;
        cursor: not-allowed;
        pointer-events: none;
      }
    </style>

    <?php
    // Fetch unique categories and counts directly from database
    $cat_counts = [];
    $all_cats_query = mysqli_query($con, "SELECT categories FROM tests");
    if ($all_cats_query) {
        while ($row = mysqli_fetch_assoc($all_cats_query)) {
            $cats = explode(", ", $row['categories']);
            foreach ($cats as $c) {
                $c = trim($c);
                if ($c !== "") {
                    $cat_counts[$c] = ($cat_counts[$c] ?? 0) + 1;
                }
            }
        }
        ksort($cat_counts);
    }

    // Process inputs
    $search_query = isset($_GET['search']) ? trim($_GET['search']) : '';
    $selected_category = isset($_GET['category']) ? trim($_GET['category']) : '';

    $where_clauses = [];

    if ($selected_category !== '') {
        $esc_cat = mysqli_real_escape_string($con, $selected_category);
        $where_clauses[] = "categories LIKE '%$esc_cat%'";
    }

    if ($search_query !== '') {
        $esc_search = mysqli_real_escape_string($con, $search_query);
        $where_clauses[] = "(name LIKE '%$esc_search%' OR parameters LIKE '%$esc_search%' OR test_code LIKE '%$esc_search%')";
    }

    $where_sql = "";
    if (count($where_clauses) > 0) {
        $where_sql = "WHERE " . implode(" AND ", $where_clauses);
    }

    // Pagination
    $limit = 9;
    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
    if ($page < 1) $page = 1;
    $offset = ($page - 1) * $limit;

    $count_query = "SELECT COUNT(*) as total FROM tests $where_sql";
    $count_res = mysqli_query($con, $count_query);
    $count_row = mysqli_fetch_assoc($count_res);
    $total_records = $count_row['total'] ?? 0;
    $total_pages = ceil($total_records / $limit);

    $data_query = "SELECT * FROM tests $where_sql ORDER BY id ASC LIMIT $offset, $limit";
    $tests_res = mysqli_query($con, $data_query);
    ?>

    <section class="tests-section pt-100 pb-100">
      <div class="container">
        <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
          <div class="alert alert-success alert-dismissible fade show mb-40" role="alert" style="border-radius: 8px; font-family: 'Lexend', sans-serif;">
            <strong>Success!</strong> Your booking request has been successfully submitted and saved. We will contact you shortly.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="float: right; background: none; border: none; font-size: 20px; line-height: 1;">&times;</button>
          </div>
        <?php elseif (isset($_GET['error'])): ?>
          <div class="alert alert-danger alert-dismissible fade show mb-40" role="alert" style="border-radius: 8px; font-family: 'Lexend', sans-serif;">
            <strong>Error!</strong> Something went wrong. Please check your fields and try again.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="float: right; background: none; border: none; font-size: 20px; line-height: 1;">&times;</button>
          </div>
        <?php endif; ?>
        <div class="row">
          
          <!-- Category Sidebar on the Left -->
          <div class="col-lg-3 col-md-12 mb-40">
            <!-- Desktop Sidebar Categories List -->
            <div class="categories-sidebar-card d-none d-lg-block">
              <div class="sidebar-header">
                <i class="fas fa-list-ul mr-2"></i> Categories
              </div>
              <ul class="sidebar-list list-unstyled mb-0">
                <li class="<?php echo ($selected_category == '') ? 'active' : ''; ?>">
                  <a href="tests.php?<?php echo $search_query !== '' ? 'search=' . urlencode($search_query) : ''; ?>">
                    <i class="fas fa-th-large list-icon"></i> All Categories
                  </a>
                </li>
                <?php foreach ($cat_counts as $cat => $count): ?>
                  <li class="<?php echo ($selected_category == $cat) ? 'active' : ''; ?>">
                    <a href="tests.php?category=<?php echo urlencode($cat) . ($search_query !== '' ? '&search=' . urlencode($search_query) : ''); ?>">
                      <i class="fas fa-book list-icon"></i> <?php echo htmlspecialchars($cat); ?>
                      <span class="badge badge-count ml-auto"><?php echo $count; ?></span>
                    </a>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>
            
            <!-- Mobile Categories Selector Dropdown -->
            <div class="d-block d-lg-none mb-30">
              <label class="form-label font-weight-bold text-muted">Filter by Category:</label>
              <select class="form-control mobile-category-select" onchange="location = this.value;">
                <option value="tests.php?<?php echo $search_query !== '' ? 'search=' . urlencode($search_query) : ''; ?>" <?php echo ($selected_category == '') ? 'selected' : ''; ?>>All Categories</option>
                <?php foreach ($cat_counts as $cat => $count): ?>
                  <option value="tests.php?category=<?php echo urlencode($cat) . ($search_query !== '' ? '&search=' . urlencode($search_query) : ''); ?>" <?php echo ($selected_category == $cat) ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($cat); ?> (<?php echo $count; ?>)
                  </option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          
          <!-- Tests Grid on the Right -->
          <div class="col-lg-9 col-md-12">
            <!-- Search Bar Area -->
            <div class="d-flex flex-wrap align-items-center justify-content-between mb-30 gap-15">
              <h4 class="mb-0 text-muted font-15 font-weight-bold">
                <?php if ($selected_category !== ''): ?>
                  Category: <span class="color-primary"><?php echo htmlspecialchars($selected_category); ?></span>
                <?php else: ?>
                  All Diagnostic Tests
                <?php endif; ?>
                <span class="text-muted font-13 ml-2 font-weight-normal">(<?php echo $total_records; ?> found)</span>
              </h4>
              
              <form method="GET" action="tests.php" class="search-form-wrapper">
                <?php if ($selected_category !== ''): ?>
                  <input type="hidden" name="category" value="<?php echo htmlspecialchars($selected_category); ?>">
                <?php endif; ?>
                <div class="search-input-group">
                  <input type="text" name="search" placeholder="Search for Tests..." class="form-control search-input" value="<?php echo htmlspecialchars($search_query); ?>"/>
                  <button type="submit" class="search-btn"><i class="fas fa-search"></i></button>
                  <?php if ($search_query !== ''): ?>
                    <a href="tests.php?<?php echo $selected_category !== '' ? 'category=' . urlencode($selected_category) : ''; ?>" class="search-clear-btn" title="Clear Search">
                      <i class="fas fa-times"></i>
                    </a>
                  <?php endif; ?>
                </div>
              </form>
            </div>
            
            <!-- Cards Listing -->
            <div class="row g-4">
              <?php if ($tests_res && mysqli_num_rows($tests_res) > 0): ?>
                <?php while ($test = mysqli_fetch_assoc($tests_res)): ?>
                  <?php $test_id = $test['id']; ?>
                  <div class="col-lg-4 col-md-6 col-sm-12 mb-30">
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
                      
                      <div class="test-info-row accordion-trigger collapsed" data-target="#collapse_<?php echo $test_id; ?>" style="cursor: pointer;">
                        <div class="test-info-icon info-orange">
                          <i class="fas fa-clipboard-list"></i>
                        </div>
                        <div class="test-info-text font-weight-bold" style="color: var(--color-primary); display: flex; align-items: center; justify-content: space-between; width: 100%;">
                          <span><?php echo $test['parameter_count']; ?> parameter(s) covered</span>
                          <i class="fas fa-chevron-down chevron-arrow font-10 text-muted ml-2"></i>
                        </div>
                      </div>
                      
                      <div id="collapse_<?php echo $test_id; ?>" class="collapse parameter-collapse-box mb-3" style="display: none;">
                        <div style="background-color: #f8f9fa; border-radius: 4px; padding: 12px; margin-top: 5px; max-height: 150px; overflow-y: auto;">
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
                        <a href="#" class="btn-book-now" onclick="openBookingModal(event, '<?php echo htmlspecialchars($test['name'], ENT_QUOTES); ?>')">
                          <span>Book Now</span>
                          <span class="btn-icon">
                            <i class="fas fa-chevron-right"></i>
                          </span>
                        </a>
                      </div>
                    </div>
                  </div>
                <?php endwhile; ?>
              <?php else: ?>
                <div class="col-12 text-center py-50 w-100">
                  <div class="no-results-box">
                    <i class="fas fa-search-minus font-40 text-muted mb-20"></i>
                    <p class="h5 text-muted mb-0">No diagnostic tests match your criteria.</p>
                    <a href="tests.php" class="btn btn-secondary mt-15" style="border-radius:30px; padding: 8px 24px; font-weight:700;">Clear All Filters</a>
                  </div>
                </div>
              <?php endif; ?>
            </div>
            
            <!-- Pagination Grid -->
            <?php if ($total_pages > 1): ?>
              <div class="d-flex justify-content-end mt-20">
                <nav>
                  <ul class="pagination-list list-unstyled d-flex align-items-center mb-0">
                    <?php
                    $prev_page = $page - 1;
                    $prev_url = "tests.php?page=$prev_page" . ($selected_category !== '' ? '&category=' . urlencode($selected_category) : '') . ($search_query !== '' ? '&search=' . urlencode($search_query) : '');
                    $prev_class = ($page == 1) ? 'disabled' : '';
                    ?>
                    <li class="<?php echo $prev_class; ?>">
                      <a href="<?php echo ($page > 1) ? $prev_url : '#'; ?>"><i class="fas fa-chevron-left"></i></a>
                    </li>
                    
                    <?php
                    for ($i = 1; $i <= $total_pages; $i++) {
                        $active_class = ($i == $page) ? 'active' : '';
                        $page_url = "tests.php?page=$i" . ($selected_category !== '' ? '&category=' . urlencode($selected_category) : '') . ($search_query !== '' ? '&search=' . urlencode($search_query) : '');
                        echo '<li class="' . $active_class . '"><a href="' . $page_url . '">' . $i . '</a></li>';
                    }
                    ?>
                    
                    <?php
                    $next_page = $page + 1;
                    $next_url = "tests.php?page=$next_page" . ($selected_category !== '' ? '&category=' . urlencode($selected_category) : '') . ($search_query !== '' ? '&search=' . urlencode($search_query) : '');
                    $next_class = ($page == $total_pages) ? 'disabled' : '';
                    ?>
                    <li class="<?php echo $next_class; ?>">
                      <a href="<?php echo ($page < $total_pages) ? $next_url : '#'; ?>"><i class="fas fa-chevron-right"></i></a>
                    </li>
                  </ul>
                </nav>
              </div>
            <?php endif; ?>
          </div>
          
        </div>
      </div>
    </section>
    
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        // Toggle collapse panel for parameters covered
        var accordionTriggers = document.querySelectorAll('.accordion-trigger');
        accordionTriggers.forEach(function(trigger) {
            trigger.addEventListener('click', function(e) {
                e.preventDefault();
                var targetId = this.getAttribute('data-target');
                var collapseBox = document.querySelector(targetId);
                
                if (this.classList.contains('collapsed')) {
                    this.classList.remove('collapsed');
                    if (collapseBox) {
                        collapseBox.style.display = 'block';
                    }
                } else {
                    this.classList.add('collapsed');
                    if (collapseBox) {
                        collapseBox.style.display = 'none';
                    }
                }
            });
        });

    });
    </script>

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

  <!-- BOOKING MODAL -->
  <div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true" style="z-index: 1050; display: none;">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content" style="border-radius: 12px; overflow: hidden; border: none; box-shadow: 0 10px 30px rgba(0,0,0,0.15); background: #ffffff;">
        <div class="modal-header" style="background-color: var(--color-primary); color: #ffffff; padding: 20px 24px; border-bottom: none; display: flex; align-items: center; justify-content: space-between;">
          <h5 class="modal-title font-weight-bold" id="bookingModalLabel" style="font-family: 'Lexend', sans-serif; color: #ffffff; margin-bottom: 0; font-size: 18px;">Book Diagnostic Test</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close" style="background: none; border: none; color: #ffffff; font-size: 24px; line-height: 1; opacity: 0.8; cursor: pointer; padding: 0; margin: 0; transition: opacity 0.2s;" onmouseover="this.style.opacity=1" onmouseout="this.style.opacity=0.8">&times;</button>
        </div>
        <form method="post" action="submit_inquiry.php" id="modalBookingForm">
          <input type="hidden" name="contact-test" id="modalBookingTestName">
          <div class="modal-body" style="padding: 24px; font-family: 'Lexend', sans-serif;">
            <div style="margin-bottom: 18px;">
              <label class="form-label" style="font-weight: 700; color: #333; font-size: 14px; margin-bottom: 8px; display: block;">Selected Test</label>
              <div class="p-3 border rounded" style="background-color: #f8f9fa; border-radius: 8px; border: 1px solid #e2e8f0; font-weight: 700; color: var(--color-primary); font-size: 15px; display: flex; align-items: center; padding: 12px 15px;">
                <i class="fas fa-flask text-danger" style="font-size: 16px; margin-right: 8px;"></i>
                <span id="modalSelectedTestDisplay"></span>
              </div>
            </div>
            <div style="margin-bottom: 18px;">
              <label for="modal-contact-name" style="font-weight: 700; color: #555; font-size: 13px; margin-bottom: 6px; display: block;">Your Name *</label>
              <input type="text" class="form-control" name="contact-name" id="modal-contact-name" required placeholder="Enter your full name" style="height: 48px; border-radius: 6px; border: 1px solid #cbd5e1; font-size: 14px; padding: 10px 15px; width: 100%; display: block; background: #fff; box-sizing: border-box;">
            </div>
            <div style="margin-bottom: 18px;">
              <label for="modal-contact-city" style="font-weight: 700; color: #555; font-size: 13px; margin-bottom: 6px; display: block;">City *</label>
              <input type="text" class="form-control" name="contact-city" id="modal-contact-city" required placeholder="Enter your city" style="height: 48px; border-radius: 6px; border: 1px solid #cbd5e1; font-size: 14px; padding: 10px 15px; width: 100%; display: block; background: #fff; box-sizing: border-box;">
            </div>
            <div style="margin-bottom: 18px;">
              <label for="modal-contact-phone" style="font-weight: 700; color: #555; font-size: 13px; margin-bottom: 6px; display: block;">Phone Number *</label>
              <input type="text" class="form-control" name="contact-phone" id="modal-contact-phone" required placeholder="e.g., +91 98765 43210" style="height: 48px; border-radius: 6px; border: 1px solid #cbd5e1; font-size: 14px; padding: 10px 15px; width: 100%; display: block; background: #fff; box-sizing: border-box;">
            </div>
            <div style="margin-bottom: 18px;">
              <label for="modal-contact-doctor" style="font-weight: 700; color: #555; font-size: 13px; margin-bottom: 6px; display: block;">Reference Doctor Name</label>
              <input type="text" class="form-control" name="contact-doctor" id="modal-contact-doctor" placeholder="Enter reference doctor name (optional)" style="height: 48px; border-radius: 6px; border: 1px solid #cbd5e1; font-size: 14px; padding: 10px 15px; width: 100%; display: block; background: #fff; box-sizing: border-box;">
            </div>
            <div style="margin-bottom: 0;">
              <label for="modal-contact-message" style="font-weight: 700; color: #555; font-size: 13px; margin-bottom: 6px; display: block;">Additional Details / Address</label>
              <textarea class="form-control" name="contact-message" id="modal-contact-message" rows="4" placeholder="Enter collection address or additional details..." style="border-radius: 6px; border: 1px solid #cbd5e1; font-size: 14px; padding: 12px 15px; width: 100%; display: block; background: #fff; box-sizing: border-box; resize: vertical; min-height: 80px;"></textarea>
            </div>
          </div>
          <div class="modal-footer" style="background-color: #f8f9fa; border-top: 1px solid #edf2f7; padding: 15px 24px; display: flex; justify-content: flex-end; gap: 10px;">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="border-radius: 30px; font-weight: 700; padding: 10px 24px; font-family: 'Lexend', sans-serif; border: 1px solid #cbd5e1; background-color: #fff; color: #555; cursor: pointer;">Cancel</button>
            <button type="submit" class="btn btn-primary" style="border-radius: 30px; font-weight: 700; padding: 10px 28px; font-family: 'Lexend', sans-serif; background-color: var(--color-primary); border-color: var(--color-primary); color: #fff; cursor: pointer;">Confirm Booking</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <?php include 'includes/script.php'; ?>

  <script>
    function openBookingModal(event, testName) {
      if (event) {
        event.preventDefault();
      }
      
      var modalEl = document.getElementById('bookingModal');
      // Append modal to body dynamically to move it out of any stacking contexts/relative parents
      if (modalEl && modalEl.parentNode !== document.body) {
        document.body.appendChild(modalEl);
      }
      
      document.getElementById('modalBookingTestName').value = testName;
      document.getElementById('modalSelectedTestDisplay').textContent = testName;
      
      // Reset form
      document.getElementById('modalBookingForm').reset();
      
      // Try Bootstrap 5/4 modal trigger
      try {
        var myModal = bootstrap.Modal.getOrCreateInstance(modalEl) || new bootstrap.Modal(modalEl);
        myModal.show();
      } catch (e) {
        // Fallback for jQuery modal trigger
        if (typeof $ !== 'undefined') {
          $(modalEl).modal('show');
        } else {
          console.error("Could not load Bootstrap modal: ", e);
        }
      }
    }
  </script>
</body>

</html>
