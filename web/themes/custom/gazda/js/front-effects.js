((Drupal, once) => {
  'use strict';

  Drupal.behaviors.gazdaFrontEffects = {
    attach(context) {
      once('gazda-front-effects', '#main-content #content', context).forEach((frontPage) => {
        const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        const hero = frontPage.querySelector('#hero');
        const introductionBlocks = frontPage.querySelectorAll('#introduction .icons .block');
        const revealGroups = [
          ['#introduction', ''],
          ['.separator', ''],
          ['#categories .category', ''],
          ['#discount', 'gazda-reveal--left'],
          ['#top-products .product', ''],
          ['#actual', 'gazda-reveal--right'],
          ['#news', 'gazda-reveal--left'],
          ['#customer-reviews .customer-review', ''],
        ];
        const revealItems = [];

        revealGroups.forEach(([selector, modifier]) => {
          frontPage.querySelectorAll(selector).forEach((element, index) => {
            element.classList.add('gazda-reveal');
            if (modifier) {
              element.classList.add(modifier);
            }
            element.style.setProperty('--gazda-delay', `${Math.min(index * 70, 280)}ms`);
            revealItems.push(element);
          });
        });

        frontPage.classList.add('gazda-motion-ready');

        if (reduceMotion || !('IntersectionObserver' in window)) {
          revealItems.forEach((element) => element.classList.add('is-visible'));
          return;
        }

        const observer = new IntersectionObserver((entries) => {
          entries.forEach((entry) => {
            if (entry.isIntersecting) {
              entry.target.classList.add('is-visible');
              observer.unobserve(entry.target);
            }
          });
        }, {
          rootMargin: '0px 0px -10% 0px',
          threshold: 0.12,
        });

        revealItems.forEach((element) => observer.observe(element));

        const animateNumber = (element, delay) => {
          const originalValue = element.textContent.trim();
          const target = Number.parseInt(originalValue.replace(/\D/g, ''), 10);
          const suffix = originalValue.replace(/[\d\s.,]/g, '');

          if (!Number.isFinite(target)) {
            return;
          }

          const duration = 1100;
          const start = performance.now() + delay;
          const step = (timestamp) => {
            const progress = Math.min(Math.max((timestamp - start) / duration, 0), 1);
            const easedProgress = 1 - ((1 - progress) ** 3);
            element.textContent = `${Math.round(target * easedProgress)}${suffix}`;

            if (progress < 1) {
              window.requestAnimationFrame(step);
            }
            else {
              element.textContent = originalValue;
            }
          };

          window.requestAnimationFrame(step);
        };

        if (introductionBlocks.length) {
          const statsObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
              if (entry.isIntersecting) {
                introductionBlocks.forEach((block, index) => {
                  block.classList.add('is-counted');
                  const number = block.querySelector('strong');
                  if (number) {
                    animateNumber(number, index * 140);
                  }
                });
                statsObserver.disconnect();
              }
            });
          }, { threshold: 0.55 });

          statsObserver.observe(frontPage.querySelector('#introduction .icons'));

          if (window.matchMedia('(pointer: fine)').matches) {
            introductionBlocks.forEach((block) => {
              block.addEventListener('pointermove', (event) => {
                const bounds = block.getBoundingClientRect();
                const x = (event.clientX - bounds.left) / bounds.width;
                const y = (event.clientY - bounds.top) / bounds.height;
                block.style.setProperty('--gazda-icon-tilt-x', `${(0.5 - y) * 9}deg`);
                block.style.setProperty('--gazda-icon-tilt-y', `${(x - 0.5) * 11}deg`);
                block.style.setProperty('--gazda-icon-glow-x', `${x * 100}%`);
                block.style.setProperty('--gazda-icon-glow-y', `${y * 100}%`);
              });
              block.addEventListener('pointerleave', () => {
                block.style.setProperty('--gazda-icon-tilt-x', '0deg');
                block.style.setProperty('--gazda-icon-tilt-y', '0deg');
                block.style.setProperty('--gazda-icon-glow-x', '50%');
                block.style.setProperty('--gazda-icon-glow-y', '50%');
              });
            });
          }
        }

        const progress = document.createElement('div');
        progress.className = 'gazda-scroll-progress';
        progress.setAttribute('aria-hidden', 'true');
        document.body.append(progress);

        let frameRequested = false;
        const updateScrollEffects = () => {
          const scrollableHeight = document.documentElement.scrollHeight - window.innerHeight;
          const scrollProgress = scrollableHeight > 0 ? window.scrollY / scrollableHeight : 0;
          progress.style.setProperty('--gazda-scroll-progress', Math.min(Math.max(scrollProgress, 0), 1));

          if (hero) {
            const heroBounds = hero.getBoundingClientRect();
            const heroProgress = Math.min(Math.max(-heroBounds.top / Math.max(heroBounds.height, 1), 0), 1);
            hero.style.setProperty('--gazda-hero-y', `${heroProgress * 14}px`);
          }
          frameRequested = false;
        };

        const requestScrollUpdate = () => {
          if (!frameRequested) {
            window.requestAnimationFrame(updateScrollEffects);
            frameRequested = true;
          }
        };

        window.addEventListener('scroll', requestScrollUpdate, { passive: true });
        window.addEventListener('resize', requestScrollUpdate, { passive: true });
        updateScrollEffects();

        if (hero && window.matchMedia('(pointer: fine)').matches) {
          hero.addEventListener('pointermove', (event) => {
            const bounds = hero.getBoundingClientRect();
            const relativeX = (event.clientX - bounds.left) / bounds.width;
            const relativeY = (event.clientY - bounds.top) / bounds.height;
            const horizontalPosition = relativeX - 0.5;
            const verticalPosition = relativeY - 0.5;
            hero.style.setProperty('--gazda-hero-x', `${horizontalPosition * -10}px`);
            hero.style.setProperty('--gazda-hero-y', `${verticalPosition * -7}px`);
            hero.style.setProperty('--gazda-hero-light-x', `${relativeX * 100}%`);
            hero.style.setProperty('--gazda-hero-light-y', `${relativeY * 100}%`);
            hero.style.setProperty('--gazda-hero-tilt-x', `${verticalPosition * -2.4}deg`);
            hero.style.setProperty('--gazda-hero-tilt-y', `${horizontalPosition * 3.2}deg`);
          });
          hero.addEventListener('pointerleave', () => {
            hero.style.setProperty('--gazda-hero-x', '0px');
            hero.style.setProperty('--gazda-hero-light-x', '68%');
            hero.style.setProperty('--gazda-hero-light-y', '45%');
            hero.style.setProperty('--gazda-hero-tilt-x', '0deg');
            hero.style.setProperty('--gazda-hero-tilt-y', '0deg');
            requestScrollUpdate();
          });
        }
      });
    },
  };
})(Drupal, once);
