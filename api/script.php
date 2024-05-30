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

if($action == 'newAd'){
    newAd();
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






if($action == 'login'){
    login();
}

if($action == 'logout'){
    logout();
}
