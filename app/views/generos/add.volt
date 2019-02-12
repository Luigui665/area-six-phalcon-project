<h1> Agregar Videojuego </h1>

<form method="post">
	<table>
		<tr>
			<td> Videojuego </td>
			<td> {{ text_field('videojuego') }} </td>
		</tr>
		<tr>
			<td> Plataforma </td>
			<td> {{ text_field('plataforma') }} </td>
		</tr>
		<tr>
			<td> Sinopsis </td>
			<td> {{ text_field('sinopsis') }} </td>
		</tr>
		<tr>
			<td> Precio unitario </td>
			<td> {{ text_field('precio') }} </td>
		</tr>
		<tr>
			<td> Existencias </td>
			<td> {{ text_field('existencias') }} </td>
		</tr>
		<tr>
			<td> Categoria </td>
			<td> {{ text_field('categoria') }} </td>
		</tr>
		<tr>
			<td> {{ submit_button('Guardar') }}</td>	
			<td> 
				<button>
				{{ link_to('generos/', 'Cancelar') }}
				</button>
			</td>
		</tr>
	</table>
</form>