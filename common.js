function playerName(){
  let n=localStorage.getItem('fm_name');
  if(!n){n=(prompt('Enter your player name:')||'Player').slice(0,20);localStorage.setItem('fm_name',n);}
  return n;
}
function saveScore(game,score,detail){
  return fetch('save_score.php',{method:'POST',headers:{'Content-Type':'application/json'},
    body:JSON.stringify({name:playerName(),game,score,detail})}).then(r=>r.json()).catch(()=>({ok:false}));
}
const who=document.getElementById('who');
if(who){who.textContent='👤 '+playerName();who.style.cursor='pointer';who.title='Click to change name';
  who.onclick=()=>{localStorage.removeItem('fm_name');who.textContent='👤 '+playerName();};}
