<h1> Agregar Videojuego </h1>

<form method="post", enctype = "multipart/form-data">
	<table>
		<tr>
			<td> Videojuego </td>
			<td> {{ text_field('videojuego', 'class': 'form-control') }} </td>
		</tr>
		<tr>
			<td> Plataforma </td>
			<td>			
				<?php $plataformas = plataformas::find(); ?>
				{# Lista contenedora de las plataformas #}
				{{ select('plataforma', plataformas, 'using': ['id', 'plataforma'],
					'useEmpty': true, 'emptyText': 'Seleccione...', 'emptyValue': '0', 'class': 'btn dropdown-toggle') }}
			</td>
		</tr>
		<tr>
			<td> Sinopsis </td>
			<td> {{ text_field('sinopsis', 'class': 'form-control') }} </td>
		</tr>
		<tr>
			<td> Carátula </td>
			<td> {{ file_field('caratula[]', 'class': 'form-control') }} </td>
		</tr>
		<tr>
			<td> Trailer </td>
			<td> {{ text_field('trailer', 'class': 'form-control') }} </td>
		</tr>
		<tr>
			<td> Precio unitario </td>
			<td> {{ text_field('precio', 'class': 'form-control') }} </td>
		</tr>
		<tr>
			<td> Existencias </td>
			<td> {{ text_field('existencias', 'class': 'form-control') }} </td>
		</tr>
		<tr>
			<td> Categoria </td>
			<td> 
				<?php $categorias = categorias::find(); ?>
				{# Lista contenedora de las categorias #}
				{{ select('categoria', categorias, 'using': ['id', 'categoria'],
					'useEmpty': true, 'emptyText': 'Seleccione...', 'emptyValue': '0', 'class': 'btn dropdown-toggle') }}
			</td>
		</tr>
		<tr>
			<td> {{ submit_button('Guardar', 'class': 'btn btn-success') }}</td>	
			<td> 
				{{ link_to('generos/', 'Cancelar', 'class': 'btn btn-warning') }}
			</td>
		</tr>
	</table>
</form>