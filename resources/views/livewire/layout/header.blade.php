<div>
    <div >
        <a href="/" class="logo-box">
            <!-- Light Logo -->
            <div class="logo-light">
                <img src="{{ asset('images/logo.png') }}" class="logo-lg h-[22px]" alt="Light logo">
                <img src="{{ asset('images/logo-sm.png') }}" class="logo-sm h-[22px]" alt="Small logo">
            </div>

            <!-- Dark Logo -->
            <div class="logo-dark">
                <img src="{{ asset('images/logo-dark.png')}}" class="logo-lg h-[22px]" alt="Dark logo">
                <img src="{{ asset('images/logo-sm.png') }}" class="logo-sm h-[22px]" alt="Small logo">
            </div>
        </a>

        <!-- Sidenav Menu Toggle Button -->
        <button id="button-hover-toggle" class="absolute top-5 end-2 rounded-full p-1.5 z-50">
            <span class="sr-only">Menu Toggle Button</span>
            <i class="ri-checkbox-blank-circle-line text-xl"></i>
        </button>

        <div class="scrollbar" data-simplebar>
            <ul class="menu" data-fc-type="accordion">
                <li class="menu-item">
                    <a href="{{ route('dashboard') }}" wire:navigate class="menu-link">
                        <span class="menu-icon">
                            <i class="ri-home-4-line"></i>
                        </span>
                        <span class="menu-text"> Dashboard </span>

                    </a>

                </li>

                <li class="menu-item">
                    <a href="apps-calendar" class="menu-link">
                        <span class="menu-icon">
                            <i class="ri-calendar-event-line"></i>
                        </span>
                        <span class="menu-text"> Card Check </span>
                    </a>
                </li>
                <li class="menu-item">
                    <a data-fc-type="collapse" class="menu-link">
                        <span class="menu-icon">
                            <i class="ri-share-line"></i>
                        </span>
                        <span class="menu-text"> Card Check </span>
                        <span class="menu-arrow"></span>
                    </a>

                    <ul class="sub-menu hidden">
                        <li class="menu-item">
                            <a href="{{ route('gate1') }}" wire:navigate class="menu-link">
                                <span class="menu-text">GATE 1 - Stripe</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="menu-item">
                    <a data-fc-type="collapse" class="menu-link">
                        <span class="menu-icon">
                            <i class="ri-money-dollar-box-line"></i>
                        </span>
                        <span class="menu-text"> Transaction</span>
                        <span class="menu-arrow"></span>
                    </a>

                    <ul class="sub-menu hidden">
                        <li class="menu-item">
                            <a href="{{ route('trans_depo') }}" wire:navigate class="menu-link">
                                <span class="menu-text">Deposit</span>
                            </a>
                        </li>

                        <li class="menu-item">
                            <a href="{{ route('trans_history') }}" wire:navigate class="menu-link">
                                <span class="menu-text">History</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="menu-title">Admin Area</li>
                <li class="menu-item">
                    <a href="{{ route('admin.users') }}" wire:navigate class="menu-link">
                        <span class="menu-icon">
                            <i class="ri-home-4-line"></i>
                        </span>
                        <span class="menu-text"> Users </span>

                    </a>

                </li>

                <li class="menu-item">
                    <a href="{{ route('admin.transaksi') }}" wire:navigate class="menu-link">
                        <span class="menu-icon">
                            <i class="ri-home-4-line"></i>
                        </span>
                        <span class="menu-text"> Transaction </span>

                    </a>

                </li>


                <li class="menu-item">
                    <a href="{{ route('admin.voucher') }}" wire:navigate class="menu-link">
                        <span class="menu-icon">
                            <i class="ri-home-4-line"></i>
                        </span>
                        <span class="menu-text"> Vouchers </span>

                    </a>

                </li>

                <li class="menu-item">
                    <a href="{{ route('admin.service') }}" wire:navigate class="menu-link">
                        <span class="menu-icon">
                            <i class="ri-home-4-line"></i>
                        </span>
                        <span class="menu-text"> Servies </span>

                    </a>

                </li>


            </ul>
        </div>
    </div>
    </div>
