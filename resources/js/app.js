import './bootstrap';
import 'simplebar/dist/simplebar.css';
import Swal from 'sweetalert2';


document.addEventListener('Notifier', event => {
    Swal.fire({
        title: event.detail.title,
        timer: 4000,
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


class CheckedGate1Card{
    init(){
        const startCheck = document.getElementById('start-check');
        if (startCheck) {
            startCheck.addEventListener('click', () => {
                var no = 1;
                var regex = /\d{1,16}\|\d{1,2}\|\d{1,4}\|\d{1,4}/g;
                var cardInputElement = document.getElementById('card-input');
                var delim = document.getElementById('delim').value;
                var cardInputValue = cardInputElement.value;
                var ccall = cardInputValue.match(regex);
                // console.log(cardInputValue)
                if(ccall != null){
                    var card = this.filterCard(cardInputValue, delim);
                    var cardInputElement = document.getElementById('card-input');
                    cardInputElement.value = card.join("\n");
                    cardInputElement.disabled = true;
                    this.resetResult();
                    var startButton = document.getElementById('start-check');
                    startButton.disabled = true; 
                    var stopButton = document.getElementById('stop-check');
                    stopButton.disabled = false; 
                    this.ExecuteNya(card, 0, no);
                }else{
                    Swal.fire({
                        title: "Can't Check",
                        timer: 4000,
                        allowEscapeKey: true,
                        allowOutsideClick: true,
                        icon: "error",
                        text: "Please drop an Credit Card in the fields!",
                        confirmButtonText: "Continue"
                    });
                    return false;
                }
            });
        }

    }

    filterCard(mp, delim){
        var mps = mp.split("\n");
        // console.log(mps);
        var lstMP = new Array();
        for(var i=0;i<mps.length;i++){
            var infoMP = mps[i].split(delim);
            if (infoMP.length >= 4) {
                // Ambil dan trim informasi dari array
                var ccnum = infoMP[0].trim();
                var ccmon = infoMP[1].trim();
                var ccyear = infoMP[2].trim();
                var ccvv = infoMP[3].trim();
                
                // Gabungkan informasi dalam format yang diinginkan dan tambahkan ke lstMP
                lstMP.push(ccnum + '|' + ccmon + '|' + ccyear + '|' + ccvv);
            }
        }
        return lstMP;
    }

    resetResult() {
        // Mengatur konten HTML elemen dengan ID 'res_die' dan 'res_unkw' menjadi string kosong
        var resDieElement = document.getElementById('res_die');
        var resUnkwElement = document.getElementById('res_unkw');
        
        if (resDieElement) resDieElement.innerHTML = '';
        if (resUnkwElement) resUnkwElement.innerHTML = '';
    
        // Mengatur teks elemen dengan ID 'deadres' dan 'unknownres' menjadi '0'
        var deadResElement = document.getElementById('deadres');
        var unknownResElement = document.getElementById('unknownres');
        
        if (deadResElement) deadResElement.textContent = '0';
        if (unknownResElement) unknownResElement.textContent = '0';
    }

    stopLoading(bool, bool2, msg){
        // $('#loading').attr('src', '');
        // var str = $('#checkStatus').html();
        // $('#checkStatus').html(str.replace('Checking','Stopped')).removeClass('bg-success').addClass('bg-danger');
        var cardInputElement = document.getElementById('card-input');

        cardInputElement.disabled = false;
        var startButton = document.getElementById('start-check');
        var stopButton = document.getElementById('stop-check');

        // Mengatur atribut 'disabled' pada elemen 'start' menjadi false (mengaktifkan tombol)
        if (startButton) {
            startButton.disabled = false;
        }

        // Mengatur atribut 'disabled' pada elemen 'stop' menjadi true (menonaktifkan tombol)
        if (stopButton) {
            stopButton.disabled = true;
        }
        if(bool && !bool2){
            Swal.fire({
                title: "Checking Complete",
                timer: 4000,
                icon: "success",
                allowEscapeKey: true,
                allowOutsideClick: true,
                text: "Thanks",
                // html: true,
                confirmButtonText: "Continue"
            });
        } else if (!bool && bool2){
            Swal.fire({
                title: "Can't Check",
                timer: 4000,
                allowEscapeKey: true,
                allowOutsideClick: true,
                icon: "error",
                text: msg,
                confirmButtonText: "Continue"
            });
        }else{
            // ajaxCall.abort();
        }
            // updateTitle('Stopped');
    }

    updateTextBox(carMP){
        var cardInputElement = document.getElementById('card-input');
    
        // Ambil nilai elemen input dan pisahkan dengan baris baru
        var card = cardInputElement.value.split("\n");
        
        // Hapus item dari array
        card = this.removeFromArray(card, carMP);
        
        // Gabungkan array menjadi string dengan baris baru dan atur nilai elemen input
        cardInputElement.value = card.join("\n");
    }

    removeFromArray(array, value) {
        return array.filter(function(item) {
            return item !== value;
        });
    }

    ExecuteNya(card, mp, no){
        if(card.length<1 || mp>=card.length){
            this.stopLoading(true, false);
            return false;
        }
        this.updateTextBox(card[mp]);

        var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        var resUnkwElement = document.getElementById('res_unkw');
        var resDieElement = document.getElementById('res_die');
        var resApproveElement = document.getElementById('res_approve');

        var data = new URLSearchParams();
        data.append('ajax', '1');
        data.append('do', 'check');
        data.append('data', encodeURIComponent(card[mp]));
        data.append('delim', encodeURIComponent(delim));

    // Permintaan menggunakan fetch
    fetch('https://indocheck.vip/', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
            'X-CSRF-TOKEN': csrfToken
        },
        body: data.toString()
    })
    .then(response => response.json())
    .then(data => {
        switch (data.error) {
            case -1:
                mp++;
                resUnkwElement.innerHTML += data.msg + '<br />';
                count_unkUp();
                break;
            case 2:
                mp++;
                resDieElement.innerHTML += data.msg + '<br />';
                // yourCreditsElement.textContent = data.bal;
                count_dieUp();
                break;
            case 5:
                this.stopLoading(false, true, data.msg);
                return;
            case 0:
                mp++;
                resApproveElement.innerHTML += data.msg + '<br />';
                // yourCreditsElement.textContent = data.bal;
                count_liveUp();
                break;
        }
        no++;
        this.ExecuteNya(card, mp, delim, no);
    })
    .catch(error => {
        console.error('Error:', error);
        this.stopLoading(false, false);
    });
        // this.ExecuteNya(card, mp, no);
    }
    
}


document.addEventListener('livewire:navigated', async () => {
    const themeCustomizer = new ThemeCustomizer();
    const app = new App()
    const checkGate1 = new CheckedGate1Card();

    themeCustomizer.init();
    app.init();
    checkGate1.init();
    
});



