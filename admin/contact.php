<?php
include('include/config.php');

// =============================
// ALERT FUNCTION
// =============================
if (!function_exists('addAlert')) {
    function addAlert($msg, $isError = false)
    {
        $_SESSION['alert_msg'] = ($_SESSION['alert_msg'] ?? '') .
            "<div class='" . ($isError ? "msg_error" : "msg_success") . "'>" . $msg . "</div>";
    }
}

// =============================
// DELETE
// =============================
if (isset($_GET['delete'])) {
    $deleteId = intval($_GET['delete']);
    if ($deleteId > 0) {
        $deleteQuery = "DELETE FROM inquiries WHERE id=$deleteId";
        if (mysqli_query($con, $deleteQuery)) {
            addAlert("Inquiry deleted successfully.");
        } else {
            addAlert("Failed to delete inquiry: " . mysqli_error($con), true);
        }
    }
    header("Location: contact.php");
    exit;
}

// =============================
// FETCH INQUIRIES
// =============================
$inquiryRes = mysqli_query($con, "SELECT * FROM inquiries ORDER BY id DESC");
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <?php include('include/head.php') ?>
    <style>
        .badge-demo {
            background-color: #ee7355; /* Coral Orange */
            color: #ffffff;
        }
        .badge-booking {
            background-color: #008081; /* Teal */
            color: #ffffff;
        }
        .contact-details p {
            margin: 0;
            font-size: 13px;
        }
        .contact-details a {
            color: inherit;
        }
        .contact-details a:hover {
            text-decoration: underline;
        }
        .msg-preview {
            max-width: 250px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            display: inline-block;
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <!-- Preloader -->
    <?php include('include/loder.php') ?>
    <!-- /Preloader -->

    <!-- Choose Layout -->
    <?php include('include/navbar.php') ?>

    <!-- ======================================
    ******* Page Wrapper Area Start **********
    ======================================= -->
    <div class="flapt-page-wrapper">
        <!-- Sidemenu Area -->
        <?php include('include/sidebar.php') ?>

        <!-- Page Content -->
        <div class="flapt-page-content">
            <!-- Top Header Area -->
            <?php include('include/header.php') ?>

            <!-- Main Content Area -->
            <div class="main-content">
                <div class="container-fluid">
                    <div class="row g-4">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body card-breadcrumb">
                                    <div class="page-title-box d-flex align-items-center justify-content-between">
                                        <h4 class="mb-0">Contact Inquiries</h4>
                                        <div class="page-title-right">
                                            <ol class="breadcrumb m-0">
                                                <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                                <li class="breadcrumb-item active">Inquiries</li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="card">
                                <div class="card-header-cu d-flex align-items-center justify-content-between">
                                    <h6 class="mb-0">Inquiries List</h6>
                                </div>

                                <div class="card-body">
                                    <!-- ALERT MSG -->
                                    <?php include('include/alert_msg.php'); ?>

                                    <table id="selection-datatable"
                                        class="table table-striped table-bordered dt-responsive nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Customer Name</th>
                                                <th>Contact Info</th>
                                                <th>Inquiry Type</th>
                                                <th>Requested Test</th>
                                                <th>Message</th>
                                                <th>Received Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $i = 1;
                                            while ($row = mysqli_fetch_assoc($inquiryRes)) { 
                                                $typeLabel = ($row['type'] === 'booking') ? 'Test Booking' : 'Book a Demo';
                                                $badgeClass = ($row['type'] === 'booking') ? 'badge-booking' : 'badge-demo';
                                                $testName = !empty($row['test_name']) ? htmlspecialchars($row['test_name']) : '-';
                                                $msgRaw = $row['message'] ?? '';
                                                $msgEscaped = htmlspecialchars($msgRaw, ENT_QUOTES);
                                            ?>
                                                <tr>
                                                    <td><?= $i++ ?></td>
                                                    <td class="text-start fw-bold">
                                                        <?= htmlspecialchars($row['name']) ?>
                                                        <?php if (!empty($row['doctor_name'])): ?>
                                                            <div class="text-muted font-11 fw-normal mt-1" style="font-size: 11px;"><i class="bx bx-user-voice text-secondary"></i> Ref: Dr. <?= htmlspecialchars($row['doctor_name']) ?></div>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td class="text-start contact-details">
                                                        <?php if (!empty($row['email'])): ?>
                                                            <p><i class="bx bx-envelope text-primary"></i> <a href="mailto:<?= htmlspecialchars($row['email']) ?>"><?= htmlspecialchars($row['email']) ?></a></p>
                                                        <?php endif; ?>
                                                        <?php if (!empty($row['city'])): ?>
                                                            <p><i class="bx bx-map text-warning"></i> <span><?= htmlspecialchars($row['city']) ?></span></p>
                                                        <?php endif; ?>
                                                        <p><i class="bx bx-phone text-success"></i> <a href="tel:<?= htmlspecialchars($row['phone']) ?>"><?= htmlspecialchars($row['phone']) ?></a></p>
                                                    </td>
                                                    <td>
                                                        <span class="badge <?= $badgeClass ?>"><?= $typeLabel ?></span>
                                                    </td>
                                                    <td class="text-start text-wrap" style="max-width: 200px;">
                                                        <?php if ($row['type'] === 'booking') { ?>
                                                            <span class="badge bg-light text-dark text-wrap border"><i class="bx bx-flask text-danger me-1"></i><?= $testName ?></span>
                                                        <?php } else { ?>
                                                            <span class="text-muted">-</span>
                                                        <?php } ?>
                                                    </td>
                                                    <td class="text-start">
                                                        <?php if (!empty($msgRaw)) { ?>
                                                            <span class="msg-preview text-muted"><?= htmlspecialchars(mb_strimwidth($msgRaw, 0, 50, '...')) ?></span>
                                                        <?php } else { ?>
                                                            <span class="text-muted">No message</span>
                                                        <?php } ?>
                                                        <button class="btn btn-outline-primary btn-sm ms-1 py-0 px-2" 
                                                                onclick="viewInquiryDetail(
                                                                    '<?= htmlspecialchars($row['name'], ENT_QUOTES) ?>',
                                                                    '<?= htmlspecialchars($row['email'] ?? '', ENT_QUOTES) ?>',
                                                                    '<?= htmlspecialchars($row['phone'], ENT_QUOTES) ?>',
                                                                    '<?= $row['type'] ?>',
                                                                    '<?= htmlspecialchars($testName, ENT_QUOTES) ?>',
                                                                    `<?= $msgEscaped ?>`,
                                                                    '<?= formatDate($row['created_at']) ?>',
                                                                    '<?= htmlspecialchars($row['city'] ?? '', ENT_QUOTES) ?>',
                                                                    '<?= htmlspecialchars($row['doctor_name'] ?? '', ENT_QUOTES) ?>'
                                                                )">
                                                            <i class="bx bx-show-alt"></i>
                                                        </button>
                                                    </td>
                                                    <td><?= formatDate($row['created_at']) ?></td>
                                                    <td>
                                                        <a href="contact.php?delete=<?= $row['id'] ?>"
                                                           onclick="return confirm('Are you sure you want to delete this inquiry?')" 
                                                           class="btn btn-danger btn-sm">
                                                            <i class="bx bx-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer Area -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <?php include('include/footer.php') ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ======================================
    ********* Page Wrapper Area End ***********
    ======================================= -->

    <!-- INQUIRY VIEW DETAIL MODAL -->
    <div class="modal fade" id="inquiryDetailModal" tabindex="-1" aria-labelledby="inquiryDetailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h5 class="modal-title" id="inquiryDetailModalLabel">Inquiry Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label text-muted mb-0">Customer Name</label>
                            <p class="fw-bold fs-5 mb-3" id="modalCustName"></p>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-muted mb-0">Submission Date</label>
                            <p class="fs-6 mb-3" id="modalSubDate"></p>
                        </div>
                        <hr class="mt-0">
                        <div class="col-md-6" id="modalEmailContainer">
                            <label class="form-label text-muted mb-0">Email Address</label>
                            <p class="mb-3"><i class="bx bx-envelope me-1 text-primary"></i><a href="" id="modalCustEmail"></a></p>
                        </div>
                        <div class="col-md-6" id="modalCityContainer">
                            <label class="form-label text-muted mb-0">City</label>
                            <p class="mb-3"><i class="bx bx-map me-1 text-warning"></i><span id="modalCustCity"></span></p>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-muted mb-0">Phone Number</label>
                            <p class="mb-3"><i class="bx bx-phone me-1 text-success"></i><a href="" id="modalCustPhone"></a></p>
                        </div>
                        <div class="col-md-6" id="modalDoctorContainer">
                            <label class="form-label text-muted mb-0">Reference Doctor Name</label>
                            <p class="mb-3"><i class="bx bx-user me-1 text-info"></i><span id="modalCustDoctor"></span></p>
                        </div>
                        <hr class="mt-0">
                        <div class="col-md-6">
                            <label class="form-label text-muted mb-0">Inquiry Type</label>
                            <div>
                                <span class="badge" id="modalInquiryType"></span>
                            </div>
                        </div>
                        <div class="col-md-6" id="modalTestNameContainer">
                            <label class="form-label text-muted mb-0">Requested Test / Package</label>
                            <p class="fw-bold text-danger mb-3"><i class="bx bx-flask me-1"></i><span id="modalTestName"></span></p>
                        </div>
                        <hr class="mt-0">
                        <div class="col-12">
                            <label class="form-label text-muted mb-0">Customer Message</label>
                            <div class="bg-light p-3 border rounded mt-1" style="white-space: pre-wrap; min-height: 100px; max-height: 300px; overflow-y: auto;" id="modalCustMessage"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="" id="modalReplyBtn" class="btn btn-primary"><i class="bx bx-reply me-1"></i>Reply via Email</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Must needed plugins to run this Template -->
    <?php include('include/footer-script.php') ?>

    <script>
        function viewInquiryDetail(name, email, phone, type, testName, message, date, city, doctorName) {
            $("#modalCustName").text(name);
            $("#modalSubDate").text(date);
            
            if (email && email.trim() !== '') {
                $("#modalEmailContainer").show();
                $("#modalCustEmail").text(email).attr("href", "mailto:" + email);
                $("#modalReplyBtn").show().attr("href", "mailto:" + email + "?subject=Re: BOVICAN Inquiry");
            } else {
                $("#modalEmailContainer").hide();
                $("#modalReplyBtn").hide();
            }
            
            if (city && city.trim() !== '') {
                $("#modalCityContainer").show();
                $("#modalCustCity").text(city);
            } else {
                $("#modalCityContainer").hide();
            }
            
            if (doctorName && doctorName.trim() !== '') {
                $("#modalDoctorContainer").show();
                $("#modalCustDoctor").text(doctorName);
            } else {
                $("#modalDoctorContainer").hide();
            }
            
            $("#modalCustPhone").text(phone).attr("href", "tel:" + phone);
            
            // Set type badge
            var typeBadge = $("#modalInquiryType");
            typeBadge.removeClass("badge-booking badge-demo");
            if (type === 'booking') {
                typeBadge.text("Test Booking").addClass("badge-booking");
                $("#modalTestNameContainer").show();
                $("#modalTestName").text(testName);
            } else {
                typeBadge.text("Book a Demo").addClass("badge-demo");
                $("#modalTestNameContainer").hide();
            }
            
            $("#modalCustMessage").text(message || 'No message provided.');
            
            // Show modal
            var modal = new bootstrap.Modal(document.getElementById('inquiryDetailModal'));
            modal.show();
        }
    </script>

</body>

</html>