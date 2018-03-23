<!DOCTYPE html>
<html>
<head>
	<title>Nuevo Pedido</title>
</head>
<body>
<p>Se ha realizado un nuevo pedido!</p>
<p>Estos son los datos del cliente que realizo el pedido:</p>
<ul>
	<li>
		<strong>Nombre:</strong>
		{{ $user->name }}
	</li>
	<li>
		<strong>E-mail:</strong>
		{{ $user->email }}
	</li>
	<li>
		<strong>Fecha del Pedido:</strong>
		{{ $cart->order_date }}
	</li>
</ul>
<hr>
<p>Detalles del Pedido Realizado</p>
<ul>
	@foreach ($cart->details as $detail)
	<li>
		{{ $detail->package->name }}
		($ {{ $detail->package->price }})
	</li>
	@endforeach
</ul>
<p>
	<strong>Importe a pagar: </strong> {{ $cart->price }}
</p>
<hr>
<p>
	<a href="{{ url('/admin/orders/'.$cart->id) }}">Haz click aquí</a>
	para ver mas informacion sobre el pedido.
</p>
</body>
</html>