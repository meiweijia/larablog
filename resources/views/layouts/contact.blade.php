@extends('layouts.main')
@section('content')
<div class="col-md-12 blog-post">



    <!-- Intro Start -->
    <div class="post-title margin-bottom-10">
        <h1>Looking for a <span class="main-color">online presence</span>?</h1>
    </div>

    <p>I am in the website field since 2004 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin at quam at orci commodo hendrerit vitae nec eros. Vestibulum neque est, imperdiet nec tortor nec, tempor semper metus. <b>I am a developer</b>, et accumsan nisi. Duis laoreet pretium ultricies. Curabitur rhoncus auctor nunc congue sodales. Sed posuere nisi ipsum, eget dignissim nunc dapibus eget. Aenean elementum sollicitudin sapien ut sapien fermentum aliquet mollis. Curabitur ac quam orci sodales quam ut tempor.</p>
    <!-- Intro End -->



    <!-- Testimonials Start -->
    <div class="post-title margin-top-50">
        <h2>I hope you've checked <a href="work.html" data-toggle="tooltip" data-placement="top" title="Check out my work.">my work</a>, Let's take a look on what other clients said about my work.</h2>
    </div>


    <div class="row">

        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="testimonial-content">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin at quam at orci commodo hendrerit vitae nec eros. Vestibulum neque est, imperdiet nec tortor nec, tempor semper metus.</p>
            </div>

            <div class="testimonial-client-info">

                <div class="testimonial-client client-thumb">
                    <img src="images/testimonial/1.png" alt="">
                </div>

                <div class="client-text">
                    <div class="client-name">Jhon Doe</div>
                    <span>Rolling LTD, Founder</span>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="testimonial-content">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin at quam at orci commodo hendrerit vitae nec eros. Vestibulum neque est, imperdiet nec tortor nec, tempor semper metus.</p>
            </div>

            <div class="testimonial-client-info">

                <div class="testimonial-client client-thumb">
                    <img src="images/testimonial/2.png" alt="">
                </div>

                <div class="client-text">
                    <div class="client-name">Jhon Doe</div>
                    <span>WebRes LTD, Founder</span>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="testimonial-content">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin at quam at orci commodo hendrerit vitae nec eros. Vestibulum neque est, imperdiet nec tortor nec, tempor semper metus.</p>
            </div>

            <div class="testimonial-client-info">

                <div class="testimonial-client client-thumb">
                    <img src="images/testimonial/3.png" alt="">
                </div>

                <div class="client-text">
                    <div class="client-name">Jhon Doe</div>
                    <span>WeSoon LTD, Founder</span>
                </div>
            </div>
        </div>

    </div>
    <!-- Testimonials  End -->




    <!-- Contact Me Start -->
    <div class="post-title margin-top-70">
        <h1>Contact <span class="main-color">Me</span></h1>
    </div>


    <div class="row">

        <div class="col-md-4 col-sm-4">
            <div class="contact-us-detail">
                <i class="icon-screen-smartphone color-6"></i>
                <p><a href="tel:+1234567890">+1234 567 890</a></p>
            </div>
        </div>

        <div class="col-md-4 col-sm-4">
            <div class="contact-us-detail">
                <i class="icon-envelope-open color-5"></i>
                <p><a href="mailto:name@domain.com">name@domain.com</a></p>
            </div>
        </div>

        <div class="col-md-4 col-sm-4">
            <div class="contact-us-detail">
                <i class="icon-clock color-3"></i>
                <p>Mon - Fri 09:00 – 18:00</p>
            </div>
        </div>

    </div>


    <div class="row margin-top-30">
        <div class="col-md-12">

            <div class="row">
                <form>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <input type="text" id="name" class="form-control" placeholder="Your Name">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <input type="email" id="email" class="form-control" placeholder="Your Email">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <input type="text" id="website" class="form-control" placeholder="Your Website">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <input type="text" id="address" class="form-control" placeholder="Where are You From?">
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <select id="subject" class="form-group form-control">
                            <option value="" selected disabled>Subject</option>
                            <option>Website Design & Development</option>
                            <option>Wordpress Development</option>
                            <option>Search Engine Optimization</option>
                            <option>Mobile Website</option>
                            <option>I Want to General Talk</option>
                            <option>Other</option>
                        </select>
                    </div>

                    <div class="col-sm-12">
                        <div class="textarea-message form-group">
                            <textarea id="message" class="textarea-message form-control" placeholder="Your Message" rows="5"></textarea>
                        </div>
                    </div>


                    <div class="text-center">
                        <button type="submit" class="load-more-button">Send</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <!-- Contact Me End -->


</div>
@endsection