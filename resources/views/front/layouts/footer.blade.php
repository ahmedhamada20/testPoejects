<!--Footer Style Two-->


<footer class="footer-style-two">

    <div class="auto-container">

        <!--Upper Section-->
        <div class="upper-section">

            <!--Appointment Widget-->
            <div class="appointment-widget">
                <h2 style="font-family: 'Cairo', sans-serif;">ارسال الاستفسار</h2>

                <!--Appointment Form-->
                <div class="appointment-form">

                    <form method="post" action="{{ route('sendContact') }}">
                        @csrf

                        <input type="hidden" name="type_contact" value="2">

                        <div class="row clearfix">
                            <div class="form-group col-lg-4 col-md-4 col-sm-12">
                                <input type="text" name="name" value="" placeholder="الاسم" required
                                       style="font-family: 'Cairo', sans-serif;">
                            </div>
                            <div class="form-group col-lg-4 col-md-4 col-sm-12">
                                <input type="text" name="phone" value="" placeholder="رقم الهاتف" required
                                       style="font-family: 'Cairo', sans-serif;">
                            </div>
                            <div class="form-group col-lg-4 col-md-4 col-sm-12">
                                <select class="custom-select-box" style="font-family: 'Cairo', sans-serif;" name="subject" required>
                                    <option value="" disabled selected style="font-family: 'Cairo', sans-serif;">اختر من
                                        القائمه
                                    </option>

                                    @foreach(CategoryHome() as $data)
                                     <option value="{{ $data->name }}">{{ $data->name }}</option>

                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-lg-4 col-md-4 col-sm-12">
                               
                                    {!! NoCaptcha::renderJs() !!}
                                    <div class="col-md-6">
                                        {!! app('captcha')->display() !!}
                                        @if ($errors->has('g-recaptcha-response'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                
                            </div>
                            <button type="submit" class="theme-btn btn-style-three"
                                    style="font-family: 'Cairo', sans-serif;"><span
                                    class="arrow flaticon-right-arrow-4"></span>ارسال
                            </button>
                        </div>
                    </form>

                </div>

            </div>

            <!--Footer Info Block-->
            <div class="footer-info-block">
                <div class="clearfix">

                    <!--Social Box-->
                    <div class="social-outer text-center">
                        <!--Social Icon Two-->
                        <ul class="social-icon-two">
                            <li><a href="{{settingSite()->facebook}}" target="_blank"><span
                                        class="fa fa-facebook"></span></a></li>
                            <li><a href="{{settingSite()->twitter}}" target="_blank"><span class="fa fa-twitter"></span></a>
                            </li>
                            <li><a href="{{settingSite()->instagram}}" target="_blank"><span
                                        class="fa fa-instagram"></span></a></li>
                            <li><a href="{{settingSite()->YouTube}}" target="_blank"><span
                                        class="fa fa-youtube-play"></span></a></li>
                        </ul>
                    </div>

                    <!--Pull Left-->
                    <div class="pull-left">
                        <div class="text" style="font-family: 'Cairo', sans-serif;">{{settingSite()->phone}}
                            <br> {{settingSite()->email}}</div>
                    </div>

                    <div class="pull-right">
                        <div class="text" style="font-family: 'Cairo', sans-serif;">{{settingSite()->address}}</div>
                    </div>

                </div>
            </div>

        </div>

        <!--Foter Bottom-->
        <div class="footer-bottom">
            <div class="clearfix">
                <div class="row">
                    <div class="col">
                        <!--Logo Box-->
                        <div class="logo-box">
                            <a href="{{route('website')}}"><img src="{{asset(settingSite()->image)}}" alt=""/></a>
                        </div>

                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-lg-8">
                        <div class="column">
                            <div class="text"> {{date('Y')+1}} – {{date('Y')}} © All rights reserved by <a href="https://faroukgroup.com/">Farouk Group</a></div>
                        </div>
                    </div>
                </div>


            </div>
        </div>

    </div>


</footer>


<!--End Footer Style Two-->
