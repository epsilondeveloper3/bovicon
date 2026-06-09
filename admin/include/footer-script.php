<script>
setTimeout(function() {
    $(".msg_success").hide();
    $(".msg_error").hide();
}, 6000);
</script>

<!-- Must needed plugins to the run this Template -->
<script src="js/jquery.min.js"></script>

<!-- select2  for select multiple from dropdown -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<!-- date range picker -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<!-- time picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js">
</script>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/default-assets/setting.js"></script>
    <script src="js/default-assets/scrool-bar.js"></script>
    <script src="js/todo-list.js"></script>

    <!-- Active JS -->
    <script src="js/default-assets/active.js"></script>

<script>
// Auto-hide alert toasts after a short delay
(function() {
    const alerts = document.querySelectorAll('.msg_success, .msg_error');
    if (!alerts.length) return;
    setTimeout(() => {
        alerts.forEach(el => {
            el.style.transition = 'opacity 0.4s ease, margin 0.4s ease, padding 0.4s ease';
            el.style.opacity = '0';
            el.style.margin = '0';
            el.style.padding = '0';
            setTimeout(() => el.remove(), 450);
        });
    }, 3000);
})();
</script>
    <!-- These plugins only need for the run this page -->
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap5.min.js"></script>
    <script src="js/dataTables.responsive.min.js"></script>
    <script src="js/dataTables.buttons.min.js"></script>
    <script src="js/buttons.print.min.js"></script>
    <script src="js/pdfmake.min.js"></script>
    <script src="js/vfs_fonts.js"></script>
    <script src="js/jszip.min.js"></script>
    <script src="js/dataTables-custom.js"></script>
    
    <!-- DataTables Responsive CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">
    
    <!-- Enhanced Responsive DataTables Initialization -->
    <script>
    $(document).ready(function() {
        // Override existing DataTables initialization for responsive tables
        if (typeof $.fn.DataTable !== 'undefined') {
            // Wait a bit for existing initialization
            setTimeout(function() {
                // Re-initialize all selection-datatable tables with responsive
                $('table#selection-datatable').each(function() {
                    var $table = $(this);
                    if ($.fn.DataTable.isDataTable($table)) {
                        $table.DataTable().destroy();
                    }
                    
                    $table.DataTable({
                        responsive: true,
                        columnDefs: [
                            { responsivePriority: 1, targets: 0 }, // # column
                            { responsivePriority: 2, targets: 1 }, // Name/First important column
                            { responsivePriority: 3, targets: -1 } // Action column (last)
                        ],
                        select: {
                            style: 'multi'
                        },
                        language: {
                            paginate: {
                                previous: "<i class='bx bx-chevron-left'></i>",
                                next: "<i class='bx bx-chevron-right'></i>"
                            }
                        },
                        drawCallback: function() {
                            $(".dataTables_paginate > .pagination").addClass("pagination-rounded");
                        },
                        pageLength: 10,
                        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]]
                    });
                });
                
                $(".dataTables_length select").addClass("form-select form-select-sm");
            }, 200);
        }
    });
    </script>

<!-- for loader -->
<script> 
    function hideLoader() {
        $('.page-loader').fadeOut('slow');
    }
</script>

<style>
td {
    text-align: center;
    vertical-align: middle;
    padding: 5px !important;
}

.pls-cls {
    padding-left: 40px !important;
}

table.dataTable.dtr-inline.collapsed>tbody>tr[role="row"]>td:first-child:before,
table.dataTable.dtr-inline.collapsed>tbody>tr[role="row"]>th:first-child:before {
    position: absolute;
    vertical-align: middle;
    background-color: #ffab11;
    height: 14px;
    width: 14px;
    line-height: 14px;
    top: 50%;
    left: 10px;
    margin-top: -7px;
    content: "+";
    color: white;
    text-align: center;
    border-radius: 2px;
    box-shadow: 0 0 3px #444;
}

table.dataTable thead .sorting {
    background: none;
}

table.dataTable thead .sorting_desc {
    background: none !important;
}

table.dataTable thead .sorting_asc {
    background: none !important;
}

.child ul {
    margin: 5px 0 !important;
    padding: 0 !important;
    border-radius: 0 !important;
    box-shadow: none !important;
    width: 100% !important;
    list-style: none !important;
}

.child ul li {
    display: flex !important;
    flex-direction: row !important;
    justify-content: space-between !important;
    align-items: center !important;
    width: 100% !important;
    padding: 10px 15px !important;
    margin-bottom: 5px !important;
    background: #fdfdfd !important;
    border: 1px solid #eee !important;
    border-radius: 8px !important;
}

