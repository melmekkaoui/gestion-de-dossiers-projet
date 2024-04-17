<?php
    session_start();
    include('init.php');
    use App\SQLiteConnection;
    use App\User;
    include (__DIR__."/resource/header.php");
?>
    <?php 
        /* if (isset($_SESSION['loggedin'])) {
            header('Location: dashboard.php');
            exit;
        } */

        $logged = false;
        if($_SERVER["REQUEST_METHOD"] == "POST"){
    
            $pdo = ((new SQLiteConnection)->connect());
            $UserObject = new User($pdo);
            $nomUtilisateur = Validator::validateName($_POST['Uname']);
            $password = $_POST['pswd'];
            if(!empty($nomUtilisateur)){
                $login = $UserObject->Login($nomUtilisateur);
                foreach($login as $x){
                    if(Hash::verifyHash($password,$x['motDePasse'])){
                        
                        $_SESSION['loggedin'] = TRUE;
                        $_SESSION['username'] = $nomUtilisateur;
                        $_SESSION['id'] = $x['user_id'];
                        $login =true;
                        echo "<script>window.location = 'dashboard.php';</script>";
                        echo 'Welcome ' . $_SESSION['username'] . '!';
                        
                    }
                    else{
                        
                    }
                }
    
            }
        }
    
    
    ?>
    <div class="auth_page">
        <div class="container">
           <div class="auth_div d-flex justify-content-center align-items-center">

           <div class="auth_form">
                <h2>Identification</h2>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <?php
                            if($logged == false){
                                ?>
                                    <div class="alert alert-danger">
                                        <strong>Erreur!</strong>les données saisies n'exist pas !</a>
                                    </div>
                                <?php
                            }
                        ?>
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Nom Utilisateur</label>
                    <input type="text" class="form-control" id="email" placeholder="taper le nom d'utilisateur" name="Uname">
                </div>
                <div class="mb-3">
                    <label for="pwd" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" id="pwd" placeholder="taper Mot de passe" name="pswd">
                </div>
                
                <button type="submit" class="auth_btn btn btn-primary">S'identifier</button>
                
                </form>
                <br/>
                <a href="register.php">Cliquer ici pour créer un compte</a>
            </div>
           </div>
        </div>
    </div>    






<?php
     include(__DIR__."/resource/footer.php");    
?>