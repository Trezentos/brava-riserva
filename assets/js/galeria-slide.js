jQuery(document).ready(function($) {

    $("[data-fancybox]").fancybox({
        backFocus: false
    });

    let margin = 16;

    if( IS_MOBILE ) margin = 10;

    const swiper = new Swiper(".swiper-imoveis", {
        slidesPerView: 1,
        spaceBetween: margin,
        speed: 1000,
        observer: true,
        observeParents: true,

        scrollbar: {
            el: ".swiper-scrollbar",
            draggable: true,
        },
        navigation: {
            nextEl: ".slide-imoveis .outer-next",
            prevEl: ".slide-imoveis .outer-prev",
        },
    });

    // Custom scrollbar para .plantas-nav (mobile)
    if (window.innerWidth <= 1023) {
        const $plantasNav = $('.plantas-nav');

        if ($plantasNav.length) {
            // Cria os elementos da scrollbar
            const $scrollbarContainer = $('<div class="plantas-nav-scrollbar"><div class="scrollbar-thumb"></div></div>');
            $plantasNav.after($scrollbarContainer);

            const $thumb = $scrollbarContainer.find('.scrollbar-thumb');
            const nav = $plantasNav[0];

            function updateScrollbar() {
                const scrollWidth = nav.scrollWidth;
                const clientWidth = nav.clientWidth;
                const scrollLeft = nav.scrollLeft;

                // Calcula a largura proporcional do thumb
                const thumbWidth = (clientWidth / scrollWidth) * 100;

                // Calcula a posição do thumb
                const maxScroll = scrollWidth - clientWidth;
                const scrollPercent = scrollLeft / maxScroll;
                const maxThumbPosition = 100 - thumbWidth;
                const thumbPosition = scrollPercent * maxThumbPosition;

                $thumb.css({
                    width: thumbWidth + '%',
                    left: thumbPosition + '%'
                });
            }

            // Atualiza ao rolar
            $plantasNav.on('scroll', updateScrollbar);

            // Atualiza inicialmente
            setTimeout(updateScrollbar, 100);

            // Atualiza ao redimensionar
            $(window).on('resize', updateScrollbar);
        }
    }

});