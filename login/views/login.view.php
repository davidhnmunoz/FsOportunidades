<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link href="css/metro.min.css" rel="stylesheet">
	<link href="css/estilos.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">
  <script src="js/jquery.js"></script> 
    <script src="js/metro.min.js"></script>
    <script>
                // var x;
                // x=$(document);
                // x.ready(iniciar);
                // function iniciar(){
                //     x=$('#ocultar');
                //     x.click(ocultame);

                // }
               

                // function ocultame(){
                //     var x=$('#ocultar')
                //     x.fadeOut('slow');
                // }


   </script> 
    
</head>
<body>
<!--   <style>
        .login-form {
            width: 25rem;
            height: 18.75rem;
            position: fixed;
            top: 50%;
            margin-top: -9.375rem;
            left: 50%;
            margin-left: -12.5rem;
            background-color: #070707;
            opacity: 0;
            -webkit-transform: scale(.8);
            transform: scale(.8);
        }
    </style>

 
   -->


    <div class="formu">
        <form name="form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
           <center> <h1 class="text-light"><i>Inicie Sesión</i></h1></center>
            <hr class="thin"/>
            <br />
            <div class="input-control text full-size" data-role="input">
                <label for="user_login">Usuario:</label>
                <input type="text" name="usuario" id="user_login">
                <button class="button helper-button clear"><i class="fa fa-user" aria-hidden="true"></i></span></button>
            </div>
            <br />
            <br />
            <div class="input-control password full-size" data-role="input">
                <label for="user_password">Password:</label>
                <input type="password" name="password" id="user_password">
                <button class="button helper-button reveal"><i class="fa fa-key"" aria-hidden="true"></i></span></button>
            </div>
             
            <br />
            <br />
            
            <br>
                
          <?php 
          
          if(!isset($_SESSION['usuario'])){

                 include 'btn_enviar.php'; } ?>
           
             <?php if(!empty($enviar)): ?>
                 <div class="enviar">
                     <?php echo $enviar;  ?>
                 </div>
              <?php echo $enviado; ?> 
            <?php endif; ?>
            <?php if(!empty($error)): ?>
                <div class="panel alert">
                 <div class="heading ">
                     <?php echo $error ?>
                 </div>
    
               </div>

            <?php endif; ?>
           </div>
        </form>
        
</body>
</html>