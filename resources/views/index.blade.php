@extends ('layout')
@section ('title','Listado')
@section ('content')


        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }

        h2 {
            color: #333;
        }

        .table-auto {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 1em;
            background-color: #ffffff;
            box-shadow: 0 2px 3px rgba(0, 0, 0, 0.1);
        }

        .table-auto th, .table-auto td {
            padding: 12px 15px;
            text-align: left;
            border: 1px solid #ddd;
        }

        .table-auto thead {
            background-color: #009879;
            color: #ffffff;
            text-align: left;
            font-weight: bold;
        }

        .table-auto tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        .table-auto tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        .table-auto tbody tr:last-of-type {
            border-bottom: 2px solid #009879;
        }

        .table-auto tbody tr:hover {
            background-color: #f1f1f1;
        }

        .borrar {
            display: inline-block;
            margin: 20px 0;
            padding: 10px 20px;
            background-color: #666;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .borrar :hover {
            background-color: #333;
        }
        .borrar {
            display: inline-block;
            margin: 20px 0;
            padding: 10px 20px;
            background-color: #666;
            color: ffffff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }


        --

        a {
            display: inline-block;
            margin: 20px 0;
            padding: 10px 20px;
            background-color: #009879;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #007a63;
        }
        a {
            display: inline-block;
            margin: 20px 0;
            padding: 10px 20px;
            background-color: #009879;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .borrar:hover {
            background-color: #007a63;
        }

        .button-group {
            display: flex;
            gap: 10px;
        }

        .button-group a, .button-group form button {
            margin: 0;
        }

        td[colspan="4"] {
            text-align: center;
            font-style: italic;
            color: #666;
        }
    </style>


</head>
   
<div>
    <h2>Tabla de Productos</h2>
    <table class="table-auto">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Descripcion</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <a href="{{route('products.create')}}">Nuevo</a>
            @forelse ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->description }}</td>
                <td>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <a href="{{route('products.edit',$product->id)}}">Editar</a>
                <button type="submit" class="borrar" onclick="return confirm('¿Estás seguro de que deseas eliminar este producto?')">Borrar</button>
            </form>
            
        </td>
            </tr>
            @empty
           <tr><td colspan="4" align="center"> No hay registro de producto </td></tr>
            @endforelse
        </tbody>
    </table>
</div>




