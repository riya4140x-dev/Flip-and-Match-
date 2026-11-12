<?php
$title='Leaderboard';
$game=($_GET['game']??'memory')==='sequence'?'sequence':'memory';
$all=[];$f=__DIR__.'/data/scores.json';
if(is_file($f))$all=json_decode(file_get_contents($f),true)?:[];
$rows=array_filter($all,fn($s)=>$s['game']===$game);
usort($rows,fn($a,$b)=>$b['score']<=>$a['score']);
$rows=array_slice($rows,0,10);
include 'includes/header.php';
?>
<h1>🏆 Leaderboard</h1>
<div class="bar">
  <a class="btn <?= $game=='memory'?'':'alt' ?>" href="?game=memory">Flip &amp; Match</a>
  <a class="btn <?= $game=='sequence'?'':'alt' ?>" href="?game=sequence">Sequence</a>
</div>
<div class="box"><table>
<tr><th>#</th><th>Player</th><th>Score</th><th>Details</th><th>Date</th></tr>
<?php if(!$rows): ?><tr><td colspan="5">No scores yet. Be the first to play!</td></tr><?php endif; ?>
<?php foreach($rows as $i=>$r): ?>
<tr><td><?= $i+1 ?></td><td><?= htmlspecialchars($r['name']) ?></td><td><?= (int)$r['score'] ?></td>
<td><?= htmlspecialchars($r['detail']) ?></td><td><?= htmlspecialchars($r['date']) ?></td></tr>
<?php endforeach; ?>
</table></div>
<?php include 'includes/footer.php'; ?>
