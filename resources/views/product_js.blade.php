<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>
<script>
$(document).ready(function(){
    $(document).on('click','.save_product', function(e){
        e.preventDefault();
        let name = $('#name').val();
        let price = $('#price').val();
        let quantity = $('#quantity').val();

        $.ajax({
            url: "{{route('add_product')}}",
            method: 'POST',
            data: {name:name, price:price, quantity:quantity},
            success: function (res){
                if(res.status=='success'){
                    $('#addModal').modal('hide');
                    $('#addProduct')[0].reset();
                    $('.table').load(location.href+' .table')

                    Command: toastr["success"]("Successfully Added Product")

                    toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                    }
                }
            },error:function(err){
                let error = err.responseJSON;
                $.each(error.errors, function(index, value){
                    $('.errmsg').append('<span class="text-danger">'+value+'</span>'+'<br>');
                })
            }
        });
    });

    //Update Product form
    $(document).on('click', '.update_product_form', function(e) {
        let id = $(this).data('id');
        let name = $(this).data('name');
        let price = $(this).data('price');
        let quantity = $(this).data('quantity');

        $('#product_id').val(id);
        $('#update_name').val(name);
        $('#update_price').val(price);
        $('#update_quantity').val(quantity);
    });


    //Update Product to Database
    $(document).on('click','.update_product_button', function(e){
        e.preventDefault();
        let id = $('#product_id').val();
        let name = $('#update_name').val();
        let price = $('#update_price').val();
        let quantity = $('#update_quantity').val();

        $.ajax({
            url: "{{route('update_product')}}",
            method: 'POST',
            data: {product_id:id, update_name:name, update_price:price, update_quantity:quantity},
            success: function (res){
                if(res.status=='success'){
                    $('#updateModal').modal('hide');
                    $('#updateProduct')[0].reset();
                    $('.table').load(location.href+' .table')

                    Command: toastr["success"]("Successfully Updated")

                    toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                    }
                }

            },error:function(err){
                let error = err.responseJSON;
                $.each(error.errors, function(index, value){
                    $('.errmsg').append('<span class="text-danger">'+value+'</span>'+'<br>');
                })
            }
        });
    });

        //Delete a Product
    $(document).on('click','.delete_product', function(e){
        e.preventDefault();
        let id = $(this).data('id');

        if(confirm('Are you sure you to delete this product')){
            $.ajax({
                url: "{{route('delete_product')}}",
                method: 'POST',
                data: {id:id},
                success: function (res){
                    if(res.status=='success'){
                        $('.table').load(location.href+' .table')
                        Command: toastr["success"]("Successfully deleted")

                        toastr.options = {
                        "closeButton": true,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": true,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                        }
                    }

                }
        });
        }
    });
        //Pagination
        $(document).on('click', '.pagination a', function(e){
            e.preventDefault();
            let page = $(this).attr('href').split('page=')[1];
            product(page);

        });
        function product(page){
            $.ajax({
                url: "/paginate?page="+page,
                success: function(res){
                    $('.table-data').html(res);
                }
            })
        }

        //Search Productup
        $(document).on('keyup', function(e){
            e.preventDefault();
            let search_value = $('#search').val();
            
            $.ajax({
                url:"{{route('search_product')}}",
                method: 'GET',
                data:{search_value:search_value},
                success: function(res){
                    $('.table-data').html(res);
                    if(res.status=='product_not_found'){
                        $('.table-data').html('<span class="text-danger">'+'Product not found'+'</span>')
                    }
                }
            });
        })

})
</script>


