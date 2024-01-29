
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <form action="" method="post" id="updateProduct">
        @csrf
        <input type="hidden" id="update_id">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Update Product</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="errmsg"></div>

                    <div class="form-group ">
                        <label for="name">Product Name</label>
                        <input type="text" class="form-control" id="update_name" name="update_name">
                    </div>
                    <div class="form-group my-2">
                        <label for="name">Price</label>
                        <input type="text" class="form-control" id="update_price" name="update_price">
                    </div>
                    <div class="form-group my-2">
                        <label for="name">Quantity</label>
                        <input type="text" class="form-control" id="update_quantity" name="update_quantity">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" style="color: black;">Close</button>
                    <button type="button" class="btn btn-primary update_product"  style="color: black;">Update Product</button>
                </div>
            </div>
        </div>
    </form>
</div>
