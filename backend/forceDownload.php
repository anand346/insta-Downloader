<?php

function forceDownload($remoteUrl, $fileName){

    $context_options = array(
        "ssl" => array(
            "verify_peer" => false,
            "verify_peer_name" => false,
        ),
    );
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . $fileName . '"');
    header("Content-Transfer-Encoding: binary");
    header('Expires: 0');
    header('Pragma: public');
    if (isset($_SERVER['HTTP_REQUEST_USER_AGENT']) && strpos($_SERVER['HTTP_REQUEST_USER_AGENT'], 'MSIE') !== FALSE) {
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
    }
    header('Connection: Close');
    ob_clean();
    flush();
    readfile($remoteUrl, "", stream_context_create($context_options));
    exit;

}

if(isset($_GET['url'])){
    forceDownload($_GET['url'],"helloDownload.mp4");
}


// if($_POST['url'] != ''){
//     // $domain = str_ireplace('www.', '', parse_url($_POST['url'], PHP_URL_HOST));
//     // if (!empty(explode('.', str_ireplace('www.', '', parse_url($_POST['url'], PHP_URL_HOST)))[1])) {
//     //     $mainDomain = explode('.', str_ireplace('www.', '', parse_url($_POST['url'], PHP_URL_HOST)))[1];
//     // } else {
//     //     $mainDomain = null;
//     // }
//     // if ($domain != 'instagram.com') {
//     //     $error[] = 'URL host must be instagram.com';
//     //     die(json_encode($error));
//     // }else{
//         preg_match("/(http[s]*:\/\/)([a-z\-_0-9\/.]+)\.([a-z.]{2,3})\/([a-z0-9\-_\/._~:?#\[\]@!$&'()*+,;=%]*)([a-z0-9]+\.)(mp4)/i",$_POST['url'],$matches);
//         $video_url = $matches[0];
//         $video_url = explode("/",$video_url);
//         $video_name = end($video_url);
//         forceDownload($_POST['url'],$video_name);
//         echo "true";
//     // }
// }



?>