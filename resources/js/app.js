import './bootstrap';
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



class App {



    initSidenav() {
        let pageUrl = window.location.href.split(/[?#]/)[0];
        document.querySelectorAll('ul.menu a.menu-link').forEach((element) => {
            if (element.href === pageUrl) {
                element.classList.add('active');
                let parentMenu = element.parentElement.parentElement.parentElement;
                if (parentMenu && parentMenu.classList.contains('menu-item')) {
                    const collapseElement = parentMenu.querySelector('[data-fc-type="collapse"]');
                    if (collapseElement && frost != null) {
                        const collapse = frost.Collapse.getInstanceOrCreate(collapseElement);
                        collapse.show();
                    }
                }
            }
        });

        setTimeout(() => {
            let activatedItem = document.querySelector('ul.menu .active');
            if (activatedItem != null) {
                let simplebarContent = document.querySelector('.app-menu .simplebar-content-wrapper');
                let offset = activatedItem.offsetTop - 300;
                if (simplebarContent && offset > 100) {
                    this.scrollTo(simplebarContent, offset, 600);
                }
            }
        }, 200);
    }
    initFullScreenListener() {
        let fullScreenBtn = document.querySelector('[data-toggle="fullscreen"]');
        if (fullScreenBtn) {
            fullScreenBtn.addEventListener('click', (e) => {
                e.preventDefault();
                document.body.classList.toggle('fullscreen-enable');
                if (!document.fullscreenElement && !document.mozFullScreenElement && !document.webkitFullscreenElement) {
                    if (document.documentElement.requestFullscreen) {
                        document.documentElement.requestFullscreen();
                    } else if (document.documentElement.mozRequestFullScreen) {
                        document.documentElement.mozRequestFullScreen();
                    } else if (document.documentElement.webkitRequestFullscreen) {
                        document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
                    }
                } else {
                    if (document.cancelFullScreen) {
                        document.cancelFullScreen();
                    } else if (document.mozCancelFullScreen) {
                        document.mozCancelFullScreen();
                    } else if (document.webkitCancelFullScreen) {
                        document.webkitCancelFullScreen();
                    }
                }
            });
        }
    }
    scrollTo(element, to, duration) {
        let start = element.scrollTop, change = to - start, currentTime = 0, increment = 20;
        let animateScroll = () => {
            currentTime += increment;
            let val = this.easeInOutQuad(currentTime, start, change, duration);
            element.scrollTop = val;
            if (currentTime < duration) {
                setTimeout(animateScroll, increment);
            }
        };
        animateScroll();
    }
    easeInOutQuad(t, b, c, d) {
        t /= d / 2;
        if (t < 1) return c / 2 * t * t + b;
        t--;
        return -c / 2 * (t * (t - 2) - 1) + b;
    }

    init() {
        this.initSidenav();
        this.initFullScreenListener();
    }
}

class ThemeCustomizer {
    constructor() {
        this.html = document.getElementsByTagName('html')[0];
    }


    showBackdrop() {
        const backdrop = document.createElement('div');
        backdrop.id = 'backdrop';
        backdrop.classList = 'transition-all fixed inset-0 z-40 bg-gray-900 bg-opacity-50 dark:bg-opacity-80';
        document.body.appendChild(backdrop);

        document.body.style.overflow = "hidden";
        if (window.innerWidth > 1140) {
            document.body.style.paddingRight = "15px";
        }

        backdrop.addEventListener('click', () => {
            this.html.classList.remove('sidenav-enable');
            this.hideBackdrop();
        });
    }

    hideBackdrop() {
        const backdrop = document.getElementById('backdrop');
        if (backdrop) {
            document.body.removeChild(backdrop);
            document.body.style.overflow = null;
            document.body.style.paddingRight = null;
        }
    }

    toggleThemeMode() {
        const themeColorToggle = document.getElementById('light-dark-mode');
        if (themeColorToggle) {
            themeColorToggle.addEventListener('click', () => {
                if (this.html.getAttribute('data-mode') === 'light') {
                    this.html.setAttribute('data-mode', 'dark');
                } else {
                    this.html.setAttribute('data-mode', 'light');
                }
            });
        }
    }

    ButtonToggleMenu() {
        var menuToggleBtn = document.querySelector('#button-toggle-menu');
        if (menuToggleBtn) {
            menuToggleBtn.addEventListener('click',  () => {
                const view = this.html.getAttribute('data-sidenav-view');

                if (view === 'mobile') {
                    this.showBackdrop();
                    this.html.classList.toggle('sidenav-enable');
                } else {
                    if (view === 'hidden') {
                        this.html.setAttribute('data-sidenav-view', 'default');
                    } else if (view === 'sm') {
                        this.html.setAttribute('data-sidenav-view', 'default');
                    }else if(view === 'hidden-update'){
                        this.html.setAttribute('data-sidenav-view', 'hidden');
                    }
                    else {
                        this.html.setAttribute('data-sidenav-view', 'hidden');
                    }
                }
            })
            }
    }

    updateSidenavView() {
        const view = this.html.getAttribute('data-sidenav-view');
        if(view == 'mobile'){
            this.html.setAttribute('data-sidenav-view', 'mobile');
            this.html.classList.remove('sidenav-enable');
        }

    }

    adjustLayout() {
        if (window.innerWidth <= 1140) {
            // this.showBackdrop();
            this.html.setAttribute('data-sidenav-view', 'mobile');
            // this.html.classList.toggle('sidenav-enable');
        } else {
            this.html.setAttribute('data-sidenav-view', 'default');
            // this.html.classList.remove('sidenav-enable');
            this.hideBackdrop();
        }
    }

    initWindowSize() {
        window.addEventListener('resize', () => {
            this.adjustLayout();
        });
    }

    init() {
        this.initWindowSize();
        this.adjustLayout();
        this.toggleThemeMode();
        this.ButtonToggleMenu();
        // this.initializeTabs();


        document.addEventListener('livewire:navigate', () => {
            this.updateSidenavView();
        });
    }
}


document.addEventListener('livewire:navigated', async () => {
    const themeCustomizer = new ThemeCustomizer();
    const app = new App()
    themeCustomizer.init();
    app.init();

});



