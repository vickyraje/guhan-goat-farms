@extends('layouts.front.app')

@section('title', 'About')
@section('description', 'About Description')

@section('styles')

@endsection

@section('content')

         <div class="page-spacer"></div>

         <!-- Hero Section -->
         <section class="section bg-gradient">
            <div class="container">
                  <div class="about-hero">
                     <h1 class="page-title">About Our Farm</h1>
                     <p class="about-mission">Committed to Excellence in Goat Farming</p>
                     <p class="about-description">Guhan Goat Farms has been a trusted name in quality livestock breeding for over a decade. We specialize in raising healthy goats using sustainable and ethical farming practices.</p>
                  </div>

                  <!-- Stats -->
                  <div class="grid grid-4">
                     <div class="stat-card">
                        <div class="stat-value">500+</div>
                        <div class="stat-label">Healthy Goats</div>
                     </div>
                     <div class="stat-card">
                        <div class="stat-value">15+</div>
                        <div class="stat-label">Years Experience</div>
                     </div>
                     <div class="stat-card">
                        <div class="stat-value">200+</div>
                        <div class="stat-label">Happy Customers</div>
                     </div>
                     <div class="stat-card">
                        <div class="stat-value">100%</div>
                        <div class="stat-label">Quality Assured</div>
                     </div>
                  </div>
            </div>
         </section>

         <!-- Images Section -->
         <section class="section">
            <div class="container">
                  <div class="grid grid-2">
                     <div class="about-image">
                        <img src="https://images.unsplash.com/photo-1748524291921-711d5a929e8c?crop=entropy&cs=srgb&fm=jpg&ixid=M3w4NjA2MTJ8MHwxfHNlYXJjaHwyfHxmYXJtJTIwcGFzdG9yYWx8ZW58MHx8fHwxNzcwMjUzMzE5fDA&ixlib=rb-4.1.0&q=85" alt="Farm Facility">
                     </div>
                     <div class="about-image">
                        <img src="https://images.unsplash.com/photo-1727961665663-6b639b8b1908?crop=entropy&cs=srgb&fm=jpg&ixid=M3w4NjA2MTJ8MHwxfHNlYXJjaHwzfHxmYXJtJTIwcGFzdG9yYWx8ZW58MHx8fHwxNzcwMjUzMzE5fDA&ixlib=rb-4.1.0&q=85" alt="Farm Landscape">
                     </div>
                  </div>
            </div>
         </section>

         <!-- Values Section -->
         <section class="section bg-light">
            <div class="container">
                  <div class="section-header">
                     <h2 class="section-title">Our Core Values</h2>
                     <p class="section-subtitle">The principles that guide everything we do</p>
                  </div>
                  <div class="grid grid-3">
                     <div class="value-card">
                        <div class="icon-circle">
                              <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                 <circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="6"/><circle cx="12" cy="12" r="2"/>
                              </svg>
                        </div>
                        <h3 class="card-title">Quality First</h3>
                        <p class="card-text">We never compromise on the health and well-being of our livestock. Every goat receives the best care, nutrition, and medical attention.</p>
                     </div>
                     <div class="value-card">
                        <div class="icon-circle">
                              <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                 <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                              </svg>
                        </div>
                        <h3 class="card-title">Customer Focus</h3>
                        <p class="card-text">Building lasting relationships with our customers through transparency, honest communication, and exceptional service.</p>
                     </div>
                     <div class="value-card">
                        <div class="icon-circle">
                              <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                 <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/>
                              </svg>
                        </div>
                        <h3 class="card-title">Sustainability</h3>
                        <p class="card-text">Implementing eco-friendly farming practices that protect the environment while ensuring profitable and sustainable operations.</p>
                     </div>
                  </div>
            </div>
         </section>

         <!-- What We Offer Section -->
         <section class="section">
            <div class="container">
                  <div class="two-column-section">
                     <div class="content-column">
                        <h2 class="section-title">What We Offer</h2>
                        <p class="section-text">At Guhan Goat Farms, we provide comprehensive solutions for all your goat farming needs. From premium breeding stock to expert consultation, we're here to support your success.</p>
                        <ul class="checklist">
                              <li>
                                 <svg class="check-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                                    <polyline points="22 4 12 14.01 9 11.01"/>
                                 </svg>
                                 <span>Premium quality breeding stock with verified genetics</span>
                              </li>
                              <li>
                                 <svg class="check-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                                    <polyline points="22 4 12 14.01 9 11.01"/>
                                 </svg>
                                 <span>Complete health documentation and vaccination records</span>
                              </li>
                              <li>
                                 <svg class="check-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                                    <polyline points="22 4 12 14.01 9 11.01"/>
                                 </svg>
                                 <span>Professional farm management consultation</span>
                              </li>
                              <li>
                                 <svg class="check-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                                    <polyline points="22 4 12 14.01 9 11.01"/>
                                 </svg>
                                 <span>Ongoing support and guidance for new farmers</span>
                              </li>
                              <li>
                                 <svg class="check-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                                    <polyline points="22 4 12 14.01 9 11.01"/>
                                 </svg>
                                 <span>Sustainable farming practices training</span>
                              </li>
                              <li>
                                 <svg class="check-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                                    <polyline points="22 4 12 14.01 9 11.01"/>
                                 </svg>
                                 <span>Market connections and sales support</span>
                              </li>
                        </ul>
                     </div>
                     <div class="image-column">
                        <img src="https://images.unsplash.com/photo-1597214189145-b8365985d50a?crop=entropy&cs=srgb&fm=jpg&ixid=M3w4NjAzNTl8MHwxfHNlYXJjaHwyfHxnb2F0JTIwZmFybXxlbnwwfHx8fDE3NzAyNTMzMTB8MA&ixlib=rb-4.1.0&q=85" alt="Goat Farm">
                     </div>
                  </div>
            </div>
         </section>

@endsection

@section('scripts')
@endsection
