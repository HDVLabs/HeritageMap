<?php
session_start();
require '_conn.inc';
$q = $_SESSION["sql"];
$db = $conn->query($q);
$r = $db->fetchAll(PDO::FETCH_ASSOC);
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename='.implode('_', $_SESSION['filtered']).'.csv');
$f = fopen('php://output', 'w');
try {
  $first = true;
  foreach ($r as $row) {
    if ($first) {
        fputcsv($f, array_keys($row));
        $first = false;
    }
    fputcsv($f, $row);
  }
  fclose($f);
  $conn = null;
}
catch(PDOException $err) {
echo "ERROR: Unable to connect: " . $err->getMessage();
}
session_destroy();
?>