<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
    <div class="copyright">
        &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
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

<!-- Vendor JS Files -->
<script src="{{ asset('assets/adminlte/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/adminlte/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/adminlte/assets/vendor/chart.js/chart.umd.js') }}"></script>
<script src="{{ asset('assets/adminlte/assets/vendor/echarts/echarts.min.js') }}"></script>
<script src="{{ asset('assets/adminlte/assets/vendor/quill/quill.js') }}"></script>
<script src="{{ asset('assets/adminlte/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
<script src="{{ asset('assets/adminlte/assets/vendor/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('assets/adminlte/assets/vendor/php-email-form/validate.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ asset('assets/adminlte/assets/js/main.js') }}"></script>
<!-- gsap -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<!-- tags input -->
<script src="{{ asset('assets/bootstrap-tags/bootstrap-tagsinput.min.js') }}"></script>
<!-- izitoast -->
<script src="{{ asset('assets/iziToast/dist/js/iziToast.js') }}"></script>

<script>
    // $('.select2tags').select2();

    function removesdetail(counter) {
        $("#sub_row" + counter).remove();
        getgrandtotal()
    }

    $(document).on('click', '.add-row', function() {
        var category_id = $("#category_id").val();
        var product = $("#product_id").val();
        var res = product.split("###");
        var product_id = res[0];
        var price = res[1];
        var photo = res[2];
        var description = res[3];
        var name = res[4];
        dataMap = {};
        dataMap['category_id'] = category_id;
        dataMap['product_id'] = product_id;
        if (category_id == "") {
            alert('category Kosong');
            return false;
        }
        if (product_id == "") {
            alert('Product Kosong');
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
                <td><div class="circular"><img src="http://127.0.0.1:8000/storage/${photo}" alt="Ini gambar"></div></td>
                <td>${name}</td>
                <td><input type="number" id="qty${counter}" class="form-control qtyclass" name="qty[]" value="1" counter="${counter}"></td>
                <td><input type="number" id="price${counter}" class="form-control priceclass" name="price[]" value="${price}" counter="${counter}"></td>
                <td><input type="number" id="total${counter}" class="form-control totalclass" name="total[]" value="${price}" counter="${counter}"></td>
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
    });

    function clearAll() {
        $("#category_id").val("");
        $("#product_id").val("");
    }


    $(document).on('input', '[id^=qty]', function() {
        var qty = $(this).val();
        var counter = $(this).attr('counter');
        var price = $('#price' + counter).val();
        var total = qty * price;
        $('#total' + counter).val(total);
        getgrandtotal()
    })


    function getgrandtotal() {
        gtotal = 0;
        $('[name="total[]"]').each(function() {
            gtotal = gtotal + parseInt($(this).val());
        })
        $("#subtotal").val(gtotal);
        $("#grandtotal").val(gtotal);

    }

    $(document).on('change', '[id=product_id]', function() {
        var hiddenproduct = $("#hiddenproduct").val();
        var product_id = $(this).val();
        // $.each(hiddenproduct, function(key, value) {
        // alert(value);
        // })
    })

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
                            <option value="${value.id}###${value.product_price}###${value.product_photo}###${value.product_description}###${value.product_name}">${value.product_name}</option>
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

    iziToast.settings({
        timeout: 3000, // default timeout
        resetOnHover: true,
        transitionIn: 'flipInX',
        transitionOut: 'flipOutX',
        position: 'topRight', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter, center
        onOpen: function() {
            console.log('callback abriu!');
        },
        onClose: function() {
            console.log("callback fechou!");
        }
    });

    function callsuccesstoast(title, description, type) {

        if (type == 'danger') {
            iziToast.danger({
                timeout: 5000,
                icon: 'fa fa-close',
                title: '' + title + '',
                message: '' + description + ''
            });
        } else if (type == 'success') {
            iziToast.success({
                timeout: 5000,
                icon: 'fa fa-check',
                title: '' + title + '',
                message: '' + description + ''
            });
        }


    }
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
