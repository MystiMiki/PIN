<?php 
  session_start(); 
?>
<!DOCTYPE HTML>  
<html>

<head>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia"/>
    <link rel="stylesheet" href="styles.css"/>
    <title>Project PIN</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
</head>
<body>
    <header>
        <h1 class="w3-sofia">Form</h1>
        <?php require 'components/top_nav.php'; ?> 
    </header> 
    
    <main class="w3-panel">  
      
    <div>
      <?php require 'components/control_form.php'; ?>      

      <h2>PHP Form Validation Example</h2>
      <p><span class="error valign_middle">* required field</span></p>
      <?php require 'components/form_layout.php'; ?>  

      <?php
      echo "<h2>Your Input:</h2>" .
            $first .
            "<br>" .
            $last .
            "<br>" .
            $email .
            "<br>" .
            $gender; 
      ?>
    </div>
    
    <section class="display-top">
      <?php require 'components/right_bar.php'; ?>
      <div class="right_bar w3-round-large margin5">	 
        <div class="w3-container min_height"><b>Your uploaded students:</b></div>       

      </div>
    </section>
  </main>

  <?php require 'components/footer.php'; ?>
</body>
</html>