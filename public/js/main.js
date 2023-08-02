const body = document.querySelector("body"),
        sidebar = body.querySelector(".sidebar"),
        toggle = body.querySelector(".sidebar__toggle");
toggle.addEventListener("click", () =>{
    sidebar.classList.toggle("close");
});

//logout
document.getElementById('logout').addEventListener('click', function(event) {
    event.preventDefault();

    // Send a GET request to the logout route
    fetch('/logout', {
        method: 'GET',
        headers: {
            'X-CSRF-TOKEN': csrfToken // Use the CSRF token variable here
        }
    })
        .then(response => {
            // Redirect to the login page after successful logout
            if (response.ok) {
                window.location.href = '/login'; // Change '/login' to your desired login page URL
            }
        })
        .catch(error => {
            console.error('Logout failed:', error);
            // Handle logout error if needed
        });
});
