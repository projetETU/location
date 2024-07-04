@extends('layout.app')
@section('title',"BIEN-ADMIN")
@section('content')
<div class="content">



    <!-- Form Start -->
 <!-- Floating Label Form -->
 <form action="{{route('createTypeBien')}}" method="post">
@csrf
 <div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Form type de Bien</h6>
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
                    <label for="floatingInput">Nom du type </label>
                </div>
                <div class="form-floating mb-3">
                    <input required type="text" class="form-control" name="commission" id="floatingInput" >
                    <label for="floatingInput">Commission (%)</label>
                </div>
                <div class="row col-md-12 mx-auto">
                <button type="submit" class="btn btn-primary ">Confirmer</button>
                </div>

            </div>
        </div>
    </div>
</form>
</div>











</div>
</div>

@endsection
