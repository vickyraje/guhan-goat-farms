@extends('layouts.front.app')

@section('title', 'Contact')
@section('description', 'Contact description')

@section('styles')

@endsection

@section('content')

         <div class="page-spacer"></div>

         <!-- Hero Section -->
         <section class="contact-hero">
            <div class="contact-hero-image">
                  <img src="https://images.unsplash.com/photo-1495107334309-fcf20504a5ab?crop=entropy&cs=srgb&fm=jpg&ixid=M3w4NjA2MDV8MHwxfHNlYXJjaHwyfHxmYXJtJTIwbGFuZHNjYXBlfGVufDB8fHx8MTc3MDI1MzMzNHww&ixlib=rb-4.1.0&q=85" alt="Farm Landscape">
                  <div class="contact-hero-overlay"></div>
            </div>
            <div class="contact-hero-content">
                  <h1 class="page-title">Get In Touch</h1>
                  <p class="contact-hero-text">Have questions? We'd love to hear from you.</p>
            </div>
         </section>

         <!-- Contact Info Cards -->
         <section class="contact-info-section">
            <div class="container">
                  <div class="grid grid-4">
                     <div class="contact-card">
                        <div class="contact-icon">
                              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                 <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                                 <circle cx="12" cy="10" r="3"/>
                              </svg>
                        </div>
                        <h3 class="contact-card-title">Location</h3>
                        <p class="contact-card-text">Guhan Goat Farms, Rural District</p>
                     </div>
                     <div class="contact-card">
                        <div class="contact-icon">
                              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                 <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                              </svg>
                        </div>
                        <h3 class="contact-card-title">Phone</h3>
                        <p class="contact-card-text">+91 98765 43210</p>
                     </div>
                     <div class="contact-card">
                        <div class="contact-icon">
                              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                 <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                                 <polyline points="22,6 12,13 2,6"/>
                              </svg>
                        </div>
                        <h3 class="contact-card-title">Email</h3>
                        <p class="contact-card-text">info@guhangoatfarms.com</p>
                     </div>
                     <div class="contact-card">
                        <div class="contact-icon">
                              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                 <circle cx="12" cy="12" r="10"/>
                                 <polyline points="12 6 12 12 16 14"/>
                              </svg>
                        </div>
                        <h3 class="contact-card-title">Working Hours</h3>
                        <p class="contact-card-text">Mon - Sat: 8:00 AM - 6:00 PM</p>
                     </div>
                  </div>
            </div>
         </section>

         <!-- Contact Form Section -->
         <section class="section">
            <div class="container">
                  <div class="two-column-section">
                     <div class="content-column">
                        <h2 class="section-title">Send Us a Message</h2>
                        <p class="section-text">Have questions about our goats, services, or want to schedule a farm visit? Fill out the form below and we'll respond promptly.</p>

                        <form class="contact-form" onsubmit="handleSubmit(event)">
                              <div class="form-group">
                                 <label for="name">Full Name *</label>
                                 <input type="text" id="name" name="name" required placeholder="Your name">
                              </div>
                              <div class="form-group">
                                 <label for="email">Email Address *</label>
                                 <input type="email" id="email" name="email" required placeholder="your.email@example.com">
                              </div>
                              <div class="form-group">
                                 <label for="phone">Phone Number</label>
                                 <input type="tel" id="phone" name="phone" placeholder="+91 98765 43210">
                              </div>
                              <div class="form-group">
                                 <label for="message">Message *</label>
                                 <textarea id="message" name="message" rows="6" required placeholder="Tell us about your inquiry..."></textarea>
                              </div>
                              <button type="submit" class="btn btn-primary btn-lg btn-full">
                                 Send Message
                                 <span class="arrow">→</span>
                              </button>
                        </form>
                     </div>
                     <div class="content-column">
                        <div class="visit-card">
                              <h3 class="visit-title">Visit Our Farm</h3>
                              <p class="visit-text">We welcome visitors to our farm! Schedule a visit to see our facilities, meet our healthy goats, and learn more about our farming practices.</p>
                              <ul class="checklist">
                                 <li>
                                    <svg class="check-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                          <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                                          <polyline points="22 4 12 14.01 9 11.01"/>
                                    </svg>
                                    <span>Tour our farm facilities</span>
                                 </li>
                                 <li>
                                    <svg class="check-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                          <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                                          <polyline points="22 4 12 14.01 9 11.01"/>
                                    </svg>
                                    <span>Meet our healthy livestock</span>
                                 </li>
                                 <li>
                                    <svg class="check-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                          <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                                          <polyline points="22 4 12 14.01 9 11.01"/>
                                    </svg>
                                    <span>Consult with our experts</span>
                                 </li>
                                 <li>
                                    <svg class="check-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                          <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                                          <polyline points="22 4 12 14.01 9 11.01"/>
                                    </svg>
                                    <span>Learn about sustainable practices</span>
                                 </li>
                              </ul>
                        </div>
                        <div class="response-card">
                              <h4 class="response-title">Quick Response Guarantee</h4>
                              <p class="response-text">We typically respond to all inquiries within 24 hours. For urgent matters, please call us directly during business hours.</p>
                        </div>
                     </div>
                  </div>
            </div>
         </section>

         <!-- Map Section -->
         <section class="section bg-light">
            <div class="container">
                  <div class="map-placeholder">
                     <svg class="map-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                        <circle cx="12" cy="10" r="3"/>
                     </svg>
                     <p class="map-text">Interactive Map Coming Soon</p>
                     <p class="map-location">Location: Guhan Goat Farms, Rural District</p>
                  </div>
            </div>
         </section>

@endsection

@section('scripts')
@endsection
