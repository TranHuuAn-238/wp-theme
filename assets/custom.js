console.log(custom_js_object);

jQuery(document).ready(function() {
    jQuery('#add_to_cart').click(function() {
        let product_qty = jQuery('#product_qty').val();
        let product_id = jQuery('#product_id').val();

        let options = {
            url: custom_js_object.ajaxurl,
            method: 'POST',
            dataType: 'json',
            data: {
                action: 'wp2025_add_to_cart',
                nonce: custom_js_object.nonce,
                qty: product_qty,
                product_id: product_id
            },
            success: function(res) {
                console.log(res);
            }
        }
        jQuery.ajax(options);
    });
});