@extends('layouts.admin')
@section('title', 'Thêm mới Hoá Đơn')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<style>
    .btn-circle.btn-xl {
        width: 100px;
        height: 100px;
        padding: 13px 18px;
        border-radius: 60px;
        font-size: 15px;
        text-align: center;
    }
</style>
@section('breadcrumb')
    @include('layouts.breadcrumb', [
        'items' => [
            [
                'text' => 'Trang chủ',
                'url' => '#',
            ],
            [
                'text' => 'Quản lý Hóa đơn',
                'url' => route('invoices.index'),
            ],
            [
                'text' => 'Thêm mới Hóa đơn',
            ],
        ],
    ])
@endsection

@section('content')
    <div class="content">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title"><b>@yield('title')</b></div>
                        </div>
                        <!-- <form id="validation"
                            enctype="multipart/form-data">
                            @csrf -->
                            @include('invoices.form')
                        <!-- </form> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('inline_scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#userDropdown').change(function() {
                // Get the selected option value
                var point = $(this).find(':selected').data('info');

                // Update the label text with the selected value
                $('#scoreLabel').text('Số điểm: ' + point);
                $('#pointToDeduct').prop('disabled', point === 0);
            });
        });
        var tableData = [];
        function addRow() {
            var dropdown = document.getElementById("productDropdown");
            var selectedText = dropdown.options[dropdown.selectedIndex].text;
            var selectedValue = dropdown.options[dropdown.selectedIndex].getAttribute("data-info");
            var idProduct = dropdown.options[dropdown.selectedIndex].value;

            var table = document.getElementById("dataTable");

            // Kiểm tra xem selectedText đã tồn tại trong bảng hay chưa
            var existingRow = findExistingRow(selectedText);

            if (existingRow) {
                // Nếu đã tồn tại, tăng giá trị cột số lượng (cell3)
                var quantityCell = existingRow.cells[2];
                var quantityInput = quantityCell.querySelector('input');
                quantityInput.value = parseInt(quantityInput.value) + 1;
            } else {
                // Nếu chưa tồn tại, thêm dòng mới vào bảng
                var newRow = table.insertRow(table.rows.length);

                var cell1 = newRow.insertCell(0);
                var cell2 = newRow.insertCell(1);
                var cell3 = newRow.insertCell(2);
                var cell4 = newRow.insertCell(3);

                cell1.innerHTML = table.rows.length - 1;
                cell2.innerHTML = selectedText;
                cell2.setAttribute("value", idProduct);
                cell3.innerHTML = `<input type="number" name="points" value="1" step="1">`;
                cell4.innerHTML = selectedValue;
                // Lưu thông tin vào mảng để sử dụng sau này
                var rowData = {
                    productId: idProduct, // Lưu productId
                    quantity: idProduct // Giá trị mặc định
                };
                tableData.push(rowData);
            }
            updateTotalAmount();
        }


        function findExistingRow(selectedText) {
            var table = document.getElementById("dataTable");

            for (var i = 0; i < table.rows.length; i++) {
                var currentRow = table.rows[i];
                var currentText = currentRow.cells[1].innerHTML;

                if (currentText === selectedText) {
                    return currentRow; // Trả về hàng nếu đã tồn tại
                }
            }
            return null; // Trả về null nếu không tồn tại
        }

        function updateTotalAmount() {
            var table = document.getElementById("dataTable");
            var totalAmount = 0;

            for (var i = 1; i < table.rows.length; i++) {
                var quantityInput = table.rows[i].cells[2].querySelector('input');
                var quantity = parseInt(quantityInput.value);
                var price = parseFloat(table.rows[i].cells[3].innerHTML);

                // Kiểm tra giá trị và xoá dòng nếu cần
                if (quantity === 0) {
                    table.deleteRow(i);
                    i--; // Đảm bảo không bị bỏ qua dòng tiếp theo sau khi xoá
                } else {
                    // Tính toán tổng tiền cho mỗi hàng và cộng vào tổng tiền chung
                    totalAmount += quantity * price;
                }
            }

            // Cập nhật nội dung của thẻ p với tổng tiền
            document.getElementById("totalAmount").innerHTML = "Tổng tiền: " + totalAmount.toLocaleString();
            console.log('totalamount',totalAmount);
            document.getElementById("price_total").value = totalAmount;

        }
        document.getElementById('productDropdown').addEventListener('click', function() {
            addRow();
            updateTotalAmount();
        });
        document.getElementById('dataTable').addEventListener('input', function() {
            updateTotalAmount();
        });

        function calculateChange() {
            // Lấy giá trị của tiền khách trả
            var customerPayment = parseFloat(document.getElementById("customerPayment").value) || 0;

            // Lấy giá trị của số điểm muốn trừ
            var pointToDeduct = parseFloat(document.getElementById("pointToDeduct").value) || 0;

            // Lấy giá trị của tổng tiền
            var totalAmount = parseFloat(document.getElementById("totalAmount").innerText.replace("Tổng tiền: ", "")
                .replace(",", "")) || 0;

            // Tính toán tiền trả khách theo yêu cầu của bạn
            var changeAmount = customerPayment + pointToDeduct * 1000 - totalAmount;

            // Hiển thị kết quả
            document.getElementById("changeAmount").innerText = "Tiền trả khách: " + changeAmount.toFixed(2);
        }
        var $productDropdown = $(".drop-down-choose-product");
        var $customerDropdown = $(".drop-down-choose-customer");
        $productDropdown.select2({
            placeholder: 'Select a product'
        });
        $customerDropdown.select2({
            placeholder: 'Select a customer'
            // ajax: {
            //     url: '/example/api',
            //     processResults: function (data) {
            //     // Transforms the top-level key of the response object from 'items' to 'results'
            //     return {
            //         // return result list product
            //         results: data.items
            //     };
            //     }
            // }
            // templateResult:formatState
        });

        $(function() {
            $(document).on('click', '.btn-add-banner', function(e) {
                e.preventDefault();

                var controlForm = $('.controls:first'),
                    currentEntry = $(this).parents('.entry:first'),
                    newEntry = $(currentEntry.clone()).appendTo(controlForm);

                newEntry.find('input').val('');
                controlForm.find('.entry:not(:last) .btn-add-banner')
                    .removeClass('btn-add-banner').addClass('btn-remove-banner')
                    .removeClass('btn-success').addClass('btn-danger')
                    .html('<span class="fa fa-trash"></span>');
            }).on('click', '.btn-remove-banner', function(e) {
                $(this).parents('.entry:first').remove();

                e.preventDefault();
                return false;
            });
        });

        $(function() {
            $(document).on('click', '.btn-add', function(e) {
                e.preventDefault();

                var controlForm = $('.controls:last'),
                    currentEntry = $(this).parents('.entry:first'),
                    newEntry = $(currentEntry.clone()).appendTo(controlForm);

                newEntry.find('input').val('');
                controlForm.find('.entry:not(:last) .btn-add')
                    .removeClass('btn-add').addClass('btn-remove')
                    .removeClass('btn-success').addClass('btn-danger')
                    .html('<span class="fa fa-trash"></span>');
            }).on('click', '.btn-remove', function(e) {
                $(this).parents('.entry:first').remove();

                e.preventDefault();
                return false;
            });
        });
        $('#btnSubmit').on('click', function() {
            // Gọi hàm xử lý khi nút được nhấn
            console.log('submit');
            handleButtonClick();
        });
        function getDataFromTable() {
            var table = document.getElementById("dataTable");
            var products = [];

            // Lặp qua từng dòng trong bảng (bỏ qua dòng tiêu đề nếu có)
            for (var i = 1; i < table.rows.length; i++) {
                var row = table.rows[i];

                var productId = row.cells[1].getAttribute("value"); // Lấy giá trị từ value của cell2
                var quantityInput = row.cells[2].querySelector('input');
                var quantityValue = quantityInput ? parseInt(quantityInput.value) : 0;

                // Thêm đối tượng vào mảng products
                var product = {
                    "id": productId,
                    "amount": quantityValue
                };

                products.push(product);
            }

            return products;
        }
        // Hàm xử lý khi nút được nhấn
        function handleButtonClick() {
            var dataToSend = {
                "customer_id": $('#userDropdown').val(),
                "customer_pointed": $('#pointToDeduct').val(),
                "invoice_code": $('#invoiceCode').text(),
                "products": getDataFromTable(),
                "price_total": $('#price_total').val(),
                "_token": "{{ csrf_token() }}",

            }
            console.log(dataToSend);
            // Thực hiện AJAX request
            $.ajax({
                url: "{{ url('/invoices/store') }}",
                type: 'POST',
                data: dataToSend,
                success: function(response) {
                    location.href = "{{ url('/invoices') }}"
                },
                error: function(error) {
                    console.error(error);
                }
            });
        }
    </script>
@endsection