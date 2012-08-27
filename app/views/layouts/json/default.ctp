<?php
header("Pragma: no-cache");
header("Cache-Control: no-store, no-cache, max-age=0, must-revalidate");
header('Content-Type: text/x-json');

if (strlen($content_for_layout) < 10024) {
    header("X-JSON: ".$content_for_layout);
}

echo $content_for_layout;
?>