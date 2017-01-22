/*!
 *  Wiz-Ee-Wig Editor 0.1.0
 *  Copyright (C) 2016 Gene Alyson Fortunado Torcende
 *  Licensed under GNU General Public License v2 or later.
 */

(function($) {
	'use strict';

    var content, contentID, widgetID;
    
    $( document ).on( 'click', 'a[id^="widget-wewe-"][id $="-fullscreen"]', function( e ) {
        e.preventDefault();
        
        contentID = e.target.id.replace( 'fullscreen', 'content' );
		content = $( '#' + contentID ).val();

        $( '#wewe-id' ).val( contentID );
		$( '#wewe-editor' ).val( content );
        $( '#wewe' ).addClass( 'active' );
    });
    
    $( document ).on( 'click', 'a[id="wewe-close"]', function( e ) {
        e.preventDefault();

        $( '#wewe-editor-html' ).trigger( 'click' );

        content = $( '#wewe-editor' ).val();
        widgetID = $( '#wewe-id' ).val();

        $( '#' + widgetID ).val( content );
        $( '#wewe' ).removeClass( 'active' );
    });

}(jQuery));
