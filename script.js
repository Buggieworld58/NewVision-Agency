particlesJS("particles-js", {
  particles: {
    number: { value: 80 },
    size: { value: 3 },
    move: { speed: 1 },
    line_linked: {
      enable: false
    }
  }
});
const toggle = document.getElementById("menuToggle");
const nav = document.getElementById("navLinks");

toggle.onclick = () => {
    nav.classList.toggle("active");
};
// Sticky navbar background change
window.addEventListener("scroll", () => {
  const nav = document.querySelector(".navbar");
  nav.classList.toggle("scrolled", window.scrollY > 50);
});
// Success Popup Functionality
document.addEventListener('DOMContentLoaded', function() {
    
    // Check if form was just submitted (via PHP session)
    // We'll use a URL parameter approach since PHP session doesn't persist to HTML
    
    const urlParams = new URLSearchParams(window.location.search);
    
    if (urlParams.has('success')) {
        showPopup();
        // Clean URL
        const newUrl = window.location.pathname;
        window.history.replaceState({}, document.title, newUrl);
    }

    function showPopup() {
        const modal = document.getElementById('successModal');
        const message = document.getElementById('successMessage');
        
        if (modal) {
            modal.style.display = 'block';
            document.body.style.overflow = 'hidden'; // Prevent scrolling
        }
    }

    // Close modal function
    function closeModal() {
        const modal = document.getElementById('successModal');
        modal.style.display = 'none';
        document.body.style.overflow = 'auto'; // Enable scrolling
    }

    // Close when clicking X
    document.querySelector('.close-modal')?.addEventListener('click', closeModal);

    // Close when clicking OK button
    document.querySelector('.modal-btn')?.addEventListener('click', closeModal);

    // Close when clicking outside
    window.addEventListener('click', function(event) {
        const modal = document.getElementById('successModal');
        if (event.target === modal) {
            closeModal();
        }
    });

    // Close with Escape key
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            const modal = document.getElementById('successModal');
            if (modal.style.display === 'block') {
                closeModal();
            }
        }
    });
});

// Form validation
function validateForm() {
    const name = document.querySelector('input[name="name"]').value.trim();
    const email = document.querySelector('input[name="email"]').value.trim();
    const message = document.querySelector('textarea[name="message"]').value.trim();
    
    if (name === '' || email === '' || message === '') {
        alert('Please fill in all fields');
        return false;
    }
    
    if (!isValidEmail(email)) {
        alert('Please enter a valid email address');
        return false;
    }
    
    return true;
}

function isValidEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}