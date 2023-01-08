<?php
abstract class human {
    protected $first_name;
    protected $last_name;
    protected $gender;

    public function __construct($first_name, $last_name, $gender)
    {
        $this->first_name = $jmfirst_nameeno;
        $this->last_name = $last_name;
        $this->gender = $gender;
    }

    abstract public function get_information();
  }
?>