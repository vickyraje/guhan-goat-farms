@extends('layouts.front.app')

@section('title', 'Home')

@section('styles')

@endsection

@section('content')


         <!-- Hero Section -->
         <section class="hero">
            <div class="hero-image">
                  <img src="https://images.unsplash.com/photo-1593750187970-84858a2aaf5e?crop=entropy&cs=srgb&fm=jpg&ixid=M3w4NjAzNTl8MHwxfHNlYXJjaHwxfHxnb2F0JTIwZmFybXxlbnwwfHx8fDE3NzAyNTMzMTB8MA&ixlib=rb-4.1.0&q=85" alt="Goat Farm">
                  <div class="hero-overlay"></div>
            </div>
            <div class="hero-content">
                  <div class="container">
                     <div class="hero-text">
                        <h1 class="hero-title">Premium Goat Farming</h1>
                        <p class="hero-subtitle">Quality Livestock & Sustainable Farming Practices</p>
                        <p class="hero-description">Welcome to our professional goat farm where we specialize in breeding healthy livestock, providing quality goat products, and promoting sustainable farming practices.</p>
                        <div class="hero-buttons">
                              <a href="about.html" class="btn btn-primary btn-lg">
                                 Explore Our Farm
                                 <span class="arrow">→</span>
                              </a>
                              <a href="contact.html" class="btn btn-outline btn-lg">Contact Us</a>
                        </div>
                     </div>
                  </div>
            </div>
         </section>

         <!-- Why Choose Us Section -->
         <section class="section bg-gradient">
            <div class="container">
                  <div class="section-header">
                     <h2 class="section-title">Why Choose Us</h2>
                     <p class="section-subtitle">Excellence in goat farming with commitment to quality and sustainability</p>
                  </div>
                  <div class="grid grid-4">
                     <div class="card">
                        <div class="icon-circle">
                              <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                 <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                              </svg>
                        </div>
                        <h3 class="card-title">Healthy Livestock</h3>
                        <p class="card-text">All our goats are raised with proper nutrition, healthcare, and ethical practices.</p>
                     </div>
                     <div class="card">
                        <div class="icon-circle">
                              <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                 <circle cx="12" cy="8" r="5"/><path d="M20 21a8 8 0 1 0-16 0"/>
                              </svg>
                        </div>
                        <h3 class="card-title">Expert Care</h3>
                        <p class="card-text">Over 15 years of experience in goat farming and livestock management.</p>
                     </div>
                     <div class="card">
                        <div class="icon-circle">
                              <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                 <path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5M2 12l10 5 10-5"/>
                              </svg>
                        </div>
                        <h3 class="card-title">Sustainable Practices</h3>
                        <p class="card-text">Environment-friendly farming methods that ensure long-term sustainability.</p>
                     </div>
                     <div class="card">
                        <div class="icon-circle">
                              <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                 <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                              </svg>
                        </div>
                        <h3 class="card-title">Quality Assurance</h3>
                        <p class="card-text">Complete health records, vaccinations, and breeding documentation provided.</p>
                     </div>
                  </div>
            </div>
         </section>

         <!-- Services Section -->
         <section class="section">
            <div class="container">
                  <div class="section-header">
                     <h2 class="section-title">Our Services</h2>
                     <p class="section-subtitle">Comprehensive goat farming solutions for your needs</p>
                  </div>
                  <div class="grid grid-3">
                     <div class="service-card">
                        <div class="service-image">
                              <img src="https://images.unsplash.com/photo-1514753910521-3dc1645aa97e?crop=entropy&cs=srgb&fm=jpg&ixid=M3w3NTY2NzF8MHwxfHNlYXJjaHwyfHxoZWFsdGh5JTIwZ29hdHN8ZW58MHx8fHwxNzcwMjUzMzI2fDA&ixlib=rb-4.1.0&q=85" alt="Goat Breeding">
                              <div class="service-icon">
                                 <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/>
                                 </svg>
                              </div>
                        </div>
                        <div class="service-content">
                              <h3 class="service-title">Goat Breeding</h3>
                              <p class="service-text">Expert breeding programs with superior bloodlines for healthy, productive livestock.</p>
                        </div>
                     </div>
                     <div class="service-card">
                        <div class="service-image">
                              <img src="https://images.unsplash.com/photo-1727113836223-b3ed82929ca3?crop=entropy&cs=srgb&fm=jpg&ixid=M3w3NTY2NzF8MHwxfHNlYXJjaHwxfHxoZWFsdGh5JTIwZ29hdHN8ZW58MHx8fHwxNzcwMjUzMzI2fDA&ixlib=rb-4.1.0&q=85" alt="Livestock Sales">
                              <div class="service-icon">
                                 <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/>
                                 </svg>
                              </div>
                        </div>
                        <div class="service-content">
                              <h3 class="service-title">Quality Livestock Sales</h3>
                              <p class="service-text">Premium goats available for purchase with complete health documentation.</p>
                        </div>
                     </div>
                     <div class="service-card">
                        <div class="service-image">
                              <img src="https://images.unsplash.com/photo-1632468648403-99a7942b8f71?crop=entropy&cs=srgb&fm=jpg&ixid=M3w3NTY2NzF8MHwxfHNlYXJjaHw0fHxoZWFsdGh5JTIwZ29hdHN8ZW58MHx8fHwxNzcwMjUzMzI2fDA&ixlib=rb-4.1.0&q=85" alt="Farm Consultation">
                              <div class="service-icon">
                                 <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/>
                                 </svg>
                              </div>
                        </div>
                        <div class="service-content">
                              <h3 class="service-title">Farm Consultation</h3>
                              <p class="service-text">Professional guidance on goat farming, nutrition, and farm management.</p>
                        </div>
                     </div>
                  </div>
            </div>
         </section>

         <!-- Testimonials Section -->
         <section class="section bg-light">
            <div class="container">
                  <div class="section-header">
                     <h2 class="section-title">What Our Customers Say</h2>
                     <p class="section-subtitle">Trusted by farmers and livestock owners across the region</p>
                  </div>
                  <div class="grid grid-3">
                     <div class="testimonial-card">
                        <div class="stars">★★★★★</div>
                        <p class="testimonial-text">"Excellent quality goats! The breeding stock I purchased has significantly improved my farm's productivity."</p>
                        <div class="testimonial-author">
                              <strong>Rajesh Kumar</strong>
                              <span>Dairy Farmer</span>
                        </div>
                     </div>
                     <div class="testimonial-card">
                        <div class="stars">★★★★★</div>
                        <p class="testimonial-text">"Very professional service and healthy animals. The consultation services helped me start my own goat farm successfully."</p>
                        <div class="testimonial-author">
                              <strong>Priya Sharma</strong>
                              <span>Farm Owner</span>
                        </div>
                     </div>
                     <div class="testimonial-card">
                        <div class="stars">★★★★★</div>
                        <p class="testimonial-text">"Trustworthy and transparent dealings. I've been buying from them for 3 years now."</p>
                        <div class="testimonial-author">
                              <strong>Mohammed Ali</strong>
                              <span>Livestock Trader</span>
                        </div>
                     </div>
                  </div>
            </div>
         </section>

         <!-- CTA Section -->
         <section class="cta-section">
            <div class="container">
                  <div class="cta-content">
                     <h2 class="cta-title">Ready to Start Your Goat Farming Journey?</h2>
                     <p class="cta-text">Get in touch with us today for quality livestock and expert consultation</p>
                     <a href="contact.html" class="btn btn-white btn-lg">
                        Contact Us Today
                        <span class="arrow">→</span>
                     </a>
                  </div>
            </div>
         </section>


@endsection

@section('scripts')
@endsection
