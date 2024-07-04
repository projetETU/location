@extends('layout.app')
@section('title',"BIEN-ADMIN")
@section('content')
<div class="content">



    <!-- Form Start -->
 <!-- Floating Label Form -->
 <form action="{{route('updateCommission')}}" method="post">
    @csrf
 <div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Mise a jour de la Commissions</h6>
                <div class="form-floating mb-3">
                    <select class="form-select" id="floatingSelect"
                       name="id"  aria-label="Floating label select example">
                        <option selected>Choisir le type</option>
                        @foreach ($type_bien as $type_biens )
                        <option value="{{ $type_biens->id_type_biens }}">{{ $type_biens->name }}</option>
                        @endforeach
                    </select>
                    <label for="floatingSelect">Works with selects</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" name="commission" id="floatingInput" >
                    <label for="floatingInput">Commission (%)</label>
                </div>
                <div class="row col-md-12 mx-auto">
                    <button type="submit" class="btn btn-primary ">Confirmer</button>
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
