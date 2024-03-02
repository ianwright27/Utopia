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
