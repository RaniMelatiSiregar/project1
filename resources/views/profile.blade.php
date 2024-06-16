@extends('layouts.app')

@section('content')


            <!-- Page Content-->
            <div class="container px-5 my-5">
                <div class="text-center mb-5">
                    <h1 class="display-5 fw-bolder mb-0"><span class="text-gradient d-inline">Profile</span></h1>
                </div>
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-11 col-xl-9 col-xxl-8">
                        <!-- Experience Section-->
                        <section>
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h2 class="text-primary fw-bolder mb-0">Experience</h2>
                                <!-- Download resume button-->
                                <!-- Note: Set the link href target to a PDF file within your project-->
                                <a class="btn btn-primary px-4 py-3" href="#!">
                                    <div class="d-inline-block bi bi-download me-2"></div>
                                    Download Resume
                                </a>
                            </div>
                            @foreach ($profiles as $profiles)
                            <!-- Experience Card 1-->
                            <div class="card shadow border-0 rounded-4 mb-5">
                                <div class="card-body p-5">
                                    <div class="row align-items-center gx-5">
                                        <div class="col text-center text-lg-start mb-4 mb-lg-0">
                                            <div class="bg-light p-4 rounded-4">
                                                
                                                
                                                {{-- <div class="small fw-bolder">Web Developer</div>
                                                <div class="small text-muted">Stark Industries</div>
                                                <div class="small text-muted">Los Angeles, CA</div> --}}
                                            </div>
                                        </div>

                                        <div class="mb-5 row align-items-center col-lg-4 order-lg-2 d-flex justify-content-center">
                                                @if ($profiles->image)
                                                  <img src="{{ asset('storage/' . $profiles->image) }}" class="img-fluid rounded-start" alt="Profile Image">
                                                @else
                                                  <img src="https://source.unsplash.com/500x500?{{ $profiles->name }}" class="img-fluid rounded-start" alt="Profile Image">
                                                @endif
                                              </div>

            
                                                <div class="text-primary fw-bolder mb-2">{{$profiles->title}}</div>
                                                
                                        <div class="col-lg-8"><div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus laudantium, voluptatem quis repellendus eaque sit animi illo ipsam amet officiis corporis sed aliquam non voluptate corrupti excepturi maxime porro fuga.</div></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <!-- Experience Card 2-->
                            
                                    <!-- Languages list-->
                               
                        </section>
                    </div>
                </div>
            </div>

@endsection