<!-- =========================
        Header
    =========================== -->
    <header class="header header-layout1">
      <div class="header-topbar">
        <div class="container-fluid">
          <div class="row align-items-center">
            <div class="col-12">
              <div class="d-flex align-items-center justify-content-between">
                <ul class="contact-list d-flex flex-wrap align-items-center list-unstyled mb-0">
                  <li>
                    <i class="icon-location"></i><a href="#">Location: SUR NO. 151 2, DOWNTOWN BUILDING, MADHVANI ROAD, Porbandar, Gujarat, India - 360575</a>
                  </li>
                  <li>
                    <i class="icon-clock"></i><a href="contact-us.php">Mon - Fri: 8:00 am - 7:00 pm</a>
                  </li>
                </ul><!-- /.contact-list -->
                <div class="d-flex align-items-center">

                  <div class="miniPopup-language-area">
                    <button class="miniPopup-language-trigger" type="button">
                      <span id="selected-city-label">Select City</span><span class="btn-shape"></span>
                    </button>
                    <ul class="miniPopup miniPopup-language list-unstyled" style="min-width: 150px; padding: 10px; max-height: 300px; overflow-y: auto;">
                      <?php
                      if (isset($con)) {
                          $cityQuery = mysqli_query($con, "SELECT name FROM cities WHERE status = 1 ORDER BY name ASC");
                          if ($cityQuery && mysqli_num_rows($cityQuery) > 0) {
                              while ($cRow = mysqli_fetch_assoc($cityQuery)) {
                                  echo '<li><button class="city-select-btn" type="button" style="width:100%; text-align:left; border:0; background:transparent; padding:6px 12px; transition:background 0.2s;" onmouseover="this.style.backgroundColor=\'#f1f1f1\'" onmouseout="this.style.backgroundColor=\'transparent\'"><span>' . htmlspecialchars($cRow['name']) . '</span></button></li>';
                              }
                          } else {
                              echo '<li><span class="text-muted p-2 font-12">No cities active</span></li>';
                          }
                      } else {
                          $fallbackCities = ['Ahmedabad', 'Mumbai', 'Delhi', 'Bengaluru', 'Pune', 'Hyderabad', 'Chennai', 'Kolkata', 'Jaipur', 'Surat', 'Lucknow', 'Chandigarh'];
                          foreach ($fallbackCities as $fc) {
                              echo '<li><button class="city-select-btn" type="button" style="width:100%; text-align:left; border:0; background:transparent; padding:6px 12px; transition:background 0.2s;" onmouseover="this.style.backgroundColor=\'#f1f1f1\'" onmouseout="this.style.backgroundColor=\'transparent\'"><span>' . htmlspecialchars($fc) . '</span></button></li>';
                          }
                      }
                      ?>
                    </ul><!-- /.miniPopup-language -->
                  </div>
                  
                  <script>
                  document.addEventListener("DOMContentLoaded", function() {
                      // Get city from localStorage, default to Mumbai
                      var selectedCity = localStorage.getItem('selected_city') || 'Mumbai';
                      var label = document.getElementById('selected-city-label');
                      if (label) {
                          label.textContent = selectedCity;
                      }
                      // Set cookie
                      document.cookie = "selected_city=" + encodeURIComponent(selectedCity) + ";path=/;max-age=" + (30*24*60*60);
                      
                      // Handle click on city selector
                      var cityButtons = document.querySelectorAll('.city-select-btn');
                      cityButtons.forEach(function(btn) {
                          btn.addEventListener('click', function(e) {
                              e.preventDefault();
                              var cityName = this.querySelector('span').textContent.trim();
                              localStorage.setItem('selected_city', cityName);
                              document.cookie = "selected_city=" + encodeURIComponent(cityName) + ";path=/;max-age=" + (30*24*60*60);
                              if (label) {
                                  label.textContent = cityName;
                              }
                              window.location.reload();
                          });
                      });
                  });
                  </script>
                </div>
              </div>
            </div><!-- /.col-12 -->
          </div><!-- /.row -->
        </div><!-- /.container -->
      </div><!-- /.header-top -->
      <nav class="navbar navbar-expand-lg sticky-navbar">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php">
            <img src="assets/images/logo/logo-dark.png" class="logo-dark" alt="logo">
          </a>
          <button class="navbar-toggler" type="button">
            <span class="menu-lines"><span></span></span>
          </button>
          <div class="collapse navbar-collapse justify-content-center" id="mainNavigation">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a href="index.php" class="nav-item-link">Home</a>
              </li>
              <li class="nav-item">
                <a href="index.php#about" class="nav-item-link">About Us</a>
              </li>
              <li class="nav-item">
                <a href="tests.php" class="nav-item-link">Tests</a>
              </li>
              <li class="nav-item">
                <a href="contact-us.php" class="nav-item-link">Contact Us</a>
              </li>
            </ul><!-- /.navbar-nav -->
            <button class="close-mobile-menu d-block d-lg-none"><i class="fas fa-times"></i></button>
          </div><!-- /.navbar-collapse -->
          <div class="d-none d-xl-flex align-items-center position-relative ml-30">
            <a href="tests.php" class="btn btn-primary btn-contact">
              Book a Test
            </a>
          </div>
        </div><!-- /.container -->
      </nav><!-- /.navabr -->
    </header><!-- /.Header -->