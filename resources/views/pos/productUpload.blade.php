<script src="../js/pos/productUpload.js"></script>
<form class="upload--root">
    <h2>Enter product information</h2>
    <input type="text" name="name" placeholder="Enter product name">
    <input type="text" name="category" style="display:none">
    <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter product description"></textarea>
    <div class="flex">
        <div class="custom-select" style="width:200px;">
            <p class="active"></p>
            <p class="option">
                <span>Men's Fashion</span>
                <span>Women's Fashion</span>
                <span>Girl's Fashion</span>
                <span>Boy's Fashion</span>
                <span>Baby</span>
                <span>Computer</span>
                <span>Phone</span>
                <span>Gadget</span>
            </p>
        </div>
        <input type="text" class="half" name="b_name" placeholder="Enter brand name">
    </div>
    <ul class="spec">
        <h3>Specification <i class='bx bxs-plus-square'></i></h3>
        <input type="text" name="spec" placeholder="Specification">
        <input type="text" name="spec" placeholder="Specification">
    </ul>
    <div class="sizes">
        <h2>Item <i class='size-btn bx bxs-plus-square'></i></h2>
    </div>
    <div class="submit">
        <span class="create">Create product</span>
        <span class="cancel">Cancel</span>
    </div>
</form>