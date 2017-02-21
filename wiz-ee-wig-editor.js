/*!
 *  Wiz-Ee-Wig Editor 1.0.0
 *  Copyright (C) 2016 Gene Alyson Fortunado Torcende
 *  Licensed under GNU General Public License v2 or later.
 */

(function($) {
	'use strict';

    var content, contentID, widgetID, typeID, editorType;
    
    $( document ).on( 'click', 'a[id^="widget-wewe-"][id $="-edit"]', function( e ) {
        e.preventDefault();

        $( '#wewe-editor-html' ).trigger( 'click' );

        typeID = e.target.id.replace( 'edit', 'type' );
        contentID = e.target.id.replace( 'edit', 'content' );
        content = $( '#' + contentID ).val();

        $( '#wewe-id' ).val( contentID );
        $( '#wewe-editor' ).val( content );
        $( 'body' ).addClass( 'wewe-active' );

        editorType = $( '#' + typeID ).val();
        $( '#' + editorType ).trigger( 'click' );
    });
    
    $( document ).on( 'click', 'button.wp-switch-editor', function() {
        $( '#wewe-type' ).val( this.id );
    });
    
    $( document ).on( 'click', 'a[id="wewe-close"]', function( e ) {
        e.preventDefault();

        editorType = $( '#wewe-type' ).val();
        $( '#wewe-editor-html' ).trigger( 'click' );

        typeID = $( '#wewe-id' ).val().replace( 'content', 'type' );
        content = $( '#wewe-editor' ).val();
        widgetID = $( '#wewe-id' ).val();

        $( '#' + widgetID ).val( content );
        $( '#' + typeID ).val( editorType );
        $( 'body' ).removeClass( 'wewe-active' );
    });
    
    $( document ).on( 'click', 'a[id="wewe-save"]', function( e ) {
        e.preventDefault();

        editorType = $( '#wewe-type' ).val();
        $( '#wewe-editor-html' ).trigger( 'click' );

        typeID = $( '#wewe-id' ).val().replace( 'content', 'type' );
        content = $( '#wewe-editor' ).val();
        widgetID = $( '#wewe-id' ).val();

        $( '#' + widgetID ).val( content );
        $( '#' + typeID ).val( editorType );
        
        if ( $( 'body' ).hasClass( 'wp-customizer' ) ) {
            // customize.php
            var thisWidget = wp.customize.Widgets.getWidgetFormControlForWidget( widgetID.replace( 'widget-', '' ).replace( '-content', '' ) )
            thisWidget.updateWidget();
        } else {
            // widgets.php
            wpWidgets.save( $( '#' + widgetID ).closest( 'div.widget' ), 0, 1, 0 );
        }

        $( '#' + editorType ).trigger( 'click' );
    });

}(jQuery));
