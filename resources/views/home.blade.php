@extends('welcome')
@section('content')
    <div class="w-full">
        {{-- Hero section --}}
        <div class="rounded-xl px-3 md:px-7 pt-2.5 lg:min-h-[530px] md:bg-[120%] md:rtl:bg-[0] xl:bg-[100%] xl:rtl:bg-[0] bg-white shadow-sm border border-gray-100 bg-contain bg-no-repeat  relative mx-auto dark:bg-zinc-800 dark:border-transparent lg:bg-[image:var(--projects-image-url)]" style="--projects-image-url: url({{ url('img/explore/projects/1.jpg') }});">
            <div class="w-full rtl:pl-5">
                <div class="w-full py-6 md:py-12">

                {{-- Headline --}}
                <h2 class="mb-5 lg:leading-[62px] text-2xl leading-[32px] sm:text-3xl md:text-4xl lg:text-6xl font-bold text-zinc-900 dark:text-white">
                    @lang('messages.t_clear_scope')
                </h2>

                {{-- Paragraph --}}
                <p class="text-sm leading-7 text-gray-500 dark:text-zinc-400">
                    @lang('messages.t_complete_ur_most_pressing_work_with_project_catatlog')
                </p>

                    {{-- Search form --}}
                    <form class="flex md:flex-row flex-col items-end md:items-center mt-8" action="{{ url('istrazi/projekte') }}" accept="GET">

                        {{-- Input --}}
                        <div class="relative w-full md:max-w-[60%] xl:max-w-lg">
                            <div
                                class="absolute inset-y-0 ltr:left-0 rtl:right-0 flex items-center ltr:pl-3 rtl:pr-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                     viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                          clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input type="search" name="q" wire:model.defer="q"
                                   class="bg-slate-100 border-none text-gray-900 text-sm font-medium rounded-md block w-full ltr:pl-10 rtl:pr-10 px-2.5 md:pr-2.5 pr-10 py-4 focus:outline-none focus:ring-0 dark:bg-zinc-700 dark:text-zinc-200 dark:placeholder:text-zinc-400 placeholder:font-normal"
                                   placeholder="{{ __('messages.t_type_something_to_search_in_projects') }}" required>

                            {{-- Button --}}
                            <button type="submit"
                                    class="md:hidden block absolute text-primary-600 rtl:left-0 px-2 ltr:right-0 inset-y-0">
                                <svg width="23" height="17" viewBox="0 0 23 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.2803 10.4825L6.79777 16L21.5362 1.26154" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </button>

                        </div>

                    {{-- Button --}}
                    <button type="submit"
                            class="px-5 py-4 ltr:ml-2 rtl:mr-2 text-sm font-medium text-white bg-primary-600 rounded-md border-none hover:bg-primary-800 focus:ring-0 focus:outline-none">
                        @lang('messages.t_search')
                    </button>

                </form>

                    {{-- Popular categories --}}
                    <div class="mt-5">
                        @php
                        $popular_categories = App\Models\ProjectCategory::whereHas('projects')->withCount('projects')->take(5)->orderBy('projects_count')->get();
                        @endphp
                        <div
                            class="hidden sm:flex items-center text-slate-500 dark:text-zinc-200 font-semibold text-sm whitespace-nowrap">
                            @lang('messages.t_popular_colon')
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

            {{-- Categories --}}
            @if ($categories?->count())
                <div class="w-full mt-8 lg:mt-12">

                {{-- Section head --}}
                <div class="block mb-8">
                    <h1 class="text-xl md:text-2xl text-black dark:text-white font-bold tracking-wide">
                        @lang('messages.t_browse_by_categories')
                    </h1>
                </div>

                    {{-- Section body --}}
                    <div class="hidden -mx-2.5" id="projects-categories-slick" wire:ignore>
                        @foreach ($categories as $category)
                            <a href="{{ url('istrazi/projekte', $category->slug) }}"
                               class="relative !h-36 sm:!h-48 md!h-56 lg:!h-72 rounded-xl !flex !flex-col overflow-hidden group mx-2.5">

                                {{-- Thumbnail --}}
                                <span aria-hidden="true" class="absolute inset-0">
							<img src="{{ src($category->thumbnail) }}" alt="{{ $category->name }}"
                                 class="w-full h-full object-center object-cover opacity-70 group-hover:opacity-100">
						</span>

                            {{-- Black background --}}
                            <span aria-hidden="true"
                                  class="absolute inset-x-0 bottom-0 h-2/3 bg-gradient-to-t from-gray-800 opacity-90"></span>

                                {{-- Title --}}
                                <span class="relative mt-auto text-center lg:text-xl md:text-lg sm:text-md text-base font-normal md:font-medium lg:font-bold text-white pb-4 md:pb-6">
                                {{ ucfirst($category->name) }}
						</span>

                        </a>
                    @endforeach
                </div>

            </div>
        @endif

        {{-- Latest projects --}}
        @if ($projects?->count())
            <div class="w-full mt-8 lg:mt-20">

                {{-- Section head --}}
                <div class="block mb-8">
                    <h1 class="text-xl md:text-2xl text-black dark:text-white font-bold tracking-wide">
                        @lang('messages.t_latest_projects')
                    </h1>
                </div>

                {{-- Section body --}}
                <div class="grid grid-cols-1 gap-4 lg:gap-8 pb-8">
                    @foreach ($projects as $project)

                        @livewire('main.cards.project', [ 'id' => $project->uid ], key('project-card-id-' . $project->uid))

                    @endforeach
                </div>

                {{-- Section footer --}}
                @if ($projects->hasPages())
                    <hr class="my-10">
                    <div class="px-4 py-5 sm:px-6 flex justify-center">
                        {!! $projects->links('pagination::tailwind') !!}
                    </div>
                @endif

            </div>
        @endif

    </div>

        @push('scripts')
            {{-- Slick Plugin --}}
                    <script defer src="{{ asset('js/slick.min.js') }}"></script>
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
                                    slidesToScroll: 1,
                                    customPadding: '5px',
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
        @endpush

    @push('styles')
        {{-- Slick Plugin --}}
        <link rel="stylesheet" type="text/css" href="{{ asset('css/slick.css') }}">
    @endpush

@endsection
