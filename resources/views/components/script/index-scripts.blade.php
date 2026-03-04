<script>
    document.getElementById('select-all').onclick = function(){
        var checkboxes = document.getElementsByName('ids[]');
        for (var checkbox of checkboxes){
            checkbox.checked = this.checked;
        }
    }

    // Function to update delete button state
    function updateDeleteButton() {
        const checkboxes = document.querySelectorAll('input[name="ids[]"]');
        const deleteBtn = document.getElementById('delete-selected');
        const anyChecked = Array.from(checkboxes).some(cb => cb.checked);
        if (anyChecked) {
            deleteBtn.disabled = false;
            deleteBtn.classList.remove('disabled');
        } else {
            deleteBtn.disabled = true;
            deleteBtn.classList.add('disabled');
        }
    }

    // Add event listeners to all checkboxes
    document.querySelectorAll('input[name="ids[]"]').forEach(cb => {
        cb.addEventListener('change', updateDeleteButton);
    });

    // Select-all functionality with update
    document.getElementById('select-all').addEventListener('change', function() {
        const checkboxes = document.querySelectorAll('input[name="ids[]"]');
        checkboxes.forEach(cb => cb.checked = this.checked);
        updateDeleteButton();
    });

    // Initial state
    updateDeleteButton();
</script>
