<?php
include('include/config.php');

$errors = [];

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
// ADD / UPDATE
// =============================
if (isset($_POST['save_service'])) {
    $id = intval($_POST['id'] ?? 0);
    $title = mysqli_real_escape_string($con, trim($_POST['title'] ?? ''));
    $icon = mysqli_real_escape_string($con, trim($_POST['icon'] ?? 'icon-microscope'));
    $description = mysqli_real_escape_string($con, trim($_POST['description'] ?? ''));
    $features = mysqli_real_escape_string($con, trim($_POST['features'] ?? ''));

    if ($title == "" || $description == "") {
        addAlert("Title and Description are required.", true);
        header("Location: services.php");
        exit;
    }

    if ($id > 0) {
        mysqli_query($con, "UPDATE services SET title='$title', icon='$icon', description='$description', features='$features' WHERE id=$id");
        addAlert("Service updated successfully.");
    } else {
        mysqli_query($con, "INSERT INTO services (title, icon, description, features) VALUES ('$title', '$icon', '$description', '$features')");
        addAlert("Service added successfully.");
    }

    header("Location: services.php");
    exit;
}

// =============================
// DELETE
// =============================
if (isset($_GET['delete'])) {
    $deleteId = intval($_GET['delete']);
    if ($deleteId > 0) {
        mysqli_query($con, "DELETE FROM services WHERE id=$deleteId");
        addAlert("Service deleted successfully.");
    }
    header("Location: services.php");
    exit;
}

// =============================
// FETCH SERVICES
// =============================
$serviceRes = mysqli_query($con, "SELECT * FROM services ORDER BY id DESC");
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <?php include('include/head.php') ?>
</head>

<body>

    <?php include('include/loder.php') ?>
    <?php include('include/navbar.php') ?>

    <div class="flapt-page-wrapper">
        <?php include('include/sidebar.php') ?>

        <div class="flapt-page-content">
            <?php include('include/header.php') ?>

            <div class="main-content">
                <div class="container-fluid">

                    <div class="card">
                        <div class="card-header-cu d-flex align-items-center justify-content-between">
                            <h6 class="mb-0">Services List</h6>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#serviceModal" onclick="openAddModal()">
                                Add Service
                            </button>
                        </div>

                        <div class="card-body">

                            <!-- ALERT MSG -->
                            <?php include('include/alert_msg.php'); ?>

                            <div class="table-responsive">
                                <table id="selection-datatable"
                                    class="table table-striped table-bordered dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Icon</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Features</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        while ($row = mysqli_fetch_assoc($serviceRes)) { ?>
                                            <tr>
                                                <td><?= $i++ ?></td>
                                                <td><i class="<?= htmlspecialchars($row['icon']) ?> font-20 text-primary"></i> <small class="text-muted d-block"><?= htmlspecialchars($row['icon']) ?></small></td>
                                                <td><strong><?= htmlspecialchars($row['title']) ?></strong></td>
                                                <td><?= htmlspecialchars(substr($row['description'], 0, 80)) . (strlen($row['description']) > 80 ? '...' : '') ?></td>
                                                <td>
                                                    <?php
                                                    $feats = explode("\n", str_replace("\r", "", $row['features']));
                                                    foreach($feats as $f) {
                                                        if (trim($f) !== '') {
                                                            echo '<span class="badge bg-info text-white me-1 mb-1">' . htmlspecialchars(trim($f)) . '</span>';
                                                        }
                                                    }
                                                    ?>
                                                </td>
                                                <td><?= formatDate($row['created_at']) ?></td>
                                                <td>
                                                    <button class="btn btn-success btn-sm" onclick="openEditModal(
                                <?= $row['id'] ?>,
                                '<?= htmlspecialchars($row['title'], ENT_QUOTES) ?>',
                                '<?= htmlspecialchars($row['icon'], ENT_QUOTES) ?>',
                                '<?= htmlspecialchars($row['description'], ENT_QUOTES) ?>',
                                `<?= htmlspecialchars($row['features'], ENT_QUOTES) ?>`
                            )">
                                                        <i class="bx bx-edit-alt"></i>
                                                    </button>

                                                    <a href="services.php?delete=<?= $row['id'] ?>"
                                                        onclick="return confirm('Are you sure you want to delete this service?')" class="btn btn-danger btn-sm">
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
        </div>
    </div>

    <!-- MODAL -->
    <div class="modal fade" id="serviceModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="modalTitle">Add Service</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <form method="post">
                    <input type="hidden" name="id" id="serviceId">

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Service Title</label>
                                <input type="text" name="title" id="serviceTitle" class="form-control" required placeholder="e.g. General Diagnostic Tests">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Icon Class</label>
                                <input type="text" name="icon" id="serviceIcon" class="form-control" required placeholder="e.g. icon-microscope">
                                <small class="text-muted">Available: icon-microscope, icon-dna-structure, icon-florence-flask, icon-mortar, icon-atom, icon-molecule2</small>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" id="serviceDescription" class="form-control" rows="4" required placeholder="Enter service description..."></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Features / Parameters Checked (One per line)</label>
                            <textarea name="features" id="serviceFeatures" class="form-control" rows="5" placeholder="Gastrointestinal Health&#10;Immunological Disorders&#10;Cardiovascular Health"></textarea>
                            <small class="text-muted">Enter each feature/parameter on a new line. These will display as bullet points.</small>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="save_service" class="btn btn-primary">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <?php include('include/footer-script.php') ?>

    <script>
        function openAddModal() {
            $("#modalTitle").text("Add Service");
            $("#serviceId").val("");
            $("#serviceTitle").val("");
            $("#serviceIcon").val("icon-microscope");
            $("#serviceDescription").val("");
            $("#serviceFeatures").val("");
        }

        function openEditModal(id, title, icon, description, features) {
            $("#modalTitle").text("Edit Service");
            $("#serviceId").val(id);
            $("#serviceTitle").val(title);
            $("#serviceIcon").val(icon);
            $("#serviceDescription").val(description);
            $("#serviceFeatures").val(features);
            $("#serviceModal").modal("show");
        }
    </script>

</body>

</html>
