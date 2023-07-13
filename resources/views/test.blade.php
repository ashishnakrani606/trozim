<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <link
        rel="preload"
        href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;700;800;900&display=swap"
        as="style"
        onload="this.onload=null;this.rel='stylesheet'"
    />
    <!-- Fonts -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="antialiased bg-[#fafafa] dark:bg-[#161616] text-gray-600 min-h-full flex flex-col application application-ltr overflow-x-hidden overflow-y-scroll ">
<div class="container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 pt-16 space-y-8 min-h-screen">

    {{-- Hero section --}}
    <div class="rounded-xl px-7 pt-2.5 lg:min-h-[530px] md:bg-[120%] md:rtl:bg-[0] xl:bg-[100%] xl:rtl:bg-[0] bg-white shadow-sm border border-gray-100 bg-contain bg-no-repeat  relative mx-auto dark:bg-zinc-800 dark:border-transparent lg:bg-[image:var(--projects-image-url)]" style="--projects-image-url: url({{ url('img/explore/projects/1.jpg') }});">
        <div class="lg:max-w-xl w-full py-12 rtl:pl-5">
            <div class="lg:max-w-xl w-full py-12">

                {{-- Headline --}}
                <h2 class="mb-5 lg:leading-[62px] text-2xl leading-[32px] sm:text-3xl md:text-4xl lg:text-6xl font-bold text-zinc-900 dark:text-white">
                    Otvoreni projekti
                </h2>

                {{-- Paragraph --}}
                <p class="text-sm leading-7 text-gray-500 dark:text-zinc-400">
                    Is tražite dostupne projekte i pošaljite svoju ponudu za onaj koji vas zanima.
                </p>

                {{-- Search form --}}
                <form class="flex items-center mt-8" action="{{ url('istrazi/projekte') }}" accept="GET">

                    {{-- Input --}}
                    <div class="relative w-full">
                        <div
                            class="absolute inset-y-0 ltr:left-0 rtl:right-0 flex items-center ltr:pl-3 rtl:pr-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                 viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                      clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input type="search" name="q"
                               class="bg-slate-100 border-none text-gray-900 text-sm font-medium rounded-md block w-full ltr:pl-10 rtl:pr-10 px-2.5 py-4 focus:outline-none focus:ring-0 dark:bg-zinc-700 dark:text-zinc-200 dark:placeholder:text-zinc-400 placeholder:font-normal"
                               placeholder="
{{--                                   {{ __('messages.t_type_something_to_search_in_projects') }}--}}
Type something to search in projects
                                   " required>
                    </div>

                    {{-- Button --}}
                    <button type="submit"
                            class="px-5 py-4 ltr:ml-2 rtl:mr-2 text-sm font-medium text-white bg-primary-600 rounded-md border-none hover:bg-primary-800 focus:ring-0 focus:outline-none">
                        Search
                    </button>

                </form>

                {{-- Popular categories --}}
                <div class="mt-5">
                    @php
                        $popular_categories = collect([
                            (object) [
                                'id' => 1,
                                'projects_count' => 5,
                                'slug' => "new slug",
                                'name' => 'Sports'
                            ],
                            (object) [
                                'id' => 1,
                                'projects_count' => 5,
                                'slug' => "new slug",
                                'name' => 'Bussiness'
                            ],
                            (object) [
                                'id' => 1,
                                'projects_count' => 5,
                                'slug' => "new slug",
                                'name' => 'Entertainment'
                            ],
                        ]);
                    @endphp
                    <div
                        class="hidden sm:flex items-center text-slate-500 dark:text-zinc-200 font-semibold text-sm whitespace-nowrap">
                        {{--                            @lang('messages.t_popular_colon')--}}
                        Popular:
                        <ul class="flex ltr:ml-3 rtl:mr-3">
                            @foreach ($popular_categories as $tag)
                                <li class="flex ltr:mr-3 rtl:ml-3 whitespace-nowrap">
                                    <a href="{{ url('istrazi/projekte', $tag->slug) }}"
                                       class="border-2 border-slate-400 rounded-[40px] hover:bg-slate-100 hover:text-slate-500 transition-all duration-200 px-3 py-0.5 text-xs dark:text-zinc-400 dark:border-zinc-700 dark:hover:bg-zinc-700 dark:hover:text-zinc-300">
                                        {{ $tag->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>
        </div>
        @php
            $categories = collect([
                (object) [
                'id' => 1,
                'projects_count' => 5,
                'slug' => "new slug",
                'name' => 'new name',
                'thumbnail' => 'https://dummyimage.com/600x400/000/fff'
                ],
                (object) [
                'id' => 2,
                'projects_count' => 3,
                'slug' => "new slug",
                'name' => 'new name',
                'thumbnail' => 'https://dummyimage.com/600x400/000/fff'
                ],
            ]);

            $projects = collect([
                (object) [
                'id' => 1,
                'projects_count' => 5,
                'highlighted' => false,
                'category' => [
                    'slug' => 'project-management',
                    'title' => 'Project Management'
                ],
                'slug' => 'stake-stock',
                'pid' => 'jfkl238jlsdjf09j09fj',
                'title' => 'Stake Stock',
                'total_bids' => 50,
                'budget_type' => 'Fiksno',
                'created_at' => '10 May, 2022',
                'description' => '
            Potrebna nam je stručna osoba koja će kvalitetno odraditi posao SEO onsite i offsite optimizacije. Radi se o malenom startupu te je budžet možda malo og...
        ',
                'skills' => [(object) [
                    'skill' => (object)[
                        'name' => 'HTML'
                    ]
                ]],
                'budget_min' => '54234',
                'budget_max' => '8138154',
                'status' => 'active',
                'urgent' => true
                ],
                (object) [
                'id' => 1,
                'projects_count' => 5,
                'highlighted' => true,
                'category' => [
                    'slug' => 'project-management',
                    'title' => 'Project Management'
                ],
                'slug' => 'stake-stock',
                'pid' => 'jfkl238jlsdjf09j09fj',
                'title' => 'Stake Stock',
                'total_bids' => 50,
                'budget_type' => 'Fiksno',
                'created_at' => '10 May, 2022',
                'description' => '
            Tražim content writera za web stranicu koji bi istražio i ključne riječi.

Potrebno je sve tekstove prilagoditi/poboljšati.
        ',
                'skills' => [
                    (object) [
                    'skill' => (object)[
                        'name' => 'HTML'
                    ]
                ]
                ],
                'budget_min' => '54234',
                'budget_max' => '8138154',
                'status' => 'active',
                'urgent' => true
                ],
            ],
        );
        @endphp
        {{-- Categories --}}
        @if ($categories?->count())
            <div class="w-full mt-8 lg:mt-20">

                {{-- Section head --}}
                <div class="block mb-8">
                    <h1 class="text-xl md:text-2xl text-black dark:text-white font-bold tracking-wide">
                        {{--                            @lang('messages.t_browse_by_categories')--}}
                        Kategorije
                    </h1>
                </div>

                {{-- Section body --}}
                <div class="hidden -mx-2.5" id="projects-categories-slick" wire:ignore>
                    @foreach ($categories as $category)
                        <a href="{{ url('istrazi/projekte', $category->slug) }}"
                           class="relative !h-72 rounded-xl !flex !flex-col overflow-hidden group mx-2.5">

                            {{-- Thumbnail --}}
                            <span aria-hidden="true" class="absolute inset-0">
							<img src="https://dummyimage.com/600x400/000/fff" alt="{{ $category->name }}"
                                 class="w-full h-full object-center object-cover opacity-70 group-hover:opacity-100">
						</span>

                            {{-- Black background --}}
                            <span aria-hidden="true"
                                  class="absolute inset-x-0 bottom-0 h-2/3 bg-gradient-to-t from-gray-800 opacity-90"></span>

                            {{-- Title --}}
                            <span class="relative mt-auto text-center text-xl font-bold text-white pb-6">
                                {{ ucfirst($category->name) }}
						</span>

                        </a>
                    @endforeach
                </div>

            </div>
        @endif

        {{-- Latest projects --}}
        @if ($projects->count())
            <div class="w-full mt-8 lg:mt-20">

                {{-- Section head --}}
                <div class="block mb-8">
                    <h1 class="text-xl md:text-2xl text-black dark:text-white font-bold tracking-wide">
                        {{--                            @lang('messages.t_latest_projects')--}}
                        Najnoviji
                    </h1>
                </div>

                {{-- Section body --}}
                <div class="grid grid-cols-1 gap-4 lg:gap-8 pb-8">
                    @foreach ($projects as $project)

                        {{--                            @livewire('main.cards.project', [ 'id' => $project->uid ], key('project-card-id-' . $project->uid))--}}

                        <div
                            class="flex flex-col rounded shadow bg-white dark:bg-zinc-800 overflow-hidden {{ $project->highlighted ? 'ltr:border-l-[6px] rtl:border-r-[6px] border-primary-600' : '' }}">
                            <div class="p-5 lg:p-6 grow w-full flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-6">
                                <div class="grow">

                                    {{-- Category --}}
                                    <a href="{{ url('istrazi/projekte', $project->category['slug']) }}"
                                       class="text-gray-500 dark:text-zinc-200 tracking-wide text-xs font-normal hover:underline hover:text-gray-600">
                                        {{ $project->category['title'] }}
                                    </a>

                                    {{-- Title --}}
                                    <a href="{{ url('projekt/' . $project->pid . '/' . $project->slug) }}"
                                       class="font-semibold md:text-lg text-zinc-900 dark:text-white hover:text-primary-600 dark:hover:text-primary-400 flex">
                                        {{ ucfirst(strtolower($project->title)) }}
                                    </a>

                                    {{-- Details --}}
                                    <div class="flex items-center mt-1">

                                        {{-- Bids --}}
                                        <div class="flex items-center">
                                            <svg class="w-5 h-5 text-gray-400 ltr:mr-2 rtl:ml-2" stroke="currentColor" fill="currentColor"
                                                 stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M11.707 2.293A.997.997 0 0 0 11 2H6a.997.997 0 0 0-.707.293l-3 3A.996.996 0 0 0 2 6v5c0 .266.105.52.293.707l10 10a.997.997 0 0 0 1.414 0l8-8a.999.999 0 0 0 0-1.414l-10-10zM13 19.586l-9-9V6.414L6.414 4h4.172l9 9L13 19.586z"></path>
                                                <circle cx="8.353" cy="8.353" r="1.647"></circle>
                                            </svg>
                                            <span class="text-sm text-gray-400 dark:text-gray-300 whitespace-nowrap">{{ $project->total_bids }} {{ strtolower(__('messages.t_bids')) }}</span>
                                        </div>

                                        {{-- Budget type --}}
                                        <div
                                            class="flex items-center ltr:ml-4 ltr:pl-4 ltr:border-l rtl:mr-4 rtl:pr-4 rtl:border-r border-gray-300 dark:border-zinc-600">
                                            <svg class="w-5 h-5 text-gray-400 ltr:mr-2 rtl:ml-2" stroke="currentColor" fill="currentColor"
                                                 stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M16 12h2v4h-2z"></path>
                                                <path
                                                    d="M20 7V5c0-1.103-.897-2-2-2H5C3.346 3 2 4.346 2 6v12c0 2.201 1.794 3 3 3h15c1.103 0 2-.897 2-2V9c0-1.103-.897-2-2-2zM5 5h13v2H5a1.001 1.001 0 0 1 0-2zm15 14H5.012C4.55 18.988 4 18.805 4 18V8.815c.314.113.647.185 1 .185h15v10z"></path>
                                            </svg>
                                            @if ($project->budget_type === 'fixed')
                                                <span class="text-sm text-gray-400 dark:text-gray-300 whitespace-nowrap">{{ __('messages.t_fixed_price') }}</span>
                                            @else
                                                <span class="text-sm text-gray-400 dark:text-gray-300 whitespace-nowrap">{{ __('messages.t_hourly_price') }}</span>
                                            @endif
                                        </div>

                                        {{-- Created at --}}
                                        <div
                                            class="flex items-center ltr:ml-4 ltr:pl-4 ltr:border-l rtl:mr-4 rtl:pr-4 rtl:border-r border-gray-300 dark:border-zinc-600">
                                            <svg class="w-5 h-5 text-gray-400 ltr:mr-2 rtl:ml-2" stroke="currentColor" fill="currentColor"
                                                 stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z"></path>
                                                <path d="M13 7h-2v5.414l3.293 3.293 1.414-1.414L13 11.586z"></path>
                                            </svg>
                                            <span class="text-sm text-gray-400 dark:text-gray-300 whitespace-nowrap">{{ $project->created_at }}</span>
                                        </div>

                                    </div>

                                    {{-- Description --}}
                                    <p class="leading-relaxed text-gray-500 dark:text-gray-400 mt-4 break-all">
                                        {{ htmlspecialchars_decode($project->description) }}
                                    </p>

                                    {{-- Skills --}}
                                    <div class="space-x-2 rtl:space-x-reverse mt-4">
                                        @foreach ($project->skills as $skill)
                                            <div
                                                class="font-medium inline-flex px-3 py-1.5 text-xs rounded-sm border border-transparent text-gray-600 bg-gray-100 hover:bg-gray-200 hover:text-gray-500 dark:bg-primary-600 dark:text-white dark:hover:border-primary-600 dark:hover:bg-primary-200 dark:hover:text-primary-800 transition-colors duration-300">
                                                {{ $skill->skill->name }}
                                            </div>
                                        @endforeach
                                    </div>

                                </div>

                                {{-- Right side --}}
                                <div class="flex-none grid items-center md:w-72 space-y-3 md:space-y-0 grid-cols-1">

                                    {{-- Budget --}}
                                    <div class="p-3 bg-gray-100 dark:bg-zinc-600 rounded-lg">

                                        <div class="flex items-center justify-center space-x-1 rtl:space-x-reverse">

                                            {{-- Min price --}}
                                            <span class="text-black dark:text-white font-semibold text-sm">
                        {{ $project->budget_min }}
                    </span>

                                            {{-- Divider --}}
                                            <span class="text-xs text-gray-400 px-1">/</span>

                                            {{-- Max price --}}
                                            <span class="text-black dark:text-white font-semibold text-sm">
                        {{ $project->budget_max }}
                    </span>

                                        </div>

                                    </div>

                                    {{-- Bid now --}}
                                    <div class="flex flex-col">
                                        <a href="{{ url('projekt/' . $project->pid . '/' . $project->slug) }}"
                                           class="inline-flex justify-center items-center border font-semibold focus:outline-none px-3 py-3 leading-6 rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none dark:bg-zinc-900 dark:border-zinc-700/40 dark:text-zinc-100 dark:hover:bg-zinc-800">
                                            @if ($project->status === 'active')
                                                <span class="text-sm">{{ __('messages.t_bid_now') }}</span>
                                            @else
                                                <span class="text-sm">{{ __('messages.t_view_project') }}</span>
                                            @endif
                                        </a>
                                    </div>

                                    {{-- Urgent / Completed --}}
                                    @if ($project->status === 'completed')
                                        <span class="flex items-center justify-center relative">
                    <span class="text-xs uppercase font-semibold tracking-widest text-green-500 dark:text-green-400">
                        {{ __('messages.t_project_completed') }}
                    </span>
                </span>
                                    @elseif ($project->urgent)
                                        <span class="flex items-center justify-center relative">
                    <span class="text-xs uppercase font-semibold tracking-widest text-red-500 animate-pulse">
                        {{ __('messages.t_urgent_project') }}
                    </span>
                </span>
                                    @endif

                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Section footer --}}
                {{--                    @if ($projects->hasPages())--}}
                {{--                        <hr class="my-10">--}}
                {{--                        <div class="px-4 py-5 sm:px-6 flex justify-center">--}}
                {{--                            {!! $projects->links('pagination::tailwind') !!}--}}
                {{--                        </div>--}}
                {{--                    @endif--}}

            </div>
        @endif

    </div>

    {{--        @push('scripts')--}}
    {{-- Slick Plugin --}}

    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    {{--            <script defer src="{{ asset('js/slick.min.js') }}"></script>--}}
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Init featured categories slick
            $('#projects-categories-slick').slick({
                dots: false,
                autoplay: true,
                infinite: true,
                speed: 300,
                slidesToShow: 6,
                slidesToScroll: 1,
                arrows: false,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 4,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 800,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1
                        }
                    }
                ]
            });
            $('#projects-categories-slick').removeClass('hidden');
        });
    </script>
    {{--        @endpush--}}

    {{--        @push('styles')--}}
    {{-- Slick Plugin --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.css">
{{--    @endpush--}}
</body>
</html>
