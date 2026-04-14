<?php 
$bdd = new pdo('mysql:host=localhost;dbname=gestion;charset=utf8','root', '');
if (isset($_POST['submit'])) {
  
  if   (!empty($_POST['pseudo']) AND  !empty($_POST['name']) AND !empty($_POST['email']) AND !empty($_POST['mdp']))
     {
     $pseudo= htmlspecialchars($_POST['pseudo']);
     $nom= htmlspecialchars($_POST['name']);
     $email= htmlspecialchars($_POST['email']);
     $mdp= sha1($_POST['pseudo']);
    
  }
  else 
  {
     $erreur ="veillez remplire tout les champ";
  } 
  

  }
    

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
          <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-7">
              <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                <div class="card-body p-4 p-md-5">
                  <h3 class="mb-4 pb-2 pb-md-1 mb-md-5">S'incrire</h3>
                  <form  method="POST">
      
                    <div class="row">
                      <div class="col-md-6 mb-4">
      
                        <div class="form-outline">  
                          <input type="text" id="firstName" class="form-control form-control-lg"  name="pseudo" />
                          <label class="form-label" for="firstName">Prenom</label>
                        </div>
      
                      </div>
                      <div class="col-md-6 mb-4">
                    
                    <div class="form-outline">
                      <input type="text" id="firstName" class="form-control form-control-lg"  name="mdp" />
                      <label class="form-label" for="firstName">motpasse</label>
                    </div>

                  </div>
                      <div class="col-md-6 mb-4">
      
                        <div class="form-outline">
                          <input type="text" id="lastName" name="name" class="form-control form-control-lg" name="name" />
                          <label class="form-label" for="lastName">Nom</label>
                        </div>
      
                      </div>
                    </div>
      
                    <div class="row">
                      <div class="col-md-6 mb-4 d-flex align-items-center">
      
                        
                    </div>
      
                    <div class="row">
                      <div class="col-md-6 mb-4 pb-2">
      
                        <div class="form-outline">
                          <input type="email"  name="email" id="emailAddress" class="form-control form-control-lg" />
                          <label class="form-label" for="emailAddress">Email</label>
                        </div>
      
                      </div>
                     
      
                    
      
                    <div class="mt-4 pt-2">
                      <input class="btn btn-dark btn-lg"  type="submit"      name="submit"  value="Envoyer"  />
                    </div>
      
                  </form>
                  <?php 
                      
                       if(isset($_POST['$erreur'])) 
                       {
                       echo $erreur;
                       
                       }

                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
  </body>
</html>