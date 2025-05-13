<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - KV Associates</title>
    <script src="https://cdn.tailwindcss.com/3.4.16"></script>
    <script>tailwind.config={theme:{extend:{colors:{primary:'#0056b3',secondary:'#f8f9fa'},borderRadius:{'none':'0px','sm':'4px',DEFAULT:'8px','md':'12px','lg':'16px','xl':'20px','2xl':'24px','3xl':'32px','full':'9999px','button':'8px'}}}}</script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css" rel="stylesheet">
    <style>
        :where([class^="ri-"])::before { content: "\f3c2"; }
        body {
            font-family: 'Poppins', sans-serif;
        }
        .counter-value {
            transition: all 0.3s ease;
        }
        input:focus {
            outline: none;
        }
    </style>
</head>
<body class="bg-white">
    <!-- Header -->
  <?php include 'navbar.php' ?>

    <!-- Hero Section -->
    <section class="pt-24 relative">
        <div style="background-image: url('https://readdy.ai/api/search-image?query=professional%20business%20office%20environment%20with%20modern%20architecture%2C%20blue%20tinted%20glass%20windows%2C%20business%20professionals%20in%20formal%20attire%20walking%2C%20clean%20and%20corporate%20atmosphere%2C%20soft%20natural%20lighting%2C%20professional%20photography&width=1600&height=600&seq=1&orientation=landscape');" class="w-full h-[300px] md:h-[400px] bg-cover bg-center relative">
            <div class="absolute inset-0 bg-[#c9a560] bg-opacity-50"></div>
            <div class="container mx-auto px-4 h-full flex items-center justify-center relative z-10">
                <h1 class="text-4xl md:text-5xl font-bold text-white text-center">About Us</h1>
            </div>
        </div>
    </section>

    <!-- Company Introduction -->
    <section class="py-16 md:py-24">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center gap-12">
                <div class="md:w-1/2">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-6">About KV Associates</h2>
                    <p class="text-gray-600 mb-6 leading-relaxed">Founded in 2005, KV Associates has established itself as a premier consulting firm specializing in business advisory, tax planning, and financial management services. With over 18 years of experience, we have helped hundreds of businesses across India achieve their financial goals and regulatory compliance.</p>
                    <p class="text-gray-600 mb-6 leading-relaxed">Our team of certified professionals brings together expertise from diverse fields including chartered accountancy, law, and business management to provide comprehensive solutions tailored to each client's unique needs.</p>
                    <p class="text-gray-600 leading-relaxed">At KV Associates, we believe in building long-term relationships with our clients through trust, transparency, and exceptional service quality. Our client-centric approach has earned us a reputation for reliability and excellence in the industry.</p>
                </div>
                <div class="md:w-1/2">
                    <img src="https://readdy.ai/api/search-image?query=professional%20business%20team%20in%20a%20modern%20office%20environment%2C%20diverse%20group%20of%20Indian%20professionals%20in%20business%20attire%2C%20discussing%20documents%20at%20a%20conference%20table%2C%20corporate%20setting%20with%20glass%20walls%20and%20blue%20accents%2C%20natural%20lighting%2C%20professional%20photography&width=600&height=500&seq=2&orientation=landscape" alt="KV Associates Team" class="w-full h-auto rounded-lg shadow-lg object-cover object-top">
                </div>
            </div>
        </div>
    </section>

    <!-- Vision & Mission -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl md:text-4xl font-bold text-center text-gray-800 mb-12">Our Vision & Mission</h2>
            <div class="grid md:grid-cols-2 gap-8">
                <div class="bg-white p-8 rounded-lg shadow-md text-center">
                    <div class="w-16 h-16 bg-[#c9a560] bg-opacity-10 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="ri-eye-line ri-xl text-[#c9a560]"></i>
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-800 mb-4">Our Vision</h3>
                    <p class="text-gray-600 leading-relaxed">To be the most trusted financial advisory firm in India, empowering businesses with strategic insights and innovative solutions that drive sustainable growth and prosperity. We envision a future where every business, regardless of size, has access to world-class financial expertise.</p>
                </div>
                <div class="bg-white p-8 rounded-lg shadow-md text-center">
                    <div class="w-16 h-16 bg-[#c9a560] bg-opacity-10 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="ri-flag-line ri-xl text-[#c9a560]"></i>
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-800 mb-4">Our Mission</h3>
                    <p class="text-gray-600 leading-relaxed">To deliver exceptional financial and business advisory services that create measurable value for our clients. We are committed to maintaining the highest standards of integrity, professionalism, and innovation while fostering an environment of continuous learning and growth for our team members.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Company Statistics -->
    <section class="py-16 md:py-24">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 md:gap-8">
                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <div class="w-14 h-14 bg-[#c9a560] bg-opacity-10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="ri-calendar-line ri-xl text-[#c9a560]"></i>
                    </div>
                    <h3 class="text-4xl font-bold text-[#c9a560] mb-2 counter-value" data-target="18">0</h3>
                    <p class="text-gray-600">Years of Experience</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <div class="w-14 h-14 bg-[#c9a560] bg-opacity-10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="ri-briefcase-line ri-xl text-[#c9a560]"></i>
                    </div>
                    <h3 class="text-4xl font-bold text-[#c9a560] mb-2 counter-value" data-target="850">0</h3>
                    <p class="text-gray-600">Projects Completed</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <div class="w-14 h-14 bg-[#c9a560] bg-opacity-10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="ri-user-smile-line ri-xl text-[#c9a560]"></i>
                    </div>
                    <h3 class="text-4xl font-bold text-[#c9a560] mb-2 counter-value" data-target="500">0</h3>
                    <p class="text-gray-600">Happy Clients</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <div class="w-14 h-14 bg-[#c9a560] bg-opacity-10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="ri-team-line ri-xl text-[#c9a560]"></i>
                    </div>
                    <h3 class="text-4xl font-bold text-[#c9a560] mb-2 counter-value" data-target="35">0</h3>
                    <p class="text-gray-600">Team Members</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Team Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl md:text-4xl font-bold text-center text-gray-800 mb-4">Our Expert Team</h2>
            <p class="text-gray-600 text-center max-w-3xl mx-auto mb-12">Meet our team of experienced professionals dedicated to providing exceptional service and innovative solutions to our clients.</p>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="https://readdy.ai/api/search-image?query=professional%20Indian%20male%20in%20business%20suit%2C%2050s%2C%20confident%20expression%2C%20office%20setting%2C%20professional%20headshot%2C%20neutral%20background%2C%20high%20quality%20portrait&width=400&height=400&seq=3&orientation=squarish" alt="Vikram Kumar" class="w-full h-64 object-cover object-top">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-1">Vikram Kumar</h3>
                        <p class="text-[#c9a560] font-medium mb-3">Founder & Managing Director</p>
                        <p class="text-gray-600 mb-4">With over 25 years of experience in financial consulting, Vikram leads our team with his extensive knowledge and strategic vision.</p>
                        <div class="flex space-x-3">
                            <a href="#" class="w-8 h-8 flex items-center justify-center rounded-full bg-gray-100 text-gray-600 hover:bg-[#c9a560] hover:text-white transition-colors">
                                <i class="ri-linkedin-fill"></i>
                            </a>
                            <a href="#" class="w-8 h-8 flex items-center justify-center rounded-full bg-gray-100 text-gray-600 hover:bg-[#c9a560] hover:text-white transition-colors">
                                <i class="ri-twitter-fill"></i>
                            </a>
                            <a href="#" class="w-8 h-8 flex items-center justify-center rounded-full bg-gray-100 text-gray-600 hover:bg-[#c9a560] hover:text-white transition-colors">
                                <i class="ri-mail-line"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="https://readdy.ai/api/search-image?query=professional%20Indian%20female%20in%20business%20attire%2C%2040s%2C%20confident%20smile%2C%20office%20setting%2C%20professional%20headshot%2C%20neutral%20background%2C%20high%20quality%20portrait&width=400&height=400&seq=4&orientation=squarish" alt="Priya Sharma" class="w-full h-64 object-cover object-top">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-1">Priya Sharma</h3>
                        <p class="text-[#c9a560] font-medium mb-3">Chief Financial Officer</p>
                        <p class="text-gray-600 mb-4">Priya brings 15 years of expertise in tax planning and financial analysis, helping clients optimize their financial strategies.</p>
                        <div class="flex space-x-3">
                            <a href="#" class="w-8 h-8 flex items-center justify-center rounded-full bg-gray-100 text-gray-600 hover:bg-[#c9a560] hover:text-white transition-colors">
                                <i class="ri-linkedin-fill"></i>
                            </a>
                            <a href="#" class="w-8 h-8 flex items-center justify-center rounded-full bg-gray-100 text-gray-600 hover:bg-[#c9a560] hover:text-white transition-colors">
                                <i class="ri-twitter-fill"></i>
                            </a>
                            <a href="#" class="w-8 h-8 flex items-center justify-center rounded-full bg-gray-100 text-gray-600 hover:bg-[#c9a560] hover:text-white transition-colors">
                                <i class="ri-mail-line"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="https://readdy.ai/api/search-image?query=professional%20Indian%20male%20in%20business%20casual%20attire%2C%2030s%2C%20friendly%20expression%2C%20office%20setting%2C%20professional%20headshot%2C%20neutral%20background%2C%20high%20quality%20portrait&width=400&height=400&seq=5&orientation=squarish" alt="Rajesh Patel" class="w-full h-64 object-cover object-top">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-1">Rajesh Patel</h3>
                        <p class="text-[#c9a560] font-medium mb-3">Head of Tax Advisory</p>
                        <p class="text-gray-600 mb-4">Rajesh specializes in corporate tax planning and compliance, ensuring clients navigate complex tax regulations effectively.</p>
                        <div class="flex space-x-3">
                            <a href="#" class="w-8 h-8 flex items-center justify-center rounded-full bg-gray-100 text-gray-600 hover:bg-[#c9a560] hover:text-white transition-colors">
                                <i class="ri-linkedin-fill"></i>
                            </a>
                            <a href="#" class="w-8 h-8 flex items-center justify-center rounded-full bg-gray-100 text-gray-600 hover:bg-[#c9a560] hover:text-white transition-colors">
                                <i class="ri-twitter-fill"></i>
                            </a>
                            <a href="#" class="w-8 h-8 flex items-center justify-center rounded-full bg-gray-100 text-gray-600 hover:bg-[#c9a560] hover:text-white transition-colors">
                                <i class="ri-mail-line"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us -->
    <section class="py-16 md:py-24">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl md:text-4xl font-bold text-center text-gray-800 mb-4">Why Choose Us</h2>
            <p class="text-gray-600 text-center max-w-3xl mx-auto mb-12">We differentiate ourselves through our commitment to excellence, client satisfaction, and innovative solutions.</p>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="w-14 h-14 bg-[#c9a560] bg-opacity-10 rounded-full flex items-center justify-center mb-5">
                        <i class="ri-medal-line ri-xl text-[#c9a560]"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">Expertise & Experience</h3>
                    <p class="text-gray-600">Our team comprises certified professionals with decades of combined experience across various industries and specializations.</p>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="w-14 h-14 bg-[#c9a560] bg-opacity-10 rounded-full flex items-center justify-center mb-5">
                        <i class="ri-customer-service-2-line ri-xl text-[#c9a560]"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">Client-Centric Approach</h3>
                    <p class="text-gray-600">We prioritize understanding each client's unique needs and challenges to deliver tailored solutions that drive results.</p>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="w-14 h-14 bg-[#c9a560] bg-opacity-10 rounded-full flex items-center justify-center mb-5">
                        <i class="ri-shield-check-line ri-xl text-[#c9a560]"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">Integrity & Confidentiality</h3>
                    <p class="text-gray-600">We maintain the highest standards of professional ethics and ensure complete confidentiality of all client information.</p>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="w-14 h-14 bg-[#c9a560] bg-opacity-10 rounded-full flex items-center justify-center mb-5">
                        <i class="ri-lightbulb-line ri-xl text-[#c9a560]"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">Innovative Solutions</h3>
                    <p class="text-gray-600">We continuously update our knowledge and approaches to provide innovative solutions that address evolving business challenges.</p>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="w-14 h-14 bg-[#c9a560] bg-opacity-10 rounded-full flex items-center justify-center mb-5">
                        <i class="ri-time-line ri-xl text-[#c9a560]"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">Timely Delivery</h3>
                    <p class="text-gray-600">We understand the importance of time in business decisions and commit to delivering our services within agreed timeframes.</p>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="w-14 h-14 bg-[#c9a560] bg-opacity-10 rounded-full flex items-center justify-center mb-5">
                        <i class="ri-global-line ri-xl text-[#c9a560]"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">Comprehensive Services</h3>
                    <p class="text-gray-600">From tax planning to business advisory, we offer end-to-end solutions that address all aspects of financial management.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact CTA -->
    <section class="py-16 bg-[#c9a560] bg-opacity-10">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-6">Ready to Work With Us?</h2>
            <p class="text-gray-600 max-w-2xl mx-auto mb-8">Contact us today to schedule a consultation with our expert team and discover how we can help your business achieve its financial goals.</p>
            <a href="/contact" class="inline-block bg-[#c9a560] text-white px-8 py-3 !rounded-button hover:bg-blue-700 transition-colors whitespace-nowrap font-medium">Get in Touch</a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white pt-16 pb-8">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
                <div>
                    <h3 class="text-xl font-semibold mb-6">KV Associates</h3>
                    <p class="text-gray-400 mb-6">Your trusted partner for comprehensive financial and business advisory services since 2005.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-800 hover:bg-[#c9a560] transition-colors">
                            <i class="ri-facebook-fill"></i>
                        </a>
                        <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-800 hover:bg-[#c9a560] transition-colors">
                            <i class="ri-twitter-fill"></i>
                        </a>
                        <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-800 hover:bg-[#c9a560] transition-colors">
                            <i class="ri-linkedin-fill"></i>
                        </a>
                        <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-800 hover:bg-[#c9a560] transition-colors">
                            <i class="ri-instagram-fill"></i>
                        </a>
                    </div>
                </div>
                
                <div>
                    <h3 class="text-xl font-semibold mb-6">Quick Links</h3>
                    <ul class="space-y-3">
                        <li><a href="/" class="text-gray-400 hover:text-white transition-colors">Home</a></li>
                        <li><a href="/about" class="text-gray-400 hover:text-white transition-colors">About Us</a></li>
                        <li><a href="/services" class="text-gray-400 hover:text-white transition-colors">Services</a></li>
                        <li><a href="/portfolio" class="text-gray-400 hover:text-white transition-colors">Portfolio</a></li>
                        <li><a href="/contact" class="text-gray-400 hover:text-white transition-colors">Contact</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-xl font-semibold mb-6">Services</h3>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Tax Planning</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Business Advisory</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Financial Management</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Audit & Assurance</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Corporate Compliance</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-xl font-semibold mb-6">Contact Info</h3>
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <div class="w-5 h-5 flex items-center justify-center mt-1 mr-3">
                                <i class="ri-map-pin-line text-[#c9a560]"></i>
                            </div>
                            <span class="text-gray-400">123 Business Avenue, Sector 18, Noida, Uttar Pradesh 201301, India</span>
                        </li>
                        <li class="flex items-center">
                            <div class="w-5 h-5 flex items-center justify-center mr-3">
                                <i class="ri-phone-line text-[#c9a560]"></i>
                            </div>
                            <span class="text-gray-400">+91 98765 43210</span>
                        </li>
                        <li class="flex items-center">
                            <div class="w-5 h-5 flex items-center justify-center mr-3">
                                <i class="ri-mail-line text-[#c9a560]"></i>
                            </div>
                            <span class="text-gray-400">info@kvassociates.com</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="pt-8 border-t border-gray-800 text-center text-gray-400">
                <p>&copy; 2025 KV Associates. All rights reserved.</p>
            </div>
        </div>
    </footer>

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
</body>
</html>