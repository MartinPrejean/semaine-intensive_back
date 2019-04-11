// const navSlide = () => {
//     const burger = document.querySelector('.burger');
//     const nav = document.querySelector('.list');
//     const navLinks = document.querySelectorAll('.list li');

//     burger.addEventListener('click', () => {
//         nav.classList.toggle('nav-active');

//         navLinks.forEach((link, index) => {
//             if(link.style.animation){
//                 link.style.animation = '';
//             }
//             else{
//                 link.style.animation = `navLinkFade 0.5s ease forwards ${index / 5 + .5}s`;
//             }
//         })
//     });  
// }

// navSlide();

const discoverEnter = () => {
    const discover = document.querySelector('.button_discover');
    const container_intro = document.querySelector('.container_description');
    const container_info = document.querySelector('.container_info');
    const recipe_container = document.querySelector('.recipe_container');
    
    discover.addEventListener('click', () => {
        console.log('ok')
        container_intro.classList.add('hide')
        container_info.classList.remove('hide')
        recipe_container.classList.remove('hide')
    });
}

discoverEnter();