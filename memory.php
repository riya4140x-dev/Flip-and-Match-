<?php $title='Flip & Match'; include 'includes/header.php'; ?>
<h1>Flip &amp; Match</h1>
<div class="bar">
  <select id="diff"><option value="4x3">Easy (4×3)</option><option value="4x4" selected>Medium (4×4)</option><option value="6x4">Hard (6×4)</option></select>
  <select id="theme"><option value="animals">Animals</option><option value="fruits">Fruits</option><option value="space">Space</option></select>
  <button id="new">New Game</button>
  <span class="stat">Moves: <b id="moves">0</b></span>
  <span class="stat">Time: <b id="time">0</b>s</span>
  <span class="stat">Best: <b id="best">-</b></span>
</div>
<div id="msg"></div>
<div id="board"></div>
<?php include 'includes/footer.php'; ?>
<script src="js/memory.js"></script>
