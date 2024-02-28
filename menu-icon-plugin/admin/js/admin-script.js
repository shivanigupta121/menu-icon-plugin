jQuery(document).ready(function($) {
    $(document).on('click', '.upload-menu-item-icon', function(e) {
        e.preventDefault();
        var button = $(this);
        var item_id = button.closest('li.menu-item').attr('id').replace('menu-item-', '');
        var custom_uploader = wp.media({
            title: 'Choose Icon',
            button: {
                text: 'Use Icon'
            },
            multiple: false
        });
        custom_uploader.on('select', function() {
            var attachment = custom_uploader.state().get('selection').first().toJSON();
            $('#edit-menu-item-icon-' + item_id).val(attachment.url);
        });
        custom_uploader.open();
    });
});
