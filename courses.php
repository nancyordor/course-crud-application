<?php

require 'database.php';

class Course {
    public $Course;
    public $Course_Desc;
    private $db;
    public function __construct() {
    }

    public function addCourse($Course, $Course_Desc) {
        $Course = filter_var($Course, FILTER_SANITIZE_STRING);
        $Course_Desc = filter_var($Course_Desc, FILTER_SANITIZE_STRING);

        $db = new DatabaseTranscations();
        $inserted = $db->insert($Course, $Course_Desc);
        if ($inserted) {
            return "Successfully inserted";
        } else {
            return "Something went wrong insertion didnot happen";
        }
    }

    public function viewcourses() {
        $db = new DatabaseTranscations();
        $result = $db->select();
        if ($result) {
            return $result;
        } else {
            return "No results returned";
        }
    }

    public function viewCourse($id) {
        $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);

        $db = new DatabaseTranscations();
        $result = $db->select($id);
        if ($result) {
            return $result;
        } else {
            return "No results returned";
        }
    }

    public function editCourse($id, $Course, $Course_Desc) {
        $Course = filter_var($Course, FILTER_SANITIZE_STRING);
        $Course_Desc = filter_var($Course_Desc, FILTER_SANITIZE_STRING);
        $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);

        $db = new DatabaseTranscations();
        $result = $db->update($Course, $Course_Desc, $id);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteCourse($id) {
        $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
        $db = new DatabaseTranscations();
        $result = $db->delete($id);
        if ($result) {
            return "deleted";
        } else {
            return "Something happened course not deleted";
        }
    }
}
?>