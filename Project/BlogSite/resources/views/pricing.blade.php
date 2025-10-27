@extends('component.home')
@section('title', 'Pricing Plans')
@section('main-section')
    <section class="hero">
        <div class="container text-center">
            <h1 class="fw-bold" style="font-size:2rem">Pick Best The Plan</h1>
            <p class="text-muted mb-5">Take your desired plan to get access to our content easily, we like to offer
                special license offer to our users.</p>
            @if(session('message'))
                <div class="alert alert-danger text-center">
                    {{ session('message') }}
                </div>
            @endif
            <div class="row g-4 justify-content-center">
                <!-- Card 1 -->
                <div class="col-12 col-md-6 col-lg-4 d-flex">
                    <div class="pricing-card w-100">
                        <div>
                            <h5 class="text-center pricing-title">BASIC</h5>
                            <div class="accent"></div>
                            <div class="text-center mt-4">
                                <div class="price">Rs 100</div>
                                <small>Per Month</small>
                            </div>

                            <hr class="my-3">

                            <ul class="feature-list">
                                <li><i class="bi bi-check-circle-fill text-info"></i> All Features</li>
                                <li><i class="bi bi-check-circle-fill text-info"></i> Chat Support</li>
                                <li><i class="bi bi-check-circle-fill text-info"></i> 50 Audio & Video Calls Free</li>
                            </ul>
                        </div>

                        <div class="text-center">
                            <form action="{{ route('subscribe') }}" method="post">
                                @csrf
                                <input type="hidden" name="plan" value="month">
                                <input type="hidden" name="amount" value="200">
                                <input type="hidden" name="pid" value="{{ time() }}">
                                <button class="btn btn-info w-100 select-btn text-white" type="submit">SELECT PLAN</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="col-12 col-md-6 col-lg-4 d-flex">
                    <div class="pricing-card w-100">
                        <div>
                            <h5 class="text-center pricing-title">STANDARD</h5>
                            <div class="accent"></div>

                            <div class="text-center mt-4">
                                <div class="price">Rs 1,000</div>
                                <small>Per Year</small>
                            </div>

                            <hr class="my-3">

                            <ul class="feature-list">
                                <li><i class="bi bi-check-circle-fill text-info"></i> All Features</li>
                                <li><i class="bi bi-check-circle-fill text-info"></i> Chat Support</li>
                                <li><i class="bi bi-check-circle-fill text-info"></i> HD Quality</li>
                                <li><i class="bi bi-check-circle-fill text-info"></i> Vat Features</li>
                                <li><i class="bi bi-check-circle-fill text-info"></i> 50 Audio & Video Calls Free</li>
                            </ul>
                        </div>

                        <div class="text-center">
                            <form action="{{ route('subscribe') }}" method="post">
                                @csrf
                                <input type="hidden" name="plan" value="year">
                                <input type="hidden" name="amount" value="1000">
                                <input type="hidden" name="pid" value="{{ time() }}">
                                <button class="btn btn-info w-100 select-btn text-white" type="submit">SELECT PLAN</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="col-12 col-md-6 col-lg-4 d-flex">
                    <div class="pricing-card w-100">
                        <div>
                            <h5 class="text-center pricing-title">PREMIUM</h5>
                            <div class="accent"></div>

                            <div class="text-center mt-4">
                                <div class="price">Rs 2,000</div>
                                <small>Unlimited</small>
                            </div>

                            <hr class="my-3">

                            <ul class="feature-list">
                                <li><i class="bi bi-check-circle-fill text-info"></i> All Features</li>
                                <li><i class="bi bi-check-circle-fill text-info"></i> Chat Support</li>
                                <li><i class="bi bi-check-circle-fill text-info"></i> Vat Features</li>
                                <li><i class="bi bi-check-circle-fill text-info"></i> Ultra HD Quality</li>
                                <li><i class="bi bi-check-circle-fill text-info"></i> Unlimited Users</li>
                                <li><i class="bi bi-check-circle-fill text-info"></i> Unlimited Audio & Video Call</li>
                            </ul>
                        </div>

                        <div class="text-center">
                            <form action="{{ route('subscribe') }}" method="post">
                                @csrf
                                <input type="hidden" name="plan" value="premium">
                                <input type="hidden" name="amount" value="2000">
                                <input type="hidden" name="pid" value="{{ time() }}">
                                <button class="btn btn-info w-100 select-btn text-white" type="submit">SELECT PLAN</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection