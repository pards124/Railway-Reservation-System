$(document).ready(function (){
    $(".accordion").accordion({
        collapsible: true
    });

    $( ".datepicker, .datepickerSecond" ).datepicker();

                $( ".sliderRange__scale" ).slider({
                    range: true,
                    min: 0,
                    max: 800,
                    values: [ 50, 500 ],
                    slide: function( event, ui ) {
                    $(".sliderRange__amount_first").val( "$" + ui.values[ 0 ]);
                    $(".sliderRange__amount_last").val( "$" + ui.values[ 1 ]);
                    }
                });

                $(".sliderRange__amount_first").val( "$" + $( ".sliderRange__scale" ).slider( "values", 0 ));
                $(".sliderRange__amount_last").val( "$" + $( ".sliderRange__scale" ).slider( "values", 1 ));
});
           