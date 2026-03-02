<section class="contactus">
  <div class="contactpart">
    {{-- <h1>Contact Us</h1> --}}
     <h1>@yield('page_title')</h1>
  </div>
</section>

<style>
.contactus {
  width: 100%;
  min-height: 28vh;
  background-image: url({{ asset("images/picture/contact_us_image.png") }});
  background-repeat: no-repeat;
  background-position: center;
  background-size: cover;
  position: relative;
  display: flex;
  align-items: center;
  justify-content: center;
}

/* Overlay */
.contactus::before {
  content: "";
  position: absolute;
  top: 0; left: 0;
  width: 100%; height: 100%;
  background-color: rgba(46, 48, 138, 0.4);
  z-index: 1;
}

.contactpart {
  position: relative;
  z-index: 2;
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
}

.contactpart h1 {
  color: #fff;
  font-size: 40px;
  font-weight: 500;
  text-align: center;
  padding: 0 15px; /* mobile padding */
}
</style>
