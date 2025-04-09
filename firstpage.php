<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>
    <script>
    $( function() {
      $( "#tabs" ).tabs();
    } );
    </script>
    <link rel="stylesheet" href="styles/first_page.css">
</head>
<body>
    <header class="header">
    <div class="container">
        <h1>Online Student Admission System</h1>
        <nav class="navbar">

      
       
        <a href="#about">About TU</a>
        <div class="dropdown">
        <a href="#" class="dropdown-toggle" id="bachelorPrograms">Bachelor's Programs</a>
        <div class="dropdown-menu" id="coursesDropdown">
            <a href="#ba" data-text="BA">BA</a>
            <a href="#ba_sw" data-text="BASW">BASW</a>
            <a href="#bbs" data-text="BBS">BBS</a>
            <a href="#bed" data-text="B.Ed">B.Ed</a>
            <a href="#bsc" data-text="BSc">BSc</a>
            <a href="#bca" data-text="BCA">BCA</a>
            <a href="#bba" data-text="BBA">BBA</a>
            <a href="#bim" data-text="BIM">BIM</a>
            <a href="#bbm" data-text="BBM">BBM</a>
            <a href="#bit" data-text="BIT">BIT</a>
            <a href="#bsc_csit" data-text="BSc CSIT">BSc CSIT</a>
            <a href="#llb" data-text="LLB">LLB</a>
            <a href="#ballb" data-text="BALLB">BALLB</a>
            <a href="#bph" data-text="BPH">BPH</a>
            <a href="#bmlt" data-text="BMLT">BMLT</a>
            <a href="#bpharm" data-text="B.Pharm">B.Pharm</a>
            <a href="#bhm" data-text="BHM">BHM</a>
            <a href="#bt" data-text="BT">BT</a>
            <a href="#coe" data-text="Co.E">Co.E</a>
            <a href="#ce" data-text="CE">CE</a>
            <a href="#me" data-text="ME">ME</a>
            <a href="#mbbs" data-text="MBBS">MBBS</a>
        </div>
    </div>

    <div class="dropdown">
        <a href="#" class="dropdown-toggle" id="campusLink">Campus</a>
        <div class="dropdown-menu" id="campusDropdown">
            <a href="#mahendra_ratna" data-text="Mahendra Ratna">Mahendra Ratna</a>
            <a href="#mechi" data-text="Mechi">Mechi</a>
            <a href="#kanakai" data-text="Kanakai">Kanakai</a>
            <a href="#mahendra_bindeshwari" data-text="Mahendra Bindeshwari">Mahendra Bindeshwari</a>
            <a href="#dharan" data-text="Dharan">Dharan</a>
            <a href="#mahendra_morang" data-text="Mahendra Morang">Mahendra Morang</a>
            <a href="#ram_shah_path" data-text="Ram Shah Path">Ram Shah Path</a>
            <a href="#padma_kanya" data-text="Padma Kanya">Padma Kanya</a>
            <a href="#ratna_rajya" data-text="Ratna Rajya">Ratna Rajya</a>
            <a href="#amrit_science" data-text="Amrit Science">Amrit Science</a>
            <a href="#public_youth" data-text="Public Youth">Public Youth</a>
            <a href="#saraswati" data-text="Saraswati">Saraswati</a>
            <a href="#baneshwor" data-text="Baneshwor">Baneshwor</a>
            <a href="#nepal_law" data-text="Nepal Law">Nepal Law</a>
            <a href="#bhaktapur" data-text="Bhaktapur">Bhaktapur</a>
            <a href="#lalitpur" data-text="Lalitpur">Lalitpur</a>
            <a href="#pulchowk" data-text="Pulchowk">Pulchowk</a>
            <a href="#thapathali" data-text="Thapathali">Thapathali</a>
            <a href="#janamaitri" data-text="Janamaitri">Janamaitri</a>
            <a href="#makwanpur" data-text="Makwanpur">Makwanpur</a>
            <a href="#mahendra_buddhi" data-text="Mahendra Buddhi">Mahendra Buddhi</a>
            <a href="#prithvi_narayan" data-text="Prithvi Narayan">Prithvi Narayan</a>
            <a href="#tansen" data-text="Tansen">Tansen</a>
            <a href="#padmodaya" data-text="Padmodaya">Padmodaya</a>
            <a href="#butwal" data-text="Butwal">Butwal</a>
            <a href="#mahendra_multiple" data-text="Mahendra Multiple">Mahendra Multiple</a>
        </div>
    </div>
      
            <a href="#contact">Contact</a>
         
            <button class="login-btn" onclick="location.href='login.php'">Login</button>
        </nav>
    </div>
    </header>

    <main class="main-content">
        <section id="about" class="about-section">
            <h2>About TU AND its Background</h2>
            <p>
                Tribhuvan University (TU) is a public university in Nepal. Established in 1959, 
                it offers a wide range of academic programs and is renowned for its excellence 
                in education and research.
            </p>
            <p><a href="https://tribhuvan-university.edu.np" target="_blank">Learn more about TU</a></p>
        </section>
        <section id="courses" class="courses-section">
        <h2>Bachelor's Programs Offered</h2>
        <div id="tabs">
   <div class="course-content"><p> Here exists that courses which can be available under Tribhuvan University in different faculties 
    studying for fulfilling the career of bachelor-degree across various faculties, enabling students to pursue bachelor-degree programs tailored to their career aspirations. Courses cover diverse fields such as humanities, 
    science, technology, management, law, health, agriculture and engineering.</p>
