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
                            action="{{ route('slides.store') }}"
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
                                <label for="slideDescription" class="">Description:</label>

                                <input
                                    id="slideDescription"
                                    name="description"
                                    placeholder= "Description"
                                    class="form-control"
                                    type="text">


                            </div>

                            <div class="col-md-9">

                                <label for="slideTitle" class="">Title:</label>

                                    <input
                                    id="slideTitle"
                                    name="title"
                                    placeholder="Title"
                                    class="form-control"
                                    type="text">

                                </div>
                            </div>
                </div>
                <br>
                <br>
                                        <button type="submit" class="btn btn-primary">Load image</button>
                <br>
                <br>

                            </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
