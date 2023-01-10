<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  

        <!-- text input -->
        <section class="w3-panel w3-border w3-round-large">
          <h4>Name of file:</h4> <!-- name of value -->
          <input type="text" name="file_name" placeholder="studentX.xml"> <!-- value input -->  
          <!-- error message - required -->
          <span class="error">* 
            <?php echo '<div class="w3-container min_height">' . $file_nameErr . '</div>';?>
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

        <!-- radio button input -->
        <section class="w3-panel w3-border w3-round-large">
          <h4>Degree:</h4>     
          <!-- options -->
          <span class="margin2">
            <input type="radio" name="degree" value="bc" class="margin2">Bachelor
          </span>
          <span class="margin2">
            <input type="radio" name="degree" value="mgr" class="margin2">Master
          </span>
          <span class="error">* 
            <?php echo '<div class="w3-container min_height">' . $degreeErr . '</div>';?>
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

        <section class="w3-panel w3-border w3-round-large">
          <h4>The year of the beginning:</h4>
          <input type="text" name="start_year" placeholder=">1900">
          <span class="error">
            <?php echo '<div class="w3-container min_height">' . $start_yearErr . '</div>';?>
          </span>
        </section>

        <section class="w3-panel w3-border w3-round-large display_row">
          <section>
          <h4>Branch:</h4>
          <input type="text" name="branch">
            <section>
              <h4>Faculty:</h4>
              <input type="text" name="faculty">
              <span class="error"> 
                <?php echo '<div class="w3-container min_height">' . $facultyErr . '</div>';?>
              </span>
              <h4>Institute:</h4>
              <input type="text" name="institute">
              <span class="error"> 
                <?php echo '<div class="w3-container min_height">' . $instituteErr . '</div>';?>
              </span>    
            </section>        
          </section>  
          <p class="error w3-margin-left halign_middle"> 
            <b>Faculty</b> and <b>institute</b> is required if branch is fill out.
          </p>        
        </section>

        <!-- Buttons - Submit, Delete history -->
        <section class="w3-panel">
          <input type="submit" name="submit" value="Submit">  
          <input type="submit" name="submit" value="Delete history">  
        </section>
      </form>