@extends('layout.app')
@section('title',"BIEN-ADMIN")
@section('content')
<div class="content">



    <!-- Form Start -->
 <!-- Floating Label Form -->
 <form action="{{route('Location')}}" method="post">
    @csrf
 <div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Mise a jour de la Commissions</h6>

                <div class="form-floating mb-3">
                    <select class="form-select" id="floatingSelect"
                       name="client"  aria-label="Floating label select example">
                        <option selected>Choisir le client</option>
                        @foreach ($client as $item)
                        <option value="{{ $item->id_clients  }}">{{ $item->email  }}</option>
                    @endforeach
                    </select>
                    <label for="floatingSelect">Client</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" id="floatingSelect"
                       name="bien"  aria-label="Floating label select example">
                        <option selected>Choisir le bien</option>
                        @foreach ($bien as $item)
                            <option value="{{ $item->id_biens }}">{{ $item->name  }}</option>
                        @endforeach
                    </select>
                    <label for="floatingSelect">Bien</label>
                </div>
                <div class="form-floating mb-3">
                    <input required type="number" class="form-control" name="duree" id="floatingInput" >
                    <label for="floatingInput">Duree en mois</label>
                </div>
                <div class="form-floating mb-3">
                    <input required type="date" class="form-control" name="debut" id="floatingInput" >
                    <label for="floatingInput">Debut</label>
                </div>
                <div class="row col-md-12 mx-auto">
                    <button type="submit" class="btn btn-primary ">Louer</button>
                    </div>

            </div>
        </form>
        <form action="{{route('importcsv')}} " method="POST" enctype="multipart/form-data" >
            @csrf
        </div>
        <div class="col-sm-12 col-xl-6">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Importations Locations</h6>
                <div class="form-floating mb-3">
                    <div>
                        <label for="formFileLg" class="form-label">Photo</label>
                        <input class="form-control form-control-lg bg-dark" id="formFileLg" name="import" type="file" required  accept="csv.*" >
                    </div>

                </div>
                <div class="row col-md-12 mx-auto">
                    <button type="submit" name="btn" value="Location" class="btn btn-primary ">Importer</button>
                    </div>

            </div>
        </div>

    </div>
</div>
</form>

<!-- Floating Label Form End -->    <!-- Form End -->


    <!-- Footer Start -->

    <!-- Footer End -->
</div>

@endsection
