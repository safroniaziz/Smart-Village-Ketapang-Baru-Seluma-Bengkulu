import './bootstrap';
import Alpine from 'alpinejs';

// Initialize Alpine.js
window.Alpine = Alpine;
Alpine.start();

// Global jQuery functions for smooth interactions
$(document).ready(function() {
    // Smooth page transitions
    function initPageTransitions() {
        $('a[href^="#"]').on('click', function(e) {
            e.preventDefault();
            const target = $(this.getAttribute('href'));
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 800, 'easeInOutQuart');
            }
        });
    }

    // Animate elements on scroll
    function initScrollAnimations() {
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-fade-in');
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        $('.animate-on-scroll').each(function() {
            observer.observe(this);
        });
    }

    // Counter animation
    function animateCounters() {
        $('.counter').each(function() {
            const $this = $(this);
            const countTo = $this.attr('data-count');

            $({ countNum: $this.text() }).animate({
                countNum: countTo
            }, {
                duration: 2000,
                easing: 'swing',
                step: function() {
                    $this.text(Math.floor(this.countNum));
                },
                complete: function() {
                    $this.text(this.countNum);
                }
            });
        });
    }

    // Interactive cards
    function initInteractiveCards() {
        $('.card-hover').hover(
            function() {
                $(this).addClass('scale-105');
            },
            function() {
                $(this).removeClass('scale-105');
            }
        );
    }

    // Smooth loading
    function initSmoothLoading() {
        $(window).on('load', function() {
            $('.loading-screen').fadeOut(500);
            $('body').addClass('loaded');
        });
    }

    // Mobile menu toggle
    function initMobileMenu() {
        $('.mobile-menu-toggle').on('click', function() {
            $('.mobile-menu').toggleClass('translate-x-0 -translate-x-full');
            $('body').toggleClass('overflow-hidden');
        });

        $('.mobile-menu a').on('click', function() {
            $('.mobile-menu').removeClass('translate-x-0').addClass('-translate-x-full');
            $('body').removeClass('overflow-hidden');
        });
    }

    // Form interactions
    function initFormInteractions() {
        $('.form-input').on('focus', function() {
            $(this).parent().addClass('ring-2 ring-primary-500');
        }).on('blur', function() {
            $(this).parent().removeClass('ring-2 ring-primary-500');
        });
    }

    // Initialize all functions
    initPageTransitions();
    initScrollAnimations();
    initInteractiveCards();
    initSmoothLoading();
    initMobileMenu();
    initFormInteractions();

    // Trigger counter animation when in viewport
    const counterObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateCounters();
                counterObserver.unobserve(entry.target);
            }
        });
    });

    $('.stats-section').each(function() {
        counterObserver.observe(this);
    });
});

// Global utility functions
window.showAlert = function(message, type = 'success') {
    const alertClass = type === 'success' ? 'bg-success-500' : 'bg-danger-500';
    const alertHtml = `
        <div class="fixed top-4 right-4 z-50 ${alertClass} text-white px-6 py-3 rounded-lg shadow-lg transform transition-all duration-300 translate-x-full">
            ${message}
        </div>
    `;

    const $alert = $(alertHtml);
    $('body').append($alert);

    setTimeout(() => {
        $alert.removeClass('translate-x-full');
    }, 100);

    setTimeout(() => {
        $alert.addClass('translate-x-full');
        setTimeout(() => {
            $alert.remove();
        }, 300);
    }, 3000);
};

window.showLoading = function() {
    const loadingHtml = `
        <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white rounded-lg p-6 flex items-center space-x-3">
                <div class="loading-spinner"></div>
                <span class="text-gray-700">Loading...</span>
            </div>
        </div>
    `;
    $('body').append(loadingHtml);
};

window.hideLoading = function() {
    $('.fixed.inset-0.bg-black').remove();
};
