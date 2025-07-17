// Slider functionality for App5M Delivery section

let currentSlide = 0;
let slides = [];
let slideInterval;

document.addEventListener('DOMContentLoaded', function() {
    initSlider();
});

function initSlider() {
    const sliderTrack = document.getElementById('sliderTrack');
    if (!sliderTrack) return;
    
    slides = sliderTrack.querySelectorAll('.slide');
    
    if (slides.length === 0) return;
    
    // Initialize slider
    updateSlider();
    
    // Auto-play slider
    startAutoPlay();
    
    // Pause on hover
    const sliderContainer = document.querySelector('.slider-container');
    if (sliderContainer) {
        sliderContainer.addEventListener('mouseenter', stopAutoPlay);
        sliderContainer.addEventListener('mouseleave', startAutoPlay);
    }
    
    // Touch/swipe support
    addTouchSupport();
    
    // Keyboard navigation
    addKeyboardSupport();
    
    // Create slide indicators
    createSlideIndicators();
}

function changeSlide(direction) {
    if (slides.length === 0) return;
    
    currentSlide += direction;
    
    if (currentSlide >= slides.length) {
        currentSlide = 0;
    } else if (currentSlide < 0) {
        currentSlide = slides.length - 1;
    }
    
    updateSlider();
}

function goToSlide(index) {
    if (slides.length === 0 || index < 0 || index >= slides.length) return;
    
    currentSlide = index;
    updateSlider();
}

function updateSlider() {
    const sliderTrack = document.getElementById('sliderTrack');
    if (!sliderTrack) return;
    
    const slideWidth = slides[0].offsetWidth;
    const translateX = -currentSlide * slideWidth;
    
    sliderTrack.style.transform = `translateX(${translateX}px)`;
    
    // Update active slide
    slides.forEach((slide, index) => {
        slide.classList.toggle('active', index === currentSlide);
    });
    
    // Update indicators
    updateIndicators();
}

function startAutoPlay() {
    stopAutoPlay(); // Clear any existing interval
    slideInterval = setInterval(() => {
        changeSlide(1);
    }, 5000); // Change slide every 5 seconds
}

function stopAutoPlay() {
    if (slideInterval) {
        clearInterval(slideInterval);
        slideInterval = null;
    }
}

function addTouchSupport() {
    const sliderContainer = document.querySelector('.slider-container');
    if (!sliderContainer) return;
    
    let startX = 0;
    let currentX = 0;
    let isDragging = false;
    
    // Touch events
    sliderContainer.addEventListener('touchstart', handleTouchStart, { passive: true });
    sliderContainer.addEventListener('touchmove', handleTouchMove, { passive: false });
    sliderContainer.addEventListener('touchend', handleTouchEnd, { passive: true });
    
    // Mouse events for desktop
    sliderContainer.addEventListener('mousedown', handleMouseDown);
    sliderContainer.addEventListener('mousemove', handleMouseMove);
    sliderContainer.addEventListener('mouseup', handleMouseUp);
    sliderContainer.addEventListener('mouseleave', handleMouseUp);
    
    function handleTouchStart(e) {
        startX = e.touches[0].clientX;
        isDragging = true;
        stopAutoPlay();
    }
    
    function handleTouchMove(e) {
        if (!isDragging) return;
        
        currentX = e.touches[0].clientX;
        const diff = startX - currentX;
        
        // Prevent default scrolling
        if (Math.abs(diff) > 10) {
            e.preventDefault();
        }
    }
    
    function handleTouchEnd() {
        if (!isDragging) return;
        
        const diff = startX - currentX;
        const threshold = 50;
        
        if (Math.abs(diff) > threshold) {
            if (diff > 0) {
                changeSlide(1); // Swipe left - next slide
            } else {
                changeSlide(-1); // Swipe right - previous slide
            }
        }
        
        isDragging = false;
        startAutoPlay();
    }
    
    function handleMouseDown(e) {
        e.preventDefault();
        startX = e.clientX;
        isDragging = true;
        stopAutoPlay();
    }
    
    function handleMouseMove(e) {
        if (!isDragging) return;
        
        currentX = e.clientX;
    }
    
    function handleMouseUp() {
        if (!isDragging) return;
        
        const diff = startX - currentX;
        const threshold = 50;
        
        if (Math.abs(diff) > threshold) {
            if (diff > 0) {
                changeSlide(1);
            } else {
                changeSlide(-1);
            }
        }
        
        isDragging = false;
        startAutoPlay();
    }
}

function addKeyboardSupport() {
    document.addEventListener('keydown', function(e) {
        const sliderContainer = document.querySelector('.slider-container');
        if (!sliderContainer) return;
        
        // Check if slider is in viewport
        const rect = sliderContainer.getBoundingClientRect();
        const isInViewport = rect.top >= 0 && rect.bottom <= window.innerHeight;
        
        if (isInViewport) {
            switch (e.key) {
                case 'ArrowLeft':
                    e.preventDefault();
                    changeSlide(-1);
                    break;
                case 'ArrowRight':
                    e.preventDefault();
                    changeSlide(1);
                    break;
                case 'Home':
                    e.preventDefault();
                    goToSlide(0);
                    break;
                case 'End':
                    e.preventDefault();
                    goToSlide(slides.length - 1);
                    break;
            }
        }
    });
}

