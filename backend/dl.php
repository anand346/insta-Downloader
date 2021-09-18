<?php
    function getHtmlFromUrl($url){
        $agents = array(
            'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.7; rv:7.0.1) Gecko/20100101 Firefox/7.0.1',
            'Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.9.1.9) Gecko/20100508 SeaMonkey/2.0.4',
            'Mozilla/5.0 (Windows; U; MSIE 7.0; Windows NT 6.0; en-US)',
            'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_6_7; da-dk) AppleWebKit/533.21.1 (KHTML, like Gecko) Version/5.0.5 Safari/533.21.1'
         
        );
        $header = array();
        $header[0] = "Accept: text/xml,application/xml,application/xhtml+xml,";
        $header[0] .= "text/html;q=0.9,text/plain;q=0.8,image/png,*/*;q=0.5";
        $header[] = "Cache-Control: max-age=0";
        $header[] = "Connection: keep-alive";
        $header[] = "Keep-Alive: 300";
        $header[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
        $header[] = "Accept-Language: en-us,en;q=0.5";
        $header[] = "Pragma: ";
    //assign to the curl request.
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_AUTOREFERER,true);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch,CURLOPT_USERAGENT,$agents[array_rand($agents)]);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $html = curl_exec($ch);
        curl_close($ch);
        return $html;
    }
    
    function extractUsername($profileUrl){
        $url = $profileUrl;
        $profileArray = explode("/",$url);
        if(strpos($profileArray[3],"?")){
            $usernameArray = explode("?",$profileArray[3]);
            $username = $usernameArray[0];
        }else{
            $username = $profileArray[3];
        }
        return $username;
    }

    function getJsonData($url){

        $data = getHtmlFromUrl($url);
        $pattern = "/window._sharedData = (.*);/";
        preg_match($pattern,$data,$matches);
        $data = json_decode($matches[1],true);
        return $data;
    
    }

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


    function extractTags($jsonData){

        $tagsArr = array();
        $tagsEdgeString = $jsonData["entry_data"]["PostPage"][0]["graphql"]["shortcode_media"]["edge_media_to_caption"]["edges"];
        if(array_key_exists("0",$tagsEdgeString)){
            $tagsString = $jsonData["entry_data"]["PostPage"][0]["graphql"]["shortcode_media"]["edge_media_to_caption"]["edges"]["0"]["node"]["text"];
            preg_match_all("/#(.*)/",$tagsString,$tagMatches);
            $tagsArr = explode(" ",$tagMatches[0][0]);
        }else{
            $tagsArr[0] = "This post doesn't have any tags.";
        }
        return $tagsArr;

    }

    function getPhoto($jsonData){
        $contentUrl = array();
        if($jsonData["entry_data"]["PostPage"][0]["graphql"]["shortcode_media"]["__typename"] == "GraphImage"){
            // $imageUrl = $jsonData["entry_data"]["PostPage"][0]["graphql"]["shortcode_media"]["display_url"];
            $i = count($jsonData["entry_data"]["PostPage"][0]["graphql"]["shortcode_media"]["display_resources"]) - 1;
            $imageUrl = $jsonData["entry_data"]["PostPage"][0]["graphql"]["shortcode_media"]["display_resources"][$i]["src"];
            preg_match("/(http[s]*:\/\/)([a-z\-_0-9\/.]+)\.([a-z.]{2,3})\/([a-z0-9\-_\/._~:?#\[\]@!$&'()*+,;=%]*)([a-z0-9]+\.)(jpg|jpeg)/i",$imageUrl,$matches);
            $image_url = $matches[0];
            $image_url = explode("/",$image_url);
            $image_name = end($image_url);
            $image_media = getHtmlFromUrl($imageUrl);
            $fileHandle =  fopen($image_name,"wb");
            fwrite($fileHandle,$image_media);
            fclose($fileHandle);
            $contentUrl[0]['url'] = $imageUrl;
            $contentUrl[0]['display_url'] = "backend/".$image_name;
        }else if ($jsonData["entry_data"]["PostPage"][0]["graphql"]["shortcode_media"]["__typename"] == "GraphSidecar") {
            $children = $jsonData["entry_data"]["PostPage"][0]["graphql"]["shortcode_media"]["edge_sidecar_to_children"]["edges"];
            for($i = 0; $i < sizeof($children); $i++){
                $contentUrl[$i]['url'] = $jsonData["entry_data"]["PostPage"][0]["graphql"]["shortcode_media"]["edge_sidecar_to_children"]["edges"][$i]["node"]["display_url"];
                preg_match("/(http[s]*:\/\/)([a-z\-_0-9\/.]+)\.([a-z.]{2,3})\/([a-z0-9\-_\/._~:?#\[\]@!$&'()*+,;=%]*)([a-z0-9]+\.)(jpg|jpeg)/i",$contentUrl[$i]['url'],$matches);
                $image_url = $matches[0];
                $image_url = explode("/",$image_url);
                $image_name = end($image_url);
                $image_media = getHtmlFromUrl($contentUrl[$i]['url']);
                $fileHandle =  fopen($image_name,"wb");
                fwrite($fileHandle,$image_media);
                fclose($fileHandle);
                $contentUrl[$i]['display_url'] = "backend/".$image_name;
            }
        }else{
            $contentUrl = null;
        }
        return $contentUrl;   
    }

    function getVideo($jsonData){
        $contentUrl = array();
        if($jsonData["entry_data"]["PostPage"][0]["graphql"]["shortcode_media"]["__typename"] == "GraphVideo"){
            $videoUrl = $jsonData["entry_data"]["PostPage"][0]["graphql"]["shortcode_media"]["video_url"];
            $displayUrl = $jsonData["entry_data"]["PostPage"][0]["graphql"]["shortcode_media"]["display_url"];
            preg_match("/(http[s]*:\/\/)([a-z\-_0-9\/.]+)\.([a-z.]{2,3})\/([a-z0-9\-_\/._~:?#\[\]@!$&'()*+,;=%]*)([a-z0-9]+\.)(jpg|jpeg)/i",$displayUrl,$matches);
            $image_url = $matches[0];
            $image_url = explode("/",$image_url);
            $image_name = end($image_url);
            $image_media = getHtmlFromUrl($displayUrl);
            $fileHandle =  fopen($image_name,"wb");
            fwrite($fileHandle,$image_media);
            fclose($fileHandle);
            $contentUrl[0]['url'] = $videoUrl;
            $contentUrl[0]['display_url'] = "backend/".$image_name;        
        }else{
            $contentUrl = null;
        }
        return $contentUrl;
    
    }

    function getIgtv($jsonData){

    }


    function getProfilePic($jsonData){

        // return $jsonData;
        $contentUrl = array();
        $data = $jsonData["entry_data"]["ProfilePage"][0]["graphql"]["user"];
        $imageUrl = $data['profile_pic_url_hd'];
        preg_match("/(http[s]*:\/\/)([a-z\-_0-9\/.]+)\.([a-z.]{2,3})\/([a-z0-9\-_\/._~:?#\[\]@!$&'()*+,;=%]*)([a-z0-9]+\.)(jpg|jpeg)/i",$imageUrl,$matches);
        $image_url = $matches[0];
        $image_url = explode("/",$image_url);
        $image_name = end($image_url);
        $image_media = getHtmlFromUrl($imageUrl);
        $fileHandle =  fopen($image_name,"wb");
        fwrite($fileHandle,$image_media);
        fclose($fileHandle);
        $contentUrl[0]['url'] = $imageUrl;
        $contentUrl[0]['display_url'] = "backend/".$image_name;
        return $contentUrl;
    }

    function getReel($jsonData){

    }
    // $tagsString = $data["entry_data"]["PostPage"][0]["graphql"]["shortcode_media"]["edge_media_to_caption"]["edges"]["0"]["node"]["text"];
    
    // if($data["entry_data"]["PostPage"][0]["graphql"]["shortcode_media"]["__typename"] == "GraphImage"){
    //     $imageUrl = $data["entry_data"]["PostPage"][0]["graphql"]["shortcode_media"]["display_url"];
    //     $contentUrl = $imageUrl;        
    // }else if($data["entry_data"]["PostPage"][0]["graphql"]["shortcode_media"]["__typename"] == "GraphVideo"){
    //     $videoUrl = $data["entry_data"]["PostPage"][0]["graphql"]["shortcode_media"]["video_url"];
    //     $contentUrl = $videoUrl;        
    // }else if ($data["entry_data"]["PostPage"][0]["graphql"]["shortcode_media"]["__typename"] == "GraphSidecar") {
    //     $sideCarImageUrls = array();
    //     $children = $data["entry_data"]["PostPage"][0]["graphql"]["shortcode_media"]["edge_sidecar_to_children"]["edges"];
    //     for($i = 0; $i < sizeof($children); $i++){
    //         $sideCarImageUrls[] = $data["entry_data"]["PostPage"][0]["graphql"]["shortcode_media"]["edge_sidecar_to_children"]["edges"][$i]["node"]["display_url"];
    //     }
    //     $contentUrl = array();
    //     $contentUrl = $sideCarImageUrls;
    // } else{
    //     $contentUrl = null;
    // }


    // echo "<br>$url";die();
    // preg_match("/(http[s]*:\/\/)([a-z\-_0-9\/.]+)\.([a-z.]{2,3})\/([a-z0-9\-_\/._~:?#\[\]@!$&'()*+,;=%]*)([a-z0-9]+\.)(mp4)/i",$url,$videoAbsoluteUrl);
    // $videoAbsoluteUrl = $videoAbsoluteUrl[0];

    // $videoAbsoluteUrl = explode("/",$videoAbsoluteUrl);
    // $videoName = end($videoAbsoluteUrl);

    // $videoMedia = getHtmlFromUrl($url);
    // $fileHandle =  fopen($videoName,"wb");
    // if(fwrite($fileHandle,$videoMedia)){
    //     echo '<a  href="http://localhost/php_curl/instadownloader/'.$videoName.'" download>Download In Computer</a><br>';
    //     fclose($fileHandle);

    // }
    // forceDownload($videoUrl,"newDownlaod","mp4");
    // echo '
    // <a target = "_blank" href = "'.$videoUrl.'" download = "insta video">Download</a>
    // ';
    
    
    // if(is_array($contentUrl)){
    //     foreach ($contentUrl as $contentKey => $contentValue) {
    //         // echo "<br><br>".$contentValue;
    //         preg_match("/(http[s]*:\/\/)([a-z\-_0-9\/.]+)\.([a-z.]{2,3})\/([a-z0-9\-_\/._~:?#\[\]@!$&'()*+,;=%]*)([a-z0-9]+\.)(mp4|jpg|jpeg|png)/i",$contentValue,$videoAbsoluteUrl);
    //         $videoAbsoluteUrl = $videoAbsoluteUrl[0];
    //         $videoAbsoluteUrl = explode("/",$videoAbsoluteUrl);
    //         $videoName = end($videoAbsoluteUrl);
    //         set_time_limit(0);
    //         // echo "<br><a href = 'dl.php?dlUrl={$contentValue}'>{$contentKey}</a>";
    //         // session_write_close();
    //         forceDownload($contentValue,$videoName);
    //     }
    // }else{
    //     preg_match("/(http[s]*:\/\/)([a-z\-_0-9\/.]+)\.([a-z.]{2,3})\/([a-z0-9\-_\/._~:?#\[\]@!$&'()*+,;=%]*)([a-z0-9]+\.)(mp4|jpg|jpeg|png)/i",$contentUrl,$videoAbsoluteUrl);
    //     $videoAbsoluteUrl = $videoAbsoluteUrl[0];
    //     $videoAbsoluteUrl = explode("/",$videoAbsoluteUrl);
    //     $videoName = end($videoAbsoluteUrl);
    //     set_time_limit(0);
    //     // echo "<br><a href = 'dl.php?dlUrl={$contentUrl}'>Download</a>";
    //     forceDownload($contentUrl,$videoName);
    // }

?>