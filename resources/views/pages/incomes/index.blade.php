@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('index') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Entradas</li>
        </ol>
        @if (Session::has('message'))
        <div class="alert alert-success alert-dismissible fade show rounded" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span></button> <i class="fa fa-info mx-2"></i>
            <strong>{!! session('message') !!}</strong>
        </div>
        @endif

        <div class="row">
        	<div class="col-xl-6 offset-xl-3 col-sm-12 mb-3">
        		<ul class="list-group">
				  <li class="list-group-item d-flex justify-content-between align-items-center">
				    <a href="{{ route('incomes.create') }}" class="badge badge-success p-2 mx-auto">Agregar nueva Entrada</a>
				  </li>
				  <li class="list-group-item d-flex justify-content-between align-items-center">
				    Total de Entrada
                      <span class="badge badge-primary badge-pill">${{ $totalIncomes }}</span>
				  </li>
				</ul>
        	</div>
        </div>

        <table class="table table-striped mt-2">
                <thead class="bg-dark">
                    <th style="color:#fff;">Fecha</th>
                    <th style="color:#fff;">Descripción</th>
                    <th style="color:#fff;">Cantidad</th>
                    <th style="color:#fff;">Acción</th>
                </thead>
                <tbody>
                    @foreach($incomes as $income)
                        <tr>
                            <td>{{ $income->income_date }}</td>
                            <td>{{ $income->income_title }}</td>
                            <td>${{ $income->income_amount }}</td>
                            <td>
                                <a href="{{ route('incomes.edit',$income->id) }}" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
                                <a href="{{ route('incomes.delete',$income->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
@endsection
