<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Checkout</title>
    <link rel="stylesheet" href="{{ asset('css/checkout/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row m-0">
            <!-- Car Information Section -->
            <div class="col-lg-7 pb-5 pe-lg-5">
                <div class="row">
                    <div class="col-12 p-5">
                        <img src="{{ Storage::url($car->Images) }}" alt="{{ $car->Mobil_Name }}" class="img-fluid" />
                    </div>
                    <div class="row m-0 bg-light">
                        <div class="col-md-4 col-6 ps-30 pe-0 my-4">
                            <p class="text-muted">Luggage</p>
                            <p class="h5">{{ $car->Luggage }}</p>
                        </div>
                        <div class="col-md-4 col-6 ps-30 my-4">
                            <p class="text-muted">Doors</p>
                            <p class="h5">{{ $car->Doors }}</p>
                        </div>
                        <div class="col-md-4 col-6 ps-30 my-4">
                            <p class="text-muted">Passenger</p>
                            <p class="h5">{{ $car->Passenger }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Checkout Information Section -->
            <div class="col-lg-5 p-0 ps-lg-4">
                <div class="row m-0">
                    <div class="col-12 px-4">
                        <div class="d-flex align-items-end mt-4 mb-2">
                            <p class="h4 m-0">{{ $car->Mobil_Name }}</p>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <p class="text-muted">Price per day</p>
                            <p class="fs-14 fw-bold">
                                Rp{{ number_format($car->Price, 0, ',', '.') }}
                            </p>
                        </div>
                        <!-- Date Pickers and Total Price Calculation -->
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <div class="d-flex flex-column">
                                    <label for="start-date" class="text-muted">Start Date</label>
                                    <input type="text" id="start-date" class="form-control" placeholder="Start date">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex flex-column">
                                    <label for="end-date" class="text-muted">End Date</label>
                                    <input type="text" id="end-date" class="form-control" placeholder="End date">
                                </div>
                            </div>
                        </div>                        
                        <div class="d-flex justify-content-between mb-3">
                            <p class="text-muted fw-bold">Total</p>
                            <div class="d-flex align-text-top">
                                <span class="h4" id="total-price">Rp{{ number_format($car->Price, 0, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>
                    <!-- User Details Section -->
                    <div class="col-12 px-0">
                        <div class="row bg-light m-0">
                            <div class="col-12 px-4 my-4">
                                <p class="fw-bold">Data Diri</p>
                            </div>
                            <div class="col-12 px-4">
                                <form action="{{ route('checkout.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="car_id" value="{{ $car->id }}">
                                    <div class="row mb-4">
                                        <div class="col-md-6">
                                            <div class="d-flex flex-column">
                                                <p class="text-muted">Nama Lengkap</p>
                                                <input class="form-control" type="text" name="name" placeholder="Nama Lengkap" required />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="d-flex flex-column">
                                                <p class="text-muted">Email</p>
                                                <input class="form-control" type="email" name="email" placeholder="contoh@gmail.com" required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-md-6">
                                            <div class="d-flex flex-column">
                                                <p class="text-muted">Nomor WhatsApp</p>
                                                <input class="form-control" type="text" name="whatsapp" placeholder="0821xxx" required />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="d-flex flex-column">
                                                <p class="text-muted">Alamat</p>
                                                <input class="form-control" type="text" name="address" placeholder="Jln raya abcd" required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row m-0">
                                        <div class="col-12 mb-4 p-0">
                                            <button class="btn btn-primary" type="submit">
                                                Confirm <span class="fas fa-arrow-right ps-2"></span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#start-date, #end-date').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayHighlight: true
            });

            $('#start-date, #end-date').on('changeDate', function() {
                var startDate = $('#start-date').datepicker('getDate');
                var endDate = $('#end-date').datepicker('getDate');
                if (startDate && endDate) {
                    var timeDiff = Math.abs(endDate - startDate);
                    var daysDiff = Math.ceil(timeDiff / (1000 * 3600 * 24)) + 1; // Include start day
                    var pricePerDay = {{ $car->Price }};
                    var totalPrice = daysDiff * pricePerDay;
                    $('#total-price').text('Rp ' + totalPrice.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
                }
            });
        });
    </script>
</body>
</html>
