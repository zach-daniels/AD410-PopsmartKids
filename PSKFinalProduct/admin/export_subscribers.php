<?php
include('../includes/common.php');

$query = "SELECT * FROM nlSubscribers";
$subscribers_statement = execute_query($query);

if ($subscribers_statement->rowCount() > 0) {
    $delimiter = ",";
    $filename = "subscribers_" . date('d-m-Y') . ".csv";

    // create file pointer
    $pointer = fopen('php://memory', 'w');

    // set column headers
    $headers = array('Id', 'Active', 'Email', 'Beta');
    fputcsv($pointer, $headers, $delimiter);

    // output each row of the data, format line as csv and write to pointer
    while ($row = $subscribers_statement->fetch(PDO::FETCH_ASSOC)) {
        $lineData = array($row['subscriberID'], $row['subscribed'], $row['subs_email'], $row['beta']);
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