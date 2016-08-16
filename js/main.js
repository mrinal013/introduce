;jQuery(document).ready(function ($) {

    // init Isotope
    var $grid = $('.grid').isotope({
      itemSelector: '.element-item',
      layoutMode: 'fitRows',
    });



    // bind filter button click
    $('#filters').on( 'click', 'button', function() {
      var filterValue = $( this ).attr('data-filter');
      $grid.isotope({ filter: filterValue });
    });


    // change is-checked class on buttons
    $('.button-group').each( function( i, buttonGroup ) {
      var $buttonGroup = $( buttonGroup );
      $buttonGroup.on( 'click', 'button', function() {
        $buttonGroup.find('.is-checked').removeClass('is-checked');
        $( this ).addClass('is-checked');
      });
    });


    $('a.colorbox').colorbox({ width: 500});

    $("#skil .percent.pull-right").each(function() {
        $( this ).css("margin-right", function() {
            var perc = $( this ).text();
            var iperc = 100-parseInt(perc);
            //console.log(iperc, "Hello world");
            return iperc + "%";
        });
    });

    $(".search").on( "click", function(){
        $(".search-wrapper").slideToggle( "slow" );
        //alert("Hello");
    });

    $('.dropdown-submenu a.test').on("click", function(e){
      $(this).next('ul').toggle();
      e.stopPropagation();
      e.preventDefault();
    });

    $(".hasclear").keyup(function () {
      var t = $(this);
      t.next('span').toggle(Boolean(t.val()));
    });

    $(".clearer").hide($(this).prev('input').val());

    $(".clearer").on( "click", function () {
      $(this).prev('input.form-control').val('').focus();
      $(this).hide();
    });

    $("#searchclear").on( "click", function(){
        $("#searchinput").val('');
    });


});
