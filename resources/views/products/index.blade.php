<!DOCTYPE html>
<body>
    <!-- Products -->
    <p>Products: </p>

    <table>
        <thead>
            <tr>
                @foreach (['Id', 'Name', 'Category'] as $column)
                    <th>{{ $column }}</th>
                @endforeach
                </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product['id'] }}</td>
                <td>{{ $product['name'] }}</td>
                <td>{{ $product['category'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Tasks -->
    <p>Tasks: </p>
    <ul>
        @foreach ($tasks as $task)
        <li>{{ $task }}</li>
        @endforeach
    </ul>

    <p>Global Variable: </p>
    <p>{{ $sharedVariable }}</p>

    <p>Product Key: {{ $productKey }}</p>
</body>
</html>

