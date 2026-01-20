document.addEventListener("DOMContentLoaded", () => {
    // Aguarda o carregamento da API do YouTube

    if (typeof YT === 'undefined' || typeof YT.Player === 'undefined') {
        let tag = document.createElement('script');

        tag.src = "https://www.youtube.com/iframe_api";
        let firstScript = document.getElementsByTagName('script')[0];
        firstScript.parentNode.insertBefore(tag, firstScript);
    }

    // Armazena os players com base no container
    const players = new Map();

    // Cria todos os players após a API estar pronta
    window.onYouTubeIframeAPIReady = () => {
        const containers = document.querySelectorAll('.video-container[data-video]');

        containers.forEach((container, index) => {
            const videoId = container.getAttribute('data-video');
            const playButton = container.closest('.container-video')?.querySelector('.bt-play');

            const player = new YT.Player(container, {
                width: '100%',
                videoId: videoId,
                origin: location.origin,
                playerVars: {
                    autoplay: 0,
                    controls: 0,
                    mute: 0,
                    loop: 0,
                    playlist: videoId,
                    modestbranding: 1,
                    rel: 0,
                    fs: 0,
                    iv_load_policy: 3,
                    showinfo: 0
                },
                events: {

                }
            });

            // Guarda o player associado ao container
            players.set(container, player);


            // Configura o botão de play
            if (playButton) {
                const coverImg = document.querySelector('.cover-img');

                playButton.addEventListener('click', () => {
                    const currentPlayer = players.get(container);
                    if (currentPlayer) {
                        currentPlayer.playVideo();

                        setTimeout(()=>{
                            coverImg.style.display = 'none';
                            playButton.style.display = 'none';
                        }, 500)
                    }
                });
            }
        });
    };

});


