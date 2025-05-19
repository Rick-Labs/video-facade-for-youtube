/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
import { __ } from '@wordpress/i18n';

/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import { useBlockProps, MediaUpload, MediaUploadCheck } from '@wordpress/block-editor';

import { TextControl, Button } from '@wordpress/components';

/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
import './editor.scss';

/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @return {Element} Element to render.
 */

export default function Edit({ attributes, setAttributes }) {
    const { videoUrl, thumbnailUrl } = attributes;

    const blockProps = useBlockProps();

    const isValidYouTubeUrl = (url) => {
        const pattern = /^(https?:\/\/)?(www\.)?(youtube\.com|youtu\.be)\/.+$/;
        return pattern.test(url);
    };

    return (
        <div {...blockProps}>
            <TextControl
                label={__('YouTube Video URL', 'video-facade-for-youtube')}
                value={videoUrl}
                onChange={(value) => setAttributes({ videoUrl: value })}
                placeholder="https://www.youtube.com/watch?v=example"
                isValid={isValidYouTubeUrl(videoUrl)}
            />

            <MediaUploadCheck>
                <MediaUpload
                    onSelect={(media) => setAttributes({ thumbnailUrl: media.url })}
                    allowedTypes={['image']}
                    render={({ open }) => (
                        <Button onClick={open} variant="secondary">
                            {thumbnailUrl
                                ? __('Change Thumbnail', 'video-facade-for-youtube')
                                : __('Select Thumbnail', 'video-facade-for-youtube')}
                        </Button>
                    )}
                />
            </MediaUploadCheck>

            {thumbnailUrl && (
                <div className="youtube-thumbnail-preview">
                    <img src={thumbnailUrl} alt={__('YouTube thumbnail', 'video-facade-for-youtube')} />
                    <div className="play-button-overlay">
                        <svg viewBox="0 0 68 48" width="68" height="48" xmlns="http://www.w3.org/2000/svg">
                            <path d="M66.52 7.02a8.27 8.27 0 0 0-5.82-5.84C56.3 0 34 0 34 0S11.7 0 7.3 1.18a8.27 8.27 0 0 0-5.82 5.84A85.13 85.13 0 0 0 0 24a85.13 85.13 0 0 0 1.48 16.98 8.27 8.27 0 0 0 5.82 5.84C11.7 48 34 48 34 48s22.3 0 26.7-1.18a8.27 8.27 0 0 0 5.82-5.84A85.13 85.13 0 0 0 68 24a85.13 85.13 0 0 0-1.48-16.98z" fill="#f00" />
                            <path d="M45 24L27 14v20z" fill="#fff" />
                        </svg>
                    </div>
                </div>
            )}
        </div>
    );
}
