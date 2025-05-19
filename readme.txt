=== Video Facade for YouTube ===
Contributors: lloydrick
Donate link: https://ricklabs.net/buy-me-a-coffee
Tags: facade, optimization
Requires at least: 4.7
Tested up to: 6.8
Requires PHP: 7.4
Stable tag: 0.2.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Show a facade/thumbnail for a YouTube Video and load YouTube video only on click.

== Description ==
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

== Changelog ==
0.2.0
- Removed shortcode `yvf`
- Added block support

0.1.0
- Add shortcode `yvf`