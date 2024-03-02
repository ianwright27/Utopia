$(document).ready(function() {
    var contentCol = $('.content-col');
    var contentHeading = $('.content-heading');
    var contentHeadingOffset = contentHeading.offset().top;

    contentCol.on("scroll", function() {
        // Get the scroll position relative to the top of the content column
        var scrollPosition = $(this).scrollTop() - contentHeadingOffset;

        // If the scroll position is greater than or equal to zero,
        // add the sticky class to make the row sticky; otherwise, remove it
        if (scrollPosition >= 0) {
            contentHeading.addClass('sticky');
        } else {
            contentHeading.removeClass('sticky');
        }
    });
});


// universally scrolling a scrollable element (content-col) 

// Use jQuery document ready function to ensure DOM content is loaded
$(document).ready(function() {
    // Use jQuery selector to find the .content-col element
    var contentCol = $('.content-col');

    // Add wheel event listener to the document body
    $(document.body).on('wheel', function(event) {
        // Prevent default scroll behavior on the document body
        event.preventDefault();

        // Get the deltaY (vertical scroll amount) from the event
        var deltaY = event.originalEvent.deltaY;

        // Scroll the content-col element by deltaY amount
        contentCol.scrollTop(contentCol.scrollTop() + deltaY);
    });
});



// hovering 
