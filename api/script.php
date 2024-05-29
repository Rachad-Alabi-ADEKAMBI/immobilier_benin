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

if($action == 'agents'){
    getAgents();
}

if($action == 'agent'){
    getAgent($id);
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
    pause();
}

if($action == 'stop'){
    stop();
}

if($action == 'delete'){
    delete();
}

if($action == 'publish'){
    publish();
}

if($action == 'newAd'){
    newAd();
}

if($action == 'threeAds'){
    threeAds();
}

if($action == 'updateAccount'){
    updateAccount();
}

if($action == 'users'){
    getUsers();
}






if($action == 'login'){
    login();
}

if($action == 'logout'){
    logout();
}
