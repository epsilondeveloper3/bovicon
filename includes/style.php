<link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;700&family=Roboto:wght@400;700&display=swap">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
  <link rel="stylesheet" href="assets/css/libraries.css">
  <link rel="stylesheet" href="assets/css/style.css">


<style>
  :root {
    --color-primary: #008081 !important;
    --color-secondary: #ee7355 !important;
    --color-primary-rgb: 0, 128, 129 !important;
    --color-secondary-rgb: 238, 115, 85 !important;
    --bs-primary: #008081 !important;
    --bs-secondary: #ee7355 !important;
  }

  /* Make slider fully responsive and prevent vertical clipping on any screen size */
  .slider .slide-item {
    height: auto !important;
    min-height: 550px !important;
    padding: 120px 0 !important;
    display: flex !important;
    align-items: center !important;
  }
  
  @media (max-width: 991px) {
    .slider .slide-item {
      padding: 100px 0 !important;
      min-height: 480px !important;
    }
    .slider .slide-title {
      font-size: 38px !important;
      line-height: 1.2 !important;
    }
    .slider .slide-desc {
      font-size: 15px !important;
      line-height: 1.4 !important;
    }
  }

  @media (max-width: 575px) {
    .slider .slide-item {
      padding: 80px 0 !important;
      min-height: 400px !important;
    }
    .slider .slide-title {
      font-size: 28px !important;
      line-height: 1.2 !important;
    }
  }

  /* Heading typography and color consistency overrides */
  .heading-subtitle {
    color: var(--color-secondary) !important;
  }
  .heading-title {
    color: var(--color-primary) !important;
    font-family: 'Lexend', sans-serif !important;
    font-weight: 700 !important;
  }

  /* Header Topbar and Navigation adjust */
  .header-topbar {
    background-color: var(--color-primary) !important;
  }
  .header-topbar .contact-list li > i {
    color: #ffffff !important; /* Header icons white */
  }
  .footer .contact-icon {
    color: #ffffff !important; /* Footer contact icons white */
  }
  .navbar .nav-item .nav-item-link {
    color: var(--color-primary) !important;
  }
  .navbar .nav-item .nav-item-link.active, 
  .navbar .nav-item .nav-item-link:hover {
    color: var(--color-secondary) !important;
  }

  /* Global Heading accent override to Sapphire Blue */
  :root {
    --color-accent: var(--color-primary) !important;
  }

  /* Custom Card designs for About Page to resolve 0-padding spacing issues */
  .bovicon-about-card {
    background: #ffffff !important;
    border-radius: 16px !important;
    padding: 45px 40px !important;
    height: 100% !important;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.03) !important;
    border: 1px solid rgba(234, 234, 234, 0.8) !important;
    transition: all 0.35s cubic-bezier(0.25, 0.8, 0.25, 1) !important;
    display: flex !important;
    flex-direction: column !important;
    align-items: flex-start !important;
    position: relative !important;
    overflow: visible !important;
  }
  .bovicon-about-card.card-primary {
    border-top: 5px solid var(--color-primary) !important;
  }
  .bovicon-about-card.card-secondary {
    border-top: 5px solid var(--color-secondary) !important;
  }
  .bovicon-about-card:hover {
    transform: translateY(-6px) !important;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1) !important;
  }

  .bovicon-value-card {
    background: #ffffff !important;
    border: 1px solid rgba(234, 234, 234, 0.8) !important;
    border-radius: 16px !important;
    padding: 35px 25px !important;
    height: 100% !important;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.02) !important;
    transition: all 0.35s cubic-bezier(0.25, 0.8, 0.25, 1) !important;
    display: flex !important;
    flex-direction: column !important;
    align-items: center !important;
    text-align: center !important;
  }
  .bovicon-value-card:hover {
    transform: translateY(-6px) !important;
    box-shadow: 0 20px 40px rgba(var(--color-primary-rgb), 0.06) !important;
    border-color: rgba(var(--color-primary-rgb), 0.2) !important;
  }
  .bovicon-value-card .bovicon-value-icon {
    transition: all 0.3s ease !important;
  }
  .bovicon-value-card:hover .bovicon-value-icon {
    background-color: var(--color-secondary) !important;
    transform: scale(1.05) !important;
  }
  .bovicon-value-card h4 {
    color: var(--color-primary) !important;
    transition: all 0.3s ease !important;
    margin-bottom: 12px !important;
  }
  .bovicon-value-card:hover h4 {
    color: var(--color-secondary) !important;
  }

  /* 5-Column Grid System Utility for Core Values */
  .col-lg-2-5 {
    position: relative;
    width: 100%;
    padding-right: 15px;
    padding-left: 15px;
    flex: 0 0 20%;
    max-width: 20%;
  }
  @media (max-width: 991px) {
    .col-lg-2-5 {
      flex: 0 0 33.333% !important;
      max-width: 33.333% !important;
    }
  }
  @media (max-width: 767px) {
    .col-lg-2-5 {
      flex: 0 0 50% !important;
      max-width: 50% !important;
    }
  }
  @media (max-width: 479px) {
    .col-lg-2-5 {
      flex: 0 0 100% !important;
      max-width: 100% !important;
  }

  /* Footer logo-wise color alignment overrides */
  .footer .footer-primary {
    background-color: #004041 !important; /* Premium Dark Teal matching logo primary color */
  }
  .footer .footer-secondary:after {
    background-color: var(--color-secondary) !important; /* Premium Coral Orange matching logo secondary color */
  }
</style>
