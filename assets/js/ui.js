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
// ------------------------------------------------------------------------
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



// posting functionality 
//---------------------------------------------------------------------

// Get the base URL
const baseUrl = window.location.origin + "/utopia";  

// Wait for the DOM content to be fully loaded
document.addEventListener("DOMContentLoaded", function() {
    // Get references to UI elements
    const pollButton = document.getElementById("pollButton");
    const pollContainer = document.querySelector(".poll-container");
    const removePollButton = document.querySelector(".remove-poll-button");

    // Function to reset the poll container to its default state
    function resetPollContainer() {
        // Hide the poll container
        pollContainer.style.display = "none";
        // Remove all child nodes from the poll choices container
        const pollChoicesContainer = document.querySelector(".poll-choices");
        pollChoicesContainer.innerHTML = '';
        // Remove the remove Poll button
        removePollButton.style.display = "none";
    }

    // Function to create default choice inputs
    function createDefaultChoiceInputs() {
        // Create two default choice inputs
        const defaultChoiceInput1 = createChoiceInput(1);
        const defaultChoiceInput2 = createChoiceInput(2); 
        
        const lineBreak = document.createElement("br");
        // Append the default choice inputs to the poll choices container
        const pollChoicesContainer = document.querySelector(".poll-choices");
        pollChoicesContainer.appendChild(defaultChoiceInput1);
        pollChoicesContainer.appendChild(lineBreak); 
        pollChoicesContainer.appendChild(defaultChoiceInput2); 
        pollChoicesContainer.appendChild(lineBreak); 
    }

    // Function to create a choice input
    function createChoiceInput(index) {
        const choiceInput = document.createElement("input");
        choiceInput.type = "text";
        choiceInput.name = "choices[]"; // Set the name attribute
        choiceInput.classList.add("poll-choice");
        choiceInput.placeholder = `Choice ${index}`;
        return choiceInput;
    }

    // --------------------------------------------------------------------
  
    // Add click event listener to pollButton
    pollButton.addEventListener("click", function() {
        // If the poll container is already visible, reset it
        if (pollContainer.style.display === "block") {
            resetPollContainer();
        } else {
            // Show the poll container
            pollContainer.style.display = "block";
            // Create default choice inputs
            createDefaultChoiceInputs(); 
            removeAutoCoomplete(); 
            // Show the remove Poll button
            removePollButton.style.display = "block";
            // Create the addChoice button (if not already present)
            if (!document.querySelector(".add-choice-button")) {
                const addChoiceButton = document.createElement("span"); 
                addChoiceButton.classList.add("add-choice-button");
                addChoiceButton.innerHTML = '<i class="fa-solid fa-square-plus"></i> '; 
                addChoiceButton.innerHTML += "Add Choice";
                addChoiceButton.addEventListener("click", function() {
                    // Create a new input element for the poll choice
                    const newChoiceInput = createChoiceInput(document.querySelectorAll(".poll-choice").length + 1); 
                    const lineBreak = document.createElement("br");
                    // Append the new input element to the poll choices container
                    const pollChoicesContainer = document.querySelector(".poll-choices");
                    pollChoicesContainer.appendChild(newChoiceInput); 
                    pollChoicesContainer.appendChild(lineBreak); 
                    removeAutoCoomplete(); 
                });
                pollContainer.appendChild(addChoiceButton);
            }
        }
    }); 
    
    // debug (so that page starts with posting-ui on for css styling) 
    // pollButton.click(); 


    // Add click event listener to removePollButton
    removePollButton.addEventListener("click", function() {
        // Reset the poll container
        resetPollContainer();
    });

    
    // --------------------------------------------------------------------

    // Function to get session user ID
    function getSessionUserId() {
        // Fetch the session user ID from the server-side
        // This could be done using AJAX or by embedding it directly into the HTML page
        // Here's a simple example of embedding it directly into a hidden input field
        return document.getElementById("sessionUserId").value;
    }

    // --------------------------------------------------------------------

    // Function to handle clicking on the post title field
    function handlePostTitleClick() {
        // Change the color of the post button
        postButton.style.backgroundColor = "#1a8cd8"; // Change to desired color
        console.log('input clicked')
    }

    // Event listener for clicking on the post title field
    const postTitleField = document.getElementById("pollTitle");
    postTitleField.addEventListener("click", handlePostTitleClick);

});


// remove post success alert
// ------------------------------------------------------------------- 
// Wait for the DOM content to be fully loaded
document.addEventListener("DOMContentLoaded", function() {
    // Find the alert element
    const alertElement = document.querySelector('#postSuccessAlert');

    // Check if the alert element exists
    if (alertElement) {
        // Set a timeout to remove the alert after 10 seconds
        setTimeout(function() {
            alertElement.style.display = "none";  
            removePostSuccessParam(); 
        }, 5000); // 10000 milliseconds = 10 seconds
    }
});



// remove auto-complete from input fields 
// ------------------------------------------------------------------- 
// Wait for the DOM content to be fully loaded

function removeAutoCoomplete() {
    
    // Get references to input fields
    const inputFields = document.querySelectorAll("input");

    // Loop through each input field
    inputFields.forEach(function(input) {
        // Set the autocomplete attribute to "off"
        input.setAttribute("autocomplete", "off");
    });

}
document.addEventListener("DOMContentLoaded", function() {
    removeAutoCoomplete(); 
});
 

// Remove the post_success GET parameter from the URL without reloading the page 
// -------------------------------------------------------------------
function removePostSuccessParam() {
    // Get the current URL without the query string
    let urlWithoutParams = window.location.href.split('?')[0];
    
    // Replace the current state with a new state without the post_success parameter
    history.replaceState({}, document.title, urlWithoutParams);
}

// Call the function when the DOM is fully loaded
document.addEventListener("DOMContentLoaded", function() {
    // removePostSuccessParam();
}); 


// Function to reload the posts container
function reloadPostsContainer() {
    // Reload the content of the posts container by fetching the latest posts
    $(".posts-container").load(baseUrl + "/home/functionalities/fetch_latest_posts.php");
}


// Call the reloadPostsContainer function periodically to refresh the posts
$(document).ready(function() { 
    // at first 
    reloadPostsContainer();
    // Set the interval to refresh the posts every 5 minutes (300,000 milliseconds)
    setInterval(reloadPostsContainer, 300000);
});
