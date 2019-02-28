<h1>{{ genero.genero }}</h1>

<table class="table table-striped">
	<thead>
		<tr>
			<th> Nombre </th>
			<th> Gusta a </th>
			<th> Me gusta</th>
		</tr>
	</thead>
{% for videojuego in videojuegos %}	
	<tbody>
		<tr>
			<td>{{ videojuego.videojuego }}</td>
			<td>{{ videojuego.likes }} Personas </td>
			<td>{{ link_to('generos/likes/' ~ videojuego.id, "Me gusta") }}</td>
		</tr>
	</tbody>
{% endfor %}
</table>


	{{ link_to('generos/add/' ~ genero.id, 'Agregar', 'class': 'btn btn-success') }}
	{{ link_to('generos/', 'Atrás', 'class': 'btn btn-warning') }}