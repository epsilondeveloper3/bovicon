
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Title -->
    <title>BOVICAN Admin Panel</title>
    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.png">
    <!-- Plugins File -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/themify-icons/0.1.2/css/themify-icons.min.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <!-- Icon Fonts -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/default-assets/themify-icons.css">
    <link rel="stylesheet" href="style.css">
    <!-- Boxicons CDN link to ensure all icons display correctly -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <!-- DataTables styles -->
    <link rel="stylesheet" href="css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" href="css/select.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- Select2 Searchable Dropdown -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .select2-container--default .select2-selection--single {
            height: 38px !important;
            border: 1px solid #ced4da !important;
            border-radius: 4px !important;
        }
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 36px !important;
            padding-left: 12px !important;
            color: #495057 !important;
        }
        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 36px !important;
        }
        .select2-container {
            width: 100% !important;
            display: block;
        }
        .select2-dropdown {
            border: 1px solid #ced4da !important;
            z-index: 1060 !important;
        }

        /* BOVICAN Custom Premium Color Theme overrides */
        :root {
            --color-primary: #0A4F8A; /* Sapphire Blue */
            --color-secondary: #FF8E25; /* Warm Orange */
        }

        /* Sidebar Wrapper Background color */
        .flapt-sidemenu-wrapper {
            background-color: var(--color-primary) !important;
        }
        
        /* Logo Area Background color */
        .flapt-logo {
            background-color: #073b67 !important; /* Slightly darker blue for contrast */
            border-bottom: 1px solid rgba(255, 255, 255, 0.08) !important;
        }

        /* Sidebar Menu items typography & spacing */
        .sidebar-menu li a {
            font-family: 'Lexend', sans-serif !important;
            font-size: 14px !important;
            color: rgba(255, 255, 255, 0.8) !important;
            border-left: 3px solid transparent !important;
            padding: 14px 20px !important;
            transition: all 0.25s ease !important;
        }
        
        /* Hover and Active Menu Item */
        .sidebar-menu li a:hover {
            color: #ffffff !important;
            background-color: rgba(255, 255, 255, 0.08) !important;
            border-left: 3px solid var(--color-secondary) !important;
        }
        .sidebar-menu li.active > a {
            color: #ffffff !important;
            background-color: var(--color-secondary) !important;
            border-left: 3px solid var(--color-secondary) !important;
            font-weight: 700 !important;
            box-shadow: 0 4px 12px rgba(255, 142, 37, 0.2) !important;
        }

        /* Sidebar icons color */
        .sidebar-menu li a i {
            color: rgba(255, 255, 255, 0.7) !important;
            margin-right: 12px !important;
            font-size: 18px !important;
            transition: color 0.25s ease !important;
        }
        .sidebar-menu li a:hover i,
        .sidebar-menu li.active > a i {
            color: #ffffff !important;
        }

        /* Header controls */
        .top-header-area {
            border-bottom: 1px solid #ebebeb !important;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.02) !important;
        }
        #menuCollasped i, #mobileMenuOpen i, #rightSideTrigger i {
            color: var(--color-primary) !important;
            font-size: 24px !important;
        }
        
        /* Top-bar search icons and focus state */
        .app-search span {
            color: var(--color-primary) !important;
        }
        .app-search .form-control:focus {
            border-color: var(--color-primary) !important;
        }

        /* Card Table Headers */
        .card-header-cu {
            background-color: var(--color-primary) !important;
            color: #ffffff !important;
            border-bottom: none !important;
            border-radius: 8px 8px 0 0 !important;
            padding: 16px 24px !important;
        }
        .card-header-cu h6 {
            color: #ffffff !important;
            font-family: 'Lexend', sans-serif !important;
            font-weight: 700 !important;
            font-size: 16px !important;
            margin-bottom: 0 !important;
        }

        /* Custom Cards */
        .card {
            border: 1px solid #eaeaea !important;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.02) !important;
            border-radius: 8px !important;
        }

        /* Primary Buttons color */
        .btn-primary {
            background-color: var(--color-primary) !important;
            border-color: var(--color-primary) !important;
            font-family: 'Lexend', sans-serif !important;
            font-weight: 700 !important;
            padding: 8px 20px !important;
            border-radius: 30px !important;
            transition: all 0.25s ease !important;
        }
        .btn-primary:hover, .btn-primary:focus, .btn-primary:active {
            background-color: var(--color-secondary) !important;
            border-color: var(--color-secondary) !important;
            box-shadow: 0 4px 12px rgba(255, 142, 37, 0.2) !important;
        }

        /* Green success buttons (like edit) */
        .btn-success {
            background-color: #2e7d32 !important;
            border-color: #2e7d32 !important;
            transition: all 0.25s ease !important;
        }
        .btn-success:hover {
            background-color: #1b5e20 !important;
            border-color: #1b5e20 !important;
        }

        /* Info Badge overrides (category badges in list) */
        .badge.bg-info {
            background-color: var(--color-secondary) !important;
            color: #ffffff !important;
            font-size: 11px !important;
            font-weight: 500 !important;
            padding: 4px 8px !important;
            border-radius: 20px !important;
        }
        
        /* Primary Badge overrides */
        .badge.bg-primary {
            background-color: var(--color-primary) !important;
            color: #ffffff !important;
            font-size: 11px !important;
            font-weight: 500 !important;
            padding: 4px 8px !important;
            border-radius: 20px !important;
        }

        /* DataTable active page item */
        .page-item.active .page-link {
            background-color: var(--color-primary) !important;
            border-color: var(--color-primary) !important;
            color: #ffffff !important;
        }
        
        /* Table hover row */
        .table-hover tbody tr:hover {
            background-color: #f8fafd !important;
        }

        /* Focus state for form fields */
        .form-control:focus {
            border-color: var(--color-primary) !important;
            box-shadow: 0 0 0 0.2rem rgba(10, 79, 138, 0.15) !important;
        }

        /* Checkbox & radio button primary theme overrides */
        .form-check-input:checked {
            background-color: var(--color-primary) !important;
            border-color: var(--color-primary) !important;
        }

        /* Override any remaining template highlights to match brand colors */
        .text-primary, .page-link {
            color: var(--color-primary) !important;
        }
        .bg-primary {
            background-color: var(--color-primary) !important;
        }
        .badge.bg-success {
            background-color: #2e7d32 !important;
        }
    </style>