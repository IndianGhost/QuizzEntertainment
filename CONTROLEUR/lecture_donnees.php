<?php
function bye_XSS($value)
{
    echo nl2br(htmlspecialchars($value));
}

?>