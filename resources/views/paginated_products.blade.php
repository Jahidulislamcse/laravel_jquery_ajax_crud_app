<table class="table table-bordered">
    <thead>
        <tr>
        <th scope="col">SL.</th>
        <th scope="col">Name</th>
        <th scope="col">Price</th>
        <th scope="col">Quantity</th>
        <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $key=>$product)
        <tr>
        <th>{{$key+1}}</th>
        <td>{{$product->name}}</td>
        <td>{{$product->price}}</td>
        <td>{{$product->quantity}}</td>
        <td>
            <a href="" class="btn btn-warning update_product_form"
                data-bs-toggle="modal"
                data-bs-target="#updateModal"
                data-id="{{$product->id}}"
                data-name="{{$product->name}}"
                data-price="{{$product->price}}"
                data-quantity="{{$product->quantity}}">
                    <i class="las la-edit"></i></a>

            <a href="" class=" delete_product btn btn-danger"
                data-id="{{$product->id}}">
                <i class="las la-trash"></i></a>
        </td>
        </tr>
        @endforeach
    </tbody>
</table>
{!! $products->links() !!}
