<?php
include('include/config.php');

if (!function_exists('addAlert')) {
    function addAlert($msg, $isError = false) {
        $_SESSION['alert_msg'] = ($_SESSION['alert_msg'] ?? '') . "<div class='".($isError ? "msg_error" : "msg_success")."'>".$msg."</div>";
    }
}

// =========================
//   ADD STATE
// =========================
if (isset($_POST['action']) && $_POST['action'] === "add") {
    $name = mysqli_real_escape_string($con, trim($_POST['name'] ?? ''));
    $countryId = intval($_POST['countyId'] ?? 0);

    if ($name !== "" && $countryId > 0) {
        $sql = "INSERT INTO state (countyId, name) VALUES ($countryId, '$name')";
        mysqli_query($con, $sql);
        addAlert("State added successfully.");
        echo "added";
    } else {
        addAlert("State name and country are required.", true);
        echo "error";
    }
    exit;
}

// =========================
//   UPDATE STATE
// =========================
if (isset($_POST['action']) && $_POST['action'] === "update") {
    $id = intval($_POST['id'] ?? 0);
    $name = mysqli_real_escape_string($con, trim($_POST['name'] ?? ''));
    $countryId = intval($_POST['countyId'] ?? 0);

    if ($id > 0 && $name !== "" && $countryId > 0) {
        $sql = "UPDATE state SET name='$name', countyId=$countryId WHERE id=$id";
        mysqli_query($con, $sql);
        addAlert("State updated successfully.");
        echo "updated";
    } else {
        addAlert("State update failed. Please check inputs.", true);
        echo "error";
    }
    exit;
}

// =========================
//   DELETE STATE
// =========================
if (isset($_POST['action']) && $_POST['action'] === "delete") {
    $id = intval($_POST['id'] ?? 0);
    if ($id > 0) {
        $sql = "DELETE FROM state WHERE id=$id";
        mysqli_query($con, $sql);
        addAlert("State deleted successfully.");
        echo "deleted";
    } else {
        addAlert("State delete failed. Invalid reference.", true);
        echo "error";
    }
    exit;
}

// fetch countries for dropdowns
$countryList = $qm->getRecord("county", "*", "", "ORDER BY name ASC");

// fetch states list
$states = $qm->customQuery("SELECT s.*, c.name AS country_name FROM state s LEFT JOIN county c ON c.id = s.countyId ORDER BY s.id DESC");
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <?php include('include/head.php')?>    
</head>

