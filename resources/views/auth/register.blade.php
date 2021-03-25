@extends('layouts.app')

@section('content')
<style>
    .kt-checkbox {
            display: inline-block;
            position: relative;
            margin-bottom: 10px;
            text-align: left;
            cursor: pointer;
            font-size: 1rem;
            -webkit-transition: all .3s ease;
            transition: all .3s ease;
        }

        .star-red{
            color: red;
            font-size: 0.8em; 
        }

        #privacyContent {
            height: 300px;
            position: relative;
            border-top: 1px solid #eae7e7;

        }
     .success-muted-note {
            color: #34bfa3 !important;
            font-weight: 600 !important;
        }

            div.ex1 {
                background: #eee;
                height: 400px;
                overflow: scroll;
}

</style>

        {{-- Favicon --}}
        <link rel="shortcut icon" href="{{ asset('media/logos/favicon.ico') }}" />

        {{-- Fonts --}}
        {{ Metronic::getGoogleFontsInclude() }}

        {{-- Global Theme Styles (used by all pages) --}}
        @foreach(config('layout.resources.css') as $style)
            <link href="{{ config('layout.self.rtl') ? asset(Metronic::rtlCssPath($style)) : asset($style) }}" rel="stylesheet" type="text/css"/>
        @endforeach

        {{-- Layout Themes (used by all pages) --}}
        @foreach (Metronic::initThemes() as $theme)
            <link href="{{ config('layout.self.rtl') ? asset(Metronic::rtlCssPath($theme)) : asset($theme) }}" rel="stylesheet" type="text/css"/>
        @endforeach

        {{-- Includable CSS --}}
        @yield('styles')


