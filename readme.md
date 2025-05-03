Show a facade/thumbnail for a YouTube Video and load YouTube video only on click.

## Description

This plugin adds a block that allows defining a facade/thumbnail for a YouTube Embed

It aims to solve the [Lazy load third-party resources with facades](https://developer.chrome.com/docs/lighthouse/performance/third-party-facades) flag on Lighthouse by preventing YouTube assets from being loaded until the user clicks the play button.

## How the block works
The shortcode accepts three parameters:
1. `Video URl` - YouTube Video ID
2. `Thumbnail` - URL of the image used for the thumbnail

### To use the plugin
1. Download and install the latest version from the Releases - https://github.com/Rick-Labs/video-facade-for-youtube-shortcode/releases
2. Activate the plugin
3. Add the block to page by looking for the Video Facade for YouTube block
4. Put in the YouTube URL
5. Select the thumbnail image

That's it! You won't get the `Lazy load third-party resources with facades` warning anymore!