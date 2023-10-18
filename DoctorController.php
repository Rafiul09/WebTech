<?php
require_once 'DoctorModel.php';

class DoctorController
{
    public function index()
    {
        include 'index.php';
    }

    public function getDoctorNames()
    {
        $term = $_POST['term']; // Get the search term from the frontend

        $doctorModel = new DoctorModel();
        $doctorNames = $doctorModel->getDoctorNames($term);

        echo json_encode($doctorNames);
    }
}

$doctorController = new DoctorController();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['term'])) {
    $doctorController->getDoctorNames();
} else {
    $doctorController->index();
}
