@extends('welcome')
@section('content')
<section class="page-section mt-5 mb-5">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">CONTACT</h2>
            <br> <br>
        </div>
        <div class="row">
            <div class="col-lg-6 col-sm-12 col-12">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2728.387211356732!2d108.2525482535405!3d15.976340217417455!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x1295cb3d313469c9!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBDw7RuZyBuZ2jhu4cgVGjDtG5nIHRpbiB2w6AgVHJ1eeG7gW4gdGjDtG5nIFZp4buHdCAtIEjDoG4!5e0!3m2!1svi!2s!4v1619965555232!5m2!1svi!2s" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
            <div class="col-lg-6 col-sm-12 col-12">
                <h2 class="text-center mt-3">contact</h2>
                <form action="{{URL::to('Auth/Feedback')}}" method="post">
                {{csrf_field()}}
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="text" class="form-control mt-2" placeholder="First Name" name="firstname" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="text" class="form-control mt-2" placeholder="Last Name" name="lastname" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="email" class="form-control mt-2" placeholder="E-mail" name="email" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="text" class="form-control mt-2" placeholder="Phone Number" name="phonenumber" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Message" rows="3" name="message" required></textarea>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                                    <label class="form-check-label" for="invalidCheck2">
                                        Agree to receive emails
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 text-right">
                            <button class="btn btn-primary" type="submit">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
