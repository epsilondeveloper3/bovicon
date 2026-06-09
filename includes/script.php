<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/jquery-3.5.1.min.js"></script>
  <script src="assets/js/plugins.js"></script>
  <script src="assets/js/main.js"></script>
<script>
  $(document).ready(function() {
    var path = window.location.pathname;
    var page = path.split("/").pop();
    if(page == "") page = "index.php";
    $('.nav-item-link').removeClass('active');
    $('.nav-item-link[href="' + page + '"]').addClass('active');
    $('.nav-item-link[href="' + page + '"]').parents('.nav-item.has-dropdown').find('> .dropdown-toggle').addClass('active');
  });
</script>
