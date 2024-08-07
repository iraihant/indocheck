<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        try {
            $this->validate();

            $this->form->authenticate();

            $this->dispatch('Notifier',
                title: 'Success!',
                text: 'Successfully login!, you will be redirected to the dashboard page!',
                icon: 'success',
            );
            Session::regenerate();
    
            $this->redirectIntended(default: route('dashboard'));
        } catch (\Exception $e) {
            $this->dispatch('Notifier',
            title: 'Error!',
            text: $e->validator->errors()->all(),
            icon: 'error',);
        }
       

        
    }
}; ?>

<div>
    <!-- Session Status -->
    <div class="absolute inset-0 h-screen w-screen">
        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="100%" height="100%" preserveAspectRatio="none" viewBox="0 0 1920 1028">
            <g mask="url(&quot;#SvgjsMask1166&quot;)" fill="none">
                <use xlink:href="#SvgjsSymbol1173" x="0" y="0"></use>
                <use xlink:href="#SvgjsSymbol1173" x="0" y="720"></use>
                <use xlink:href="#SvgjsSymbol1173" x="720" y="0"></use>
                <use xlink:href="#SvgjsSymbol1173" x="720" y="720"></use>
                <use xlink:href="#SvgjsSymbol1173" x="1440" y="0"></use>
                <use xlink:href="#SvgjsSymbol1173" x="1440" y="720"></use>
            </g>
            <defs>
                <mask id="SvgjsMask1166">
                    <rect width="1920" height="1028" fill="#ffffff"></rect>
                </mask>
                <path d="M-1 0 a1 1 0 1 0 2 0 a1 1 0 1 0 -2 0z" id="SvgjsPath1171"></path>
                <path d="M-3 0 a3 3 0 1 0 6 0 a3 3 0 1 0 -6 0z" id="SvgjsPath1170"></path>
                <path d="M-5 0 a5 5 0 1 0 10 0 a5 5 0 1 0 -10 0z" id="SvgjsPath1169"></path>
                <path d="M2 -2 L-2 2z" id="SvgjsPath1168"></path>
                <path d="M6 -6 L-6 6z" id="SvgjsPath1167"></path>
                <path d="M30 -30 L-30 30z" id="SvgjsPath1172"></path>
            </defs>
            <symbol id="SvgjsSymbol1173">
                <use xlink:href="#SvgjsPath1167" x="30" y="30" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1168" x="30" y="90" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1169" x="30" y="150" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1170" x="30" y="210" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1169" x="30" y="270" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1167" x="30" y="330" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1170" x="30" y="390" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1167" x="30" y="450" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1167" x="30" y="510" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1169" x="30" y="570" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1167" x="30" y="630" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1169" x="30" y="690" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1168" x="90" y="30" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1167" x="90" y="90" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1167" x="90" y="150" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1169" x="90" y="210" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1169" x="90" y="270" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1168" x="90" y="330" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1169" x="90" y="390" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1169" x="90" y="450" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1170" x="90" y="510" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1169" x="90" y="570" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1167" x="90" y="630" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1167" x="90" y="690" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1169" x="150" y="30" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1169" x="150" y="90" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1167" x="150" y="150" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1170" x="150" y="210" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1167" x="150" y="270" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1167" x="150" y="330" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1169" x="150" y="390" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1171" x="150" y="450" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1169" x="150" y="510" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1168" x="150" y="570" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1168" x="150" y="630" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1167" x="150" y="690" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1169" x="210" y="30" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1169" x="210" y="90" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1169" x="210" y="150" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1168" x="210" y="210" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1167" x="210" y="270" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1169" x="210" y="330" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1169" x="210" y="390" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1169" x="210" y="450" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1169" x="210" y="510" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1167" x="210" y="570" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1169" x="210" y="630" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1171" x="210" y="690" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1168" x="270" y="30" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1170" x="270" y="90" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1171" x="270" y="150" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1167" x="270" y="210" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1169" x="270" y="270" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1169" x="270" y="330" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1169" x="270" y="390" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1167" x="270" y="450" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1169" x="270" y="510" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1169" x="270" y="570" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1172" x="270" y="630" class="stroke-primary/20" stroke-width="3"></use>
                <use xlink:href="#SvgjsPath1171" x="270" y="690" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1167" x="330" y="30" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1168" x="330" y="90" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1167" x="330" y="150" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1169" x="330" y="210" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1169" x="330" y="270" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1169" x="330" y="330" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1167" x="330" y="390" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1171" x="330" y="450" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1167" x="330" y="510" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1171" x="330" y="570" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1169" x="330" y="630" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1167" x="330" y="690" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1169" x="390" y="30" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1168" x="390" y="90" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1168" x="390" y="150" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1167" x="390" y="210" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1170" x="390" y="270" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1171" x="390" y="330" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1170" x="390" y="390" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1167" x="390" y="450" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1167" x="390" y="510" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1169" x="390" y="570" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1169" x="390" y="630" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1167" x="390" y="690" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1169" x="450" y="30" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1168" x="450" y="90" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1170" x="450" y="150" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1169" x="450" y="210" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1167" x="450" y="270" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1167" x="450" y="330" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1167" x="450" y="390" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1167" x="450" y="450" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1171" x="450" y="510" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1170" x="450" y="570" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1172" x="450" y="630" class="stroke-primary/20" stroke-width="3"></use>
                <use xlink:href="#SvgjsPath1168" x="450" y="690" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1167" x="510" y="30" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1169" x="510" y="90" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1172" x="510" y="150" class="stroke-primary/20" stroke-width="3"></use>
                <use xlink:href="#SvgjsPath1171" x="510" y="210" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1169" x="510" y="270" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1168" x="510" y="330" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1168" x="510" y="390" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1167" x="510" y="450" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1168" x="510" y="510" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1169" x="510" y="570" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1168" x="570" y="30" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1167" x="570" y="90" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1169" x="570" y="150" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1168" x="570" y="210" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1169" x="570" y="270" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1170" x="570" y="330" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1169" x="570" y="390" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1167" x="570" y="450" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1168" x="570" y="510" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1167" x="570" y="570" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1168" x="570" y="630" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1171" x="570" y="690" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1168" x="630" y="30" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1167" x="630" y="90" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1167" x="630" y="150" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1171" x="630" y="210" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1168" x="630" y="270" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1167" x="630" y="330" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1169" x="630" y="390" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1167" x="630" y="450" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1167" x="630" y="510" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1167" x="630" y="570" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1171" x="630" y="630" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1168" x="630" y="690" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1170" x="690" y="30" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1167" x="690" y="90" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1170" x="690" y="150" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1167" x="690" y="210" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1167" x="690" y="270" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1167" x="690" y="330" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1167" x="690" y="390" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1167" x="690" y="450" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1168" x="690" y="510" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1169" x="690" y="570" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1168" x="690" y="630" class="stroke-primary/20"></use>
                <use xlink:href="#SvgjsPath1171" x="690" y="690" class="stroke-primary/20"></use>
            </symbol>
        </svg>
    </div>

    <!-- Login Card -->
    <div class="relative flex flex-col items-center justify-center h-screen">
        <div class="flex justify-center">
            <div class="max-w-md px-4 mx-auto">
                <div class="card overflow-hidden">

                    <!-- Logo -->
                    <div class="p-9 bg-primary">
                        <a href="index.html" class="flex justify-center">
                            <img src="{{ asset('build/assets/images/logo.png') }}" alt="logo" class="h-6 block dark:hidden">
                            <img src="{{ asset('build/assets/images/logo-dark.png') }}" alt="logo" class="h-6 hidden dark:block">
                        </a>
                    </div>

                    <div class="p-9">
                        <div class="text-center mx-auto w-3/4">
                            <h4 class="text-dark/70 text-center text-lg font-bold dark:text-light/80 mb-2">Sign In</h4>
                            <p class="text-gray-400 mb-9">Enter your email address and password to access INDOCHECK panel.</p>
                        </div>
                        <x-input-error :messages="$errors->all()" class="mt-2" />
                        <form wire:submit="login">

                            <div class="mb-6 space-y-2">
                                <label for="name" class="font-semibold text-gray-500">Username</label>
                                <input class="form-input" type="text" wire:model="form.name" id="name" placeholder="Enter your username" name="name" required autofocus autocomplete="name">
                            </div>

                            <div class="mb-6 space-y-2">
                                <div class="flex justify-between items-center mb-2">
                                    <label for="password" class="font-semibold text-gray-500">Password</label>
                                    @if (Route::has('password.request'))
                                    <a href="auth-recoverpw.html" class="text-muted text-xs underline decoration-dashed underline-offset-4">Forgot your password?</a>
                                    @endif
                                </div>

                                <div class="flex items-center" x-data="{ show: false }">
                                    <input :type="show ? 'text' : 'password'" id="password" class="form-input rounded-e-none" placeholder="Enter your password" wire:model="form.password"  name="password"
                                    required autocomplete="current-password">
                                    <span class="px-3 py-1 border rounded-e-md -ms-px dark:border-white/10" @click="show = ! show"><i :class="show ? 'ri-eye-line' : 'ri-eye-off-line'"class="text-lg"></i></span>
                                </div>
                            </div>

                            <div class="mb-6">
                                <div class="flex items-center">
                                    <input type="checkbox" wire:model="form.remember" class="form-checkbox rounded text-primary" id="remember" name="remember" checked>
                                    <label class="ms-2" for="remember">Remember me</label>
                                </div>
                            </div>

                            <div class="text-center mb-6">
                                <button class="btn bg-primary text-white w-full" type="submit" wire:loading.attr="disabled"><div class="animate-spin w-5 h-5 border-[3px] border-current border-t-transparent text-info rounded-full" role="status" aria-label="loading" wire:loading>
                                    <span class="sr-only">Loading...</span>
                                </div> <span wire:loading.remove> Log In </span></button>
                            </div>

                        </form>
                        <div class="text-center my-4">
                            <p class="text-muted">Don't have an account? <a href="{{ route('register') }}" class="text-muted ms-1 link-offset-3 underline underline-offset-4" wire:navigate><b>Sign Up</b></a></p>
                        </div>
                    </div>
                    </div>
                </div>
                <!-- end card -->


        </div>
    </div>
</div>