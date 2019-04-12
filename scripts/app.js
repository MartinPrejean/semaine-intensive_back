const discoverEnter = () => {
    const discover = document.querySelector('.button_discover');
    const container_intro = document.querySelector('.container_description');
    const container_info = document.querySelector('.container_info');
    const recipe_container = document.querySelector('.recipe_container');
    
    discover.addEventListener('click', () => {
        container_intro.classList.add('hide')
        container_info.classList.remove('hide')
        recipe_container.classList.remove('hide')
        
    });
}

discoverEnter();