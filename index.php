<?php
// Extract URI minus http://handlerdomain.com/
$full_url = urldecode($_SERVER['REQUEST_URI']);
// Extract urls we need
$l = strlen($full_url);
$p_referer = strpos ($full_url, 'referer=');
$p_dest_2 = $p_referer - 1;
$p_referer = strpos ($full_url, '=',$p_referer) + 1;
$url_referer = substr ($full_url , $p_referer);
$p_dest_1 = strpos ($full_url, '=') + 1;
$l = $p_dest_2 - $p_dest_1;
$url_dest = substr ($full_url , $p_dest_1, $l);

// Create self-posting form.
if ($url_referer != '') {
    echo '<html><head><META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW"></head><body>
    <form action="'.urldecode($url_referer).'" method="post" id="myform">
    <input type="hidden" name="ref_spoof" value="'.urldecode($url_dest).'">
    </form><script language="JavaScript"> document.getElementById('myform').submit();</script></body></html>';
} else {
    echo 'You must provide a referer';
}
?>
