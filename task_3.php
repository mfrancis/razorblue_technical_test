<form action="task_3.php" method="post" enctype="multipart/form-data">
    <label for="uploadCsv">Upload CSV:</label>
    <input type="file" id="uploadCsv" name="csvFile">
    <br />
    <button type="submit" name="submitCsv">Upload</button>
</form>

<form action="task_3.php" method="post">
    <label for="exportCsv">Choose Petrol Type:</label>
    <select name="fuelType" id="exportCsv">
        <option value="">Please Select</option>
        <option value="petrol">Petrol</option>
        <option value="diesel">Diesel</option>
    </select>
    <br />
    <button type="submit" name="exportCsv">Download</button>
</form>

<?php

if (isset($_POST['submitCsv'])) {
    uploadCsv($_POST);
}

if (isset($_POST['exportCsv'])) {
    downloadCsv($_POST['fuelType']);
}

function uploadCsv($post) {
    if(!isset($post)) {
        return false;
    }

    $target_dir = "csv_uploads/";
    $target_file = $target_dir . basename($_FILES["csvFile"]["name"]);
    $tmp_file = $_FILES["csvFile"]["tmp_name"];
    $lines = [];
    $uniqueLines = [];

    if (($handle = fopen($tmp_file, "r")) === false) {
        return "Error: Unable to open file.";
    }

    while (($data = fgetcsv($handle)) !== false) {
        $line = implode(",", $data);

        if (!in_array($line, $uniqueLines)) {
            $uniqueLines[] = $line;
            $lines[] = $data;
        }
    }

    fclose($handle);

    if (($outputHandle = fopen($target_file, "w")) === false) {
        return "Error: Unable to write to file.";
    }

    foreach ($lines as $lineData) {
        fputcsv($outputHandle, $lineData);
    }

    fclose($outputHandle);

    return 'CSV Successfully Uploaded';
}

function downloadCsv($type) {
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="filtered_vehicles.csv"');

    $csvPath = 'csv_uploads/*.csv';
    $csvFile = glob($csvPath);
    $file = $csvFile[0];
    $file = fopen($file, "w");

    fputcsv($file, $type);
}