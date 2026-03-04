//Confirm Delete Swal call

window.confirmDelete = function(triggerElement, item_to_delete = 'item', additionalMessage = 'Are you sure?', ) {
    let item_type = item_to_delete;
    const form = triggerElement.closest('form');
    if (!form) return;

    // Count checked checkboxes with name "ids[]" inside this form
    const checked = form.querySelectorAll('input[name="ids[]"]:checked');
    const count = checked.length;

    if (count === 0) {
        Swal.fire({
            icon: 'info',
            title: 'No items selected',
            text: 'Please select at least one product to delete.',
        });
        return;
    }

    const message = `Delete ${count} selected ${item_type}(s)? ${additionalMessage}`;

    Swal.fire({
        title: 'Are you sure?',
        text: message,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit(); // submits with DELETE method spoofed
        }
    });
};
