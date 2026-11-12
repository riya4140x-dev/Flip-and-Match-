<?php
$nav=['index.php'=>'Home','memory.php'=>'Flip & Match','sequence.php'=>'Sequence','leaderboard.php'=>'Leaderboard','howto.php'=>'How to Play','about.php'=>'About'];
$cur=basename($_SERVER['SCRIPT_NAME']);
?><!DOCTYPE html>
<html lang="en"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title><?= htmlspecialchars($title ?? 'Home') ?> | Flip &amp; Match</title>
<link rel="stylesheet" href="css/style.css"></head><body>
<nav><b>🃏 Flip &amp; Match</b>
<?php foreach($nav as $f=>$l): ?><a href="<?= $f ?>" class="<?= $f==$cur?'on':'' ?>"><?= htmlspecialchars($l) ?></a>
<?php endforeach; ?><span class="stat" id="who"></span></nav>
<main>
