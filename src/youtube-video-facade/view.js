document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".youtube-thumbnail-preview").forEach(function (container) {
        container.addEventListener("click", function () {
            const videoId = getYouTubeId(container.getAttribute("data-video-url"));
            if (videoId) {
                const iframe = document.createElement("iframe");
                iframe.setAttribute("width", "100%");
                iframe.setAttribute("height", "100%");
                iframe.setAttribute("src", `https://www.youtube.com/embed/${videoId}?autoplay=1`);
                iframe.setAttribute("frameborder", "0");
                iframe.setAttribute("allowfullscreen", "true");
                container.innerHTML = "";
                container.appendChild(iframe);
            }
        });
    });

    function getYouTubeId(url) {
        const regExp = /(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/;
        const match = url.match(regExp);
        return match ? match[1] : null;
    }
});