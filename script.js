document.addEventListener('DOMContentLoaded', () => {

    // 1. FAQ Accordion Click Handler
    const faqItems = document.querySelectorAll('.faq-item');

    faqItems.forEach((item) => {
        item.addEventListener('click', () => {
            const nextAnswer = item.nextElementSibling;
            const icon = item.querySelector('.faq-icon');

            if (nextAnswer && nextAnswer.classList.contains('faq-answer')) {
                // Toggle active state for current answer
                const isActive = nextAnswer.classList.contains('active');
                
                // Close all other open answers
                document.querySelectorAll('.faq-answer').forEach(ans => ans.classList.remove('active'));
                document.querySelectorAll('.faq-icon').forEach(ic => {
                    ic.classList.remove('fa-minus');
                    ic.classList.add('fa-plus');
                });

                // If not active, open clicked answer
                if (!isActive) {
                    nextAnswer.classList.add('active');
                    icon.classList.remove('fa-plus');
                    icon.classList.add('fa-minus');
                }
            }
        });
    });

    // 2. Redirect "CHOOSE PLAN" & "JOIN PREMIUM" Buttons to Telegram
    const joinButtons = document.querySelectorAll('.btn-card, .btn-primary, .btn-join-nav');
    const telegramLink = "https://t.me/IM_ARCHIT"; // Replace with your Telegram link

    joinButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            e.preventDefault();
            window.open(telegramLink, '_blank');
        });
    });

    // 3. Smooth Scrolling for Navigation Links
    const navLinks = document.querySelectorAll('nav ul li a');

    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            const targetText = this.innerText.toLowerCase();
            let targetSection = null;

            if (targetText === 'plans') {
                targetSection = document.querySelector('.pricing-grid');
            } else if (targetText === 'features') {
                targetSection = document.querySelector('.why-choose');
            } else if (targetText === 'faq') {
                targetSection = document.querySelector('.faq-grid');
            } else if (targetText === 'about') {
                targetSection = document.querySelector('.stats-grid');
            } else if (targetText === 'contact') {
                targetSection = document.querySelector('footer');
            }

            if (targetSection) {
                e.preventDefault();
                targetSection.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
            }
        });
    });

});
