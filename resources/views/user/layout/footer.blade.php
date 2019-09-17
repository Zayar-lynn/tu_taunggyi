<footer>
<div class="container">
{{-- <div class="row">
<div class="col-md-12">
<div class="subscribe">
<h3>Newsletter</h3>
<form id="subscribeform" action="php/subscribe.php" method="post">
<input class="signup_form" type="text" name="email" placeholder="Enter Your Email Address">
<button type="submit" class="btn btn-warning" id="js-subscribe-btn">SUBSCRIBE</button>
<div id="js-subscribe-result" data-success-msg="Success, Please check your email." data-error-msg="Oops! Something went wrong"></div>

</form>
</div>
</div>
</div> --}}
<div class="row">
<div class="col-md-3">
<div class="foot-logo">
<a href="#">
<img src="{{url('images/tu_logo.png')}}" class="img-fluid" alt="footer_logo">
</a>
<p>Developed By: <br><a href="https://www.facebook.com/greenhackersinstitute/" target="_blank">GreenHackers Institute</a>	|
<a href="#" target="_blank">Zayy</a>	|
<a href="#" target="_blank">Naing Myint Htet</a>
</p>
</div>
</div>
<div class="col-md-3">
<div class="sitemap">
<h3>Navigation</h3>
<ul>
<li><a href="{{url('/about')}}">About</a></li>
<li><a href="{{url('/blog')}}">Blog </a></li>
<li><a href="{{url('/galley')}}">Gallery</a></li>
<li><a href="{{url('/research')}}">Research</a></li>
<li><a href="{{url('/contact')}}">Contact</a></li>
</ul>
</div>
</div>

<div class="col-md-3">
    <div class="sitemap">
        <h3>Research</h3>
        <ul>
            @foreach($researchs as $data)
                <li class="text-white">{{$data->research_title}}</li>
            @endforeach
        </ul>
    </div>
</div>
{{-- <div class="col-md-2">
<div class="tweet_box">
<h3>Tweets</h3>
<div class="tweet-wrap">
<div class="tweet"></div>

</div>
</div>
</div> --}}
<div class="col-md-3">
<div class="address">
<h3>Contact us</h3>
<p><span>Address: </span><span id="address"></span> </p>
<p>Email : <a href="http://tumkn@gmail.com" ><span id="email"></span></a></p>
<p><span>Phone :</span><span id="phone"></span></p>
<ul class="footer-social-icons">
<li><a href="https://www.facebook.com/TechnologicalUniversityTaunggyi/" target="_blank"><i class="fa fa-facebook fa-fb" aria-hidden="true"></i></a></li>
{{-- <li><a href="#"><i class="fa fa-linkedin fa-in" aria-hidden="true"></i></a></li>
<li><a href="#"><i class="fa fa-twitter fa-tw" aria-hidden="true"></i></a></li> --}}
</ul>
</div>
</div>
</div>
</div>
</footer>
