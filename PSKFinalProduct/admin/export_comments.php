<?php
include('../includes/common.php');

$statement = execute_query("SELECT * FROM comments_simple");

if ($statement->rowCount() > 0) {
    $delimiter = ",";
    $filename = "comments_" . date('d-m-Y') . ".csv";

    // create file pointer
    $pointer = fopen('php://memory', 'w');

    // set column headers
    $headers = array('id','name','commment','Blog_id','status');
    fputcsv($pointer, $headers, $delimiter);

    // output each row of the data, format line as csv and write to pointer
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        $lineData = array($row['id'], $row['name'], $row['comment'], $row['post'], $row['status']);
        fputcsv($pointer, $lineData, $delimiter);
    }

    // move back to beginning of file
    fseek($pointer, 0);

    // set headers to download file instead of display
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');

    // output all remaining data on file pointer
    fpassthru($pointer);
}
exit;
?>

