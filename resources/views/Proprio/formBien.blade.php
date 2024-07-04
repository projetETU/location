@extends('Proprio.app')
@section('title',"BIEN-PROPRIO")
@section('content')
<div class="content">




 <form action="{{route('createBien')}}" method="post" enctype="multipart/form-data">
@csrf
 <div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Nouveau Bien</h6>
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>

            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            {{ $error }}
                        @endforeach
                    </ul>
                </div>
            @endif

                <div class="form-floating mb-3">
                    <input required type="text" class="form-control" name="name" id="floatingInput" >
                    <label for="floatingInput">Nom du bien </label>
                </div>

                <div class="form-floating mb-3">
                    <select class="form-select" id="floatingSelect"
                       name="type"  aria-label="Floating label select example">
                        <option selected>Choisir le type</option>
                        @foreach ($type_bien as $type_biens )
                        <option value="{{ $type_biens->id_type_biens }}">{{ $type_biens->name }}</option>
                        @endforeach
                    </select>
                    <label for="floatingSelect">Works with selects</label>
                </div>

                <div class="form-floating mb-3">
                    <select class="form-select" id="floatingSelect"
                       name="region"  aria-label="Floating label select example">
                        <option selected>Choisir la region</option>
                        @foreach ($region as $regions )
                        <option value="{{ $regions->id_region }}">{{ $regions->name }}</option>
                        @endforeach
                    </select>
                    <label for="floatingSelect">Works with selects</label>
                </div>
                <div class="form-floating mb-3">
                    <input required type="number" class="form-control" name="loyer" id="floatingInput" >
                    <label for="floatingInput">Loyer / mois </label>
                </div>
                <div class="form-floating mb-3">
                    <input required type="text" class="form-control" name="Reff" id="floatingInput" >
                    <label for="floatingInput">Reff </label>
                </div>
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here"
                        id="floatingTextarea" style="height: 150px;" name="desc"></textarea>
                    <label for="floatingTextarea">Comments</label>
                </div>
                <br>
                <div class="form-floating mb-3">
                    <div>
                        <label for="formFileLg" class="form-label">Photo</label>
                        <input class="form-control form-control-lg bg-dark" id="formFileLg" name="photo[]" type="file" required  multiple>
                    </div>

                </div>




                <div class="row col-md-12 mx-auto">
                <button type="submit" class="btn btn-primary ">Publier</button>
                </div>

            </div>
        </div>
    </div>
</div>

</form>


</div>

@endsection