<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
<link rel="stylesheet" href="{{URL::asset('assets/wizard-2.css')}}">
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    @include('includes.alerts')
    <div class="container">
        <div class="card card-custom">
            <div class="card-body p-0">
                <!--begin: Wizard-->
                <div class="wizard wizard-2" id="kt_wizard" data-wizard-state="step-first" data-wizard-clickable="false">
                    <!--begin: Wizard Nav-->
                    <div class="wizard-nav border-right py-8 px-8 py-lg-20 px-lg-10">
                        <!--begin::Wizard Step 1 Nav-->
                        <div class="wizard-steps">
                            <div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
                                <div class="wizard-wrapper">
                                    <div class="wizard-icon">
                                        <span class="svg-icon svg-icon-2x">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24" />
                                                    <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                    <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </div>
                                    <div class="wizard-label">
                                        <h3 class="wizard-title">Account Settings</h3>
                                        <div class="wizard-desc">Setup Your Account Details</div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Wizard Step 1 Nav-->
                            <!--begin::Wizard Step 2 Nav-->
                            <div class="wizard-step" data-wizard-type="step">
                                <div class="wizard-wrapper">
                                    <div class="wizard-icon">
                                        <span class="svg-icon svg-icon-2x">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Map/Compass.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path d="M12,21 C7.02943725,21 3,16.9705627 3,12 C3,7.02943725 7.02943725,3 12,3 C16.9705627,3 21,7.02943725 21,12 C21,16.9705627 16.9705627,21 12,21 Z M14.1654881,7.35483745 L9.61055177,10.3622525 C9.47921741,10.4489666 9.39637436,10.592455 9.38694497,10.7495509 L9.05991526,16.197949 C9.04337012,16.4735952 9.25341309,16.7104632 9.52905936,16.7270083 C9.63705011,16.7334903 9.74423017,16.7047714 9.83451193,16.6451626 L14.3894482,13.6377475 C14.5207826,13.5510334 14.6036256,13.407545 14.613055,13.2504491 L14.9400847,7.80205104 C14.9566299,7.52640477 14.7465869,7.28953682 14.4709406,7.27299168 C14.3629499,7.26650974 14.2557698,7.29522855 14.1654881,7.35483745 Z" fill="#000000" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </div>
                                    <div class="wizard-label">
                                        <h3 class="wizard-title">Personal Details</h3>
                                        <div class="wizard-desc">Enter your personal details</div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Wizard Step 2 Nav-->
                            <!--begin::Wizard Step 3 Nav-->
                            <div class="wizard-step" data-wizard-type="step">
                                <div class="wizard-wrapper">
                                    <div class="wizard-icon">
                                        <span class="svg-icon svg-icon-2x">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/General/Thunder-move.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path d="M16.3740377,19.9389434 L22.2226499,11.1660251 C22.4524142,10.8213786 22.3592838,10.3557266 22.0146373,10.1259623 C21.8914367,10.0438285 21.7466809,10 21.5986122,10 L17,10 L17,4.47708173 C17,4.06286817 16.6642136,3.72708173 16.25,3.72708173 C15.9992351,3.72708173 15.7650616,3.85240758 15.6259623,4.06105658 L9.7773501,12.8339749 C9.54758575,13.1786214 9.64071616,13.6442734 9.98536267,13.8740377 C10.1085633,13.9561715 10.2533191,14 10.4013878,14 L15,14 L15,19.5229183 C15,19.9371318 15.3357864,20.2729183 15.75,20.2729183 C16.0007649,20.2729183 16.2349384,20.1475924 16.3740377,19.9389434 Z" fill="#000000" />
                                                    <path d="M4.5,5 L9.5,5 C10.3284271,5 11,5.67157288 11,6.5 C11,7.32842712 10.3284271,8 9.5,8 L4.5,8 C3.67157288,8 3,7.32842712 3,6.5 C3,5.67157288 3.67157288,5 4.5,5 Z M4.5,17 L9.5,17 C10.3284271,17 11,17.6715729 11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L4.5,20 C3.67157288,20 3,19.3284271 3,18.5 C3,17.6715729 3.67157288,17 4.5,17 Z M2.5,11 L6.5,11 C7.32842712,11 8,11.6715729 8,12.5 C8,13.3284271 7.32842712,14 6.5,14 L2.5,14 C1.67157288,14 1,13.3284271 1,12.5 C1,11.6715729 1.67157288,11 2.5,11 Z" fill="#000000" opacity="0.3" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </div>
                                    <div class="wizard-label">
                                        <h3 class="wizard-title">Business Detail</h3>
                                        <div class="wizard-desc">Add your business detail</div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Wizard Step 3 Nav-->
                            
                            <!--begin::Wizard Step 6 Nav-->
                            <div class="wizard-step" data-wizard-type="step">
                                <div class="wizard-wrapper">
                                    <div class="wizard-icon">
                                        <span class="svg-icon svg-icon-2x">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/General/Like.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path d="M9,10 L9,19 L10.1525987,19.3841996 C11.3761964,19.7920655 12.6575468,20 13.9473319,20 L17.5405883,20 C18.9706314,20 20.2018758,18.990621 20.4823303,17.5883484 L21.231529,13.8423552 C21.5564648,12.217676 20.5028146,10.6372006 18.8781353,10.3122648 C18.6189212,10.260422 18.353992,10.2430672 18.0902299,10.2606513 L14.5,10.5 L14.8641964,6.49383981 C14.9326895,5.74041495 14.3774427,5.07411874 13.6240179,5.00562558 C13.5827848,5.00187712 13.5414031,5 13.5,5 L13.5,5 C12.5694044,5 11.7070439,5.48826024 11.2282564,6.28623939 L9,10 Z" fill="#000000" />
                                                    <rect fill="#000000" opacity="0.3" x="2" y="9" width="5" height="11" rx="1" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </div>
                                    <div class="wizard-label">
                                        <h3 class="wizard-title">Privacy Policy</h3>
                                        <div class="wizard-desc">Our Privacy Policy</div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Wizard Step 6 Nav-->
                        </div>
                    </div>
                    <!--end: Wizard Nav-->
                    <!--begin: Wizard Body-->
                    <div class="wizard-body py-8 px-8 py-lg-20 px-lg-10">
                        <!--begin: Wizard Form-->
                        <div class="row">
                            <div class="offset-xxl-2 col-xxl-8">
                                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="form" id="kt_form">
                                    @csrf
                                    <!--begin: Wizard Step 1-->
                                    <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                                        <h4 class="mb-10 font-weight-bold text-dark">Enter your Account Details</h4>
                                        <!--begin::Input-->
                                        <!--begin::Select-->
                                       
                                        <div class="row">
                                          
                                        
                                        </div> 
                                        <div class="row">

                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>First Name <span class="star-red">*</span></label>
                                                <input type="text" class="form-control form-control-solid form-control-lg" name="fname" placeholder="First Name" value="{{ old('fname') }}" />
                                                <span class="form-text text-muted">Please enter your first name.</span>
                                            </div>
                                        </div>
                                        
                                        <!--end::Input-->
                                        <!--begin::Input-->
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Middle Name</label>
                                                <input type="text" class="form-control form-control-solid form-control-lg" name="mname" placeholder="Last Name" value="{{ old('mname') }}" />
                                                <span class="form-text text-muted">Please enter your middle name.</span>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Last Name<span class="star-red">*</span></label>
                                                <input type="text" class="form-control form-control-solid form-control-lg" name="lname" placeholder="Last Name" value="{{ old('lname') }}" />
                                                <span class="form-text text-muted">Please enter your last name.</span>
                                            </div>
                                        </div>

                                    </div>
                                        
                                        
                                        <!--end::Input-->
                                        <div class="row">
                                            
                                            <div class="col-xl-6">
                                                <!--begin::Input-->
                                                <div class="form-group">
                                                    <label>Email<span class="star-red">*</span></label>
                                                    <input type="email" class="form-control form-control-solid form-control-lg" name="email" value="{{ old('email') }}" placeholder="Email"  />
                                                    @error('email')
                                                        <span class="text-danger form-text" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    <span class="form-text text-muted">Please enter your email address.</span>
                                                </div>
                                                <!--end::Input-->
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Select Your Country<span class="star-red">*</span> </label>
                                                    <select id="country" name="country" class="form-control form-control-solid form-control-lg">
                                                        
                                                        <option value="CA">🇨🇦  Canada</option>
                                                        
                                                        <option value="PK">🇵🇰  Pakistan</option>
                                                        
                                                        <option value="AE">🇦🇪  United Arab Emirates</option>
                                                        
                                                        <option value="US">🇺🇸  United States</option>
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            
                                            <div class="col-xl-6">
                                                <!--begin::Input-->
                                                <div class="form-group">
                                                    <label>Password<span class="star-red">*</span></label>
                                                    <input type="password" id="pass" class="form-control form-control-solid form-control-lg" name="password" placeholder="Password"  />
                                                   
                                                    <span class="form-text" id="pass_upper_note"> 1 Uppercase</span>
                                                    
                                                    <span class="form-text" id="pass_lower_note">1 Lowercase</span>
                                                
                                                    <span class="form-text" id="pass_numeric_note"> 1 Numeric</span>
                                                    
                                                    <span class="form-text" id="pass_special_note"> 1 Special Character</span>
                                                    
                                                    <span class=" form-text" id="pass_length_note" > Atleast 8 character long</span>
                                                </div>
                                                <!--end::Input-->
                                            </div>
                                            <div class="col-xl-6">
                                                <!--begin::Input-->
                                                <div class="form-group">
                                                    <label>Confirm Password<span class="star-red">*</span></label>
                                                    <input type="password" class="form-control form-control-solid form-control-lg" name="cpassword" placeholder="confirm password" id="cpassword" />
                                                    <span class="form-text text-muted">Please confirm your password.</span>
                                                </div>
                                                <!--end::Input-->
                                            </div>
                                        </div>

                                    </div>
                                    <!--end: Wizard Step 1-->
                                    <!--begin: Wizard Step 2-->
                                    <div class="pb-5" data-wizard-type="step-content">
                                        <h4 class="mb-10 font-weight-bold text-dark">Setup Your Current Location</h4>
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <!--begin::Input-->
                                                <div class="form-group">
                                                    <label>Address Line 1<span class="star-red">*</span> </label>
                                                    <input type="text" class="form-control form-control-solid form-control-lg" name="address_1" placeholder="Address Line 1" value="{{old('address_1')}}" />
                                                    <span class="form-text text-muted">Please enter your Address.</span>
                                                </div>
                                                <!--end::Input-->
                                            </div>
                                            <div class="col-xl-6">
                                                <!--begin::Input-->
                                                <div class="form-group">
                                                    <label>Address Line 2</label>
                                                    <input type="text" class="form-control form-control-solid form-control-lg" name="address_2" placeholder="Address Line 2" value="{{old('address_2')}}" />
                                                    <span class="form-text text-muted">Please enter your Address.</span>
                                                </div>
                                                <!--end::Input-->
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <!--begin::Input-->
                                                <div class="form-group">
                                                    <label>Postcode<span class="star-red">*</span> </label>
                                                    <input type="text" class="form-control form-control-solid form-control-lg" name="post_code" placeholder="Postcode" value="{{old('post_code')}}" id="post_code"  />
                                                    <span id="pText">Please enter a valid postal code</span>
                                                    <span class="form-text text-muted">Please enter your Postcode.</span>
                                                </div>
                                                <!--end::Input-->
                                            </div>
                                            <div class="col-xl-6">
                                                <!--begin::Input-->
                                                <div class="form-group">
                                                    <label>City<span class="star-red">*</span></label>
                                                    <select class="form-control form-control-solid form-control-lg"  disabled="disabled" name="city" id="city">
                                                        
                                                    </select>
                                                    
                                                    <span class="form-text text-muted">Please enter your City.</span>
                                                </div>
                                                <!--end::Input-->
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <!--begin::Input-->
                                                <div class="form-group">
                                                    <label>State<span class="star-red">*</span> </label>
                                                    <select class="form-control form-control-solid form-control-lg"  disabled="disabled" name="state" id="state">
                                                        
                                                    </select>
                                                    <span class="form-text text-muted">Please enter your State.</span>
                                                </div>
                                                <!--end::Input-->
                                            </div>

                                            <div class="col-xl-6">
                                                <!--begin::Input-->
                                                <div class="form-group">
                                                    <label>Phone<span class="star-red">*</span></label>
                                                    <input type="text"
                                                    class="form-control form-control-solid form-control-lg" name="phone" value="{{ old('phone') }}" placeholder="phone"  id="phone" />
                                                    <span id="vPhone">Please enter valid phone number</span>
                                                    <span class="form-text text-muted">Please enter your phone number.</span>
                                                </div>
                                                <!--end::Input-->
                                            </div>
                                            <div class="col-xl-6" id="hide-id-1">
                                                <div class="form-group">
                                                    <label>Upload front of ID card</label>
                                                    {{-- <div></div> --}}
                                                    <div class="custom-file">
                                                     <input name="id1" type="file" class="custom-file-input" id="id1"/>
                                                     <label class="custom-file-label" for="id1" id="ids1">Choose image</label>
                                                    </div>
                                                </div>
                                                   

                                            </div>
                                            <div class="col-xl-6" id="hide-id-2">
                                                <div class="form-group">
                                                    <label>Upload Back of Id card</label>
                                                    <div></div>
                                                    <div class="custom-file">
                                                     <input name="id2" type="file" class="custom-file-input" id="id2"/>
                                                     <label class="custom-file-label" for="id2" id="ids2">Choose images</label>
                                                    </div>
                                                   </div>

                                         
                                            
                                              </div>
                                            
                                        </div>
                                    </div>
                                    <!--end: Wizard Step 2-->
                                    <!--begin: Wizard Step 3-->
                                    <div class="pb-5" data-wizard-type="step-content">
                                        <h4 class="mb-10 font-weight-bold text-dark">Business Details</h4>
                                        <!--begin::Select-->
                                        <div class="row">
                                            <div class="col-xl-4">
                                                <div class="form-group">
                                                    <label>Business Name<span class="star-red">*</span> </label>
                                                    <input type="text" class="form-control form-control-solid form-control-lg" name="bname" placeholder="Business Name" value="{{old('bname')}}" />
                                                    <span class="form-text text-muted">Please enter your Business Name.</span>
                                                </div>
                                            </div>
                                            <div class="col-xl-4">
                                                <div class="form-group">
                                                    <label>DBA (Doing Business As)</label>
                                                    <input type="text" class="form-control form-control-solid form-control-lg" name="dba" placeholder="Doing business as" value="{{old('dba')}}" />
                                                    <span class="form-text text-muted">Please enter your DBA.</span>
                                                </div>
                                            </div>
                                            <div class="col-xl-4">
                                                <div class="form-group">
                                                    <label>Tax ID/ EIN</label>
                                                    <input type="text" class="form-control form-control-solid form-control-lg" name="tid" placeholder="Enter Tax ID/ EIN" value="{{old('tid')}}" />
                                                    <span class="form-text text-muted">Please enter your Business Tax id/EIN.</span>
                                                </div>
                                            </div>
                                            <div class="col-xl-4">
                                                <!--begin::Input-->
                                                <div class="form-group">
                                                    <label>Business Address Line 1<span class="star-red">*</span> </label>
                                                    <input type="text" class="form-control form-control-solid form-control-lg" name="b_address_1" placeholder="BusinessAddress Line 1" value="{{old('b_address_1')}}" />
                                                    <span class="form-text text-muted">Please enter your Business Address.</span>
                                                </div>
                                                <!--end::Input-->
                                            </div>
                                            <div class="col-xl-4">
                                                <!--begin::Input-->
                                                <div class="form-group">
                                                    <label>Business Address Line 2</label>
                                                    <input type="text" class="form-control form-control-solid form-control-lg" name="b_address_2" placeholder="Business Address Line 2" value="{{old('b_address_2')}}" />
                                                    <span class="form-text text-muted">Please enter your Address.</span>
                                                </div>
                                                <!--end::Input-->
                                            </div>
                                            <div class="col-xl-4">
                                                <div class="form-group">
                                                    <label>Business Contact No<span class="star-red">*</span> </label>
                                                    <input type="text" class="form-control form-control-solid form-control-lg" name="bNumber" placeholder="Business contact number" value="{{old('bNumber')}}" />
                                                    <span class="form-text text-muted">Please enter your Business Contact Number.</span>
                                                </div>

                                            </div>

                                            <div id="nIDCard" class="col-xl-6">
                                                <div class="form-group">
                                                    <label>National Id Card Number</label>
                                                    <input type="text" class="form-control form-control-solid form-control-lg" name="nic" id="nic" placeholder="NIC" value="{{old('nic')}}" />
                                                    <span class="form-text text-muted">Please enter your National Id Card Number.</span>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!--end::Select-->
                                        
                                    </div>
                                    <!--end: Wizard Step 3-->
                                    <!--begin: Wizard Step 6-->
                                    <div class="pb-5" data-wizard-type="step-content">
                                        <!--begin::Section-->
                                        <h4 class="mb-10 font-weight-bold text-dark">Our Privacy Policy</h4>
                                        <div id="privacyContent" data-wheel-propagation="true">
                                            <p><b>Privacy Policy</b></p>
                                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aspernatur sint voluptate assumenda non quo laboriosam dolores recusandae nulla. Quas quo ducimus officiis, minima ipsa tempore ullam! Deleniti, cum dolore sunt tempore accusamus quae voluptatem, magnam sapiente sint inventore esse facere expedita explicabo nulla aspernatur non ea. Quaerat suscipit nostrum amet esse magnam earum, enim iusto distinctio voluptas, aliquid aspernatur! Totam corrupti, molestiae alias, fuga earum tempore ea iusto aperiam perspiciatis assumenda sapiente maiores atque esse. Ipsam molestias corporis totam. Dicta inventore enim aut possimus obcaecati ullam autem accusamus. Delectus necessitatibus quam at? Cumque est eum nihil dicta saepe illo, accusamus exercitationem fuga dolores obcaecati quia ea, magni consequatur voluptatum suscipit. Quasi saepe illo, debitis repellat dignissimos non delectus omnis earum, est suscipit vel voluptate libero labore adipisci nam velit in deleniti laudantium ab! Et dolore, laudantium obcaecati hic sunt doloremque sint minima soluta, beatae placeat, cumque reprehenderit voluptatibus qui ea! Inventore, culpa? Fuga quas at corrupti, pariatur blanditiis repellat debitis fugit repudiandae omnis quibusdam reprehenderit delectus eligendi incidunt, officiis odit vel! Eos alias illo nam doloremque, quas voluptatem ipsam reprehenderit neque. Quos aliquid fuga ex? Dolorem tempora autem nesciunt at reprehenderit quidem ducimus hic corporis. Numquam cupiditate quas, veritatis accusamus provident officia autem ipsa! Maxime deleniti facere reprehenderit perspiciatis accusamus amet, illo, et a praesentium dolore omnis consequatur natus, nemo cum voluptatem! At reprehenderit voluptatem soluta aliquam quos possimus nam reiciendis accusantium magnam ad sed inventore itaque animi, cumque nemo? Iusto sit amet fuga dignissimos, quibusdam voluptatum nemo consequuntur dolorem saepe! Inventore, nam illum? Possimus facilis velit excepturi, voluptatum enim nihil, aliquam delectus odit magni vitae facere amet corporis explicabo suscipit alias distinctio. Blanditiis quos et ex, mollitia, qui accusantium hic aperiam, exercitationem rerum magni nulla doloribus nostrum. Laborum tempora assumenda voluptatibus similique numquam ipsa delectus maiores architecto, consequuntur voluptatem soluta enim nisi nihil aut totam labore. Itaque dolorum quis exercitationem aspernatur illo adipisci cum nemo distinctio nam nostrum vitae odio voluptas aliquid cupiditate quae voluptates ea inventore at, error libero aut atque. Veniam quisquam ad beatae illum provident facere expedita tempora. Nulla dolor unde inventore! Quis praesentium non, illo, repudiandae ipsam tempore ratione commodi porro natus debitis similique? Sapiente sed voluptates repellat saepe necessitatibus soluta, aut nulla numquam, tempore quibusdam delectus tenetur ab, nostrum nobis minima? Quibusdam aliquid beatae, ducimus reprehenderit possimus blanditiis quia recusandae doloremque voluptatum repellat perferendis, obcaecati nisi. Dignissimos at aliquam provident totam voluptates laboriosam. Perferendis voluptatem magni est eos architecto qui dolor quia porro in dignissimos quam sequi, harum ipsam libero quisquam quidem neque earum! Voluptate soluta eaque quam nam placeat provident recusandae voluptatum aut animi rem non maiores officia accusamus delectus, dolorem voluptas omnis eos reprehenderit, doloremque explicabo in iure a laboriosam! Perspiciatis tempora, accusantium molestiae reprehenderit beatae, possimus corporis praesentium, facilis voluptates nam voluptatum vel magnam? Dolor optio eius quaerat odit, dignissimos consequatur deserunt eum similique iusto, sint et dolore animi quia consectetur voluptatibus enim tenetur cumque iure nostrum expedita perferendis praesentium voluptates tempore! Maiores nam perferendis harum quasi consectetur provident laudantium maxime earum explicabo, quas enim delectus labore ipsa? Voluptatum aspernatur, itaque voluptate, explicabo unde numquam adipisci laudantium omnis corrupti vel nisi quo ratione nemo repellendus tempora ab nulla? Sed, molestias! Sunt praesentium excepturi eum voluptatem aliquid quae odio ducimus assumenda quasi vero odit explicabo blanditiis esse facere quam maiores, beatae architecto necessitatibus nemo? Modi dolor sunt praesentium voluptatibus. Repellat dolore quaerat consequatur rem harum cum itaque quam nobis eligendi reiciendis, deleniti, animi sit fuga fugit et, exercitationem veritatis similique possimus minima. Quisquam rerum dolores delectus, cupiditate omnis nisi odio consequatur aut earum placeat quis amet modi facilis sed, cumque commodi! Facere!
                                        </div>

                                        <!--end::Section-->
                                        <div class="row mt-15">
                                            <div class="form-group col-lg-5 col-md-5 col-sm-12">
                                                <label class="kt-checkbox">
                                                    <input id="iagreeeBox" type="checkbox">
                                                    I agree & accept the conditions
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end: Wizard Step 6-->
                                    <!--begin: Wizard Actions-->
                                    <div class="d-flex justify-content-between border-top mt-5 pt-10">
                                        <div class="mr-2">
                                            <button type="button" class="btn btn-light-primary font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-prev">Previous</button>
                                        </div>
                                        <div>
                                            <button id="submitRegistration" type="button" class="btn btn-success font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-submit">Submit</button>
                                            <button id="nextBtn" type="button" class="btn btn-primary font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-next">Next</button>
                                        </div>
                                    </div>
                                    <!--end: Wizard Actions-->
                                </form>
                            </div>
                            <!--end: Wizard-->
                        </div>
                        <!--end: Wizard Form-->
                    </div>
                    <!--end: Wizard Body-->
                </div>
                <!--end: Wizard-->
            </div>
        </div>
    </div>
    <!--end::Container-->
