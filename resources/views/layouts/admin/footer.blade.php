
 <!-- Jquery Core Js -->
<script src="{{ url('/') }}/cp/assets/bundles/libscripts.bundle.js"></script>

<!-- Plugin Js -->
<script src="{{ url('/') }}/cp/assets/bundles/apexcharts.bundle.js"></script>
<script src="{{ url('/') }}/cp/assets/bundles/dataTables.bundle.js"></script>  

<!-- Jquery Page Js -->
<script src="{{ url('/') }}/cp/js/template.js?<?=time()?>"></script>
<script src="{{ url('/') }}/cp/js/page/index.js"></script>
<script src="">


$(function() {
  var $notificationIcon = $('.notification-icon');
  var $notificationBadge = $notificationIcon.find('.badge');
  var $notificationDropdown = $notificationIcon.find('.notification-dropdown');

  // Add click event to the notification icon
  $notificationIcon.on('click', function() {
    // Toggle the notification dropdown
    $notificationDropdown.toggle();

    // Mark all notifications as read
    $notificationBadge.hide();

    // Make an AJAX request to get the latest notifications
    $.ajax({
      url: '/notifications',
      type: 'GET',
      dataType: 'json',
      success: function(data) {
        // Clear the notification list
        $notificationDropdown.find('.notification-list').empty();

        // Add each notification to the list
        $.each(data, function(index, notification) {
          $notificationDropdown.find('.notification-list').append('<li>' + notification.message + '</li>');
        });
      }
    });
  });

  function updateNotificationBadge(count) {
    if (count > 0) {
      $notificationBadge.text(count).show();
    } else {
      $notificationBadge.hide();
    }
  }

  setInterval(function() {
    $.ajax({
      url: '/notifications/count',
      type: 'GET',
      dataType: 'json',
      success: function(data)


  {
    updateNotificationBadge(data.count);
  }
});
}, 30000); // 30 seconds
});
</script>