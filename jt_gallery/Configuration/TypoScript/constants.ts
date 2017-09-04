
plugin.tx_jtgallery_pi1 {
    view {
        # cat=plugin.tx_jtgallery_pi1/file; type=string; label=Path to template root (FE)
        templateRootPath = EXT:jt_gallery/Resources/Private/Templates/
        # cat=plugin.tx_jtgallery_pi1/file; type=string; label=Path to template partials (FE)
        partialRootPath = EXT:jt_gallery/Resources/Private/Partials/
        # cat=plugin.tx_jtgallery_pi1/file; type=string; label=Path to template layouts (FE)
        layoutRootPath = EXT:jt_gallery/Resources/Private/Layouts/
    }
    persistence {
        # cat=plugin.tx_jtgallery_pi1//a; type=string; label=Default storage PID
        storagePid =
    }
}

plugin.tx_jtgallery {
	settings {
        js {
            # cat=plugin.tx_jtgallery/javascript; type=file; label=Include jquery.js file: Must be disabled if jQuery is already included in your website (The minimum required version of jQuery is 1.6)
            jQuery = EXT:jt_gallery/Resources/Public/Html5gallery/jquery.js

            # cat=plugin.tx_jtgallery/javascript; type=file; label=Include html5gallery.js file
            html5Gallery = EXT:jt_gallery/Resources/Public/Html5gallery/html5gallery.js
        }
    }
}
