<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component
{
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/');
    }
}; ?>

<div>
    <header class="app-header flex items-center px-4 gap-3.5">

        <!-- App Logo -->
        <a href="/" class="logo-box">
            <!-- Light Logo -->
            <div class="logo-light">
                <img src="{{ asset('images/logo.png') }}" class="logo-lg h-[22px]" id="logo-light"  alt="Light logo">
                <img src="{{ asset('images/logo-sm.png') }}" class="logo-sm h-[22px]" id="logo-light-sm" alt="Small logo">
            </div>

            <!-- Dark Logo -->
            <div class="logo-dark">
                <img src="{{ asset('images/logo-dark.png') }}" class="logo-lg h-[22px]" id alt="Dark logo">
                <img src="{{ asset('images/logo-sm.png') }}" class="logo-sm h-[22px]" id="logo-light-sm" alt="Small logo">
            </div>
        </a>

        <!-- Sidenav Menu Toggle Button -->
        <button id="button-toggle-menu" class="nav-link p-2" >
            <span class="sr-only">Menu Toggle Button</span>
            <span class="flex items-center justify-center">
                <i class="ri-menu-2-fill text-2xl"></i>
            </span>
        </button>
        <div class="relative ms-auto">
            <span class="btn bg-info/95 text-white">Balance : {{  Auth::user()->balance }}</span>
            {{-- <button id="light-dark-mode" type="button" class="nav-link p-2">
                <span class="sr-only">Light/Dark Mode</span>
                <span class="flex items-center justify-center">
                    <i class="ri-moon-line text-2xl block dark:hidden"></i>
                    <i class="ri-sun-line text-2xl hidden dark:block"></i>
                </span>
            </button> --}}
        </div>
        <!-- Light/Dark Toggle Button -->
        <div class="md:flex hidden">
            <button id="light-dark-mode" type="button" class="nav-link p-2">
                <span class="sr-only">Light/Dark Mode</span>
                <span class="flex items-center justify-center">
                    <i class="ri-moon-line text-2xl block dark:hidden"></i>
                    <i class="ri-sun-line text-2xl hidden dark:block"></i>
                </span>
            </button>
        </div>

        <!-- Fullscreen Toggle Button -->
        <div class="md:flex hidden">
            <button data-toggle="fullscreen" type="button" class="nav-link p-2">
                <span class="sr-only">Fullscreen Mode</span>
                <span class="flex items-center justify-center">
                    <i class="ri-fullscreen-line text-2xl"></i>
                </span>
            </button>
        </div>

        <!-- Profile Dropdown Button -->
        <div class="relative">
            <button data-fc-type="dropdown" data-fc-placement="bottom-end" type="button" class="nav-link flex items-center gap-2.5 px-3 bg-black/5 border-x border-black/10">
                <img src="{{ asset('images/users/avatar-1.jpg') }}" alt="user-image" class="rounded-full h-8">
                <span class="md:flex flex-col gap-0.5 text-start hidden">
                    <h5 class="text-sm" x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name" x-on:profile-updated.window="name = $event.detail.name"></h5>
                    <span class="text-xs">Member</span>
                </span>
            </button>

            <div class="fc-dropdown fc-dropdown-open:opacity-100 hidden opacity-0 w-44 z-50 transition-all duration-300 bg-white shadow-lg border rounded-lg py-2 border-gray-200 dark:border-gray-700 dark:bg-gray-800">
                <!-- item-->
                <h6 class="flex items-center py-2 px-3 text-xs text-gray-800 dark:text-gray-400">Welcome !</h6>


                <a href="pages-profile" class="flex items-center gap-2 py-1.5 px-4 text-sm text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300">
                    <i class="ri-settings-4-line text-lg align-middle"></i>
                    <span>Settings</span>
                </a>

                <!-- item-->
                <button wire:click="logout" class="flex w-full items-center gap-2 py-1.5 px-4 text-sm text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300">
                    <i class="ri-logout-box-line text-lg align-middle"></i>
                    <span>Logout</span>
                </button>
            </div>
        </div>
    </header>
    </div>
