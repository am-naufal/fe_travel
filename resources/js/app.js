import './bootstrap';

import Alpine from 'alpinejs';

/**
 * Reusable count-up used by the Statistics section.
 * Starts animating once the element scrolls into view, then disconnects.
 * Usage: <div x-data="counter(1500)"><span x-text="display"></span></div>
 */
Alpine.data('counter', (target = 0, duration = 1500) => ({
    display: 0,

    init() {
        let started = false;

        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting && !started) {
                    started = true;
                    this.run();
                    observer.disconnect();
                }
            });
        }, { threshold: 0.4 });

        observer.observe(this.$el);
    },

    run() {
        const start = performance.now();

        const step = (now) => {
            const progress = Math.min((now - start) / duration, 1);
            this.display = Math.floor(target * progress);

            if (progress < 1) {
                requestAnimationFrame(step);
            } else {
                this.display = target;
            }
        };

        requestAnimationFrame(step);
    },
}));

window.Alpine = Alpine;

Alpine.start();
