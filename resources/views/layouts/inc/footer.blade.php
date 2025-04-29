<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
    <div class="copyright">
        &copy; Copyright <strong><span>@bima</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
        Designed by <a href="#">Bima</a>
    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- CDN -->
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script type="text/javascript" language="javascript"
    src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>


<!-- Vendor JS Files -->
<script src="{{ asset('assets/adminlte/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/adminlte/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/adminlte/assets/vendor/chart.js/chart.umd.js') }}"></script>
<script src="{{ asset('assets/adminlte/assets/vendor/echarts/echarts.min.js') }}"></script>
<script src="{{ asset('assets/adminlte/assets/vendor/quill/quill.js') }}"></script>
<script type="text/javascript" language="javascript"
    src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" language="javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" language="javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" language="javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" language="javascript"
    src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" language="javascript"
    src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
<script src="{{ asset('assets/adminlte/assets/vendor/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('assets/adminlte/assets/vendor/php-email-form/validate.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ asset('assets/adminlte/assets/js/main.js') }}"></script>
<!-- gsap -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<!-- tags input -->
<script src="{{ asset('assets/bootstrap-tags/bootstrap-tagsinput.min.js') }}"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet" />

@include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])


<script>
    // $('.select2tags').select2();
    $('.select2tags').select2();

    $('.datatablebutton').DataTable({
        dom: 'B',
        "bPaginate": false,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });

    $('.datatable').DataTable();

    //sidebarleft $segment = request()->segment(1);
    $.each($(".sidebarleft"), function(index, value) {
        var id = $(this).attr('id');
        var parentid = $(this).attr('parentid');
        if (id == '{{ request()->segment(1) }}') {
            if (parentid == '') {
                $("#" + id).removeClass('collapsed');
            } else {
                $("#" + id).addClass('active');
                $("#" + parentid + "-nav").addClass('show');
                $("#" + parentid + "").removeClass('collapsed');
            }
        }

    })

    function removesdetail(counter) {
        $("#sub_row" + counter).remove();
        getgrandtotal()
    }

    function formatRupiah(number) {
        const formatted = number.toLocaleString("id", {
            minimumFractionDigits: 0,
            maximumFractionDigits: 0,
        })
        return formatted;
    }

    function caculate_stok_akhir() {

        qty_akhir = 0;
        var qty_awal = $("#qty_awal").val();
        var qty_keluar = $("#qty_keluar").val();
        qty_akhir = parseInt(qty_awal) - parseInt(qty_keluar);
        $("#qty_akhir").val(qty_akhir);
    }

    if ('{{ request()->segment(1) }}' == 'laporan-penjualan' || '{{ request()->segment(1) }}' ==
        'laporan-stokbarang' || '{{ request()->segment(1) }}' == 'laporan-summary') {
        gettypereport()
    }

    $(document).on('change', '#typereport', function() {
        gettypereport()
    });

    function gettypereport() {
        var typereport = $('#typereport').val();
        //reportfilter
        $.each($(".reportfilter"), function(index, value) {
            $(this).css('display', 'none');
        })
        $("." + typereport + "div").css('display', 'block');
    }

    $(document).on('click', '.add-row', function() {
        var category_id = $("#category_id").val();
        var product_id = $("#product_id").val();
        var optionselected = $("#product_id").find("option:selected");
        var price = optionselected.data('price');
        var photo = optionselected.data('photo');
        var description = optionselected.data('description');
        var name = optionselected.data('name');

        checkpoint = 0;
        $('[name="product_id[]"]').each(function(i, val) {
            if ($(this).val() == product_id) {
                checkpoint++;
            }
        })

        if (parseInt(checkpoint) > 0) {
            Swal.fire({
                position: "top-end",
                icon: "warning",
                text: 'Product Sudah Ditambahkan',
                title: "Warning",
                showConfirmButton: false,
                timer: 3000
            });
        } else {

            dataMap = {};
            dataMap['category_id'] = category_id;
            dataMap['product_id'] = product_id;
            if (category_id == "") {
                Swal.fire({
                    position: "top-end",
                    icon: "error",
                    text: 'Category Kosong!',
                    title: "Error",
                    showConfirmButton: false,
                    timer: 1500
                });
                return false;
            }
            if (product_id == "") {
                Swal.fire({
                    position: "top-end",
                    icon: "error",
                    text: 'Product Kosong!',
                    title: "Error",
                    showConfirmButton: false,
                    timer: 1500
                });
                return false;
            }

            counter = 1;
            $('[name="qty[]"]').each(function() {
                counter++;
            })

            if (counter > 26) {
                alert('Maksimum 26 item');
                return false;
            }


            trtd = `
            <tr id="sub_row${counter}" name="sub_row[]">
                <input type="hidden" id="product_id${counter}" fild="product_id" name="product_id[]" class="formclass${counter}" value="${product_id}">
                <td><div class="circular"><a href="{{ asset('storage/') }}/${photo}" data-fancybox><img src="{{ asset('storage/') }}/${photo}" alt="Ini gambar"></a></div></td>
                <td>${name}</td>
                <td><input type="number" id="qty${counter}" fild="qty" class="form-control formclass${counter}" name="qty[]" value="1" counter="${counter}"></td>
                <td><span id="price${counter}" class="formclass${counter}" fild="order_price" name="price[]" counter="${counter}">${formatRupiah(parseInt(price))}</span></td>
                <td><span id="total${counter}" class="formclass${counter}" fild="order_subtotal"  name="total[]" counter="${counter}">${formatRupiah(parseInt(price))}</span></td>
                <td class="text-center">
                     <a href="#" class="icon fe-md" onclick="removesdetail(${counter})">
                        <i class="bi bi-x-square "></i>
                    </a>
                </td>
            </tr>
        `;
            $("#tbodys").append(trtd);
            // clearAll();
            getgrandtotal()
        }
    });

    function clearAll() {
        $("#category_id").val("");
        $("#product_id").val("");
    }


    $(document).on('click', '[id^=saveorder_]', function() {
        Swal.fire({
            title: "Are you sure want to save this data?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Save",
            showLoaderOnConfirm: true,
            width: 600,
            padding: "3em",
            color: "#716add",
            background: "#fff url(/images/trees.png)",
            backdrop: `
                rgba(0,0,123,0.4)
                url("/images/nyan-cat.gif")
                left top
                no-repeat
            `,
            preConfirm: async (login) => {
                Swal.showLoading();
                $('#loading').show();
                try {
                    i = 0;
                    mapping = [
                        []
                    ];
                    $('[name="qty[]"]').each(function() {
                        var counter = $(this).attr('counter');
                        dataDetail = {};
                        $.each($(".formclass" + counter), function(index, value) {
                            var id = $(this).attr("id");
                            var check_tag = $("#" + id + "").prop("tagName");
                            // alert(check_tag);
                            var fild = $(this).attr("fild");
                            if (check_tag == 'SPAN') {
                                var valueisi = $("#" + id + "").text().replace(
                                    /\./g, '');
                            } else {
                                var valueisi = $("#" + id + "").val();
                            }
                            dataDetail["" + fild + ""] = "" + valueisi + "";
                        });
                        mapping[i] = [counter, dataDetail];
                        i++;
                    })
                    var lempardata = JSON.stringify(mapping);
                    console.log(lempardata);
                    dataMap = {};
                    dataMap['listjson'] = lempardata;
                    dataMap['grandtotal'] = $("#grandtotal").text().replace(/\./g, '');
                    $.ajax({
                        type: 'POST',
                        url: '/insert-transaction',
                        data: dataMap,
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(res) {
                            if (res.status == '1') {
                                Swal.fire({
                                    position: "top-end",
                                    icon: "success",
                                    text: 'Success Add !',
                                    title: "Successfully Add",
                                    showConfirmButton: false,
                                    timer: 2000
                                });
                                setTimeout(function() {
                                    window.location.href = '/pos';
                                }, 2100);
                            } else {
                                Swal.fire({
                                    position: "top-end",
                                    icon: "error",
                                    text: 'Error!',
                                    title: "Error",
                                    showConfirmButton: false,
                                    timer: 2000
                                });
                                $('#loading').hide();
                            }
                        }
                    });

                } catch (error) {

                }
            },
            allowOutsideClick: () => !Swal.isLoading()
        }).then((result) => {
            if (result.isConfirmed) {

            }
        });


    });

    $(document).on('input', '[id^=qty]', function() {
        var qty = $(this).val();
        var counter = $(this).attr('counter');
        var price = $('#price' + counter).text();
        //price.replace(/\./g,'');
        var total = parseInt(qty) * parseInt(price.replace(/\./g, ''));
        $('#total' + counter).text(formatRupiah(total));
        getgrandtotal()
    })

    function getgrandtotal() {
        gtotal = 0;
        $('[name="total[]"]').each(function() {
            nom = $(this).text();
            gtotal = gtotal + parseInt(nom.replace(/\./g, ''));
        })
        // $("#subtotal").val(gtotal);
        $("#grandtotal").text(formatRupiah(gtotal));
    }

    // $(document).on('change', '[id=product_id]', function() {
    //     var hiddenproduct = $("#hiddenproduct").val();
    //     var product_id = $(this).val();
    //     // $.each(hiddenproduct, function(key, value) {
    //     // alert(value);
    //     // })
    // })

    $(document).on('change', '[id=category_id]', function() {
        $('#loading').show();
        var category_id = $(this).val();
        dataMap = {};
        dataMap['category_id'] = category_id;
        $.ajax({
            type: 'POST',
            url: '/get-product',
            data: dataMap,
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(res) {
                if (res.status == '1') {
                    $('#hiddenproduct').val(res.data);
                    $('#product_id').empty();
                    $('#product_id').append(
                        `
                        <option value="">Select One</option>
                         `
                    );
                    $.each(res.data, function(key, value) {
                        $('#product_id').append(
                            `
                            <option value="${value.id}"
                            data-photo="${value.product_photo}"
                            data-description="${value.product_description}"
                            data-name="${value.product_name}"
                            data-price="${value.product_price}"
                            >${value.product_name}</option>
                             `
                        );
                    });
                } else {
                    alert('data empty'); // sweet alert
                }
                $('#loading').hide();
            }
        });
    });

    // $('.datatable').DataTable({
    //     dom: 'Bfrtip',
    //     buttons: [
    //         'copy', 'csv', 'excel', 'pdf', 'print'
    //     ]
    // });
    //sidebarleft
    var url = window.location.href;
    var res = url.split('/');
    countres = res.length - 1;
    var pathname = res[countres];
    $.each($(".sidebarleft"), function(index, value) {
        var id = $(this).attr('id');
        var parentid = $(this).attr('parentid');
        if (id == pathname) {
            if (parentid == '0') {
                $("#" + id).removeClass('collapsed');
            } else {
                $("#" + id).addClass('active');
                $("#" + parentid + "-nav").addClass('show');
                $("#" + parentid + "").removeClass('collapsed');
            }
        }

    })

    setTimeout(function() {
        $('#loading').hide();
    }, 2000);

    gsap.from(".effectup", {
        y: 50,
        duration: 3,
        ease: "power3.out",
    });
</script>
<div class="modal fade" id="logoutmodal" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confimation Logout</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are You Sure Wants To Logout ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <a type="button" class="btn btn-danger" href="/action-logout">Logout</a>
            </div>
        </div>
    </div>
</div><!-- End Small Modal-->
</body>

</html>
