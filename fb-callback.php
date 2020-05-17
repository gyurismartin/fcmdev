<?php
    require_once "fbconfig.php";
    
    try{
        $accessToken = $helper->getAccessToken();
    } catch (\Facebook\Exceptions\FacebookResponseException $e) {
        echo "Response Exception: " . $e->getMessage();
        exit;
    } catch (Facebook\Exceptions\FacebookSDKException $e) {
        echo "SDK Exception: " . $e->getMessage();
        exit;
    }
    
    if (!$accessToken){
        header('Location: login.php');
        exit;
    }
    
    $oAuth2Client = $FB->getOAuth2Client();
    if(!$accessToken->isLongLived()){
        $accessToken = $oAuth2Client->getLongLivedAccessToken();
    }
    $response = $FB->get("me?fields=id,name,email", $accessToken);
    $userData = $response->getGraphNode()->asArray();
    $_SESSION['userData'] = $userData;
    $_SESSION['accesstoken'] = (string) $accessToken;
    header('Location: szimulacio.php');
    exit();
?>