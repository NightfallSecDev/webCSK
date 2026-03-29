document.addEventListener('DOMContentLoaded', () => {
    
    // Form submission styling
    const form = document.getElementById('lead-form');
    if(form) {
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            // Validate form
            const phone = document.getElementById('phone').value;
            if(!phone || phone.length < 5) {
                alert('Please enter a valid phone number, as it is crucial for us to contact you.');
                return;
            }

            // Simulate form submission -> Real Fetch Post
            const btn = form.querySelector('button[type="submit"]');
            const originalText = btn.innerHTML;
            btn.innerHTML = 'Sending...';
            btn.style.opacity = '0.7';

            const formData = new FormData(form);

            fetch('backend/submit.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if(data.status === 'success') {
                    btn.innerHTML = data.message;
                    btn.style.background = '#10b981'; // Green success
                    btn.style.boxShadow = 'none';
                    form.reset();
                    
                    setTimeout(() => {
                        btn.innerHTML = originalText;
                        btn.style.background = '';
                        btn.style.opacity = '1';
                    }, 4000);
                } else {
                    alert('Error: ' + data.message);
                    btn.innerHTML = originalText;
                    btn.style.opacity = '1';
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('We encountered an issue submitting your quote. Please try again.');
                btn.innerHTML = originalText;
                btn.style.opacity = '1';
            });
        });
    }

    // Scroll reveal animations
    const observerOptions = {
        root: null,
        rootMargin: '0px',
        threshold: 0.1
    };

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    const revealElements = document.querySelectorAll('.service-card, .benefit-card, .process-step, .section-header, .cta-box, .review-card, .stat-box, .glow-box');
    revealElements.forEach(el => {
        el.classList.add('reveal');
        observer.observe(el);
    });

    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    });

});
