<?php 
//require "autoload.php";
//require __DIR__."/vendor/testTools/testTool.php";

use sarassoroberto\usm\entity\User;
use sarassoroberto\usm\validator\bootstrap\ValidationFormHelper;
use sarassoroberto\usm\validator\UserValidation;

require "./__autoload.php";

// require __DIR__."/src/validator/fondation/ValidationFormHelper.php"
// print_r($_POST);
if($_SERVER['REQUEST_METHOD']==='GET'){
    list($firstName,$firstNameClass,$firstNameClassMessage,$firstNameMessage) = ValidationFormHelper::getDefault();
    
}

if($_SERVER['REQUEST_METHOD']==='POST'){
    $user = new User($_POST['firstName'],$_POST['lastName'],$_POST['email'],$_POST['birthday']);
    $val = new UserValidation($user);
    $firstNameValidation = $val->getError('firstName');

    list($firstName,$firstNameClass,$firstNameClassMessage,$firstNameMessage) = ValidationFormHelper::getValidationClass($firstNameValidation);

    if($val->getIsValid()){
        //TODO
        echo "salva l'utente";
    }

    // $firstName = $user->getFirstName();
    // $firstNameClass = $firstNameValidation->getIsValid() ? 'is-valid' : 'is-invalid';
    // $firstNameClassMessage = $firstNameValidation->getIsValid() ? 'valid-feedback' : 'invalid-feedback';
    // $firstNameMessage = $firstNameValidation->getMessage();
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

</head>
<body>
    <header>
            USM 
    </header>
    <div class="container">
        <form action="add_user_form.php" method="POST">
            <div class="form-group">
               <label for="">Nome</label>
               <!-- is-invalid  -->
               <input
                value="<?= $firstName ?>" 
                class="form-control <?= $firstNameClass ?>"  
                name="firstName"  
                type="text">
               <div class="<?= $firstNameClassMessage ?>">
                  <?= $firstNameMessage ?>
               </div> 
            </div>
            <div class="form-group">
                <label for="">Cognome</label>
                <input class="form-control" name="lastName" type="text">
                <div class="invalid-feedback">
                    il cognome è obbligatorio
                </div> 
             </div>
             <div class="form-group">
                <label for="">email</label>
                <input class="form-control"  name="email" type="text"> 
                <div class="invalid-feedback">
                    email errata
                </div>
                <div class="invalid-feedback">
                    email obbligatoria
                </div>
             </div>
             <div class="form-group">
                <label for="">data di nascita</label>
                <input class="form-control" name="birthday" type="date">
             </div>
             <button class="btn btn-primary mt-3" type="submit">Aggiungi</button>
        </form>
    </div>
</body>
</html>