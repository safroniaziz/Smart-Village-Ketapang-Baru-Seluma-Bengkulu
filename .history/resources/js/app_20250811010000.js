import './bootstrap';

import Alpine from 'alpinejs';
import AOS from 'aos';
import 'aos/dist/aos.css';

window.Alpine = Alpine;

Alpine.start();

// Initialize AOS globally via Vite
window.addEventListener('DOMContentLoaded', () => {
  try {
    AOS.init({
      duration: 800,
      easing: 'ease-in-out',
      once: true,
    });
    // After charts render, recalc positions
    setTimeout(() => AOS.refreshHard(), 400);
    window.AOS = AOS;
  } catch (e) {
    console.warn('AOS init skipped:', e);
  }
});
