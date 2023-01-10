<!DOCTYPE html>
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
        <h1 class="w3-sofia">Convert xml to html</h1>
        <?php require 'components/top_nav.php'; ?> 
    </header>



    <main class="display_top">
        <section class="height400">
            <div>
                <p>
                    All students preview are already created. Use only for update of styles. It will <span class="w3-text-red">overwrite</span> existing file.
                </p>
                <form enctype="multipart/form-data" action="converter.php" method="POST">
                    <label for="student">Click to upload the student in a valid XML file.</label>
                    <br>
                    <input type="file" id="student" name="student" data-max-file-size="2M"/>
                    <br>
                    <button type="submit" class="w3-button">Send</button>
                </form>
            </div>
        

            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $student_directory = 'UploadedStudents/';
                $uploaded_student = $student_directory . basename($_FILES['student']['name']) . ".html";

                if (file_exists($uploaded_student)){
                    echo '<p class="text-danger">A file with the same name already exists in the database. <p class="w3-text-red"> The file was overwritten! </p></p>';
                } 
                if (move_uploaded_file($_FILES['student']['tmp_name'], $uploaded_student)) {
                    // XSD validation
                    $xml = new DOMDocument;
                    $xml->load($uploaded_student);
                    if ($xml->schemaValidate('student.xsd')){
                    
                        echo '<hr><p class="text-success">The uploaded file is valid and has been successfully uploaded to the database.</p>';
                        
                        // XML
                        $xml_document = new DOMDocument();
                        $xml_document->load($uploaded_student);

                        // XSL
                        $xslt_document = new DOMDocument();
                        $xslt_document->load("student.xslt");

                        // XSLTtransformation
                        $xslt_procesor = new XSLTProcessor();
                        $xslt_procesor->importStylesheet($xslt_document);
                        $transformed_xml = $xslt_procesor->transformToDoc($xml_document);
                        
                        // saving the transformed document
                        $file_name = basename($_FILES['student']['name']) . ".html";
                        $transformed_xml->save("UploadedStudents/" . $file_name );
                    
                    } else {
                    echo '<p class="text-warning">Uploaded file is not valid! Please check the correct structure.</p>';
                    unlink($uploaded_student);
                    }
                } else {
                    echo '<p class="text-warning">An error occurred while uploading the file!</p>';
                }
            }
            ?> 
        </section>
        <svg
            xmlns:dc="http://purl.org/dc/elements/1.1/"
            xmlns:cc="http://creativecommons.org/ns#"
            xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
            xmlns:svg="http://www.w3.org/2000/svg"
            xmlns="http://www.w3.org/2000/svg"
            xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
            xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
            width="1920px"
            height="1080px"
            viewBox="0 0 1920 1080"
            version="1.1"
            id="SVGRoot"
            sodipodi:docname="seal.svg"
            inkscape:version="1.0.1 (3bc2e813f5, 2020-09-07)">
            <defs
                id="defs10">
                <style type="text/css"><![CDATA[
                    svg{
                        transition:2s;
                        opacity: 0;
                    }
                    svg:hover{
                        opacity: 100%;
                        transform: scale(1.5,1.5);
                    }
                ]]></style>
                <inkscape:path-effect
                    effect="simplify"
                    id="path-effect196"
                    is_visible="true"
                    lpeversion="1"
                    steps="1"
                    threshold="0.0131818"
                    smooth_angles="360"
                    helper_size="0"
                    simplify_individual_paths="false"
                    simplify_just_coalesce="false" />
                <inkscape:path-effect
                    effect="simplify"
                    id="path-effect192"
                    is_visible="true"
                    lpeversion="1"
                    steps="1"
                    threshold="0.00837838"
                    smooth_angles="360"
                    helper_size="0"
                    simplify_individual_paths="false"
                    simplify_just_coalesce="false" />
                <inkscape:path-effect
                    effect="simplify"
                    id="path-effect188"
                    is_visible="true"
                    lpeversion="1"
                    steps="1"
                    threshold="0.00139665"
                    smooth_angles="360"
                    helper_size="0"
                    simplify_individual_paths="false"
                    simplify_just_coalesce="false" />
                <inkscape:path-effect
                    effect="simplify"
                    id="path-effect184"
                    is_visible="true"
                    lpeversion="1"
                    steps="1"
                    threshold="0.00139665"
                    smooth_angles="360"
                    helper_size="0"
                    simplify_individual_paths="false"
                    simplify_just_coalesce="false" />
                <inkscape:path-effect
                    effect="simplify"
                    id="path-effect180"
                    is_visible="true"
                    lpeversion="1"
                    steps="1"
                    threshold="0.00139665"
                    smooth_angles="360"
                    helper_size="0"
                    simplify_individual_paths="false"
                    simplify_just_coalesce="false" />
                <inkscape:path-effect
                    effect="simplify"
                    id="path-effect176"
                    is_visible="true"
                    lpeversion="1"
                    steps="1"
                    threshold="0.00139665"
                    smooth_angles="360"
                    helper_size="0"
                    simplify_individual_paths="false"
                    simplify_just_coalesce="false" />
                <inkscape:path-effect
                    effect="simplify"
                    id="path-effect172"
                    is_visible="true"
                    lpeversion="1"
                    steps="1"
                    threshold="0.00139665"
                    smooth_angles="360"
                    helper_size="0"
                    simplify_individual_paths="false"
                    simplify_just_coalesce="false" />
                <inkscape:path-effect
                    effect="simplify"
                    id="path-effect168"
                    is_visible="true"
                    lpeversion="1"
                    steps="1"
                    threshold="0.00139665"
                    smooth_angles="360"
                    helper_size="0"
                    simplify_individual_paths="false"
                    simplify_just_coalesce="false" />
                <inkscape:path-effect
                    effect="simplify"
                    id="path-effect164"
                    is_visible="true"
                    lpeversion="1"
                    steps="1"
                    threshold="0.00139665"
                    smooth_angles="360"
                    helper_size="0"
                    simplify_individual_paths="false"
                    simplify_just_coalesce="false" />
                <inkscape:path-effect
                    effect="simplify"
                    id="path-effect160"
                    is_visible="true"
                    lpeversion="1"
                    steps="1"
                    threshold="0.00139665"
                    smooth_angles="360"
                    helper_size="0"
                    simplify_individual_paths="false"
                    simplify_just_coalesce="false" />
                <inkscape:path-effect
                    effect="simplify"
                    id="path-effect156"
                    is_visible="true"
                    lpeversion="1"
                    steps="1"
                    threshold="0.000408163"
                    smooth_angles="360"
                    helper_size="0"
                    simplify_individual_paths="false"
                    simplify_just_coalesce="false" />
                <inkscape:path-effect
                    effect="simplify"
                    id="path-effect152"
                    is_visible="true"
                    lpeversion="1"
                    steps="1"
                    threshold="0.000408163"
                    smooth_angles="360"
                    helper_size="0"
                    simplify_individual_paths="false"
                    simplify_just_coalesce="false" />
                <inkscape:path-effect
                    effect="simplify"
                    id="path-effect148"
                    is_visible="true"
                    lpeversion="1"
                    steps="1"
                    threshold="0.000408163"
                    smooth_angles="360"
                    helper_size="0"
                    simplify_individual_paths="false"
                    simplify_just_coalesce="false" />
            </defs>
            <sodipodi:namedview
                id="base"
                pagecolor="#ffffff"
                bordercolor="#666666"
                borderopacity="1.0"
                inkscape:pageopacity="0.0"
                inkscape:pageshadow="2"
                inkscape:zoom="0.7"
                inkscape:cx="1022.6213"
                inkscape:cy="473.21341"
                inkscape:document-units="px"
                inkscape:current-layer="layer1"
                inkscape:document-rotation="0"
                showgrid="false"
                inkscape:window-width="1920"
                inkscape:window-height="1009"
                inkscape:window-x="-8"
                inkscape:window-y="-8"
                inkscape:window-maximized="1" />
            <metadata
                id="metadata13">
                <rdf:RDF>
                    <cc:Work
                        rdf:about="">
                    <dc:format>image/svg+xml</dc:format>
                    <dc:type
                        rdf:resource="http://purl.org/dc/dcmitype/StillImage" />
                    <dc:title></dc:title>
                    </cc:Work>
                </rdf:RDF>
            </metadata>
            <g
                inkscape:label="Vrstva 1"
                inkscape:groupmode="layer"
                id="layer1"
                style="display:inline">
                <path
                    style="fill:#cccccc;stroke:#000000;stroke-width:1px;stroke-linecap:butt;stroke-linejoin:miter;stroke-opacity:1;fill-opacity:1"
                    d="m 475.02498,757.34626 c 13.32237,12.19426 151.80406,2.52852 163.97902,-24.44951 30.45671,13.21865 60.16611,16.4638 93.85315,18.53182 17.97778,0.18494 35.98568,0.35642 53.98721,0.40201 18.00154,0.0456 35.99671,-0.0347 53.94904,-0.35339 17.95233,-0.31865 35.86181,-0.87564 53.69197,-1.78341 113.54443,44.80653 167.00953,44.97655 224.64463,23.25479 33.1608,-12.4978 -71.866,-43.08242 -49.4427,-47.50291 C 1108.3888,717.81611 1133.4644,708.73868 1180,690 l 141.4286,-80 c 55.4922,-13.48215 127.2682,-22.76578 171.4285,12.85714 19.3121,-5.80502 15.5642,-21.49292 8.5715,-38.57143 -14.7619,-23.00104 -28.0952,-36.96908 -42.8571,-48.57143 2.7539,-29.62701 25.4862,-39.27568 38.5714,-58.57142 6.1966,-12.94654 -18.8244,-11.70325 -54.2858,-5.71429 -30.877,18.13293 -57.9249,38.18038 -95.7142,52.85714 -55.5986,-106.85663 -87.0859,-121.96902 -154.2858,-167.14285 -73.5426,-37.52476 -150.2715,-59.11855 -231.42853,-58.57143 -47.1945,-1.17997 -89.75826,3.81437 -114.28571,32.85714 -12.45729,-8.0647 -24.59112,-13.5445 -39.508,-16.9468 C 792.71798,311.07948 775.01806,309.75469 751.42858,310 584.02798,331.88661 523.3023,418.03886 500,527.14285 c -5.06993,75.88232 12.98606,121.98682 52.09558,160.23828 -10.59465,-3.17343 -99.22474,55.82035 -77.0706,69.96513"
                    id="path111"
                    sodipodi:nodetypes="cccsscsscccccccccccscccc" />
                <path
                    style="opacity:1;fill:#000000"
                    id="path113"
                    sodipodi:type="arc"
                    sodipodi:cx="830"
                    sodipodi:cy="550"
                    sodipodi:rx="22.857143"
                    sodipodi:ry="25.714285"
                    sodipodi:start="0"
                    sodipodi:end="6.194924"
                    sodipodi:arc-type="slice"
                    d="m 852.85714,550 a 22.857143,25.714285 0 0 1 -22.35283,25.70803 22.857143,25.714285 0 0 1 -23.3392,-24.57361 22.857143,25.714285 0 0 1 21.32294,-26.79239 22.857143,25.714285 0 0 1 24.28012,23.39134 L 830,550 Z" />
                <path
                    style="display:inline;opacity:0.75;fill:#000000"
                    id="path113-9"
                    sodipodi:type="arc"
                    sodipodi:cx="644.28571"
                    sodipodi:cy="545.71429"
                    sodipodi:rx="22.857143"
                    sodipodi:ry="25.714285"
                    sodipodi:start="0"
                    sodipodi:end="6.194924"
                    sodipodi:arc-type="slice"
                    d="m 667.14285,545.71429 a 22.857143,25.714285 0 0 1 -22.35284,25.70803 22.857143,25.714285 0 0 1 -23.33919,-24.57361 22.857143,25.714285 0 0 1 21.32294,-26.79238 22.857143,25.714285 0 0 1 24.28012,23.39133 l -22.76817,2.26663 z" />
                <ellipse
                    style="opacity:1;fill:#000000"
                    id="path136"
                    cx="737.85712"
                    cy="567.14288"
                    rx="23.571428"
                    ry="12.857142" />
                <path
                    style="fill:none;stroke:#000000;stroke-width:1px;stroke-linecap:butt;stroke-linejoin:miter;stroke-opacity:1"
                    d="m 668.57143,597.14286 c 4.6454,7.29375 10.70378,14.25787 18.91748,17.57323 6.22209,2.51147 13.42267,1.78113 19.3034,-1.33669 8.63893,-4.58015 14.85311,-12.68893 19.14632,-21.29098 2.37498,-4.7586 4.19887,-9.78793 5.48994,-14.94556"
                    id="path158"
                    inkscape:path-effect="#path-effect160"
                    inkscape:original-d="m 668.57143,597.14286 c 23.68258,37.48223 54.37898,13.91263 62.85714,-20" />
                <path
                    style="fill:none;stroke:#000000;stroke-width:1px;stroke-linecap:butt;stroke-linejoin:miter;stroke-opacity:1"
                    d="m 795.71429,611.42857 c -4.4895,3.70546 -8.82755,8.27845 -14.75962,9.40327 -9.1047,1.72641 -18.92417,-0.22972 -26.47308,-5.70811 -8.98825,-6.52294 -14.5449,-16.58302 -18.58637,-26.71977 -1.65224,-4.14412 -0.97303,-9.60386 -4.17496,-12.69661 -0.43902,-0.42405 -0.22805,1.16683 -0.29169,1.43551"
                    id="path162"
                    inkscape:path-effect="#path-effect164"
                    inkscape:original-d="m 795.71429,611.42857 c -8.64893,7.36685 -11.46762,10 -21.42858,10 -37.78631,0 -42.85714,-55.91337 -42.85714,-44.28571" />
                <path
                    style="fill:none;stroke:#000000;stroke-width:1px;stroke-linecap:butt;stroke-linejoin:miter;stroke-opacity:1"
                    d="m 847.14286,331.42857 c 53.92932,34.27155 113.96349,71.80323 138.76602,133.74668"
                    id="path194"
                    inkscape:path-effect="#path-effect196"
                    inkscape:original-d="m 847.14286,331.42857 c 50.43936,31.02832 117.74122,75.92847 138.76602,133.74668" />
                <path
                    style="opacity:1;fill:#333333;stroke-width:1.01015"
                    d="m 825.58762,575.38447 c -8.27859,-2.07476 -14.70124,-8.30476 -17.20161,-16.68564 -5.18171,-17.36831 5.50349,-34.23102 21.76143,-34.34251 10.09645,-0.0692 18.3594,6.82918 21.77531,18.17939 0.79622,2.64565 1.32449,4.93347 1.17391,5.08404 -0.15057,0.15057 -3.67429,0.69882 -7.83049,1.21833 l -7.55672,0.94456 7.87445,0.13035 7.87446,0.13035 -0.67887,3.78807 c -1.57974,8.81492 -5.63618,15.2623 -11.85306,18.83946 -4.7916,2.75706 -10.87273,3.83288 -15.33881,2.7136 z"
                    id="path198" />
                <path
                    style="opacity:1;fill:#333333;stroke-width:1.01015"
                    d="m 764.47339,620.81955 c -10.07586,-3.07605 -20.02231,-12.81006 -26.26187,-25.70097 -2.22349,-4.59372 -4.04271,-9.1444 -4.04271,-10.11262 0,-0.96822 -0.51567,-2.72395 -1.14593,-3.90161 -1.04625,-1.95492 -1.33839,-1.60972 -3.35795,3.96778 -3.0402,8.39622 -7.08532,15.02455 -12.9711,21.25442 -9.79667,10.3694 -21.07873,13.12579 -31.81871,7.77383 -5.36794,-2.67495 -16.36622,-13.65404 -16.36622,-16.33765 0,-0.78858 1.77353,0.8099 3.94119,3.55219 7.00866,8.86662 15.76785,14.38834 22.82445,14.38834 12.3307,0 26.93008,-13.65149 32.77854,-30.65032 l 1.90559,-5.53871 -2.69315,-0.66241 c -1.48124,-0.36433 -4.56273,-1.75037 -6.84776,-3.08008 -9.10217,-5.29678 -8.02556,-13.58062 2.40002,-18.46672 4.94478,-2.31743 7.12931,-2.71599 14.88657,-2.71599 10.68069,0 17.2987,2.09809 21.18447,6.71607 6.87842,8.17453 -1.47803,17.00694 -17.69405,18.70185 l -6.18337,0.64629 0.66275,3.63541 c 1.19178,6.53731 7.46063,18.03201 13.23641,24.27054 6.63939,7.17133 13.67513,10.92113 22.12882,11.79387 7.97772,0.8236 13.35017,-0.73749 19.6351,-5.70545 2.8125,-2.22315 5.11364,-3.61515 5.11364,-3.09334 0,1.19587 -6.53919,6.37222 -10.80898,8.55627 -3.42162,1.7502 -15.70415,2.17488 -20.50575,0.70901 z"
                    id="path202" />
                <path
                    style="opacity:1;fill:#333333;stroke-width:1.01015"
                    d="m 767.96987,621.81134 c -9.32961,-1.43826 -17.19751,-6.8391 -24.13086,-16.56439 -4.61876,-6.47867 -8.97054,-15.37329 -10.15093,-20.74758 -0.98057,-4.46451 -2.13352,-3.90555 -4.0892,1.98247 -3.79872,11.43688 -15.30302,24.90977 -24.59532,28.80402 -4.01049,1.68073 -13.96056,1.87975 -17.95983,0.35923 -4.48377,-1.70473 -11.92066,-7.84196 -16.02617,-13.22545 -5.61826,-7.36715 -3.41419,-7.18969 3.42667,0.2759 14.36218,15.67379 27.98341,16.03158 41.63895,1.09374 4.61931,-5.05308 13.03487,-19.83665 13.03487,-22.89829 0,-0.59346 -2.23764,-1.87376 -4.97254,-2.84511 -13.63347,-4.84218 -13.24426,-16.70647 0.72132,-21.98852 4.83468,-1.82856 7.23547,-2.10488 14.85782,-1.71002 14.29688,0.74063 21.71828,5.15262 21.71828,12.91145 0,3.06204 -0.6752,4.3813 -3.52129,6.88021 -3.60181,3.16243 -11.83636,6.20892 -16.78248,6.20892 -5.14412,0 -5.86915,0.74293 -4.75034,4.86769 1.70326,6.27945 8.02154,17.34606 13.03576,22.83241 6.95392,7.6087 13.66646,10.93977 23.15153,11.48886 8.23232,0.47656 11.52977,-0.60368 19.06963,-6.24715 4.58512,-3.4319 6.22298,-2.18506 1.95169,1.48574 -7.31309,6.28497 -15.65049,8.57394 -25.62756,7.03587 z"
                    id="path204" />
            </g>
            </svg>
    </main>
    <?php require 'components/footer.php'; ?>
</body>
</html>
