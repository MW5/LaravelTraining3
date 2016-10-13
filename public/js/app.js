$(document).ready(function() {

    $('#carousel').carousel({
      pause: false,
      interval: 4000
    })
    
    $('body').scrollspy({
        offset: 250,
        target: '#nav_links' 
    })
    
    //nav click
    $("a").on('click', function(event) {
        if (this.hash !== "") {
            event.preventDefault();
            var hash = this.hash;
            $('html, body').animate({
                scrollTop: $(hash).offset().top - 200
            }, 800, function(){
                window.location.hash = hash;
            });
        }
    });
    
    //no scroll on google map
    $('#map').addClass('scrolloff'); // set the pointer events to none on doc ready
        $('.map_container').on('click', function () {
            $('#map').removeClass('scrolloff'); // set the pointer events true on click
        });
    $("#map").mouseleave(function () {
        $('#map').addClass('scrolloff'); // set the pointer events to none when mouse leaves the map area
    });
     
    //modal stuff
    $('#add_job_modal').on('shown.bs.modal', function () {
        $('#add_job_modal_input').focus()
    })
    
    //rating stars stuff
    //  Check Radio-box
    $(".rating input:radio").attr("checked", false);
    $('.rating input').click(function () {
        $(".rating span").removeClass('checked');
        $(this).parent().addClass('checked');
    });

    $('input:radio').change(
    function(){
        var userRating = this.value;
    }); 
})


