var counter = 0;

$('#add-product').on('click', function (){
    productForm = $('#js-initial').clone();
    counter++;
    productForm.removeAttr('id');
    productForm.addClass(`num-${counter}`);

    product = productForm.find('select#product');
    amount = productForm.find('input#amount');
    price = productForm.find('input#price');

    product.attr('name',`delivery_items[${counter}][product_id]`);
    amount.attr('name',`delivery_items[${counter}][amount]`);
    price.attr('name',`delivery_items[${counter}][price_for_unit]`);

    price.val('')
    amount.val('')

    $('.card-body > .container-custom').append(productForm);
});

$('.container-custom').on('click', '.js-delete', function (){
    $(this).parent('.product-contain').remove();
});
