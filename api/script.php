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

if ($action == 'myAds') {
    getMyAds();
}

if($action == 'search'){
    search();
}

if($action == 'getProperty'){
    getProperty();
}

if($action == 'register'){
    register();
}

if($action == 'pause'){
    pause();
}

if($action == 'publish'){
    publish();
}

if($action == 'pause'){
    delete();
}

if($action == 'threeAds'){
    threeAds();
}

if($action == 'updateAccount'){
    updateAccount();
}






if($action == 'login'){
    login();
}

if($action == 'logout'){
    logout();
}
