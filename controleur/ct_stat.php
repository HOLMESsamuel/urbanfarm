<?php
$req = $bdd->prepare("SELECT COUNT(*) FROM visite GROUP BY SUBSTRING(timestamp, 7, 2)");
$req->execute();
echo ($req->fetch()[0]);

$req2 = $bdd->prepare("SELECT timestamp FROM visite GROUP BY SUBSTRING(timestamp, 7, 2)");
$req2->execute();
echo ($req2->fetch()[0]);