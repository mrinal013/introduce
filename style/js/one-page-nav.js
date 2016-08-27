;jQuery(document).ready(function( $ ) {

    $('.menu-item-object-section a').each(function(){
        var url = $(this).attr('href').split('/');
        slug = url[url.length - 2];
        slugid = '#' + slug;
        $(this).attr('href', slugid );
    })
});
