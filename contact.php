<!DOCTYPE html>
<html lang="en">
   <head>
   <?php include "admin/connect.php";
session_start();?>

      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Contacter Nous</title>
   </head>
   <body>

      <?php include('header.php') ?> 
      <main class="cs-page-wrapper">
         <!-- Breadcrumb -->
      <nav id="bg-grey" class=" bg-secondary mb-3" aria-label="breadcrumb">
        <div class="container">
          <ol class="breadcrumb breadcrumb-alt mb-0 justify-content-center font-weight-bold">
            
  
            <li class="breadcrumb-item justify-content-center" aria-current="page">Contacter Nous</li>
          </ol>
        </div>
      </nav>
      
      <div class="container">
         <div class="d-sm-flex ">
         <div class="col-4">
            <img src="img/contact.jpg" alt="" class="image">
         </div>
         <div class="col-7">
            <h4 class="text-primary" > Contacter Nous</h4>
            <p id="text-secondary">Vos avis nous améliore</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea. </p>
         </div>
</div>
      </div>
      <!-- Contact Form=-->
      <div class="container mt-5 mb-5 d-sm-flex align-items-center">
         <div class="col-lg-6">
            <div class="fancy-title title-border">
               <h3>Envoyer un message</h3>
            </div>
            <form method="post" action="contmail.php">
               <div class="form-group">
                  <label for="name">Nom</label>
                  <input type="text" name="nom" class="form-control" id="name" placeholder="Votre nom">
               </div>
               <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" name="email" class="form-control" id="email" placeholder="email">
               </div>
               <div class="form-group">
                  <label for="sujet">Sujet</label>
                  <input type="text" name="sujet" class="form-control" id="sujet" placeholder="sujet">
               </div>
               <div class="form-group">
                  <label for="message">Message</label>
                  <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="3"></textarea>
               </div>
               <button type="submit" class="btn btn-primary">Envoyer</button>
            </form>
         </div>
         <div class="col-md-6 mt-4 col-lg-5 ">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1617.0884201354072!2d10.618021175975905!3d35.844667095014785!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12fd8a7865d4fc91%3A0x6c4ccecbaf25acee!2sAvenue%20Khezama%2C%20Sousse%2C%20Tunisia!5e0!3m2!1sen!2sus!4v1612613601903!5m2!1sen!2sus" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>						
         </div>
      </div>
      </section>
      </div>
      </section>
      <section>
         <div>
            <?php include('footer.php') ?> 
         </div>
      </section>

      <!-- Start of ChatBot (www.chatbot.com) code -->
<script type="text/javascript">
    window.__be = window.__be || {};
    window.__be.id = "601ff4d8db8f1400076cbd31";
    (function() {
        var be = document.createElement('script'); be.type = 'text/javascript'; be.async = true;
        be.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.chatbot.com/widget/plugin.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(be, s);
    })();
</script>
<!-- End of ChatBot code -->
   </body>
</html>