# App5M - Desenvolvimento de Aplicativos

## Overview

App5M is a Brazilian web development company based in Porto Alegre, RS, specializing in mobile application development, website creation, and digital marketing services. The project consists of a static website built with HTML, CSS, and JavaScript, complemented by a Node.js/Express backend for handling contact forms and file uploads.

## User Preferences

Preferred communication style: Simple, everyday language.

## System Architecture

### Frontend Architecture
- **Static Website**: Traditional HTML/CSS/JavaScript multi-page application
- **CSS Framework**: Bootstrap 5.1.3 for responsive design and UI components
- **Icons**: Font Awesome 6.0.0 for iconography
- **Structure**: Main landing page (index.html) with separate pages for services, about, delivery, and cases
- **Responsive Design**: Mobile-first approach with dedicated responsive.css

### Backend Architecture
- **Runtime**: Node.js with Express.js 5.1.0
- **Security**: Helmet.js for security headers, CORS for cross-origin requests
- **Rate Limiting**: Express-rate-limit for API protection (100 requests/15min general, 5 requests/hour for contact forms)
- **File Handling**: Multer for file uploads
- **Email Service**: Nodemailer for contact form submissions
- **Compression**: Gzip compression for performance optimization
- **Logging**: Morgan for HTTP request logging

## Key Components

### 1. Static Website Structure
- **Main Page**: index.html - Company landing page with hero section, services overview, and contact form
- **Services Page**: Detailed breakdown of offered services
- **About Page**: Company information and team details
- **Delivery Page**: Showcase of App5M Delivery platform
- **Cases Page**: Portfolio of successful projects

### 2. Navigation System
- Fixed navigation bar with smooth scrolling
- Active link highlighting based on scroll position
- Responsive mobile menu with Bootstrap collapse

### 3. Interactive Features
- **Slider Component**: Custom JavaScript slider for App5M Delivery section with auto-play, touch support, and keyboard navigation
- **Contact Form**: Client-side validation with server-side processing
- **Scroll Effects**: Smooth scrolling, scroll-to-top functionality, and navbar appearance changes

### 4. Security Implementation
- Content Security Policy (CSP) configuration
- Rate limiting for general requests and contact form submissions
- CORS configuration for cross-origin requests
- Request payload size limits (10MB)

## Data Flow

### Contact Form Process
1. User fills out contact form on frontend
2. JavaScript validates form data client-side
3. Form data sent to Express backend via POST request
4. Backend validates and processes form data
5. Nodemailer sends email notification
6. Response sent back to frontend with success/error status

### File Upload Process
1. User selects files through form interface
2. Multer middleware handles file processing
3. Files validated for size and type
4. Processed files stored on server
5. Response sent to client with upload status

## External Dependencies

### CDN Resources
- Bootstrap 5.1.3 (CSS framework)
- Font Awesome 6.0.0 (icons)
- Google Fonts (typography)

### NPM Packages
- **express**: Web framework for Node.js
- **nodemailer**: Email sending functionality
- **multer**: File upload handling
- **helmet**: Security middleware
- **cors**: Cross-origin resource sharing
- **express-rate-limit**: API rate limiting
- **compression**: Gzip compression
- **morgan**: HTTP request logging

## Deployment Strategy

### Static Assets
- HTML, CSS, and JavaScript files served directly by Express
- Images and media files served from static directories
- CSS and JS files organized in separate folders for maintainability

### Server Configuration
- Express server configured to serve static files
- Default port 8000 with environment variable override
- Security headers and middleware applied globally
- Rate limiting configured for different endpoints

### Performance Optimizations
- Gzip compression enabled for all responses
- CSS and JavaScript minification recommended for production
- Image optimization recommended for faster loading
- CDN usage for external libraries reduces server load

### Security Measures
- Content Security Policy prevents XSS attacks
- Rate limiting prevents abuse and DoS attacks
- CORS configuration controls cross-origin requests
- File upload restrictions prevent malicious file uploads

The application is designed as a marketing website with backend support for contact forms and file uploads, focusing on showcasing App5M's services and facilitating client inquiries.