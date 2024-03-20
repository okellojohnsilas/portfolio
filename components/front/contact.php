 <!-- Contact Section-->
 <section class="page-section" id="contact">
     <div class="container">
         <!-- Contact Section Heading-->
         <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Contact Me</h2>
         <!-- Icon Divider-->
         <div class="divider-custom">
             <div class="divider-custom-line"></div>
             <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
             <div class="divider-custom-line"></div>
         </div>
         <!-- Contact Section Form-->
         <div class="row justify-content-center">
             <div class="col-lg-8 col-xl-7">
                 <form action="processes/contact" method="post">
                     <!-- Name input-->
                     <div class="form-floating mb-3">
                         <input class="form-control" name="name" type="text" placeholder="Enter your name..."/>
                         <label for="name">Full name</label>
                     </div>
                     <!-- Email address input-->
                     <div class="form-floating mb-3">
                         <input class="form-control" name="email" type="email" placeholder="name@gmail.com" />
                         <label for="email">Email address</label>
                     </div>
                     <!-- Phone number input-->
                     <div class="form-floating mb-3">
                         <input class="form-control" name="phone" type="tel" placeholder="(123) 456-7890"/>
                         <label for="phone">Phone number</label>
                     </div>
                     <!-- Message input-->
                     <div class="form-floating mb-3">
                         <textarea class="form-control" name="message" type="text"
                             placeholder="Enter your message here..." style="height: 10rem"
                             data-sb-validations="required"></textarea>
                         <label for="message">Message</label>
                     </div>
                     <div class="h-captcha" data-sitekey="e5b7b5f3-2188-4062-902e-b3ede5b85946"></div>
                     <!-- Submit Button-->
                     <button class="btn btn-primary btn-xl fw-bold" style="width:100%" name="submit" type="submit">SEND MESSAGE
                         <i class="fas fa-paper-plane"></i></button>
                 </form>
             </div>
         </div>
     </div>
 </section>