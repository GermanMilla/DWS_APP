@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('index') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Ver Resumen</li>
        </ol>
        <div class="row">
        	<div class="col-xl-6 offset-xl-3 col-sm-12 mb-3">
        		<ul class="list-group">
				  <li class="list-group-item d-flex bg-dark text-white justify-content-center align-items-center">
				    Total de Datos
				  </li>
				  <li class="list-group-item d-flex justify-content-between align-items-center">
				    Total Ingresos
				    <span class="badge badge-success badge-pill">${{ $total_income }}</span>
				  </li>
				  <li class="list-group-item d-flex justify-content-between align-items-center">
				    Total Gastos
				    <span class="badge badge-danger badge-pill">${{ $total_expense }}</span>
				  </li>
				  <li class="list-group-item d-flex justify-content-between align-items-center">
				    Balance
				    <span class="badge badge-primary badge-pill">${{ $balance }}</span>
				  </li>
				</ul>
        	</div>
        </div>

        <table class="table table-striped mt-2">
                <thead class="bg-dark">                                     
                                    <th style="color:#fff;">Fecha</th>
                                    <th style="color:#fff;">Descripción</th>
                                    <th style="color:#fff;">Cantidad</th>
                                    <th style="color:#fff;">Tipo</th>
                                                                   
                </thead>
                <tbody>
                    @foreach($results as $result)
                        <tr>
                            <td>{{($result['type'] == 'income')? $result['created_at']:$result['created_at']}}</td>
                            <td>{{($result['type'] == 'income')? $result['income_title']:$result['expense_title']}}</td>
                            <td>{{($result['type'] == 'income')? '$'.$result['income_amount']: '$'.$result['expense_amount']}}</td>

                            @if($result['type'] == 'income')
                                <td>
                                    <span class="bagde badge-success badge-pill">Ingreso</span>
                                </td>

                            @else
                                <td>
                                    <span class="bagde badge-danger badge-pill">Gasto</span>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
        </table>
    </div>
@endsection
