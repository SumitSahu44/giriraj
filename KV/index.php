<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>KV Associates - Financial Consultancy</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Roboto:wght@300;400;500;700&family=Playfair+Display:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css"
    />
    <script src="https://cdn.tailwindcss.com/3.4.16"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              primary: "#C9A560",
              secondary: "#4B4B4B",
              offwhite: "#FAF9F6",
              midnight: "#2F3E46",
            },
            borderRadius: {
              none: "0px",
              sm: "4px",
              DEFAULT: "8px",
              md: "12px",
              lg: "16px",
              xl: "20px",
              "2xl": "24px",
              "3xl": "32px",
              full: "9999px",
              button: "8px",
            },
            fontFamily: {
              poppins: ["Poppins", "sans-serif"],
              roboto: ["Roboto", "sans-serif"],
              playfair: ["Playfair Display", "serif"],
            },
          },
        },
      };
    </script>
    <style>
      :where([class^="ri-"])::before { content: "\f3c2"; }

      body {
          font-family: 'Roboto', sans-serif;
          color: #4B4B4B;
      }

      h1, h2, h3, h4, h5, h6 {
          font-family: 'Playfair Display', serif;
      }

      .nav-link {
          position: relative;
      }

      .nav-link::after {
          content: '';
          position: absolute;
          width: 0;
          height: 2px;
          bottom: -4px;
          left: 0;
          background-color: #C9A560;
          transition: width 0.3s ease;
      }

      .nav-link:hover::after, .nav-link.active::after {
          width: 100%;
      }

      .service-card:hover .service-details {
          opacity: 1;
          transform: translateY(0);
      }

      .partner-logo {
          filter: grayscale(100%);
          transition: filter 0.3s ease;
      }

      .partner-logo:hover {
          filter: grayscale(0%);
      }

      .sticky-social {
          transition: all 0.3s ease;
      }

      .sticky-social:hover {
          transform: translateX(0);
      }

      .hero-section {
          background-position: center;
          background-size: cover;
          position: relative;
      }

      .hero-section::before {
          content: '';
          position: absolute;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          background: linear-gradient(90deg, rgba(47, 62, 70, 0.9) 0%, rgba(47, 62, 70, 0.7) 50%, rgba(47, 62, 70, 0.5) 100%);
      }

      input:focus, textarea:focus {
          outline: none;
          border-color: #C9A560;
      }

      .form-input {
          border: 1px solid #e5e7eb;
          transition: border-color 0.3s ease;
      }

      .form-input:focus {
          border-color: #C9A560;
      }

      .chatbot-container {
          transition: all 0.3s ease;
      }

      .testimonial-card {
          transition: transform 0.3s ease;
      }

      .testimonial-card:hover {
          transform: translateY(-5px);
      }

      input[type="checkbox"], input[type="radio"] {
          appearance: none;
          -webkit-appearance: none;
          width: 20px;
          height: 20px;
          border: 2px solid #C9A560;
          border-radius: 4px;
          outline: none;
          transition: all 0.3s ease;
          position: relative;
      }

      input[type="radio"] {
          border-radius: 50%;
      }

      input[type="checkbox"]:checked, input[type="radio"]:checked {
          background-color: #C9A560;
      }

      input[type="checkbox"]:checked::before {
          content: '✓';
          color: white;
          position: absolute;
          top: 50%;
          left: 50%;
          transform: translate(-50%, -50%);
          font-size: 12px;
      }

      input[type="radio"]:checked::before {
          content: '';
          position: absolute;
          top: 50%;
          left: 50%;
          transform: translate(-50%, -50%);
          width: 10px;
          height: 10px;
          background-color: white;
          border-radius: 50%;
      }

      .switch {
          position: relative;
          display: inline-block;
          width: 50px;
          height: 24px;
      }

      .switch input {
          opacity: 0;
          width: 0;
          height: 0;
      }

      .slider {
          position: absolute;
          cursor: pointer;
          top: 0;
          left: 0;
          right: 0;
          bottom: 0;
          background-color: #ccc;
          transition: .4s;
          border-radius: 34px;
      }

      .slider:before {
          position: absolute;
          content: "";
          height: 16px;
          width: 16px;
          left: 4px;
          bottom: 4px;
          background-color: white;
          transition: .4s;
          border-radius: 50%;
      }

      input:checked + .slider {
          background-color: #C9A560;
      }

      input:checked + .slider:before {
          transform: translateX(26px);
      }

      .blog-card:hover .blog-overlay {
          opacity: 0.7;
      }

      .blog-card:hover .blog-title {
          color: #C9A560;
      }

      @keyframes slideIn {
          from {
              transform: translateX(-100%);
              opacity: 0;
          }
          to {
              transform: translateX(0);
              opacity: 1;
          }
      }

      .animate-slide-in {
          animation: slideIn 0.5s forwards;
      }
      
      

  .active-tab {
   background: #c9a560;
   color:white;
  }

  .inactive-tab {
    background:white;
   color: #c9a560;
  }
    </style>
  </head>
  <body class="bg-offwhite">
    <!-- Header & Navigation -->
<!--    <header class="fixed w-full bg-white shadow-sm z-50">-->
<!--  <div class="container mx-auto px-4 py-4 flex items-center justify-between">-->
    <!-- Logo -->
<!--    <div class="flex items-center">-->
<!--      <a href="/" class="w-[80px] font-['Pacifico'] text-[#c9a560]">-->
<!--        <img src="smalllogo.png" alt="Logo">-->
<!--      </a>-->
<!--    </div>-->

    <!-- Desktop Navigation -->
<!--    <nav class="hidden md:flex items-center space-x-8">-->
<!--      <a href="#" class="nav-link font-poppins text-secondary font-medium hover:text-[#c9a560] transition-colors active">Home</a>-->
<!--      <a href="./about.php" class="nav-link font-poppins text-secondary font-medium hover:text-[#c9a560] transition-colors">About</a>-->
<!--      <a href="./service.php" class="nav-link font-poppins text-secondary font-medium hover:text-[#c9a560] transition-colors">Services</a>-->
<!--      <a href="#" class="nav-link font-poppins text-secondary font-medium hover:text-[#c9a560] transition-colors">Partners</a>-->
<!--      <a href="#" class="nav-link font-poppins text-secondary font-medium hover:text-[#c9a560] transition-colors">Blog</a>-->
<!--      <a href="#" class="nav-link font-poppins text-secondary font-medium hover:text-[#c9a560] transition-colors">Contact</a>-->
<!--    </nav>-->

    <!-- Buttons -->
<!--    <div class="flex items-center space-x-4">-->
<!--      <button class="bg-[#c9a560] text-white px-6 py-2 font-poppins font-medium rounded-lg whitespace-nowrap hidden md:block hover:bg-opacity-90 transition-colors">-->
<!--        Apply Now-->
<!--      </button>-->
<!--      <button class="md:hidden w-10 h-10 flex items-center justify-center text-secondary" id="mobileMenuBtn" aria-label="Toggle mobile menu">-->
<!--        <i class="ri-menu-line ri-lg"></i>-->
<!--      </button>-->
<!--    </div>-->
<!--  </div>-->

  <!-- Mobile Menu -->