</div>
    <ul>
      <li><a href="#ba">BA</a></li>
      <li><a href="#ba_sw">BASW</a></li>
      <li><a href="#bbs">BBS</a></li>
      <li><a href="#bed">B.Ed</a></li>
      <li><a href="#bsc">BSc</a></li>
      <li><a href="#bca">BCA</a></li>
      <li><a href="#bba">BBA</a></li>
      <li><a href="#bim">BIM</a></li>
      <li><a href="#bbm">BBM</a></li>
      <li><a href="#bit">BIT</a></li>
      <li><a href="#bsc_csit">BSc Csit</a></li>
      <li><a href="#llb">LLB</a></li>
      <li><a href="#ballb">BALLB</a></li>
      <li><a href="#bph">BPH</a></li>
      <li><a href="#bmlt">BMLT</a></li>
      <li><a href="#bpharm">Bpharm</a></li>
      <li><a href="#bhm">BHM</a></li>
      <li><a href="#bt">BT</a></li>
      <li><a href="#coe">Co.E</a></li>
      <li><a href="#ce">CE</a></li>
      <li><a href="#me">ME</a></li>
      <li><a href="#mbbs">MBBS</a></li>
    </ul>
   
    <div id="ba" class="course-content">
   
   <p>The Bachelor of Arts (BA) program offers students the opportunity to study a broad range of subjects in the humanities, social sciences, and fine arts. This program is designed to develop critical thinking, communication, and analytical skills, preparing students for various careers in education, media, research, and public service. It offers flexibility in choosing electives, allowing students to specialize in fields like English, History, Political Science, Sociology, and more.</p>

 </div>
 <div id="ba_sw" class="course-content">
 <p>The BA in Social Work (BA SW) is a specialized program aimed at training students to address social issues and improve the well-being of individuals and communities. Students learn about human behavior, social policies, welfare systems, and community development. This program prepares graduates for careers in social work, counseling, and social service agencies, where they can play an active role in fostering social change and supporting vulnerable populations.</p>
</div>

<div id="bbs" class="course-content">
  <p>The Bachelor of Business Studies (BBS) is a program designed to provide students with comprehensive knowledge in business and management. It covers topics such as accounting, finance, marketing, and organizational behavior, preparing graduates for careers in business, management, and entrepreneurship.</p>
