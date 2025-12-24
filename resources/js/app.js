import './bootstrap';
import AOS from 'aos';
import 'aos/dist/aos.css';

// Inisialisasi AOS setelah DOM siap
document.addEventListener('DOMContentLoaded', () => {
    AOS.init({
        duration: 800,
        once: true,
    });
});
