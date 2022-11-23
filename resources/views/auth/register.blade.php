@extends('layouts.auth')

@section('content')
<section class="relative w-full h-full py-40 min-h-screen">
    <div class="container mx-auto px-4 h-full">
        <div class="flex content-center items-center justify-center h-full">
            <div class="w-full lg:w-6/12 px-4">
                <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-200 border-0">
                    <div class="rounded-t mb-0 px-6 py-6">
                        <div class="text-center mb-3">
                            <h6 class="text-blueGray-500 text-sm font-bold">
                                {{ __('global.register') }}
                            </h6>
                        </div>
                        <hr class="mt-6 border-b-1 border-blueGray-300" />
                    </div>
                    <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="name">
                                    {{ __('global.user_name') }}
                                </label>
                                <input id="name" name="name" type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full {{ $errors->has('name') ? ' ring ring-red-300' : '' }}" placeholder="{{ __('global.user_name') }}" required autofocus autocomplete="name" value="{{ old('name') }}" />
                                @error('name')
                                    <div class="text-red-500">
                                        <small>{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="email">
                                    {{ __('global.login_email') }}
                                </label>
                                <input id="email" name="email" type="email" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full {{ $errors->has('email') ? ' ring ring-red-300' : '' }}" placeholder="{{ __('global.login_email') }}" required autocomplete="email" value="{{ old('email') }}" />
                                @error('email')
                                    <div class="text-red-500">
                                        <small>{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="password">
                                    {{ __('global.login_password') }}
                                </label>
                                <input id="password" name="password" type="password" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full {{ $errors->has('password') ? ' ring ring-red-300' : '' }}" placeholder="{{ __('global.login_password') }}" required autocomplete="new-password" />
                                @error('password')
                                    <div class="text-red-500">
                                        <small>{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="password_confirmation">
                                    {{ __('global.confirm_password') }}
                                </label>
                                <input id="password_confirmation" name="password_confirmation" type="password" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" placeholder="{{ __('global.confirm_password') }}" required autocomplete="new-password" />
                            </div>
                            <div class="text-center mt-6">
                                <button class="bg-blueGray-800 text-white active:bg-blueGray-600 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full ease-linear transition-all duration-150">
                                    {{ __('global.register') }}
                                </button>
                            </div>
                        </form>

                        <div class="text-blueGray-400 text-center my-2 font-bold">
                            <small>{{ __('global.register_with') }}</small>
                        </div>

                        <div class="btn-wrapper text-center">
                            <a href="{{ route('auth.socialite', 'facebook') }}"
                                class="bg-white active:bg-blueGray-50 text-blueGray-700 font-normal px-4 py-2 rounded outline-none focus:outline-none mr-2 mb-1 uppercase shadow hover:shadow-md inline-flex items-center font-bold text-xs ease-linear transition-all duration-150"
                                type="button">
                                <svg class="w-5 h-5 mr-1" viewBox="0 0 13 24">
                                    <path
                                        d="M12.511.004L9.393 0C5.89 0 3.625 2.318 3.625 5.906V8.63H.49a.49.49 0 0 0-.49.489v3.947c0 .27.22.489.49.489h3.136v9.957a.49.49 0 0 0 .49.488h4.09a.49.49 0 0 0 .49-.488v-9.957h3.666a.49.49 0 0 0 .49-.489l.002-3.947a.494.494 0 0 0-.492-.489H8.697V6.321c0-1.109.266-1.673 1.713-1.673l2.101-.001A.488.488 0 0 0 13 4.158V.495a.49.49 0 0 0-.489-.491z"
                                        fill="#3b5998"/>
                                </svg>
                                Facebook
                            </a>

                            <a href="{{ route('auth.socialite', 'google') }}"
                                class="bg-white active:bg-blueGray-50 text-blueGray-700 font-normal px-4 py-2 rounded outline-none focus:outline-none mr-1 mb-1 uppercase shadow hover:shadow-md inline-flex items-center font-bold text-xs ease-linear transition-all duration-150"
                                type="button">
                                <svg class="w-5 h-5 mr-1" viewBox="0 0 40 40">
                                    <path
                                        d="M36.3425 16.7358H35V16.6667H20V23.3333H29.4192C28.045 27.2142 24.3525 30 20 30C14.4775 30 10 25.5225 10 20C10 14.4775 14.4775 9.99999 20 9.99999C22.5492 9.99999 24.8683 10.9617 26.6342 12.5325L31.3483 7.81833C28.3717 5.04416 24.39 3.33333 20 3.33333C10.7958 3.33333 3.33335 10.7958 3.33335 20C3.33335 29.2042 10.7958 36.6667 20 36.6667C29.2042 36.6667 36.6667 29.2042 36.6667 20C36.6667 18.8825 36.5517 17.7917 36.3425 16.7358Z"
                                        fill="#FFC107"/>
                                    <path
                                        d="M5.25497 12.2425L10.7308 16.2583C12.2125 12.59 15.8008 9.99999 20 9.99999C22.5491 9.99999 24.8683 10.9617 26.6341 12.5325L31.3483 7.81833C28.3716 5.04416 24.39 3.33333 20 3.33333C13.5983 3.33333 8.04663 6.94749 5.25497 12.2425Z"
                                        fill="#FF3D00"/>
                                    <path
                                        d="M20 36.6667C24.305 36.6667 28.2167 35.0192 31.1742 32.34L26.0159 27.975C24.3425 29.2425 22.2625 30 20 30C15.665 30 11.9842 27.2359 10.5975 23.3784L5.16254 27.5659C7.92087 32.9634 13.5225 36.6667 20 36.6667Z"
                                        fill="#4CAF50"/>
                                    <path
                                        d="M36.3425 16.7358H35V16.6667H20V23.3333H29.4192C28.7592 25.1975 27.56 26.805 26.0133 27.9758C26.0142 27.975 26.015 27.975 26.0158 27.9742L31.1742 32.3392C30.8092 32.6708 36.6667 28.3333 36.6667 20C36.6667 18.8825 36.5517 17.7917 36.3425 16.7358Z"
                                        fill="#1976D2"/>
                                </svg>
                                Google
                            </a>

                            <a href="{{ route('auth.socialite', 'github') }}"
                                class="bg-white active:bg-blueGray-50 text-blueGray-700 font-normal px-4 py-2 rounded outline-none focus:outline-none mr-1 mb-1 uppercase shadow hover:shadow-md inline-flex items-center font-bold text-xs ease-linear transition-all duration-150"
                                type="button">
                                <svg class="w-5 h-5 mr-1" viewBox="0 0 16 16" version="1.1" width="32"
                                     aria-hidden="true">
                                    <path fill-rule="evenodd"
                                          d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0016 8c0-4.42-3.58-8-8-8z"></path>
                                </svg>
                                Github
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
