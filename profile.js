document.addEventListener('DOMContentLoaded', function() {
    fetchUserProfile();
});

function fetchUserProfile() {
    fetch('getUserProfile.php')
    .then(response => response.json())
    .then(data => {
        if(data.success) {
            document.getElementById('userName').textContent = data.name;
            document.getElementById('userEmail').textContent = data.email;
        } else {
            console.error('Failed to fetch user data');
        }
    })
    .catch(error => console.error('Error:', error));
}