</div>
<div id="bed" class="course-content">
<p>The Bachelor of Education (B.Ed) program is designed for individuals who aspire to become teachers. It provides the necessary knowledge and skills to teach at the primary, secondary, and higher secondary levels. The program includes coursework in pedagogy, child development, teaching strategies, curriculum design, and classroom management, as well as practical teaching experience. Graduates of this program are equipped to work as educators in schools, educational institutions, and tutoring centers.</p>
</div>
<div id="bsc" class="course-content">
<p>The Bachelor of Science (BSc) program is a rigorous academic course designed for students interested in the fields of natural sciences, engineering, and technology. It covers subjects like Mathematics, Physics, Chemistry, and Biology, and provides a strong foundation in scientific research, problem-solving, and analytical thinking. This program prepares students for careers in research, laboratory work, technology, or further studies in specialized fields such as medicine, engineering, or environmental sciences.</p>
</div>
 <div id="bca" class="course-content">
  
   <p>The Bachelor of Computer Applications (BCA) is a four-year undergraduate degree program
        designed to provide students with a strong foundation in computer science,
         programming, and applications. The course covers various aspects of 
         software development, programming languages, computer networking, 
         and database management. It aims to equip students with the technical skills
          and knowledge needed for careers in IT and software industries. BCA graduates 
          are prepared for roles such as software developers, system analysts, network 
          administrators, and web developers, among others.</p>
 </div>

 <div id="bba" class="course-content">
   
   <p>The Bachelor of Business Administration (BBA) is a four-year undergraduate program designed to provide students with comprehensive knowledge of business management. It covers essential areas such as accounting, marketing, human resources, finance, and organizational behavior. The program aims to develop managerial skills, strategic thinking, and decision-making abilities, preparing students for leadership roles in various business sectors. BBA graduates often pursue careers as business managers, 
       marketing executives, financial analysts, and entrepreneurs.</p>
 </div>

 <div id="bim" class="course-content">
 
   <p>The Bachelor of Information Management (BIM) is a four-year
        undergraduate program that integrates the fields of computer science and
         management. It focuses on developing skills related to information technology, systems management, and business operations. Students learn about data management, system analysis, software development, project management, and business process optimization. The program prepares students for careers in information systems, technology management, data analysis, and business analytics, equipping them to work
        in a variety of industries where information management plays a critical role.</p>
 </div>
 <div id="bbm" class="course-content">
  <p>The Bachelor of Business Management (BBM) is a professional program that focuses on developing managerial and leadership skills. It equips students with expertise in business operations, strategic management, and organizational development, paving the way for successful careers in corporate management and business consulting.</p>
</div>
 <div id="bit" class="course-content">
<p> The Bachelor of Information Technology (BIT) is a technical undergraduate program designed to equip students with the skills and knowledge required to pursue careers in IT and software development. The program covers topics like programming, networking, database management, systems analysis, and cybersecurity. BIT graduates are well-prepared for careers in IT firms, software companies, and various technology-driven sectors.</p>
</div>
<div id="bsc_csit" class="course-content">
<p>The Bachelor of Science in Computer Science and Information Technology (BSc CSIT) is a comprehensive program that focuses on both the theoretical and practical aspects of computer science and IT. Students learn programming, data structures, algorithms, web development, networking, and software engineering. This degree is ideal for students who want to pursue careers as software developers, system analysts, IT consultants, or network engineers.</p>
</div>
<div id="llb" class="course-content">
<p>The Bachelor of Laws (LLB) program provides students with a deep understanding of law and legal systems. This program covers various branches of law, including constitutional law, criminal law, civil law, and international law. It prepares students to become lawyers, legal advisors, or judges, and equips them with the skills needed to analyze legal problems, advocate for clients, and understand the workings of the justice system.</p>   
</div>
<div id="ballb" class="course-content">
  <p>The Bachelor of Arts Bachelor of Laws (BALLB) is an integrated law program that combines legal studies with arts subjects. It provides students with a deep understanding of legal principles, human rights, and constitutional law, preparing them for careers as lawyers, legal advisors, and advocates for justice.</p>
