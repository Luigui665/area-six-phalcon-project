<h1> Generos de videojuegos </h1>

{% for genero in generos %}
	<li>{{ link_to('generos/show/' ~ genero.id, genero.genero) }}</li>
{% endfor %}