

<script>
    document.addEventListener('DOMContentLoaded', function() {
        @if(session('success'))
        showToast('success', '{{ session('success') }}');
        @endif
        @if(session('error'))
        showToast('error', '{{ session('error') }}');
        @endif
        @if(session('warning'))
        showToast('warning', '{{ session('warning') }}');
        @endif
        @if(session('info'))
        showToast('info', '{{ session('info') }}');
        @endif
    });
</script>

