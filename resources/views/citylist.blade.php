@extends('layouts.app')
@section('pageTitle', 'City List')
@section('content')

<div class="container" style="border-radius: 15px;margin: 50px auto;box-shadow: 1px 1px 10px #00000066;">
    <h3 class="mb-3 text-center">City List <a href="/logout"><button class="btn"><i class="fa-solid fa-right-from-bracket"></i></button></a></h3>
    <table class="table table-bordered" id="city-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>City</th>
                <th>State</th>
                <th>Country</th>
            </tr>
        </thead>
    </table>
</div>

<script type="text/javascript">
    $(function() {
        $('#city-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: 'citylist',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'city', name: 'city' },
                { data: 'state', name: 'state' },
                { data: 'country', name: 'country' }
            ]
        });
    });
</script>

@endsection