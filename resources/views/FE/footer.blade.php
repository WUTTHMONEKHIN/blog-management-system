<footer class="oleez-footer wow fadeInUp">
    <div class="container">
        <div class="footer-content">
            <div class="row">
                <div class="col-md-4">
                    <img src="{{ asset('assets/FE/assets/images/Logo_1.svg') }}" alt="oleez" class="footer-logo">
                    <p class="footer-intro-text">Don't be shy, get in touch with us and create the world again!</p>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-6 footer-widget-text">
                            <h6 class="widget-title">PHONE</h6>
                            <p class="widget-content">
                                <a href="tel:+959965585369" style="tetext-decoration: unset; color:white">+95 (9) 965585369</a>
                            </p>
                        </div>
                        <div class="col-md-6 footer-widget-text">
                            <h6 class="widget-title">ADDRESS</h6>
                            <p class="widget-content">Letpadan , <br> Bago , <br> Myanmar</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12 footer-widget-text">
                            <h6 class="widget-title">About Us</h6>
                            <p class="widget-content">A design and development agency based in London. We create digital
                                products that make people’s lives easier.</p>
                        </div>
                    </div>
                </div>
            </div>
            @auth
                @if (!$subscribe)
                    <div class="row">
                        <div class="col-md-4 wow fadeInRight">
                            <form action="{{ url('subscribe') }}" class="oleez-contact-form" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="fullName" style="color:#f7b500;">Your Email Address</label>
                                    <input readonly type="email" class="oleez-input" id="fullName"
                                        value="{{ auth()->user()->email }}" name="email" required>
                                </div>
                                <button type="submit" class="btn btn-submit">Subscribe</button>
                            </form>
                        </div>
                    </div>
                @endif
            @endauth
        </div>
        <div class="footer-text">
            <p class="mb-md-0">© <?= date('Y') ?>, Blog System. Made with passion by <a
                    href="https://GitHub.com/WUTTHMONEKHIN" target="_blank" rel="noopener noreferrer"
                    class="text-reset">Wutthmone Khin</a>.</p>
            <p class="mb-0">All right reserved.</p>
        </div>
    </div>
</footer>
