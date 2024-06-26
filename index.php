<?php
session_start();

// Set the error reporting level to exclude warnings
error_reporting(E_ALL & ~E_WARNING);

// Disable displaying errors
ini_set('display_errors', 0);

require_once 'src/controllers/front/home.php';
require_once 'src/controllers/front/login.php';
require_once 'src/controllers/front/register.php';
require_once 'src/controllers/front/contact.php';
require_once 'src/controllers/front/ads.php';
require_once 'src/controllers/front/ad.php';
require_once 'src/controllers/front/policy.php';
require_once 'src/controllers/front/terms.php';
require_once 'src/controllers/front/advertisers.php';
require_once 'src/controllers/front/advertiser.php';
require_once 'src/controllers/front/reset_password.php';
require_once 'src/controllers/front/newNeed.php';
require_once 'src/controllers/front/results.php';
require_once 'src/controllers/front/blog.php';
require_once 'src/controllers/front/article.php';
require_once 'src/controllers/front/error.php';
require_once 'src/controllers/front/faq.php';
require_once 'src/controllers/front/about.php';

require_once 'src/controllers/back/user/dashboard.php';
require_once 'src/controllers/back/user/newAd.php';
require_once 'src/controllers/back/user/needs.php';
require_once 'src/controllers/back/user/account.php';
require_once 'src/controllers/back/user/manage.php';

require_once 'src/controllers/back/admin/dashboard_admin.php';





if (isset($_GET['action']) && $_GET['action'] !== '') {

    if ($_GET['action'] === 'loginPage') {
        if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'user') {
            dashboardPage();
        } elseif (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin') {
            dashboard_adminPage();
        } else {
            loginPage();
            }
    }

    
    elseif ($_GET['action'] === 'adPage') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            adPage($_GET['id']);
        } else {
            errorPage();
            die;
        }
    }

    elseif ($_GET['action'] === 'advertiserPage') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            advertiserPage($_GET['id']);
        } else {
            errorPage();
            die;
        }   
        
    }
    
    elseif ($_GET['action'] === 'registerPage') {
        registerPage();
    }

    elseif ($_GET['action'] === 'contactPage') {
        contactPage();
    }

    elseif ($_GET['action'] === 'adsPage') {
        adsPage();
    }

    elseif ($_GET['action'] === 'policyPage') {
        policyPage();
    }

    elseif ($_GET['action'] === 'termsPage') {
        termsPage();
    }
    
    elseif ($_GET['action'] === 'editRate') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $id = $_GET['id'];

          //  editRate($id);
        } else {
            echo 'Erreur : aucun identifiant de billet envoyé';

            die();
        }
    } 
    
    elseif ($_GET['action'] === 'dashboardPage') {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'user') {
            loginPage();
        } else {
            dashboardPage();
        }
    }

    
    elseif ($_GET['action'] === 'managePage') {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'user') {
            loginPage();
        } else {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];

             managePage($id);
             
            } else{
                errorPage();
            }
        }
    }
    

    elseif ($_GET['action'] === 'dashboard_adminPage') {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'admin') {
            loginPage();
        } else {
            dashboard_adminPage();
        }
    }

    elseif ($_GET['action'] === 'newAdPage') {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'user') {
            loginPage();
        } else {
            newAdPage();
        }
    }

    elseif ($_GET['action'] === 'needsPage') {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'user') {
            loginPage();
        } else {
            needsPage();
        }
    } 
    

    elseif ($_GET['action'] === 'accountPage') {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'user') {
            loginPage();
        } else {
            accountPage();
        }
    } 
    


    elseif ($_GET['action'] === 'advertisersPage') {
        advertisersPage();
    } 

    elseif ($_GET['action'] === 'resultsPage') {
        resultsPage();
    } 

    elseif ($_GET['action'] === 'reset_passwordPage') {
        reset_passwordPage();
    } 

    elseif ($_GET['action'] === 'newNeedPage') {
        newNeedPage();
    } 

    elseif ($_GET['action'] === 'blogPage') {
        blogPage();
    } 

    elseif ($_GET['action'] === 'faqPage') {
        faqPage();
    } 

    elseif ($_GET['action'] === 'articlePage') {
        articlePage();
    } 
    
    elseif ($_GET['action'] === 'articlePage') {
        articlePage();
    } 
    

    elseif ($_GET['action'] === 'aboutPage') {
        aboutPage();
    }
    
    else {
        errorPage();
      // echo 'error';
    }
} else {
    home();
}