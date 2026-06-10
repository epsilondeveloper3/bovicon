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
if (isset($_POST['save_test'])) {
    $id = intval($_POST['id'] ?? 0);
    $name = mysqli_real_escape_string($con, trim($_POST['name'] ?? ''));
    $preparation = mysqli_real_escape_string($con, trim($_POST['preparation'] ?? 'No special preparation required'));
    $frequency = mysqli_real_escape_string($con, trim($_POST['frequency'] ?? 'Daily'));
    $parameter_count = intval($_POST['parameter_count'] ?? 1);
    $parameters = mysqli_real_escape_string($con, trim($_POST['parameters'] ?? ''));
    $categories = mysqli_real_escape_string($con, trim($_POST['categories'] ?? 'General'));
    $price = floatval($_POST['price'] ?? 0.0);

    if ($name == "" || $price <= 0) {
        addAlert("Test Name and Price are required.", true);
        header("Location: tests.php");
        exit;
    }

    if ($id > 0) {
        mysqli_query($con, "UPDATE tests SET name='$name', preparation='$preparation', frequency='$frequency', parameter_count=$parameter_count, parameters='$parameters', price=$price, categories='$categories' WHERE id=$id");
        addAlert("Test updated successfully.");
    } else {
        mysqli_query($con, "INSERT INTO tests (name, preparation, frequency, parameter_count, parameters, price, categories) VALUES ('$name', '$preparation', '$frequency', $parameter_count, '$parameters', $price, '$categories')");
        addAlert("Test added successfully.");
    }

    header("Location: tests.php");
    exit;
}

// =============================
// DELETE
// =============================
if (isset($_GET['delete'])) {
    $deleteId = intval($_GET['delete']);
    if ($deleteId > 0) {
        mysqli_query($con, "DELETE FROM tests WHERE id=$deleteId");
        addAlert("Test deleted successfully.");
    }
    header("Location: tests.php");
    exit;
}

// =============================
// FETCH TESTS
// =============================
$testRes = mysqli_query($con, "SELECT * FROM tests ORDER BY id DESC");
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
                            <h6 class="mb-0">Tests List</h6>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#testModal" onclick="openAddModal()">
                                Add Test
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
                                            <th>Test Name</th>
                                            <th>Price</th>
                                            <th>Categories</th>
                                            <th>Preparation</th>
                                            <th>Frequency</th>
                                            <th>Parameters Covered</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        while ($row = mysqli_fetch_assoc($testRes)) { ?>
                                            <tr>
                                                <td><?= $i++ ?></td>
                                                <td><strong><?= htmlspecialchars($row['name']) ?></strong></td>
                                                <td><span class="text-success font-weight-bold">₹<?= number_format($row['price'], 2) ?></span></td>
                                                <td>
                                                    <?php
                                                    $cats = explode(", ", $row['categories'] ?? 'General');
                                                    foreach ($cats as $cat) {
                                                        echo '<span class="badge bg-info text-white me-1 mb-1">' . htmlspecialchars($cat) . '</span>';
                                                    }
                                                    ?>
                                                </td>
                                                <td><?= htmlspecialchars($row['preparation']) ?></td>
                                                <td><?= htmlspecialchars($row['frequency']) ?></td>
                                                <td>
                                                    <span class="badge bg-primary text-white me-1"><?= $row['parameter_count'] ?> parameter(s)</span>
                                                    <small class="text-muted d-block" style="max-height: 50px; overflow-y: auto; max-width: 200px;">
                                                        <?= str_replace("\n", ", ", htmlspecialchars($row['parameters'])) ?>
                                                    </small>
                                                </td>
                                                <td><?= formatDate($row['created_at']) ?></td>
                                                <td>
                                                    <button class="btn btn-success btn-sm" onclick="openEditModal(
                                                        <?= $row['id'] ?>,
                                                        '<?= htmlspecialchars($row['name'], ENT_QUOTES) ?>',
                                                        '<?= htmlspecialchars($row['preparation'], ENT_QUOTES) ?>',
                                                        '<?= htmlspecialchars($row['frequency'], ENT_QUOTES) ?>',
                                                        <?= $row['parameter_count'] ?>,
                                                        `<?= htmlspecialchars($row['parameters'], ENT_QUOTES) ?>`,
                                                        <?= $row['price'] ?>,
                                                        '<?= htmlspecialchars($row['categories'] ?? 'General', ENT_QUOTES) ?>'
                                                    )">
                                                        <i class="bx bx-edit-alt"></i>
                                                    </button>

                                                    <a href="tests.php?delete=<?= $row['id'] ?>"
                                                        onclick="return confirm('Are you sure you want to delete this test?')" class="btn btn-danger btn-sm">
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
    <div class="modal fade" id="testModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="modalTitle">Add Test</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <form method="post">
                    <input type="hidden" name="id" id="testId">

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-5 mb-3">
                                <label class="form-label">Test Name</label>
                                <input type="text" name="name" id="testName" class="form-control" required placeholder="e.g. COMPLETE BLOOD COUNT;CBC">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Categories (comma-separated)</label>
                                <input type="text" name="categories" id="testCategories" class="form-control" required placeholder="e.g. Clinical Path & Special Chemistry">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Price (INR)</label>
                                <input type="number" step="0.01" name="price" id="testPrice" class="form-control" required placeholder="e.g. 390.00">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Preparation</label>
                                <input type="text" name="preparation" id="testPreparation" class="form-control" placeholder="e.g. No special preparation required">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Frequency</label>
                                <input type="text" name="frequency" id="testFrequency" class="form-control" placeholder="e.g. Daily">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Parameter Count</label>
                                <input type="number" name="parameter_count" id="testParameterCount" class="form-control" required placeholder="e.g. 15">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Covered Parameters (One per line)</label>
                            <textarea name="parameters" id="testParameters" class="form-control" rows="6" placeholder="Hemoglobin&#10;Total Leucocyte Count (TLC)&#10;Platelet Count"></textarea>
                            <small class="text-muted">Enter individual parameter names separated by a new line. These will display in the accordion/dropdown on the site.</small>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="save_test" class="btn btn-primary">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <?php include('include/footer-script.php') ?>

    <script>
        function openAddModal() {
            $("#modalTitle").text("Add Test");
            $("#testId").val("");
            $("#testName").val("");
            $("#testCategories").val("General");
            $("#testPreparation").val("No special preparation required");
            $("#testFrequency").val("Daily");
            $("#testParameterCount").val("1");
            $("#testParameters").val("");
            $("#testPrice").val("");
        }

        function openEditModal(id, name, preparation, frequency, paramCount, parameters, price, categories) {
            $("#modalTitle").text("Edit Test");
            $("#testId").val(id);
            $("#testName").val(name);
            $("#testCategories").val(categories);
            $("#testPreparation").val(preparation);
            $("#testFrequency").val(frequency);
            $("#testParameterCount").val(paramCount);
            $("#testParameters").val(parameters);
            $("#testPrice").val(price);
            $("#testModal").modal("show");
        }
    </script>

</body>

</html>
