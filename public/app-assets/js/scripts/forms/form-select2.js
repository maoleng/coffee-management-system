(function(window, document, $) {
    'use strict';

    $('.select2').each(function() {
        var $this = $(this);
        $this.wrap('<div class="position-relative"></div>');
        $this.select2({
            tags: true,
            dropdownAutoWidth: true,
            width: '100%',
            dropdownParent: $this.parent(),
        });
    });
})(window, document, jQuery);
