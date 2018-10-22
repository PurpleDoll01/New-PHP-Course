<?php

require_once 'BaseElement.php';
require_once 'Printable.php';

class Job extends BaseElement {
    public function __construct($title, $description){
        $newTitle = 'Job: ' . $title;
        $this->title = $newTitle;
    }

    public function getDurationAsString() {
        $years = floor($this->months / 12);
        $extraMonths = $this->months % 12;
        if($this->months > 12) {
            if (($this->months % 12) > 0) {
                return "Job duration: $years years $extraMonths months";
            }
            else if (($this->months % 12) == 0) {
                return "Job duration: $years years";
            }
        }
        else {
            return "Job duration: $this->months months";
        }
    }

    public function getDescription() {
        return $this->description;
    }
}