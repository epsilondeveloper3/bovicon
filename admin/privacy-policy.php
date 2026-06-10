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
// UPDATE PRIVACY POLICY
// =============================
if (isset($_POST['save_policy'])) {
    $content = mysqli_real_escape_string($con, trim($_POST['content'] ?? ''));
    $title = mysqli_real_escape_string($con, trim($_POST['title'] ?? 'Privacy Policy'));

    if ($content == "") {
        addAlert("Privacy Policy content cannot be empty.", true);
    } else {
        $updateQ = "UPDATE pages SET title='$title', content='$content' WHERE slug='privacy-policy'";
        if (mysqli_query($con, $updateQ)) {
            addAlert("Privacy Policy updated successfully.");
        } else {
            addAlert("Failed to update Privacy Policy: " . mysqli_error($con), true);
        }
    }
    header("Location: privacy-policy.php");
    exit;
}

// =============================
// FETCH CURRENT PRIVACY POLICY
// =============================
$policyRes = mysqli_query($con, "SELECT * FROM pages WHERE slug='privacy-policy'");
$policy = mysqli_fetch_assoc($policyRes);

if (!$policy) {
    // Fallback if not seeded
    $policy = [
        'title' => 'Privacy Policy',
        'content' => '<p>Default Privacy Policy content goes here...</p>'
    ];
}
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
                            <h6 class="mb-0">Edit Privacy Policy Page</h6>
                        </div>

                        <div class="card-body">

                            <!-- ALERT MSG -->
                            <?php include('include/alert_msg.php'); ?>

                            <form method="post" action="privacy-policy.php">
                                <div class="mb-4">
                                    <label class="form-label" style="font-family: 'Lexend', sans-serif; font-weight: 700; color: var(--color-primary);">Page Title</label>
                                    <input type="text" name="title" class="form-control" value="<?= htmlspecialchars($policy['title']) ?>" required style="max-width: 400px;">
                                </div>

                                <div class="mb-4">
                                    <label class="form-label" style="font-family: 'Lexend', sans-serif; font-weight: 700; color: var(--color-primary);">Page HTML Content</label>
                                    <textarea name="content" class="form-control" rows="18" required style="font-family: monospace; font-size: 14px; line-height: 1.5; padding: 15px; border-radius: 6px;"><?= htmlspecialchars($policy['content']) ?></textarea>
                                    <small class="text-muted d-block mt-2">You can use standard HTML elements like &lt;p&gt;, &lt;h4&gt;, &lt;ul&gt;, &lt;li&gt;, and &lt;strong&gt; to style the Privacy Policy sections.</small>
                                </div>

                                <div class="text-end">
                                    <button type="submit" name="save_policy" class="btn btn-primary px-4">
                                        <i class="bx bx-save me-1"></i> Save Privacy Policy
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <?php include('include/footer-script.php') ?>

</body>

</html>
