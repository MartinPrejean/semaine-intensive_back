const discoverEnter = () => {
    const discover = document.querySelector('.button_discover');
    const container_intro = document.querySelector('.container_description');
    const container_info = document.querySelector('.container_info');
    const recipe_container = document.querySelector('.recipe_container');
    const copyright = document.querySelector('.copyright');
    
    discover.addEventListener('click', () => {
        console.log('ok')
        container_intro.classList.add('hide')
        container_info.classList.remove('hide')
        recipe_container.classList.remove('hide')
        copyright.classList.remove('hide')
    });
}

discoverEnter();