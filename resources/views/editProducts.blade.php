@extends ('layout')
@section ('title','Editar Producto')
@section ('content')


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

        .form-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 50px;
            box-shadow: 0 2px 3px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        .form-group input, .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-group textarea {
            resize: vertical;
        }

        .form-group button {
            padding: 10px 20px;
            background-color: #009879;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-group button:hover {
            background-color: #007a63;
        }
    </style>

</head>
    <div class="form-container">
        <h2>Editar Producto</h2>
        
        <form action="{{ route('products.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Nombre del Producto:</label>
                <input type="text" name="name" id="name" value="{{ $product->name }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="description">Descripción:</label>
                <textarea name="description" id="description" class="form-control">{{ $product->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="price">Precio:</label>
                <input type="text" name="price" id="price" value="{{ $product->price }}" class="form-control">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </div>
        </form>
    </div>


