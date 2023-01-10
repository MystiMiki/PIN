<?xml version="1.0" encoding="UTF-8"?>


<html xsl:version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<head>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia"/>
  <link rel="stylesheet" href="../styles.css"/>
</head>
  <body>
  <header>
    <h1 class="w3-sofia">Convert xml to html</h1>
    <nav class="w3-bar">
      <a href="../index.php" class="w3-bar-item w3-button w3-round">Overview of students</a>
      <a href="../recorder.php" class="w3-bar-item w3-button w3-round">Student recorder</a>
      <a href="../converter.php" class="w3-bar-item w3-button w3-round">Convert xml to html</a>
      <a href="../XPath.php" class="w3-bar-item w3-button w3-round">XPath</a>
      <a href="../form.php" class="w3-bar-item w3-button w3-round">Form</a>
    </nav>
  </header>
  

  <main class="w3-container">
    <div class="w3-display-container min_width">
      <xsl:if test="student/gender/male = ''">
        <div class="white_text bg_tiffany_blue"> 
          <h3 style="font-weight:bold"><xsl:value-of select="student/name"/></h3>              
        </div>
        <p class="w3-container w3-small w3-display-topright">Male</p> 
      </xsl:if>
      <xsl:if test="student/gender/female = ''">
        <div class="white_text bg_cinnabar"> 
          <h3 style="font-weight:bold"><xsl:value-of select="student/name"/></h3>          
        </div>
        <p class="w3-container w3-small w3-display-topright">Female</p>
      </xsl:if>
      <xsl:if test="(student/gender/non_binary = '') or (student/gender/other = '')">
        <div class="black_text bg_lotion"> 
          <h3 style="font-weight:bold"><xsl:value-of select="student/name"/></h3>          
        </div>
        <xsl:if test="student/gender/non_binary = ''">
            <p class="w3-container w3-small w3-display-topright w3-text-black">Non_binary</p> 
        </xsl:if>
      </xsl:if>    
      <div>
        <p>
          Personal identifier: <span style="font-style:italic"><xsl:value-of select="student/identifier/personal"/></span>
        </p>
        <p>
          Email: <span style="font-style:italic"><xsl:value-of select="student/email"/></span>
        </p>
        <p>
          Branch: <span style="font-style:italic"><xsl:value-of select="student/branch"/></span>
          (<xsl:value-of select="student/branch/@faculty"/> - <xsl:value-of select="student/branch/@institute"/>)
        </p>
        <p>
          From year <xsl:value-of select="student/start_year"/>
        </p>
      </div>
    </div>
  </main>
  <footer class="w3-container">
    <h3>Made by ME<sup>©</sup></h3>
  </footer>
</body>
</html>