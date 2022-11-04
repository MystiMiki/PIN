<?xml version="1.0" encoding="UTF-8"?>
<html xsl:version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<body style="font-family:Arial;font-size:12pt;background-color:#EEEEEE">
  <header>
    <h1>Students</h1>
  </header>   
  <div>
    <xsl:for-each select="students/student">
      <div>
        <xsl:choose>
          <xsl:when test="branch = 'Programování a softwarové systémy'">
            <div style="background-color:#17BEBB;color:white;padding:4px;"> 
              <span style="font-weight:bold"><xsl:value-of select="name"/></span>     
            </div>
          </xsl:when>
          <xsl:otherwise>
            <div style="background-color:#EF3E36;color:white;padding:4px;"> 
              <span style="font-weight:bold"><xsl:value-of select="name"/></span>
            </div>
          </xsl:otherwise>    
        </xsl:choose>
        <div style="padding-top:3px">
          <xsl:if test="disorder">
            <span> Disorders: </span>
            <xsl:for-each select="disorder/*">
              <xsl:value-of select="local-name()"/>
              <xsl:text> </xsl:text>
            </xsl:for-each>
          </xsl:if>
        </div>
        <div>
          <p>
            <span style="font-style:italic"><xsl:value-of select="branch"/></span>
            (<xsl:value-of select="branch/@faculty"/>)
          </p>
        </div>
      </div>
    </xsl:for-each>
  </div>
</body>
</html>