function createSlideIndicators() {
    const sliderContainer = document.querySelector('.slider-container');
    if (!sliderContainer || slides.length <= 1) return;
    
    const indicatorsContainer = document.createElement('div');
    indicatorsContainer.className = 'slide-indicators';
    
    slides.forEach((_, index) => {
        const indicator = document.createElement('button');
        indicator.className = 'slide-indicator';
        indicator.setAttribute('aria-label', `Ir para slide ${index + 1}`);
        indicator.addEventListener('click', () => {
            goToSlide(index);
            stopAutoPlay();
            startAutoPlay();
        });
        
        indicatorsContainer.appendChild(indicator);
    });
    
    sliderContainer.appendChild(indicatorsContainer);
    
    // Add CSS for indicators
    const indicatorStyles = document.createElement('style');
    indicatorStyles.textContent = `
        .slide-indicators {
            display: flex;
            justify-content: center;
            gap: 10px;
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 10;
        }
        
        .slide-indicator {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            border: 2px solid rgba(255, 255, 255, 0.5);
            background: transparent;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .slide-indicator:hover {
            border-color: rgba(255, 255, 255, 0.8);
        }
        
        .slide-indicator.active {
            background: white;
            border-color: white;
        }
        
        @media (max-width: 576px) {
            .slide-indicators {
                bottom: 10px;
            }
            
            .slide-indicator {
                width: 8px;
                height: 8px;
            }
        }
    `;
    
    document.head.appendChild(indicatorStyles);
}

function updateIndicators() {
    const indicators = document.querySelectorAll('.slide-indicator');
    indicators.forEach((indicator, index) => {
        indicator.classList.toggle('active', index === currentSlide);
    });
}

// Resize handler to update slider dimensions
window.addEventListener('resize', debounce(function() {
    updateSlider();
}, 250));

// Intersection Observer to pause slider when not visible
function initSliderVisibilityObserver() {
    const sliderContainer = document.querySelector('.slider-container');
    if (!sliderContainer) return;
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                startAutoPlay();
            } else {
                stopAutoPlay();
            }
        });
    }, {
        threshold: 0.5
    });
    
    observer.observe(sliderContainer);
}

// Initialize visibility observer
document.addEventListener('DOMContentLoaded', function() {
    initSliderVisibilityObserver();
});

// Utility function for debouncing
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

// Accessibility improvements
function addAccessibilityFeatures() {
    const sliderContainer = document.querySelector('.slider-container');
    if (!sliderContainer) return;
    
    // Add ARIA labels
    sliderContainer.setAttribute('role', 'region');
    sliderContainer.setAttribute('aria-label', 'Galeria de imagens do App5M Delivery');
    
    // Add live region for screen readers
    const liveRegion = document.createElement('div');
    liveRegion.setAttribute('aria-live', 'polite');
    liveRegion.setAttribute('aria-atomic', 'true');
    liveRegion.className = 'sr-only';
    sliderContainer.appendChild(liveRegion);
    
    // Update live region when slide changes
    const originalUpdateSlider = updateSlider;
    updateSlider = function() {
        originalUpdateSlider();
        liveRegion.textContent = `Slide ${currentSlide + 1} de ${slides.length}`;
    };
    
    // Add skip link
    const skipLink = document.createElement('a');
    skipLink.href = '#after-slider';
    skipLink.className = 'skip-link';
    skipLink.textContent = 'Pular galeria';
    skipLink.style.cssText = `
        position: absolute;
        top: -40px;
        left: 6px;
        background: #000;
        color: #fff;
        padding: 8px;
        text-decoration: none;
        z-index: 100;
        border-radius: 4px;
        transition: top 0.3s;
    `;
    
    skipLink.addEventListener('focus', function() {
        this.style.top = '6px';
    });
    
    skipLink.addEventListener('blur', function() {
        this.style.top = '-40px';
    });
    
    sliderContainer.insertBefore(skipLink, sliderContainer.firstChild);
    
    // Add anchor after slider
    const afterSlider = document.createElement('div');
    afterSlider.id = 'after-slider';
    afterSlider.setAttribute('tabindex', '-1');
    sliderContainer.parentNode.insertBefore(afterSlider, sliderContainer.nextSibling);
}

// Initialize accessibility features
document.addEventListener('DOMContentLoaded', function() {
    addAccessibilityFeatures();
});

// Preload next slide image (if using real images)
function preloadNextSlide() {
    const nextSlideIndex = (currentSlide + 1) % slides.length;
    const nextSlide = slides[nextSlideIndex];
    const img = nextSlide.querySelector('img[data-src]');
    
    if (img && !img.src) {
        img.src = img.dataset.src;
    }
}

// Performance optimization: Intersection Observer for lazy loading
function initSliderLazyLoading() {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target.querySelector('img[data-src]');
                if (img) {
                    img.src = img.dataset.src;
                    img.removeAttribute('data-src');
                }
                observer.unobserve(entry.target);
            }
        });
    }, {
        root: document.querySelector('.slider-container'),
        rootMargin: '50px'
    });
    
    slides.forEach(slide => {
        observer.observe(slide);
    });
}

// Initialize lazy loading for slider
document.addEventListener('DOMContentLoaded', function() {
    initSliderLazyLoading();
});
