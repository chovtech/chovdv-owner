$(document).ready(function () {
    function loadNotifications() {
        var userID = $('#user_id').val();
        var userType = $('#user_type').val();

        $('#notif-loading').show();
        $.ajax({
            type: 'POST',
            url: '../../controller/scripts/owner/notifications/get_last_five.php',
            data: { userID: userID, userType: userType },
            dataType: 'json',
            success: function (res) {
                var $dropdown = $('#notificationDropdown');
                $dropdown.find('.notif-item').remove();
                $('#notif-loading').hide();
                if (res.success && res.notifications.length > 0) {
                    // Show badge if there are unread notifications
                    var unreadCount = res.notifications.filter(n => n.ViewStatus == 0).length;
                    if (unreadCount > 0) {
                        $('#notif-badge').text(unreadCount).show();
                    } else {
                        $('#notif-badge').hide();
                    }
                    res.notifications.forEach(function (n) {
                        var readClass = n.ViewStatus == 0 ? 'notif-fb-unread' : 'notif-fb-read';
                        var dot = n.ViewStatus == 0 ? '<span class="notif-fb-dot"></span>' : '<span class="notif-fb-dot notif-fb-dot-read"></span>';
                        var notifLink = `../notifications/?page=detail&id=${n.NotificationID}`;
                        var desc = n.Description.length > 50 ? n.Description.substring(0, 50) + '...' : n.Description;
                        var notifItem = `<li class="notif-item px-2 py-2 facebook-notif-item ${readClass}" style="border-bottom:1px solid #f1f1f1;transition:background 0.2s;">
                            <a href="${notifLink}" class="dropdown-item d-flex align-items-start gap-2" style="white-space:normal;padding:0;background:transparent;">
                                <div class="notif-fb-avatar"><i class='bx bxs-bell'></i></div>
                                <div style="flex:1;min-width:0;">
                                    <div style="font-size:14px;line-height:1.3;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;font-weight:${n.ViewStatus == 0 ? '600' : '400'};">${desc}</div>
                                    <div class="small text-muted" style="font-size:11px;">${n.DateandTime}</div>
                                </div>
                                ${dot}
                            </a>
                        </li>`;
                        $(notifItem).insertBefore($dropdown.find('li').last().prev());
                    });
                } else {
                    var emptyMsg = '<li class="notif-item text-center text-muted small py-2">No notifications found.</li>';
                    $(emptyMsg).insertBefore($dropdown.find('li').last().prev());
                    $('#notif-badge').hide();
                }
            },
            error: function () {
                $('#notif-loading').hide();
                var errMsg = '<li class="notif-item text-center text-danger small py-2">Failed to load notifications.</li>';
                $(errMsg).insertBefore($('#notificationDropdown').find('li').last().prev());
            }
        });
    }

    // Load notifications when bell is clicked
    $('#notificationBell').on('click', function (e) {
        loadNotifications();
    });

    // Show notification count badge on page load
    function updateNotifBadge() {
        var userID = $('#user_id').val();
        var userType = $('#user_type').val();
        $.ajax({
            type: 'POST',
            url: '../../controller/scripts/owner/notifications/get_unread_count.php',
            data: { userID: userID, userType: userType },
            dataType: 'json',
            success: function (res) {
                if (res.success && res.count > 0) {
                    $('#notif-badge').text(res.count).show();
                } else {
                    $('#notif-badge').hide();
                }
            }
        });
    }
    updateNotifBadge();
});