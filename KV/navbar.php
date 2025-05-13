<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Website with Branches Dropdown</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
</head>
<body>
  <!-- Header -->
  <header class="fixed top-0 left-0 right-0 bg-white shadow-md z-50">
    <div class="container mx-auto px-4 py-3 flex justify-between items-center">
      <a href="/" class="w-[80px] font-['Pacifico'] text-[#c9a560]">
        <img src="smalllogo.png" alt="Logo">
      </a>

      <!-- Desktop Navigation -->
      <nav class="hidden md:flex items-center space-x-8">
        <a href="/" class="text-gray-700 hover:text-[#c9a560] transition-colors">Home</a>
        <a href="/about.php" class="<?php echo ($current_page == 'about.php') ? 'text-[#c9a560] font-medium' : 'text-gray-700 hover:text-[#c9a560] transition-colors'; ?>">About Us</a>
        <a href="/services.php" class="<?php echo ($current_page == 'services.php') ? 'text-[#c9a560] font-medium' : 'text-gray-700 hover:text-[#c9a560] transition-colors'; ?>">Services</a>
        <a href="./index.php/#testimonials" class="text-gray-700 hover:text-[#c9a560] transition-colors">Testimonials</a>
        <!-- Branches with Nested Dropdown -->
        <div class="relative group">
          <a href="#" class="<?php echo ($current_page == 'services.php') ? 'text-[#c9a560] font-medium' : 'text-gray-700 hover:text-[#c9a560] transition-colors'; ?>">Branches</a>
          <div class="absolute hidden group-hover:block bg-white shadow-lg rounded-md mt-2 w-48 z-50">
            <div class="py-2">
              <!-- Madhya Pradesh -->
              <div class="relative group/state">
                <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] state-link" data-state="Madhya Pradesh">Madhya Pradesh</a>
                <div class="absolute hidden group-hover/state:block bg-white shadow-lg rounded-md top-0 left-full ml-1 w-48 z-50">
                  <div class="py-2 max-h-64 overflow-y-auto">
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Agar Malwa">Agar Malwa</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Alirajpur">Alirajpur</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Anuppur">Anuppur</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Ashoknagar">Ashoknagar</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Balaghat">Balaghat</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Barwani">Barwani</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Betul">Betul</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Bhind">Bhind</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Bhopal">Bhopal</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Burhanpur">Burhanpur</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Chhatarpur">Chhatarpur</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Chhindwara">Chhindwara</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Damoh">Damoh</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Datia">Datia</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Dewas">Dewas</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Dhar">Dhar</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Dindori">Dindori</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Guna">Guna</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Gwalior">Gwalior</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Harda">Harda</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Hoshangabad">Hoshangabad</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Indore">Indore</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Jabalpur">Jabalpur</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Jhabua">Jhabua</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Katni">Katni</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Khandwa">Khandwa</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Khargone">Khargone</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Maihar">Maihar</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Mandla">Mandla</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Mandsaur">Mandsaur</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Mauganj">Mauganj</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Morena">Morena</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Narsinghpur">Narsinghpur</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Neemuch">Neemuch</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Niwari">Niwari</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Pandhurna">Pandhurna</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Panna">Panna</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Raisen">Raisen</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Rajgarh">Rajgarh</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Ratlam">Ratlam</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Rewa">Rewa</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Sagar">Sagar</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Satna">Satna</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Sehore">Sehore</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Seoni">Seoni</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Shahdol">Shahdol</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Shajapur">Shajapur</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Sheopur">Sheopur</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Shivpuri">Shivpuri</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Sidhi">Sidhi</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Singrauli">Singrauli</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Tikamgarh">Tikamgarh</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Ujjain">Ujjain</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Umaria">Umaria</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Vidisha">Vidisha</a>
                  </div>
                </div>
              </div>
              <!-- Rajasthan -->
              <div class="relative group/state">
                <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] state-link" data-state="Rajasthan">Rajasthan</a>
                <div class="absolute hidden group-hover/state:block bg-white shadow-lg rounded-md top-0 left-full ml-1 w-48 z-50">
                  <div class="py-2 max-h-64 overflow-y-auto">
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Ajmer">Ajmer</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Alwar">Alwar</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Anupgarh">Anupgarh</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Balotra">Balotra</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Banswara">Banswara</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Baran">Baran</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Barmer">Barmer</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Beawar">Beawar</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Bharatpur">Bharatpur</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Bhilwara">Bhilwara</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Bikaner">Bikaner</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Bundi">Bundi</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Chittorgarh">Chittorgarh</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Churu">Churu</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Dausa">Dausa</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Deeg">Deeg</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Dholpur">Dholpur</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Dudu">Dudu</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Dungarpur">Dungarpur</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Gangapur City">Gangapur City</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Hanumangarh">Hanumangarh</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Jaipur">Jaipur</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Jaipur Rural">Jaipur Rural</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Jaisalmer">Jaisalmer</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Jalore">Jalore</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Jhalawar">Jhalawar</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Jhunjhunu">Jhunjhunu</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Jodhpur">Jodhpur</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Jodhpur Rural">Jodhpur Rural</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Karauli">Karauli</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Kekri">Kekri</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Khairthal-Tijara">Khairthal-Tijara</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Kota">Kota</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Kotputli-Behror">Kotputli-Behror</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Nagaur">Nagaur</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Neem ka Thana">Neem ka Thana</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Pali">Pali</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Phalodi">Phalodi</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Pratapgarh">Pratapgarh</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Rajsamand">Rajsamand</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Salumbar">Salumbar</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Sanchore">Sanchore</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Sawai Madhopur">Sawai Madhopur</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Shahpura">Shahpura</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Sikar">Sikar</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Sirohi">Sirohi</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Sri Ganganagar">Sri Ganganagar</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Tonk">Tonk</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Udaipur">Udaipur</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Udaipur Rural">Udaipur Rural</a>
                  </div>
                </div>
              </div>
              <!-- Gujarat -->
              <div class="relative group/state">
                <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] state-link" data-state="Gujarat">Gujarat</a>
                <div class="absolute hidden group-hover/state:block bg-white shadow-lg rounded-md top-0 left-full ml-1 w-48 z-50">
                  <div class="py-2 max-h-64 overflow-y-auto">
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Ahmedabad">Ahmedabad</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Amreli">Amreli</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Anand">Anand</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Aravalli">Aravalli</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Banaskantha">Banaskantha</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Bharuch">Bharuch</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Bhavnagar">Bhavnagar</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Botad">Botad</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Chhota Udaipur">Chhota Udaipur</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Dahod">Dahod</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Dang">Dang</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Devbhoomi Dwarka">Devbhoomi Dwarka</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Gandhinagar">Gandhinagar</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Gir Somnath">Gir Somnath</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Jamnagar">Jamnagar</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Junagadh">Junagadh</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Kheda">Kheda</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Kutch">Kutch</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Mahisagar">Mahisagar</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Mehsana">Mehsana</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Morbi">Morbi</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Narmada">Narmada</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Navsari">Navsari</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Panchmahal">Panchmahal</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Patan">Patan</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Porbandar">Porbandar</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Rajkot">Rajkot</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Sabarkantha">Sabarkantha</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Surat">Surat</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Surendranagar">Surendranagar</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Tapi">Tapi</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Vadodara">Vadodara</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:text-[#c9a560] district-link" data-district="Valsad">Valsad</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <a href="./index.php/#contact" class="text-gray-700 hover:text-[#c9a560] transition-colors">Contact</a>
        <button class="bg-[#c9a560]

 text-white px-6 py-2 rounded hover:bg-blue-700 transition-colors whitespace-nowrap">
          Get a Quote
        </button>
      </nav>

      <!-- Mobile Navigation Toggle -->
      <div class="md:hidden w-10 h-10 flex items-center justify-center cursor-pointer" id="mobile-menu-button">
        <i class="ri-menu-line ri-2x text-gray-700"></i>
      </div>
    </div>

    <!-- Mobile Navigation Menu -->
    <div class="md:hidden hidden bg-white w-full shadow-lg absolute top-full left-0 py-4" id="mobile-menu">
      <div class="container mx-auto px-4 flex flex-col space-y-4">
        <a href="/" class="text-gray-700 hover:text-[#c9a560] transition-colors py-2 border-b border-gray-100">Home</a>
        <a href="/about.php" class="text-[#c9a560] font-medium py-2 border-b border-gray-100">About Us</a>
        <a href="/services.php" class="text-gray-700 hover:text-[#c9a560] transition-colors py-2 border-b border-gray-100">Services</a>
        <a href="./index.php/#testimonials" class="text-gray-700 hover:text-[#c9a560] transition-colors py-2 border-b border-gray-100">Testimonial</a>
        <!-- Mobile Branches Menu -->
        <div>
          <a href="#" class="text-gray-700 hover:text-[#c9a560] transition-colors py-2 border-b border-gray-100 flex justify-between items-center" id="mobile-branches-toggle">
            Branches
            <i class="ri-arrow-down-s-line"></i>
          </a>
          <div class="hidden flex-col space-y-2 mt-2" id="mobile-branches-menu">
            <!-- Madhya Pradesh -->
            <div>
              <a href="#" class="pl-4 text-gray-700 hover:text-[#c9a560] flex justify-between items-center state-link" data-state="Madhya Pradesh" id="mobile-mp-toggle">
                Madhya Pradesh
                <i class="ri-arrow-down-s-line"></i>
              </a>
              <div class="hidden flex-col space-y-2 mt-2" id="mobile-mp-districts">
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Agar Malwa">Agar Malwa</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Alirajpur">Alirajpur</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Anuppur">Anuppur</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Ashoknagar">Ashoknagar</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Balaghat">Balaghat</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Barwani">Barwani</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Betul">Betul</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Bhind">Bhind</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Bhopal">Bhopal</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Burhanpur">Burhanpur</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Chhatarpur">Chhatarpur</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Chhindwara">Chhindwara</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Damoh">Damoh</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Datia">Datia</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Dewas">Dewas</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Dhar">Dhar</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Dindori">Dindori</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Guna">Guna</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Gwalior">Gwalior</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Harda">Harda</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Hoshangabad">Hoshangabad</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Indore">Indore</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Jabalpur">Jabalpur</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Jhabua">Jhabua</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Katni">Katni</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Khandwa">Khandwa</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Khargone">Khargone</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Maihar">Maihar</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Mandla">Mandla</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Mandsaur">Mandsaur</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Mauganj">Mauganj</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Morena">Morena</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Narsinghpur">Narsinghpur</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Neemuch">Neemuch</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Niwari">Niwari</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Pandhurna">Pandhurna</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Panna">Panna</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Raisen">Raisen</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Rajgarh">Rajgarh</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Ratlam">Ratlam</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Rewa">Rewa</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Sagar">Sagar</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Satna">Satna</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Sehore">Sehore</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Seoni">Seoni</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Shahdol">Shahdol</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Shajapur">Shajapur</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Sheopur">Sheopur</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Shivpuri">Shivpuri</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Sidhi">Sidhi</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Singrauli">Singrauli</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Tikamgarh">Tikamgarh</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Ujjain">Ujjain</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Umaria">Umaria</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Vidisha">Vidisha</a>
              </div>
            </div>
            <!-- Rajasthan -->
            <div>
              <a href="#" class="pl-4 text-gray-700 hover:text-[#c9a560] flex justify-between items-center state-link" data-state="Rajasthan" id="mobile-rj-toggle">
                Rajasthan
                <i class="ri-arrow-down-s-line"></i>
              </a>
              <div class="hidden flex-col space-y-2 mt-2" id="mobile-rj-districts">
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Ajmer">Ajmer</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Alwar">Alwar</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Anupgarh">Anupgarh</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Balotra">Balotra</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Banswara">Banswara</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Baran">Baran</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Barmer">Barmer</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Beawar">Beawar</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Bharatpur">Bharatpur</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Bhilwara">Bhilwara</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Bikaner">Bikaner</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Bundi">Bundi</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Chittorgarh">Chittorgarh</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Churu">Churu</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Dausa">Dausa</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Deeg">Deeg</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Dholpur">Dholpur</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Dudu">Dudu</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Dungarpur">Dungarpur</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Gangapur City">Gangapur City</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Hanumangarh">Hanumangarh</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Jaipur">Jaipur</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Jaipur Rural">Jaipur Rural</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Jaisalmer">Jaisalmer</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Jalore">Jalore</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Jhalawar">Jhalawar</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Jhunjhunu">Jhunjhunu</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Jodhpur">Jodhpur</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Jodhpur Rural">Jodhpur Rural</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Karauli">Karauli</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Kekri">Kekri</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Khairthal-Tijara">Khairthal-Tijara</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Kota">Kota</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Kotputli-Behror">Kotputli-Behror</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Nagaur">Nagaur</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Neem ka Thana">Neem ka Thana</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Pali">Pali</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Phalodi">Phalodi</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Pratapgarh">Pratapgarh</a>
                <a href="#" class="pl-8 text-gray-7
00 hover:text-[#c9a560] district-link" data-district="Rajsamand">Rajsamand</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Salumbar">Salumbar</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Sanchore">Sanchore</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Sawai Madhopur">Sawai Madhopur</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Shahpura">Shahpura</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Sikar">Sikar</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Sirohi">Sirohi</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Sri Ganganagar">Sri Ganganagar</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Tonk">Tonk</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Udaipur">Udaipur</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Udaipur Rural">Udaipur Rural</a>
              </div>
            </div>
            <!-- Gujarat -->
            <div>
              <a href="#" class="pl-4 text-gray-700 hover:text-[#c9a560] flex justify-between items-center state-link" data-state="Gujarat" id="mobile-gj-toggle">
                Gujarat
                <i class="ri-arrow-down-s-line"></i>
              </a>
              <div class="hidden flex-col space-y-2 mt-2" id="mobile-gj-districts">
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Ahmedabad">Ahmedabad</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Amreli">Amreli</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Anand">Anand</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Aravalli">Aravalli</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Banaskantha">Banaskantha</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Bharuch">Bharuch</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Bhavnagar">Bhavnagar</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Botad">Botad</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Chhota Udaipur">Chhota Udaipur</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Dahod">Dahod</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Dang">Dang</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Devbhoomi Dwarka">Devbhoomi Dwarka</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Gandhinagar">Gandhinagar</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Gir Somnath">Gir Somnath</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Jamnagar">Jamnagar</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Junagadh">Junagadh</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Kheda">Kheda</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Kutch">Kutch</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Mahisagar">Mahisagar</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Mehsana">Mehsana</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Morbi">Morbi</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Narmada">Narmada</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Navsari">Navsari</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Panchmahal">Panchmahal</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Patan">Patan</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Porbandar">Porbandar</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Rajkot">Rajkot</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Sabarkantha">Sabarkantha</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Surat">Surat</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Surendranagar">Surendranagar</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Tapi">Tapi</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Vadodara">Vadodara</a>
                <a href="#" class="pl-8 text-gray-700 hover:text-[#c9a560] district-link" data-district="Valsad">Valsad</a>
              </div>
            </div>
          </div>
        </div>
        <a href="./index.php/#contact" class="text-gray-700 hover:text-[#c9a560] transition-colors py-2 border-b border-gray-100">Contact</a>
        <button class="bg-[#c9a560] text-white px-6 py-2 rounded hover:bg-blue-700 transition-colors whitespace-nowrap">
          Get a Quote
        </button>
      </div>
    </div>
  </header>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Mobile Menu Toggle
      const mobileMenuButton = document.getElementById('mobile-menu-button');
      const mobileMenu = document.getElementById('mobile-menu');
      
      mobileMenuButton.addEventListener('click', function() {
        mobileMenu.classList.toggle('hidden');
        const icon = mobileMenuButton.querySelector('i');
        if (mobileMenu.classList.contains('hidden')) {
          icon.classList.remove('ri-close-line');
          icon.classList.add('ri-menu-line');
        } else {
          icon.classList.remove('ri-menu-line');
          icon.classList.add('ri-close-line');
        }
      });

      // Mobile Branches Dropdown Toggle
      const mobileBranchesToggle = document.getElementById('mobile-branches-toggle');
      const mobileBranchesMenu = document.getElementById('mobile-branches-menu');
      
      mobileBranchesToggle.addEventListener('click', function(e) {
        e.preventDefault();
        mobileBranchesMenu.classList.toggle('hidden');
        const icon = mobileBranchesToggle.querySelector('i');
        if (mobileBranchesMenu.classList.contains('hidden')) {
          icon.classList.remove('ri-arrow-up-s-line');
          icon.classList.add('ri-arrow-down-s-line');
        } else {
          icon.classList.remove('ri-arrow-down-s-line');
          icon.classList.add('ri-arrow-up-s-line');
        }
      });

      // Mobile State Dropdown Toggles
      const stateToggles = [
        { toggle: 'mobile-mp-toggle', menu: 'mobile-mp-districts' },
        { toggle: 'mobile-rj-toggle', menu: 'mobile-rj-districts' },
        { toggle: 'mobile-gj-toggle', menu: 'mobile-gj-districts' }
      ];

      stateToggles.forEach(({ toggle, menu }) => {
        const toggleElement = document.getElementById(toggle);
        const menuElement = document.getElementById(menu);
        toggleElement.addEventListener('click', function(e) {
          e.preventDefault();
          menuElement.classList.toggle('hidden');
          const icon = toggleElement.querySelector('i');
          if (menuElement.classList.contains('hidden')) {
            icon.classList.remove('ri-arrow-up-s-line');
            icon.classList.add('ri-arrow-down-s-line');
          } else {
            icon.classList.remove('ri-arrow-down-s-line');
            icon.classList.add('ri-arrow-up-s-line');
          }
        });
      });

      // District Redirect Logic
      const districtsWithBranches = ['Bhopal', 'Jaipur', 'Ahmedabad']; // Example list
      const districtLinks = document.querySelectorAll('.district-link');
      
      districtLinks.forEach(link => {
        link.addEventListener('click', function(e) {
          e.preventDefault();
          const district = this.getAttribute('data-district');
          if (districtsWithBranches.includes(district)) {
            window.location.href = `branch.php?district=${encodeURIComponent(district)}`;
          } else {
            window.location.href = `applyforfranchise.php?district=${encodeURIComponent(district)}`;
          }
        });
      });

      // Counter Animation (unchanged)
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
      
      const isInViewport = (element) => {
        const rect = element.getBoundingClientRect();
        return (
          rect.top >= 0 &&
          rect.left >= 0 &&
          rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
          rect.right <= (window.innerWidth || document.documentElement.clientWidth)
        );
      };
      
      let animated = false;
      window.addEventListener('scroll', () => {
        if (!animated && counters.length > 0 && isInViewport(counters[0])) {
          animated = true;
          animateCounters();
        }
      });
      
      if (!animated && counters.length > 0 && isInViewport(counters[0])) {
        animated = true;
        animateCounters();
      }
    });
  </script>
</body>
</html>