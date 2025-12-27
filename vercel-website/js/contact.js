/**
 * Contact form handling
 * Note: In a static site, form submission would typically use a service like Formspree, Netlify Forms, or a backend API
 */

document.addEventListener('DOMContentLoaded', () => {
  const contactForm = document.getElementById('contact-form');
  const formMessage = document.getElementById('form-message');
  
  if (!contactForm) return;
  
  contactForm.addEventListener('submit', (e) => {
    e.preventDefault();
    
    // Get form data
    const formData = new FormData(contactForm);
    const data = Object.fromEntries(formData);
    
    // Show loading state
    const submitButton = contactForm.querySelector('button[type="submit"]');
    const originalText = submitButton.textContent;
    submitButton.disabled = true;
    submitButton.textContent = 'Sending...';
    
    // Simulate form submission
    // In production, this would send to a backend service
    setTimeout(() => {
      // Show success message
      formMessage.classList.remove('hidden');
      formMessage.classList.add('bg-green-50', 'text-green-800', 'border', 'border-green-200');
      formMessage.textContent = 'Thank you! Your message has been sent. We\'ll get back to you soon.';
      
      // Reset form
      contactForm.reset();
      submitButton.disabled = false;
      submitButton.textContent = originalText;
      
      // Hide message after 5 seconds
      setTimeout(() => {
        formMessage.classList.add('hidden');
        formMessage.classList.remove('bg-green-50', 'text-green-800', 'border', 'border-green-200');
      }, 5000);
      
      // Log form data (in production, send to backend)
      console.log('Form submitted:', data);
      
      // Example: You could integrate with Formspree, Netlify Forms, or your own API
      // fetch('https://formspree.io/f/YOUR_FORM_ID', {
      //   method: 'POST',
      //   headers: { 'Content-Type': 'application/json' },
      //   body: JSON.stringify(data)
      // })
      // .then(response => response.json())
      // .then(data => {
      //   // Handle success
      // })
      // .catch(error => {
      //   // Handle error
      // });
    }, 1000);
  });
});

