const pads=[...document.querySelectorAll('.pad')],msg=document.getElementById('msg');
let seq=[],pos=0,accept=false;
const wait=ms=>new Promise(r=>setTimeout(r,ms));
async function light(i){pads[i].classList.add('on');await wait(450);pads[i].classList.remove('on');await wait(200);}
async function round(){
  accept=false;seq.push(Math.floor(Math.random()*4));pos=0;
  document.getElementById('lvl').textContent=seq.length;msg.textContent='Watch...';
  await wait(600);for(const i of seq)await light(i);
  accept=true;msg.textContent='Your turn!';
}
pads.forEach((p,i)=>p.onclick=()=>{
  if(!accept)return;light(i);
  if(seq[pos]!==i){
    accept=false;const lvl=seq.length-1,score=lvl*10;
    msg.textContent='❌ Game over! You reached level '+lvl+' (score '+score+')';
    if(score>0)saveScore('sequence',score,'Level '+lvl);return;}
  if(++pos===seq.length){accept=false;msg.textContent='✅ Correct!';setTimeout(round,800);}
});
document.getElementById('go').onclick=()=>{seq=[];round();};
