function alertDangerEvent(selector)
{
    $(selector).on('click', function () {
        const form = $(this).parent()
        Swal.fire({
            title: 'Are you sure?',
            text: $(this).data('message'),
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes!',
            customClass: {
                confirmButton: 'btn btn-primary',
                cancelButton: 'btn btn-outline-danger ms-1'
            },
            buttonsStyling: false
        }).then(function (result) {
            if (result.value) {
                form.submit()
            }
        })
    })
}
