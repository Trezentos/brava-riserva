jQuery(document).ready(function($) {

    const allElements = document.querySelectorAll('[class*="_windows"]');

    // Filtra apenas aqueles que terminam com '-windows'
    const windowsElements = Array.from(allElements).filter(element => {
        return [...element.classList].some(cls => cls.endsWith('_windows'));
    });

    windowsElements.forEach(element => {
        setStyleWindowsPlatform(element);

    });

})

function setStyleWindowsPlatform(element) {

    if (/Mac|iPad|iPhone|iPod/.test(navigator.platform) ||
        (navigator.userAgent.includes("Macintosh") && 'ontouchend' in document)) {
        return;
    }

    element.classList.forEach(className => {

        if (className.includes('_windows') &&
            className.includes('_mobile') && Number(IS_MOBILE)) {

            const newsStyle = className.replace('_windows_mobile', '');

            console.log(newsStyle);

            const [property, value] = newsStyle.split(':');

            element.style[property] = value;
        }

        else if (className.includes('_windows')) {

            const newsStyle = className.replace('_windows', '');

            const [property, value] = newsStyle.split(':');

            element.style[property] = value;

        }

    })
}