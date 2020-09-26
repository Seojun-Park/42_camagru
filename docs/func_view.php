<?php
function view($template)
{
    if (is_file($template)) {
        ob_start();
        include $template;
        return ob_get_clean();
    }
    return new Exception("Template not found");
}
?>
