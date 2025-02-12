<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Access Denied</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Access Denied',
            text: 'You are not allowed to access this page!',
            confirmButtonText: 'Go Back'
        }).then(() => {
            window.history.back();
        });
    </script>
</body>
</html>
