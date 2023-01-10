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
    
    <main>  
      
      <div>
        <?php require 'components/control_form.php'; ?>      
        <?php require 'components/OOP.php'; ?>

        <h2>PHP Form Validation Example</h2>
        <p><span class="error valign_middle">* required field</span></p>
        <?php require 'components/form_layout.php'; ?>  

        <?php display_input($file_name, $first, $last, $email, $gender, $degree, $personal, $start_year, $branch, $faculty, $institute); ?>
      </div>
      
      <section class="display_top">
        <?php require 'components/right_bar.php'; ?>
        <div class="right_bar w3-round-large margin5">	 
          <div class="w3-container min_height"><b>Your created students:</b></div>  
          <?php
            if (isset($_SESSION["file_name"])) {              
              foreach($_SESSION["file_name"] as $key=>$file_name) {
                  echo '<p class="w3-container w3-leftbar w3-border-black">' . $_SESSION["file_name"][$key] . '</p>';
              }              
            }                  
          ?>         
        </div>        
      </section>
    </main>

    <?php require 'components/footer.php'; ?>
</body>
</html>