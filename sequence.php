<?php $title='Sequence Memory'; include 'includes/header.php'; ?>
<h1>Sequence Memory</h1>
<p>Watch the pads light up, then repeat the pattern in the same order.</p>
<div class="bar"><button id="go">Start Game</button><span class="stat">Level: <b id="lvl">0</b></span></div>
<div id="msg">Press Start</div>
<div class="pads">
  <button class="pad" style="background:#ef4444;color:#ef4444"></button>
  <button class="pad" style="background:#22c55e;color:#22c55e"></button>
  <button class="pad" style="background:#3b82f6;color:#3b82f6"></button>
  <button class="pad" style="background:#eab308;color:#eab308"></button>
</div>
<?php include 'includes/footer.php'; ?>
<script src="js/sequence.js"></script>
