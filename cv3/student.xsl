<?xml version="1.0" encoding="UTF-8"?>
<html xsl:version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<body style="font-family:Arial;font-size:12pt;background-color:#EEEEEE">
    <h2>Students</h2>
    <table border="1">
    <tr bgcolor="#9acd32">
      <th style="text-align:left">Title</th>
      <th style="text-align:left">Artist</th>
    </tr>
    <xsl:for-each select="students/student">
    <tr>
      <td><xsl:value-of select="name/first"/></td>
      <td><xsl:value-of select="name/last"/></td>
    </tr>
    </xsl:for-each>
  </table>
</body>
</html>