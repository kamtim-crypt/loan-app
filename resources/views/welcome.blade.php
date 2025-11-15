<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Fast Loans - Flexible Financial Solutions</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .navbar {
            position: absolute;
            top: 0;
            right: 0;
            padding: 1.5rem;
            z-index: 10;
        }
        .navbar a {
            font-weight: 600;
            color: #fff;
            margin-left: 1rem;
            text-decoration: none;
        }
        .hero {
            position: relative;
            color: white;
            height: 60vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 0 20px;
            background-image: url('{{ asset('images/background.jpg') }}');
            background-size: cover;
            background-position: center;
        }
        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
        }
        .hero-content {
            position: relative;
            z-index: 2;
        }
        .hero h1 {
            font-size: 3rem;
            margin-bottom: 0.5rem;
        }
        .hero p {
            font-size: 1.25rem;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
            padding: 40px 0;
        }
        section {
            padding: 20px;
        }
        .cta-button {
            background-color: #e8491d;
            color: white !important;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
        }
        .loan-option {
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 5px;
        }
        .footer {
            text-align: center;
            padding: 20px;
            background: #333;
            color: white;
            margin-top: 30px;
        }
        .footer ul {
            list-style-type: none;
            padding: 0;
        }
        .footer ul li {
            margin-bottom: 5px;
        }
        .footer a {
            color: #e8491d;
        }
    </style>
</head>
<body>
    @if (Route::has('login'))
        <div class="navbar">
            @auth
                <a href="{{ url('/dashboard') }}">Dashboard</a>
            @else
                <a href="{{ route('login') }}">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="hero">
        <div class="hero-content">
            <h1>Online Fast Loans</h1>
            <p>Flexible Financial Solutions Made to Meet Your Needs</p>
            <a href="{{ route('register') }}" class="cta-button">Apply Now</a>
        </div>
    </div>

    <section id="why-lupiya">
        <div class="container">
            <h2>Here’s Why Thousands Choose Us:</h2>
            <p><strong>Easy to get:</strong><br>
            Sign up and apply in just a few minutes.</p>

            <p><strong>Fast Approvals:</strong><br>
            Loans approved in short time - no long waits.</p>

            <p><strong>No Surprises:</strong><br>
            Fixed rates and clear repayment terms.</p>
        </div>
    </section>

    <section id="loan-options">
        <div class="container">
            <h2>Choose from a variety of loan options</h2>

            <div class="loan-option">
                <h3>Instant Loan</h3>
                <p>Get K500 instantly and pay it back over 3 months.</p>
                <p><strong>Coming soon</strong></p>
            </div>

            <div class="loan-option">
                <h3>Buy Now, Pay Later</h3>
                <p>Buy data, airtime, electricity, water, tv and more on credit.</p>
                <p><strong>Coming soon</strong></p>
            </div>

            <div class="loan-option">
                <h3>Wallet Overdraft</h3>
                <p>Spend straight from your wallet even with zero balance.</p>
                <p><strong>Coming soon</strong></p>
            </div>

            <div class="loan-option">
                <h3>Civil Servant Loans</h3>
                <p>Low interest loans for government workers.</p>
                <a href="{{ route('register') }}" class="cta-button" style="margin-top: 5px;">Apply now &gt;</a>
            </div>
            <a href="#">See all loans</a>
        </div>
    </section>

    <section id="how-it-works">
        <div class="container">
            <h2>How It Works</h2>
            <ol>
                <li><strong>Sign Up for Free</strong><br>Download our app or sign up on the website.</li>
                <li><strong>Choose a Loan</strong><br>Pick the loan that works for you – quick cash, bills, or an overdraft</li>
                <li><strong>Get Approved Fast</strong><br>We say YES in 5 minutes. No paperwork, no stress.</li>
                <li><strong>Repay Easily</strong><br>Spread your payments over time with no hidden fees.</li>
            </ol>
            <a href="{{ route('register') }}" class="cta-button">Get started</a>
        </div>
    </section>
    
    <footer class="footer">
        <div class="container">
            <p>Online Fast Loans is a leading provider of fast, online loans.</p>
            
            <h4>CONTACT</h4>
            <p>123 Mosi-oa-Tunya Road, Livingstone | Zambia</p>
            <p>info@onlinefastloans.com</p>
            <p>For loan services, please contact:</p>
            <ul style="margin-top: 10px;">
                <li>Hellen Kapufi – 2300532</li>
                <li>Elizabeth Mwamba – 2300686</li>
                <li>Mulenga Mwewa - 2300534</li>
            </ul>

            <p style="margin-top: 2em;"><a href="#">Privacy Policy</a> | <a href="#">Terms of Use</a></p>
            <p>© {{ date('Y') }} Online Fast Loans. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
