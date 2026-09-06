const m=document.querySelector('.menu-toggle'),n=document.querySelector('#main-nav');
if(m&&n){
  m.addEventListener('click',()=>{
    const o=n.classList.toggle('open');
    m.setAttribute('aria-expanded',String(o));
    m.setAttribute('aria-label',o?'Close navigation':'Open navigation');
  });
  n.querySelectorAll('a').forEach(a=>a.addEventListener('click',()=>{
    n.classList.remove('open');
    m.setAttribute('aria-expanded','false');
    m.setAttribute('aria-label','Open navigation');
  }));
  window.addEventListener('resize',()=>{
    if(window.innerWidth>1050){
      n.classList.remove('open');
      m.setAttribute('aria-expanded','false');
      m.setAttribute('aria-label','Open navigation');
    }
  });
}
const year=document.getElementById('year');
if(year) year.textContent=new Date().getFullYear();
