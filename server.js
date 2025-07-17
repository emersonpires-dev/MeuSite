const express = require('express');
const path = require('path');
const cors = require('cors');
const helmet = require('helmet');
const rateLimit = require('express-rate-limit');
const compression = require('compression');
const morgan = require('morgan');
const fs = require('fs');
const multer = require('multer');

// Initialize Express app
const app = express();
const PORT = process.env.PORT || 5000;

// Security middleware
app.use(helmet({
    contentSecurityPolicy: {
        directives: {
            defaultSrc: ["'self'"],
            styleSrc: ["'self'", "'unsafe-inline'", "https://cdn.jsdelivr.net", "https://cdnjs.cloudflare.com"],
            scriptSrc: ["'self'", "'unsafe-inline'", "https://cdn.jsdelivr.net", "https://cdnjs.cloudflare.com"],
            fontSrc: ["'self'", "https://cdnjs.cloudflare.com"],
            imgSrc: ["'self'", "data:", "https:"],
            connectSrc: ["'self'"]
        }
    }
}));

// Rate limiting
const limiter = rateLimit({
    windowMs: 15 * 60 * 1000, // 15 minutes
    max: 100, // limit each IP to 100 requests per windowMs
    message: 'Too many requests from this IP, please try again later.'
});

const contactLimiter = rateLimit({
    windowMs: 60 * 60 * 1000, // 1 hour
    max: 5, // limit each IP to 5 contact form submissions per hour
    message: 'Too many contact form submissions, please try again later.'
});

app.use(limiter);

// Middleware
app.use(compression());
app.use(cors());
app.use(morgan('combined'));
app.use(express.json({ limit: '10mb' }));
app.use(express.urlencoded({ extended: true, limit: '10mb' }));

// Static files
app.use(express.static(path.join(__dirname, '.')));

// Utility functions
function sanitizeInput(input) {
    if (typeof input !== 'string') return '';
    return input.trim().replace(/[<>]/g, '');
}

function validateEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

function validatePhone(phone) {
    const phoneRegex = /^[\d\s\-\(\)]+$/;
    return phoneRegex.test(phone) && phone.length >= 10;
}

function logContact(contactData) {
    const logEntry = {
        timestamp: new Date().toISOString(),
        ip: contactData.ip,
        userAgent: contactData.userAgent,
        name: contactData.name,
        email: contactData.email,
        phone: contactData.phone || '',
        company: contactData.company || '',
        subject: contactData.subject,
        message: contactData.message
    };
    
    const logFile = path.join(__dirname, 'logs', 'contacts.log');
    const logDir = path.dirname(logFile);
    
    if (!fs.existsSync(logDir)) {
        fs.mkdirSync(logDir, { recursive: true });
    }
    
    fs.appendFileSync(logFile, JSON.stringify(logEntry) + '\n');
}

// Contact form endpoint
app.post('/api/contact', contactLimiter, (req, res) => {
    try {
        const { name, email, phone, company, subject, message } = req.body;
        
        // Validation
        const errors = [];
        
        if (!name || name.length < 2) {
            errors.push('Nome deve ter pelo menos 2 caracteres');
        }
        
        if (!email || !validateEmail(email)) {
            errors.push('E-mail inválido');
        }
        
        if (phone && !validatePhone(phone)) {
            errors.push('Telefone inválido');
        }
        
        if (!subject || subject.length < 5) {
            errors.push('Assunto deve ter pelo menos 5 caracteres');
        }
        
        if (!message || message.length < 10) {
            errors.push('Mensagem deve ter pelo menos 10 caracteres');
        }
        
        if (errors.length > 0) {
            return res.status(400).json({ success: false, errors });
        }
        
        // Sanitize inputs
        const sanitizedData = {
            name: sanitizeInput(name),
            email: sanitizeInput(email),
            phone: sanitizeInput(phone || ''),
            company: sanitizeInput(company || ''),
            subject: sanitizeInput(subject),
            message: sanitizeInput(message),
            ip: req.ip,
            userAgent: req.get('User-Agent')
        };
        
        // Log contact
        logContact(sanitizedData);
        
        console.log('Contact form submitted:', sanitizedData);
        
        res.json({ success: true, message: 'Mensagem enviada com sucesso!' });
        
    } catch (error) {
        console.error('Contact form error:', error);
        res.status(500).json({ success: false, message: 'Erro interno do servidor' });
    }
});

// Health check endpoint
app.get('/api/health', (req, res) => {
    res.json({ 
        status: 'healthy', 
        timestamp: new Date().toISOString(),
        uptime: process.uptime(),
        memory: process.memoryUsage(),
        version: process.version
    });
});

// Routes for serving HTML pages
app.get('/', (req, res) => {
    res.sendFile(path.join(__dirname, 'index.html'));
});

app.get('/sobre', (req, res) => {
    res.sendFile(path.join(__dirname, 'pages', 'about.html'));
});

app.get('/servicos', (req, res) => {
    res.sendFile(path.join(__dirname, 'pages', 'services.html'));
});

app.get('/delivery', (req, res) => {
    res.sendFile(path.join(__dirname, 'pages', 'delivery.html'));
});

app.get('/cases', (req, res) => {
    res.sendFile(path.join(__dirname, 'pages', 'cases.html'));
});

// Error handling middleware
app.use((error, req, res, next) => {
    console.error('Server error:', error);
    res.status(500).json({ success: false, message: 'Erro interno do servidor' });
});

// 404 handler
app.use((req, res) => {
    res.status(404).json({ success: false, message: 'Página não encontrada' });
});

// Start server
const server = app.listen(PORT, '0.0.0.0', () => {
    console.log(`Server running on port ${PORT}`);
    console.log(`Environment: ${process.env.NODE_ENV || 'development'}`);
});

// Handle uncaught exceptions
process.on('uncaughtException', (error) => {
    console.error('Uncaught Exception:', error);
    process.exit(1);
});

process.on('unhandledRejection', (reason, promise) => {
    console.error('Unhandled Rejection at:', promise, 'reason:', reason);
});

module.exports = app;