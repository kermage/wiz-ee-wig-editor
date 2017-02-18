/*!
 *  Wiz-Ee-Wig Editor 0.1.0
 *  Copyright (C) 2016 Gene Alyson Fortunado Torcende
 *  Licensed under GNU General Public License v2 or later.
 */

(function($) {
	'use strict';

    var content, contentID, widgetID, editorType;
    
    $( document ).on( 'click', 'a[id^="widget-wewe-"][id $="-fullscreen"]', function( e ) {
        e.preventDefault();

        if ( $( '#wp-wewe-editor-wrap' ).hasClass( 'tmce-active' ) ) {
            editorType = 'wewe-editor-tmce';
        } else {
            editorType = 'wewe-editor-html';
        }
        $( '#wewe-editor-html' ).trigger( 'click' );

        contentID = e.target.id.replace( 'fullscreen', 'content' );
        content = $( '#' + contentID ).val();

        $( '#wewe-id' ).val( contentID );
        $( '#wewe-editor' ).val( content );
        $( 'body' ).addClass( 'wewe-active' );

        $( '#' + editorType ).trigger( 'click' );
    });
    
    $( document ).on( 'click', 'button.wp-switch-editor', function() {
        $( '#wewe-type' ).val( this.id );
    });
    
    $( document ).on( 'click', 'a[id="wewe-close"]', function( e ) {
        e.preventDefault();

        editorType = $( '#wewe-type' ).val();
        $( '#wewe-editor-html' ).trigger( 'click' );

        content = $( '#wewe-editor' ).val();
        widgetID = $( '#wewe-id' ).val();

        $( '#' + widgetID ).val( content );
        $( 'body' ).removeClass( 'wewe-active' );

        $( '#' + editorType ).trigger( 'click' );
    });

}(jQuery));
