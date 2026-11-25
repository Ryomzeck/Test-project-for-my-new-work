<div class="offset"></div>

<div class="light-wrapper">
    <div class="container inner">

        <div class="headline text-center">
            <h2>Our Awesome Projects</h2>
            <p class="lead">Great design comes with understanding customer needs</p>
        </div>

        <div class="cbp-panel">

            {{-- Фильтры категорий --}}
            <div id="filters-container" class="cbp-filter-container text-center">

                <div data-filter="*" class="cbp-filter-item-active cbp-filter-item">
                    All
                </div>

                @foreach ($categories as $category)
                    <div data-filter=".category-{{ $category->id }}" class="cbp-filter-item">
                        {{ $category->name }}
                    </div>
                @endforeach

            </div>

            {{-- Сетка фотографий --}}
            <div id="grid-container" class="cbp">

                @foreach ($photos as $photo)

                    @php
                        $categoryClasses = $photo->categories
                            ->map(fn ($category) => 'category-' . $category->id)
                            ->implode(' ');
                    @endphp

                    <div class="cbp-item {{ $categoryClasses }}">

                        <a class="cbp-caption fancybox-media"
                           data-rel="portfolio"
                           href="{{ asset('storage/' . $photo->image) }}">

                            <div class="cbp-caption-defaultWrap">
                                <img
                                    src="{{ asset('storage/' . $photo->image) }}"
                                    alt="{{ $photo->title ?? 'Фотография' }}"
                                />
                            </div>

                            <div class="cbp-caption-activeWrap">
                                <div class="cbp-l-caption-alignCenter">
                                    <div class="cbp-l-caption-body">
                                        <div class="cbp-l-caption-title">
                                            View Larger
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/.cbp-caption-activeWrap -->

                        </a>

                        <div class="box text-center">

                            <h4 class="post-title">
                                {{ $photo->title }}
                            </h4>

                            <span class="meta category">

                                @forelse ($photo->categories as $category)

                                    <a href="#" class="link-effect">
                                        {{ $category->name }}
                                    </a>

                                    @if (!$loop->last), @endif

                                @empty
                                    Без категории
                                @endforelse

                            </span>

                        </div>
                        <!--/.box -->

                    </div>
                    <!--/.cbp-item -->

                @endforeach

            </div>
            <!--/.cbp -->

            <div class="divide30"></div>

        </div>
        <!--/.cbp-panel -->

    </div>
    <!-- /.container -->
</div>
<!-- /.light-wrapper -->
