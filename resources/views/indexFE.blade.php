<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIG Kuliner Tradisional</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css')}}/bootstrap.css">
    <link rel="stylesheet" href="{{asset('icon')}}/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="{{asset('css')}}/main.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{asset('js')}}/bootstrap.bundle.min.js"></script>
    <script src="{{asset('js')}}/mazer.js"></script>

    <!-- Leftleat -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
    <link rel="stylesheet" href="{{asset('css')}}/L.Control.Sidebar.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
    <script src="{{asset('js')}}/L.Control.Sidebar.js"></script>

    <!-- Math js -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/mathjs/9.2.0/math.js'></script>

    <style>
        .preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background-color: #fff;
        }

        .preloader .loading {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            font: 14px arial;
        }

        .scrollToTopBtn {
            background-color: black;
            border: none;
            color: white;
            cursor: pointer;
            font-size: 18px;
            line-height: 48px;
            width: 48px;

            /* place it at the bottom right corner */
            position: fixed;
            bottom: 20px;
            right: 20px;
            /* keep it at the top of everything else */
            z-index: 100;
            /* hide with opacity */
            opacity: 0;
            /* also add a translate effect */
            transform: translateY(100px);
            /* and a transition */
            transition: all 0.5s ease;
        }

        .showBtn {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
   </head>

<div class="preloader">
    <div class="loading">
        <img src="poi.gif" width="80">
        <p>Harap Tunggu</p>
    </div>
</div>

@yield('content')
<button title="Klik To Top" class="scrollToTopBtn">☝️</button>
</body>


</html>

<script>
    $(document).ready(function() {
        $(".preloader").fadeOut();
    })
    var scrollToTopBtn = document.querySelector(".scrollToTopBtn");
    var rootElement = document.documentElement;

    function handleScroll() {
        // Do something on scroll
        var scrollTotal = rootElement.scrollHeight - rootElement.clientHeight;
        if (rootElement.scrollTop / scrollTotal > 0.8) {
            // Show button
            scrollToTopBtn.classList.add("showBtn");
        } else {
            // Hide button
            scrollToTopBtn.classList.remove("showBtn");
        }
    }

    function scrollToTop() {
        // Scroll to top logic
        rootElement.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    }
    scrollToTopBtn.addEventListener("click", scrollToTop);
    document.addEventListener("scroll", handleScroll);
</script>