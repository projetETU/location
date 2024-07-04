@extends('layout.app')
@section('title',"BIEN-ADMIN")
@section('content')
<div class="content">

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

    <form action="{{route('csvBien')}}" method="post" enctype="multipart/form-data">
        @csrf
     <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-6">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">IMporter les Bien</h6>
                    <div class="form-floating mb-3">
                        <div>
                            <label for="formFileLg" class="form-label">Photo</label>
                            <input class="form-control form-control-lg bg-dark" id="formFileLg" name="import" type="file" required  accept="csv.*" >
                        </div>
                    </div>
                    <div class="row col-md-12 mx-auto">
                        <button type="submit" name="btn" value="Bien" class="btn btn-primary ">Importer les Bien</button>
                        </div>

                </div>
            </div>
        </div>
    </div>
    </form>





    <!-- Form Start -->
 <!-- Floating Label Form -->
 <form action="{{route('ca')}}" method="post">
    @csrf
 <div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">CA ET GAIN</h6>

                {{-- <div class="form-floating mb-3">
                    <select class="form-select" id="floatingSelect"
                       name="year"  aria-label="Floating label select example">
                        <option selected>Choisir annee</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                    </select>
                    <label for="floatingSelect">Annee</label>
                </div> --}}


                <div class="form-floating mb-3">
                    {{-- <select class="form-select" id="floatingSelect" name="debut">

                    <option value="1">Janvier</option>
                    <option value="2">Février</option>
                    <option value="3">Mars</option>
                    <option value="4">Avril</option>
                    <option value="5">Mai</option>
                    <option value="6">Juin</option>
                    <option value="7">Juillet</option>
                    <option value="8">Août</option>
                    <option value="9">Septembre</option>
                    <option value="10">Octobre</option>
                    <option value="11">Novembre</option>
                    <option value="12">Décembre</option>
                    </select> --}}
                    <input type="date" name="debut" >
                    <label for="floatingSelect">Annee</label>
                </div>

                <div class="form-floating mb-3">
                    {{-- <select class="form-select" id="floatingSelect"
                       name="fin"  aria-label="Floating label select example">

                       <option value="1">Janvier</option>
                       <option value="2">Février</option>
                       <option value="3">Mars</option>
                       <option value="4">Avril</option>
                       <option value="5">Mai</option>
                       <option value="6">Juin</option>
                       <option value="7">Juillet</option>
                       <option value="8">Août</option>
                       <option value="9">Septembre</option>
                       <option value="10">Octobre</option>
                       <option value="11">Novembre</option>
                       <option value="12">Décembre</option>
                    </select> --}}
                    <input type="date" name="fin" >
                    <label for="floatingSelect">Annee</label>
                </div>


                <div class="row col-md-12 mx-auto">
                    <button type="submit" class="btn btn-primary ">Voir CA</button>
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
