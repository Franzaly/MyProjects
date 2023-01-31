

<div class="logincontainer">

    <div class="titleform">
    <p> <b> ADMIN</b> </p>
    </div>
    
    <!-- .... Connexion ..... -->
    <form method="post" action="?action=seConnecter">

        <label for="uname"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="nom" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="mot_passe" required>
        
        <button class="btn btn-dark "> SUBMIT</button>
        <label class="psw">
            <a href=" "> Forgot Password?  </a>
        </label>
    </form>

    <?php 
        include_once "vues/inclusions/functions.inc.php";
        afficherErreurs($controleur->getMessagesErreur());
    ?>

</div>



