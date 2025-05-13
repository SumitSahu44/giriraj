<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>

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
   
  </head>
<body>

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
            <img src="footer logo.png" > 
       </a
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
              href="./"
              class="text-offwhite/80 hover:text-[#c9a560] transition-colors"
              >Home</a
            >
          </li>
          <li>
            <a
              href="./about.php"
              class="text-offwhite/80 hover:text-[#c9a560] transition-colors"
              >About Us</a
            >
          </li>
          <li>
            <a
              href="./services.php"
              class="text-offwhite/80 hover:text-[#c9a560] transition-colors"
              >Our Services</a
            >
          </li>
          
          <li>
            <a
              href="./index.php/#testimonials"
              class="text-offwhite/80 hover:text-[#c9a560] transition-colors"
              >Testimonials</a
            >
          </li>
        
          <li>
            <a
              href="./contact.php"
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

</body>
</html>