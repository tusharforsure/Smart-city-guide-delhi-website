<?php include 'include/header.php'; ?>
<section class="contact-section">
    <div class="contact-container">
        <div class="contact-left">
            <div class="contact-content">
                <h2>Get in Touch</h2>
                <p class="subtitle">We'd love to hear from you. Send us a message and we'll respond as soon as possible.</p>
                
                <div class="contact-info">
                    <div class="info-item">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M1.5 8.67v8.58a3 3 0 003 3h15a3 3 0 003-3V8.67l-8.928 5.493a3 3 0 01-3.144 0L1.5 8.67z"/>
                            <path d="M22.5 6.908V6.75a3 3 0 00-3-3h-15a3 3 0 00-3 3v.158l9.714 5.978a1.5 1.5 0 001.572 0L22.5 6.908z"/>
                        </svg>
                        <span>smartcityguide@gmail.com</span>
                    </div>
                    
                    <div class="info-item">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path fill-rule="evenodd" d="M1.5 4.5a3 3 0 013-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 01-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 006.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 011.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 01-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5z" clip-rule="evenodd"/>
                        </svg>
                        <span>123456789</span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="contact-right">
            <form action="process_form.php" method="POST" class="contact-form">
                <h3>Send us a message</h3>
                
                <div class="form-group">
                    <input type="text" id="name" name="name" required>
                    <label for="name">Your Name</label>
                    <div class="underline"></div>
                </div>
                
                <div class="form-group">
                    <input type="email" id="email" name="email" required>
                    <label for="email">Email Address</label>
                    <div class="underline"></div>
                </div>
                
                <div class="form-group">
                    <textarea id="message" name="message" rows="4" required></textarea>
                    <label for="message">Your Message</label>
                    <div class="underline"></div>
                </div>
                
                <button type="submit" class="submit-btn">
                    <span>Send Message</span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M3.478 2.404a.75.75 0 00-.926.941l2.432 7.905H13.5a.75.75 0 010 1.5H4.984l-2.432 7.905a.75.75 0 00.926.94 60.519 60.519 0 0018.445-8.986.75.75 0 000-1.218A60.517 60.517 0 003.478 2.404z"/>
                    </svg>
                </button>
            </form>
        </div>
    </div>
</section>
<?php include 'includes/footer.php'; ?>

<style>
    :root {
        --primary: #0057B8;
        --primary-light: #e6f0ff;
        --primary-dark: #003d82;
        --accent: #ff6b6b;
        --light: #ffffff;
        --dark: #2d3748;
        --gray: #718096;
        --light-gray: #f7fafc;
    }
    
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }
    
    body {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        line-height: 1.6;
        color: var(--dark);
        padding-top: 0px; 
    }
    
    /* Contact Section */
    .contact-section {
        min-height: 100vh;
        display: flex;
        align-items: center;
        background: var(--light-gray);
    }
    
    .contact-container {
        display: flex;
        max-width: 1200px;
        width: 90%;
        margin: 0 auto;
        background: var(--light);
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    }
    
    .contact-left {
        flex: 1;
        padding: 60px;
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        color: var(--light);
        display: flex;
        align-items: center;
    }
    
    .contact-content {
        max-width: 400px;
    }
    
    .contact-left h2 {
        font-size: 2.5rem;
        margin-bottom: 20px;
        font-weight: 700;
    }
    
    .subtitle {
        font-size: 1.1rem;
        opacity: 0.9;
        margin-bottom: 40px;
    }
    
    .contact-info {
        display: flex;
        flex-direction: column;
        gap: 25px;
    }
    
    .info-item {
        display: flex;
        align-items: center;
        gap: 15px;
    }
    
    .info-item svg {
        width: 24px;
        height: 24px;
        color: var(--accent);
    }
    
    /* Right Side - Form */
    .contact-right {
        flex: 1;
        padding: 60px;
        display: flex;
        align-items: center;
    }
    
    .contact-form {
        width: 100%;
        max-width: 400px;
    }
    
    .contact-form h3 {
        font-size: 1.8rem;
        color: var(--primary);
        margin-bottom: 30px;
        font-weight: 600;
    }
    
    .form-group {
        position: relative;
        margin-bottom: 30px;
    }
    
    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 12px 0;
        font-size: 16px;
        border: none;
        border-bottom: 1px solid var(--gray);
        background: transparent;
        transition: all 0.3s;
    }
    
    .form-group textarea {
        resize: vertical;
        min-height: 120px;
    }
    
    .form-group label {
        position: absolute;
        top: 12px;
        left: 0;
        color: var(--gray);
        transition: all 0.3s;
        pointer-events: none;
    }
    
    .form-group .underline {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 0;
        height: 2px;
        background: var(--primary);
        transition: all 0.3s;
    }
    
    .form-group input:focus ~ label,
    .form-group input:valid ~ label,
    .form-group textarea:focus ~ label,
    .form-group textarea:valid ~ label {
        top: -18px;
        font-size: 14px;
        color: var(--primary);
    }
    
    .form-group input:focus ~ .underline,
    .form-group textarea:focus ~ .underline {
        width: 100%;
    }
    
    /* Submit Button */
    .submit-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        background: var(--primary);
        color: white;
        border: none;
        padding: 14px 28px;
        border-radius: 8px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
        margin-top: 10px;
    }
    
    .submit-btn svg {
        width: 20px;
        height: 20px;
        transition: transform 0.3s;
    }
    
    .submit-btn:hover {
        background: var(--primary-dark);
        transform: translateY(-2px);
    }
    
    .submit-btn:hover svg {
        transform: translateX(4px);
    }
    
    /* Responsive */
    @media (max-width: 768px) {
        .contact-container {
            flex-direction: column;
            width: 95%;
        }
        
        .contact-left,
        .contact-right {
            padding: 40px 30px;
        }
        
        .contact-left {
            text-align: center;
        }
        
        .contact-content {
            max-width: 100%;
        }
        
        .info-item {
            justify-content: center;
        }
    }
</style>