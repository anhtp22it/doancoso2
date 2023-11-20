@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-12">
                    <div class="position-relative text-center">
                        <h2 class="text-black">Contact Us</h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-start justify-content-between">
                <div class="col-lg-4 col-12">
                    <div class="card-body mb-4 rounded p-3" style="background-color: #eef7f8">
                        <h5 class="mb-3 theme-cl">Make a Call</h5>
                        <p>
                            470 Tran Dai Nghia Street, Hoa Quy Ward, <br />
                            Đà Nẵng City
                        </p>
                        <p class="lh-1">
                            <span class="text-dark fw-bold">Email:</span>
                            anhtp.22it@vku.udn.vn
                        </p>
                    </div>
                    <div class="card-body mb-4 rounded p-3" style="background-color: #eef7f8">
                        <h5 class="mb-3 theme-cl">Make a Call</h5>
                        <h6 class="mb-1 text-black">Customer Care:</h6>
                        <p class="mb-2">+84-773-605-741</p>
                        <h6 class="mb-1 text-black">Careers:</h6>
                        <p>+84-987-999-4686</p>
                    </div>
                    <div class="card-body mb-4 rounded p-3" style="background-color: #eef7f8">
                        <h5 class="mb-3 theme-cl">Drop A Mail</h5>
                        <p>
                            Fill out our form and we will contact you within 24 hours.
                        </p>
                        <p class="lh-1 text-dark">anhtp.22it@vku.udn.vn</p>
                        <p class="lh-1 text-dark">lanhntm.22it@vku.udn.vn</p>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-8 col-12">
                    <form action="" class="row">
                        <div class="col-12">
                            <div class="form-group mb-3">
                                <label class="text-dark fs-6" for="name">Your name *</label>
                                <input class="form-control shadow-none" style="padding: 10px 15px" type="text"
                                    name="name" placeholder="Your Name" />
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group mb-3">
                                <label class="text-dark fs-6" for="name">Your Email *</label>
                                <input class="form-control shadow-none" style="padding: 10px 15px" type="email"
                                    name="email" placeholder="Your Email" />
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group mb-3">
                                <label class="text-dark fs-6" for="name">Subject</label>
                                <input class="form-control shadow-none" style="padding: 10px 15px" type="text"
                                    name="subject" placeholder="Type Your Subject" />
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group mb-3">
                                <label class="text-dark fs-6" for="name">Message</label>
                                <input class="form-control shadow-none" style="padding: 10px 15px" type="text"
                                    name="message" />
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-dark p-3 rounded-0">
                                    Send Message
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