</div>
<div id="bph" class="course-content">
<p>The Bachelor of Public Health (BPh) program is designed for students interested in promoting community health and well-being. The program includes courses on epidemiology, health policy, environmental health, and disease prevention. Students gain practical knowledge to work in public health sectors, healthcare organizations, non-governmental organizations, and government health agencies, addressing health challenges at both local and global levels.</p>
</div>
<div id="bmlt" class="course-content">
<p>The Bachelor of Medical Laboratory Technology (BMLT) program prepares students for careers in medical laboratories, where they play a critical role in diagnosing diseases through laboratory tests and analysis. The program includes courses on clinical biochemistry, microbiology, hematology, and pathology. Graduates work in hospitals, clinics, diagnostic centers, and research labs, assisting in the accurate diagnosis and treatment of patients.</p>
</div>
<div id="bpharm" class="course-content">
<p>The Bachelor of Pharmacy (BPharm) program equips students with the knowledge and skills necessary for a career in pharmaceutical sciences. The program covers subjects such as pharmacology, pharmaceutical chemistry, pharmacognosy, and clinical pharmacy. Graduates are prepared to work in the pharmaceutical industry, healthcare institutions, research, and regulatory bodies, ensuring the safe and effective use of medicines.</p>
</div>
<div id="bhm" class="course-content">
<p>The Bachelor of Hotel Management (BHM) program focuses on preparing students for careers in the hospitality and tourism industry. Students learn about hotel operations, event management, customer service, and tourism marketing. The program combines theoretical knowledge with practical training, allowing students to gain experience in hotel management, restaurant management, and event coordination.</p>
</div>
<div id="bt" class="course-content">
<p>The Bachelor of Technology (BT) program is a comprehensive undergraduate degree that focuses on the study of engineering and technology. Students specialize in areas like Civil Engineering, Electrical Engineering, Mechanical Engineering, or Electronics. The program provides in-depth knowledge in technical subjects and equips students with practical skills for careers in engineering design, manufacturing, construction, and technological innovation.</p>
</div>
<div id="coe" class="course-content">
  <p>The Bachelor of Computer Engineering (COE) integrates computer science and engineering principles to develop hardware and software systems. This program prepares students for careers in software development, network engineering, and IT solutions, with expertise in programming, algorithms, and system design.</p>
</div>
<div id="ce" class="course-content">
  <p>The Bachelor of Civil Engineering (CE) is an engineering program that focuses on the planning, design, and construction of infrastructure projects such as bridges, roads, dams, and buildings. Students gain knowledge in structural analysis, environmental engineering, and project management, preparing them for careers in the civil engineering field.</p>
</div>
<div id="me" class="course-content">
  <p>The Bachelor of Mechanical Engineering (ME) is a program that focuses on the design, analysis, and manufacturing of mechanical systems. Students learn about thermodynamics, materials science, and robotics, equipping them for careers in industries such as automotive, aerospace, and manufacturing.</p>
</div>

<div id="mbbs" class="course-content">
  <p>The Bachelor of Medicine and Bachelor of Surgery (MBBS) is a professional medical degree that prepares students for a career in medicine. It covers anatomy, physiology, pharmacology, and clinical practice, enabling graduates to diagnose and treat patients effectively as qualified doctors.</p>
