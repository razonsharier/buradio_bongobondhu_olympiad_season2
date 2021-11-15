<?php
$canonical_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$website_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";

?>
    <!-- facebook card start -->
    <meta property="og:url" content="<?php echo $canonical_link; ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="বঙ্গবন্ধু অলিম্পিয়াড (সিজন-২) - BURADiO" />
    <meta property="og:description" content="বঙ্গবন্ধু অলিম্পিয়াড (সিজন-২)। রেজিস্ট্রেশন চলবে ১৭শে আগস্ট থেকে ১৯শে আগস্ট পর্যন্ত। প্রথম রাউন্ড ২০শে আগস্ট এবং ২য় রাউন্ড ২১শে আগস্ট।" />
    <meta property="og:image" content="<?php echo $website_link; ?>/media/banner.jpg" />
    <!-- // facebook card end -->

    <!-- twitter card start -->
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@buradio" />
    <meta name="twitter:title" content="বঙ্গবন্ধু অলিম্পিয়াড (সিজন-২) - BURADiO" />
    <meta name="twitter:description" content="বঙ্গবন্ধু অলিম্পিয়াড (সিজন-২)। রেজিস্ট্রেশন চলবে ১৭শে আগস্ট থেকে ১৯শে আগস্ট পর্যন্ত। প্রথম রাউন্ড ২০শে আগস্ট এবং ২য় রাউন্ড ২১শে আগস্ট।" />
    <meta name="twitter:image" content="<?php echo $website_link; ?>/media/banner.jpg" />
    <!-- // twitter card end -->

