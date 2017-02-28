<?php
class Course{
    public $courseCode,$courseName,$sTime,$fTime,$day,$roomId;

    function _construct($courseCode,$courseName,$sTime,$fTime,$day,$roomId){
        $this->courseCode = $courseCode;
        $this->courseName = $courseName;
        $this->sTime = $sTime;
        $this->fTime = $fTime;
        $this->day = $day;
        $this->roomId = $roomId;
    }

    
}
?>