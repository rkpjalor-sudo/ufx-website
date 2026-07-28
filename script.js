document.addEventListener('DOMContentLoaded', () => {
    // FAQ Accordion Toggle
    const faqItems = document.querySelectorAll('.faq-item');

    faqItems.forEach((item) => {
        item.addEventListener('click', () => {
            const nextAnswer = item.nextElementSibling;
            if (nextAnswer && nextAnswer.classList.contains('faq-answer')) {
                nextAnswer.classList.toggle('active');
            }
        });
    });

    // Telegram Redirect
    const joinButtons = document.querySelectorAll('.btn-card, .btn-primary, .btn-join-nav');
    joinButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            e.preventDefault();
            window.open("https://t.me/IM_ARCHIT", '_blank');
        });
    });
});
