@extends('layout.app')
@section('title',"CA-ADMIN")
@section('content')
<div class="content">
    <!-- Form Start -->
    <!-- Floating Label Form -->
    <form action="{{route('dLocations')}}" method="POST">
        @csrf
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
                                <th scope="col">REFF</th>
                                <th scope="col">Client</th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach ($results as $item)
                                <tr>

                                    <td id="gain">{{$item->id_location }}</td>
                                    <td id="gain">{{$item->reff  }}</td>
                                    <td id="gain">{{$item->client  }}</td>
                                    <td id="gain"><button name="locations" value="{{$item->id_location }}" type="submit" class="btn btn-primary">Details</button></td>
                                </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
            <br>

</div>
</form>


@endsection
