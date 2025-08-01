<?php
include('../../controller/session/session-checker-owner.php');

if ($DefaultLanguage == '') {
    include('../../lang/english.php');
} else {
    include('../../lang/' . $DefaultLanguage . '.php');
}

$page = $_GET['page'] ?? ($_POST['page'] ?? 'list');
$id = $_GET['id'] ?? ($_POST['id'] ?? null);
$ajax = isset($_GET['ajax']) || isset($_POST['ajax']);

if ($page === 'detail' && $ajax && $id) {
    // Show notification detail (AJAX)
    $userID = isset($UserID) ? $UserID : '';
    $userType = isset($UType) ? $UType : '';
    $sql = "SELECT * FROM notifications WHERE NotificationID = '" . mysqli_real_escape_string($link, $id) . "' AND UserID = '" . mysqli_real_escape_string($link, $userID) . "' AND UserType = '" . mysqli_real_escape_string($link, $userType) . "' LIMIT 1";
    $result = mysqli_query($link, $sql);
    if ($result && $row = mysqli_fetch_assoc($result)) {
        echo '<div style="min-width:0;">';
        echo '<div class="notif-fb-avatar mb-3" style="margin:0 auto;"><i class="bx bxs-bell"></i></div>';
        echo '<div class="notif-fb-desc" style="font-size:1.1rem;font-weight:600;">' . htmlspecialchars($row['Description']) . '</div>';
        echo '<div class="notif-fb-date mb-3">' . htmlspecialchars($row['DateandTime']) . '</div>';
        if (!empty($row['ExtraData'])) {
            echo '<div class="mb-2">' . nl2br(htmlspecialchars($row['ExtraData'])) . '</div>';
        }
        echo '</div>';
    } else {
        echo '<div class="text-danger text-center py-4">Notification not found.</div>';
    }
    exit;
}
if ($page === 'mark_read' && $ajax && $id) {
    // Mark notification as read (AJAX)
    $userID = isset($UserID) ? $UserID : '';
    $userType = isset($UType) ? $UType : '';
    $sql = "UPDATE notifications SET ViewStatus = 1 WHERE NotificationID = '" . mysqli_real_escape_string($link, $id) . "' AND UserID = '" . mysqli_real_escape_string($link, $userID) . "' AND UserType = '" . mysqli_real_escape_string($link, $userType) . "'";
    $ok = mysqli_query($link, $sql);
    echo json_encode(['success' => $ok]);
    exit;
}

?>




