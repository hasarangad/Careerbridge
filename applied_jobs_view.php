<?php

$jobListings = document.getElementById("jobListings");
$confirmationModal = document.getElementById("confirmationModal");
$confirmButton = document.getElementById("confirmButton");
$cancelButton = document.getElementById("cancelButton");
$currentIndex; // To store the current job index
$jobData = [
    [
        "title" => "Job Title 1",
        "company" => "Company A",
        "location" => "City, State",
        "description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
    ],
    [
        "title" => "Job Title 2",
        "company" => "Company B",
        "location" => "City, State",
        "description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
    ],
    // Add more job listings as needed
];
foreach ($jobData as $index => $job) {
    $jobElement = document.createElement("div");
    $jobElement.classList.add("job");
    $jobElement.innerHTML = '
        <h2>' . $job["title"] . '</h2>
        <p>Company: ' . $job["company"] . '</p>
        <p>Location: ' . $job["location"] . '</p>
        <p>Description: ' . $job["description"] . '</p>
        <div class="button-row">
            <button class="button button-read">Read Form</button>
            <button class="button button-update">Update CV</button>
            <button class="button button-delete">Delete CV</button>
        </div>
    ';
    $jobElement.querySelector(".button-read")->addEventListener("click", function () {
        alert("Reading form for job " . $index);
    });
    $jobElement.querySelector(".button-update")->addEventListener("click", function () {
        showConfirmation($index, "update");
    });
    $jobElement.querySelector(".button-delete")->addEventListener("click", function () {
        showConfirmation($index, "delete");
    });
    $jobListings->appendChild($jobElement);
}

function showConfirmation($index, $action) {
    $currentIndex = $index;
    $confirmationModal->style->display = "block";
    $confirmButton->onclick = function () {
        if ($action === "update") {
            alert("Updating CV for job " . ($currentIndex + 1));
        } else if ($action === "delete") {
            alert("Deleting CV for job " . ($currentIndex + 1));
        }
        closeConfirmation();
    };
    $cancelButton->onclick = function () {
        closeConfirmation();
    };
}

function closeConfirmation() {
    $confirmationModal->style->display = "none";
    $currentIndex = null;
}