<!--  <div class="md:hidden bg-white w-full absolute top-full left-0 shadow-md hidden" id="mobileMenu">-->
<!--    <div class="container mx-auto px-4 py-4 flex flex-col space-y-4">-->
<!--      <a href="#" class="font-poppins text-secondary font-medium hover:text-[#c9a560] transition-colors py-2 border-b border-gray-100">Home</a>-->
<!--      <a href="./about.php" class="font-poppins text-secondary font-medium hover:text-[#c9a560] transition-colors py-2 border-b border-gray-100">About</a>-->
<!--      <a href="./service.php" class="font-poppins text-secondary font-medium hover:text-[#c9a560] transition-colors py-2 border-b border-gray-100">Services</a>-->
<!--      <a href="#" class="font-poppins text-secondary font-medium hover:text-[#c9a560] transition-colors py-2 border-b border-gray-100">Partners</a>-->
<!--      <a href="#" class="font-poppins text-secondary font-medium hover:text-[#c9a560] transition-colors py-2 border-b border-gray-100">Blog</a>-->
<!--      <a href="#" class="font-poppins text-secondary font-medium hover:text-[#c9a560] transition-colors py-2 border-b border-gray-100">Contact</a>-->
<!--      <button class="bg-[#c9a560] text-white px-6 py-2 font-poppins font-medium rounded-lg text-left mt-4 hover:bg-opacity-90 transition-colors">-->
<!--        Apply Now-->
<!--      </button>-->
<!--    </div>-->
<!--  </div>-->
<!--</header>-->

<?php include './navbar.php' ?>

<!-- JavaScript for mobile menu toggle -->
<script>
  document.addEventListener('DOMContentLoaded', () => {
    const mobileMenuBtn = document.getElementById('mobileMenuBtn');
    const mobileMenu = document.getElementById('mobileMenu');
    const menuIcon = mobileMenuBtn.querySelector('i');

    mobileMenuBtn.addEventListener('click', () => {
      mobileMenu.classList.toggle('hidden');
      menuIcon.classList.toggle('ri-menu-line');
      menuIcon.classList.toggle('ri-close-line');
    });

    // Close mobile menu when clicking outside
    document.addEventListener('click', (e) => {
      if (!mobileMenu.contains(e.target) && !mobileMenuBtn.contains(e.target) && !mobileMenu.classList.contains('hidden')) {
        mobileMenu.classList.add('hidden');
        menuIcon.classList.add('ri-menu-line');
        menuIcon.classList.remove('ri-close-line');
      }
    });
  });
</script>

<!-- Required CSS (Assuming Tailwind CSS and Remix Icon are used) -->
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