</div>
<!--end::Entry-->


     {{-- Global Theme JS Bundle (used by all pages)  --}}
     @foreach(config('layout.resources.js') as $script)
     <script src="{{ asset($script) }}" type="text/javascript"></script>
 @endforeach

 {{-- Includable JS --}}
 @yield('scripts')


 
    {{-- @endsection --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script>

$(document).ready(function(){
        $('#id1').change(function(e){
            var fileName = e.target.files[0].name;
            // alert('The file "' + fileName +  '" has been selected.');
            document.getElementById("ids1").innerHTML = fileName;
        });
        $('#id2').change(function(e){
            var fileName = e.target.files[0].name;
            // alert('The file "' + fileName +  '" has been selected.');
            document.getElementById("ids2").innerHTML = fileName;
        });
    });

if(document.getElementById('country').value == "PK"){
    document.getElementById("nIDCard").style.display = "block";
}else{
    document.getElementById("nIDCard").style.display = "none";
} 



document.querySelector('#country').addEventListener('change', function() {
    if(document.getElementById('country').value == "PK"){
        document.getElementById("nIDCard").style.display = "block";
    }else{
        document.getElementById("nIDCard").style.display = "none";
    }

	
});
document.getElementById("submitRegistration").disabled = true;

$('body').on('click', '#iagreeeBox', function () {
    if ($(this).prop('checked') == true) {
        // $('#submitRegistration').removeAttr('disabled');
        document.getElementById("submitRegistration").disabled = false;
    } else {
     
        document.getElementById("submitRegistration").disabled = true;
    }
});
</script>

<script src="{{URL::asset('js/perferct-scroll.js')}}"></script>
<script>
    const ps = new PerfectScrollbar('#privacyContent', {
        wheelSpeed: 1,
        wheelPropagation: true,
        minScrollbarLength: 1
});

// var country = document.getElementById("country").value;
// if(country == "CA"){
//     var phone = document.getElementById("phone").value;
//     if(validatePhone(phone)){
//         alert("hi");
//     }
// }

// function validatePhone(txtPhone) {
//     var a = document.getElementById(txtPhone).value;
//     var filter = /^(1\s?)?((\([0-9]{3}\))|[0-9]{3})[\s\-]?[\0-9]{3}[\s\-]?[0-9]{4}$/;
//     if (filter.test(a)) {
//         return true;
//     }
//     else {
//         alert("nop");
//         return false;
//     }
// }


// var client = new XMLHttpRequest();
// client.open("GET", "http://api.zippopotam.us/PK/50700", true);
// client.onreadystatechange = function() {
// 	if(client.readyState == 4) {
// 		alert(client.responseText);
// 	};
// };
// client.send();
    </script>

    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script> --}}

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script> --}}
    <script type='text/javascript' src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
    {{-- <script src="{{URL::asset('js/input-mask.js')}}"></script> --}}


    <script>
        document.getElementById("hide-id-1").style.display = "none";
        document.getElementById("hide-id-2").style.display = "none";


        
