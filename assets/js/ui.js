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
/*
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
        // Append the default choice inputs to the poll choices container
        const pollChoicesContainer = document.querySelector(".poll-choices");
        pollChoicesContainer.appendChild(defaultChoiceInput1);
        pollChoicesContainer.appendChild(defaultChoiceInput2);
    }

    // Function to create a choice input
    function createChoiceInput(index) {
        const choiceInput = document.createElement("input");
        choiceInput.type = "text";
        choiceInput.classList.add("poll-choice");
        choiceInput.placeholder = `Choice ${index}`;
        return choiceInput;
    }

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
            // Show the remove Poll button
            removePollButton.style.display = "block";
            // Create the addChoice button (if not already present)
            if (!document.querySelector(".add-choice-button")) {
                const addChoiceButton = document.createElement("button");
                addChoiceButton.classList.add("add-choice-button");
                addChoiceButton.textContent = "Add Choice";
                addChoiceButton.addEventListener("click", function() {
                    // Create a new input element for the poll choice
                    const newChoiceInput = createChoiceInput(document.querySelectorAll(".poll-choice").length + 1);
                    // Append the new input element to the poll choices container
                    const pollChoicesContainer = document.querySelector(".poll-choices");
                    pollChoicesContainer.appendChild(newChoiceInput);
                });
                pollContainer.appendChild(addChoiceButton);
            }
        }
    });

    // Add click event listener to removePollButton
    removePollButton.addEventListener("click", function() {
        // Reset the poll container
        resetPollContainer();
    }); 

    // debug
    pollButton.click(); 

});

*/ 



// posting functionality 
//---------------------------------------------------------------------
// Wait for the DOM content to be fully loaded
/*
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
        // Append the default choice inputs to the poll choices container
        const pollChoicesContainer = document.querySelector(".poll-choices");
        pollChoicesContainer.appendChild(defaultChoiceInput1);
        pollChoicesContainer.appendChild(defaultChoiceInput2);
    }

    // Function to create a choice input
    function createChoiceInput(index) {
        const choiceInput = document.createElement("input");
        choiceInput.type = "text";
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
            // Show the remove Poll button
            removePollButton.style.display = "block";
            // Create the addChoice button (if not already present)
            if (!document.querySelector(".add-choice-button")) {
                const addChoiceButton = document.createElement("button");
                addChoiceButton.classList.add("add-choice-button");
                addChoiceButton.textContent = "Add Choice";
                addChoiceButton.addEventListener("click", function() {
                    // Create a new input element for the poll choice
                    const newChoiceInput = createChoiceInput(document.querySelectorAll(".poll-choice").length + 1);
                    // Append the new input element to the poll choices container
                    const pollChoicesContainer = document.querySelector(".poll-choices");
                    pollChoicesContainer.appendChild(newChoiceInput);
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

    // Function to handle posting data to the server
    function handlePostButtonClick() {
        // Collect poll data
        const pollData = collectPollData(); 
        console.log(pollData); 
        // Post data to the server
        // postDataToServer(pollData);
    }

        
    // Function to post data to the server
    function postDataToServer(pollData) {
        // Retrieve the session user ID
        const userId = getSessionUserId();

        // Use AJAX to send poll data to the server
        $.ajax({
            url: "/home/functionalities/post.php",
            method: "POST",
            data: { 
                post_title: pollData.pollTitle, 
                user_id: userId,
                post_type: "post",
                poll_id: pollData.pollId // Include poll ID if available
            },
            success: function(response) {
                // Handle successful response from server
                const postId = response.postId; // Assuming the server returns the post ID
                // After successfully adding the post, proceed to add poll choices
                addPollChoicesToServer(postId, pollData.choices);
            },
            error: function(xhr, status, error) {
                // Handle error
                console.error("Error posting data to server:", error);
            }
        });
    }

    // Function to add poll choices to the server
    function addPollChoicesToServer(postId, choices) {
        // Use AJAX to send poll choices to the server
        $.ajax({
            url: "/home/functionalities/poll_choices.php",
            method: "POST",
            data: {
                post_id: postId,
                choices: JSON.stringify(choices)
            },
            success: function(response) {
                // Handle successful response from server
                console.log("Poll choices added successfully:", response);
                // After successfully adding poll choices, proceed to post stats
                addPostStatsToServer(postId);
            },
            error: function(xhr, status, error) {
                // Handle error
                console.error("Error adding poll choices to server:", error);
            }
        });
    }

    // Function to add post stats to the server
    function addPostStatsToServer(postId) {
        // Use AJAX to send post stats to the server
        $.ajax({
            url: "/home/functionalities/post_stats.php",
            method: "POST",
            data: {
                post_id: postId
            },
            success: function(response) {
                // Handle successful response from server
                console.log("Post stats added successfully:", response);
                // You can perform additional actions here if needed
            },
            error: function(xhr, status, error) {
                // Handle error
                console.error("Error adding post stats to server:", error);
            }
        });
    }

    // Function to collect poll data
    function collectPollData() {
        const pollTitle = document.getElementById("pollTitle").value;
        const choices = [];
        const choiceInputs = document.querySelectorAll(".poll-choice");
        choiceInputs.forEach(input => {
            if (input.value.trim() !== '') {
                choices.push(input.value.trim());
            }
        });
        const expiryDate = document.getElementById("expiryDate").value;
        const pollId = document.getElementById("pollId").value; // Assuming poll ID is retrieved from the UI
        return { pollTitle, pollId, choices, expiryDate };
    }

    // Function to get session user ID
    function getSessionUserId() {
        // Fetch the session user ID from the server-side
        // This could be done using AJAX or by embedding it directly into the HTML page
        // Here's a simple example of embedding it directly into a hidden input field
        return document.getElementById("sessionUserId").value;
    }

    // --------------------------------------------------------------------

    // Add click event listener to postButton
    const postButton = document.getElementById("postButton");
    postButton.addEventListener("click", handlePostButtonClick);


    // --------------------------------------------------------------------

    // Function to handle clicking on the post title field
    function handlePostTitleClick() {
        // Change the color of the post button
        postButton.style.backgroundColor = "#1a8cd8"; // Change to desired color
        console.log('input clikced')
    }

    // Event listener for clicking on the post title field
    const postTitleField = document.getElementById("pollTitle");
    postTitleField.addEventListener("click", handlePostTitleClick);


});
*/ 

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
        // Append the default choice inputs to the poll choices container
        const pollChoicesContainer = document.querySelector(".poll-choices");
        pollChoicesContainer.appendChild(defaultChoiceInput1);
        pollChoicesContainer.appendChild(defaultChoiceInput2);
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
            // Show the remove Poll button
            removePollButton.style.display = "block";
            // Create the addChoice button (if not already present)
            if (!document.querySelector(".add-choice-button")) {
                const addChoiceButton = document.createElement("button");
                addChoiceButton.classList.add("add-choice-button");
                addChoiceButton.textContent = "Add Choice";
                addChoiceButton.addEventListener("click", function() {
                    // Create a new input element for the poll choice
                    const newChoiceInput = createChoiceInput(document.querySelectorAll(".poll-choice").length + 1);
                    // Append the new input element to the poll choices container
                    const pollChoicesContainer = document.querySelector(".poll-choices");
                    pollChoicesContainer.appendChild(newChoiceInput);
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

    // Add click event listener to postButton
    const postButton = document.getElementById("postButton");
    postButton.addEventListener("click", handlePostButtonClick);


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
