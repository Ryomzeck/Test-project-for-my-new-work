                    <div class="row layout-top-spacing">
                        <div id="fuSingleFile" class="col-lg-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">

@if ($errors->any())
    <div>
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

                            <form method="POST"
                            action="{{ route('photos.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Single File Upload <br>JPG only</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <div class="custom-file-container" data-upload-id="myFirstImage">
                                        <label>Upload (Single File) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                        <label class="custom-file-container__custom-file" >
                                            <input type="file" name="image" class="custom-file-container__custom-file__custom-file-input" accept="image/*">
                                            <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                            <span class="custom-file-container__custom-file__custom-file-control"></span>
                                        </label>
                                        <div class="custom-file-container__image-preview"></div>
                <br>
                <br>


                <div class="row">
                            <div class="col-md-9">
                                <label for="photoTitle" class="">Title:</label>

                                <input
                                    id="PhotoTitle"
                                    name="title"
                                    placeholder= "Title"
                                    class="form-control"
                                    type="text">


                            </div>


                        <button type="submit" class="btn btn-primary">Create slide</button>
                            </div>
                            </form>
<br><br>@foreach ($photos as $photo)
             <div class="border rounded p-3 mb-4">
            <form method="POST" action="/photos/{{ $photo->id }}">
        @csrf
        @method('PUT')

                    <br>

            <br>


<br>
                <br>
            </p>

    <img
        src="{{ asset('storage/' . $photo->image) }}"
        width="300">

    <br><br>

            <button type="submit">
            Сохранить
        </button>

        <br><br>

        </form>


        <form action="{{ route('categories.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="name">Название категории</label>
        <input
            type="text"
            name="name"
            id="name"
            class="form-control"
            placeholder="Например, Пейзажи"
            required
        >
    </div>

            <button type="submit" class="btn btn-primary">
            Добавить категорию
            </button>
        </form>

                <br>
                <br>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
