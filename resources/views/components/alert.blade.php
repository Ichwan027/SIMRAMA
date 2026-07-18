@if(session('success') || session('error') || $errors->any())
<script>
document.addEventListener('DOMContentLoaded', () => {

    const success = @json(session('success'));
    const error = @json(session('error'));
    const errors = @json($errors->all());

    if (success) {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: success,
            timer: 2500,
            showConfirmButton: false
        });
        return;
    }

    if (error) {
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: error
        });
        return;
    }

    if (errors.length > 0) {
        Swal.fire({
            icon: 'error',
            title: 'Validasi Gagal',
            html: errors.map(item => `• ${item}`).join('<br>')
        });
    }

});
</script>
@endif