document.querySelector('#country').addEventListener('change', function() {
    var country = document.getElementById("country").value;
    if(country == 'PK'){
        document.getElementById("hide-id-1").style.display = "block";
        document.getElementById("hide-id-2").style.display = "block";
    }else{
        document.getElementById("hide-id-1").style.display = "none";
        document.getElementById("hide-id-2").style.display = "none";
    }
    if(country == 'PK'){
        var pc = document.getElementById("post_code").value = "";
        var pc = document.getElementById("phone").value = "";

    }
    if(country == 'CA'){
        var pc = document.getElementById("post_code").value = "";
        var pc = document.getElementById("phone").value = "";

    }
    if(country == 'US'){
        var pc = document.getElementById("post_code").value = "";
        var pc = document.getElementById("phone").value = "";

    }


    if(country == 'AE'){
        $j('#post_code').inputmask('NO-POST\\AL-CODE');
        // $('#post_code').value('No postal code');
        var pc = document.getElementById("post_code").value = "No Postal Code required";
        if(pc == "" && pc == "No Postal Code required"){
            $('#state').html('');
            $('#city').html('');
        }
            $('#state').removeAttr('disabled');
            $('#city').removeAttr('disabled');
            $('#state').html('<option value="" selected>Select a state</option><option value="Dubai">Dubai</option><option value="Abu Dhabi">Abu Dhabi</option><option value="Sharjah">Sharjah</option><option value="RAK">RAK</option><option value="Fujairah">Fujairah</option><option value="Ajman">Ajman</option><option value="UAQ">UAQ</option>');
            $('#city').html('<option value="" selected>Select a city</option><option value="Abu Dhabi">Abu Dhabi</option><option value="Ajman">Ajman</option><option value="Al Ain">Al Ain</option><option value="Al Madam">Al Madam</option><option value="Ar-Rams">Ar-Rams</option><option value="Dhaid">Dhaid</option><option value="Dibba Al-Fujairah">Dibba Al-Fujairah</option><option value="Dibba Al-Hisn">Dibba Al-Hisn</option><option value="Dubai">Dubai</option><option value="Fujairah">Fujairah</option><option value="Ghayathi">Ghayathi</option><option value="Hatta">Hatta</option><option value="Jebel Ali">Jebel Ali</option><option value="Kalba">Kalba</option><option value="Khor Fakkan">Khor Fakkan</option><option value="Liwa Oasis">Liwa Oasis</option><option value="Madinat Zayed">Madinat Zayed</option><option value="RAK City">RAK City</option><option value="Ruwais">Ruwais</option><option value="Sharjah">Sharjah</option><option value="Umm al-Quwain">Umm al-Quwain</option><option value="Abu al Abyad">Abu al Abyad</option><option value="Adhen">Adhen</option><option value="Al Ajban">Al Ajban</option><option value="Al Aryam">Al Aryam</option><option value="Al Awir">Al Awir</option><option value="Al Badiyah">Al Badiyah</option><option value="Al Bataeh">Al Bataeh</option><option value="Al Bithnah">Al Bithnah</option><option value="Al Faqa">Al Faqa</option><option value="Al Halah">Al Halah</option><option value="Al Hamraniyah">Al Hamraniyah</option><option value="Al Hamriyah">Al Hamriyah</option><option value="Al Jazirah Al Hamra">Al Jazirah Al Hamra</option><option value="Al Jeer">Al Jeer</option><option value="Al Khawaneej">Al Khawaneej</option><option value="Al Lisaili">Al Lisaili</option><option value="Al Manama">Al Manama</option><option value="Al Mirfa">Al Mirfa</option><option value="Al Qusaidat">Al Qusaidat</option><option value="Al Qor">Al Qor</option><option value="Al Shuwaib">Al Shuwaib</option><option value="Al Rafaah">Al Rafaah</option><option value="Al Rashidya">Al Rashidya</option><option value="Al Yahar">Al Yahar</option><option value="Asimah">Asimah</option><option value="Dalma">Dalma</option><option value="Dadna">Dadna</option><option value="Digdaga">Digdaga</option><option value="Falaj Al Mualla">Falaj Al Mualla</option><option value="Ghalilah">Ghalilah</option><option value="Ghub">Ghub</option><option value="Habshan">Habshan</option><option value="Huwaylat">Huwaylat</option><option value="Khatt">Khatt</option><option value="Khor Khwair">Khor Khwair</option><option value="Lahbab">Lahbab</option><option value="Marawah">Marawah</option><option value="Masafi">Masafi</option><option value="Masfut">Masfut</option><option value="Mirbah">Mirbah</option><option value="Mleiha">Mleiha</option><option value="Nahil">Nahil</option><option value="Shaam">Shaam</option><option value="Sila">Sila</option><option value="Sir Bani Yas">Sir Bani Yas</option><option value="Sweihan">Sweihan</option><option value="Wadi Shah">Wadi Shah</option><option value="Zubarah">Zubarah</option>');
        
        // document.getElementById('city').type = 'input';        
    }
	
});


        document.getElementById("vPhone").style.display = "none";
        document.getElementById("pText").style.display = "none";
        document.getElementById("vPhone").style.color = "red";
        document.getElementById("pText").style.color = "red";
        $j=jQuery.noConflict();
        // $j.inputmask.definitions['9'] = '';
        // $j.inputmask.definitions['x'] = '[0-9]';
        // $.mask.definitions['9'] = '';
        // $.mask.definitions['x'] = '[0-9]';
        // $(document).ready(function(){
        //     // $j('#phone').inputmask('(999)-999-9999');
        //     $j('#phone').inputmask('+92-999-9999');
        //     // $('.phone_number_2').inputmask('(99)-9999-9999');
        //     // $('.phone_number_3').inputmask('+99-9999999999');
        // });
        $('body').on('keyup', '#phone', function () {
            var phone = $(this).val();
         
            var ca = /^((\+1))-((\([0-9 -]{3}[- ]?\))|[0-9 -]{3}[- ]?)[\s\-]?[\0-9 -]{3}[- ]?[\s\-]?[0-9]{4}$/;
            var pk = /^((\+92)|(0092))-{0,1}\d{3}-{0,1}\d{7}$|^\d{11}$|^\d{4}-\d{7}$/;
            var us = /^((\+1))-((\([0-9 -]{3}[- ]?\))|[0-9 -]{3}[- ]?)[\s\-]?[\0-9 -]{3}[- ]?[\s\-]?[0-9]{4}$/;
            var ae = /^((\+971))-((\([0-9]{2}[- ]?\))|[0-9 -]{3}[- ]?)[\s\-]?[\0-9 -]{4}[- ]?[\s\-]?[0-9]{4}$/;

    var country = document.getElementById("country").value;
    if(country == 'CA'){
        // $j('#phone').inputmask('(9)-999-999-9999');
        $j('#phone').inputmask('+1-999-999-9999');

        if(phone.match(ca))
        {
            document.getElementById("nextBtn").disabled = false;
            document.getElementById("vPhone").style.display = "none";
        }else{
            document.getElementById("nextBtn").disabled = true;
            document.getElementById("vPhone").style.display = "block";
        }
    }
    if(country == 'PK'){
        $j('#phone').inputmask('+\\92-999-9999999');

        if($(this).val().match(pk))
        {
            document.getElementById("nextBtn").disabled = false;

            document.getElementById("vPhone").style.display = "none";
          
        }else{
            document.getElementById("nextBtn").disabled = true;

            document.getElementById("vPhone").style.display = "block";
        }

      
    }
    if(country == 'AE'){
        $j('#phone').inputmask('+\\971-99-999-9999');
        if($(this).val().match(ae))
        {
            document.getElementById("nextBtn").disabled = false;

            document.getElementById("vPhone").style.display = "none";

        }else{
            document.getElementById("vPhone").style.display = "block";
            document.getElementById("nextBtn").disabled = true;

        }
       
    }
    if(country == 'US'){
        $j('#phone').inputmask('+1-999-999-9999');


        if($(this).val().match(us))
        {
            document.getElementById("nextBtn").disabled = false;

            document.getElementById("vPhone").style.display = "none";
            
        }else{
            document.getElementById("nextBtn").disabled = true;

            document.getElementById("vPhone").style.display = "block";
        }
       
    }
    });

    $('body').on('keyup', '#nic', function () {
        $j('#nic').inputmask('99999-9999999-9');
    });

    $('body').on('keyup', '#post_code', function () {

    var country = document.getElementById("country").value;
    if(country == 'CA'){
        $j('#post_code').inputmask('A9A');
        var pc = document.getElementById("post_code").value;
        if(pc === ""){
            $('#state').html('');
            $('#city').html('');
        }
        if(pc.length >= 3){
            var client = new XMLHttpRequest();
            client.open("GET", `http://api.zippopotam.us/CA/${pc}`, true);
            client.onreadystatechange = function() {
                if(client.readyState == 4) {
                    var data = JSON.parse(client.responseText);
                    console.log(data['places'].length);
                    if (data['places'].length == 0) {
                        $('#pText').show().html('Enter valid zipcode');
                    }

                    // else if (data['places'].length == 1) {
                    //     // console.log(data['places'][0]['place name'])
                    //     // console.log(data['places'][0]['state'])
                    //     var city_option = '<option value="' +data['places'][0]['place name'] + '" selected>' + data['places'][0]['place name'] + '</option>';
                    //     $('#city').html(city_option);
                    //     $('#city').attr('disabled', 'disabled');
                    //     var state_option = '<option value="' +data['places'][0]['state'] + '" selected>' + data['places'][0]['state'] + '</option>';
                    //     $('#state').html(state_option);
                    //     $('#state').attr('disabled', 'disabled');
                    //     // console.log($("#city").value);
                    //     // console.log($("#state").value);
                        
                    // }
                    else if((data['places'].length >= 1)){
                        var state_option = '<option value="">Select State</option>';
                        var city_option = '<option value="">Select City</option>';
                        for (var si = 0; si < data['places'].length; si++) {
                            state_option += '<option value="' + data['places'][si]['state'] + '">' + data['places'][si]['state'] + '</option>';
                            city_option += '<option value="' + data['places'][si]['place name'] + '">' + data['places'][si]['place name'] + '</option>';
                        }
                        if (data['places'].length >= 1) {
                            $('#state').removeAttr('disabled');
                            $('#city').removeAttr('disabled');
                        }
                        $('#state').html(state_option);
                        $('#city').html(city_option);
                        }
                }
            };
            client.send();
        }

        
    }
    if(country == 'PK'){
        $j('#post_code').inputmask('99999');
        var pc = document.getElementById("post_code").value;
        if(pc === ""){
            $('#state').html('');
            $('#city').html('');
        }
        if(pc.length >= 5){
            var client = new XMLHttpRequest();
            client.open("GET", `http://api.zippopotam.us/PK/${pc}`, true);
            client.onreadystatechange = function() {
                if(client.readyState == 4) {
                    var data = JSON.parse(client.responseText);
                    console.log(data['places'].length);
                    if (data['places'].length == 0) {
                        $('#pText').show().html('Enter valid zipcode');
                    }

                    // if (data['places'].length == 1) {
                    //     var city_option = '<option value="' +data['places'][0]['place name'] + '" selected>' + data['places'][0]['place name'] + '</option>';
                    //     $('#city').html(city_option);
                    //     $('#city').attr('disabled', 'disabled');

                    //     var state_option = '<option value="' +data['places'][0]['state'] + '" selected>' + data['places'][0]['state'] + '</option>';
                    //     $('#state').html(state_option);
                    //     $('#state').attr('disabled', 'disabled');
                        
                    // }
                    else if((data['places'].length >= 1)){
                        var state_option = '<option value="">Select State</option>';
                        var city_option = '<option value="">Select City</option>';
                        for (var si = 0; si < data['places'].length; si++) {
                            state_option += '<option value="' + data['places'][si]['state'] + '">' + data['places'][si]['state'] + '</option>';
                            city_option += '<option value="' + data['places'][si]['place name'] + '">' + data['places'][si]['place name'] + '</option>';
                        }
                        if (data['places'].length >= 1) {
                            $('#state').removeAttr('disabled');
                            $('#city').removeAttr('disabled');
                        }
                        $('#state').html(state_option);
                        $('#city').html(city_option);
                        }

                    
                }
            };
            client.send();
        } 
    }
    
    if(country == 'US'){
        $j('#post_code').inputmask('99999');
        var pc = document.getElementById("post_code").value;
        if(pc === ""){
            $('#state').html('');
            $('#city').html('');
        }
        if(pc.length >= 5){
            var client = new XMLHttpRequest();
            client.open("GET", `http://api.zippopotam.us/US/${pc}`, true);
            client.onreadystatechange = function() {
                if(client.readyState == 4) {
                    var data = JSON.parse(client.responseText);
                    console.log(data['places'].length);
                    if (data['places'].length == 0) {
                        $('#pText').show().html('Enter valid zipcode');
                    }

                    // if (data['places'].length == 1) {
                    //     var city_option = '<option value="' +data['places'][0]['place name'] + '">' + data['places'][0]['place name'] + '</option>';
                    //     $('#city').html(city_option);
                    //     $('#city').attr('disabled', 'disabled');

                    //     var state_option = '<option value="' +data['places'][0]['state'] + '">' + data['places'][0]['state'] + '</option>';
                    //     $('#state').html(state_option);
                    //     $('#state').attr('disabled', 'disabled');
                        
                    // }
                    else if((data['places'].length >= 1)) {
                        var state_option = '<option value="">Select State</option>';
                        var city_option = '<option value="">Select City</option>';
                        for (var si = 0; si < data['places'].length; si++) {
                            state_option += '<option value="' + data['places'][si]['state'] + '">' + data['places'][si]['state'] + '</option>';
                            city_option += '<option value="' + data['places'][si]['place name'] + '">' + data['places'][si]['place name'] + '</option>';
                        }
                        if (data['places'].length >= 1) {
                            $('#state').removeAttr('disabled');
                            $('#city').removeAttr('disabled');
                        }
                        $('#state').html(state_option);
                        $('#city').html(city_option);
                        }

                    
                }
            };
            client.send();
        } 
    }
    });



    



    </script>

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/formvalidation/0.6.2-dev/js/formValidation.min.js" integrity="sha512-DlXWqMPKer3hZZMFub5hMTfj9aMQTNDrf0P21WESBefJSwvJguz97HB007VuOEecCApSMf5SY7A7LkQwfGyVfg==" crossorigin="anonymous"></script> --}}
<script src="{{URL::asset('js/form-controls.js')}}"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/es6-shim/0.35.3/es6-shim.min.js"></script> --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.5/jquery.inputmask.min.js" integrity="sha512-sR3EKGp4SG8zs7B0MEUxDeq8rw9wsuGVYNfbbO/GLCJ59LBE4baEfQBVsP2Y/h2n8M19YV1mujFANO1yA3ko7Q==" crossorigin="anonymous"></script> --}}
<script src="{{URL::asset('js/wizard-2.js')}}"></script>
{{-- <script src="{{URL::asset('js/FormValidation.full.js')}}"></script> --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/es6-shim/0.35.3/es6-shim.min.js"></script> --}}



@endsection
