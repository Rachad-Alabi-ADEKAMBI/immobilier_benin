<?php
session_start();

/*
function getConnexion()
{
    try {
        return new PDO(
            'mysql:host=localhost;dbname=id22223827_immobilier_benin;charset=UTF8',
            'id22223827_immobilier_benin',
            'Immobilier_benin92i?'
        );
    } catch (PDOException $e) {
        // Handle database connection error
        die("Connection failed: " . $e->getMessage());
    }
}
*/


function getConnexion()
{
    try {
        return new PDO(
            'mysql:host=localhost;dbname=immo_benin;charset=UTF8',
            'root',
            ''
        );
    } catch (PDOException $e) {
        // Handle database connection error
        die("Connection failed: " . $e->getMessage());
    }
}

function newAd() {
    $pdo = getConnexion();

    $name = verifyInput($_POST['name']);
    $price = verifyInput($_POST['price']);
    $category = verifyInput($_POST['category']);
    $action = verifyInput($_POST['action']);
    $location = verifyInput($_POST['location']);
    $description = verifyInput($_POST['description']);

    $geolocation = '5466.sf.fsfgs';
    $user_id = $_SESSION['user']['id'];
    $user_phone = $_SESSION['user']['phone'];
    $user_name = $_SESSION['user']['first_name'].' '.$_SESSION['user']['last_name'];

    if ($category == 'Terrain' || $category == 'Boutique') {
        $size = verifyInput($_POST['size']);
        $rooms = 0;
        $bathrooms = 0;
        $people = 0;
    } else {
        $size = 0;
        $rooms = verifyInput($_POST['rooms']);
        $bathrooms = verifyInput($_POST['bathrooms']);
        $people = verifyInput($_POST['people']);
    }

    if($location == 'other'){
        $location = verifyInput($_POST['more_location']);
    }

    $situation = 'Disponible';

    // insertion
    try {
        $req = $pdo->prepare('INSERT INTO ads (name, price, category, action, location, description, rooms, bathrooms, people, situation, size, user_id, user_name, user_phone) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
        $req->execute(array($name, $price, $category, $action, $location, $description, $rooms, $bathrooms, $people, $situation, $size, $user_id, $user_name, $user_phone));

        $ad_id = $pdo->lastInsertId();

        // pic
        $pic_fields = ['pic1', 'pic2', 'pic3', 'pic4'];
        $base_dir = '../public/img/';

        foreach ($pic_fields as $pic_field) {
            if (isset($_FILES[$pic_field]) && $_FILES[$pic_field]['error'] == 0) {
                $pic_name = time() . '_' . $_FILES[$pic_field]['name'];
                $target = $base_dir . $pic_name;

                if (move_uploaded_file($_FILES[$pic_field]['tmp_name'], $target)) {
                    $update_req = $pdo->prepare("UPDATE ads SET $pic_field = ? WHERE id = ?");
                    $update_req->execute([$pic_name, $ad_id]);
                }
            }
        }

        // fetch user data
        $user_req = $pdo->prepare('SELECT ads FROM users WHERE id = ?');
        $user_req->execute(array($user_id));
        $datas = $user_req->fetch();

        $ads = $datas['ads'];

        // update ads number
        $update_user_req = $pdo->prepare("UPDATE users SET ads = ? WHERE id = ?");
        $update_user_req->execute(array(($ads + 1), $user_id));

        ?>
        <script>
            alert('Annonce ajoutée avec succès !!');
            window.location.replace('../index.php?action=dashboardPage');
        </script>
        <?php
    } catch (PDOException $e) {
        echo 'Database error: ' . $e->getMessage();
    }
}


function newNeed(){
    $pdo = getConnexion();

    $category = $_SESSION['need']['category'];
    $action = $_SESSION['need']['action'];
    $location = $_SESSION['need']['location'];

    $user_id = $_SESSION['user']['id'];
    $user_name = $_SESSION['user']['first_name'].' '.$_SESSION['user']['last_name'];
    $user_phone = $_SESSION['user']['phone'];

    
    try {
        $req = $pdo->prepare('INSERT INTO needs SET  category = ?,
            action = ?, location = ?, user_id = ?, user_name = ?, user_phone = ?');
        $req->execute(array($category, $action, $location, $user_id, $user_name, $user_phone));
        ?>
     
        <script>
            alert('Nouvelle annonce de recherche personnalisée ajoutée avec succès !!');
            window.location.replace('../index.php')
        </script>
      <?php

       
    } catch (PDOException $e) {
        echo 'Database error: ' . $e->getMessage();
    }
}

function getAllDatas() {
    $pdo = getConnexion();
    $req = $pdo->prepare("SELECT * FROM ads ORDER BY id DESC");
    
    $req->execute();
    $datas = $req->fetchAll();
    $req->closeCursor();

    sendJSON($datas);
}

function getAgents() {
    $pdo = getConnexion();
    $req = $pdo->prepare("SELECT * FROM users WHERE featured = 'yes' 
        ORDER BY id DESC");
    
    $req->execute();
    $datas = $req->fetchAll();
    $req->closeCursor();

    sendJSON($datas);
}

function getAgent($id) {
    $id= verifyInput($_GET['id']);

   if($id == 0 OR $id < 0){
    ?>
        <script>
            alert("Merci de vérifier cette url");
            window.location.replace('../index.php');
            exit();
        </script>
    <?php 
   } else{
    $pdo = getConnexion();
    $req = $pdo->prepare("SELECT * FROM users WHERE id = ? AND featured = 'yes' ");
    
    $req->execute(array($id));
    $datas = $req->fetchAll();
    $req->closeCursor();

    if(count($datas) > 0){
        sendJSON($datas);
    } else{
        echo
            '<script>
            alert("Merci de vérifier cette url");
            window.location.replace("../index.php");
            exit();
            </script>';
        exit();
    }

   }
}

function getAvailableDatas(){
    $pdo = getConnexion();
    $req = $pdo->prepare("SELECT * FROM ads WHERE situation = 'Disponible' ORDER BY id DESC");
    $req->execute();
    $datas = $req->fetchAll();
    $req->closeCursor();
    sendJSON($datas);
}

function getToRent(){
    $pdo = getConnexion();
    $req = $pdo->prepare("SELECT * FROM ads WHERE action = ? AND situation = ? ORDER BY id DESC");
    $req->execute(array('A louer', 'Disponible'));
    $datas = $req->fetchAll();
    $req->closeCursor();
    sendJSON($datas);
}

function getToSell(){
    $pdo = getConnexion();
    $req = $pdo->prepare("SELECT * FROM ads WHERE action = ? AND situation = ? ORDER BY id DESC");
    $req->execute(array('A vendre', 'Disponible'));
    $datas = $req->fetchAll();
    $req->closeCursor();
    sendJSON($datas);
}

function getMyAds(){
    $pdo = getConnexion();
    $req = $pdo->prepare("SELECT * FROM ads WHERE user_id = ? ORDER BY id DESC");
    $req->execute(array($_SESSION['user']['id']));
    $datas = $req->fetchAll();
    $req->closeCursor();
    sendJSON($datas);
}

function search() {
    $pdo = getConnexion();

    // Sanitize and retrieve POST variables
    $action = verifyInput($_POST['action']);
    $category = verifyInput($_POST['category']);
    $location = verifyInput($_POST['location']);

    $req = $pdo->prepare("SELECT * FROM ads WHERE action = ?
     AND location = ? 
     AND category = ?
     AND situation = 'Disponible'
     ORDER BY id DESC");
    $req->execute([$action, $location, $category]);

    // Fetch all results
    $datas = $req->fetchAll(PDO::FETCH_ASSOC);
    $req->closeCursor();
    
    if (count($datas) == 0) {

        $_SESSION['need'] = [
            'category' => $category,
            'location' => $location,
            'action' => $action
        ];
        

        ?>
            <script>
                //window.history.back();
                window.location.replace('../index.php?action=newNeedPage');
            </script>
        <?php
        exit();
    }
    // Initialize an empty results array
    $results = [];

    // Populate the results array with fetched data
    foreach($datas as $data) {
        $results[] = array(
            'id' => $data['id'],
            'name' => $data['name'],
            'category' => $data['category'],
            'pic1' => $data['pic1'],
            'rooms' => $data['rooms'],
            'bathrooms' => $data['bathrooms'],
            'people' => $data['people'],
            'size' => $data['size'],
            'location' => $data['location'],
            'price' => $data['price'],
            'action' => $data['action']
        );
    }

    // Start session and store results
    session_start();
    $_SESSION['search_results'] = $results; ?>
    
    <script>
    //window.history.back();
    window.location.replace('../index.php?action=resultsPage');
</script>  

<?php

}

function getProperty() {
    $pdo = getConnexion();
    $id = isset($_GET['id']) ? (int) verifyInput($_GET['id']) : 0;

    if ($id <= 0) {
        ?>
        
        <script>
            alert('Une erreur est survenue, merci de vérifier cette URL');
            window.history.back();
            exit();
        </script>

        <?php
        
    } else {
        $req = $pdo->prepare('SELECT * FROM ads WHERE id = ?');
        $req->execute([$id]);
        $datas = $req->fetchAll(PDO::FETCH_ASSOC);
        sendJSON($datas);
    }
}

function getNeeds(){
    $pdo = getConnexion();
        $req = $pdo->prepare('SELECT * FROM needs');
        $req->execute(array());
        $datas = $req->fetchAll();

        sendJSON($datas);
}

function pause(){
    $pdo = getConnexion();
    $id = verifyInput($_GET['id']);

    if ($id == 0 || $id < 0) { ?>
        <script>
            alert('Une erreur est survenue, merci de vérifier cette url');
        </script>
        <?php
        exit(); 
    } else {
        $req = $pdo->prepare("UPDATE ads SET situation = 'Non disponible' WHERE id = ?");
        $req->execute(array($id));
        ?>
            <script>
                alert('Annonce mise en pause !');
                window.location.replace('../index.php?action=dashboardPage');
            </script>

<?php 
    }
}

function stop(){
    $pdo = getConnexion();
    $id = verifyInput($_GET['id']);

    
    if (!is_numeric($id) || $id <= 0) { ?>
        <script>
            alert('Une erreur est survenue, merci de vérifier cette url');
        </script>
        <?php
        exit(); 
    } else {
       

        try {
            $req = $pdo->prepare("UPDATE ads SET situation = 'Stop' WHERE id = ?");
            $req->execute(array($id));
           // echo $id;
             ?>
            
            <script>
                alert("Annonce mise en stop !");
                window.location.replace('../index.php?action=dashboard_adminPage');
            </script>

            <?php 
        } catch (PDOException $e) {
            echo 'Database error: ' . $e->getMessage();
            ?>
                <script>
                    alert('Une erreur est survenue, merci de reéssayer ou de nous contacter si elle persiste');
                    window.location.replace('../index.php?action=dashboard_adminPage');
                    exit();
                </script>
            <?php
        }
    }
}

function play(){
    $pdo = getConnexion();
    $id = verifyInput($_GET['id']);

    
    if (!is_numeric($id) || $id <= 0) { ?>
        <script>
            alert('Une erreur est survenue, merci de vérifier cette url');
        </script>
        <?php
        exit(); 
    } else {
        $req = $pdo->prepare("UPDATE ads SET situation = 'Disponible' WHERE id = ?");
        $req->execute(array($id));
        ?>
            <script>
                alert("Annonce publié !");
                window.location.replace('../index.php?action=dashboardPage');
            </script>

<?php 
    }
}

function publish(){
    $pdo = getConnexion();
    $id = verifyInput($_GET['id']);

    if ($id == 0 || $id < 0) { ?>
        <script>
            alert('Une erreur est survenue, merci de vérifier cette url');
        </script>
        <?php
        exit(); 
    } else {
        $req = $pdo->prepare("UPDATE ads SET situation = 'Disponible' WHERE id = ?");
        $req->execute(array($id));
        ?>
            <script>
                 alert('Annonce publiée !');
                window.location.replace('../index.php?action=dashboard_adminPage');
            </script>

<?php 
    }
}

function delete(){
    $pdo = getConnexion();
    $id = verifyInput($_GET['id']);
    $user_id = $_SESSION['user']['id'];

    if ($id == 0 || $id < 0) { ?>
        <script>
            alert('Une erreur est survenue, merci de vérifier cette url');
        </script>
        <?php
        exit(); 
    } else {
        $req = $pdo->prepare("DELETE FROM ads WHERE id = ?");
        $req->execute(array($id));

            //fetch datas user
        $req = $pdo->prepare('SELECT * FROM users WHERE id = ?');
        $req->execute(array($user_id));
        $datas = $req->fetch();

        $ads = $datas['ads'];

        //update ads number
        $req = $pdo->prepare("UPDATE users SET ads = ? WHERE id = ?");
        $req->execute(array(($ads-1), $user_id));
        ?>
            <script>
                alert('Annonce supprimée !!');
                window.location.replace('../index.php?action=dashboardPage');
            </script>

<?php 
    }
}

function sixAds(){
    $pdo = getConnexion();
    $req = $pdo->prepare("SELECT * FROM ads WHERE situation = 'Disponible' ORDER BY id DESC LIMIT 6");
    $req->execute();
    $datas = $req->fetchAll();
    $req->closeCursor();
 //   sendJSON($datas);
    return $datas;
   // var_dump($datas);
}

function getThreePosts(){
    $pdo = getConnexion();
    $req = $pdo->prepare("SELECT * FROM articles
     ORDER BY id DESC LIMIT 3");
    $req->execute();
    $datas = $req->fetchAll();
    $req->closeCursor();
    sendJSON($datas);
    return $datas;
   // var_dump($datas);
}

function getPosts(){
    $pdo = getConnexion();
    $req = $pdo->prepare("SELECT * FROM articles
     ORDER BY id DESC");
    $req->execute();
    $datas = $req->fetchAll();
    $req->closeCursor();
    sendJSON($datas);
    return $datas;
   // var_dump($datas);
}

function getPost(){
    $pdo = getConnexion();
    $id = verifyInput($_GET['id']);

    if ($id == 0 || $id < 0) { ?>
        <script>
            alert('Une erreur est survenue, merci de vérifier cette url');
            window.history.back();
        </script>
        <?php
        exit(); 
    } else {
        $req = $pdo->prepare('SELECT * FROM articles WHERE id = ?');
        $req->execute(array($id));
        $datas = $req->fetchAll();

        if(count($datas) == ''){
            ?>
                <script>
                    alert("Aucun post trouvé, veuillez vérifier l'url");
                    window.history.back();
                </script>
            <?php
        } else{
            sendJSON($datas);
        }
    }
}

function login()
{
    if (!empty($_POST)) {
        $pdo = getConnexion();
        $errors = [];

        if (
            isset($_POST['username'], $_POST['password']) &&
            !empty($_POST['username'] && !empty($_POST['password']))
        ) {
            $sql = 'SELECT * FROM `users` WHERE `email` = ?';

            $query = $pdo->prepare($sql);

            $query->execute([verifyInput($_POST['username'])]);

            $user = $query->fetch();

            $pass = verifyInput($_POST['password']);

            if (!$user) {
                $errors['user'] = 'Veuillez vérifier les identifiants';
            }

            if ($user['pass'] != $pass) {
                $errors['pass'] = 'Veuillez vérifier les identifiants';
            }
            
           
            if (!empty($errors)) {
                $_SESSION['login'] = [
                    'username' => verifyInput($_POST['username']),
                ]; 
                ?>

                <script>
               alert('Veuillez vérifier les identifiants');
                window.location.replace('../index.php?action=loginPage')
                </script>
                <?php
                            }

            if (empty($errors)) {
                $_SESSION['user'] = [
                    'username' => $user['username'],
                    'email' => $user['email'],
                    'role' => $user['role'],
                    'id' => $user['id'],
                    'phone' => $user['phone'],
                    'first_name' => $user['first_name'],
                    'last_name' => $user['last_name'],
                    'situation' => $user['situation']
                ];

                if($user['situation'] == 'Deleted'){ ?>
                    <script>
                         alert("Votre compte a été banni, merci de nous contcter si vous pensez qu'il s'agit d'une erreur !!");
                        window.history.back();
                        exit();
                    </script>
                <?php } 

               if($_SESSION['user']['role'] == 'user'){
                ?>
                    <script>
                        window.location.replace('../index.php?action=dashboardPage');
                    </script>
                <?php
                
               } else if($_SESSION['user']['role'] == 'admin'){
                ?>
                <script>
                    window.location.replace('../index.php?action=dashboard_adminPage');
                </script>
            <?php

               } else{
                header('../index.php?action=loginPage');
               }
            }
        }
    } else{
        ?>
            <script>
                alert('Merci de remplir le formulaire !!');
                window.history.back();
                exit();
            </script>
        <?php
    }
}


function register() {
    $pdo = getConnexion();

    $email = verifyInput($_POST['email']);
    $phone = verifyInput($_POST['phone']);
    $first_name = verifyInput($_POST['first_name']);
    $last_name = verifyInput($_POST['last_name']);
    $pass = verifyInput($_POST['password']);
    $password_2 = verifyInput($_POST['password_2']);
    $ads = 0;
    $featured = 0;
    $situation = 'Disponible';

    //check for the same user
    $req = $pdo->prepare('SELECT * FROM users WHERE email = ?');
    $req->execute(array($email));
    $datas = $req->fetcH();

    if ($pass != $password_2) {
        $_SESSION['register'] = [
            'email' => $email,
            'phone' => $phone,
            'first_name' => $first_name,
            'last_name' => $last_name
        ];
    
     ?>
        <script>
            alert('Les mots de passe ne correspondent pas !');
            window.location.replace('../index.php?action=registerPage');
        </script>"
        
    <?php 
    }

    else if($datas != '' ){ ?>
             <script>
            alert('Cet email est déjà enregistré, merci de changer ou de faire une demande de réinitialisation de mot de passe si nécéssaire');
            window.location.replace('../index.php?action=registerPage');
        </script>"
        <?php
    }

    else{
        $username = $last_name . ' ' . substr($first_name, 0, 3) . rand(10, 99);
        $ip = $_SERVER['REMOTE_ADDR']; // Get the user's IP address

        try {
            $stmt = $pdo->prepare("INSERT INTO users (email, phone, first_name, last_name, 
            pass, username, ip, role, date_of_insertion, ads, featured, situation) VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW(), 0, ?, ?)");

            $stmt->execute([$email, $phone, $first_name, $last_name, $pass, $username, $ip, 'user', $featured, $situation]);

            $_SESSION['user'] = [
                'email' => $email,
                'role' => 'user',
                'id' => $pdo->lastInsertId(),
                'first_name' => $first_name,
                'last_name' => $last_name,
                'situation' => 'Disponible'
            ];

            ?>
            
            <script>
                    alert('Compte creé avec succès !! Bienvenue sur Immobilier Bénin');
                    window.location.replace('../index.php?action=dashboardPage');
            </script>

            <?php
        } catch (PDOException $e) {
            echo 'Database error: ' . $e->getMessage();
            ?>
                <script>
                    alert('Une erreur est survenue, merci de reéssayer ou de nous contacter si elle persiste');
                    window.location.replace('../index.php?action=registerPage');
                    exit();
                </script>
            <?php
        }
    }   
}


function updateAccount(){
    $pdo = getConnexion();
    $user_id = $_SESSION['user']['id'];

    //phone
    if($_POST['phone'] != ''){
        $phone = verifyInput($_POST['phone']);

        try {
            $req = $pdo->prepare('UPDATE users SET phone = ? WHERE id = ?');
            $req->execute(array($phone, $user_id));
    
           
        } catch (PDOException $e) {
            echo 'Database error: ' . $e->getMessage();
        }

    }

    //password
    if($_POST['password'] != '' AND $_POST['password_2'] == $_POST['password']){
        $pass = verifyInput($_POST['password']);

        try {
            $req = $pdo->prepare('UPDATE users SET pass = ? WHERE id = ?');
            $req->execute(array($pass, $user_id));
    
           
        } catch (PDOException $e) {
            echo 'Database error: ' . $e->getMessage();
        }
    } else if($_POST['password'] != '' AND $_POST['password_2'] != $_POST['password']){
        ?>
            <script>
                alert('Les mots de passe ne correspondent pas');
                window.location.replace('../index.php?action=dashboardPage');
                exit();
            </script>
        <?php
    } else if($_POST['password'] != '' AND $_POST['password_2'] == ''){
        ?>
            <script>
                alert('Veuillez confirmer le mot de passe');
                window.location.replace('../index.php?action=dashboardPage');
                exit();
            </script>
        <?php
    }

    //insert the picture
    $picture = time() . '_' . $_FILES['pic']['name'];
    $target = '../public/img/' . $picture;

    if (move_uploaded_file($_FILES['pic']['tmp_name'], $target)) {
        $req = $pdo->prepare("UPDATE users SET pic = ? WHERE id = ? ");

        $req->execute([$picture, $user_id]);
    }


    //the description
    if($_POST['description'] != ''){
        $description = verifyInput($_POST['description']);

        try {
            $req = $pdo->prepare('UPDATE users SET description = ? WHERE id = ?');
            $req->execute(array($description, $user_id));
    
           
        } catch (PDOException $e) {
            echo 'Database error: ' . $e->getMessage();
        }

    }

    if (isset($_POST['featured'])) {
        $featured = verifyInput($_POST['featured']);
        try {
            $req = $pdo->prepare('UPDATE users SET featured = ? WHERE id = ?');
            $req->execute([$featured, $user_id]);
        } catch (PDOException $e) {
            echo 'Database error: ' . $e->getMessage();
        }
    }
    
    
      ?>
      <script>
       //   alert('Les informations de votre compte ont été modifiées avec succès !');
         // window.location.replace('../index.php?action=dashboardPage')
      </script>
    <?php

}

function updateAd($ad_id){
    $pdo = getConnexion();
    $ad_id = verifyInput($_GET['id']);

    //name
    if($_POST['name'] != ''){
        $name = verifyInput($_POST['name']);

        try {
            $req = $pdo->prepare('UPDATE ads SET name = ? WHERE id = ?');
            $req->execute(array($name, $ad_id));
        } catch (PDOException $e) {
            echo 'Database error: ' . $e->getMessage();
        }
    }

    //price
    if($_POST['price'] != ''){
        $price = verifyInput($_POST['price']);

        try {
            $req = $pdo->prepare('UPDATE ads SET price = ? WHERE id = ?');
            $req->execute(array($price, $ad_id));
           
        } catch (PDOException $e) {
            echo 'Database error: ' . $e->getMessage();
        }
    }

    //price
    if($_POST['description'] != ''){
        $description = verifyInput($_POST['description']);

        try {
            $req = $pdo->prepare('UPDATE ads SET description = ? WHERE id = ?');
            $req->execute(array($description, $ad_id));
        } catch (PDOException $e) {
            echo 'Database error: ' . $e->getMessage();
        }
    }

    //pics
    $pic_fields = ['pic1', 'pic2', 'pic3', 'pic4'];
    $base_dir = '../public/img/';
    
    foreach ($pic_fields as $pic_field) {
        if (isset($_FILES[$pic_field]) && $_FILES[$pic_field]['error'] == 0) {
            $pic_name = time() . '_' . $_FILES[$pic_field]['name'];
            $target = $base_dir . $pic_name;
    
            if (move_uploaded_file($_FILES[$pic_field]['tmp_name'], $target)) {
                $req = $pdo->prepare("UPDATE ads SET $pic_field = ? WHERE id = ?");
                $req->execute([$pic_name, $ad_id]);
            }
        }
    }

      ?>
      <script>
          alert('Annonce modifiée avec succès !!!');
          window.location.replace('../index.php?action=dashboardPage')
      </script>
    <?php

}


function getUsers(){
    $pdo = getConnexion();
        $req = $pdo->prepare("SELECT * FROM users WHERE id != 1  AND situation != 'Deleted' ORDER BY id DESC");
        $req->execute(array());
        $datas = $req->fetchAll();
        sendJSON($datas);
}


function pauseUser(){
    $pdo = getConnexion();
    $id = verifyInput($_GET['id']);

    
    if (!is_numeric($id) || $id <= 0) { ?>
        <script>
            alert('Une erreur est survenue, merci de vérifier cette url');
        </script>
        <?php
        exit(); 
    } else {
       

        try {
            $req = $pdo->prepare("UPDATE users SET situation = 'Non disponible' WHERE id = ?");
            $req->execute(array($id));
             ?>
            
            <script>
                alert("Profil utilisateur mis en pause !");
                window.location.replace('../index.php?action=dashboard_adminPage');
            </script>

            <?php 
        } catch (PDOException $e) {
           // echo 'Database error: ' . $e->getMessage();
            ?>
                <script>
                    alert('Une erreur est survenue, merci de reéssayer ou de nous contacter si elle persiste');
                    window.location.replace('../index.php?action=dashboard_adminPage');
                    exit();
                </script>
            <?php
        }
    }
}

function deleteUser(){
    $pdo = getConnexion();
    $id = verifyInput($_GET['id']);

    
    if (!is_numeric($id) || $id <= 0) { ?>
        <script>
            alert('Une erreur est survenue, merci de vérifier cette url');
        </script>
        <?php
        exit(); 
    } else {
       

        try {
            // Update user's situation to 'Deleted'
            $reqUpdateUser = $pdo->prepare("UPDATE users SET situation = 'Deleted' WHERE id = ?");
            $reqUpdateUser->execute(array($id));

            // Delete ads associated with the user
            $reqDeleteAds = $pdo->prepare('DELETE FROM ads WHERE user_id = ?');
            $reqDeleteAds->execute(array($id));

             ?>
            
            <script>
                alert("Compte supprimé et email banni !");
                window.location.replace('../index.php?action=dashboard_adminPage');
            </script>

            <?php 
        } catch (PDOException $e) {
             echo 'Database error: ' . $e->getMessage();
            ?>
                <script>
                  //  alert('Une erreur est survenue, merci de reéssayer ou de nous contacter si elle persiste');
                   // window.location.replace('../index.php?action=dashboard_adminPage');
                    exit();
                </script>
            <?php
        }
    }
}

function authorizeUser(){
    $pdo = getConnexion();
    $id = verifyInput($_GET['id']);

    
    if (!is_numeric($id) || $id <= 0) { ?>
        <script>
            alert('Une erreur est survenue, merci de vérifier cette url');
        </script>
        <?php
        exit(); 
    } else {
       

        try {
            $req = $pdo->prepare("UPDATE users SET situation = 'Disponible' WHERE id = ?");
            $req->execute(array($id));
          //  echo $id;
             ?>
            
            <script>
                alert("Profil utilisateur validé !");
                window.location.replace('../index.php?action=dashboard_adminPage');
            </script>

            <?php 
        } catch (PDOException $e) {
            // echo 'Database error: ' . $e->getMessage();
            ?>
                <script>
                    alert('Une erreur est survenue, merci de reéssayer ou de nous contacter si elle persiste');
                    window.location.replace('../index.php?action=dashboard_adminPage');
                    exit();
                </script>
            <?php
        }
    }
}





function logout()
{
    unset($_SESSION['user']);

    header('Location: ../index.php');
}

function getGeolocation($address) {
    $apiKey = 'YOUR_GOOGLE_MAPS_API_KEY';  // Remplacez par votre clé API Google Maps
    $address = urlencode($address);
    $url = "https://maps.googleapis.com/maps/api/geocode/json?address={$address}&key={$apiKey}";

    $response = file_get_contents($url);
    $response = json_decode($response, true);

    if ($response['status'] == 'OK') {
        $latitude = $response['results'][0]['geometry']['location']['lat'];
        $longitude = $response['results'][0]['geometry']['location']['lng'];
        return ['latitude' => $latitude, 'longitude' => $longitude];
    } else {
        return false;
    }
}

function uploadImage(){
    $pdo = getConnexion();
    $user_id = $_SESSION['user']['id'];
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $croppedImage = $_POST['croppedImage'];
    
        if ($croppedImage) {
            $croppedImage = str_replace('data:image/png;base64,', '', $croppedImage);
            $croppedImage = str_replace(' ', '+', $croppedImage);
            $imageData = base64_decode($croppedImage);
    
            $fileName = uniqid() . '.png';
            $filePath = '../public/img/' . $fileName; // Corrected file path
    
            // Check if the directory exists, create it if not
            if (!is_dir('../public/img/')) {
                mkdir('../public/img/', 0755, true);
            }
    
            // Create image from string
            $image = imagecreatefromstring($imageData);
            if ($image !== false) {
                // Save the image as PNG
                if (imagepng($image, $filePath)) {
                    imagedestroy($image);

                    $req = $pdo->prepare("UPDATE users SET pic = ? WHERE id = ? ");

                    $req->execute([$fileName, $user_id]); 
    
                    if ($req->rowCount()) {
                        ?>
                            <script>
                                alert('Image enregistrée avec succès !');
                                window.location.replace('../index.php?action=dashboardPage');
                            </script>
                        <?php
                    } else {
                        echo "Error: Failed to insert record.";
                    }
                } else {
                    echo "Failed to save the image.";
                }
            } else {
                echo "Failed to create image from base64 string.";
            }
        } else {
            echo "No cropped image received.";
        }
    }
}





function sendJSON($infos)
{
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    echo json_encode($infos, JSON_UNESCAPED_UNICODE);
}

function verifyInput($inputContent)
{
    $inputContent = htmlspecialchars($inputContent);
    $inputContent = trim($inputContent);
    return $inputContent;
}

