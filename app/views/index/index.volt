<div class="row-fluid">
    <h1 class="text-center"> Welcome to Area 6 </h1>

    <table class="table table-striped table-bordered table-condensed text-center">
                <thead>
                    <tr>
                        <th class="text-center">Producto</th>
                        <th class="text-center"></th>
                        <th class="text-center">Catálogo</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Videojuegos</td>
                        <td> 
                            <?php echo $videojuegos = videojuegos::count(); ?>
                        </td>
                        <td> {{ link_to('generos/', 'Videojuegos') }} </td>
                    </tr>
                </tbody>
    </table>
</div>