</div>
<section id="campus" class="campus-section">
  <h2>Some Campuses Under Tribhuvan University</h2>
  <h3>Here are 21 TU affiliated campuses & 5 constituent campuses</h3>

  <div id="campus-container">
    <div id="campus-tabs">
      <ul>
        <li><a href="#mahendra_ratna">Mahendra Ratna </a></li>
        <li><a href="#mechi">Mechi</a></li>
        <li><a href="#kanakai">Kanakai</a></li>
        <li><a href="#mahendra_bindeshwari">Mahendra Bindeshwari</a></li>
        <li><a href="#dharan">Dharan</a></li>
        <li><a href="#mahendra_morang">Mahendra Morang</a></li>
        <li><a href="#shankhar_dev">Shankhar Dev</a></li>
        <li><a href="#padma_kanya">Padma Kanya</a></li>
        <li><a href="#ratna_rajya">Ratna Rajya</a></li>
        <li><a href="#amrit_science">Amrit Science</a></li>
        <li><a href="#public_youth">Public Youth</a></li>
        <li><a href="#saraswati">Saraswati</a></li>
        <li><a href="#baneshwor">Baneshwor</a></li>
        <li><a href="#nepal_law">Nepal Law</a></li>
        <li><a href="#bhaktapur">Bhaktapur</a></li>
        <li><a href="#patan">Patan</a></li>
        <li><a href="#pulchowk">Pulchowk</a></li>
        <li><a href="#thapathali">Thapathali</a></li>
        <li><a href="#janamaitri">Janamaitri</a></li>
        <li><a href="#makwanpur">Makwanpur</a></li>
        <li><a href="#mahendra_buddhi">Mahendra Buddhi</a></li>
        <li><a href="#prithvi_narayan">Prithvi Narayan</a></li>
        <li><a href="#tansen">Tansen</a></li>
        <li><a href="#padmodaya">Padmodaya</a></li>
        <li><a href="#butwal">Butwal</a></li>
        <li><a href="#mahendra_multiple">Mahendra Multiple</a></li>
      </ul>
    <div id="mahendra_ratna" class="campus-content">
    <h3>Mahendra Ratna Multiple Campus</h3>
      <p>Mahendra Ratna Campus specializes in Humanities and Education. It is known for its commitment to producing skilled educators and human resource professionals.<a href="https://mrmc.tu.edu.np/" target="_blank" rel="noopener noreferrer">Click</a>
        </p>
    </div>
    <div id="mechi" class="campus-content">
    <h3>Mechi Multiple Campus</h3>
      <p>Mechi Campus offers diverse programs including Management, Science, Humanities, and Education. It serves as a key educational hub in eastern Nepal.</p>
    </div>
    <div id="kanakai" class="campus-content">
    <h3>Kankai Multiple Campus</h3>
      <p>Kanakai Campus focuses on Science and Humanities, catering to students aiming for academic excellence in these fields.</p>
    </div>
    <div id="mahendra_bindeshwari" class="campus-content">
    <h3>Mahendra Bindeshwari Multiple Campus</h3>
      <p>Mahendra Bindeshwari Campus provides programs in Science and Education, fostering innovation and learning.</p>
    </div>
    <div id="dharan" class="campus-content">
    <h3>Dharan Multiple Campus</h3>
      <p>Dharan Campus offers programs in Management, Education, and Medicine, making it a multidisciplinary institution in eastern Nepal.</p>
    </div>
    <div id="mahendra_morang" class="campus-content">
    <h3>Mahendra Morang Multiple Campus</h3>
      <p>Mahendra Morang Campus is well-regarded for its programs in Management, Engineering, and Science, with a focus on technical and professional education.</p>
    </div>
  
    <div id="shankhar_dev" class="campus-content">
    <h3>Shankar Dev Campus</h3>
