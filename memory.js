const $=s=>document.querySelector(s);
const THEMES={
  animals:'🐶 🐱 🦊 🐼 🐸 🦁 🐵 🐯 🐰 🐨 🐷 🐮',
  fruits:'🍎 🍌 🍇 🍓 🍉 🍍 🥝 🍒 🍑 🍋 🥥 🍐',
  space:'🚀 🌍 🌙 ⭐ 🪐 ☄️ 👽 🛸 🌞 🌠 🔭 🛰️'};
let first=null,lock=false,moves=0,matched=0,total=0,secs=0,timer=null;

function upd(){$('#moves').textContent=moves;$('#time').textContent=secs;
  $('#best').textContent=localStorage.getItem('fm_best_'+$('#diff').value)||'-';}

function start(){
  clearInterval(timer);timer=null;
  const [c,r]=$('#diff').value.split('x').map(Number);total=c*r/2;
  const set=THEMES[$('#theme').value].split(' ').slice(0,total);
  const deck=[...set,...set].sort(()=>Math.random()-.5);
  const b=$('#board');b.style.setProperty('--cols',c);b.innerHTML='';
  deck.forEach(e=>{
    const d=document.createElement('div');d.className='card';d.dataset.v=e;
    d.innerHTML='<div class="face front">?</div><div class="face back">'+e+'</div>';
    d.onclick=()=>flip(d);b.append(d);});
  first=null;lock=false;moves=matched=secs=0;$('#msg').textContent='';upd();
}

function flip(d){
  if(lock||d.classList.contains('flipped'))return;
  if(!timer)timer=setInterval(()=>{secs++;upd();},1000);
  d.classList.add('flipped');
  if(!first){first=d;return;}
  moves++;upd();
  if(first.dataset.v===d.dataset.v){
    first.classList.add('done');d.classList.add('done');first=null;matched++;
    if(matched===total)win();
  }else{
    lock=true;const a=first;first=null;
    setTimeout(()=>{a.classList.remove('flipped');d.classList.remove('flipped');lock=false;},800);
  }
}

function win(){
  clearInterval(timer);
  const score=Math.max(10,total*100-moves*10-secs*2);
  $('#msg').textContent='🎉 You won! Score: '+score+' ('+moves+' moves, '+secs+'s)';
  const k='fm_best_'+$('#diff').value,old=+localStorage.getItem(k)||0;
  if(score>old)localStorage.setItem(k,score);
  upd();saveScore('memory',score,moves+' moves, '+secs+'s, '+$('#diff').value);
}

$('#new').onclick=start;$('#diff').onchange=start;$('#theme').onchange=start;start();
