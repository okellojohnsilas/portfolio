<?php 
    $page_name = "RESUME";
    include 'components/front/top.php';
    include 'components/front/breadcrumbs.php';
?><style>
body {
    font-family: Arial,
        Helvetica,
        sans-serif;
}

h2,
h3,
h4 {
    font-weight: bold;
    text-align: center;
}

h5 {
    font-weight: bold;
    /* text-align: center; */
}

a {
    color: black;
}

p {
    text-align: justify;
}

hr {
    height: 0.5rem;
    background: black;
}
</style>
<div class="container pt-5">
    <a class="btn btn-primary btn-block fw-bold" style="width:100%;" download="<?php print $app_name; ?>"
        href="assets/dist/front/src/img/personal/c.v/c.v.pdf">PRINT RESUME <i class="fas fa-print"></i></a>
    <h1 class="text-center pt-3">OKELLO JOHN SILAS</h1>
    <h3>SOFTWARE ENGINEER</h3>
    <p class="lead text-center fw-bold"><a href="mailto:johnsilasokello49@gmail.com">johnsilasokello49@gmail.com</a> |
        okellojohnsilas.com</p>
    <div class="d-flex align-items-start">
        <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <button class="nav-link fw-bold active" id="v-pills-summary-tab" data-bs-toggle="pill"
                data-bs-target="#v-pills-summary" type="button" role="tab" aria-controls="v-pills-summary"
                aria-selected="true">Summary</button>
            <button class="nav-link fw-bold" id="v-pills-work-tab" data-bs-toggle="pill" data-bs-target="#v-pills-work"
                type="button" role="tab" aria-controls="v-pills-work" aria-selected="false">Experience</button>
            <button class="nav-link fw-bold" id="v-pills-education-tab" data-bs-toggle="pill"
                data-bs-target="#v-pills-education" type="button" role="tab" aria-controls="v-pills-education"
                aria-selected="false">Education</button>
            <button class="nav-link fw-bold" id="v-pills-skills-tab" data-bs-toggle="pill"
                data-bs-target="#v-pills-skills" type="button" role="tab" aria-controls="v-pills-skills"
                aria-selected="false">Skills</button>
            <button class="nav-link fw-bold" id="v-pills-references-tab" data-bs-toggle="pill"
                data-bs-target="#v-pills-references" type="button" role="tab" aria-controls="v-pills-references"
                aria-selected="false">References</button>
        </div>
        <div class="tab-content pb-5" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-summary" role="tabpanel"
                aria-labelledby="v-pills-summary-tab" tabindex="0">
                <h4>Professional Summary</h4>
                <hr>
                <p class="lead">I am a self-motivated and adaptable software developer recognized for translating
                    complex
                    business needs
                    into innovative technical solutions. Known for collaboration and adaptability, I excel in team
                    environments,
                    working closely with data and operations teams to meet customer needs. My expertise includes Machine
                    Learning and Deep Learning, with a focus on cancer research and radiomics. Proficient in handling
                    technical issues, creating system documentation, and conducting quality assurance, I bring
                    efficiency to
                    project development and prioritize user experience optimization. Backed by a strong academic and
                    technical background, I am committed to delivering cutting-edge solutions in the dynamic field of
                    Machine
                    Learning, especially in cancer research and radiomics.</p>
            </div>
            <div class="tab-pane fade" id="v-pills-work" role="tabpanel" aria-labelledby="v-pills-work-tab"
                tabindex="0">
                <h4>Work Experience</h4>
                <hr>
                <div class="row">
                    <div class="col-10">
                        <h5>Ritsumeikan University | College of Global Liberal Arts Teaching Assistant</h5>
                    </div>
                    <div class="col-2 text-center">
                        <p>2023 - 2024</p>
                    </div>
                </div>
                <ul>
                    <li><b>Engaging Classroom Activities:</b> Implemented creative and engaging classroom activities to
                        enhance
                        student interest and motivation.</li>
                    <li><b>Enhanced Participation:</b> Improved overall class participation by introducing group
                        activities and
                        project-based learning methods.
                    </li>
                    <li><b>Continuous Assessment and Adaptation:</b> Evaluated student performance through regular
                        assessments, tracked progress, and adjusted instructional strategies accordingly.</li>
                    <li><b>Constructive Feedback:</b> Provided constructive feedback on student assignments to refine
                        their
                        writing
                        skills and comprehension.
                    </li>
                    <li><b>Mentorship and Support:</b> Served as a mentor to new teaching assistants, offering guidance
                        on
                        effective classroom management and instruction strategies, and assisted in developing
                        comprehensive
                        lesson plans tailored to individual student needs.</li>
                </ul>
                <div class="row">
                    <div class="col-10">
                        <h5>CapaBuil Limited | Data Analytics Business Development Associate</h5>
                    </div>
                    <div class="col-2 text-center">
                        <p>2022 - 2023</p>
                    </div>
                </div>
                <ul>
                    <li><b>Strategic Communication and Contract Acquisition:</b> Developed compelling proposals and
                        presentations that effectively communicated the value of solutions, securing multiple contracts
                        with
                        potential clients.</li>
                    <li><b>Revenue Growth Strategies:</b> Increased company revenue through proactive promotion of
                        products
                        and services via cold calling, networking, and impactful presentations to prospective customers.
                    </li>
                    <li><b>Customized Solutions and Successful Partnerships:</b> Collaborated with cross-functional
                        teams to
                        develop customized solutions for clients' unique business needs, fostering successful and
                        lasting
                        partnerships.</li>
                    <li><b>Exceptional Customer Service:</b> Provided outstanding customer service by addressing client
                        concerns
                        promptly and maintaining regular communication throughout the entire partnership process.</li>
                    <li><b>Upselling and Cross-Selling Success:</b> Identified opportunities for upselling and
                        cross-selling
                        within
                        the existing client base, generating additional revenue streams for the company.</li>
                </ul>
                <div class="row">
                    <div class="col-10">
                        <h5>MAAT Systems East Africa | Software Engineer</h5>
                    </div>
                    <div class="col-2 text-center">
                        <p>2022</p>
                    </div>
                </div>
                <ul>
                    <li> <b>Code Quality Assurance:</b> Assisted in conducting thorough code reviews to identify areas
                        of
                        improvement and ensure adherence to best practices within the development team.</li>
                    <li> <b>Efficient Deployment Practices:</b> Supported continuous integration and deployment
                        practices,
                        reducing time-to-market for new features, and promoting efficient release processes.</li>
                    <li><b>Legacy Code Refinement:</b> Refined legacy codebases by refactoring outdated methodologies
                        and
                        replacing deprecated components with modern alternatives.</li>
                    <li> <b>Security Enhancement:</b> Improved security measures within existing systems through
                        vulnerability
                        analysis and implementation of appropriate countermeasures.</li>
                    <li> <b>Innovation and Scalable Solutions:</b> Contributed to research on new technologies,
                        collaborated
                        with
                        cross-functional teams, and played a role in developing scalable web applications that increased
                        user
                        engagement and satisfaction. Developed user-friendly interfaces for seamless navigation and
                        improved
                        user experience.</li>
                </ul>
                <div class="row">
                    <div class="col-10">
                        <h5>Strathmore Computing and Engineering Students Association | Club Ambassador</h5>
                    </div>
                    <div class="col-2 text-center">
                        <p>2021 - 2022</p>
                    </div>
                </div>
                <ul class="">
                    <li><b>SCESA Diversity and Inclusivity Team:</b> Engaged in a team within the Strathmore Computing
                        and
                        Engineering Students' Association (SCESA) that focused on addressing the needs of diverse
                        groups,
                        fostering inclusivity, and promoting industrial experiences for over 250 members.
                    </li>
                    <li><b>Promoting STEM Culture:</b> Actively participated in various activities aimed at growing the
                        culture
                        and
                        adoption of science, technology, engineering, and mathematics (STEM) among fellow students
                        through
                        seminars and courses.</li>
                    <li><b>Operational Support:</b> Assisted the team in developing operational policies and procedures
                        to
                        enhance
                        service delivery within the association.</li>
                    <li> <b>Community Engagement and Networking:</b> Served as an ambassador at charity events, built
                        relationships with key stakeholders, and developed an extensive network of community contacts,
                        increasing the organization's visibility.</li>
                    <li> <b>Outreach and Representation:</b> Developed and implemented a comprehensive social media
                        outreach
                        strategy, resulting in increased followers, and represented the organization at professional
                        conferences
                        by delivering engaging presentations to diverse audiences.</li>
                </ul>
                <div class="row">
                    <div class="col-10">
                        <h5>12th Student&apos;s Council Strathmore University | Presidential Senate Advisor</h5>
                    </div>
                    <div class="col-2 text-center">
                        <p>2020 - 2021</p>
                    </div>
                </div>
                <ul>
                    <li><b>Problem-Solving and Innovation:</b> Applied problem-solving skills to efficiently address
                        unexpected
                        challenges in ongoing projects, collaborating with the team to develop innovative solutions,
                        thereby
                        enhancing overall project effectiveness.</li>
                    <li><b>Adaptability and Communication:</b> Demonstrated adaptability by taking on additional
                        responsibilities,
                        streamlining communication channels, and organizing team meetings to improve project efficiency.
                    </li>
                    <li> <b>Effective Project Management:</b> Managed multiple priorities effectively, delivering
                        consistent
                        results
                        under tight deadlines throughout the internship period, while actively participating in concept
                        development and idea generation.</li>
                    <li> <b>Collaboration and Stakeholder Relations:</b> Participated in cross-functional teams,
                        supported
                        project
                        managers in monitoring progress, maintained clear communication with stakeholders, and
                        contributed
                        to comprehensive market research for company growth. I collaborated with external partners to
                        ensure
                        smooth implementation of events which led to the generation of over half a million shillings
                        towards the
                        Elimisha Student Scholarship fund.</li>
                    <li> <b>Data Analysis and Productivity Improvement:</b> Utilized data analysis skills to identify
                        areas of
                        improvement in projects, implemented new organizational tools for task tracking and time
                        management,
                        and delivered high-quality presentations on project updates to senior management and
                        stakeholders.</li>
                </ul>
                <div class="row">
                    <div class="col-10">
                        <h5>Strathmore University | Students Helping Students External Outreach Ambassador</h5>
                    </div>
                    <div class="col-2 text-center">
                        <p>2020</p>
                    </div>
                </div>
                <ul>
                    <li><b>Data Improvement and Analysis:</b> Improved data collection methods for tracking outreach
                        efforts,
                        allowing for more accurate analysis of results and impact during the creation of the Students
                        Helping
                        Students Program.</li>
                    <li><b>Community Engagement and Relationship Building:</b> Established strong relationships with key
                        stakeholders and conducted regular follow-ups with community members, reinforcing positive
                        relationships and ensuring necessary support.</li>
                    <li><b>Effective Outreach Campaigns:</b> Supported team members in executing successful outreach
                        campaigns, resulting in heightened community awareness of available resources, and strengthened
                        partnerships with local organizations through regular communication and collaboration.</li>
                    <li><b>Adaptability and Goal Setting:</b> Adapted quickly to changing circumstances during
                        fieldwork,
                        tailored
                        presentations to specific audience demographics, and evaluated the success of outreach campaigns
                        using quantitative metrics, contributing to improved project outcomes.</li>
                    <li><b>Communication and Outreach Strategies:</b> Streamlined communication channels within the
                        outreach
                        team, utilized social media platforms to expand reach, and developed tailored strategies for
                        diverse
                        populations, enhancing community engagement and ensuring inclusivity in disseminating
                        information
                        and services.</li>
                </ul>
            </div>
            <div class="tab-pane fade" id="v-pills-education" role="tabpanel" aria-labelledby="v-pills-education-tab"
                tabindex="0">
                <h4>Education</h4>
                <hr>
                <div class="row">
                    <div class="col-10">
                        <h5>Master of Science, Information Science and Engineering</h5>
                    </div>
                    <div class="col-2 text-center">
                        <p>2022 - 2024</p>
                    </div>
                </div>
                <p>Ritsumeikan University.</p>
                <div class="row">
                    <div class="col-10">
                        <h5>Bachelor of Science, Business Information and Technology</h5>
                    </div>
                    <div class="col-2 text-center">
                        <p>2018 - 2022</p>
                    </div>
                </div>
                <p>Strathmore University.</p>
                <div class="row">
                    <div class="col-10">
                        <h5>Diploma of Sceince , Business Information and Technology</h5>
                    </div>
                    <div class="col-2 text-center">
                        <p>2018 - 2019</p>
                    </div>
                </div>
                <p>Strathmore University.</p>

                <h4>Certifications</h4>
                <hr>
                <div class="row">
                    <div class="col-10">
                        <h5>Artificial Intelligence and Machine Learning</h5>
                    </div>
                    <div class="col-2 text-center">
                        <p>2021</p>
                    </div>
                </div>
                <p>Strathmore University IT Students Association, Strathmore University.</p>
                <div class="row">
                    <div class="col-10">
                        <h5>Introduction To Programming: Software Engineer</h5>
                    </div>
                    <div class="col-2 text-center">
                        <p>2019</p>
                    </div>
                </div>
                <p>Moringa School, Nairobi Kenya.</p>
            </div>
            <div class="tab-pane fade" id="v-pills-skills" role="tabpanel" aria-labelledby="v-pills-skills-tab"
                tabindex="0">
                <h4>Skills &amp; Abilities</h4>
                <hr>
                <p class="lead">Object-Oriented Programming, Machine Learning, Integration, Mobile App Development, Web
                    application
                    development, Algorithm development, Software Architecture, Design API Development, Performance
                    Optimization, Continuous Integration and Deployment Data Structure Optimization, Software Testing
                    Strategies, Cross-platform Development, Network Security Protocols, Code Review Techniques, Software
                    Debugging, Effective verbal communication, Code testing, Data Storage and Retrieval API Design and
                    Development, RDMS Development, Software Documentation Control Education.
                    Databases: Oracle, MongoDB Source and Version Control: Git, GitHub.
                    Project Management Continuous Integration Systems Software Testing and Validation Problem-Solving.
                    JSON mapping Performance Analytics, Analytical Skills, Creative Problem-Solving, Project
                    Documentation,

                    Testing and debugging, Reliability, Android Software Development, SOAP and RESTful Web Services,
                    Adobe Software, CRM Software, System Administration, Relationship Building.</p>
            </div>
            <div class="tab-pane fade" id="v-pills-references" role="tabpanel" aria-labelledby="v-pills-references-tab"
                tabindex="0">
                <h4>References</h4>
                <hr>
                <div class="row pb-5">
                    <div class="col-md-6 col-sm-12">
                        <h5>Mr. Richard Assanga Otolo</h5>
                        <p class="lead">Chief Technology Officer.
                            <br>8teq Technology Hub.
                            <br>Nairobi, Kenya.
                            <br>Email: <a href="mailto:richardotolo@gmail.com">richardotolo@gmail.com</a>
                            <br>Tel: +254731269789
                        </p>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <h5>Mr. Oscar Tsie Segongwana</h5>
                        <p class="lead">Senior Lecturer Faculty of Engineering and Applied Science.
                            <br>Botho University.
                            <br>Gaborone, Botswana.
                            <br>Email: <a
                                href="mailto:oscar.tsie@bothouniversity.ac.bw">oscar.tsie@bothouniversity.ac.bw</a>
                            <br>Tel: +267 72 851 973
                        </p>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <h5>Mr. Don Kamoya</h5>
                        <p class="lead">12th Student&rsquo;s Council President.
                            <br>Strathmore University.
                            <br>Nairobi, Kenya.
                            <br>Email: <a href="mailto:don.kamoya@strathmore.edu">don.kamoya@strathmore.edu</a>
                            <br>Tel: +254 746563497
                        </p>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <h5>Mr. Martin Tarus</h5>
                        <p class="lead">Chief Innovation Officer.
                            <br>MAAT Systems East Africa.
                            <br>Nairobi, Kenya.
                            <br>Email: <a href="mailto:marttkip@gmail.com">marttkip@gmail.com</a>
                            <br>Tel: +254 704 808007
                        </p>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <h5>Mr. Simon Mwachi</h5>
                        <p class="lead">Head of ICT and Data Analytics Division.
                            <br>CapaBuil Limited.
                            <br>Nairobi, Kenya.
                            <br>Email: <a href="mailto:simon.mwachi@capabuil.com">simon.mwachi@capabuil.com</a>
                            <br>Tel: +254 717 165425
                        </p>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <h5>Professor Yen Wei Chen</h5>
                        <p class="lead">Professor, College of Information Science and Engineering.
                            <br>Intelligent Image Processing Lab.
                            <br>Email: <a href="mailto:chen@is.ritsumei.ac.jp">chen@is.ritsumei.ac.jp</a>
                            <br>Ritsumeikan University, Japan
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'components/front/bottom.php'; ?>