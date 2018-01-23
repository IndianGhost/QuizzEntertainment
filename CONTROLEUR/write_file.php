<?php
function file_force_contents($filename, $data, $flags = 0)
{
    if (!is_dir(dirname($filename)))
        mkdir(dirname($filename) . '/', 0777, TRUE);
    return file_put_contents($filename, $data, $flags);
}

?>