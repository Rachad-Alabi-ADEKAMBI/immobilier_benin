<?php
session_start();

/*
function getConnexion()
{
    try {
        return new PDO(
            'mysql:host=localhost;dbname=rapid_link;charset=UTF8',
            'id22185176_rapid_link',
            'Rapid_link0'
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

function newAd(){
    $pdo = getConnexion();
    $job = verifyInput($_POST['job']);

    $name = verifyInput($_POST['name']);
    $price = verifyInput($_POST['price']);
    $category = verifyInput($_POST['category']);
    $action = verifyInput($_POST['action']);
    $location = verifyInput($_POST['location']);
    $description = verifyInput($_POST['description']);

    $geolocation ='5466.sf.fsfgs';
    $user_id = $_SESSION['user']['id'];

    if ($category == 'Terrain' || $category == 'Boutique') {
        $size = verifyInput($_POST['size']);
        $rooms = 0;
        $bathrooms = 0;
        $people = 0;
    } else{
        $size = 0;
        $rooms = verifyInput($_POST['rooms']);
        $bathrooms = verifyInput($_POST['bathrooms']);
        $people = verifyInput($_POST['people']);
    }

    $situation = 'Disponible';

    //update
    try {
        $req = $pdo->prepare('INSERT INTO ads SET name = ?, price = ?, category = ?,
            action = ?, location = ?, description = ?, rooms = ?, bathrooms = ?,
                people = ?, situation = ?, size = ?, user_id = ?');
        $req->execute(array($name, $price,  $category, $action, $location,
            $description, $rooms, $bathrooms, $people, $situation, $size, $user_id));

       
    } catch (PDOException $e) {
        echo 'Database error: ' . $e->getMessage();
    }

    $ad_id = $pdo->lastInsertId();

    //pic
    $pic_fields = ['pic1', 'pic2', 'pic3', 'pic4'];
    $base_dir = '../img/';
    
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


    // Exemple d'utilisation
    $address = "1600 Amphitheatre Parkway, Mountain View, CA";
    $location = getGeolocation($address);

    if ($location) {
        echo "Latitude: " . $location['latitude'] . "<br>";
        echo "Longitude: " . $location['longitude'];
    } else {
        echo "Impossible d'obtenir les coordonnées géographiques.";
    }





    //fetch datas user
    $req = $pdo->prepare('SELECT * FROM users WHERE id = ?');
    $req->execute(array($user_id));
    $datas = $req->fetchAll();

    $ads = $datas['ads'];

    //update ads number
    $req = $pdo->prepare("UPDATE users SET ads = ? WHERE id = ?");
    $req->execute(array(($ads+1), $user_id));

      ?>
     
      <script>
     //     alert('Annonce ajoutée avec succès !!');
      //    window.location.replace('../dashboard.php')
      </script>
    <?php

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
    $req = $pdo->prepare("SELECT ads.*, users.* FROM ads INNER JOIN users ON ads.user_id = users.id ORDER BY ads.id DESC");
    
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
        

        header('Location: ../newNeed.php');
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
            'price' => $data['price']
        );
    }

    // Start session and store results
    session_start();
    $_SESSION['search_results'] = $results;
    
    header("Location: ../results.php", true, 301);  

}

function getProperty(){
    $pdo = getConnexion();
    $id = verifyInput($_GET['id']);

    if ($id == 0 || $id < 0) { ?>
        <script>
            alert('Une erreur est survenue, merci de vérifier cette url');
        </script>
        <?php
        exit(); 
    } else {
        $req = $pdo->prepare('SELECT * FROM ads WHERE id = ?');
        $req->execute(array($id));
        $datas = $req->fetchAll();

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
                alert('Annonce mise en pause !!');
                header('Location: ../dashboard.php');
            </script>

<?php 
    }
}

function stop(){
    $pdo = getConnexion();
    $id = verifyInput($_GET['id']);

    if ($id == 0 || $id < 0) { ?>
        <script>
            alert('Une erreur est survenue, merci de vérifier cette url');
        </script>
        <?php
        exit(); 
    } else {
        $req = $pdo->prepare("UPDATE ads SET situation = 'Stop' WHERE id = ?");
        $req->execute(array($id));
        ?>
            <script>
                alert("Annonce stopée par l'admin !!");
           //     window.location.replace('../dashboard_admin.php');
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
                alert('Annonce publiée !!');
                header('Location: ../dashboard.php');
            </script>

<?php 
    }
}

function delete(){
    $pdo = getConnexion();
    $id = verifyInput($_GET['id']);

    if ($id == 0 || $id < 0) { ?>
        <script>
            alert('Une erreur est survenue, merci de vérifier cette url');
        </script>
        <?php
        exit(); 
    } else {
        $req = $pdo->prepare("DELETE FROM ads WHERE id = ?");
        $req->execute(array($id));
        ?>
            <script>
                alert('Annonce supprimée !!');
                header('Location: ../dashboard.php');
            </script>

<?php 
    }
}

function threeAds(){
    $pdo = getConnexion();
    $req = $pdo->prepare("SELECT * FROM ads WHERE situation = 'Disponible' ORDER BY id DESC LIMIT 3");
    $req->execute();
    $datas = $req->fetchAll();
    $req->closeCursor();
 //   sendJSON($datas);
   // return $datas;
   // var_dump($datas);
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
                $errors['user'] = 'Veuillez vérifier les identifi';
            }

            if ($user['pass'] != $pass) {
                $errors['pass'] = 'Veuillez vérifier les identifiantssss';
            }
            
           
            if (!empty($errors)) {
                $_SESSION['login'] = [
                    'username' => verifyInput($_POST['username']),
                ]; 
                ?>

                <script>
               alert('Veuillez vérifier les identifiants');
                window.location.replace('../login.php')
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
                    'last_name' => $user['last_name']
                ];

               if($_SESSION['user']['role'] == 'user'){
                header('Location: ../dashboard.php');
               } else if($_SESSION['user']['role'] == 'admin'){
                header('Location: ../dashboard_admin.php');
               } else{
                header('Location: ../login.php');
               }
            }
        }
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

    if ($pass != $password_2) {
        echo "<script>
                alert('Les mots de passe ne correspondent pas !');
                window.location.replace('../register.php');
              </script>";
        exit();
    }

    $username = $last_name . ' ' . substr($first_name, 0, 3) . rand(10, 99);
    $ip = $_SERVER['REMOTE_ADDR']; // Get the user's IP address

    try {
        $stmt = $pdo->prepare("INSERT INTO users (email, phone, first_name, last_name, 
        pass, username, ip, role, date_of_insertion, ads, featured) VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW(), 0, ?)");

        $stmt->execute([$email, $phone, $first_name, $last_name, $pass, $username, $ip, 'user', $featured]);

        $_SESSION['user'] = [
            'email' => $email,
            'role' => 'user',
            'id' => $pdo->lastInsertId(),
            'first_name' => $first_name,
            'last_name' => $last_name,
        ];

        echo "<script>
                alert('Compte créé avec succès !! Bienvenue sur Immobilier Bénin');
                window.location.replace('../dashboard.php');
              </script>";
    } catch (PDOException $e) {
        echo 'Database error: ' . $e->getMessage();
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
                window.location.replace('../dashboard.php');
                exit();
            </script>
        <?php
    } else if($_POST['password'] != '' AND $_POST['password_2'] == ''){
        ?>
            <script>
                alert('LVeuillez confirmer le mot de passe');
                window.location.replace('../dashboard.php');
                exit();
            </script>
        <?php
    }

    //insert the picture
    $picture = time() . '_' . $_FILES['pic']['name'];
    $target = '../img/' . $picture;

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

     //the description
    if (isset($_POST['featured']) && $_POST['featured'] == 'on') {
    try {
        $req = $pdo->prepare('UPDATE users SET featured = ? WHERE id = ?');
        $req->execute(['yes', $user_id]);
    } catch (PDOException $e) {
        echo 'Database error: ' . $e->getMessage();
    }
    } else {
        try {
            $req = $pdo->prepare('UPDATE users SET featured = ? WHERE id = ?');
            $req->execute(['no', $user_id]);
        } catch (PDOException $e) {
            echo 'Database error: ' . $e->getMessage();
        }
    }
      ?>
      <script>
          alert('Les informations de votre compte ont été modifiées avec succès !');
          window.location.replace('../dashboard.php')
      </script>
    <?php

}

function getUsers(){
    $pdo = getConnexion();
        $req = $pdo->prepare('SELECT * FROM users WHERE id != 1');
        $req->execute(array());
        $datas = $req->fetchAll();
        sendJSON($datas);
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

