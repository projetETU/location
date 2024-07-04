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
                <h6 class="mb-4">Liste locations</h6>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>

                                <th scope="col">ID</th>
                                <th scope="col">Biens</th>
                                <th scope="col">Client</th>
                                <th scope="col">mois</th>
                                <th scope="col">loyer</th>
                                <th scope="col">valeurCommission</th>
                                <th scope="col">Commission</th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach ($results as $item)

                                <tr style="background-color: {{$item->status}};">

                                    <td id="gain">{{$item->id_location }}</td>
                                    <td id="gain">{{$item->biens  }}</td>
                                    <td id="gain">{{$item->clients  }}</td>
                                    <td id="gain">{{$item->mois  }}</td>
                                    <td id="gain">{{$item->loyer  }}</td>
                                    <td id="gain">{{$item->valeurCommission  }}</td>
                                    <td id="gain">{{$item->commission  }}</td>



                                </tr>
                            </span>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
            <br>

</div>



@endsection
