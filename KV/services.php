<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Services - KV Associates</title>
    <script src="https://cdn.tailwindcss.com/3.4.16"></script>
    <script>tailwind.config={theme:{extend:{colors:{primary:'#0051A4',secondary:'#FFFFFF'},borderRadius:{'none':'0px','sm':'4px',DEFAULT:'8px','md':'12px','lg':'16px','xl':'20px','2xl':'24px','3xl':'32px','full':'9999px','button':'8px'}}}}</script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css">
    <style>
        :where([class^="ri-"])::before { content: "\f3c2"; }
        body {
            font-family: 'Poppins', sans-serif;
            scroll-behavior: smooth;
        }
        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 81, 164, 0.1);
        }
        input:focus, button:focus {
            outline: none;
        }
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        @media (max-width: 768px) {
            .mobile-menu {
                display: none;
            }
            .mobile-menu.active {
                display: flex;
            }
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Header -->
    <?php include 'navbar.php' ?>

    <!-- Hero Section -->
    <section class="pt-24 bg-[#c9a560] text-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24">
            <div class="max-w-3xl">
                <h1 class="text-4xl md:text-5xl font-bold mb-6">Our Services</h1>
                <p class="text-lg md:text-xl mb-8 text-blue-100">We provide comprehensive business solutions to help your company grow and succeed in today's competitive market.</p>
                <div class="flex flex-wrap gap-4">
                    <a href="#services" class="bg-white text-[#c9a560] px-6 py-3 !rounded-button font-medium hover:bg-gray-100 transition-colors whitespace-nowrap">Explore Services</a>
                    <a href="/contact" class="bg-transparent border-2 border-white text-white px-6 py-3 !rounded-button font-medium hover:bg-white/10 transition-colors whitespace-nowrap">Contact Us</a>
                </div>
            </div>
        </div>
        <div class="h-16 bg-white rounded-t-3xl"></div>
    </section>

    <!-- Services Overview -->
    <section id="services" class="py-12 md:py-20 bg-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Comprehensive Business Solutions</h2>
                <p class="text-lg text-gray-600">We offer a wide range of professional services tailored to meet the unique needs of your business, ensuring compliance and growth.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Service 1 -->
                <div class="service-card bg-white p-6 rounded-lg shadow-md border border-gray-100 transition-all duration-300">
                    <div class="w-14 h-14 bg-blue-100 rounded-full flex items-center justify-center mb-6">
                        <i class="ri-building-line ri-lg text-[#c9a560]"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Business Consulting</h3>
                    <p class="text-gray-600 mb-6">Strategic guidance to optimize your business operations, improve efficiency, and drive sustainable growth through expert analysis and recommendations.</p>
                    <a href="/services/business-consulting" class="inline-flex items-center text-[#c9a560] font-medium hover:text-blue-700">
                        Learn More
                        <i class="ri-arrow-right-line ri-sm ml-2"></i>
                    </a>
                </div>
                
                <!-- Service 2 -->
                <div class="service-card bg-white p-6 rounded-lg shadow-md border border-gray-100 transition-all duration-300">
                    <div class="w-14 h-14 bg-blue-100 rounded-full flex items-center justify-center mb-6">
                        <i class="ri-bank-line ri-lg text-[#c9a560]"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Financial Advisory</h3>
                    <p class="text-gray-600 mb-6">Comprehensive financial planning, analysis, and advisory services to help you make informed decisions and achieve your financial objectives.</p>
                    <a href="/services/financial-advisory" class="inline-flex items-center text-[#c9a560] font-medium hover:text-blue-700">
                        Learn More
                        <i class="ri-arrow-right-line ri-sm ml-2"></i>
                    </a>
                </div>
                
                <!-- Service 3 -->
                <div class="service-card bg-white p-6 rounded-lg shadow-md border border-gray-100 transition-all duration-300">
                    <div class="w-14 h-14 bg-blue-100 rounded-full flex items-center justify-center mb-6">
                        <i class="ri-file-list-3-line ri-lg text-[#c9a560]"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Tax Planning</h3>
                    <p class="text-gray-600 mb-6">Strategic tax planning and compliance services to minimize tax liabilities, ensure regulatory compliance, and optimize your financial position.</p>
                    <a href="/services/tax-planning" class="inline-flex items-center text-[#c9a560] font-medium hover:text-blue-700">
                        Learn More
                        <i class="ri-arrow-right-line ri-sm ml-2"></i>
                    </a>
                </div>
                
                <!-- Service 4 -->
                <div class="service-card bg-white p-6 rounded-lg shadow-md border border-gray-100 transition-all duration-300">
                    <div class="w-14 h-14 bg-blue-100 rounded-full flex items-center justify-center mb-6">
                        <i class="ri-audit-line ri-lg text-[#c9a560]"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Audit & Assurance</h3>
                    <p class="text-gray-600 mb-6">Independent audit and assurance services to verify financial accuracy, enhance credibility, and provide stakeholders with reliable information.</p>
                    <a href="/services/audit-assurance" class="inline-flex items-center text-[#c9a560] font-medium hover:text-blue-700">
                        Learn More
                        <i class="ri-arrow-right-line ri-sm ml-2"></i>
                    </a>
                </div>
                
                <!-- Service 5 -->
                <div class="service-card bg-white p-6 rounded-lg shadow-md border border-gray-100 transition-all duration-300">
                    <div class="w-14 h-14 bg-blue-100 rounded-full flex items-center justify-center mb-6">
                        <i class="ri-government-line ri-lg text-[#c9a560]"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Company Registration</h3>
                    <p class="text-gray-600 mb-6">End-to-end company registration services, handling all legal formalities and documentation to establish your business entity efficiently.</p>
                    <a href="/services/company-registration" class="inline-flex items-center text-[#c9a560] font-medium hover:text-blue-700">
                        Learn More
                        <i class="ri-arrow-right-line ri-sm ml-2"></i>
                    </a>
                </div>
                
                <!-- Service 6 -->
                <div class="service-card bg-white p-6 rounded-lg shadow-md border border-gray-100 transition-all duration-300">
                    <div class="w-14 h-14 bg-blue-100 rounded-full flex items-center justify-center mb-6">
                        <i class="ri-percent-line ri-lg text-[#c9a560]"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">GST Services</h3>
                    <p class="text-gray-600 mb-6">Comprehensive GST registration, filing, and compliance services to ensure your business meets all Goods and Services Tax requirements.</p>
                    <a href="/services/gst-services" class="inline-flex items-center text-[#c9a560] font-medium hover:text-blue-700">
                        Learn More
                        <i class="ri-arrow-right-line ri-sm ml-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Service -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <span class="text-[#c9a560] font-medium mb-2 block">Featured Service</span>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">Business Consulting Excellence</h2>
                    <p class="text-gray-600 mb-6">Our business consulting services are designed to provide strategic insights and practical solutions to help your business overcome challenges and capitalize on opportunities.</p>
                    
                    <div class="space-y-4 mb-8">
                        <div class="flex items-start">
                            <div class="w-6 h-6 flex-shrink-0 bg-blue-100 rounded-full flex items-center justify-center mt-1">
                                <i class="ri-check-line ri-sm text-[#c9a560]"></i>
                            </div>
                            <p class="ml-3 text-gray-600">Strategic business planning and growth strategies</p>
                        </div>
                        <div class="flex items-start">
                            <div class="w-6 h-6 flex-shrink-0 bg-blue-100 rounded-full flex items-center justify-center mt-1">
                                <i class="ri-check-line ri-sm text-[#c9a560]"></i>
                            </div>
                            <p class="ml-3 text-gray-600">Operational efficiency and process optimization</p>
                        </div>
                        <div class="flex items-start">
                            <div class="w-6 h-6 flex-shrink-0 bg-blue-100 rounded-full flex items-center justify-center mt-1">
                                <i class="ri-check-line ri-sm text-[#c9a560]"></i>
                            </div>
                            <p class="ml-3 text-gray-600">Market analysis and competitive positioning</p>
                        </div>
                        <div class="flex items-start">
                            <div class="w-6 h-6 flex-shrink-0 bg-blue-100 rounded-full flex items-center justify-center mt-1">
                                <i class="ri-check-line ri-sm text-[#c9a560]"></i>
                            </div>
                            <p class="ml-3 text-gray-600">Risk management and mitigation strategies</p>
                        </div>
                    </div>
                    
                    <a href="/services/business-consulting" class="inline-flex items-center bg-[#c9a560] text-white px-6 py-3 !rounded-button font-medium hover:bg-blue-700 transition-colors whitespace-nowrap">
                        Learn More
                        <i class="ri-arrow-right-line ri-sm ml-2"></i>
                    </a>
                </div>
                
                <div class="rounded-lg overflow-hidden shadow-lg">
                    <img src="https://readdy.ai/api/search-image?query=professional%20business%20consultants%20in%20a%20modern%20office%20discussing%20strategy%20with%20clients%2C%20business%20meeting%20with%20charts%20and%20documents%2C%20corporate%20setting%2C%20professional%20attire%2C%20collaborative%20environment&width=600&height=400&seq=1&orientation=landscape" alt="Business Consulting" class="w-full h-full object-cover">
                </div>
            </div>
        </div>
    </section>

    <!-- Service Process -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Our Service Process</h2>
                <p class="text-lg text-gray-600">We follow a structured approach to deliver exceptional results for our clients, ensuring transparency and efficiency at every step.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Step 1 -->
                <div class="text-center">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <span class="text-2xl font-bold text-[#c9a560]">1</span>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Consultation</h3>
                    <p class="text-gray-600">We begin with a thorough consultation to understand your business needs and objectives.</p>
                </div>
                
                <!-- Step 2 -->
                <div class="text-center">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <span class="text-2xl font-bold text-[#c9a560]">2</span>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Analysis</h3>
                    <p class="text-gray-600">Our experts analyze your current situation and identify opportunities for improvement.</p>
                </div>
                
                <!-- Step 3 -->
                <div class="text-center">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <span class="text-2xl font-bold text-[#c9a560]">3</span>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Implementation</h3>
                    <p class="text-gray-600">We implement tailored solutions designed to address your specific business challenges.</p>
                </div>
                
                <!-- Step 4 -->
                <div class="text-center">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <span class="text-2xl font-bold text-[#c9a560]">4</span>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Follow-up</h3>
                    <p class="text-gray-600">We provide ongoing support and follow-up to ensure long-term success and satisfaction.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">What Our Clients Say</h2>
                <p class="text-lg text-gray-600">Don't just take our word for it. Hear from businesses that have transformed with our services.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div class="bg-white p-6 rounded-lg shadow-md border border-gray-100">
                    <div class="flex items-center mb-4">
                        <i class="ri-double-quotes-l ri-2x text-[#c9a560] opacity-30"></i>
                    </div>
                    <p class="text-gray-600 mb-6">KV Associates has been instrumental in helping us navigate complex tax regulations. Their expertise has saved us both time and money while ensuring full compliance.</p>
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-gray-200 rounded-full flex items-center justify-center mr-4">
                            <i class="ri-user-line ri-lg text-gray-500"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">Rajiv Mehta</h4>
                            <p class="text-sm text-gray-500">CEO, TechSolutions India</p>
                        </div>
                    </div>
                </div>
                
                <!-- Testimonial 2 -->
                <div class="bg-white p-6 rounded-lg shadow-md border border-gray-100">
                    <div class="flex items-center mb-4">
                        <i class="ri-double-quotes-l ri-2x text-[#c9a560] opacity-30"></i>
                    </div>
                    <p class="text-gray-600 mb-6">The business consulting services provided by KV Associates have transformed our operations. Their strategic insights helped us increase efficiency and profitability.</p>
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-gray-200 rounded-full flex items-center justify-center mr-4">
                            <i class="ri-user-line ri-lg text-gray-500"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">Priya Sharma</h4>
                            <p class="text-sm text-gray-500">Director, GreenLife Organics</p>
                        </div>
                    </div>
                </div>
                
                <!-- Testimonial 3 -->
                <div class="bg-white p-6 rounded-lg shadow-md border border-gray-100">
                    <div class="flex items-center mb-4">
                        <i class="ri-double-quotes-l ri-2x text-[#c9a560] opacity-30"></i>
                    </div>
                    <p class="text-gray-600 mb-6">The company registration process was seamless with KV Associates. They handled all the paperwork and legal formalities, allowing us to focus on building our business.</p>
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-gray-200 rounded-full flex items-center justify-center mr-4">
                            <i class="ri-user-line ri-lg text-gray-500"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">Arjun Patel</h4>
                            <p class="text-sm text-gray-500">Founder, Innovate Designs</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- CTA Section -->
    <section class="py-16 bg-[#c9a560] text-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-3xl md:text-4xl font-bold mb-6">Ready to Transform Your Business?</h2>
                <p class="text-xl text-blue-100 mb-8">Contact us today to discuss how our services can help your business thrive in today's competitive environment.</p>
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="/contact" class="bg-white text-[#c9a560] px-8 py-3 !rounded-button font-medium hover:bg-gray-100 transition-colors whitespace-nowrap">Get in Touch</a>
                    <a href="tel:+919876543210" class="bg-transparent border-2 border-white text-white px-8 py-3 !rounded-button font-medium hover:bg-white/10 transition-colors whitespace-nowrap flex items-center">
                        <i class="ri-phone-line ri-lg mr-2"></i>
                        Call Us
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Frequently Asked Questions</h2>
                <p class="text-lg text-gray-600">Find answers to common questions about our services and how we can help your business.</p>
            </div>
            
            <div class="max-w-3xl mx-auto divide-y divide-gray-200">
                <!-- FAQ Item 1 -->
                <div class="py-6">
                    <button class="faq-toggle flex justify-between items-center w-full text-left" data-target="faq-1">
                        <h3 class="text-lg font-semibold text-gray-900">What types of businesses do you work with?</h3>
                        <i class="ri-arrow-down-s-line ri-lg text-[#c9a560]"></i>
                    </button>
                    <div id="faq-1" class="faq-content hidden mt-4">
                        <p class="text-gray-600">We work with businesses of all sizes across various industries, including startups, small and medium enterprises, and large corporations. Our services are tailored to meet the specific needs of each client, regardless of their size or sector.</p>
                    </div>
                </div>
                
                <!-- FAQ Item 2 -->
                <div class="py-6">
                    <button class="faq-toggle flex justify-between items-center w-full text-left" data-target="faq-2">
                        <h3 class="text-lg font-semibold text-gray-900">How long does the company registration process take?</h3>
                        <i class="ri-arrow-down-s-line ri-lg text-[#c9a560]"></i>
                    </button>
                    <div id="faq-2" class="faq-content hidden mt-4">
                        <p class="text-gray-600">The company registration process typically takes 15-20 working days, depending on the type of entity and the completeness of the documentation provided. We work efficiently to ensure the process is completed as quickly as possible while ensuring all legal requirements are met.</p>
                    </div>
                </div>
                
                <!-- FAQ Item 3 -->
                <div class="py-6">
                    <button class="faq-toggle flex justify-between items-center w-full text-left" data-target="faq-3">
                        <h3 class="text-lg font-semibold text-gray-900">What is included in your GST services?</h3>
                        <i class="ri-arrow-down-s-line ri-lg text-[#c9a560]"></i>
                    </button>
                    <div id="faq-3" class="faq-content hidden mt-4">
                        <p class="text-gray-600">Our GST services include GST registration, monthly/quarterly return filing, GST reconciliation, input tax credit optimization, GST audit assistance, and GST compliance management. We also provide advisory services to help you navigate complex GST regulations and optimize your tax position.</p>
                    </div>
                </div>
                
                <!-- FAQ Item 4 -->
                <div class="py-6">
                    <button class="faq-toggle flex justify-between items-center w-full text-left" data-target="faq-4">
                        <h3 class="text-lg font-semibold text-gray-900">How can your business consulting services help my company?</h3>
                        <i class="ri-arrow-down-s-line ri-lg text-[#c9a560]"></i>
                    </button>
                    <div id="faq-4" class="faq-content hidden mt-4">
                        <p class="text-gray-600">Our business consulting services can help identify areas for improvement, optimize operations, develop growth strategies, and enhance overall performance. We conduct a thorough analysis of your business, identify challenges and opportunities, and provide actionable recommendations to help you achieve your business objectives.</p>
                    </div>
                </div>
                
                <!-- FAQ Item 5 -->
                <div class="py-6">
                    <button class="faq-toggle flex justify-between items-center w-full text-left" data-target="faq-5">
                        <h3 class="text-lg font-semibold text-gray-900">What makes KV Associates different from other consulting firms?</h3>
                        <i class="ri-arrow-down-s-line ri-lg text-[#c9a560]"></i>
                    </button>
                    <div id="faq-5" class="faq-content hidden mt-4">
                        <p class="text-gray-600">KV Associates stands out for our personalized approach, industry expertise, and commitment to client success. We take the time to understand your unique business needs and challenges, and work closely with you to develop tailored solutions. Our team of experienced professionals brings deep industry knowledge and a track record of delivering measurable results for our clients.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
  <?php
  include './footer.php'
?>


    <script>
      

        document.addEventListener('DOMContentLoaded', function() {
            // Counter Animation
            const counters = document.querySelectorAll('.counter-value');
            const speed = 200;
            
            const animateCounters = () => {
                counters.forEach(counter => {
                    const target = parseInt(counter.getAttribute('data-target'));
                    const count = parseInt(counter.innerText);
                    
                    const increment = Math.trunc(target / speed);
                    
                    if (count < target) {
                        counter.innerText = count + increment;
                        setTimeout(animateCounters, 1);
                    } else {
                        counter.innerText = target;
                    }
                });
            };
            
            // Check if element is in viewport
            const isInViewport = (element) => {
                const rect = element.getBoundingClientRect();
                return (
                    rect.top >= 0 &&
                    rect.left >= 0 &&
                    rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
                    rect.right <= (window.innerWidth || document.documentElement.clientWidth)
                );
            };
            
            // Start animation when counters are in viewport
            let animated = false;
            window.addEventListener('scroll', () => {
                if (!animated && counters.length > 0 && isInViewport(counters[0])) {
                    animated = true;
                    animateCounters();
                }
            });
            
            // Check on page load as well
            if (!animated && counters.length > 0 && isInViewport(counters[0])) {
                animated = true;
                animateCounters();
            }
        });
    </script>
    
    <script>
       

        document.addEventListener('DOMContentLoaded', function() {
            // FAQ toggles
            const faqToggles = document.querySelectorAll('.faq-toggle');
            
            faqToggles.forEach(toggle => {
                toggle.addEventListener('click', function() {
                    const targetId = this.getAttribute('data-target');
                    const content = document.getElementById(targetId);
                    
                    // Toggle content visibility
                    content.classList.toggle('hidden');
                    
                    // Toggle icon
                    const icon = this.querySelector('i');
                    if (content.classList.contains('hidden')) {
                        icon.className = 'ri-arrow-down-s-line ri-lg text-[#c9a560]';
                    } else {
                        icon.className = 'ri-arrow-up-s-line ri-lg text-[#c9a560]';
                    }
                });
            });
        });
    </script>
</body>
</html>