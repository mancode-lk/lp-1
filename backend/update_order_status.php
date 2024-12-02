<?php
  include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_FILES['csv_file']) && $_FILES['csv_file']['error'] == 0) {
        $fileTmpPath = $_FILES['csv_file']['tmp_name'];
        $fileName = $_FILES['csv_file']['name'];
        $fileSize = $_FILES['csv_file']['size'];
        $fileType = $_FILES['csv_file']['type'];

        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
        if (strtolower($fileExtension) === 'csv') {
            // Open the file for reading
            if (($handle = fopen($fileTmpPath, 'r')) !== false) {
                // Read each row from the CSV file
                $count = 0; // Initialize count variable before the loop

                while (($data = fgetcsv($handle, 1000, ",")) !== false) {
                    // Skip the header row
                    if ($count == 0) {
                        $count++;
                        continue;
                    }
                    else{
                      $barcode = $conn->real_escape_string(
    preg_replace('/[^\x20-\x7E]/', '', trim($data[0]))
);



                      $status =$_REQUEST['sostats'];
                      $sql = "UPDATE tbl_delivery_orders SET del_status= $status WHERE barcode='$barcode'";
                      $rs = $conn->query($sql);
                    }
                }
                $count++; // Increment the count
                fclose($handle);
            } else {
                echo "Error: Unable to open the file.";
            }
        } else {
            echo "Error: Only CSV files are allowed.";
        }
    } else {
        echo "Error: No file uploaded or there was an error with the upload.";
    }
}
exit();
header('location:../delivery_managment.php');
exit();
 ?>
