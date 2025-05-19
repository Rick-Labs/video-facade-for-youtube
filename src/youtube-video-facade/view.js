document.addEventListener('DOMContentLoaded', function() {
    const thumbnails = document.querySelectorAll('.youtube-thumbnail-preview');
    thumbnails.forEach(thumbnail => {
        thumbnail.addEventListener('click', function() {
            const videoUrl = this.getAttribute('data-video-url');
            if (videoUrl) {
                const iframe = document.createElement('iframe');
                iframe.setAttribute('width', '560');
                iframe.setAttribute('height', '315');
                iframe.setAttribute('src', videoUrl);
                iframe.setAttribute('frameborder', '0');
                iframe.setAttribute('allowfullscreen', '');
                this.innerHTML = '';
                this.appendChild(iframe);
            }
        });
    });
});