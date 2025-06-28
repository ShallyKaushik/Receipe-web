// Function to get an element by selector
const getElement = (selector) => {
  const element = document.querySelector(selector);
  
  if (element) return element;
  throw Error(`Please double check your class names, there is no ${selector} class`);
};

// Navigation functionality
const links = getElement('.nav-links');
const navBtnDOM = getElement('.nav-btn');

navBtnDOM.addEventListener('click', () => {
  links.classList.toggle('show-links');
});

// Contact form functionality
const contactForm = getElement('.contact-form');

// Handle form submission
const handleFormSubmit = (event) => {
  event.preventDefault(); // Prevent the default form submission

  // Get form input values
  const name = getElement('#name').value;
  const email = getElement('#email').value;
  const subject = getElement('#subject').value; // Include subject as well
  const message = getElement('#message').value;

  // Basic validation
  if (!name || !email || !message) {
    alert('Please fill in all fields.');
    return;
  }

  // Create the form data object
  const formData = new FormData();
  formData.append('name', name);
  formData.append('email', email);
  formData.append('subject', subject);
  formData.append('message', message);

  // Use fetch to send data to the server asynchronously (AJAX)
  fetch('insert_form.php', {
    method: 'POST',
    body: formData
  })
  .then(response => response.text())
  .then(data => {
    // Log the response from the server
    console.log(data);
    
    // Display success message
    alert('Thank you for your message! We will get back to you soon.');
    
    // Reset the form after successful submission
    contactForm.reset();
  })
  .catch(error => {
    console.error('Error:', error);
    alert('Oops! Something went wrong, please try again later.');
  });
};

// Add event listener for form submission
contactForm.addEventListener('submit', handleFormSubmit);

// Set the current year in the footer
const date = getElement('#date');
const currentYear = new Date().getFullYear();
date.textContent = currentYear;
