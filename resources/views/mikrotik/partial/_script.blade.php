<script>
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    function updateMikrotiksCount(count) {
        $('#mikrotiksCount').text(count);
    }
    $(document).ready(function() {
        $('input, textarea').on('click', function() {
            $(this).removeClass('is-invalid');
            $(this).siblings('.invalid-feedback').text('');
        });
        function notifikasi(status, title, text) {
            new Notify({
                status: status,
                title: title,
                text: text,
                effect: 'slide',
                speed: 500,
                showCloseButton: true,
                autotimeout: 5000,
                autoclose: true,
            });
        }
        $('body').on('click', '#btn-hapus-router', async function () {
            const id = $(this).data('id');
            const url = "{{ route('mikrotiks.destroy', ':slug') }}".replace(':slug', id);
             const result = await Swal.fire({
                title: "Apa kamu yakin?",
                text: "Router akan di hapus permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#485ec4',
                cancelButtonColor: '#d33',
                confirmButtonText: "Ya hapus"
            });
            if (result.isConfirmed) {
                const success = await hapusRouter( url);
                if (success) {
                    notifikasi('success', 'Berhasil', 'router server berhasil di hapus');
                    $('#mikrotiksTable').DataTable().ajax.reload();
                } else {
                    notifikasi('error', 'Error', 'Router server gagal di hapus');
                }
            }
        });
        async function hapusRouter( url) {
            try {
                await $.ajax({
                    type: "DELETE",
                    url: url
                });
                return true;
            } catch (error) {
                return false;
            }
        }

        $('#btn-hapus-router').on('click', function(e) {
            e.preventDefault();
            const form = $(this).closest('form');
            const url = form.attr('action');

            $.ajax({
                url: url,
                type: 'DELETE',
                data: form.serialize(),
                success: function(response) {
                    if (response.status === 'success') {
                        new Notify({
                            title: 'Berhasil',
                            text: 'Lokasi server berhasil di hapus.',
                            status:"success",
                            effect: 'slide',
                            speed: 500,
                            showCloseButton: true,
                            autotimeout: 3000,
                            autoclose: true
                        });
                        $('#mikrotiksTable').DataTable().ajax.reload();
                        const currentCount = parseInt($('#mikrotiksCount').text());
                        const newCount = currentCount - 1;
                        updateMikrotiksCount(newCount);
                    } else {
                        new Notify({
                            title: response.title,
                            text: response.text,
                            status:response.status,
                            effect: 'slide',
                            speed: 500,
                            showCloseButton: true,
                            autotimeout: 3000,
                            autoclose: true
                        });
                        $.each(response.errors, function(key, value) {
                            form.find('input[name="' + key + '"]').addClass('is-invalid');
                            form.find('input[name="' + key + '"]').siblings('.invalid-feedback').text(value[0]);
                        });
                    }
                }
            });
        });
    });
    $(document).ready(function() {
        $('.add-router').click(function() {
            $('#nameRouter').val('');
            $('#add_host').val('');
            $('#usernameRouter').val('');
            $('#passwordRouter').val('');
            $('#portRouter').val('');
            $('#checkConnection').prop('checked', false);
            $('#is_connected').val('0');

            $('#addRouterModal').modal('show');
            $('#addRouterModalTitle').html('Tambah router baru');
        });
    });

    $(document).ready(function() {
        $('#simpan-router').click(function(e) {
            e.preventDefault();
            const authUserId = '{{ Auth::id() }}';
            const url = "{{ route('mikrotiks.store') }}";
            const nameRouter = $('#nameRouter').val();
            const host = $('#add_host').val();
            const username = $('#usernameRouter').val();
            const password = $('#passwordRouter').val();
            const port = $('#portRouter').val();
            // const serverLocationId = $('#server_location_id_router').val();

            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    authUserId: authUserId,
                    name: nameRouter,
                    host: host,
                    username: username,
                    password: password,
                    port: port,
                    // server_location_id: serverLocationId
                },
                success: function(response) {
                    if (response.status === 'success') {
                        new Notify({
                            title: response.title,
                            text: response.text,
                            status: response.status,
                            effect: 'slide',
                            speed: 500,
                            showCloseButton: true,
                            autotimeout: 3000,
                            autoclose: true
                        });
                        const currentCount = parseInt($('#mikrotiksCount').text());
                        const newCount = currentCount + 1;
                        updateMikrotiksCount(newCount);
                        $('#addRouterModal').modal('hide');
                        $('#mikrotiksTable').DataTable().ajax.reload();
                    } else {
                        if (response.errors.name) {
                            $('#nameRouter').addClass('is-invalid');
                            $('#error_nameRouter').addClass('invalid-feedback').text(response.errors.name[0]);
                        }
                        if (response.errors.host) {
                            $('#add_host').addClass('is-invalid');
                            $('#error_add_host').addClass('invalid-feedback').text(response.errors.host[0]);
                        }
                        if (response.errors.username) {
                            $('#usernameRouter').addClass('is-invalid');
                            $('#error_usernameRouter').addClass('invalid-feedback').text(response.errors.username[0]);
                        }
                        if (response.errors.password) {
                            $('#passwordRouter').addClass('is-invalid');
                            $('#error_passwordRouter').addClass('invalid-feedback').text(response.errors.password[0]);
                        }
                        if (response.errors.port) {
                            $('#portRouter').addClass('is-invalid');
                            $('#error_portRouter').addClass('invalid-feedback').text(response.errors.port[0]);
                        }
                        // if (response.errors.server_location_id) {
                        //     $('#server_location_id_router').addClass('is-invalid');
                        //     $('#error_server_location_id_router').addClass('invalid-feedback').text(response.errors.server_location_id[0]);
                        // }
                        new Notify({
                            title: response.title,
                            text: response.text,
                            status: response.status,
                            effect: 'slide',
                            speed: 500,
                            showCloseButton: true,
                            autotimeout: 3000,
                            autoclose: true
                        });
                    }
                },
                error: function(xhr, status, error) {
                    new Notify({
                        title: 'Oops Error',
                        text: 'Gagal menambah router.',
                        status: 'error',
                        effect: 'slide',
                        speed: 500,
                        showCloseButton: true,
                        autotimeout: 3000,
                        autoclose: true
                    });
                }
            });
        });
    });

    let selectedRouterId;
    $(document).on('click', '.router-edit', function(e) {
        e.preventDefault();
        selectedRouterId = $(this).data('id');
        const url = "{{ route('mikrotiks.edit', ':id') }}".replace(':id', selectedRouterId);

        $('#editRouterModal').modal('show');
        $('#editRouterModalTitle').html('Edit data router');
        // $('#serverLocationForm').attr('method', 'POST');
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                const data = response.data;
                $('#edit_nameRouter').val(data.name);
                $('#edit_host').val(data.host);
                $('#edit_usernameRouter').val(data.username);
                $('#edit_passwordRouter').val(data.password);
                $('#edit_portRouter').val(data.port);
                // $('#edit_server_location_id_router').val(data.server_location_id);
            }
        });
    });

    $(document).on('click', '#update-router', function(e) {
        e.preventDefault();
        const authUserId = '{{ Auth::id() }}';
        const nameRouter = $('#edit_nameRouter').val();
        const host = $('#edit_host').val();
        const username = $('#edit_usernameRouter').val();
        const password = $('#edit_passwordRouter').val();
        const port = $('#edit_portRouter').val();
        const url = "{{ route('mikrotiks.update', ':id') }}".replace(':id', selectedRouterId);
        const method = "PUT";
        const form = $(this).closest('form');

        $.ajax({
            url: url,
            type: method,
            data: {
                authUserId: authUserId,
                name: nameRouter,
                username: username,
                password:password,
                port:port,
                host:host
                // server_location_id:serverLocationId
            },
            success: function(response) {
                if (response.status === 'success') {
                    new Notify({
                        title: 'Success',
                        text: 'Router server berhasil diupdate',
                        status: 'success',
                        effect: 'slide',
                        speed: 500,
                        showCloseButton: true,
                        autotimeout: 3000,
                        autoclose: true
                    });

                    $('#editRouterModal').modal('hide');
                    $('#mikrotiksTable').DataTable().ajax.reload();
                } else {
                    new Notify({
                        title: 'Error',
                        text: 'Gagal',
                        status: 'error',
                        effect: 'slide',
                        speed: 500,
                        showCloseButton: true,
                        autotimeout: 3000,
                        autoclose: true
                    });
                    $.each(response.errors, function(key, value) {
                        form.find('input[name="' + key + '"]').addClass('is-invalid');
                        form.find('input[name="' + key + '"]').siblings('.invalid-feedback').text(value[0]);
                    });
                }
            }
        });
    });

    $('#checkConnection').on('click', function(e) {
        if (e.currentTarget.checked) {
            const host = $('#add_host').val();
            const username = $('#usernameRouter').val();
            const password = $('#passwordRouter').val();
            const port = $('#portRouter').val();
            $.ajax({
                url: "{{ route('test-con') }}",
                method: "POST",
                cache: false,
                data: {
                    'host': host,
                    'password': password,
                    'username': username,
                    'port': port
                },
                success: function(response) {
                    if (response.status == 'success') {
                        $('#badge-connected').removeClass('d-none');
                        $('#badge-connected').html('<span class="badge bg-success font-size-12 align-middle">Connected</span>');
                        $('#is_connected').val('1');
                    } else {
                        $('#badge-connected').removeClass('d-none');
                        $('#badge-connected').html('<span class="badge bg-red font-size-12 align-middle">Disconnected</span>');
                        $('#is_connected').val('0');
                    }
                    new Notify({
                        status: response.status,
                        title: response.title,
                        text: response.message,
                        effect: 'slide',
                        speed: 500,
                        showCloseButton: true,
                        autotimeout: 5000,
                        autoclose: true
                    });
                },
                error: function(data) {
                    if (data.responseJSON && data.responseJSON.errors) {
                        if (data.responseJSON.errors.host) {
                            $('#add_host').addClass('is-invalid');
                            $('#error_add_host').addClass('invalid-feedback').text(data.responseJSON.errors.host[0]);
                        }
                        if (data.responseJSON.errors.username) {
                            $('#usernameRouter').addClass('is-invalid');
                            $('#error_usernameRouter').addClass('invalid-feedback').text(data.responseJSON.errors.username[0]);
                        }
                        if (data.responseJSON.errors.password) {
                            $('#passwordRouter').addClass('is-invalid');
                            $('#error_passwordRouter').addClass('invalid-feedback').text(data.responseJSON.errors.password[0]);
                        }
                        if (data.responseJSON.errors.port) {
                            $('#portRouter').addClass('is-invalid');
                            $('#error_portRouter').addClass('invalid-feedback').text(data.responseJSON.errors.port[0]);
                        }
                    }
                    new Notify({
                        status: 'error',
                        title: 'Gagal terkoneksi!',
                        text: data.responseJSON && data.responseJSON.message ? data.responseJSON.message : 'Terjadi kesalahan',
                        effect: 'slide',
                        speed: 500,
                        showCloseButton: true,
                        autotimeout: 5000,
                        autoclose: true
                    });
                }
            });
        } else {
            $('#badge-connected').addClass('d-none');
            $('#is_connected').val('0');
        }
    });
    $(document).on('click', '#check-online', function(e) {
        e.preventDefault();
        const selectedRouterId = $(this).data('id');
        const url = "{{ route('check-online', ':id') }}".replace(':id', selectedRouterId);
        $.ajax({
            url: url,
            method: "POST",
            cache: false,
            data: {
                'id':selectedRouterId,
            },
            success: function(response) {
                new Notify({
                    status: response.status,
                    title: response.title,
                    text: response.message,
                    effect: 'slide',
                    speed: 500,
                    showCloseButton: true,
                    autotimeout: 5000,
                    autoclose: true
                });
            },
            error: function(data) {
                new Notify({
                    status: 'error',
                    title: 'Gagal terkoneksi!',
                    text: data.responseJSON && data.responseJSON.message ? data.responseJSON.message : 'Terjadi kesalahan',
                    effect: 'slide',
                    speed: 500,
                    showCloseButton: true,
                    autotimeout: 5000,
                    autoclose: true
                });
            }
        });
    });
</script>
