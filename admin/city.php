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
if (isset($_POST['save_city'])) {
    $id = intval($_POST['id'] ?? 0);
    $name = mysqli_real_escape_string($con, trim($_POST['name'] ?? ''));
    $status = isset($_POST['status']) ? intval($_POST['status']) : 1;

    if ($name == "") {
        addAlert("City name is required.", true);
        header("Location: city.php");
        exit;
    }

    if ($id > 0) {
        mysqli_query($con, "UPDATE cities SET name='$name', status='$status' WHERE id=$id");
        addAlert("City updated successfully.");
    } else {
        mysqli_query($con, "INSERT INTO cities (name, status) VALUES ('$name','$status')");
        addAlert("City added successfully.");
    }

    header("Location: city.php");
    exit;
}

// =============================
// DELETE
// =============================
if (isset($_GET['delete'])) {
    $deleteId = intval($_GET['delete']);
    if ($deleteId > 0) {
        mysqli_query($con, "DELETE FROM cities WHERE id=$deleteId");
        addAlert("City deleted successfully.");
    }
    header("Location: city.php");
    exit;
}

// =============================
// FETCH CITIES
// =============================
$cityRes = mysqli_query($con, "SELECT * FROM cities ORDER BY id DESC");
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
                            <h6 class="mb-0">City List</h6>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#cityModal" onclick="openAddModal()">
                                Add City
                            </button>
                        </div>

                        <div class="card-body">

                            <!-- ALERT MSG -->
                            <?php include('include/alert_msg.php'); ?>

                            <table id="selection-datatable"
                                class="table table-striped table-bordered dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>City Name</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    while ($row = mysqli_fetch_assoc($cityRes)) { ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= htmlspecialchars($row['name']) ?></td>
                                            <td>
                                                <?php if($row['status'] == 1) { ?>
                                                    <span class="badge bg-success">Active</span>
                                                <?php } else { ?>
                                                    <span class="badge bg-secondary">Inactive</span>
                                                <?php } ?>
                                            </td>
                                            <td><?= formatDate($row['created_at']) ?></td>
                                            <td><?= formatDate($row['updated_at']) ?></td>
                                            <td>
                                                <button class="btn btn-success btn-sm" onclick="openEditModal(
                            <?= $row['id'] ?>,
                            '<?= htmlspecialchars($row['name'], ENT_QUOTES) ?>',
                            <?= $row['status'] ?>
                        )">
                                                    <i class="bx bx-edit-alt"></i>
                                                </button>

                                                <a href="city.php?delete=<?= $row['id'] ?>"
                                                    onclick="return confirm('Are you sure you want to delete this city?')" class="btn btn-danger btn-sm">
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

    <!-- MODAL -->
    <div class="modal fade" id="cityModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="modalTitle">Add City</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <form method="post">
                    <input type="hidden" name="id" id="cityId">

                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">City Name</label>
                            <input type="text" name="name" id="cityName" class="form-control" required placeholder="e.g. Ahmedabad">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select name="status" id="cityStatus" class="form-control">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="save_city" class="btn btn-primary">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <?php include('include/footer-script.php') ?>

    <script>
        function openAddModal() {
            $("#modalTitle").text("Add City");
            $("#cityId").val("");
            $("#cityName").val("");
            $("#cityStatus").val("1");
        }

        function openEditModal(id, name, status) {
            $("#modalTitle").text("Edit City");
            $("#cityId").val(id);
            $("#cityName").val(name);
            $("#cityStatus").val(status);
            $("#cityModal").modal("show");
        }
    </script>

</body>

</html>