<?php

    $userID = isset($UserID) ? $UserID : '';
    $userType = isset($UType) ? $UType : '';
    $notifications = [];
    if ($userID && $userType) {
        $sql = "SELECT NotificationID, Description, ViewStatus, DateandTime FROM notifications WHERE UserID = '$userID' AND UserType = '$userType' ORDER BY DateandTime DESC";
        $result = mysqli_query($link, $sql);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $notifications[] = $row;
            }
        }
    }
    function groupNotificationsByDate($notifications) {
        $groups = ['Today' => [], 'Earlier' => []];
        $today = date('Y-m-d');
        foreach ($notifications as $n) {
            $date = substr($n['DateandTime'], 0, 10);
            if ($date === $today) {
                $groups['Today'][] = $n;
            } else {
                $groups['Earlier'][] = $n;
            }
        }
        return $groups;
    }
    $grouped = groupNotificationsByDate($notifications);
    // Pagination setup
    $perPage = 20;
    $pageNum = isset($_GET['notif_page']) ? max(1, intval($_GET['notif_page'])) : 1;
    $start = ($pageNum - 1) * $perPage;
    // Flatten grouped notifications for pagination
    $flatNotifications = [];
    foreach ($grouped as $label => $group) {
        foreach ($group as $n) {
            $n['__group'] = $label;
            $flatNotifications[] = $n;
        }
    }
    $totalNotifications = count($flatNotifications);
    $paginated = array_slice($flatNotifications, 0, $start + $perPage);
    // Regroup paginated notifications
    $paginatedGrouped = ['Today' => [], 'Earlier' => []];
    foreach ($paginated as $n) {
        $paginatedGrouped[$n['__group']][] = $n;
    }
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="EduMESS" />
    <meta name="description"
        content="EduMESS (Education Management and E-Learning Software Solution) is a leading school management, automation and elearning solution." />
    <meta name="keywords"
        content="Best, School, Management, Best School, Best School Management, Best School Management Software, Free School Management Software, Portal, School Owner, Group of School Owner, Consultants, Brand Promoters | School Portal Generator">
    <title>EduMESS - Notification</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="../../assets/images/website_images/favicon.png" type="image/x-icon">
    <link rel="icon" href="../../assets/images/website_images/favicon.png" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="152x152" href="../../assets/images/website_images/favicon.png">
    <link rel="apple-touch-icon" sizes="120x120" href="../../assets/images/website_images/favicon.png">
    <link rel="apple-touch-icon" sizes="76x76" href="../../assets/images/website_images/favicon.png">
    <link rel="apple-touch-icon" href="../../assets/images/website_images/favicon.png">

    <!-- Core CSS -->
    <link href="../../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="../../css/app_css/appStyle.css">

    <!-- <script src="../../css/app_css/tailwind.16"></script> -->

    <link href="../../assets/plugins/notify/wnoty.css" rel="stylesheet">
    <script src="../../assets/plugins/sweetalert2@11.js"></script>


     <style>
                /* body {
                    background: #f0f2f5;
                    font-family: 'Inter', sans-serif;
                } */
                .notif-center-container {
                    max-width: 800px;
                    margin: 32px auto 0 auto;
                    background: #fff;
                    border-radius: 1.5rem;
                    box-shadow: 0 6px 32px rgba(0,0,0,0.09);
                    padding: 0 0 3rem 0;
                    overflow: hidden;
                }
                .notif-header {
                    font-size: 2.2rem;
                    font-weight: 700;
                    color: #212529;
                    letter-spacing: -1px;
                    background: #fff;
                    padding: 1.7rem 2.2rem 1.2rem 2.2rem;
                    position: sticky;
                    top: 0;
                    z-index: 2;
                    box-shadow: 0 2px 8px rgba(0,0,0,0.03);
                    display: flex;
                    align-items: center;
                    gap: 0.75rem;
                }
                .notif-group-label {
                    font-size: 1.2rem;
                    font-weight: 600;
                    color: #1877f2;
                    margin: 1.3rem 0 0.5rem 2.2rem;
                }
                .notif-list {
                    list-style: none;
                    padding: 0 2.2rem 0 2.2rem;
                    margin: 0;
                }
                .notif-divider {
                    border: none;
                    border-top: 1px solid #f1f1f1;
                    margin: 1.3rem 0 0.5rem 0;
                }
                .notif-fb-card {
                    display: flex;
                    align-items: flex-start;
                    gap: 1.7rem;
                    background: #fff;
                    border-radius: 1.1rem;
                    margin-bottom: 1.1rem;
                    padding: 2rem 1.7rem 2rem 1.7rem;
                    box-shadow: 0 4px 16px rgba(0,0,0,0.06);
                    transition: background 0.2s, box-shadow 0.2s;
                    text-decoration: none;
                    color: #212529;
                    cursor: pointer;
                    outline: none;
                }
                .notif-fb-card:focus {
                    box-shadow: 0 0 0 2px #1877f2;
                }
                .notif-fb-card:hover {
                    background: #f0f2f5;
                    text-decoration: none;
                }
                .notif-fb-dot {
                    width: 12px;
                    height: 12px;
                    border-radius: 50%;
                    background: #1877f2;
                    margin-left: 12px;
                    margin-top: 10px;
                    display: inline-block;
                }
                .notif-fb-dot-read {
                    background: #cfd8dc;
                }
                .notif-fb-avatar {
                    width: 72px;
                    height: 72px;
                    background: #e4e6eb;
                    border-radius: 50%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    font-size: 38px;
                    color: #1877f2;
                    margin-right: 16px;
                    flex-shrink: 0;
                }
                .notif-fb-desc {
                    font-size: 1.35rem;
                    font-weight: 500;
                    margin-bottom: 0.32rem;
                    white-space: normal;
                    word-break: break-word;
                }
                .notif-fb-date {
                    font-size: 1.15rem;
                    color: #64748b;
                }
                .notif-fb-unread {
                    font-weight: 600;
                    background: #e7f3ff;
                }
                .notif-fb-read {
                    font-weight: 400;
                    background: #fff;
                }
                .notif-empty {
                    text-align: center;
                    color: #94a3b8;
                    margin: 2.2rem 0 2rem 0;
                    font-size: 1.1rem;
                    padding: 1.2rem 1rem;
                }
                .notif-empty-cta {
                    margin-top: 1.1rem;
                    color: #1877f2;
                    font-weight: 500;
                    font-size: 1rem;
                }
                .btn.btn-light.mb-2 {
                    margin-left: 2.2rem;
                    margin-top: 1.2rem;
                    margin-bottom: 0.2rem;
                    background: #f5f6fa;
                    border: 1px solid #e4e6eb;
                    color: #1877f2;
                    box-shadow: none;
                    transition: background 0.18s, border 0.18s;
                }
                .btn.btn-light.mb-2:hover {
                    background: #e7f3ff;
                    border: 1px solid #b6d4fe;
                    color: #0d6efd;
                }
                /* Modal styles */
                .notif-modal {
                    display: none;
                    position: fixed;
                    z-index: 9999;
                    left: 0; top: 0; width: 100vw; height: 100vh;
                    background: rgba(0,0,0,0.25);
                    align-items: center;
                    justify-content: center;
                }
                .notif-modal.active {
                    display: flex;
                }
                .notif-modal-content {
                    background: #fff;
                    border-radius: 1.25rem;
                    box-shadow: 0 8px 32px rgba(0,0,0,0.18);
                    max-width: 480px;
                    width: 95vw;
                    padding: 1.2rem 1rem 1rem 1rem;
                    position: relative;
                    animation: notifModalIn 0.2s;
                    outline: none;
                }
                @keyframes notifModalIn {
                    from { transform: translateY(40px) scale(0.98); opacity: 0; }
                    to { transform: none; opacity: 1; }
                }
                .notif-modal-close {
                    position: absolute;
                    top: 18px; right: 18px;
                    font-size: 1.5rem;
                    color: #64748b;
                    cursor: pointer;
                    background: none;
                    border: none;
                }
                @media (max-width: 700px) {
                    .notif-center-container {
                        max-width: 100vw;
                        margin: 0;
                        border-radius: 0;
                        box-shadow: none;
                    }
                    .notif-header {
                        padding: 1rem 0.7rem 0.7rem 0.7rem;
                    }
                    .notif-list {
                        padding: 0 0.7rem 0 0.7rem;
                    }
                    .btn.btn-light.mb-2 {
                        margin-left: 0.7rem;
                        margin-top: 0.7rem;
                    }
                }
            </style>


   
