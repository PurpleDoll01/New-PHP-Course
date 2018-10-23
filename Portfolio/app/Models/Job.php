<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model {
    protected $table = 'jobs';

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