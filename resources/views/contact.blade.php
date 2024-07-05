@extends('layouts.app')

@section('content')
<section class="py-5">
    <div class="container px-5">

        @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
        {{ session('success') }}
        </div>
    @endif

    @if(session()->has('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif
    
        <!-- Contact form-->
        <div class="bg-light rounded-4 py-5 px-4 px-md-5">
            <div class="text-center mb-5">
                <div class="feature bg-primary bg-gradient-primary-to-secondary text-white rounded-3 mb-3"><i class="bi bi-envelope"></i></div>
                <h1 class="fw-bolder">Get in touch</h1>
                <p class="lead fw-normal text-muted mb-0">Let's Say Something!</p>
            </div>
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-8 col-xl-6">
  
                    <!-- to get an API token!-->
                    <form method="POST" action="{{ route('contactsend') }}">

                        @csrf

                        <!-- Name input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="nama" name="nama" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                            <label for="nama">Full name</label>
                            <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                        </div>

                        <!-- Email address input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="email" name="email" type="email" placeholder="name@example.com" data-sb-validations="required,email" />
                            <label for="email">Email address</label>
                            <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                            <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                        </div>
                        
                        <!-- Phone number input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="nomor_hp" name="nomor_hp" type="tel" placeholder="(123) 456-7890" data-sb-validations="required" />
                            <label for="nomor_hp">Phone number</label>
                            <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" id="pesan" name="pesan_user" placeholder="Enter your message here..." style="height: 10rem" required></textarea>
                            <label for="pesan">Message</label>
                            <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                        </div>
                        
                        <!-- Submit success message -->
                        <div class="alert alert-success" role="alert" style="display: none;" id="submit-success-message">
                            This is what your users will see when the form has successfully submitted
                        </div>
                        <div class="d-none" id="submitSuccessMessage">
                            <div class="text-center mb-3">
                                <div class="fw-bolder">Form submission successful!</div>
                                To activate this form, sign up at
                                <br />
                                <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                            </div>
                        </div>
                        
                        <!-- an error submitting the form-->
                        <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>

                        <!-- Submit Button-->
                        <div class="d-grid"><button class="btn btn-primary btn-lg" id="submitButton" type="submit">Submit</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('contactForm');
        form.addEventListener('submit', function (event) {
            event.preventDefault();
            fetch(form.action, {
                method: 'POST',
                body: new FormData(form),
                headers: {
                    'Accept': 'application/json',
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.message) {
                    alert(data.message);
                } else {
                    alert('Error sending message!');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error sending message!');
            });
        });
    });
</script>

@endsection