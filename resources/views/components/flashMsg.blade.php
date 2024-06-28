@props(['msg', 'icon' => 'success'])

<script type="text/javascript">
    Swal.fire({
        position: "center",
        icon: "{{ $icon }}",
        title: "{{ $msg }}",
        showConfirmButton: true,
        timer: 2500
    });
</script>