.dtr-title {
    font-weight: 700 !important;
    color: #333 !important;
    margin-right: 15px !important;
}

.dtr-data {
    text-align: right !important;
    flex: 1 !important;
}
.course-description-card{
    box-shadow: rgba(0, 0, 0, 0.08) 0px 2px 8px !important;
    padding : 5px 0px;
    border-radius : 10px;
}
.course-description-card ul {
    display: block; 
    width: 100% !important; 
    box-shadow: none !important;
    margin: 0px !important;
    padding: 7px 10px !important;
    list-style: inside !important;
}

.course-description-card ul li {
    display : block;
    width: 100% !important; 
    list-style: inside !important;
}

.dtr-title::after {
  content: " : ";
}

/* Responsive Table Styles */
@media screen and (max-width: 768px) {
    .data-table-area {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }
    
    .card-body {
        padding: 0.75rem;
    }
    
    table.dataTable {
        font-size: 0.875rem;
    }
    
    table.dataTable thead th,
    table.dataTable tbody td {
        padding: 0.5rem 0.25rem !important;
        white-space: nowrap;
    }
    
    .btn-sm {
        padding: 0.2rem 0.4rem;
        font-size: 0.75rem;
    }
    
    /* Responsive child row styling */
    table.dataTable.dtr-inline.collapsed > tbody > tr > td.child,
    table.dataTable.dtr-inline.collapsed > tbody > tr > th.child,
    table.dataTable.dtr-inline.collapsed > tbody > tr > td.dataTables_empty {
        padding: 0.5rem 1rem;
    }
    
    table.dataTable.dtr-inline.collapsed > tbody > tr[role="row"] > td:first-child:before {
        left: 8px;
        top: 50%;
        transform: translateY(-50%);
    }
    
    /* Action buttons in responsive mode */
    .dtr-details li {
        display: flex !important;
        flex-direction: row !important;
        justify-content: space-between !important;
        align-items: center !important;
        padding: 12px 15px !important;
        margin-bottom: 8px !important;
        background: #fcfcfc !important;
        border: 1px solid #eee !important;
        border-radius: 10px !important;
        width: 100% !important;
    }
    
    .dtr-title {
        font-weight: 700 !important;
        color: #333 !important;
    }

    .dtr-details .btn {
        margin: 0.1rem;
        display: inline-block;
    }
    
    /* Action column styling for mobile */
    table.dataTable tbody td:last-child {
        white-space: normal;
    }
    
    table.dataTable tbody td:last-child .btn-sm {
        margin: 0.1rem;
        padding: 0.25rem 0.4rem;
    }
    
    table.dataTable tbody td:last-child .form-switch {
        margin: 0.25rem 0;
        display: block;
    }
}

/* Ensure table container is responsive */
.data-table-area .table-responsive {
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
}

/* Better mobile table display */
@media screen and (max-width: 576px) {
    .data-table-area {
        padding: 0;
    }
    
    .card {
        margin: 0.5rem;
        border-radius: 0.5rem;
    }
    
    .card-body {
        padding: 0.5rem;
    }
    
    /* Responsive modals */
    .modal-xl {
        max-width: 95%;
        margin: 0.5rem auto;
    }
    
    .modal-dialog {
        margin: 0.5rem;
    }
    
    .modal-content {
        border-radius: 0.5rem;
    }
    
    .modal-body {
        padding: 0.75rem;
    }
    
    /* Responsive form elements */
    .row.g-2 > [class*="col-"] {
        margin-bottom: 0.5rem;
    }
    
    .nav-tabs {
        flex-wrap: wrap;
    }
    
    .nav-tabs .nav-item {
        margin-bottom: 0.25rem;
    }
    
    .nav-tabs .nav-link {
        padding: 0.5rem 0.75rem;
        font-size: 0.875rem;
    }
}

@media screen and (max-width: 576px) {
    .card-header-cu {
        flex-direction: column;
        align-items: flex-start !important;
    }
    
    .card-header-cu .btn {
        margin-top: 0.5rem;
        width: 100%;
    }
    
    table.dataTable {
        font-size: 0.8rem;
    }
    
    .dataTables_wrapper .dataTables_length,
    .dataTables_wrapper .dataTables_filter {
        margin-bottom: 0.5rem;
    }
    
    .dataTables_wrapper .dataTables_length select,
    .dataTables_wrapper .dataTables_filter input {
        width: 100%;
        margin: 0.25rem 0;
    }
}
</style>