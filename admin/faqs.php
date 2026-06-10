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
if (isset($_POST['save_faq'])) {
    $id = intval($_POST['id'] ?? 0);
    $question = mysqli_real_escape_string($con, trim($_POST['question'] ?? ''));
    $answer = mysqli_real_escape_string($con, trim($_POST['answer'] ?? ''));
    $status = isset($_POST['status']) ? intval($_POST['status']) : 1;

    if ($question == "" || $answer == "") {
        addAlert("Question and Answer are required.", true);
        header("Location: faqs.php");
        exit;
    }

    if ($id > 0) {
        mysqli_query($con, "UPDATE faqs SET question='$question', answer='$answer', status=$status WHERE id=$id");
        addAlert("FAQ updated successfully.");
    } else {
        mysqli_query($con, "INSERT INTO faqs (question, answer, status) VALUES ('$question', '$answer', $status)");
        addAlert("FAQ added successfully.");
    }

    header("Location: faqs.php");
    exit;
}

// =============================
// DELETE
// =============================
if (isset($_GET['delete'])) {
    $deleteId = intval($_GET['delete']);
    if ($deleteId > 0) {
        mysqli_query($con, "DELETE FROM faqs WHERE id=$deleteId");
        addAlert("FAQ deleted successfully.");
    }
    header("Location: faqs.php");
    exit;
}

// =============================
// FETCH FAQS
// =============================
$faqsRes = mysqli_query($con, "SELECT * FROM faqs ORDER BY id DESC");
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
                            <h6 class="mb-0">FAQs List</h6>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#faqModal" onclick="openAddModal()">
                                Add FAQ
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
                                            <th>Question</th>
                                            <th>Answer</th>
                                            <th>Status</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        while ($row = mysqli_fetch_assoc($faqsRes)) { ?>
                                            <tr>
                                                <td><?= $i++ ?></td>
                                                <td><strong><?= htmlspecialchars($row['question']) ?></strong></td>
                                                <td><?= htmlspecialchars(substr($row['answer'], 0, 100)) . (strlen($row['answer']) > 100 ? '...' : '') ?></td>
                                                <td>
                                                    <?php if($row['status'] == 1) { ?>
                                                        <span class="badge bg-success">Active</span>
                                                    <?php } else { ?>
                                                        <span class="badge bg-secondary">Inactive</span>
                                                    <?php } ?>
                                                </td>
                                                <td><?= formatDate($row['created_at']) ?></td>
                                                <td>
                                                    <button class="btn btn-success btn-sm" onclick="openEditModal(
                                                        <?= $row['id'] ?>,
                                                        '<?= htmlspecialchars($row['question'], ENT_QUOTES) ?>',
                                                        `<?= htmlspecialchars($row['answer'], ENT_QUOTES) ?>`,
                                                        <?= $row['status'] ?>
                                                    )">
                                                        <i class="bx bx-edit-alt"></i>
                                                    </button>

                                                    <a href="faqs.php?delete=<?= $row['id'] ?>"
                                                        onclick="return confirm('Are you sure you want to delete this FAQ?')" class="btn btn-danger btn-sm">
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
    <div class="modal fade" id="faqModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="modalTitle">Add FAQ</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <form method="post">
                    <input type="hidden" name="id" id="faqId">

                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Question</label>
                            <input type="text" name="question" id="faqQuestion" class="form-control" required placeholder="e.g. What is the typical turnaround time (TAT) for reports?">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Answer</label>
                            <textarea name="answer" id="faqAnswer" class="form-control" rows="6" required placeholder="Enter answer text..."></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select name="status" id="faqStatus" class="form-control" style="height: 38px;">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="save_faq" class="btn btn-primary">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <?php include('include/footer-script.php') ?>

    <script>
        function openAddModal() {
            $("#modalTitle").text("Add FAQ");
            $("#faqId").val("");
            $("#faqQuestion").val("");
            $("#faqAnswer").val("");
            $("#faqStatus").val("1");
        }

        function openEditModal(id, question, answer, status) {
            $("#modalTitle").text("Edit FAQ");
            $("#faqId").val(id);
            $("#faqQuestion").val(question);
            $("#faqAnswer").val(answer);
            $("#faqStatus").val(status);
            $("#faqModal").modal("show");
        }
    </script>

</body>

</html>
