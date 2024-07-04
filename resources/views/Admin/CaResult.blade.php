@extends('layout.app')
@section('title',"CA-ADMIN")
@section('content')
<div class="content">
    <!-- Form Start -->
    <!-- Floating Label Form -->
    <div class="container-fluid pt-4 px-4">
        <br>
        <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Gain</h6>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                               
                                <th scope="col">Chiffre D'affaire</th>
                                <th scope="col">Gain</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($results as $item)
                                <tr>

                                    <td id="gain">{{ number_format($item->caParMois  , 2) }} Ar</td>
                                    <td id="gain">{{ number_format($item->valeurCommission  , 2) }} Ar</td>
                                </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
            <br>
    <!-- Floating Label Form End -->
    <!-- Form End -->
</div>
<!-- Footer Start -->
<!-- Footer End -->

@endsection