<body>
    <!-- Preloader -->
    <?php include('include/loder.php')?>
    <!-- /Preloader -->

    <!-- Choose Layout -->
    <?php include('include/navbar.php')?>

    <!-- ======================================
    ******* Page Wrapper Area Start **********
    ======================================= -->
    <div class="flapt-page-wrapper">
        <!-- Sidemenu Area -->
        <?php include('include/sidebar.php')?>

        <!-- Page Content -->
        <div class="flapt-page-content">
            <!-- Top Header Area -->
            <?php include('include/header.php')?>

            <!-- Main Content Area -->
            <div class="main-content">
                <div class="content-wraper-area">
                    <div class="data-table-area">
                        <div class="container-fluid">
                            <div class="row g-4">

                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header-cu d-flex align-items-center justify-content-between">
                                            <h6 class="mb-0">State List</h6>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#addStateModal">Add State</button>
                                        </div>
                                        <div class="card-body">
                                            <?php include('include/alert_msg.php');?>
                                            <?php $rowIndex = 0; ?>
                                            <div class="table-responsive">
                                                <table id="selection-datatable" class="table table-striped table-bordered dt-responsive nowrap w-100">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>State Name</th>
                                                        <th>Country</th>
                                                        <th>Created At</th>
                                                        <th>Updated At</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php while($row = mysqli_fetch_assoc($states)){ $rowIndex++;?>
                                                <tr id="row_<?php echo $row['id']; ?>">
                                                    <td><?php echo $rowIndex; ?></td>
                                                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                                                    <td><?php echo htmlspecialchars($row['country_name'] ?? "-"); ?></td>
                                                    <td><?php echo formatDate($row['created_at']); ?></td>
                                                    <td><?php echo formatDate($row['updated_at']); ?></td>
                                                    <td>
                                                        <button class="btn btn-success btn"
                                                            onclick="openEditModal(<?= $row['id'] ?>, '<?= htmlspecialchars($row['name'], ENT_QUOTES) ?>', <?= intval($row['countyId']) ?>)">
                                                            <i class="bx bx-edit-alt"></i>
                                                        </button>
                                                        <button class="btn btn-danger btn"
                                                            onclick="openDeleteModal(<?= $row['id'] ?>)">
                                                            <i class="bx bx-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                    <?php } ?>
                                                </tbody>
                                                </table>
                                            </div>

                                        </div> <!-- end card body-->
                                    </div> <!-- end card -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Add State Modal -->
                <div class="modal fade" id="addStateModal" tabindex="-1" aria-labelledby="addStateLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5>Add State</h5>
                                <button class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <select id="addStateCountry" class="form-control mb-3">
                                    <option value="">Select Country</option>
                                    <?php while($country = mysqli_fetch_assoc($countryList)) { ?>
                                        <option value="<?php echo $country['id']; ?>"><?php echo htmlspecialchars($country['name']); ?></option>
                                    <?php } ?>
                                </select>
                                <input type="text" id="addStateName" class="form-control"
                                       placeholder="Enter state name">
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button class="btn btn-primary" onclick="saveState()">Save</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Edit Modal -->
                <div class="modal fade" id="editModal" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5>Edit State</h5>
                                <button class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" id="editId">
                                <select id="editStateCountry" class="form-control mb-3">
                                    <option value="">Select Country</option>
                                    <?php
                                        $countryListForEdit = $qm->getRecord("county", "*", "", "ORDER BY name ASC");
                                        while($country = mysqli_fetch_assoc($countryListForEdit)) { ?>
                                            <option value="<?php echo $country['id']; ?>"><?php echo htmlspecialchars($country['name']); ?></option>
                                    <?php } ?>
                                </select>
                                <input type="text" id="editStateName" class="form-control">
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button class="btn btn-primary" onclick="updateState()">Update</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Delete Confirm Modal -->
                <div class="modal fade" id="deleteModal" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5>Delete State</h5>
                                <button class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure you want to delete this state?</p>
                                <input type="hidden" id="deleteId">
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button class="btn btn-danger" onclick="deleteState()">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer Area -->
                <?php include('include/footer.php') ?>
            </div>
        </div>
    </div>

    <!-- ======================================
    ********* Page Wrapper Area End ***********
    ======================================= -->

    <?php include('include/footer-script.php') ?>

    <!-- ========================== -->
    <!--     CRUD JAVASCRIPT        -->
    <!-- ========================== -->
    <script>
        // ADD
        function saveState() {
            let name = $("#addStateName").val();
            let countryId = $("#addStateCountry").val();
            $.post("state.php", { action: "add", name: name, countyId: countryId }, function () {
                location.reload();
            });
        }

        // OPEN EDIT MODAL
        function openEditModal(id, name, countryId) {
            $("#editId").val(id);
            $("#editStateName").val(name);
            $("#editStateCountry").val(countryId);
            $("#editModal").modal("show");
        }

        // UPDATE
        function updateState() {
            let id = $("#editId").val();
            let name = $("#editStateName").val();
            let countryId = $("#editStateCountry").val();
            $.post("state.php", { action: "update", id: id, name: name, countyId: countryId }, function () {
                location.reload();
            });
        }

        // OPEN DELETE MODAL
        function openDeleteModal(id) {
            $("#deleteId").val(id);
            $("#deleteModal").modal("show");
        }

        // DELETE
        function deleteState() {
            let id = $("#deleteId").val();
            $.post("state.php", { action: "delete", id: id }, function () {
                $("#row_" + id).remove();
                $("#deleteModal").modal("hide");
            });
        }
    </script>

</body>

</html>

