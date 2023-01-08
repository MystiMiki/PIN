<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
        <section class="w3-panel w3-border w3-round-large">
          <h4>Name of file:</h4>
          <input type="text" name="file" placeholder="studentX.xml"> 
          <span class="error">* 
            <?php echo '<div class="w3-container min_height">' . $fileErr . '</div>';?>
          </span>
        </section>

        <section class="w3-panel w3-border w3-round-large">
          <h4>First name:</h4>
          <input type="text" name="first">
          <span class="error">* 
            <?php echo '<div class="w3-container min_height">' . $firstErr . '</div>';?>
          </span>
        </section>

        <section class="w3-panel w3-border w3-round-large">
          <h4>Last name:</h4>
          <input type="text" name="last">
          <span class="error">* 
            <?php echo '<div class="w3-container min_height">' . $lastErr . '</div>';?>
          </span>
        </section>

        <section class="w3-panel w3-border w3-round-large">
          <h4>E-mail:</h4>
          <input type="text" name="email" placeholder="@">
          <span class="error">* 
            <?php echo '<div class="w3-container min_height">' . $emailErr . '</div>';?>
          </span>
        </section>

        <section class="w3-panel w3-border w3-round-large">
          <h4>Gender:</h4>
          
          <span class="margin2">
            <input type="radio" name="gender" value="female" class="margin2">Female
          </span>
          <span class="margin2">
            <input type="radio" name="gender" value="male" class="margin2">Male
          </span>
          <span class="margin2">
            <input type="radio" name="gender" value="nonbinary" class="margin2">Nonbinary
          </span>
          <span class="margin2">
            <input type="radio" name="gender" value="other" class="margin2">Other
          </span>
          <span class="error">* 
            <?php echo '<div class="w3-container min_height">' . $genderErr . '</div>';?>
          </span>
        </section>

        <section class="w3-panel w3-border w3-round-large">
          <h4>Personal identifier:</h4>
          <input type="text" name="personal" placeholder="F...">
          <span class="error">* 
            <?php echo '<div class="w3-container min_height">' . $personalErr . '</div>';?>
          </span>
        </section>

        <section class="w3-panel">
          <input type="submit" name="submit" value="Submit">  
        </section>
      </form>