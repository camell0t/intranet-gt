<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Intranet - Grupo G Trigueiro</title>

    <!-- Styles -->
    <link href="/css/bootstrap.css" rel="stylesheet">
    <script src="/js/jquery.js"></script> 
    <script src="/js/bootstrap.min.js"></script>
<body style="font-size: 10px;">
<div class="row">
	<div class="col-xs-12">
		<div class="col-xs-6 col-xs-offset-3 text-center">
			<h4>Relatório de ocorrências de ponto</h4>
		</div>
		<div class="col-xs-3 text-center">
			<img src="/img/logo.png" class="img-responsive pull-left" style="max-width: 70%;">
		</div>
	</div>
	<div class="col-xs-12">
		<div class="col-xs-4">
			<label>Funcionário: {{$nome}} {{$sobrenome}}</label><br>
			<label>CPF: {{ $ocorrencias['0']->user->cpf }} </label>
		</div>
		<div class="col-xs-4">
			<label for="">Período: {{$dataini}} à {{ $datafim }}</label><br>
		</div>
		<div class="col-xs-4">
			<label for="">Empresa: {{ $ocorrencias['0']->user->empresa }} </label><br>
			<label for="">CNPJ: {{ $cnpj }}</label>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-12">
		<table class="table table-bordered table-hovered">
			<thead>
				<tr>
					<th>Data</th>
					<th>Período</th>
					<th>Horário</th>
					<th>Justificativa</th>
					<th>Complemento</th>
					<th>Situação</th>
					<th>Observação</th>
				</tr>
			</thead>
			<tbody>
				@foreach($ocorrencias as $ocorrencia)
				<tr>
					<td>{{ $ocorrencia->data }}</td>
					<td>{{ $ocorrencia->periodo }}</td>
					<td>{{ $ocorrencia->horario }}</td>
					<td>{{ $ocorrencia->justificativa }}</td>
					<td>{{ $ocorrencia->complemento }}</td>
					<td>{{ $ocorrencia->situacao }}</td>
					<td>{{ $ocorrencia->obs }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		<div class="col-xs-4">
			<p class="text-center"><b>Supervisor: </b>______________________________</p>
		</div>
		<div class="col-xs-4">
			<p class="text-center"><b>Funcionário:______________________________</b></p>
		</div>
		<div class="col-xs-4">
			<p class="text-center"><b>Data:</b>__________/__________/__________</p>
		</div>
	</div>
</div>
</body>
</html>