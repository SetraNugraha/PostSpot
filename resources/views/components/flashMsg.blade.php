@props(['msg'])

<script type="text/javascript">
    Swal.fire({
        position: "center",
        icon: "success",
        title: "{{ $msg }}",
        showConfirmButton: true,
        timer: 2500
    });
</script>
