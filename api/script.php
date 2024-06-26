<?php
    include 'functions.php';
$action = $_GET['action'] ?? '';


if ($action == 'newAd') {
   newAd();
}

if ($action == 'allDatas') {
        getAllDatas();
 }

 if ($action == 'availableDatas') {
    getAvailableDatas();
}

if ($action == 'toRent') {
    getToRent();
}

if ($action == 'toSell') {
    getToSell();
}

if ($action == 'myAds') {
    getMyAds();
}

if($action == 'search'){
    search();
}

if($action == 'needs'){
    getNeeds();
}

if($action == 'advertisers'){
    getAdvertisers();
}

if($action == 'advertiser'){
    getAdvertiser($id);
}

if($action == 'newNeed'){
    newNeed();
}

if($action == 'getProperty'){
    getProperty();
}

if($action == 'register'){
    register();
}

if($action == 'pause'){
    pause($id);
}

if($action == 'stop'){
    stop($id);
}

if($action == 'play'){
    play($id);
}

if($action == 'delete'){
    delete();
}

if($action == 'publish'){
    publish($id);
}


if($action == 'sixAds'){
    sixAds();
}

if($action == 'updateAccount'){
    updateAccount();
}

if($action == 'updateAd'){
    updateAd($id);
}

if($action == 'users'){
    getUsers();
}

if($action == 'posts'){
    getPosts();
}

if($action == 'post'){
    getPost($id);
}

if($action == 'threePosts'){
    getThreePosts();
}

if($action == 'pauseUser'){
    pauseUser($id);
}

if($action == 'deleteUser'){
    deleteUser($id);
}

if($action == 'authorizeUser'){
    authorizeUser($id);
}

if($action == 'uploadImage'){
    uploadImage();
}

if($action == 'deleteMyAccount'){
    deleteMyAccount();
}

if($action == 'manageProperty'){
    manageProperty($id);
}






if($action == 'login'){
    login();
}

if($action == 'logout'){
    logout();
}
