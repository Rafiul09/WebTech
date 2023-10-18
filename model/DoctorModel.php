<?php
function getDoctorNames($term)
{
    // Simulated data - Replace this with your database query to fetch doctor names
    $doctorNames = ['Dr. John Doe', 'Dr. Alice Smith', 'Dr. David Johnson', 'Dr. Sarah Brown', 'Dr. Michael Wilson'];

    // Filter doctor names based on the search term
    $matches = [];
    foreach ($doctorNames as $doctor) {
        if (stripos($doctor, $term) !== false) {
            $matches[] = $doctor;
        }
    }

    return $matches;
}