</head>

<body>
    <!-- Preloader -->
    <div id="preloader"
        style="position:fixed;top:0;left:0;width:100vw;height:100vh;background:rgba(255,255,255,0.7);z-index:9999;display:none;align-items:center;justify-content:center;">
        <div
            style="border:8px solid #f3f3f3;border-top:8px solid #3498db;border-radius:50%;width:60px;height:60px;animation:spin 1s linear infinite;"></div>
    </div>
    <style>
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        body {
            background: #f0f2f5;
            font-family: 'Inter', sans-serif;
        }
    </style>
    <div class="grid-container">
        <?php include('../../includes/app-header.php'); ?>
        <?php include('../../includes/app-menu.php'); ?>
        <?php include('../../includes/floating-btn.php'); ?>
        <?php include('../../includes/setting-menu.php'); ?>
        <main class="main-container">
            <div class="main-cards">
                <div class="notif-center-container" aria-label="Notifications" tabindex="0">
                    <!-- Back button -->
                    <a href="../home/" class="btn btn-light mb-2" style="display:inline-flex;align-items:center;gap:6px;border-radius:8px;font-weight:500;font-size:1rem;"><i class="fas fa-arrow-left"></i> Back</a>
                    <div class="notif-header d-flex align-items-center gap-2" role="heading" aria-level="1">
                        <i class="fas fa-bell"></i> Notifications
                    </div>
                    <?php if (count($notifications) === 0): ?>
                        <div class="notif-empty">
                            <img src="../../assets/gif/done.gif" alt="No notifications" style="width:80px;opacity:0.7;"/>
                            <div class="mt-3"><i class="far fa-bell-slash fa-2x mb-2"></i></div>
                            No notifications yet.
                            <div class="notif-empty-cta">You're all caught up! 🎉</div>
                        </div>
                    <?php else: ?>
                        <?php $first = true; foreach ($paginatedGrouped as $label => $group): ?>
                            <?php if (count($group) > 0): ?>
                                <?php if (!$first): ?><hr class="notif-divider" /><?php endif; $first = false; ?>
                                <div class="notif-group-label"><?php echo $label; ?></div>
                                <div class="row notif-list" role="list">
                                    <?php foreach ($group as $n): ?>
                                        <div class="col-12">
                                            <a href="#" class="notif-fb-card <?php echo $n['ViewStatus'] == 0 ? 'notif-fb-unread' : 'notif-fb-read'; ?>"
                                                data-id="<?php echo $n['NotificationID']; ?>"
                                                tabindex="0"
                                                role="listitem"
                                                aria-label="<?php echo htmlspecialchars($n['Description']); ?><?php echo $n['ViewStatus'] == 0 ? ', unread' : ', read'; ?>">
                                                <div class="notif-fb-avatar"><i class='bx bxs-bell'></i></div>
                                                <div style="flex:1;min-width:0;">
                                                    <div class="notif-fb-desc"><?php echo htmlspecialchars($n['Description']); ?></div>
                                                    <div class="notif-fb-date"><?php echo htmlspecialchars($n['DateandTime']); ?></div>
                                                </div>
                                                <span class="notif-fb-dot<?php echo $n['ViewStatus'] == 0 ? '' : ' notif-fb-dot-read'; ?>"></span>
                                            </a>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <?php if ($totalNotifications > $perPage): ?>
                            <div class="text-center mt-3">
                                <button id="loadMoreNotif" class="btn btn-outline-primary" data-next-page="2">Load More</button>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
                <!-- Modal for notification detail -->
                <div class="notif-modal" id="notifModal" aria-modal="true" role="dialog">
                    <div class="notif-modal-content" id="notifModalContent" tabindex="-1">
                        <button class="notif-modal-close" id="notifModalClose" aria-label="Close">&times;</button>
                        <div id="notifModalBody">
                            <!-- Notification detail will be loaded here -->
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>




    


    <!-- Scripts -->
    <script src="../../assets/plugins/jquery/code.jquery.com_jquery-3.5.1.min.js"></script>
    <script src="../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/plugins/knob/jquery.knob.js"></script>
    <script src="../../assets/plugins/notify/wnoty.js"></script>
    <script src="../../js/admin_js/adminScript.js"></script>
    <?php include('../../controller/js/app/header.php'); ?>

    <!-- current page js -->
    <?php include('../../js/current_page.php'); ?>




     <script>
            $(function() {
                // Focus trap for modal
                function trapFocus(element) {
                    var focusableEls = element.find('a, button, textarea, input, select, [tabindex]:not([tabindex="-1"])');
                    var firstFocusableEl = focusableEls[0];
                    var lastFocusableEl = focusableEls[focusableEls.length - 1];
                    element.on('keydown', function(e) {
                        var isTabPressed = (e.key === 'Tab' || e.keyCode === 9);
                        if (!isTabPressed) return;
                        if (e.shiftKey) {
                            if (document.activeElement === firstFocusableEl) {
                                lastFocusableEl.focus();
                                e.preventDefault();
                            }
                        } else {
                            if (document.activeElement === lastFocusableEl) {
                                firstFocusableEl.focus();
                                e.preventDefault();
                            }
                        }
                    });
                }
                // Event delegation for notification click
                $('.notif-center-container').on('click keydown', '.notif-fb-card', function(e) {
                    if (e.type === 'click' || (e.type === 'keydown' && (e.key === 'Enter' || e.key === ' '))) {
                        e.preventDefault();
                        var notifID = $(this).data('id');
                        var $notifCard = $(this);
                        $('#notifModal').addClass('active');
                        $('#notifModalContent').focus();
                        $('#notifModalBody').html('<div class="text-center py-5"><div class="spinner-border text-primary"></div></div>');
                        // Single AJAX call: mark as read and fetch detail
                        $.get('index.php', { page: 'detail', id: notifID, ajax: 1 }, function(html) {
                            $('#notifModalBody').html(html);
                        });
                        $.post('index.php', { page: 'mark_read', id: notifID, ajax: 1 }, function(res) {
                            $notifCard.removeClass('notif-fb-unread').addClass('notif-fb-read');
                            $notifCard.find('.notif-fb-dot').addClass('notif-fb-dot-read');
                            $notifCard.attr('aria-label', $notifCard.find('.notif-fb-desc').text() + ', read');
                        });
                    }
                });
                // Modal close (click X, click backdrop, or ESC)
                $('#notifModalClose, #notifModal').on('click', function(e) {
                    if (e.target === this) {
                        $('#notifModal').removeClass('active');
                    }
                });
                $(document).on('keydown', function(e) {
                    if (e.key === 'Escape') {
                        $('#notifModal').removeClass('active');
                    }
                });
                // Prevent modal content click from closing
                $('#notifModalContent').on('click', function(e) {
                    e.stopPropagation();
                });
                // Focus trap for modal
                $('#notifModal').on('shown.bs.modal', function() {
                    trapFocus($('#notifModalContent'));
                });
                // Load More button for notifications
                $(document).on('click', '#loadMoreNotif', function() {
                    var nextPage = $(this).data('next-page');
                    var btn = $(this);
                    btn.prop('disabled', true).text('Loading...');
                    $.get(window.location.pathname, { notif_page: nextPage }, function(html) {
                        // Extract only the new notification cards from the returned HTML
                        var newCards = $(html).find('.notif-list .row').children();
                        var newBtn = $(html).find('#loadMoreNotif');
                        $('.notif-list .row').append(newCards);
                        if (newBtn.length) {
                            btn.data('next-page', nextPage + 1).prop('disabled', false).text('Load More');
                        } else {
                            btn.remove();
                        }
                    });
                });
            });
    </script>

   

</body>

</html>