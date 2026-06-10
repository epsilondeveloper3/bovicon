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
if (isset($_POST['save_testimonial'])) {
    $id = intval($_POST['id'] ?? 0);
    $name = mysqli_real_escape_string($con, trim($_POST['name'] ?? ''));
    $designation = mysqli_real_escape_string($con, trim($_POST['designation'] ?? ''));
    $avatar = mysqli_real_escape_string($con, trim($_POST['avatar'] ?? ''));
    $text = mysqli_real_escape_string($con, trim($_POST['text'] ?? ''));

    if ($name == "" || $designation == "" || $text == "") {
        addAlert("Name, Designation, and Testimonial text are required.", true);
        header("Location: testimonials.php");
        exit;
    }

    // Default avatar to initials if empty
    if ($avatar == "") {
        $words = explode(" ", $name);
        $avatar = "";
        foreach ($words as $w) {
            $avatar .= strtoupper(substr($w, 0, 1));
        }
        $avatar = substr($avatar, 0, 3);
    }

    if ($id > 0) {
        mysqli_query($con, "UPDATE testimonials SET name='$name', designation='$designation', avatar='$avatar', text='$text' WHERE id=$id");
        addAlert("Testimonial updated successfully.");
    } else {
        mysqli_query($con, "INSERT INTO testimonials (name, designation, avatar, text) VALUES ('$name', '$designation', '$avatar', '$text')");
        addAlert("Testimonial added successfully.");
    }

    header("Location: testimonials.php");
    exit;
}

// =============================
// DELETE
// =============================
if (isset($_GET['delete'])) {
    $deleteId = intval($_GET['delete']);
    if ($deleteId > 0) {
        mysqli_query($con, "DELETE FROM testimonials WHERE id=$deleteId");
        addAlert("Testimonial deleted successfully.");
    }
    header("Location: testimonials.php");
    exit;
}

// =============================
// FETCH TESTIMONIALS
// =============================
$testimonialsRes = mysqli_query($con, "SELECT * FROM testimonials ORDER BY id DESC");
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
                            <h6 class="mb-0">Testimonials List</h6>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#testimonialModal" onclick="openAddModal()">
                                Add Testimonial
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
                                            <th>Avatar Initials</th>
                                            <th>Client Name</th>
                                            <th>Designation</th>
                                            <th>Testimonial Text</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        while ($row = mysqli_fetch_assoc($testimonialsRes)) { ?>
                                            <tr>
                                                <td><?= $i++ ?></td>
                                                <td>
                                                    <div style="width: 38px; height: 38px; border-radius: 50%; background-color: rgba(0, 128, 129, 0.1); color: var(--color-primary); font-weight: 700; font-size: 14px; display: flex; align-items: center; justify-content: center; border: 1px solid rgba(0, 128, 129, 0.2);">
                                                        <?= htmlspecialchars($row['avatar']) ?>
                                                    </div>
                                                </td>
                                                <td><strong><?= htmlspecialchars($row['name']) ?></strong></td>
                                                <td><?= htmlspecialchars($row['designation']) ?></td>
                                                <td><?= htmlspecialchars(substr($row['text'], 0, 100)) . (strlen($row['text']) > 100 ? '...' : '') ?></td>
                                                <td><?= formatDate($row['created_at']) ?></td>
                                                <td>
                                                    <button class="btn btn-success btn-sm" onclick="openEditModal(
                                                        <?= $row['id'] ?>,
                                                        '<?= htmlspecialchars($row['name'], ENT_QUOTES) ?>',
                                                        '<?= htmlspecialchars($row['designation'], ENT_QUOTES) ?>',
                                                        '<?= htmlspecialchars($row['avatar'], ENT_QUOTES) ?>',
                                                        `<?= htmlspecialchars($row['text'], ENT_QUOTES) ?>`
                                                    )">
                                                        <i class="bx bx-edit-alt"></i>
                                                    </button>

                                                    <a href="testimonials.php?delete=<?= $row['id'] ?>"
                                                        onclick="return confirm('Are you sure you want to delete this testimonial?')" class="btn btn-danger btn-sm">
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
    <div class="modal fade" id="testimonialModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="modalTitle">Add Testimonial</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <form method="post">
                    <input type="hidden" name="id" id="testimonialId">

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Client Name</label>
                                <input type="text" name="name" id="clientName" class="form-control" required placeholder="e.g. Dr. Ramesh Patel">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Designation / Role</label>
                                <input type="text" name="designation" id="clientDesignation" class="form-control" required placeholder="e.g. Senior Veterinarian, VetClinic">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Avatar Initials (Optional)</label>
                            <input type="text" name="avatar" id="clientAvatar" class="form-control" maxlength="3" placeholder="e.g. RP (Will auto-generate from name if left empty)">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Testimonial Text</label>
                            <textarea name="text" id="testimonialText" class="form-control" rows="5" required placeholder="Enter feedback/review text..."></textarea>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="save_testimonial" class="btn btn-primary">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <?php include('include/footer-script.php') ?>

    <script>
        function openAddModal() {
            $("#modalTitle").text("Add Testimonial");
            $("#testimonialId").val("");
            $("#clientName").val("");
            $("#clientDesignation").val("");
            $("#clientAvatar").val("");
            $("#testimonialText").val("");
        }

        function openEditModal(id, name, designation, avatar, text) {
            $("#modalTitle").text("Edit Testimonial");
            $("#testimonialId").val(id);
            $("#clientName").val(name);
            $("#clientDesignation").val(designation);
            $("#clientAvatar").val(avatar);
            $("#testimonialText").val(text);
            $("#testimonialModal").modal("show");
        }
    </script>

</body>

</html>
