<nav class="md:left-0 md:block md:fixed md:top-0 md:bottom-0 md:overflow-y-auto md:flex-row md:flex-nowrap md:overflow-hidden shadow-xl bg-white flex flex-wrap items-center justify-between relative md:w-64 z-10 py-4 px-6">
    <div class="md:flex-col md:items-stretch md:min-h-full md:flex-nowrap px-0 flex flex-wrap items-center justify-between w-full mx-auto">
        <button class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent" type="button" onclick="toggleNavbar('example-collapse-sidebar')">
            <i class="fas fa-bars"></i>
        </button>
        <a class="md:block text-left md:pb-2 text-blueGray-700 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0" href="{{ route('home') }}">
            {{ trans('panel.site_title') }}
        </a>
        <div class="md:flex md:flex-col md:items-stretch md:opacity-100 md:relative md:mt-4 md:shadow-none shadow absolute top-0 left-0 right-0 z-40 overflow-y-auto overflow-x-hidden h-auto items-center flex-1 rounded hidden" id="example-collapse-sidebar">
            <div class="md:min-w-full md:hidden block pb-4 mb-4 border-b border-solid border-blueGray-300">
                <div class="flex flex-wrap">
                    <div class="w-6/12">
                        <a class="md:block text-left md:pb-2 text-blueGray-700 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0" href="{{ route('home') }}">
                            {{ trans('panel.site_title') }}
                        </a>
                    </div>
                    <div class="w-6/12 flex justify-end">
                        <button type="button" class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent" onclick="toggleNavbar('example-collapse-sidebar')">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Divider -->
            <div class="flex md:hidden">
                @if(file_exists(app_path('Http/Livewire/LanguageSwitcher.php')))
                    <livewire:language-switcher />
                @endif
            </div>
            <hr class="mb-6 md:min-w-full" />
            <!-- Heading -->
            <h6 class="md:min-w-full text-blueGray-500 text-xs uppercase font-bold block pt-1 pb-4 no-underline">
                Main Navigation
            </h6>

            <ul class="md:flex-col md:min-w-full flex flex-col list-none">
                <li class="items-center">
                    <a href="{{ route('home') }}" class="sidebar-nav">
                        <i class="fas fa-link"></i>
                        Quizzes
                    </a>
                </li>

                <li class="items-center">
                    <a href="{{ route('leaderboard') }}" class="sidebar-nav">
                        <i class="fas fa-link"></i>
                        Leaderboard
                    </a>
                </li>
            </ul>

            <hr class="my-4 md:min-w-full">

            <h6 class="md:min-w-full text-blueGray-500 text-xs uppercase font-bold block pt-1 pb-4 no-underline">
                @guest new user menu @else registered user menu @endguest
            </h6>

            <ul class="md:flex-col md:min-w-full flex flex-col list-none">
                @guest
                    <li class="items-center">
                        <a href="{{ route("login") }}" class="sidebar-nav">
                            <i class="fas fa-link"></i>
                            {{ trans('global.login') }}
                        </a>
                    </li>

                    <li class="items-center">
                        <a href="{{ route("register") }}" class="sidebar-nav">
                            <i class="fas fa-link"></i>
                            {{ trans('global.register') }}
                        </a>
                    </li>
                @else
                    <li class="items-center">
                        <a href="{{ route('results.index') }}" class="sidebar-nav">
                            <i class="fas fa-link"></i>
                            My Results
                        </a>
                    </li>

                    @if(file_exists(app_path('Http/Controllers/Auth/UserProfileController.php')))
                        @can('auth_profile_edit')
                            <li class="items-center">
                                <a href="{{ route("profile.show") }}" class="{{ request()->is("profile") ? "sidebar-nav-active" : "sidebar-nav" }}">
                                    <i class="fa-fw c-sidebar-nav-icon fas fa-user-circle"></i>
                                    {{ trans('global.my_profile') }}
                                </a>
                            </li>
                        @endcan
                    @endif

                    <li class="items-center">
                        <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();" class="sidebar-nav">
                            <i class="fa-fw fas fa-sign-out-alt"></i>
                            {{ trans('global.logout') }}
                        </a>
                    </li>
                @endguest
            </ul>

            @auth
                @if(auth()->user()->is_admin)
                    <hr class="my-4 md:min-w-full">

                    <h6 class="md:min-w-full text-blueGray-500 text-xs uppercase font-bold block pt-1 pb-4 no-underline">
                        Admin menu
                    </h6>
                @endif

                <ul class="md:flex-col md:min-w-full flex flex-col list-none">
                    @can('user_management_access')
                        <li class="items-center">
                            <a class="has-sub {{ request()->is("permissions*")||request()->is("roles*")||request()->is("users*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                                <i class="fa-fw fas c-sidebar-nav-icon fa-users"></i>
                                {{ trans('cruds.userManagement.title') }}
                            </a>
                            <ul class="ml-4 subnav hidden">
                                @can('permission_access')
                                    <li class="items-center">
                                        <a class="{{ request()->is("permissions*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("permissions.index") }}">
                                            <i class="fa-fw c-sidebar-nav-icon fas fa-unlock-alt">
                                            </i>
                                            {{ trans('cruds.permission.title') }}
                                        </a>
                                    </li>
                                @endcan
                                @can('role_access')
                                    <li class="items-center">
                                        <a class="{{ request()->is("roles*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("roles.index") }}">
                                            <i class="fa-fw c-sidebar-nav-icon fas fa-briefcase">
                                            </i>
                                            {{ trans('cruds.role.title') }}
                                        </a>
                                    </li>
                                @endcan
                                @can('user_access')
                                    <li class="items-center">
                                        <a class="{{ request()->is("users*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("users.index") }}">
                                            <i class="fa-fw c-sidebar-nav-icon fas fa-user">
                                            </i>
                                            {{ trans('cruds.user.title') }}
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan
                    @can('topic_access')
                        <li class="items-center">
                            <a class="{{ request()->is("topics*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("topics.index") }}">
                                <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                </i>
                                {{ trans('cruds.topic.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('question_access')
                        <li class="items-center">
                            <a class="{{ request()->is("questions*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("questions.index") }}">
                                <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                </i>
                                {{ trans('cruds.question.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('quiz_access')
                        <li class="items-center">
                            <a class="{{ request()->is("quizzes*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("quizzes.index") }}">
                                <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                </i>
                                {{ trans('cruds.quiz.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('test_access')
                        <li class="items-center">
                            <a class="{{ request()->is("tests*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("tests.index") }}">
                                <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                </i>
                                {{ trans('cruds.test.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('comment_access')
                        <li class="items-center">
                            <a class="{{ request()->is("comments*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("comments.index") }}">
                                <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                </i>
                                {{ trans('cruds.comment.title') }}
                            </a>
                        </li>
                    @endcan

                </ul>
                @endauth
        </div>
    </div>
</nav>
