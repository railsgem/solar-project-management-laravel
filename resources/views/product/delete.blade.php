<!-- Sart deleteModal -->
<div class="modal fade" id="deleteModal{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <form class="form-horizontal" method="post" action="/products/{{$product->id}}">
                <div class="modal-header">
                    <h4 class="modal-title">Delete product</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <i class="material-icons">clear</i>
                    </button>
                </div>
                {{ csrf_field() }}
                <input type="hidden" name="productId" id="productId" value="{{$product->id}}" />
                <div class="modal-body">
                    <div class="tim-typo">
                        <h3>Delete product - {{$product->name}}? </h3>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger btn-simple">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--  End deleteModal -->