<p>Located in Kathmandu, Shankar Dev Campus is a leading institution for management education, offering programs such as BBA, BBM, BIM, BBS under Tribhuvan University.</p>

    </div>
    <div id="padma_kanya" class="campus-content">
      <h3>Padma Kanya Campus</h3>
      <p>Padma Kanya Campus in Kathmandu is a dedicated women’s campus offering programs in Education, Humanities, and Law.</p>
    </div>
    <div id="ratna_rajya" class="campus-content">
      <h3>Ratna Rajya Campus</h3>
      <p>Situated in Kathmandu, Ratna Rajya Campus offers programs in Humanities, Management, and Education, focusing on holistic academic growth.</p>
    </div>
    <div id="amrit_science" class="campus-content">
      <h3>Amrit Science Campus</h3>
      <p>Amrit Science Campus, located in Kathmandu, is renowned for its programs in Science and Technology, along with Education.</p>
    </div>
    <div id="public_youth" class="campus-content">
      <h3>Public Youth Campus</h3>
      <p>Public Youth Campus in Kathmandu specializes in Humanities and Law, fostering academic excellence in these faculties.</p>
    </div>
    <div id="saraswati" class="campus-content">
      <h3>Saraswati Campus</h3>
      <p>Saraswati Campus, located in Kathmandu, provides programs in Humanities, Management, and Education.</p>
    </div>
    <div id="baneshwor" class="campus-content">
      <h3>Baneshwor Campus</h3>
      <p>Baneshwor Campus, situated in Kathmandu, offers diverse programs in Humanities, Management, and Education.</p>
    </div>
    <div id="nepal_law" class="campus-content">
      <h3>Nepal Law Campus</h3>
      <p>Based in Kathmandu, Nepal Law Campus focuses on Law and Management, preparing students for legal and administrative careers.</p>
    </div>
    <div id="bhaktapur" class="campus-content">
      <h3>Bhaktapur Campus</h3>
      <p>Located in Bhaktapur, this campus offers programs in Education, Humanities, and Law emphasizing academic excellence.</p>
    </div>
    <div id="patan" class="campus-content">
      <h3>Patan Multiple Campus</h3>
      <p>Situated in Lalitpur, this campus provides quality education in Humanities, Management and Education faculties.</p>
    </div>
    <div id="pulchowk" class="campus-content">
      <h3>Pulchowk Campus</h3>
      <p>Known for Engineering, Pulchowk Campus in Lalitpur also offers programs in Management and Science and Technology.</p>
    </div>
    <div id="thapathali" class="campus-content">
      <h3>Thapathali Campus</h3>
      <p>Located in Kathmandu, Thapathali Campus is a leading institution for Engineering, Management, and Science and Technology studies.</p>
    </div>
    <div id="janamaitri" class="campus-content">
      <h3>Janamaitri Campus</h3>
      <p>Based in Kathmandu, Janamaitri Campus offers programs in Humanities, Management, and Law.</p>
    </div>
    <div id="makwanpur" class="campus-content">
      <h3>Makwanpur Campus</h3>
      <p>Located in Hetauda, Makwanpur Campus focuses on Education and Management, serving the academic needs of the region.</p>
    </div>
    <div id="mahendra_buddhi" class="campus-content">
      <h3>Mahendra Buddhi Campus</h3>
      <p>Mahendra Buddhi Campus, located in Kanchanpur, offers programs in Education and Humanities.</p>
    </div>
    <div id="prithvi_narayan" class="campus-content">
      <h3>Prithvi Narayan Campus</h3>
      <p>Situated in Pokhara, this campus is a hub for Engineering, Management, and Science and Technology programs.</p>
    </div>
    <div id="tansen" class="campus-content">
      <h3>Tansen Campus</h3>
      <p>Located in Palpa, Tansen Campus offers programs in Humanities and Management, catering to local academic needs.</p>
    </div>
    <div id="padmodaya" class="campus-content">
      <h3>Padmodaya Campus</h3>
      <p>Based in Dang, Padmodaya Campus specializes in Education and Humanities, providing quality education.</p>
    </div>
    <div id="butwal" class="campus-content">
      <h3>Butwal Campus</h3>
      <p>Butwal Campus offers a range of programs in Management, Engineering, and Science and Technology, serving as an academic hub for the region.</p>
    </div>
    <div id="mahendra_multiple" class="campus-content">
      <h3>Mahendra Multiple Campus</h3>
      <p>Located in Nepalgunj, Mahendra Multiple Campus provides programs in Management, Engineering, and Education, meeting diverse academic demands.</p>
    </div>
  </div>
</section>



        <section id="contact" class="contact-section">
            <h2>Contact Us</h2>
            <p>Tribhuvan University, Kirtipur, Kathmandu, Nepal</p>
            <p>Email: <a href="mailto:info@tribhuvan-university.edu.np">info@tribhuvan-university.edu.np</a></p>
            <p>Phone: +977-1-4330821</p>
            <a href ="feestructure.php" id="cash">Click to View Campus Websites & Fee Structure</a>
        </section>
    </main>

    <footer class="footer">
        <p>&copy; 2025 Online Admission System</p>
    </footer>
    <script src="script/frontpage.js"></script>
</body>
</html>
