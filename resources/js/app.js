import './bootstrap';
import './config';
import '@frostui/tailwindcss';
import 'simplebar/dist/simplebar.css';
import Swal from 'sweetalert2';


document.addEventListener('Notifier', event => {
    Swal.fire({
        title: event.detail.title,
        text: event.detail.text,
        icon: event.detail.icon,
        confirmButtonColor: "#3085d6",
      });
  });

