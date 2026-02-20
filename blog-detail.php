<?php
// Connect to the database
$conn = new mysqli('localhost', 'u448113253_expontinst', 'b@^8XSJ1X', 'u448113253_expontinst');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the blog slug from the URL
if (isset($_GET['link'])) {
    $slug = $_GET['link'];

    // Fetch the blog post details using the slug
    $sql = "SELECT * FROM blogs WHERE link = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $slug);
    $stmt->execute();
    $result = $stmt->get_result();
    $imagePath = "uploads/blogImages/";
    // Check if the post exists
    if ($result->num_rows > 0) {
        $post = $result->fetch_assoc();
    } else {
        echo "Blog post not found.";
        exit;
    }
} else {
    echo "Invalid blog post.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <base href="/">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title><?php echo $post['meta_title']; ?></title>
    <meta name="description" content="<?php echo $post['meta_description']; ?>">
    <meta name="keywords" content="<?php echo $post['meta_keywords']; ?>">
    <meta property="og:title" content="<?php echo $post['meta_title']; ?>">
    <meta property="og:description" content="<?php echo $post['meta_description']; ?>">
    <meta property="og:image" content="/<?php echo $imagePath . $post['image']; ?>">
    <meta property="og:url" content="/blogs/<?php echo $post['link']; ?>">
    <meta property="og:type" content="article">

    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="pingback" href="https://wp.wp-preview.com/cookandmeal/cookandmeal-1/xmlrpc.php">
    <meta name="robots" content="max-image-preview:large">
    <link rel="dns-prefetch" href="//s.w.org">
    <link href="https://fonts.gstatic.com" crossorigin="" rel="preconnect">
    <link rel="alternate" type="application/rss+xml" title="CookAndMeal » Feed"
        href="https://wp.wp-preview.com/cookandmeal/cookandmeal-1/feed/">
    <link rel="alternate" type="application/rss+xml" title="CookAndMeal » Comments Feed"
        href="https://wp.wp-preview.com/cookandmeal/cookandmeal-1/comments/feed/">
    <script>
        window._wpemojiSettings = {
            "baseUrl": "https:\/\/s.w.org\/images\/core\/emoji\/13.1.0\/72x72\/",
            "ext": ".png",
            "svgUrl": "https:\/\/s.w.org\/images\/core\/emoji\/13.1.0\/svg\/",
            "svgExt": ".svg",
            "source": {
                "concatemoji": "https:\/\/wp.wp-preview.com\/cookandmeal\/cookandmeal-1\/wp-includes\/js\/wp-emoji-release.min.js?ver=5.9"
            }
        };
        /*! This file is auto-generated */
        ! function(e, a, t) {
            var n, r, o, i = a.createElement("canvas"),
                p = i.getContext && i.getContext("2d");

            function s(e, t) {
                var a = String.fromCharCode;
                p.clearRect(0, 0, i.width, i.height), p.fillText(a.apply(this, e), 0, 0);
                e = i.toDataURL();
                return p.clearRect(0, 0, i.width, i.height), p.fillText(a.apply(this, t), 0, 0), e === i.toDataURL()
            }

            function c(e) {
                var t = a.createElement("script");
                t.src = e, t.defer = t.type = "text/javascript", a.getElementsByTagName("head")[0].appendChild(t)
            }
            for (o = Array("flag", "emoji"), t.supports = {
                    everything: !0,
                    everythingExceptFlag: !0
                }, r = 0; r < o.length; r++) t.supports[o[r]] = function(e) {
                if (!p || !p.fillText) return !1;
                switch (p.textBaseline = "top", p.font = "600 32px Arial", e) {
                    case "flag":
                        return s([127987, 65039, 8205, 9895, 65039], [127987, 65039, 8203, 9895, 65039]) ? !1 : !s([55356, 56826, 55356, 56819], [55356, 56826, 8203, 55356, 56819]) && !s([55356, 57332, 56128, 56423, 56128, 56418, 56128, 56421, 56128, 56430, 56128, 56423, 56128, 56447], [55356, 57332, 8203, 56128, 56423, 8203, 56128, 56418, 8203, 56128, 56421, 8203, 56128, 56430, 8203, 56128, 56423, 8203, 56128, 56447]);
                    case "emoji":
                        return !s([10084, 65039, 8205, 55357, 56613], [10084, 65039, 8203, 55357, 56613])
                }
                return !1
            }(o[r]), t.supports.everything = t.supports.everything && t.supports[o[r]], "flag" !== o[r] && (t.supports.everythingExceptFlag = t.supports.everythingExceptFlag && t.supports[o[r]]);
            t.supports.everythingExceptFlag = t.supports.everythingExceptFlag && !t.supports.flag, t.DOMReady = !1, t.readyCallback = function() {
                t.DOMReady = !0
            }, t.supports.everything || (n = function() {
                t.readyCallback()
            }, a.addEventListener ? (a.addEventListener("DOMContentLoaded", n, !1), e.addEventListener("load", n, !1)) : (e.attachEvent("onload", n), a.attachEvent("onreadystatechange", function() {
                "complete" === a.readyState && t.readyCallback()
            })), (n = t.source || {}).concatemoji ? c(n.concatemoji) : n.wpemoji && n.twemoji && (c(n.twemoji), c(n.wpemoji)))
        }(window, document, window._wpemojiSettings);
    </script>
    <script src="assets/js/wp-emoji-release.min.js" type="text/javascript" defer=""></script>
    <style>
        img.wp-smiley,
        img.emoji {
            display: inline !important;
            border: none !important;
            box-shadow: none !important;
            height: 1em !important;
            width: 1em !important;
            margin: 0 0.07em !important;
            vertical-align: -0.1em !important;
            background: none !important;
            padding: 0 !important;
        }
    </style>
    <link rel="stylesheet" href="assets/css/6691e.css" media="all">




    <style id="global-styles-inline-css">
        body {
            --wp--preset--color--black: #000000;
            --wp--preset--color--cyan-bluish-gray: #abb8c3;
            --wp--preset--color--white: #ffffff;
            --wp--preset--color--pale-pink: #f78da7;
            --wp--preset--color--vivid-red: #cf2e2e;
            --wp--preset--color--luminous-vivid-orange: #ff6900;
            --wp--preset--color--luminous-vivid-amber: #fcb900;
            --wp--preset--color--light-green-cyan: #7bdcb5;
            --wp--preset--color--vivid-green-cyan: #00d084;
            --wp--preset--color--pale-cyan-blue: #8ed1fc;
            --wp--preset--color--vivid-cyan-blue: #0693e3;
            --wp--preset--color--vivid-purple: #9b51e0;
            --wp--preset--gradient--vivid-cyan-blue-to-vivid-purple: linear-gradient(135deg, rgba(6, 147, 227, 1) 0%, rgb(155, 81, 224) 100%);
            --wp--preset--gradient--light-green-cyan-to-vivid-green-cyan: linear-gradient(135deg, rgb(122, 220, 180) 0%, rgb(0, 208, 130) 100%);
            --wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange: linear-gradient(135deg, rgba(252, 185, 0, 1) 0%, rgba(255, 105, 0, 1) 100%);
            --wp--preset--gradient--luminous-vivid-orange-to-vivid-red: linear-gradient(135deg, rgba(255, 105, 0, 1) 0%, rgb(207, 46, 46) 100%);
            --wp--preset--gradient--very-light-gray-to-cyan-bluish-gray: linear-gradient(135deg, rgb(238, 238, 238) 0%, rgb(169, 184, 195) 100%);
            --wp--preset--gradient--cool-to-warm-spectrum: linear-gradient(135deg, rgb(74, 234, 220) 0%, rgb(151, 120, 209) 20%, rgb(207, 42, 186) 40%, rgb(238, 44, 130) 60%, rgb(251, 105, 98) 80%, rgb(254, 248, 76) 100%);
            --wp--preset--gradient--blush-light-purple: linear-gradient(135deg, rgb(255, 206, 236) 0%, rgb(152, 150, 240) 100%);
            --wp--preset--gradient--blush-bordeaux: linear-gradient(135deg, rgb(254, 205, 165) 0%, rgb(254, 45, 45) 50%, rgb(107, 0, 62) 100%);
            --wp--preset--gradient--luminous-dusk: linear-gradient(135deg, rgb(255, 203, 112) 0%, rgb(199, 81, 192) 50%, rgb(65, 88, 208) 100%);
            --wp--preset--gradient--pale-ocean: linear-gradient(135deg, rgb(255, 245, 203) 0%, rgb(182, 227, 212) 50%, rgb(51, 167, 181) 100%);
            --wp--preset--gradient--electric-grass: linear-gradient(135deg, rgb(202, 248, 128) 0%, rgb(113, 206, 126) 100%);
            --wp--preset--gradient--midnight: linear-gradient(135deg, rgb(2, 3, 129) 0%, rgb(40, 116, 252) 100%);
            --wp--preset--duotone--dark-grayscale: url('cookandmeal-1.html#wp-duotone-dark-grayscale');
            --wp--preset--duotone--grayscale: url('cookandmeal-1.html#wp-duotone-grayscale');
            --wp--preset--duotone--purple-yellow: url('cookandmeal-1.html#wp-duotone-purple-yellow');
            --wp--preset--duotone--blue-red: url('cookandmeal-1.html#wp-duotone-blue-red');
            --wp--preset--duotone--midnight: url('cookandmeal-1.html#wp-duotone-midnight');
            --wp--preset--duotone--magenta-yellow: url('cookandmeal-1.html#wp-duotone-magenta-yellow');
            --wp--preset--duotone--purple-green: url('cookandmeal-1.html#wp-duotone-purple-green');
            --wp--preset--duotone--blue-orange: url('cookandmeal-1.html#wp-duotone-blue-orange');
            --wp--preset--font-size--small: 13px;
            --wp--preset--font-size--medium: 20px;
            --wp--preset--font-size--large: 36px;
            --wp--preset--font-size--x-large: 42px;
        }

        .has-black-color {
            color: var(--wp--preset--color--black) !important;
        }

        .has-cyan-bluish-gray-color {
            color: var(--wp--preset--color--cyan-bluish-gray) !important;
        }

        .has-white-color {
            color: var(--wp--preset--color--white) !important;
        }

        .has-pale-pink-color {
            color: var(--wp--preset--color--pale-pink) !important;
        }

        .has-vivid-red-color {
            color: var(--wp--preset--color--vivid-red) !important;
        }

        .has-luminous-vivid-orange-color {
            color: var(--wp--preset--color--luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-amber-color {
            color: var(--wp--preset--color--luminous-vivid-amber) !important;
        }

        .has-light-green-cyan-color {
            color: var(--wp--preset--color--light-green-cyan) !important;
        }

        .has-vivid-green-cyan-color {
            color: var(--wp--preset--color--vivid-green-cyan) !important;
        }

        .has-pale-cyan-blue-color {
            color: var(--wp--preset--color--pale-cyan-blue) !important;
        }

        .has-vivid-cyan-blue-color {
            color: var(--wp--preset--color--vivid-cyan-blue) !important;
        }

        .has-vivid-purple-color {
            color: var(--wp--preset--color--vivid-purple) !important;
        }

        .has-black-background-color {
            background-color: var(--wp--preset--color--black) !important;
        }

        .has-cyan-bluish-gray-background-color {
            background-color: var(--wp--preset--color--cyan-bluish-gray) !important;
        }

        .has-white-background-color {
            background-color: var(--wp--preset--color--white) !important;
        }

        .has-pale-pink-background-color {
            background-color: var(--wp--preset--color--pale-pink) !important;
        }

        .has-vivid-red-background-color {
            background-color: var(--wp--preset--color--vivid-red) !important;
        }

        .has-luminous-vivid-orange-background-color {
            background-color: var(--wp--preset--color--luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-amber-background-color {
            background-color: var(--wp--preset--color--luminous-vivid-amber) !important;
        }

        .has-light-green-cyan-background-color {
            background-color: var(--wp--preset--color--light-green-cyan) !important;
        }

        .has-vivid-green-cyan-background-color {
            background-color: var(--wp--preset--color--vivid-green-cyan) !important;
        }

        .has-pale-cyan-blue-background-color {
            background-color: var(--wp--preset--color--pale-cyan-blue) !important;
        }

        .has-vivid-cyan-blue-background-color {
            background-color: var(--wp--preset--color--vivid-cyan-blue) !important;
        }

        .has-vivid-purple-background-color {
            background-color: var(--wp--preset--color--vivid-purple) !important;
        }

        .has-black-border-color {
            border-color: var(--wp--preset--color--black) !important;
        }

        .has-cyan-bluish-gray-border-color {
            border-color: var(--wp--preset--color--cyan-bluish-gray) !important;
        }

        .has-white-border-color {
            border-color: var(--wp--preset--color--white) !important;
        }

        .has-pale-pink-border-color {
            border-color: var(--wp--preset--color--pale-pink) !important;
        }

        .has-vivid-red-border-color {
            border-color: var(--wp--preset--color--vivid-red) !important;
        }

        .has-luminous-vivid-orange-border-color {
            border-color: var(--wp--preset--color--luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-amber-border-color {
            border-color: var(--wp--preset--color--luminous-vivid-amber) !important;
        }

        .has-light-green-cyan-border-color {
            border-color: var(--wp--preset--color--light-green-cyan) !important;
        }

        .has-vivid-green-cyan-border-color {
            border-color: var(--wp--preset--color--vivid-green-cyan) !important;
        }

        .has-pale-cyan-blue-border-color {
            border-color: var(--wp--preset--color--pale-cyan-blue) !important;
        }

        .has-vivid-cyan-blue-border-color {
            border-color: var(--wp--preset--color--vivid-cyan-blue) !important;
        }

        .has-vivid-purple-border-color {
            border-color: var(--wp--preset--color--vivid-purple) !important;
        }

        .has-vivid-cyan-blue-to-vivid-purple-gradient-background {
            background: var(--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple) !important;
        }

        .has-light-green-cyan-to-vivid-green-cyan-gradient-background {
            background: var(--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan) !important;
        }

        .has-luminous-vivid-amber-to-luminous-vivid-orange-gradient-background {
            background: var(--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-orange-to-vivid-red-gradient-background {
            background: var(--wp--preset--gradient--luminous-vivid-orange-to-vivid-red) !important;
        }

        .has-very-light-gray-to-cyan-bluish-gray-gradient-background {
            background: var(--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray) !important;
        }

        .has-cool-to-warm-spectrum-gradient-background {
            background: var(--wp--preset--gradient--cool-to-warm-spectrum) !important;
        }

        .has-blush-light-purple-gradient-background {
            background: var(--wp--preset--gradient--blush-light-purple) !important;
        }

        .has-blush-bordeaux-gradient-background {
            background: var(--wp--preset--gradient--blush-bordeaux) !important;
        }

        .has-luminous-dusk-gradient-background {
            background: var(--wp--preset--gradient--luminous-dusk) !important;
        }

        .has-pale-ocean-gradient-background {
            background: var(--wp--preset--gradient--pale-ocean) !important;
        }

        .has-electric-grass-gradient-background {
            background: var(--wp--preset--gradient--electric-grass) !important;
        }

        .has-midnight-gradient-background {
            background: var(--wp--preset--gradient--midnight) !important;
        }

        .has-small-font-size {
            font-size: var(--wp--preset--font-size--small) !important;
        }

        .has-medium-font-size {
            font-size: var(--wp--preset--font-size--medium) !important;
        }

        .has-large-font-size {
            font-size: var(--wp--preset--font-size--large) !important;
        }

        .has-x-large-font-size {
            font-size: var(--wp--preset--font-size--x-large) !important;
        }
    </style>
    <link rel="stylesheet" href="assets/css/7410a.css" media="all">



    <link rel="stylesheet" id="woocommerce-smallscreen-css" href="assets/css/woocommerce-smallscreen.css"
        media="only screen and (max-width: 768px)">
    <link rel="stylesheet" href="assets/css/a4b0a.css" media="all">

    <style id="woocommerce-inline-inline-css">
        .woocommerce form .form-row .required {
            visibility: visible;
        }
    </style>
    <link rel="stylesheet" href="assets/css/daadd.css" media="all">
    <script src="assets/js/31415.js"></script>

    <script id="responsive-lightbox-js-extra">
        var rlArgs = {
            "script": "swipebox",
            "selector": "lightbox",
            "customEvents": "",
            "activeGalleries": "1",
            "animation": "1",
            "hideCloseButtonOnMobile": "0",
            "removeBarsOnMobile": "0",
            "hideBars": "1",
            "hideBarsDelay": "5000",
            "videoMaxWidth": "1080",
            "useSVG": "1",
            "loopAtEnd": "0",
            "woocommerce_gallery": "0",
            "ajaxurl": "https:\/\/wp.wp-preview.com\/cookandmeal\/cookandmeal-1\/wp-admin\/admin-ajax.php",
            "nonce": "fb5d1de8fa"
        };
    </script>
    <script src="assets/js/44e4e.js"></script>
    <link rel="https://api.w.org/" href="https://wp.wp-preview.com/cookandmeal/cookandmeal-1/wp-json/">
    <link rel="EditURI" type="application/rsd+xml" title="RSD"
        href="https://wp.wp-preview.com/cookandmeal/cookandmeal-1/xmlrpc.php?rsd">
    <link rel="wlwmanifest" type="application/wlwmanifest+xml"
        href="https://wp.wp-preview.com/cookandmeal/cookandmeal-1/wp-includes/wlwmanifest.xml">
    <meta name="generator" content="WordPress 5.9">
    <meta name="generator" content="WooCommerce 5.4.2">
    <style id="ctcc-css" type="text/css" media="screen">
        #catapult-cookie-bar {
            box-sizing: border-box;
            max-height: 0;
            opacity: 0;
            z-index: 99999;
            overflow: hidden;
            color: #ddd;
            position: fixed;
            left: 20px;
            bottom: 6%;
            width: 300px;
            background-color: #464646;
        }

        #catapult-cookie-bar a {
            color: #fff;
        }

        #catapult-cookie-bar .x_close span {}

        button#catapultCookie {
            border: 0;
            padding: 6px 9px;
            border-radius: 3px;
        }

        #catapult-cookie-bar h3 {
            color: #ddd;
        }

        .has-cookie-bar #catapult-cookie-bar {
            opacity: 1;
            max-height: 999px;
            min-height: 30px;
        }
    </style> <noscript>
        <style>
            .woocommerce-product-gallery {
                opacity: 1 !important;
            }
        </style>
    </noscript>
    <!-- There is no amphtml version available for this URL. -->
    <meta name="generator"
        content="Powered by Slider Revolution 6.5.4 - responsive, Mobile-Friendly Slider Plugin for WordPress with comfortable drag and drop interface.">
    <link rel="icon" href="assets/images/cropped-favicon-32x32.png" sizes="32x32">
    <link rel="icon" href="assets/images/cropped-favicon-192x192.png" sizes="192x192">
    <link rel="apple-touch-icon" href="assets/images/cropped-favicon-180x180.png">
    <link rel="stylesheet" href="assets/css/blogdetail.css">
    <meta name="msapplication-TileImage"
        content="https://wp.wp-preview.com/cookandmeal/cookandmeal-1/wp-content/uploads/2021/07/cropped-favicon-270x270.png">
    <script type="text/javascript">
        function setREVStartSize(e) {
            //window.requestAnimationFrame(function() {				 
            window.RSIW = window.RSIW === undefined ? window.innerWidth : window.RSIW;
            window.RSIH = window.RSIH === undefined ? window.innerHeight : window.RSIH;
            try {
                var pw = document.getElementById(e.c).parentNode.offsetWidth,
                    newh;
                pw = pw === 0 || isNaN(pw) ? window.RSIW : pw;
                e.tabw = e.tabw === undefined ? 0 : parseInt(e.tabw);
                e.thumbw = e.thumbw === undefined ? 0 : parseInt(e.thumbw);
                e.tabh = e.tabh === undefined ? 0 : parseInt(e.tabh);
                e.thumbh = e.thumbh === undefined ? 0 : parseInt(e.thumbh);
                e.tabhide = e.tabhide === undefined ? 0 : parseInt(e.tabhide);
                e.thumbhide = e.thumbhide === undefined ? 0 : parseInt(e.thumbhide);
                e.mh = e.mh === undefined || e.mh == "" || e.mh === "auto" ? 0 : parseInt(e.mh, 0);
                if (e.layout === "fullscreen" || e.l === "fullscreen")
                    newh = Math.max(e.mh, window.RSIH);
                else {
                    e.gw = Array.isArray(e.gw) ? e.gw : [e.gw];
                    for (var i in e.rl)
                        if (e.gw[i] === undefined || e.gw[i] === 0) e.gw[i] = e.gw[i - 1];
                    e.gh = e.el === undefined || e.el === "" || (Array.isArray(e.el) && e.el.length == 0) ? e.gh : e.el;
                    e.gh = Array.isArray(e.gh) ? e.gh : [e.gh];
                    for (var i in e.rl)
                        if (e.gh[i] === undefined || e.gh[i] === 0) e.gh[i] = e.gh[i - 1];

                    var nl = new Array(e.rl.length),
                        ix = 0,
                        sl;
                    e.tabw = e.tabhide >= pw ? 0 : e.tabw;
                    e.thumbw = e.thumbhide >= pw ? 0 : e.thumbw;
                    e.tabh = e.tabhide >= pw ? 0 : e.tabh;
                    e.thumbh = e.thumbhide >= pw ? 0 : e.thumbh;
                    for (var i in e.rl) nl[i] = e.rl[i] < window.RSIW ? 0 : e.rl[i];
                    sl = nl[0];
                    for (var i in nl)
                        if (sl > nl[i] && nl[i] > 0) {
                            sl = nl[i];
                            ix = i;
                        }
                    var m = pw > (e.gw[ix] + e.tabw + e.thumbw) ? 1 : (pw - (e.tabw + e.thumbw)) / (e.gw[ix]);
                    newh = (e.gh[ix] * m) + (e.tabh + e.thumbh);
                }
                var el = document.getElementById(e.c);
                if (el !== null && el) el.style.height = newh + "px";
                el = document.getElementById(e.c + "_wrapper");
                if (el !== null && el) el.style.height = newh + "px";
            } catch (e) {
                console.log("Failure at Presize of Slider:" + e)
            }
            //});
        };
    </script>
    <style id="wp-custom-css">
        /* Fullwidth slider block */
        .content-block .html-block-container:nth-child(1) {
            width: 100% !important;
        }
    </style>
    <style id="kirki-inline-styles">
        /* latin-ext */
        @font-face {
            font-family: 'Aleo';
            font-style: normal;
            font-weight: 700;
            font-display: swap;
            src: url(assets/fonts/c4mg1nF8G8_syLbsxDxJma1_9KKHWA.woff) format('woff');
            unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
        }

        /* latin */
        @font-face {
            font-family: 'Aleo';
            font-style: normal;
            font-weight: 700;
            font-display: swap;
            src: url(assets/fonts/c4mg1nF8G8_syLbsxDJJma1_9KI.woff) format('woff');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }

        /* latin-ext */
        @font-face {
            font-family: 'Lato';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: url(assets/fonts/S6uyw4BMUTPHjxAwWCWtFCfQ7A.woff) format('woff');
            unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
        }

        /* latin */
        @font-face {
            font-family: 'Lato';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: url(assets/fonts/S6uyw4BMUTPHjx4wWCWtFCc.woff) format('woff');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }
    </style>
</head>

<body data-rsssl="1"
    class="home blog theme-cookandmeal woocommerce-js blog-post-transparent-header-disable blog-slider-disable blog-enable-dropcaps blog-enable-images-animations blog-enable-sticky-sidebar blog-enable-sticky-header blog-style-corners-rounded blog-home-block-title-center blog-home-block-title-style-doodle blog-home-block-subtitle-style-regular blog-post-details-align-left">
    <header class="main-header clearfix header-layout-menu-above-header-border sticky-header mainmenu-light">
        <div class="blog-post-reading-progress"></div>
        <div class="container">


            <div class="mainmenu mainmenu-light mainmenu-center mainmenu-none mainmenu-boldfont mainmenu-downarrow clearfix"
                role="navigation">

                <div id="navbar" class="navbar navbar-default clearfix mgt-mega-menu">

                    <div class="navbar-inner">
                        <div class="container">

                            <div class="navbar-toggle btn" data-toggle="collapse" data-target=".collapse">
                                Menu </div>

                            <div class="navbar-center-wrapper">
                                <div class="navbar-collapse collapse">
                                    <ul id="menu-main-menu-1" class="nav">
                                        <li id="mgt-menu-item-404"
                                            class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home current-menu-ancestor">
                                            <a href="index.php">Home</a>
                                            <!-- <ul class="sub-menu  megamenu-column-1 level-0">
                                                <li id="mgt-menu-item-666"
                                                    class="menu-item menu-item-type-custom menu-item-object-custom current-menu-ancestor current-menu-parent menu-item-has-children">
                                                    <a href="#">Demos</a>
                                                    <ul class="sub-menu  level-1">
                                                        <li id="mgt-menu-item-667"
                                                            class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home">
                                                            <a
                                                                href="">Homepage
                                                                1</a>
                                                        </li>
                                                        <li id="mgt-menu-item-668"
                                                            class="menu-item menu-item-type-custom menu-item-object-custom">
                                                            <a
                                                                href="">Homepage
                                                                2</a>
                                                        </li>
                                                        <li id="mgt-menu-item-669"
                                                            class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home">
                                                            <a
                                                                href="">Homepage
                                                                3</a>
                                                        </li>
                                                        <li id="mgt-menu-item-670"
                                                            class="menu-item menu-item-type-custom menu-item-object-custom">
                                                            <a
                                                                href="">Homepage
                                                                4</a>
                                                        </li>
                                                        <li id="mgt-menu-item-671"
                                                            class="menu-item menu-item-type-custom menu-item-object-custom">
                                                            <a
                                                                href="">Homepage
                                                                5</a>
                                                        </li>
                                                        <li id="mgt-menu-item-672"
                                                            class="menu-item menu-item-type-custom menu-item-object-custom">
                                                            <a
                                                                href="">Homepage
                                                                6</a>
                                                        </li>
                                                        <li id="mgt-menu-item-961"
                                                            class="menu-item menu-item-type-custom menu-item-object-custom">
                                                            <a
                                                                href="">Homepage
                                                                7</a>
                                                        </li>
                                                        <li id="mgt-menu-item-963"
                                                            class="menu-item menu-item-type-custom menu-item-object-custom">
                                                            <a
                                                                href="">Homepage
                                                                8</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li id="mgt-menu-item-683"
                                                    class="menu-item menu-item-type-custom menu-item-object-custom"><a
                                                        href="">Large
                                                        Post then Grid</a></li>
                                                <li id="mgt-menu-item-684"
                                                    class="menu-item menu-item-type-custom menu-item-object-custom"><a
                                                        href="">Large
                                                        Overlay then Grid</a></li>
                                                <li id="mgt-menu-item-685"
                                                    class="menu-item menu-item-type-custom menu-item-object-custom"><a
                                                        href="">Large
                                                        Post then List</a></li>
                                                <li id="mgt-menu-item-686"
                                                    class="menu-item menu-item-type-custom menu-item-object-custom"><a
                                                        href="">Overlay
                                                        then List</a></li>
                                                <li id="mgt-menu-item-687"
                                                    class="menu-item menu-item-type-custom menu-item-object-custom"><a
                                                        href="">Overlay
                                                        then List</a></li>
                                                <li id="mgt-menu-item-688"
                                                    class="menu-item menu-item-type-custom menu-item-object-custom"><a
                                                        href="">Mixed
                                                        Overlays</a></li>
                                                <li id="mgt-menu-item-689"
                                                    class="menu-item menu-item-type-custom menu-item-object-custom"><a
                                                        href="">Mixed
                                                        Large then Grid</a></li>
                                                <li id="mgt-menu-item-690"
                                                    class="menu-item menu-item-type-custom menu-item-object-custom"><a
                                                        href="">Cards</a>
                                                </li>
                                                <li id="mgt-menu-item-691"
                                                    class="menu-item menu-item-type-custom menu-item-object-custom"><a
                                                        href="">Grid</a>
                                                </li>
                                                <li id="mgt-menu-item-692"
                                                    class="menu-item menu-item-type-custom menu-item-object-custom"><a
                                                        href="">List</a>
                                                </li>
                                                <li id="mgt-menu-item-693"
                                                    class="menu-item menu-item-type-custom menu-item-object-custom"><a
                                                        href="">Classic</a>
                                                </li>
                                                <li id="mgt-menu-item-694"
                                                    class="menu-item menu-item-type-custom menu-item-object-custom"><a
                                                        href="">Overlay</a>
                                                </li>
                                                <li id="mgt-menu-item-695"
                                                    class="menu-item menu-item-type-custom menu-item-object-custom"><a
                                                        href="">Masonry</a>
                                                </li>
                                            </ul> -->
                                        </li>
                                        <li id="mgt-menu-item-406"
                                            class="menu-item menu-item-type-custom menu-item-object-custom">
                                            <a href="blog.php">Blogs</a>
                                        </li>
                                        <li id="mgt-menu-item-127"
                                            class="menu-item menu-item-type-taxonomy menu-item-object-category"><a
                                                href=""><i
                                                    class="fa fa-cutlery"></i>Testimonial</a></li>
                                        <li id="mgt-menu-item-128"
                                            class="menu-item menu-item-type-taxonomy menu-item-object-category mgt-menu-fullwidth-inside menu-item-multicolumn">
                                            <a
                                                href="courses.php"><i
                                                    class="fa fa-heart-o"></i>Courses</a>
                                            <!-- <ul
                                                class="sub-menu sidebar sidebar-inside  megamenu-column-1 mgt-menu-fullwidth level-0">
                                                <li id="cookandmeal-list-posts-6"
                                                    class="widget widget_cookandmeal_list_entries">
                                                    <ul class="template-grid-short-inside">

                                                        <li class="template-grid-short">
                                                            <div class="cookandmeal-grid-post cookandmeal-grid-short-post cookandmeal-post format-standard"
                                                                data-aos="fade-up">
                                                                <div class="cookandmeal-post-image-wrapper">
                                                                    <div class="post-review-rating-badge headers-font"
                                                                        data-style="background-color: #aed33d;">7.8
                                                                    </div><a
                                                                        href="">
                                                                        <div class="cookandmeal-post-image"
                                                                            data-style="background-image: url(https://wp.wp-preview.com/cookandmeal/cookandmeal-1/wp-content/uploads/2021/07/cqh5qqjffka-555x360.jpg);">
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                                <div class="cookandmeal-post-details">
                                                                    <div class="post-categories"><a
                                                                            href=""
                                                                            data-style="background-color: #84a6e5;"><i
                                                                                class="fa fa-tag cat-dot"></i><span
                                                                                class="cat-title">Easy</span></a><a
                                                                            href=""
                                                                            data-style="background-color: #5b8559;"><i
                                                                                class="fa fa-tag cat-dot"></i><span
                                                                                class="cat-title">Vegan</span></a></div>
                                                                    <h3 class="post-title entry-title"><a
                                                                            href="">Spicy
                                                                            Serrano Pineapple Margarita.</a></h3>
                                                                    <div class="post-date"><time
                                                                            class="entry-date published updated"
                                                                            datetime="2021-06-07T11:03:59+00:00">June 7,
                                                                            2021</time></div>
                                                                    <div class="post-info-dot"></div>
                                                                    <div class="post-read-time"><i class="fa fa-clock-o"
                                                                            aria-hidden="true"></i>53 min Cook</div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="template-grid-short">
                                                            <div class="cookandmeal-grid-post cookandmeal-grid-short-post cookandmeal-post format-standard"
                                                                data-aos="fade-up">
                                                                <div class="cookandmeal-post-image-wrapper"><a
                                                                        href="">
                                                                        <div class="cookandmeal-post-image"
                                                                            data-style="background-image: url(https://wp.wp-preview.com/cookandmeal/cookandmeal-1/wp-content/uploads/2021/07/qggc_1a6xgc-555x360.jpg);">
                                                                        </div>
                                                                    </a></div>
                                                                <div class="cookandmeal-post-details">
                                                                    <div class="post-categories"><a
                                                                            href=""
                                                                            data-style="background-color: #e5a484;"><i
                                                                                class="fa fa-tag cat-dot"></i><span
                                                                                class="cat-title">Pasta</span></a></div>
                                                                    <h3 class="post-title entry-title"><a
                                                                            href="">Broccoli
                                                                            Slaw slow cooking Recipe</a></h3>
                                                                    <div class="post-date"><time
                                                                            class="entry-date published updated"
                                                                            datetime="2021-06-07T11:00:10+00:00">June 7,
                                                                            2021</time></div>
                                                                    <div class="post-info-dot"></div>
                                                                    <div class="post-read-time"><i class="fa fa-clock-o"
                                                                            aria-hidden="true"></i>16 min Cook</div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="template-grid-short">
                                                            <div class="cookandmeal-grid-post cookandmeal-grid-short-post cookandmeal-post format-standard"
                                                                data-aos="fade-up">
                                                                <div class="cookandmeal-post-image-wrapper"><a
                                                                        href="">
                                                                        <div class="cookandmeal-post-image"
                                                                            data-style="background-image: url(https://wp.wp-preview.com/cookandmeal/cookandmeal-1/wp-content/uploads/2021/06/image-from-rawpixel-id-3249132-jpeg-555x360.jpg);">
                                                                        </div>
                                                                    </a></div>
                                                                <div class="cookandmeal-post-details">
                                                                    <div class="post-categories"><a
                                                                            href=""
                                                                            data-style="background-color: #8b84e5;"><i
                                                                                class="fa fa-tag cat-dot"></i><span
                                                                                class="cat-title">Chicken</span></a>
                                                                    </div>
                                                                    <h3 class="post-title entry-title"><a
                                                                            href="">Sheet
                                                                            Pan Cheesy Poblano Corn Enchiladas.</a></h3>
                                                                    <div class="post-date">
                                                                        <div class="post-sponsored-badge">Sponsored
                                                                        </div>
                                                                    </div>
                                                                    <div class="post-info-dot"></div>
                                                                    <div class="post-read-time"><i class="fa fa-clock-o"
                                                                            aria-hidden="true"></i>50 min Cook</div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="template-grid-short">
                                                            <div class="cookandmeal-grid-post cookandmeal-grid-short-post cookandmeal-post format-standard"
                                                                data-aos="fade-up">
                                                                <div class="cookandmeal-post-image-wrapper"><a
                                                                        href="">
                                                                        <div class="cookandmeal-post-image"
                                                                            data-style="background-image: url(https://wp.wp-preview.com/cookandmeal/cookandmeal-1/wp-content/uploads/2021/06/becca-tapert-RjmGzTg4_mw-unsplash-555x360.jpg);">
                                                                        </div>
                                                                    </a></div>
                                                                <div class="cookandmeal-post-details">
                                                                    <div class="post-categories"><a
                                                                            href="https://wp.wp-preview.com/cookandmeal/cookandmeal-1/category/easy/"
                                                                            data-style="background-color: #84a6e5;"><i
                                                                                class="fa fa-tag cat-dot"></i><span
                                                                                class="cat-title">Easy</span></a></div>
                                                                    <h3 class="post-title entry-title"><a
                                                                            href="">Almond
                                                                            Flour Pancakes in Summer</a></h3>
                                                                    <div class="post-date"><time
                                                                            class="entry-date published updated"
                                                                            datetime="2021-06-05T11:01:50+00:00">June 5,
                                                                            2021</time></div>
                                                                    <div class="post-info-dot"></div>
                                                                    <div class="post-read-time"><i class="fa fa-clock-o"
                                                                            aria-hidden="true"></i>23 min Cook</div>
                                                                </div>
                                                            </div>
                                                        </li>

                                                    </ul>
                                                </li>
                                            </ul> -->
                                        </li>
                                        <!-- <li id="mgt-menu-item-129"
                                            class="menu-item menu-item-type-taxonomy menu-item-object-category"><a
                                                href=""><i
                                                    class="fa fa-thumbs-o-up"></i>Easy</a></li> -->
                                        <li id="mgt-menu-item-510"
                                            class="menu-item menu-item-type-post_type menu-item-object-page"><a
                                                href="">About</a>
                                        </li>
                                        <li id="mgt-menu-item-936"
                                            class="menu-item menu-item-type-post_type menu-item-object-page"><a
                                                href="">Contact</a>
                                        </li>

                                        <li id="mgt-menu-item-404"
                                            class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home current-menu-ancestor menu-item-has-children">
                                            <a href="javascript:void(0)">Verification</a>
                                            <ul class="sub-menu  megamenu-column-1 level-0">
                                               
                                                <li id="mgt-menu-item-683"
                                                    class="menu-item menu-item-type-custom menu-item-object-custom"><a
                                                        href="studentverification.php"> Student Admit Card </a></li>
                                                <li id="mgt-menu-item-684"
                                                    class="menu-item menu-item-type-custom menu-item-object-custom"><a
                                                        href="studentresult.php">Student Result</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

            </div>



            <div class="row">
                <div class="col-md-12">

                    <div class="header-left">
                        <div class="social-icons-wrapper no-description"><a href="https://facebook.com/" target="_blank"
                                class="a-facebook no-description"><i class="fa fa-facebook"></i></a><a
                                href="https://www.pinterest.com/" target="_blank" class="a-pinterest no-description"><i
                                    class="fa fa-pinterest"></i></a><a href="https://instagram.com/" target="_blank"
                                class="a-instagram no-description"><i class="fa fa-instagram"></i></a><a
                                href="https://youtube.com/" target="_blank" class="a-youtube no-description"><i
                                    class="fa fa-youtube"></i></a></div>
                    </div>

                    <div class="header-center">
                        <div class="mainmenu-mobile-toggle"><i class="fa fa-bars" aria-hidden="true"></i></div>
                        <div class="logo"><a class="logo-link logo-text"
                                href=""><img class="logoMain" src="assets/images//logo.jpeg" alt="logo"> </a>
                            <div class="header-blog-info header-blog-info-regular">Best Hotel Management & Culanary Intitute</div>
                        </div>

                    </div>

                    <div class="header-right">
                        <div class="search-toggle-wrapper closed-search search-enable">
                            <a class="search-toggle-btn" aria-label="Search toggle"><i class="fa fa-search"
                                    aria-hidden="true"></i></a>
                            <div class="header-center-search-form">
                                <form method="get" role="search" class="searchform"
                                    action="">
                                    <input type="search" aria-label="Search" class="field" name="s" value=""
                                        placeholder="Type keyword(s) here…"><input type="submit" class="submit btn"
                                        value="Search">
                                </form>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </header>

    <section class="">
        <div class="containerCustom">
            <div class="breadcrumb">
                <a href="index.php">HOME</a> &gt; <a href="blog.php">BLOG</a> &gt; <a href="#">RECIPE</a>
                <?php $imageBasePath = "uploads/blogImages/"; ?>
                <div class="blog-content blog-switch-layout blog-list">
                    <div class="postarticles">
                    <h2 class="postarticles_heading"><?php echo $post['title']; ?></h2>
                        <img class="postarticles_img" src="<?php echo $imageBasePath . $post['image']; ?>" alt="blog-image">
                        <div>
                         
                            <p><?php echo $post['description']; ?></p>
                        </div>
                    </div>
                    <p><?php echo $post['content']; ?></p>
                </div>
            </div>
        </div>

    </section>

    <div class="footer-sidebar-wrapper footer-white">
        <div class="footer-sidebar sidebar container footer-sidebar-container">
            <div class="footer-separator"></div>
            <ul id="footer-sidebar">
                <li id="cookandmeal-text-3" class="widget widget_cookandmeal_text">
                    <div class="cookandmeal-textwidget-wrapper ">
                        <div class="cookandmeal-textwidget"
                            data-style="background-image: url(https://wp.wp-preview.com/cookandmeal/cookandmeal-1/wp-content/uploads/2021/07/image-from-rawpixel-id-2409368-png-2.png);background-color: #f1eee4;padding: 30px 30px 30px 30px;text-align: left;">
                            <h4>About</h4>
                            <p>I create simple, delicious recipes that require 10 ingredients or less, one bowl, or 30
                                minutes or less to prepare.</p><a class="btn"
                                href=""
                                target="_self">Contact</a>
                        </div>
                    </div>
                </li>
                <li id="cookandmeal-list-posts-3" class="widget widget_cookandmeal_list_entries">
                    <h2 class="widgettitle">Latest Recipes</h2>
                    <ul class="template-shortline-inside">

                        <li class="template-shortline">
                            <div class="cookandmeal-shortline-post cookandmeal-post" data-aos="fade-up">
                                <div class="cookandmeal-post-image-wrapper"><a
                                        href="">
                                        <div class="cookandmeal-post-image"
                                            data-style="background-image: url(https://wp.wp-preview.com/cookandmeal/cookandmeal-1/wp-content/uploads/2021/07/cqh5qqjffka-220x180.jpg);">
                                        </div>
                                    </a></div>
                                <div class="cookandmeal-post-details">
                                    <h3 class="post-title entry-title"><a
                                            href="">Spicy
                                            Serrano Pineapple Margarita.</a></h3>
                                    <div class="post-date"><time class="entry-date published updated"
                                            datetime="2021-06-07T11:03:59+00:00">June 7, 2021</time></div>
                                </div>
                            </div>
                        </li>
                        <li class="template-shortline">
                            <div class="cookandmeal-shortline-post cookandmeal-post" data-aos="fade-up">
                                <div class="cookandmeal-post-image-wrapper"><a
                                        href="">
                                        <div class="cookandmeal-post-image"
                                            data-style="background-image: url(https://wp.wp-preview.com/cookandmeal/cookandmeal-1/wp-content/uploads/2021/07/qggc_1a6xgc-220x180.jpg);">
                                        </div>
                                    </a></div>
                                <div class="cookandmeal-post-details">
                                    <h3 class="post-title entry-title"><a
                                            href="">Broccoli
                                            Slaw slow cooking Recipe</a></h3>
                                    <div class="post-date"><time class="entry-date published updated"
                                            datetime="2021-06-07T11:00:10+00:00">June 7, 2021</time></div>
                                </div>
                            </div>
                        </li>

                    </ul>
                </li>
                <li id="cookandmeal-categories-3" class="widget widget_cookandmeal_categories">
                    <h2 class="widgettitle">Categories</h2>
                    <div class="post-categories-list">
                        <div class="cookandmeal-post cookandmeal-image-wrapper with-bg"><a
                                href=""
                                class="cookandmeal-featured-category-link">
                                <div class="post-categories-image cookandmeal-image"
                                    data-style="background-image: url(https://wp.wp-preview.com/cookandmeal/cookandmeal-1/wp-content/uploads/2021/05/6rjct18g_3i.jpg);">
                                </div>
                                <div class="post-categories-overlay">
                                    <div class="post-categories-bg" data-style="background-color: #e584b9;"></div>
                                    <div class="post-categories">
                                        <div class="post-category"><i class="fa fa-tag cat-dot"
                                                aria-hidden="true"></i><span class="cat-title">Basics</span></div>
                                    </div>
                                    <span class="post-categories-counter">4 Posts</span>
                                </div>
                            </a>
                        </div>
                        <div class="cookandmeal-post cookandmeal-image-wrapper with-bg"><a
                                href=""
                                class="cookandmeal-featured-category-link">
                                <div class="post-categories-image cookandmeal-image"
                                    data-style="background-image: url(https://wp.wp-preview.com/cookandmeal/cookandmeal-1/wp-content/uploads/2021/05/zyx6a0reb18.jpg);">
                                </div>
                                <div class="post-categories-overlay">
                                    <div class="post-categories-bg" data-style="background-color: #8b84e5;"></div>
                                    <div class="post-categories">
                                        <div class="post-category"><i class="fa fa-tag cat-dot"
                                                aria-hidden="true"></i><span class="cat-title">Chicken</span></div>
                                    </div>
                                    <span class="post-categories-counter">4 Posts</span>
                                </div>
                            </a>
                        </div>
                        <div class="cookandmeal-post cookandmeal-image-wrapper with-bg"><a
                                href=""
                                class="cookandmeal-featured-category-link">
                                <div class="post-categories-image cookandmeal-image"
                                    data-style="background-image: url(https://wp.wp-preview.com/cookandmeal/cookandmeal-1/wp-content/uploads/2021/05/1rm9glhv0ua.jpg);">
                                </div>
                                <div class="post-categories-overlay">
                                    <div class="post-categories-bg" data-style="background-color: #84a6e5;"></div>
                                    <div class="post-categories">
                                        <div class="post-category"><i class="fa fa-tag cat-dot"
                                                aria-hidden="true"></i><span class="cat-title">Easy</span></div>
                                    </div>
                                    <span class="post-categories-counter">6 Posts</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </li>
                <li id="cookandmeal-text-10" class="widget widget_cookandmeal_text">
                    <div class="cookandmeal-textwidget-wrapper ">
                        <h2 class="widgettitle">Subscribe to us</h2>
                        <div class="cookandmeal-textwidget" data-style="">
                            <p>Enter your email address below to subscribe to my newsletter</p>
                            <script>
                                (function() {
                                    window.mc4wp = window.mc4wp || {
                                        listeners: [],
                                        forms: {
                                            on: function(evt, cb) {
                                                window.mc4wp.listeners.push({
                                                    event: evt,
                                                    callback: cb
                                                });
                                            }
                                        }
                                    }
                                })();
                            </script><!-- Mailchimp for WordPress v4.8.6 - https://wordpress.org/plugins/mailchimp-for-wp/ -->
                            <form id="mc4wp-form-3" class="mc4wp-form mc4wp-form-9" method="post" data-id="9"
                                data-name="Subscribe">
                                <div class="mc4wp-form-fields">
                                    <div class="mailchimp-widget-signup-form"><input type="email" name="EMAIL"
                                            placeholder="Please enter your e-mail" required=""><button type="submit"
                                            class="btn">Subscribe
                                        </button>
                                    </div>
                                </div><label style="display: none !important;">Leave this field empty if you're human:
                                    <input type="text" name="_mc4wp_honeypot" value="" tabindex="-1"
                                        autocomplete="off"></label><input type="hidden" name="_mc4wp_timestamp"
                                    value="1644248808"><input type="hidden" name="_mc4wp_form_id" value="9"><input
                                    type="hidden" name="_mc4wp_form_element_id" value="mc4wp-form-3">
                                <div class="mc4wp-response"></div>
                            </form><!-- / Mailchimp for WordPress Plugin -->
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <div class="footer-wrapper">
        <footer class="main-footer footer-white">
            <div class="container">
                <div class="footer-separator"></div>

                <div class="footer-social">
                    <div class="social-icons-wrapper social-icons-with-bg"><a href="https://facebook.com/"
                            target="_blank" class="a-facebook no-description"><i class="fa fa-facebook"></i></a><a
                            href="https://www.pinterest.com/" target="_blank" class="a-pinterest no-description"><i
                                class="fa fa-pinterest"></i></a><a href="https://instagram.com/" target="_blank"
                            class="a-instagram no-description"><i class="fa fa-instagram"></i></a><a
                            href="https://youtube.com/" target="_blank" class="a-youtube no-description"><i
                                class="fa fa-youtube"></i></a></div>
                </div>


                <div class="footer-copyright">
                    Powered by <a href="https://magniumthemes.com/go/purchase-cookandmeal/" target="_blank"
                        rel="noopener">CookAndMeal</a> - Food Blog &amp; Recipe WordPress Theme </div>

            </div>
        </footer>
    </div>

    <a class="scroll-to-top" aria-label="Scroll to top" href="#top"></a>


    <script type="text/javascript">
        window.RS_MODULES = window.RS_MODULES || {};
        window.RS_MODULES.modules = window.RS_MODULES.modules || {};
        window.RS_MODULES.waiting = window.RS_MODULES.waiting || [];
        window.RS_MODULES.defered = true;
        window.RS_MODULES.moduleWaiting = window.RS_MODULES.moduleWaiting || {};
        window.RS_MODULES.type = 'compiled';
    </script>
    <script>
        (function() {
            function maybePrefixUrlField() {
                if (this.value.trim() !== '' && this.value.indexOf('http') !== 0) {
                    this.value = "http://" + this.value;
                }
            }

            var urlFields = document.querySelectorAll('.mc4wp-form input[type="url"]');
            if (urlFields) {
                for (var j = 0; j < urlFields.length; j++) {
                    urlFields[j].addEventListener('blur', maybePrefixUrlField);
                }
            }
        })();
    </script><!-- Instagram Feed JS -->
    <script type="text/javascript">
        var sbiajaxurl = "https://wp.wp-preview.com/cookandmeal/cookandmeal-1/wp-admin/admin-ajax.php";
    </script>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 0 0" width="0" height="0" focusable="false" role="none"
        style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;">
        <defs>
            <filter id="wp-duotone-dark-grayscale">
                <feColorMatrix color-interpolation-filters="sRGB" type="matrix"
                    values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 ">
                </feColorMatrix>
                <feComponentTransfer color-interpolation-filters="sRGB">
                    <feFuncR type="table" tableValues="0 0.49803921568627"></feFuncR>
                    <feFuncG type="table" tableValues="0 0.49803921568627"></feFuncG>
                    <feFuncB type="table" tableValues="0 0.49803921568627"></feFuncB>
                    <feFuncA type="table" tableValues="1 1"></feFuncA>
                </feComponentTransfer>
                <feComposite in2="SourceGraphic" operator="in"></feComposite>
            </filter>
        </defs>
    </svg><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 0 0" width="0" height="0" focusable="false" role="none"
        style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;">
        <defs>
            <filter id="wp-duotone-grayscale">
                <feColorMatrix color-interpolation-filters="sRGB" type="matrix"
                    values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 ">
                </feColorMatrix>
                <feComponentTransfer color-interpolation-filters="sRGB">
                    <feFuncR type="table" tableValues="0 1"></feFuncR>
                    <feFuncG type="table" tableValues="0 1"></feFuncG>
                    <feFuncB type="table" tableValues="0 1"></feFuncB>
                    <feFuncA type="table" tableValues="1 1"></feFuncA>
                </feComponentTransfer>
                <feComposite in2="SourceGraphic" operator="in"></feComposite>
            </filter>
        </defs>
    </svg><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 0 0" width="0" height="0" focusable="false" role="none"
        style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;">
        <defs>
            <filter id="wp-duotone-purple-yellow">
                <feColorMatrix color-interpolation-filters="sRGB" type="matrix"
                    values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 ">
                </feColorMatrix>
                <feComponentTransfer color-interpolation-filters="sRGB">
                    <feFuncR type="table" tableValues="0.54901960784314 0.98823529411765"></feFuncR>
                    <feFuncG type="table" tableValues="0 1"></feFuncG>
                    <feFuncB type="table" tableValues="0.71764705882353 0.25490196078431"></feFuncB>
                    <feFuncA type="table" tableValues="1 1"></feFuncA>
                </feComponentTransfer>
                <feComposite in2="SourceGraphic" operator="in"></feComposite>
            </filter>
        </defs>
    </svg><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 0 0" width="0" height="0" focusable="false" role="none"
        style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;">
        <defs>
            <filter id="wp-duotone-blue-red">
                <feColorMatrix color-interpolation-filters="sRGB" type="matrix"
                    values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 ">
                </feColorMatrix>
                <feComponentTransfer color-interpolation-filters="sRGB">
                    <feFuncR type="table" tableValues="0 1"></feFuncR>
                    <feFuncG type="table" tableValues="0 0.27843137254902"></feFuncG>
                    <feFuncB type="table" tableValues="0.5921568627451 0.27843137254902"></feFuncB>
                    <feFuncA type="table" tableValues="1 1"></feFuncA>
                </feComponentTransfer>
                <feComposite in2="SourceGraphic" operator="in"></feComposite>
            </filter>
        </defs>
    </svg><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 0 0" width="0" height="0" focusable="false" role="none"
        style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;">
        <defs>
            <filter id="wp-duotone-midnight">
                <feColorMatrix color-interpolation-filters="sRGB" type="matrix"
                    values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 ">
                </feColorMatrix>
                <feComponentTransfer color-interpolation-filters="sRGB">
                    <feFuncR type="table" tableValues="0 0"></feFuncR>
                    <feFuncG type="table" tableValues="0 0.64705882352941"></feFuncG>
                    <feFuncB type="table" tableValues="0 1"></feFuncB>
                    <feFuncA type="table" tableValues="1 1"></feFuncA>
                </feComponentTransfer>
                <feComposite in2="SourceGraphic" operator="in"></feComposite>
            </filter>
        </defs>
    </svg><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 0 0" width="0" height="0" focusable="false" role="none"
        style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;">
        <defs>
            <filter id="wp-duotone-magenta-yellow">
                <feColorMatrix color-interpolation-filters="sRGB" type="matrix"
                    values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 ">
                </feColorMatrix>
                <feComponentTransfer color-interpolation-filters="sRGB">
                    <feFuncR type="table" tableValues="0.78039215686275 1"></feFuncR>
                    <feFuncG type="table" tableValues="0 0.94901960784314"></feFuncG>
                    <feFuncB type="table" tableValues="0.35294117647059 0.47058823529412"></feFuncB>
                    <feFuncA type="table" tableValues="1 1"></feFuncA>
                </feComponentTransfer>
                <feComposite in2="SourceGraphic" operator="in"></feComposite>
            </filter>
        </defs>
    </svg><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 0 0" width="0" height="0" focusable="false" role="none"
        style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;">
        <defs>
            <filter id="wp-duotone-purple-green">
                <feColorMatrix color-interpolation-filters="sRGB" type="matrix"
                    values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 ">
                </feColorMatrix>
                <feComponentTransfer color-interpolation-filters="sRGB">
                    <feFuncR type="table" tableValues="0.65098039215686 0.40392156862745"></feFuncR>
                    <feFuncG type="table" tableValues="0 1"></feFuncG>
                    <feFuncB type="table" tableValues="0.44705882352941 0.4"></feFuncB>
                    <feFuncA type="table" tableValues="1 1"></feFuncA>
                </feComponentTransfer>
                <feComposite in2="SourceGraphic" operator="in"></feComposite>
            </filter>
        </defs>
    </svg><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 0 0" width="0" height="0" focusable="false" role="none"
        style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;">
        <defs>
            <filter id="wp-duotone-blue-orange">
                <feColorMatrix color-interpolation-filters="sRGB" type="matrix"
                    values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 ">
                </feColorMatrix>
                <feComponentTransfer color-interpolation-filters="sRGB">
                    <feFuncR type="table" tableValues="0.098039215686275 1"></feFuncR>
                    <feFuncG type="table" tableValues="0 0.66274509803922"></feFuncG>
                    <feFuncB type="table" tableValues="0.84705882352941 0.41960784313725"></feFuncB>
                    <feFuncA type="table" tableValues="1 1"></feFuncA>
                </feComponentTransfer>
                <feComposite in2="SourceGraphic" operator="in"></feComposite>
            </filter>
        </defs>
    </svg>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400%7CAleo:700%7CBarlow:400%7CMontserrat:400"
        rel="stylesheet" property="stylesheet" media="all" type="text/css">

    <script type="text/javascript">
        (function() {
            var c = document.body.className;
            c = c.replace(/woocommerce-no-js/, 'woocommerce-js');
            document.body.className = c;
        })();
    </script>
    <script type="text/javascript">
        if (typeof revslider_showDoubleJqueryError === "undefined") {
            function revslider_showDoubleJqueryError(sliderID) {
                console.log("You have some jquery.js library include that comes after the Slider Revolution files js inclusion.");
                console.log("To fix this, you can:");
                console.log("1. Set 'Module General Options' -> 'Advanced' -> 'jQuery & OutPut Filters' -> 'Put JS to Body' to on");
                console.log("2. Find the double jQuery.js inclusion and remove it");
                return "Double Included jQuery Library";
            }
        }
    </script>
    <link rel="preload" as="font" id="rs-icon-set-fa-icon-woff" type="font/woff2" crossorigin="anonymous"
        href="https://wp.wp-preview.com/cookandmeal/cookandmeal-1/wp-content/plugins/revslider/public/assets/fonts/font-awesome/fonts/fontawesome-webfont.woff2?v=4.7.0"
        media="all">
    <link rel="stylesheet" href="assets/css/46551.css" media="all">


    <style id="rs-plugin-settings-inline-css">
        #rs-demo-id {}
    </style>


    <script src="assets/js/b9b42.js"></script>

    <script id="contact-form-7-js-extra">
        var wpcf7 = {
            "api": {
                "root": "https:\/\/wp.wp-preview.com\/cookandmeal\/cookandmeal-1\/wp-json\/",
                "namespace": "contact-form-7\/v1"
            },
            "cached": "1"
        };
    </script>
    <script src="assets/js/2da7c.js"></script>



    <script id="cookie-consent-js-extra">
        var ctcc_vars = {
            "expiry": "30",
            "method": "1",
            "version": "1"
        };
    </script>

    <script src="assets/js/99873.js"></script>

    <script id="wc-add-to-cart-js-extra">
        var wc_add_to_cart_params = {
            "ajax_url": "\/cookandmeal\/cookandmeal-1\/wp-admin\/admin-ajax.php",
            "wc_ajax_url": "\/cookandmeal\/cookandmeal-1\/?wc-ajax=%%endpoint%%",
            "i18n_view_cart": "View cart",
            "cart_url": "https:\/\/wp.wp-preview.com\/cookandmeal\/cookandmeal-1\/cart\/",
            "is_cart": "",
            "cart_redirect_after_add": "no"
        };
    </script>

    <script src="assets/js/56d47.js"></script>

    <script id="woocommerce-js-extra">
        var woocommerce_params = {
            "ajax_url": "\/cookandmeal\/cookandmeal-1\/wp-admin\/admin-ajax.php",
            "wc_ajax_url": "\/cookandmeal\/cookandmeal-1\/?wc-ajax=%%endpoint%%"
        };
    </script>
    <script src="assets/js/8d7c2.js"></script>

    <script id="wc-cart-fragments-js-extra">
        var wc_cart_fragments_params = {
            "ajax_url": "\/cookandmeal\/cookandmeal-1\/wp-admin\/admin-ajax.php",
            "wc_ajax_url": "\/cookandmeal\/cookandmeal-1\/?wc-ajax=%%endpoint%%",
            "cart_hash_key": "wc_cart_hash_d3a8edf8775a4bb053f99a2d163faad2",
            "fragment_name": "wc_fragments_d3a8edf8775a4bb053f99a2d163faad2",
            "request_timeout": "5000"
        };
    </script>
    <script src="assets/js/1ba31.js"></script>

    <script id="ppress-frontend-script-js-extra">
        var pp_ajax_form = {
            "ajaxurl": "https:\/\/wp.wp-preview.com\/cookandmeal\/cookandmeal-1\/wp-admin\/admin-ajax.php",
            "confirm_delete": "Are you sure?",
            "deleting_text": "Deleting...",
            "deleting_error": "An error occurred. Please try again.",
            "nonce": "7666e1c371",
            "disable_ajax_form": "false"
        };
    </script>



    <script src="assets/js/0d7c7.js"></script>

    <script id="thickbox-js-extra">
        var thickboxL10n = {
            "next": "Next >",
            "prev": "< Prev",
            "image": "Image",
            "of": "of",
            "close": "Close",
            "noiframes": "This feature requires inline frames. You have iframes disabled or your browser does not support them.",
            "loadingAnimation": "https:\/\/wp.wp-preview.com\/cookandmeal\/cookandmeal-1\/wp-includes\/js\/thickbox\/loadingAnimation.gif"
        };
    </script>





    <script src="assets/js/3cee1.js"></script>

    <script id="cookandmeal-script-js-after">
        (function($) {
            $(document).ready(function($) {

                'use strict';

                $('body').on('click', '.cookandmeal-post .post-like-button', function(e) {

                    e.preventDefault();
                    e.stopPropagation();

                    var postlikes = $(this).next('.post-like-counter').text();
                    var postid = $(this).data('id');

                    if (getCookie('cookandmeal-likes-for-post-' + postid) == 1) {
                        // Already liked
                    } else {

                        setCookie('cookandmeal-likes-for-post-' + postid, '1', 365);

                        $(this).children('i').attr('class', 'fa fa-heart');

                        $(this).next('.post-like-counter').text(parseInt(postlikes) + 1);

                        var data = {
                            action: 'cookandmeal_likes',
                            postid: postid,
                        };

                        var ajaxurl = 'https://wp.wp-preview.com/cookandmeal/cookandmeal-1/wp-admin/admin-ajax.php';

                        $.post(ajaxurl, data, function(response) {

                            var wpdata = response;

                        });
                    }

                });

            });
        })(jQuery);
        (function($) {
            $(document).ready(function() {

                "use strict";

                var owlpostslider = $(".cookandmeal-featured-categories-wrapper-610341 .owl-carousel").owlCarousel({
                    loop: true,
                    items: 6,
                    margin: 30,
                    autoplay: true,
                    autowidth: false,
                    autoplaySpeed: 1000,
                    navSpeed: 5000,
                    nav: false,
                    dots: false,
                    navText: false,
                    responsive: {
                        1199: {
                            items: 6
                        },
                        1024: {
                            items: 4
                        },
                        979: {
                            items: 4
                        },
                        768: {
                            items: 2
                        },
                        479: {
                            items: 1
                        },
                        0: {
                            items: 1
                        }
                    }
                });

                AOS.refresh();

            });
        })(jQuery);
        (function($) {
            $(document).ready(function() {

                "use strict";

                var owlpostslider = $(".cookandmeal-posthighlight-block.cookandmeal-posthighlight-block-738427.owl-carousel").owlCarousel({
                    onInitialized: function() {
                        window.dispatchEvent(new Event("resize"));
                    },
                    loop: true,
                    items: 1,
                    autoplay: true,
                    autowidth: false,
                    autoplaySpeed: 1000,
                    navSpeed: 1000,
                    nav: false,
                    dots: true,
                    navText: false,
                    responsive: {
                        1199: {
                            items: 1
                        },
                        979: {
                            items: 1
                        },
                        768: {
                            items: 1
                        },
                        479: {
                            items: 1
                        },
                        0: {
                            items: 1
                        }
                    }
                });

                AOS.refresh();

            });
        })(jQuery);
        (function($) {
            $(document).ready(function() {

                "use strict";

                var owlpostslider = $(".cookandmeal-postline2-block.cookandmeal-postline-block-270087 .owl-carousel").owlCarousel({
                    onInitialized: function() {
                        window.dispatchEvent(new Event("resize"));
                    },
                    loop: true,
                    items: 4,
                    autoplay: true,
                    autowidth: false,
                    autoplaySpeed: 1000,
                    navSpeed: 5000,
                    nav: false,
                    dots: false,
                    navText: false,
                    responsive: {
                        1199: {
                            items: 4
                        },
                        979: {
                            items: 3
                        },
                        768: {
                            items: 2
                        },
                        479: {
                            items: 1
                        },
                        0: {
                            items: 1
                        }
                    }
                });

                AOS.refresh();

            });
        })(jQuery);
        (function($) {
            $(document).ready(function() {

                var owlpostslider = $(".cookandmeal-carousel-block.cookandmeal-carousel-block-155152 .owl-carousel").owlCarousel({
                    onInitialized: function() {
                        window.dispatchEvent(new Event("resize"));
                    },
                    loop: true,
                    items: 4,
                    autoplay: true,
                    autowidth: false,
                    autoplaySpeed: 500,
                    navSpeed: 500,
                    margin: 30,
                    nav: false,
                    dots: false,
                    navText: false,
                    slideBy: 4,
                    responsive: {
                        1199: {
                            items: 4,
                            slideBy: 4
                        },
                        979: {
                            items: 4,
                            slideBy: 4
                        },
                        768: {
                            items: 2,
                            slideBy: 1
                        },
                        479: {
                            items: 1,
                            slideBy: 1
                        },
                        0: {
                            items: 1,
                            slideBy: 1
                        }
                    }
                });

                AOS.refresh();

            });
        })(jQuery);
    </script>
    <script src="assets/js/439a5.js"></script>

    <script id="sb_instagram_scripts-js-extra">
        var sb_instagram_js_options = {
            "font_method": "svg",
            "resized_url": "https:\/\/wp.wp-preview.com\/cookandmeal\/cookandmeal-1\/wp-content\/uploads\/sb-instagram-feed-images\/",
            "placeholder": "https:\/\/wp.wp-preview.com\/cookandmeal\/cookandmeal-1\/wp-content\/plugins\/instagram-feed\/img\/placeholder.png"
        };
    </script>
    <script src="assets/js/bc371.js"></script>

    <script defer="" src="assets/js/73fd0.js"></script>

    <script type="text/javascript" id="rs-initialisation-scripts">
        var tpj = jQuery;

        var revapi5;

        if (window.RS_MODULES === undefined) window.RS_MODULES = {};
        if (RS_MODULES.modules === undefined) RS_MODULES.modules = {};
        RS_MODULES.modules["revslider51"] = {
            init: function() {
                revapi5 = jQuery("#rev_slider_5_1");
                if (revapi5 == undefined || revapi5.revolution == undefined) {
                    revslider_showDoubleJqueryError("rev_slider_5_1");
                    return;
                }
                revapi5.revolutionInit({
                    DPR: "dpr",
                    sliderLayout: "fullwidth",
                    duration: "7000ms",
                    visibilityLevels: "1240,1024,778,480",
                    gridwidth: "1240,1024,778,480",
                    gridheight: "600,768,960,720",
                    lazyType: "smart",
                    perspective: 600,
                    perspectiveType: "global",
                    editorheight: "600,768,960,720",
                    responsiveLevels: "1240,1024,778,480",
                    stopAtSlide: 1,
                    stopAfterLoops: 0,
                    stopLoop: true,
                    progressBar: {
                        disableProgressBar: true
                    },
                    navigation: {
                        onHoverStop: false
                    },
                    parallax: {
                        levels: [5, 10, 15, 20, 25, 30, 35, 40, 45, 46, 47, 48, 49, 50, 51, 30],
                        type: "mouse",
                        origo: "slidercenter",
                        speed: 0
                    },
                    scrolleffect: {
                        set: true,
                        blur: true,
                        multiplicator: 1.3,
                        multiplicator_layers: 1.3
                    },
                    viewPort: {
                        global: true,
                        globalDist: "-200px",
                        enable: true,
                        visible_area: "-200px"
                    },
                    fallbacks: {
                        allowHTML5AutoPlayOnAndroid: true
                    },
                });

            }
        } // End of RevInitScript

        if (window.RS_MODULES.checkMinimal !== undefined) {
            window.RS_MODULES.checkMinimal();
        };
    </script>

    <script type="text/javascript">
        jQuery(document).ready(function($) {
            if (!catapultReadCookie("catAccCookies")) { // If the cookie has not been set then show the bar
                $("html").addClass("has-cookie-bar");
                $("html").addClass("cookie-bar-bottom-left-block");
                $("html").addClass("cookie-bar-block");
            }
        });
    </script>

    <div id="catapult-cookie-bar" class="">
        <h3></h3><span class="ctcc-left-side">Our site uses cookies. Learn more about our use of cookies: <a
                class="ctcc-more-info-link" tabindex="0" target="_blank"
                href="">Cookie policy</a></span><span
            class="ctcc-right-side"><button id="catapultCookie" tabindex="0" onclick="catapultAcceptCookies();">Okay,
                thanks</button></span>
    </div><!-- #catapult-cookie-bar -->


</body>

</html>