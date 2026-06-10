<div id="bovicon-preloader" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: #ffffff; z-index: 1010101010; display: flex; align-items: center; justify-content: center; opacity: 1; visibility: visible; transition: opacity 0.4s ease, visibility 0.4s ease; transform: none !important; -webkit-transform: none !important; -ms-transform: none !important;">
    <div class="loader-content" style="text-align: center;">
        <!-- Brand Logo -->
        <img src="img/core-img/logo.png" alt="BOVICAN Logo" style="max-width: 200px; height: auto; animation: pulse 1.8s infinite ease-in-out;">
        
        <!-- Premium Pulsing Spinner with Teal and Coral Orange -->
        <div style="margin: 25px auto 0; width: 40px; height: 40px; border: 3px solid rgba(0, 128, 129, 0.1); border-radius: 50%; border-top-color: #008081; border-bottom-color: #ee7355; animation: spin 1s ease-in-out infinite;"></div>
        
        <div style="margin-top: 15px; font-family: 'Lexend', sans-serif; font-weight: 700; color: #008081; font-size: 14px; letter-spacing: 1px; text-transform: uppercase;">
            BOVICAN Admin
        </div>
    </div>
</div>

<style>
@keyframes pulse {
    0% {
        transform: scale(0.95);
        opacity: 0.8;
    }
    50% {
        transform: scale(1.02);
        opacity: 1;
    }
    100% {
        transform: scale(0.95);
        opacity: 0.8;
    }
}
@keyframes spin {
    to {
        transform: rotate(360deg);
    }
}
</style>

<!-- Self-dismissing script to ensure loader always fades out smoothly -->
<script>
(function() {
    var loader = document.getElementById("bovicon-preloader");
    if (!loader) return;

    function hideLoader() {
        if (loader.style.opacity !== "0") {
            loader.style.opacity = "0";
            loader.style.visibility = "hidden";
            setTimeout(function() {
                if (loader && loader.parentNode) {
                    loader.parentNode.removeChild(loader);
                }
            }, 500);
        }
    }

    // Trigger on DOMContentLoaded
    if (document.readyState === "complete" || document.readyState === "interactive") {
        setTimeout(hideLoader, 200);
    } else {
        document.addEventListener("DOMContentLoaded", function() {
            setTimeout(hideLoader, 200);
        });
    }

    // Safety fallback for window load
    window.addEventListener("load", hideLoader);

    // Absolute fallback (failsafe after 1.5 seconds)
    setTimeout(hideLoader, 1500);
})();
</script>