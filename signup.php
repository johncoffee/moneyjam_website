<?php

if (!isset($_POST['csrf']) || $_POST['csrf'] != '7163f76f90d3c7553eeab48bf460a034') 
    exit;

$dbh = null;

try {
    $dbh = new PDO('sqlite:moneyjam.db');
}
catch (PDOException $e) {
    die('DB Error');
}

$sql = 'INSERT INTO "main"."signups" ("email", "name", "created") VALUES (?, ?, ?)';

try {
    $sth = $dbh->prepare($sql);
    $sth->execute(array($_POST['email'], $_POST['name'], date('c')));
} 
catch (PDOException $e) {
    die('DB Error');
}

?>

<h1>Got it!</h1>
<p>You're signed up!
    
<p><a href="index.html">Back</a>