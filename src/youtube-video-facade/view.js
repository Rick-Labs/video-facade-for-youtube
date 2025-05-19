/**
 * Use this file for JavaScript code that you want to run in the front-end
 * on posts/pages that contain this block.
 *
 * When this file is defined as the value of the `viewScript` property
 * in `block.json` it will be enqueued on the front end of the site.
 *
 * Example:
 *
 * ```js
 * {
 *   "viewScript": "file:./view.js"
 * }
 * ```
 *
 * If you're not making any changes to this file because your project doesn't need any
 * JavaScript running in the front-end, then you should delete this file and remove
 * the `viewScript` property from `block.json`.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-metadata/#view-script
 */

// Add event listener to play buttons when the page is loaded
document.addEventListener('DOMContentLoaded', function() {
    // Find all thumbnail containers
    const thumbnailContainers = document.querySelectorAll('.youtube-thumbnail-preview');

    // Function to extract YouTube video ID from URL
    function getYouTubeVideoID(url) {
        if (!url) return null;
        const match = url.match(/(?:youtube\.com\/(?:[^/]+\/.*\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/);
        return match ? match[1] : null;
    }

    // Function to create error message
    function createErrorMessage(message) {
        const errorDiv = document.createElement('div');
        errorDiv.className = 'youtube-error-message';
        errorDiv.innerHTML = `
            <div class="error-content">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/>
                </svg>
                <p>${message}</p>
            </div>
        `;
        return errorDiv;
    }

    // Function to handle video loading
    function loadVideo(container) {
        const videoUrl = container.getAttribute('data-video-url');

        // Clear any existing error messages
        const existingError = container.querySelector('.youtube-error-message');
        if (existingError) {
            existingError.remove();
        }

        // Validate URL and get video ID
        const videoId = getYouTubeVideoID(videoUrl);
        if (!videoId) {
            container.innerHTML = '';
            container.appendChild(createErrorMessage('Invalid YouTube URL. Please check the video link.'));
            return;
        }

        // Create the iframe with the YouTube video ID
        const iframe = document.createElement('iframe');
        iframe.setAttribute('width', '100%');
        iframe.setAttribute('height', '100%');
        iframe.setAttribute('src', `https://www.youtube.com/embed/${videoId}?autoplay=1`);
        iframe.setAttribute('frameborder', '0');
        iframe.setAttribute('allowfullscreen', 'true');
        iframe.setAttribute('title', 'YouTube video player');

        // Handle iframe loading errors
        iframe.onerror = function() {
            container.innerHTML = '';
            container.appendChild(createErrorMessage('Failed to load YouTube video. Please try again later.'));
        };

        // Clear the thumbnail and play button, and insert the iframe
        container.innerHTML = '';
        container.appendChild(iframe);
    }

    thumbnailContainers.forEach(function(container) {
        // Add click handler to the container
        container.addEventListener('click', function(e) {
            // Prevent double-triggering if clicking the play button
            if (e.target.closest('.play-button-overlay')) {
                return;
            }
            loadVideo(container);
        });

        // Add click handler to the play button
        const playButton = container.querySelector('.play-button-overlay');
        if (playButton) {
            playButton.addEventListener('click', function() {
                loadVideo(container);
            });
        }
    });
});




