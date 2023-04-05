//lấy element ra
const tabBtnsintro = document.querySelectorAll('.tabs_intro li');
const tabContentintro = document.querySelectorAll('.tabcontent_intro');
const handleTabBtnClickIntro = (tabs) =>{
    tabContentintro.forEach((p) => {
        p.classList.remove('active_intro');
    })
    tabBtnsintro.forEach((li) => {
        li.classList.remove('active_intro'); /* xóa các class  có active */ 
    });

    tabs.classList.add('active_intro');
    
    const target = tabs.getAttribute('data-target');

    const activeIntro = document.querySelector(target);
    activeIntro.classList.add('active_intro');
}
tabBtnsintro.forEach((btns)=>{
    btns.addEventListener('click', () => {
        handleTabBtnClickIntro(btns);
    })
})