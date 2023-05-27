<?php
    function redirect($url){
        header("Location: $url");
    }

    function msg_error2($text)
    {
    return die('<script type="text/javascript">Swal.fire("Thất Bại", "'.$text.'","error");</script>');
    }

    function msg_success($text, $url, $time)
{
    return die('<script type="text/javascript">Swal.fire("Thành Công", "'.$text.'","success");
    setTimeout(function(){ location.href = "'.$url.'" },'.$time.');</script>');
}
    function BASE_URL($url)
    {
    global $base_url;
    return $base_url.$url;
    }
?>