<!-- Custom CSS for additional styling -->
<style>
  .text-[#c9a560] { color: #2563eb; }
  .bg-[#c9a560] { background-color: #2563eb; }
  .text-secondary { color: #4b5563; }
  .nav-link.active { color: #2563eb; border-bottom: 2px solid #2563eb; }
  @media (max-width: 768px) {
    #mobileMenu { transform: translateY(-100%); }
    #mobileMenu:not(.hidden) { transform: translateY(0); transition: transform 300ms ease-in-out; }
  }
</style>

    <!-- Hero Section -->
    <section
      class="hero-section min-h-[600px] flex items-center pt-20"
      style="background-image: url('https://readdy.ai/api/search-image?query=elegant%20financial%20consulting%20office%20with%20modern%20architecture%2C%20glass%20windows%2C%20professional%20environment%2C%20soft%20lighting%2C%20subtle%20gold%20accents%2C%20business%20professionals%20in%20formal%20attire%2C%20financial%20documents%2C%20minimal%20design%2C%20premium%20atmosphere%2C%20high-end%20finance&width=1920&height=800&seq=1&orientation=landscape')"
    >
      <div class="container mx-auto px-4 w-full">
        <div class="max-w-2xl relative z-10">
          <h1
            class="text-4xl md:text-5xl lg:text-6xl font-bold text-offwhite mb-6"
          >
            Expert Financial Solutions for Your Business Growth
          </h1>
          <p
            class="text-lg md:text-xl text-offwhite mb-8 font-roboto font-light"
          >
            Specialized loan consultancy services to help your business thrive
            in today's competitive market. Get personalized financial guidance
            from industry experts.
          </p>
          <div class="flex flex-col sm:flex-row gap-4">
            <button
              class="bg-[#c9a560] text-white px-8 py-3 font-poppins font-medium !rounded-button whitespace-nowrap hover:bg-opacity-90 transition-all"
            >
              Get Consultation
            </button>
            <button
              class="bg-transparent border-2 border-offwhite text-offwhite px-8 py-3 font-poppins font-medium !rounded-button whitespace-nowrap hover:bg-white hover:bg-opacity-10 transition-all"
            >
              Learn More
            </button>
          </div>
        </div>
      </div>
    </section>

    <!-- USP Section -->
    <section class="py-16 bg-white">
      <div class="container mx-auto px-4">
        <div class="text-center mb-12">
          <h2 class="text-3xl md:text-4xl font-bold text-secondary mb-4">
            Why Choose KV Associates
          </h2>
          <p class="text-lg text-secondary/80 max-w-3xl mx-auto">
            We deliver exceptional financial consultancy services with a focus
            on personalized solutions and industry expertise.
          </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
          <!-- USP Card 1 -->
          <div
            class="bg-white p-8 rounded shadow-md hover:shadow-lg transition-shadow"
          >
            <div
              class="w-16 h-16 flex items-center justify-center bg-[#c9a560]/10 rounded-full mb-6 mx-auto"
            >
              <i class="ri-award-line ri-xl text-[#c9a560]"></i>
            </div>
            <h3 class="text-xl font-semibold text-secondary text-center mb-4">
              Industry Expertise
            </h3>
            <p class="text-secondary/80 text-center">
              With over 15 years of experience in financial consultancy, our
              team brings unparalleled expertise to every client engagement.
            </p>
          </div>

          <!-- USP Card 2 -->
          <div
            class="bg-white p-8 rounded shadow-md hover:shadow-lg transition-shadow"
          >
            <div
              class="w-16 h-16 flex items-center justify-center bg-[#c9a560]/10 rounded-full mb-6 mx-auto"
            >
              <i class="ri-customer-service-2-line ri-xl text-[#c9a560]"></i>
            </div>
            <h3 class="text-xl font-semibold text-secondary text-center mb-4">
              Personalized Service
            </h3>
            <p class="text-secondary/80 text-center">
              We tailor our financial solutions to meet your specific business
              needs, ensuring optimal results for your unique situation.
            </p>
          </div>

          <!-- USP Card 3 -->
          <div
            class="bg-white p-8 rounded shadow-md hover:shadow-lg transition-shadow"
          >
            <div
              class="w-16 h-16 flex items-center justify-center bg-[#c9a560]/10 rounded-full mb-6 mx-auto"
            >
              <i class="ri-line-chart-line ri-xl text-[#c9a560]"></i>
            </div>
            <h3 class="text-xl font-semibold text-secondary text-center mb-4">
              Proven Results
            </h3>
            <p class="text-secondary/80 text-center">
              Our track record speaks for itself, with a 95% success rate in
              securing optimal financial solutions for our clients.
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Partner Showcase -->
    <section class="py-16 bg-offwhite">
      <div class="container mx-auto px-4">
        <div class="text-center mb-12">
          <h2 class="text-3xl md:text-4xl font-bold text-secondary mb-4">
            Our Trusted Partners
          </h2>
          <p class="text-lg text-secondary/80 max-w-3xl mx-auto">
            We collaborate with leading financial institutions to provide you
            with the best possible solutions.
          </p>
        </div>

        <div class="relative overflow-hidden">
          <div class="flex space-x-12 py-6 partner-carousel">
            <div
              class="partner-logo flex items-center justify-center min-w-[160px]"
            >
              <div class="w-10 h-10 flex items-center justify-center mr-2">
                <i class="ri-bank-fill ri-2x text-secondary"></i>
              </div>
              <span class="font-medium text-secondary">HDFC Bank</span>
            </div>
            <div
              class="partner-logo flex items-center justify-center min-w-[160px]"
            >
              <div class="w-10 h-10 flex items-center justify-center mr-2">
                <i class="ri-bank-fill ri-2x text-secondary"></i>
              </div>
              <span class="font-medium text-secondary">ICICI Bank</span>
            </div>
            <div
              class="partner-logo flex items-center justify-center min-w-[160px]"
            >
              <div class="w-10 h-10 flex items-center justify-center mr-2">
                <i class="ri-bank-fill ri-2x text-secondary"></i>
              </div>
              <span class="font-medium text-secondary">Axis Bank</span>
            </div>
            <div
              class="partner-logo flex items-center justify-center min-w-[160px]"
            >
              <div class="w-10 h-10 flex items-center justify-center mr-2">
                <i class="ri-bank-fill ri-2x text-secondary"></i>
              </div>
              <span class="font-medium text-secondary">SBI Bank</span>
            </div>
            <div
              class="partner-logo flex items-center justify-center min-w-[160px]"
            >
              <div class="w-10 h-10 flex items-center justify-center mr-2">
                <i class="ri-bank-fill ri-2x text-secondary"></i>
              </div>
              <span class="font-medium text-secondary">Kotak Bank</span>
            </div>
            <div
              class="partner-logo flex items-center justify-center min-w-[160px]"
            >
              <div class="w-10 h-10 flex items-center justify-center mr-2">
                <i class="ri-bank-fill ri-2x text-secondary"></i>
              </div>
              <span class="font-medium text-secondary">Yes Bank</span>
            </div>
          </div>

          <div
            class="absolute top-1/2 -translate-y-1/2 left-0 w-10 h-10 flex items-center justify-center bg-white rounded-full shadow-md cursor-pointer"
          >
            <i class="ri-arrow-left-s-line ri-lg text-secondary"></i>
          </div>
          <div
            class="absolute top-1/2 -translate-y-1/2 right-0 w-10 h-10 flex items-center justify-center bg-white rounded-full shadow-md cursor-pointer"
          >
            <i class="ri-arrow-right-s-line ri-lg text-secondary"></i>
          </div>
        </div>
      </div>
    </section>

    <!-- Loan Services Grid -->
    <section class="py-16 bg-white">
      <div class="container mx-auto px-4">
        <div class="text-center mb-12">
          <h2 class="text-3xl md:text-4xl font-bold text-secondary mb-4">
            Our Financial Services
          </h2>
          <p class="text-lg text-secondary/80 max-w-3xl mx-auto">
            Comprehensive financial solutions tailored to meet your business and
            personal needs.
          </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
          <!-- Service Card 1 -->
          <div
            class="service-card bg-white border border-gray-100 rounded p-6 shadow-sm hover:shadow-md transition-all relative overflow-hidden"
          >
            <div class="flex items-start mb-4">
              <div
                class="w-12 h-12 flex items-center justify-center bg-[#c9a560]/10 rounded-full mr-4"
              >
                <i class="ri-building-line ri-lg text-[#c9a560]"></i>
              </div>
              <h3 class="text-xl font-semibold text-secondary">
                Business Loans
              </h3>
            </div>
            <p class="text-secondary/80 mb-4">
              Flexible financing solutions to help your business grow, expand
              operations, or manage cash flow.
            </p>
            <a href="#" class="text-[#c9a560] font-medium flex items-center">
              Learn More
              <i class="ri-arrow-right-line ri-sm ml-1"></i>
            </a>

            <div
              class="service-details absolute inset-0 bg-[#c9a560] bg-opacity-90 p-6 flex flex-col justify-center opacity-0 transform translate-y-8 transition-all duration-300"
            >
              <h3 class="text-xl font-semibold text-white mb-4">
                Business Loans
              </h3>
              <ul class="text-white space-y-2 mb-4">
                <li class="flex items-start">
                  <i class="ri-check-line ri-sm mr-2 mt-1"></i>
                  <span>Working capital loans up to ₹5 Crore</span>
                </li>
                <li class="flex items-start">
                  <i class="ri-check-line ri-sm mr-2 mt-1"></i>
                  <span>Equipment financing with flexible terms</span>
                </li>
                <li class="flex items-start">
                  <i class="ri-check-line ri-sm mr-2 mt-1"></i>
                  <span>Competitive interest rates from 9.5%</span>
                </li>
              </ul>
              <button
                class="bg-white text-[#c9a560] px-6 py-2 font-medium !rounded-button whitespace-nowrap self-start"
              >
                Apply Now
              </button>
            </div>
          </div>

          <!-- Service Card 2 -->
          <div
            class="service-card bg-white border border-gray-100 rounded p-6 shadow-sm hover:shadow-md transition-all relative overflow-hidden"
          >
            <div class="flex items-start mb-4">
              <div
                class="w-12 h-12 flex items-center justify-center bg-[#c9a560]/10 rounded-full mr-4"
              >
                <i class="ri-home-4-line ri-lg text-[#c9a560]"></i>
              </div>
              <h3 class="text-xl font-semibold text-secondary">Home Loans</h3>
            </div>
            <p class="text-secondary/80 mb-4">
              Realize your dream of homeownership with our competitive mortgage
              options and expert guidance.
            </p>
            <a href="#" class="text-[#c9a560] font-medium flex items-center">
              Learn More
              <i class="ri-arrow-right-line ri-sm ml-1"></i>
            </a>

            <div
              class="service-details absolute inset-0 bg-[#c9a560] bg-opacity-90 p-6 flex flex-col justify-center opacity-0 transform translate-y-8 transition-all duration-300"
            >
              <h3 class="text-xl font-semibold text-white mb-4">Home Loans</h3>
              <ul class="text-white space-y-2 mb-4">
                <li class="flex items-start">
                  <i class="ri-check-line ri-sm mr-2 mt-1"></i>
                  <span>Loans up to ₹10 Crore with 30-year terms</span>
                </li>
                <li class="flex items-start">
                  <i class="ri-check-line ri-sm mr-2 mt-1"></i>
                  <span>Interest rates starting from 6.75%</span>
                </li>
                <li class="flex items-start">
                  <i class="ri-check-line ri-sm mr-2 mt-1"></i>
                  <span>Special rates for first-time buyers</span>
                </li>
              </ul>
              <button
                class="bg-white text-[#c9a560] px-6 py-2 font-medium !rounded-button whitespace-nowrap self-start"
              >
                Apply Now
              </button>
            </div>
          </div>

          <!-- Service Card 3 -->
          <div
            class="service-card bg-white border border-gray-100 rounded p-6 shadow-sm hover:shadow-md transition-all relative overflow-hidden"
          >
            <div class="flex items-start mb-4">
              <div
                class="w-12 h-12 flex items-center justify-center bg-[#c9a560]/10 rounded-full mr-4"
              >
                <i class="ri-car-line ri-lg text-[#c9a560]"></i>
              </div>
              <h3 class="text-xl font-semibold text-secondary">Auto Loans</h3>
            </div>
            <p class="text-secondary/80 mb-4">
              Drive away in your dream vehicle with our hassle-free auto
              financing solutions and quick approvals.
            </p>
            <a href="#" class="text-[#c9a560] font-medium flex items-center">
              Learn More
              <i class="ri-arrow-right-line ri-sm ml-1"></i>
            </a>

            <div
              class="service-details absolute inset-0 bg-[#c9a560] bg-opacity-90 p-6 flex flex-col justify-center opacity-0 transform translate-y-8 transition-all duration-300"
            >
              <h3 class="text-xl font-semibold text-white mb-4">Auto Loans</h3>
              <ul class="text-white space-y-2 mb-4">
                <li class="flex items-start">
                  <i class="ri-check-line ri-sm mr-2 mt-1"></i>
                  <span>100% financing on select models</span>
                </li>
                <li class="flex items-start">
                  <i class="ri-check-line ri-sm mr-2 mt-1"></i>
                  <span>Interest rates from 7.25%</span>
                </li>
                <li class="flex items-start">
                  <i class="ri-check-line ri-sm mr-2 mt-1"></i>
                  <span>Quick approval within 24 hours</span>
                </li>
              </ul>
              <button
                class="bg-white text-[#c9a560] px-6 py-2 font-medium !rounded-button whitespace-nowrap self-start"
              >
                Apply Now
              </button>
            </div>
          </div>

          <!-- Service Card 4 -->
          <div
            class="service-card bg-white border border-gray-100 rounded p-6 shadow-sm hover:shadow-md transition-all relative overflow-hidden"
          >
            <div class="flex items-start mb-4">
              <div
                class="w-12 h-12 flex items-center justify-center bg-[#c9a560]/10 rounded-full mr-4"
              >
                <i class="ri-graduation-cap-line ri-lg text-[#c9a560]"></i>
              </div>
              <h3 class="text-xl font-semibold text-secondary">
                Education Loans
              </h3>
            </div>
            <p class="text-secondary/80 mb-4">
              Invest in your future with our education financing options for
              domestic and international studies.
            </p>
            <a href="#" class="text-[#c9a560] font-medium flex items-center">
              Learn More
              <i class="ri-arrow-right-line ri-sm ml-1"></i>
            </a>

            <div
              class="service-details absolute inset-0 bg-[#c9a560] bg-opacity-90 p-6 flex flex-col justify-center opacity-0 transform translate-y-8 transition-all duration-300"
            >
              <h3 class="text-xl font-semibold text-white mb-4">
                Education Loans
              </h3>
              <ul class="text-white space-y-2 mb-4">
                <li class="flex items-start">
                  <i class="ri-check-line ri-sm mr-2 mt-1"></i>
                  <span>Loans up to ₹75 Lakh for overseas education</span>
                </li>
                <li class="flex items-start">
                  <i class="ri-check-line ri-sm mr-2 mt-1"></i>
                  <span>Moratorium period during course duration</span>
                </li>
                <li class="flex items-start">
                  <i class="ri-check-line ri-sm mr-2 mt-1"></i>
                  <span>Tax benefits under Section 80E</span>
                </li>
              </ul>
              <button
                class="bg-white text-[#c9a560] px-6 py-2 font-medium !rounded-button whitespace-nowrap self-start"
              >
                Apply Now
              </button>
            </div>
          </div>

          <!-- Service Card 5 -->
          <div
            class="service-card bg-white border border-gray-100 rounded p-6 shadow-sm hover:shadow-md transition-all relative overflow-hidden"
          >
            <div class="flex items-start mb-4">
              <div
                class="w-12 h-12 flex items-center justify-center bg-[#c9a560]/10 rounded-full mr-4"
              >
                <i class="ri-bank-card-line ri-lg text-[#c9a560]"></i>
              </div>
              <h3 class="text-xl font-semibold text-secondary">
                Personal Loans
              </h3>
            </div>
            <p class="text-secondary/80 mb-4">
              Quick access to funds for your personal needs with minimal
              documentation and flexible repayment options.
            </p>
            <a href="#" class="text-[#c9a560] font-medium flex items-center">
              Learn More
              <i class="ri-arrow-right-line ri-sm ml-1"></i>
            </a>

            <div
              class="service-details absolute inset-0 bg-[#c9a560] bg-opacity-90 p-6 flex flex-col justify-center opacity-0 transform translate-y-8 transition-all duration-300"
            >
              <h3 class="text-xl font-semibold text-white mb-4">
                Personal Loans
              </h3>
              <ul class="text-white space-y-2 mb-4">
                <li class="flex items-start">
                  <i class="ri-check-line ri-sm mr-2 mt-1"></i>
                  <span>Unsecured loans up to ₹25 Lakh</span>
                </li>
                <li class="flex items-start">
                  <i class="ri-check-line ri-sm mr-2 mt-1"></i>
                  <span>Minimal documentation with digital process</span>
                </li>
                <li class="flex items-start">
                  <i class="ri-check-line ri-sm mr-2 mt-1"></i>
                  <span>Flexible tenure options from 12-60 months</span>
                </li>
              </ul>
              <button
                class="bg-white text-[#c9a560] px-6 py-2 font-medium !rounded-button whitespace-nowrap self-start"
              >
                Apply Now
              </button>
            </div>
          </div>

          <!-- Service Card 6 -->
          <div
            class="service-card bg-white border border-gray-100 rounded p-6 shadow-sm hover:shadow-md transition-all relative overflow-hidden"
          >
            <div class="flex items-start mb-4">
              <div
                class="w-12 h-12 flex items-center justify-center bg-[#c9a560]/10 rounded-full mr-4"
              >
                <i class="ri-briefcase-4-line ri-lg text-[#c9a560]"></i>
              </div>
              <h3 class="text-xl font-semibold text-secondary">
                Project Financing
              </h3>
            </div>
            <p class="text-secondary/80 mb-4">
              Specialized funding solutions for large-scale projects with
              structured repayment schedules.
            </p>
            <a href="#" class="text-[#c9a560] font-medium flex items-center">
              Learn More
              <i class="ri-arrow-right-line ri-sm ml-1"></i>
            </a>

            <div
              class="service-details absolute inset-0 bg-[#c9a560] bg-opacity-90 p-6 flex flex-col justify-center opacity-0 transform translate-y-8 transition-all duration-300"
            >
              <h3 class="text-xl font-semibold text-white mb-4">
                Project Financing
              </h3>
              <ul class="text-white space-y-2 mb-4">
                <li class="flex items-start">
                  <i class="ri-check-line ri-sm mr-2 mt-1"></i>
                  <span>Customized financing structures</span>
                </li>
                <li class="flex items-start">
                  <i class="ri-check-line ri-sm mr-2 mt-1"></i>
                  <span>Long-term funding with flexible terms</span>
                </li>
                <li class="flex items-start">
                  <i class="ri-check-line ri-sm mr-2 mt-1"></i>
                  <span>Expert guidance throughout project lifecycle</span>
                </li>
              </ul>
              <button
                class="bg-white text-[#c9a560] px-6 py-2 font-medium !rounded-button whitespace-nowrap self-start"
              >
                Apply Now
              </button>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-16 bg-offwhite" id="testimonials">
      <div class="container mx-auto px-4">
        <div class="text-center mb-12">
          <h2 class="text-3xl md:text-4xl font-bold text-secondary mb-4">
            What Our Clients Say
          </h2>
          <p class="text-lg text-secondary/80 max-w-3xl mx-auto">
            Hear from businesses and individuals who have transformed their
            financial journey with our guidance.
          </p>
        </div>

        <div class="relative">
          <div class="flex space-x-6 overflow-hidden testimonial-container">
            <!-- Testimonial 1 -->
            <div
              class="testimonial-card bg-white p-8 rounded shadow-sm min-w-[350px] max-w-md"
            >
              <div class="flex items-center mb-6">
                <div class="text-[#c9a560]">
                  <i class="ri-star-fill"></i>
                  <i class="ri-star-fill"></i>
                  <i class="ri-star-fill"></i>
                  <i class="ri-star-fill"></i>
                  <i class="ri-star-fill"></i>
                </div>
                <span class="ml-2 text-sm text-secondary/60">5.0</span>
              </div>
              <p class="text-secondary/80 italic mb-6">
                "KV Associates helped us secure the perfect financing solution
                for our manufacturing expansion. Their expertise and
                personalized approach made all the difference in our growth
                journey."
              </p>
              <div class="flex items-center">
                <div
                  class="w-12 h-12 bg-[#c9a560]/20 rounded-full flex items-center justify-center mr-4"
                >
                  <span class="text-[#c9a560] font-medium">RK</span>
                </div>
                <div>
                  <h4 class="font-medium text-secondary">Rajiv Kumar</h4>
                  <p class="text-sm text-secondary/60">
                    CEO, Precision Manufacturing Ltd.
                  </p>
                </div>
              </div>
            </div>

            <!-- Testimonial 2 -->
            <div
              class="testimonial-card bg-white p-8 rounded shadow-sm min-w-[350px] max-w-md"
            >
              <div class="flex items-center mb-6">
                <div class="text-[#c9a560]">
                  <i class="ri-star-fill"></i>
                  <i class="ri-star-fill"></i>
                  <i class="ri-star-fill"></i>
                  <i class="ri-star-fill"></i>
                  <i class="ri-star-fill"></i>
                </div>
                <span class="ml-2 text-sm text-secondary/60">5.0</span>
              </div>
              <p class="text-secondary/80 italic mb-6">
                "As a first-time homebuyer, I was overwhelmed by the process.
                The team at KV Associates guided me through every step, securing
                a great rate and making my dream home a reality."
              </p>
              <div class="flex items-center">
                <div
                  class="w-12 h-12 bg-[#c9a560]/20 rounded-full flex items-center justify-center mr-4"
                >
                  <span class="text-[#c9a560] font-medium">SP</span>
                </div>
                <div>
                  <h4 class="font-medium text-secondary">Sanya Patel</h4>
                  <p class="text-sm text-secondary/60">IT Professional</p>
                </div>
              </div>
            </div>

            <!-- Testimonial 3 -->
            <div
              class="testimonial-card bg-white p-8 rounded shadow-sm min-w-[350px] max-w-md"
            >
              <div class="flex items-center mb-6">
                <div class="text-[#c9a560]">
                  <i class="ri-star-fill"></i>
                  <i class="ri-star-fill"></i>
                  <i class="ri-star-fill"></i>
                  <i class="ri-star-fill"></i>
                  <i class="ri-star-half-fill"></i>
                </div>
                <span class="ml-2 text-sm text-secondary/60">4.5</span>
              </div>
              <p class="text-secondary/80 italic mb-6">
                "The education loan process for my daughter's overseas studies
                was seamless with KV Associates. Their expertise in
                international education financing was invaluable."
              </p>
              <div class="flex items-center">
                <div
                  class="w-12 h-12 bg-[#c9a560]/20 rounded-full flex items-center justify-center mr-4"
                >
                  <span class="text-[#c9a560] font-medium">AM</span>
                </div>
                <div>
                  <h4 class="font-medium text-secondary">Ajay Mehta</h4>
                  <p class="text-sm text-secondary/60">Business Owner</p>
                </div>
              </div>
            </div>

            <!-- Testimonial 4 -->
            <div
              class="testimonial-card bg-white p-8 rounded shadow-sm min-w-[350px] max-w-md"
            >
              <div class="flex items-center mb-6">
                <div class="text-[#c9a560]">
                  <i class="ri-star-fill"></i>
                  <i class="ri-star-fill"></i>
                  <i class="ri-star-fill"></i>
                  <i class="ri-star-fill"></i>
                  <i class="ri-star-fill"></i>
                </div>
                <span class="ml-2 text-sm text-secondary/60">5.0</span>
              </div>
              <p class="text-secondary/80 italic mb-6">
                "Our startup needed working capital quickly, and KV Associates
                delivered beyond expectations. Their understanding of the
                startup ecosystem helped us secure the right financing."
              </p>
              <div class="flex items-center">
                <div
                  class="w-12 h-12 bg-[#c9a560]/20 rounded-full flex items-center justify-center mr-4"
                >
                  <span class="text-[#c9a560] font-medium">PR</span>
                </div>
                <div>
                  <h4 class="font-medium text-secondary">Priya Reddy</h4>
                  <p class="text-sm text-secondary/60">
                    Co-founder, TechInnovate
                  </p>
                </div>
              </div>
            </div>
          </div>

          <div class="flex justify-center mt-8">
            <div class="w-3 h-3 rounded-full bg-[#c9a560] mx-1"></div>
            <div class="w-3 h-3 rounded-full bg-gray-300 mx-1"></div>
            <div class="w-3 h-3 rounded-full bg-gray-300 mx-1"></div>
            <div class="w-3 h-3 rounded-full bg-gray-300 mx-1"></div>
          </div>
        </div>
      </div>
    </section>




<section class="w-4/5 mx-auto my-10 bg-[#c9a560] rounded-2xl p-6 md:p-10 shadow-lg">
  <div class="flex flex-col md:flex-row items-center justify-between gap-8">
    
    <!-- Left Content -->
    <div class="md:w-1/2 text-white">
      <h2 class="text-3xl font-bold mb-4">Become a Reference Partner</h2>
      <p class="text-lg">Join us in helping others by becoming a trusted reference partner. Help grow our community and enjoy exclusive benefits.</p>
    </div>
    
    <!-- Right Form -->
    <div class="md:w-1/2 bg-white rounded-xl p-6 shadow-md w-full">
      <form class="space-y-4">
        <div>
          <label class="block text-gray-700 font-semibold mb-1" for="name">Name</label>
          <input type="text" id="name" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-[#c9a560]" placeholder="Enter your name">
        </div>
        <div>
          <label class="block text-gray-700 font-semibold mb-1" for="email">Email</label>
          <input type="email" id="email" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-[#c9a560]" placeholder="Enter your email">
        </div>
        <button type="submit" class="bg-[#c9a560] text-white px-6 py-2 rounded-md hover:bg-[#b58d49] transition-colors">
          Submit
        </button>
      </form>
    </div>

  </div>
</section>



    <!-- Blog Preview -->
    <section class="py-16 bg-white">
      <div class="container mx-auto px-4">
        <div class="flex justify-between items-center mb-12">
          <div>
            <h2 class="text-3xl md:text-4xl font-bold text-secondary mb-4">
              Latest Insights
            </h2>
            <p class="text-lg text-secondary/80">
              Stay informed with our latest articles on financial trends and
              strategies.
            </p>
          </div>
          <a
            href="#"
            class="text-[#c9a560] font-medium flex items-center whitespace-nowrap"
          >
            View All Articles
            <i class="ri-arrow-right-line ri-sm ml-1"></i>
          </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          <!-- Blog Card 1 -->
          <div class="blog-card group">
            <div class="relative h-56 rounded overflow-hidden mb-4">
              <img
                src="https://readdy.ai/api/search-image?query=professional%20business%20meeting%20with%20financial%20advisors%20discussing%20documents%20and%20charts%20in%20modern%20office%20setting%2C%20business%20attire%2C%20clean%20corporate%20environment%2C%20financial%20planning%20session&width=600&height=400&seq=1&orientation=landscape"
                alt="Business Loan Strategies"
                class="w-full h-full object-cover object-top"
              />
              <div
                class="blog-overlay absolute inset-0 bg-[#c9a560] opacity-0 transition-opacity duration-300"
              ></div>
            </div>
            <div class="flex items-center mb-2">
              <span
                class="text-xs font-medium bg-[#c9a560]/10 text-[#c9a560] px-3 py-1 rounded-full"
                >Business Finance</span
              >
              <span class="text-xs text-secondary/60 ml-3 flex items-center">
                <i class="ri-time-line ri-sm mr-1"></i>
                5 min read
              </span>
            </div>
            <h3
              class="blog-title text-xl font-semibold text-secondary mb-2 transition-colors duration-300"
            >
              5 Effective Strategies to Secure Business Funding in 2025
            </h3>
            <p class="text-secondary/80 line-clamp-2">
              Explore the latest approaches to securing optimal business
              financing in today's competitive market environment.
            </p>
            <a href="#" class="mt-4 inline-block text-[#c9a560] font-medium"
              >Read Article</a
            >
          </div>

          <!-- Blog Card 2 -->
          <div class="blog-card group">
            <div class="relative h-56 rounded overflow-hidden mb-4">
              <img
                src="https://readdy.ai/api/search-image?query=modern%20home%20interior%20with%20family%20discussing%20home%20finances%2C%20architectural%20plans%20on%20table%2C%20calculator%20and%20documents%2C%20bright%20living%20room%20with%20large%20windows%2C%20contemporary%20furniture&width=600&height=400&seq=2&orientation=landscape"
                alt="Home Loan Tips"
                class="w-full h-full object-cover object-top"
              />
              <div
                class="blog-overlay absolute inset-0 bg-[#c9a560] opacity-0 transition-opacity duration-300"
              ></div>
            </div>
            <div class="flex items-center mb-2">
              <span
                class="text-xs font-medium bg-[#c9a560]/10 text-[#c9a560] px-3 py-1 rounded-full"
                >Home Loans</span
              >
              <span class="text-xs text-secondary/60 ml-3 flex items-center">
                <i class="ri-time-line ri-sm mr-1"></i>
                4 min read
              </span>
            </div>
            <h3
              class="blog-title text-xl font-semibold text-secondary mb-2 transition-colors duration-300"
            >
              How to Navigate Rising Interest Rates When Buying Your Dream Home
            </h3>
            <p class="text-secondary/80 line-clamp-2">
              Expert advice on managing the impact of increasing interest rates
              while pursuing homeownership in the current market.
            </p>
            <a href="#" class="mt-4 inline-block text-[#c9a560] font-medium"
              >Read Article</a
            >
          </div>

          <!-- Blog Card 3 -->
          <div class="blog-card group">
            <div class="relative h-56 rounded overflow-hidden mb-4">
              <img
                src="https://readdy.ai/api/search-image?query=student%20studying%20with%20laptop%20and%20financial%20documents%2C%20education%20loan%20paperwork%2C%20university%20campus%20visible%20through%20window%2C%20modern%20study%20environment%2C%20calculator%20and%20coffee%20cup%20on%20desk&width=600&height=400&seq=3&orientation=landscape"
                alt="Education Financing"
                class="w-full h-full object-cover object-top"
              />
              <div
                class="blog-overlay absolute inset-0 bg-[#c9a560] opacity-0 transition-opacity duration-300"
              ></div>
            </div>
            <div class="flex items-center mb-2">
              <span
                class="text-xs font-medium bg-[#c9a560]/10 text-[#c9a560] px-3 py-1 rounded-full"
                >Education Finance</span
              >
              <span class="text-xs text-secondary/60 ml-3 flex items-center">
                <i class="ri-time-line ri-sm mr-1"></i>
                6 min read
              </span>
            </div>
            <h3
              class="blog-title text-xl font-semibold text-secondary mb-2 transition-colors duration-300"
            >
              The Complete Guide to Financing International Education in 2025
            </h3>
            <p class="text-secondary/80 line-clamp-2">
              Comprehensive insights into funding options for students pursuing
              higher education abroad, including scholarships and loan
              opportunities.
            </p>
            <a href="#" class="mt-4 inline-block text-[#c9a560] font-medium"
              >Read Article</a
            >
          </div>
        </div>
      </div>
    </section>

    <!-- Contact Form -->
    <section class="py-16 bg-offwhite" id="contact">
      <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
          <div>
            <h2 class="text-3xl md:text-4xl font-bold text-secondary mb-6">
              Get in Touch
            </h2>
            <p class="text-lg text-secondary/80 mb-8">
              Have questions about our financial services? Our experts are here
              to help you find the perfect solution for your needs.
            </p>

            <div class="space-y-6">
              <div class="flex items-start">
                <div
                  class="w-12 h-12 flex items-center justify-center bg-[#c9a560]/10 rounded-full mr-4"
                >
                  <i class="ri-map-pin-line ri-lg text-[#c9a560]"></i>
                </div>
                <div>
                  <h3 class="font-medium text-secondary mb-1">Our Office</h3>
                  <p class="text-secondary/80">
                  Office no.9 , ground floor 142, new road satyam plaza near gujrati school Ratlam
                  </p>
                </div>
              </div>

              <div class="flex items-start">
                <div
                  class="w-12 h-12 flex items-center justify-center bg-[#c9a560]/10 rounded-full mr-4"
                >
                  <i class="ri-mail-line ri-lg text-[#c9a560]"></i>
                </div>
                <div>
                  <h3 class="font-medium text-secondary mb-1">Email Us</h3>
                  <p class="text-secondary/80">info@kvassociateindia.com</p>
                </div>
              </div>

              <div class="flex items-start">
                <div
                  class="w-12 h-12 flex items-center justify-center bg-[#c9a560]/10 rounded-full mr-4"
                >
                  <i class="ri-phone-line ri-lg text-[#c9a560]"></i>
                </div>
                <div>
                  <h3 class="font-medium text-secondary mb-1">Call Us</h3>
                  <p class="text-secondary/80">+91 7909999901</p>
                  <p class="text-secondary/80">+91 7909999902</p>
                </div>
              </div>

              <div class="flex items-start">
                <div
                  class="w-12 h-12 flex items-center justify-center bg-[#c9a560]/10 rounded-full mr-4"
                >
                  <i class="ri-time-line ri-lg text-[#c9a560]"></i>
                </div>
                <div>
                  <h3 class="font-medium text-secondary mb-1">
                    Business Hours
                  </h3>
                  <p class="text-secondary/80">
                    Monday - Saturday: 10:00 AM - 7:00 PM<br />
                  </p>
                </div>
              </div>
            </div>
          </div>

          <div class="bg-white p-8 rounded shadow-sm">
            <h3 class="text-2xl font-semibold text-secondary mb-6">
              Send Us a Message
            </h3>
            <form>
              <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                  <label
                    for="name"
                    class="block text-sm font-medium text-secondary mb-2"
                    >Full Name</label
                  >
                  <input
                    type="text"
                    id="name"
                    class="form-input w-full px-4 py-2 rounded border-none bg-offwhite"
                    placeholder="Sumit Sahu"
                  />
                </div>
                <div>
                  <label
                    for="email"
                    class="block text-sm font-medium text-secondary mb-2"
                    >Email Address</label
                  >
                  <input
                    type="email"
                    id="email"
                    class="form-input w-full px-4 py-2 rounded border-none bg-offwhite"
                    placeholder="sumit@example.com"
                  />
                </div>
              </div>

              <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                  <label
                    for="phone"
                    class="block text-sm font-medium text-secondary mb-2"
                    >Phone Number</label
                  >
                  <input
                    type="tel"
                    id="phone"
                    class="form-input w-full px-4 py-2 rounded border-none bg-offwhite"
                    placeholder="+91 98765 43210"
                  />
                </div>
                <div>
                  <label
                    for="service"
                    class="block text-sm font-medium text-secondary mb-2"
                    >Service Interest</label
                  >
                  <div class="relative">
                    <select
                      id="service"
                      class="form-input w-full px-4 py-2 rounded border-none bg-offwhite appearance-none pr-8"
                    >
                      <option value="" selected disabled>
                        Select a service
                      </option>
                      <option value="business">Business Loan</option>
                      <option value="home">Home Loan</option>
                      <option value="auto">Auto Loan</option>
                      <option value="education">Education Loan</option>
                      <option value="personal">Personal Loan</option>
                      <option value="project">Project Financing</option>
                    </select>
                    <div
                      class="absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none"
                    >
                      <i class="ri-arrow-down-s-line text-secondary"></i>
                    </div>
                  </div>
                </div>
              </div>

              <div class="mb-6">
                <label
                  for="message"
                  class="block text-sm font-medium text-secondary mb-2"
                  >Your Message</label
                >
                <textarea
                  id="message"
                  rows="4"
                  class="form-input w-full px-4 py-2 rounded border-none bg-offwhite"
                  placeholder="How can we help you?"
                ></textarea>
              </div>

              <div class="mb-6">
                <label class="flex items-start">
                  <input type="checkbox" class="mt-1" />
                  <span class="ml-2 text-sm text-secondary/80"
                    >I agree to the
                    <a href="#" class="text-[#c9a560]">Privacy Policy</a> and
                    consent to being contacted regarding my inquiry.</span
                  >
                </label>
              </div>

              <button
                type="submit"
                class="bg-[#c9a560] text-white px-8 py-3 font-medium !rounded-button whitespace-nowrap hover:bg-opacity-90 transition-all w-full"
              >
                Send Message
              </button>
            </form>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="bg-midnight text-white pt-16 pb-6">
      <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
          <!-- Company Info -->
          <div>
            <a
              href="#"
              class="w-[200px] font-['Pacifico'] text-[#c9a560]  inline-block"
              >
                <img src="footer logo.png"
>            </a
            >
            <p class="text-offwhite/80 mb-6">
              Providing expert financial consultancy services since 2008. We
              help businesses and individuals achieve their financial goals with
              personalized solutions.
            </p>
            <div class="flex space-x-4">
              <a
                href="#"
                class="w-10 h-10 flex items-center justify-center bg-white/10 rounded-full hover:bg-[#c9a560] transition-colors"
              >
                <i class="ri-facebook-fill text-white"></i>
              </a>
              <a
                href="#"
                class="w-10 h-10 flex items-center justify-center bg-white/10 rounded-full hover:bg-[#c9a560] transition-colors"
              >
                <i class="ri-twitter-x-fill text-white"></i>
              </a>
              <a
                href="#"
                class="w-10 h-10 flex items-center justify-center bg-white/10 rounded-full hover:bg-[#c9a560] transition-colors"
              >
                <i class="ri-linkedin-fill text-white"></i>
              </a>
              <a
                href="#"
                class="w-10 h-10 flex items-center justify-center bg-white/10 rounded-full hover:bg-[#c9a560] transition-colors"
              >
                <i class="ri-instagram-fill text-white"></i>
              </a>
            </div>
          </div>

          <!-- Quick Links -->
          <div>
            <h3 class="text-xl font-semibold mb-6">Quick Links</h3>
            <ul class="space-y-3">
              <li>
                <a
                  href="#"
                  class="text-offwhite/80 hover:text-[#c9a560] transition-colors"
                  >About Us</a
                >
              </li>
              <li>
                <a
                  href="#"
                  class="text-offwhite/80 hover:text-[#c9a560] transition-colors"
                  >Our Services</a
                >
              </li>
              <li>
                <a
                  href="#"
                  class="text-offwhite/80 hover:text-[#c9a560] transition-colors"
                  >Case Studies</a
                >
              </li>
              <li>
                <a
                  href="#"
                  class="text-offwhite/80 hover:text-[#c9a560] transition-colors"
                  >Testimonials</a
                >
              </li>
              <li>
                <a
                  href="#"
                  class="text-offwhite/80 hover:text-[#c9a560] transition-colors"
                  >Blog & Resources</a
                >
              </li>
              <li>
                <a
                  href="#"
                  class="text-offwhite/80 hover:text-[#c9a560] transition-colors"
                  >Contact Us</a
                >
              </li>
            </ul>
          </div>

          <!-- Services -->
          <div>
            <h3 class="text-xl font-semibold mb-6">Our Services</h3>
            <ul class="space-y-3">
              <li>
                <a
                  href="#"
                  class="text-offwhite/80 hover:text-[#c9a560] transition-colors"
                  >Business Loans</a
                >
              </li>
              <li>
                <a
                  href="#"
                  class="text-offwhite/80 hover:text-[#c9a560] transition-colors"
                  >Home Loans</a
                >
              </li>
              <li>
                <a
                  href="#"
                  class="text-offwhite/80 hover:text-[#c9a560] transition-colors"
                  >Auto Loans</a
                >
              </li>
              <li>
                <a
                  href="#"
                  class="text-offwhite/80 hover:text-[#c9a560] transition-colors"
                  >Education Loans</a
                >
              </li>
              <li>
                <a
                  href="#"
                  class="text-offwhite/80 hover:text-[#c9a560] transition-colors"
                  >Personal Loans</a
                >
              </li>
              <li>
                <a
                  href="#"
                  class="text-offwhite/80 hover:text-[#c9a560] transition-colors"
                  >Project Financing</a
                >
              </li>
            </ul>
          </div>

          <!-- Newsletter -->
          <div>
            <h3 class="text-xl font-semibold mb-6">
              Subscribe to Our Newsletter
            </h3>
            <p class="text-offwhite/80 mb-4">
              Stay updated with the latest financial insights and offers.
            </p>
            <form class="mb-4">
              <div class="flex">
                <input
                  type="email"
                  placeholder="Your email address"
                  class="px-4 py-2 rounded-l border-none bg-white/10 text-white w-full"
                />
                <button
                  type="submit"
                  class="bg-[#c9a560] text-white px-4 py-2 !rounded-r-button whitespace-nowrap hover:bg-opacity-90 transition-all"
                >
                  Subscribe
                </button>
              </div>
            </form>
            <div class="flex items-center space-x-4">
              <div class="w-8 h-8 flex items-center justify-center">
                <i class="ri-visa-fill ri-lg text-offwhite"></i>
              </div>
              <div class="w-8 h-8 flex items-center justify-center">
                <i class="ri-mastercard-fill ri-lg text-offwhite"></i>
              </div>
              <div class="w-8 h-8 flex items-center justify-center">
                <i class="ri-paypal-fill ri-lg text-offwhite"></i>
              </div>
              <div class="w-8 h-8 flex items-center justify-center">
                <i class="ri-bank-card-fill ri-lg text-offwhite"></i>
              </div>
            </div>
          </div>
        </div>

        <div class="border-t border-white/10 pt-6">
          <div class="flex flex-col md:flex-row justify-between items-center">
            <p class="text-offwhite/60 text-sm mb-4 md:mb-0">
              © 2025 KV Associates. All rights reserved.
            </p>
            <div class="flex space-x-6">
              <a
                href="#"
                class="text-offwhite/60 text-sm hover:text-[#c9a560] transition-colors"
                >Privacy Policy</a
              >
              <a
                href="#"
                class="text-offwhite/60 text-sm hover:text-[#c9a560] transition-colors"
                >Terms of Service</a
              >
              <a
                href="#"
                class="text-offwhite/60 text-sm hover:text-[#c9a560] transition-colors"
                >Sitemap</a
              >
            </div>
          </div>
        </div>
      </div>
    </footer>

    <!-- Sticky Elements -->
    <div
      class="fixed left-0 top-1/2 -translate-y-1/2 z-40 sticky-social transform -translate-x-10 hover:translate-x-0"
    >
      <div class="bg-white shadow-md rounded-r-lg p-2">
        <a
          href="#"
          class="w-10 h-10 flex items-center justify-center text-secondary hover:text-[#c9a560] transition-colors block mb-2"
        >
          <i class="ri-facebook-fill ri-lg"></i>
        </a>
        <a
          href="#"
          class="w-10 h-10 flex items-center justify-center text-secondary hover:text-[#c9a560] transition-colors block mb-2"
        >
          <i class="ri-twitter-x-fill ri-lg"></i>
        </a>
        <a
          href="#"
          class="w-10 h-10 flex items-center justify-center text-secondary hover:text-[#c9a560] transition-colors block mb-2"
        >
          <i class="ri-linkedin-fill ri-lg"></i>
        </a>
        <a
          href="#"
          class="w-10 h-10 flex items-center justify-center text-secondary hover:text-[#c9a560] transition-colors block"
        >
          <i class="ri-instagram-fill ri-lg"></i>
        </a>
      </div>
    </div>

    <div class="fixed right-0 top-1/2 -translate-y-1/2 z-40">
      <div class="flex flex-col space-y-4">
        <button
          class="bg-[#c9a560] text-white px-4 py-3 !rounded-l-button whitespace-nowrap hover:bg-opacity-90 transition-all shadow-md"
        >
          <i class="ri-phone-line ri-sm mr-2"></i>
          Request Callback
        </button>
                 <button
              onclick="document.getElementById('applyModal').classList.remove('hidden')"
              class="bg-[#c9a560] text-white px-4 py-3 !rounded-l-button whitespace-nowrap hover:bg-opacity-90 transition-all shadow-md"
            >
              <i class="ri-file-list-3-line ri-sm mr-2"></i>
              Apply Now
            </button>


      </div>
    </div>
    
    
    
    
    
    
    
<!-- Modal -->
<div id="applyModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center hidden">
  <div class="bg-white rounded-xl w-11/12 md:w-3/4 lg:w-2/3 max-h-[90vh] overflow-y-auto p-6 relative shadow-xl">

    <!-- Close Button -->
    <button onclick="document.getElementById('applyModal').classList.add('hidden')" class="absolute top-3 right-3 text-gray-600 hover:text-black text-2xl font-bold">&times;</button>

    <!-- Header -->
    <h2 class="text-2xl font-bold mb-6 text-center text-[#c9a560]">Apply Now</h2>

    <!-- Toggle Buttons -->
        <div class="flex justify-center space-x-4 mb-6">
              <button id="loanBtn" onclick="showForm('loan')" class="px-4 py-2 rounded-md border border-[#c9a560] font-semibold inactive-tab transition">Apply for Loan</button>
              <button id="franchiseBtn" onclick="showForm('franchise')" class="px-4 py-2 rounded-md border border-[#c9a560] font-semibold inactive-tab transition">Apply for Franchise</button>
            </div>

    <!-- Forms -->
    <div id="loanForm" class="">
      <h3 class="text-xl font-semibold mb-4 text-[#c9a560]">Loan Application</h3>
      <form class="space-y-4">
        <input type="text" placeholder="Full Name" class="w-full border px-4 py-2 rounded-md">
        <input type="email" placeholder="Email Address" class="w-full border px-4 py-2 rounded-md">
        <input type="text" placeholder="Loan Amount" class="w-full border px-4 py-2 rounded-md">
        <button type="submit" class="bg-[#c9a560] text-white px-4 py-2 rounded-md w-full hover:bg-opacity-90">
          Submit Loan Application
        </button>
      </form>
    </div>

    <div id="franchiseForm" class="hidden">
      <h3 class="text-xl font-semibold mb-4 text-[#c9a560]">Franchise Application</h3>
      <form class="space-y-4">
        <input type="text" placeholder="Full Name" class="w-full border px-4 py-2 rounded-md">
        <input type="email" placeholder="Email Address" class="w-full border px-4 py-2 rounded-md">
        <input type="text" placeholder="Location" class="w-full border px-4 py-2 rounded-md">
        <button type="submit" class="bg-[#c9a560] text-white px-4 py-2 rounded-md w-full hover:bg-opacity-90">
          Submit Franchise Request
        </button>
      </form>
    </div>

  </div>
</div>

<!-- Script to Toggle Forms -->
<script>
  function showForm(type) {
    const loanForm = document.getElementById('loanForm');
    const franchiseForm = document.getElementById('franchiseForm');
    const loanBtn = document.getElementById('loanBtn');
    const franchiseBtn = document.getElementById('franchiseBtn');

    if (type === 'loan') {
      loanForm.classList.remove('hidden');
      franchiseForm.classList.add('hidden');

      loanBtn.classList.add('active-tab');
      loanBtn.classList.remove('inactive-tab');

      franchiseBtn.classList.remove('active-tab');
      franchiseBtn.classList.add('inactive-tab');
    } else {
      franchiseForm.classList.remove('hidden');
      loanForm.classList.add('hidden');

      franchiseBtn.classList.add('active-tab');
      franchiseBtn.classList.remove('inactive-tab');

      loanBtn.classList.remove('active-tab');
      loanBtn.classList.add('inactive-tab');
    }
  }

  document.addEventListener("DOMContentLoaded", function () {
    showForm('loan');
  });
</script>

    
    
    
    
    
    
    
    
    

    <a href="https://wa.me/7909999901">
        
   <div class="fixed right-6 bottom-6 z-40">
      <button
        class="w-16 h-16 bg-[#25D366] rounded-full flex items-center justify-center shadow-lg hover:scale-105 transition-transform"
      >
        <i class="ri-whatsapp-fill ri-2x text-white"></i>
      </button>
    </div>
     </a>

    <!-- Chatbot -->
    
    <!-- Include chatbot -->
 <div class="fixed right-6 bottom-40 z-40">
        <?php include 'chatbot.php'; ?>
 </div>
    <div class="fixed right-6 bottom-28 z-40 chatbot-container" id="chatbot">
      
      <div
        class="bg-white rounded-lg shadow-lg overflow-hidden"
        style="width: 320px; display: none;"
        id="chatboxContainer"
      >
        <div class="bg-[#c9a560] p-4">
          <div class="flex justify-between items-center">
            <h3 class="text-white font-medium">Chat with Us</h3>
            <button id="closeChatbox" class="text-white">
              <i class="ri-close-line ri-lg"></i>
              
              
            </button>
          </div>
        </div>
        <div class="p-4 h-80 overflow-y-auto" id="chatMessages">
          <div class="flex mb-4">
            <div
              class="w-8 h-8 rounded-full bg-[#c9a560]/20 flex items-center justify-center mr-2 flex-shrink-0"
            >
              <i class="ri-customer-service-2-line text-[#c9a560]"></i>
              
              
              <!-- index.html -->


            </div>
            <div class="bg-offwhite rounded-lg p-3 max-w-[80%]">
              <p>Hi 👋 Welcome to KV Associates! How can we help?</p>
            </div>
          </div>
        </div>
        <div class="border-t p-4">
          <div class="grid grid-cols-1 gap-2">
            <button
              class="border border-primary text-[#c9a560] px-4 py-2 rounded !rounded-button whitespace-nowrap hover:bg-[#c9a560] hover:text-white transition-all text-sm"
            >
              I want to apply for a loan
            </button>
            <button
              class="border border-primary text-[#c9a560] px-4 py-2 rounded !rounded-button whitespace-nowrap hover:bg-[#c9a560] hover:text-white transition-all text-sm"
            >
              I need information about services
            </button>
            <button
              class="border border-primary text-[#c9a560] px-4 py-2 rounded !rounded-button whitespace-nowrap hover:bg-[#c9a560] hover:text-white transition-all text-sm"
            >
              I want to speak with an advisor
            </button>
          </div>
          <div class="flex mt-3">
            <input
              type="text"
              placeholder="Type your message..."
              class="form-input w-full px-3 py-2 rounded-l border-none bg-offwhite text-sm"
            />
            <button
              class="bg-[#c9a560] text-white px-4 !rounded-r-button whitespace-nowrap hover:bg-opacity-90 transition-all"
            >
              <i class="ri-send-plane-fill"></i>
            </button>
          </div>
        </div>
      </div>
                      


      <button
        class="w-14 h-14 bg-[#c9a560] rounded-full flex items-center justify-center shadow-lg hover:scale-105 transition-transform"
        id="chatbotButton"
      >
        <i class="ri-message-3-fill ri-lg text-white">

        </i>
        
      </button>
      
      
      <!-- index.html -->


    </div>

  
  </body>
</html>
