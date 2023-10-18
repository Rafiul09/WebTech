<?php
require_once '../model/DoctorModel.php';

function index()
{
    include '../Home.php';
}

function getDoctorNames()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['term'])) {
        $term = $_POST['term']; // Get the search term from the frontend

        $doctorNames = getDoctorNames($term);

        echo json_encode($doctorNames);
    } else {
        // Handle invalid or missing data
        echo json_encode([]);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['term'])) {
    getDoctorNames();
} else {
    index();
}
