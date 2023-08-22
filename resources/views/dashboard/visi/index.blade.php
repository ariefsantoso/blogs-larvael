@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Visi Misi</h1>
</div>
@if (session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
    {{ session('success') }}
</div>
@endif


<div class="table-responsive col-lg-8">
    
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col"></th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($visis as $visi)

            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $visi->title }}</td>
                <td>
                    <a href="/dashboard/visi/{{ $visi->slug }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                   

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection