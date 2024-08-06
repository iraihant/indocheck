
document.addEventListener('alpine:init', () => {
    Alpine.data('appComponent', () => ({
        init() {
            this.initSidenav();
            this.initFullScreenListener();
        },

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
        },
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
        },
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
        },
        easeInOutQuad(t, b, c, d) {
            t /= d / 2;
            if (t < 1) return c / 2 * t * t + b;
            t--;
            return -c / 2 * (t * (t - 2) - 1) + b;
        }
    }));

    Alpine.data('ThemeComponent', () => ({
        init() {
            this.initWindowSize();
            this.adjustLayout();
        },
        html: document.getElementsByTagName('html')[0],
        showBackdrop() {
            const backdrop = document.createElement('div');
            backdrop.id = 'backdrop';
            backdrop.classList = 'transition-all fixed inset-0 z-40 bg-gray-900 bg-opacity-50 dark:bg-opacity-80';
            document.body.appendChild(backdrop);

            if (document.getElementsByTagName('html')[0]) {
                document.body.style.overflow = "hidden";
                if (window.innerWidth > 1140) {
                    document.body.style.paddingRight = "15px";
                }
            }
            backdrop.addEventListener('click', (e) => {
                this.html.classList.remove('sidenav-enable');
                this.hideBackdrop();
            })
        },

        hideBackdrop() {
            var backdrop = document.getElementById('backdrop');
            if (backdrop) {
                document.body.removeChild(backdrop);
                document.body.style.overflow = null;
                document.body.style.paddingRight = null;
            }
        },
        toggleThemeMode(){
            if (this.html.getAttribute('data-mode') == 'light') {
                this.html.setAttribute('data-mode', 'dark');
            } else {
                this.html.setAttribute('data-mode', 'light');
            }
        },
        ButtonToggleMenu(){
            var view = this.html.getAttribute('data-sidenav-view');

            if (view === 'mobile') {
                this.showBackdrop();
                this.html.classList.toggle('sidenav-enable');
            } else {
                if (view == 'hidden') {
                    if (view === 'hidden') {
                        this.html.setAttribute('data-sidenav-view', view == 'hidden' ? 'default' : view);
                        // this.changeSidenavView(view == 'hidden' ? 'default' : view, false);
                    } else {
                        this.html.setAttribute('data-sidenav-view', 'hidden');
                    }
                } else {
                    if (view === 'sm') {
                        this.html.setAttribute('data-sidenav-view', view == 'sm' ? 'default' : view);
                    } else {
                        this.html.setAttribute('data-sidenav-view', 'sm');
                    }
                }
            }
        },
        adjustLayout() {
             // var self = this;
            if (window.innerWidth <= 1140) {
                this.html.setAttribute('data-sidenav-view', 'mobile');
            } else {
                this.html.setAttribute('data-sidenav-view', 'default');
            }
        },

        initWindowSize() {
            window.addEventListener('resize', (e) => {
                this.adjustLayout();
            })
        },




    }));

});

