<h1> Videojuegos por categorias </h1>

{% for videojuego in videojuegos %}
	<li>{{ videojuego.videojuego }}</li>
{% endfor %}