<?php
abstract class human {
    protected $first_name;
    protected $last_name;
    protected $gender;

    public function __construct($first_name, $last_name, $gender)
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->gender = $gender;
    }

    abstract public function create_XML();
  }

// Student is a descendant of Human
class Student extends Human {
    private $file_name;
    private $email;
    private $degree;
    private $personal_id;
    private $start_year;
    private $branch;
    private $faculty;
    private $institute;
    

    public function __construct($file_name, $first_name, $last_name, $email, $gender
    , $degree, $personal_id, $start_year, $branch, $faculty, $institute) {
        $this->file_name = $file_name;

        parent::__construct($first_name, $last_name, $gender);

        $this->degree = $degree;
        $this->email = $email;
        $this->personal_id = $personal_id;
        $this->start_year = $start_year;
        $this->branch = $branch;
        $this->faculty = $faculty;
        $this->institute = $institute;
    }

    // getter
    function get_file_name() { return $this->file_name; }
    function get_first() { return $this->first_name; }
    function get_last() { return $this->last_name; }
    function get_email() { return $this->email; }
    function get_gender() { return $this->gender; }
    function get_degree() { return $this->degree; }
    function get_personal_id() { return $this->personal_id; }
    function get_start_year() { return $this->start_year; }
    function get_branch() { return $this->branch; }
    function get_faculty() { return $this->faculty; }
    function get_institute() { return $this->institute; }
    
    // create student XML file, takes values from class Student
    public function create_XML(){
        // https://www.guru99.com/php-and-xml.html#8
        // create main file and set standart values
        $dom = new DOMDocument(); 

        $dom->encoding = 'utf-8';

        $dom->xmlVersion = '1.0';

        $dom->formatOutput = true;

        // name of file
        $xml_file_name = 'XMLstudents/'.$this->get_file_name();

        // student
        // first it is need to be created and add all attributes and inner elements, then can be added to parent element
        // we can go from up to down or from the most inner elements
        // this is from up to down
        // number in name of variable, tell us how deep it needs to go
 
        $root_student = $dom->createElement('student');

        $attr_study = new DOMAttr('study', $this->get_degree());

        $root_student->setAttributeNode($attr_study);
    
        // name
        $child1_name = $dom->createElement('name');

        $child2_first = $dom->createElement('first', $this->get_first());
        $child1_name->appendChild($child2_first);

        $child2_last = $dom->createElement('last', $this->get_last());
        $child1_name->appendChild($child2_last);

        $root_student->appendChild($child1_name);

        // identifier
        $child1_identifier = $dom->createElement('identifier');

        $child2_personal = $dom->createElement('personal', $this->get_personal_id());
        $child1_identifier->appendChild($child2_personal);

        $root_student->appendChild($child1_identifier);

        // gender
        $child1_gender = $dom->createElement('gender');

        $child2_gender = $dom->createElement($this->get_gender());
        $child1_gender->appendChild($child2_gender);

        $root_student->appendChild($child1_gender);

        // email
        $child1_email = $dom->createElement('email',$this->get_email());

        $root_student->appendChild($child1_email);

        // start_year
        $child1_start_year = $dom->createElement('start_year',$this->get_start_year());

        $root_student->appendChild($child1_start_year);

        //branch
        echo var_dump($this->get_branch());
        if($this->get_branch() != ""){ // if branch is not empty than add attributes
            $child1_branch = $dom->createElement('branch',$this->get_branch());
            $attr_faculty = new DOMAttr('faculty', $this->get_faculty());
            $attr_institute = new DOMAttr('institute', $this->get_institute());
            $child1_branch->setAttributeNode($attr_faculty);
            $child1_branch->setAttributeNode($attr_institute);

            $root_student->appendChild($child1_branch);
        }

        // as last needs to append whole finished student to main file
        $dom->appendChild($root_student);

        // save file, file name can be with path
        $dom->save($xml_file_name);

    }
}

// if either of button is pressed
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    switch($_POST["submit"]){ 
        case 'Submit': // if Submit button
            if($is_all){ // if everything required is filled out 
                $arr = array($file_name);  // create array with value file_name

                $student = new Student($file_name, $first, $last, $email, $gender, $degree, $personal, $start_year, $branch, $faculty, $institute);

                // SESSION
                // if session is set, than goes through it and add values to our array
                if (isset($_SESSION["file_name"])) {
                    foreach($_SESSION["file_name"] as $key=>$file) {
                        array_push($arr, $file);
                    }
                }
                // assign our array to session, overwrites existing value/array
                $_SESSION["file_name"] = $arr;

                $student->create_XML();                
            }            
            break;
        case 'Delete history': // if Delete history button
            session_unset(); // delete values in session
            break;
    }
}
?>