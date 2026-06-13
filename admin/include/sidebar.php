<?php
// Detect current page to set active menu item
$current_page = basename($_SERVER['PHP_SELF']);

// Return class="active" if current page matches any in $pages
function activeClass($pages, $className = 'active')
{
  global $current_page;
  if (!is_array($pages)) {
    $pages = [$pages];
  }
  return in_array($current_page, $pages) ? ' ' . $className : '';
}
?>

<div class="flapt-sidemenu-wrapper">
  <!-- Desktop Logo -->
  <div class="flapt-logo">
    <a href="dashboard.php"><img class="desktop-logo" src="img/core-img/logo.png" alt="Desktop Logo"> <img
        class="small-logo" src="img/core-img/small-logo.png" alt="Mobile Logo"></a>
  </div>

  <!-- Side Nav -->
  <div class="flapt-sidenav" id="flaptSideNav" >
    <!-- Side Menu Area -->
    <div class="side-menu-area">
      <!-- Sidebar Menu -->
      <nav>
        <ul class="sidebar-menu" data-widget="tree">

          <li class="<?php echo trim(activeClass('dashboard.php')); ?>">
            <a href="dashboard.php"><i class='bx bx-home-heart'></i>
              <span>Dashboard</span>
            </a>
          </li>
          
          <li class="<?php echo trim(activeClass('services.php')); ?>">
            <a href="services.php"><i class='bx bx-briefcase'></i>
              <span>Services</span>
            </a>
          </li>

          <li class="<?php echo trim(activeClass('tests.php')); ?>">
            <a href="tests.php"><i class='bx bx-book'></i>
              <span>Tests</span>
            </a>
          </li>

          <li class="<?php echo trim(activeClass('city.php')); ?>">
            <a href="city.php"><i class='bx bx-building'></i>
              <span>Cities</span>
            </a>
          </li>

          <li class="<?php echo trim(activeClass('contact.php')); ?>">
            <a href="contact.php"><i class='bx bx-envelope'></i>
              <span>Inquiries</span>
            </a>
          </li>

          <li class="<?php echo trim(activeClass('testimonials.php')); ?>">
            <a href="testimonials.php"><i class='bx bx-message-square-detail'></i>
              <span>Testimonials</span>
            </a>
          </li>

          <li class="<?php echo trim(activeClass('faqs.php')); ?>">
            <a href="faqs.php"><i class='bx bx-help-circle'></i>
              <span>FAQs</span>
            </a>
          </li>

          <li class="<?php echo trim(activeClass('privacy-policy.php')); ?>">
            <a href="privacy-policy.php"><i class='bx bx-shield-quarter'></i>
              <span>Privacy Policy</span>
            </a>
          </li>
          <li>
            <a href="logout.php"><i class='bx bx-power-off'></i>
              <span>Logout</span>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</div>