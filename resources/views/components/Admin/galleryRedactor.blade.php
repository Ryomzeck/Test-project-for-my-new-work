
<div class="row layout-top-spacing">
    <div id="fuSingleFile" class="col-lg-12 layout-spacing">
        <div class="statbox widget box box-shadow">

            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>Загрузка фотографии</h4>
                    </div>
                </div>
            </div>

            <div class="widget-content widget-content-area">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                {{-- Загрузка фотографии --}}
                <form method="POST"
                      action="{{ route('photos.store') }}"
                      enctype="multipart/form-data">
                    @csrf

                    <div class="custom-file-container"
                         data-upload-id="myFirstImage">

                        <label>
                            Выбрать фотографию
                            <a href="javascript:void(0)"
                               class="custom-file-container__image-clear"
                               title="Очистить">x</a>
                        </label>

                        <label class="custom-file-container__custom-file">
                            <input type="file"
                                   name="image"
                                   class="custom-file-container__custom-file__custom-file-input"
                                   accept="image/*"
                                   required>

                            <input type="hidden"
                                   name="MAX_FILE_SIZE"
                                   value="10485760">

                            <span class="custom-file-container__custom-file__custom-file-control"></span>
                        </label>

                        <div class="custom-file-container__image-preview"></div>
                    </div>

                    <br>

                    <div class="form-group">
                        <label for="photoTitle">Название фотографии</label>
                        <input type="text"
                               id="photoTitle"
                               name="title"
                               placeholder="Название"
                               class="form-control">
                    </div>
                    <div class="form-group">
                    <label>Категории фотографии</label>

                    @foreach ($categories as $category)
                     <div class="form-check">
                    <input type="checkbox"
                   name="categories[]"
                   value="{{ $category->id }}"
                   id="category{{ $category->id }}"
                   class="form-check-input">

                  <label class="form-check-label"
                   for="category{{ $category->id }}">
                {{ $category->name }}
                </label>
                </div>
    @endforeach
</div>
                    <br>

                    <button type="submit" class="btn btn-primary">
                        Загрузить фотографию
                    </button>
                </form>

                <hr>

                {{-- Список фотографий --}}
                <h4>Загруженные фотографии</h4>


@foreach ($photos as $photo)
    <div class="border rounded p-3 mb-4">

        <form method="POST"
              action="{{ route('photos.update', $photo->id) }}">

            @csrf
            @method('PUT')

            <img src="{{ asset('storage/' . $photo->image) }}"
                 width="300"
                 alt="{{ $photo->title }}">

            <p>{{ $photo->title }}</p>

            <hr>

            <h5>Категории фотографии</h5>

            @foreach ($categories as $category)
                <div class="form-check">

                    <input type="checkbox"
                           name="categories[]"
                           value="{{ $category->id }}"
                           id="photo{{ $photo->id }}category{{ $category->id }}"
                           class="form-check-input"
                           {{ $photo->categories->contains('id', $category->id) ? 'checked' : '' }}>

                    <label class="form-check-label"
                           for="photo{{ $photo->id }}category{{ $category->id }}">
                        {{ $category->name }}
                    </label>

                </div>
            @endforeach

            <br>

            <button type="submit" class="btn btn-primary">
                Сохранить категории
            </button>

        </form>

                <form method="POST"
              action="{{ route('photos.destroy', $photo->id) }}"
              onsubmit="return confirm('Точно удалить эту фотографию?')">

            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger">
                Удалить фотографию
            </button>

        </form>

    </div>
@endforeach


                <hr>
                <hr>

<h4>Существующие категории</h4>

@foreach ($categories as $category)

    <div class="d-flex align-items-center justify-content-between border rounded p-3 mb-2">

        <span>{{ $category->name }}</span>

        <form method="POST"
              action="{{ route('categories.destroy', $category->id) }}"
              onsubmit="return confirm('Удалить категорию {{ $category->name }}?')">

            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger">
                Удалить
            </button>

        </form>

    </div>

@endforeach
                {{-- Добавление категории --}}
                <h4>Добавить категорию</h4>

                <form action="{{ route('categories.store') }}"
                      method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="name">Название категории</label>

                        <input type="text"
                               name="name"
                               id="name"
                               class="form-control"
                               placeholder="Например, Пейзажи"
                               required>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Добавить категорию
                    </button>
                </form>

            </div>
        </div>
    </div>
</div>
