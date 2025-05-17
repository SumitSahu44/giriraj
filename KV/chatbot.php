<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KV Associates - Voice Financial Chatbot</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #c9a560;
            --secondary-color: #c9a560;
            --accent-color: #ef4444;
            --light-color: #f3f4f6;
            --dark-color: #1f2937;
            --success-color: #10b981;
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            --border-radius: 8px;
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f5f7fa;
        }

        .chatbot-container {
            position: fixed;
            bottom: 80px;
            right: 20px;
            width: 100%;
            max-width: 420px;
            height: 600px;
            background-color: white;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            display: none;
            flex-direction: column;
            overflow: hidden;
            z-index: 1000;
            transition: opacity 0.3s ease, transform 0.3s ease;
        }

        .chatbot-container.active {
            display: flex !important;
            opacity: 1;
            transform: translateY(0);
        }

        .chatbot-header {
            background-color: var(--primary-color);
            color: white;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-content {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .logo {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }

        .header-text h3 {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 2px;
        }

        .header-text p {
            font-size: 12px;
            opacity: 0.8;
        }

        .control-btn {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            border: none;
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            transition: var(--transition);
        }

        .control-btn:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }

        .control-btn.close:hover {
            background-color: var(--accent-color);
        }

        .chatbot-messages {
            flex: 1;
            padding: 20px;
            overflow-y: auto;
            background-color: #f9f9f9;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .message {
            max-width: 80%;
            padding: 12px 16px;
            border-radius: 18px;
            line-height: 1.4;
            font-size: 14px;
            position: relative;
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .bot-message {
            background-color: white;
            color: var(--dark-color);
            border-bottom-left-radius: 4px;
            margin-right: auto;
            box-shadow: var(--shadow);
            border: 1px solid #e0e0e0;
        }

        .bot-message::before {
            content: '';
            position: absolute;
            left: -8px;
            bottom: 0;
            border: 10px solid transparent;
            border-right-color: white;
            border-bottom: 0;
            margin-bottom: 8px;
        }

        .user-message {
            background-color: var(--secondary-color);
            color: white;
            border-bottom-right-radius: 4px;
            margin-left: auto;
        }

        .user-message::after {
            content: '';
            position: absolute;
            right: -8px;
            bottom: 0;
            border: 10px solid transparent;
            border-left-color: var(--secondary-color);
            border-bottom: 0;
            margin-bottom: 8px;
        }

        .message-time {
            display: block;
            font-size: 10px;
            opacity: 0.7;
            margin-top: 4px;
            text-align: right;
        }

        .chatbot-input-area {
            border-top: 1px solid #e0e0e0;
            background-color: white;
            padding: 15px;
        }

        .input-container {
            display: flex;
            gap: 10px;
            margin-bottom: 10px;
        }

        #user-input {
            flex: 1;
            padding: 12px 15px;
            border: 1px solid #e0e0e0;
            border-radius: var(--border-radius);
            outline: none;
            transition: var(--transition);
            font-size: 14px;
        }

        #user-input:focus {
            border-color: var(--secondary-color);
            box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.2);
        }

        #send-btn, #mic-btn, #voice-toggle-btn {
            width: 45px;
            height: 45px;
            border-radius: var(--border-radius);
            border: none;
            background-color: var(--secondary-color);
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            transition: var(--transition);
        }

        #send-btn:hover, #mic-btn:hover, #voice-toggle-btn:hover {
            background-color: var(--primary-color);
        }

        #mic-btn.active {
            background-color: var(--success-color);
            animation: pulse 1.5s infinite;
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }

        #voice-toggle-btn.muted {
            background-color: var(--accent-color);
        }

        .quick-reply-container {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .quick-reply-btn {
            padding: 8px 12px;
            border-radius: 20px;
            border: 1px solid var(--secondary-color);
            background-color: white;
            color: var(--secondary-color);
            font-size: 12px;
            cursor: pointer;
            transition: var(--transition);
        }

        .quick-reply-btn:hover {
            background-color: var(--secondary-color);
            color: white;
        }

        .options-container {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 10px;
        }

        .option-btn {
            padding: 12px 15px;
            border-radius: var(--border-radius);
            border: none;
            background-color: var(--primary-color);
            color: white;
            text-align: left;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .option-btn:hover {
            background-color: #c9a560;
            transform: translateX(5px);
        }

        .loan-options {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
            margin-top: 15px;
        }

        .loan-btn {
            padding: 12px;
            border-radius: var(--border-radius);
            border: none;
            background-color: white;
            color: var(--dark-color);
            box-shadow: var(--shadow);
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 5px;
            text-align: center;
        }

        .loan-btn i {
            font-size: 20px;
            color: var(--secondary-color);
        }

        .loan-btn:hover {
            background-color: var(--secondary-color);
            color: white;
        }

        .loan-btn:hover i {
            color: white;
        }

        .form-container {
            margin-top: 15px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-size: 14px;
            color: var(--dark-color);
            font-weight: 500;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #e0e0e0;
            border-radius: var(--border-radius);
            font-size: 14px;
            transition: var(--transition);
        }

        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            border-color: var(--secondary-color);
            box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.2);
            outline: none;
        }

        .form-group textarea {
            min-height: 80px;
            resize: vertical;
        }

        .submit-btn {
            width: 100%;
            padding: 12px;
            border-radius: var(--border-radius);
            border: none;
            background-color: var(--success-color);
            color: white;
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition);
        }

        .submit-btn:hover {
            background-color: #059669;
        }

        .back-btn {
            padding: 10px 15px;
            border-radius: var(--border-radius);
            border: none;
            background-color: var(--light-color);
            color: var(--dark-color);
            font-size: 13px;
            cursor: pointer;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            gap: 5px;
            margin-top: 10px;
        }

        .back-btn:hover {
            background-color: #d1d5db;
        }

        .chatbot-launcher {
            position: fixed;
            bottom: 90px;
            right: 21px;
            width: 64px;
            height: 64px;
            border-radius: 50%;
            background-color: var(--secondary-color);
            color: white;
            border: none;
            box-shadow: var(--shadow);
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1001;
            transition: var(--transition);
        }

        .chatbot-launcher:hover {
            transform: scale(1.1);
            background-color: var(--primary-color);
        }

        .chatbot-launcher i {
            font-size: 24px;
        }

        .typing-indicator {
            display: flex;
            gap: 5px;
            padding: 12px 16px;
            background-color: white;
            border-radius: 18px;
            border-bottom-left-radius: 4px;
            width: fit-content;
            box-shadow: var(--shadow);
            border: 1px solid #e0e0e0;
            margin-right: auto;
        }

        .typing-dot {
            width: 8px;
            height: 8px;
            background-color: #9ca3af;
            border-radius: 50%;
            animation: typingAnimation 1.4s infinite ease-in-out;
        }

        .typing-dot:nth-child(1) { animation-delay: 0s; }
        .typing-dot:nth-child(2) { animation-delay: 0.2s; }
        .typing-dot:nth-child(3) { animation-delay: 0.4s; }

        @keyframes typingAnimation {
            0%, 60%, 100% { transform: translateY(0); }
            30% { transform: translateY(-5px); }
        }

        @media (max-width: 480px) {
            .chatbot-container {
                bottom: 0;
                right: 0;
                border-radius: 0;
                height: 100vh;
                max-width: 100%;
            }
        }
    </style>
</head>
<body>
   <div class="chatbot-container" id="chatbot-container">
        <div class="chatbot-header">
            <div class="header-content">
                <img src="https://via.placeholder.com/40" alt="KV Associates Logo" class="logo">
                <div class="header-text">
                    <h3>KV Associates</h3>
                    <p>Financial Solutions</p>
                </div>
            </div>
            <button class="control-btn close" id="close-btn" aria-label="Close chatbot"><i class="fas fa-times"></i></button>
        </div>
        <div class="chatbot-messages" id="chat-messages" aria-live="polite"></div>
        <div class="chatbot-input-area">
            <div class="input-container">
                <input type="text" id="user-input" placeholder="Type or speak your message..." aria-label="Type or speak your message">
                <button id="mic-btn" aria-label="Toggle microphone"><i class="fas fa-microphone"></i></button>
                <button id="voice-toggle-btn" aria-label="Toggle voice output"><i class="fas fa-volume-up"></i></button>
                <button id="send-btn" aria-label="Send message"><i class="fas fa-paper-plane"></i></button>
            </div>
            <div class="quick-reply-container" id="quick-reply-container"></div>
        </div>
    </div>
    <button class="chatbot-launcher" id="chatbot-launcher" aria-label="Open chatbot">
        <i class="fas fa-comments"></i>
    </button>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // DOM Elements
            const chatbotLauncher = document.getElementById('chatbot-launcher');
            const chatbotContainer = document.getElementById('chatbot-container');
            const closeBtn = document.getElementById('close-btn');
            const chatMessages = document.getElementById('chat-messages');
            const userInput = document.getElementById('user-input');
            const sendBtn = document.getElementById('send-btn');
            const micBtn = document.getElementById('mic-btn');
            const voiceToggleBtn = document.getElementById('voice-toggle-btn');
            const quickReplyContainer = document.getElementById('quick-reply-container');

            // State
            let isChatOpen = false;
            let currentState = 'main';
            let currentLoanType = '';
            let isVoiceEnabled = true;
            let isListening = false;

            // WhatsApp and Email
            const whatsappNumber = '+917171122231'; // TODO: Confirm or update
            const businessEmail = 'sumitkumarsahu141@gmail.com'; // Updated to KV Associates email

            // Speech Recognition
            const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
            let recognition = SpeechRecognition ? new SpeechRecognition() : null;

            // Validate DOM Elements
            if (!chatbotLauncher || !chatbotContainer || !chatMessages || !closeBtn || !userInput || !sendBtn || !micBtn || !voiceToggleBtn || !quickReplyContainer) {
                console.error('One or more DOM elements are missing:', {
                    launcher: !!chatbotLauncher,
                    container: !!chatbotContainer,
                    messages: !!chatMessages,
                    closeBtn: !!closeBtn,
                    userInput: !!userInput,
                    sendBtn: !!sendBtn,
                    micBtn: !!micBtn,
                    voiceToggleBtn: !!voiceToggleBtn,
                    quickReplyContainer: !!quickReplyContainer
                });
                return;
            }

            console.log('Voice chatbot script loaded successfully'); // Debug

            // Initialize Speech Recognition
            if (recognition) {
                recognition.continuous = false;
                recognition.interimResults = false;
                recognition.lang = 'en-US';

                recognition.onresult = (event) => {
                    const transcript = event.results[0][0].transcript.trim();
                    console.log('Voice input:', transcript); // Debug
                    userInput.value = transcript;
                    sendMessage();
                };

                recognition.onerror = (event) => {
                    console.error('Speech recognition error:', event.error); // Debug
                    micBtn.classList.remove('active');
                    isListening = false;
                    addBotMessage('Sorry, I couldn’t understand your voice input. Please try again or type your message.');
                    speak('Sorry, I couldn’t understand your voice input. Please try again or type your message.');
                };

                recognition.onend = () => {
                    console.log('Speech recognition ended'); // Debug
                    micBtn.classList.remove('active');
                    isListening = false;
                };
            } else {
                console.warn('SpeechRecognition not supported in this browser');
                micBtn.style.display = 'none';
                addBotMessage('Voice input is not supported in your browser. Please type your message.');
            }

            // Toggle Microphone
            micBtn.addEventListener('click', () => {
                console.log('Microphone button clicked'); // Debug
                if (!recognition) return;
                if (isListening) {
                    recognition.stop();
                    micBtn.classList.remove('active');
                    isListening = false;
                } else {
                    recognition.start();
                    micBtn.classList.add('active');
                    isListening = true;
                }
            });

            // Toggle Voice Output
            voiceToggleBtn.addEventListener('click', () => {
                console.log('Voice toggle clicked'); // Debug
                isVoiceEnabled = !isVoiceEnabled;
                voiceToggleBtn.classList.toggle('muted', !isVoiceEnabled);
                voiceToggleBtn.innerHTML = `<i class="fas fa-volume-${isVoiceEnabled ? 'up' : 'mute'}"></i>`;
                if (!isVoiceEnabled) {
                    speechSynthesis.cancel(); // Stop any ongoing speech
                }
            });

            // Open Chatbot
            chatbotLauncher.addEventListener('click', (e) => {
                e.preventDefault();
                e.stopPropagation();
                console.log('Chatbot launcher clicked'); // Debug
                try {
                    isChatOpen = !isChatOpen;
                    if (isChatOpen) {
                        chatbotContainer.classList.add('active');
                        chatbotContainer.style.display = 'flex';
                        if (!chatMessages.children.length) {
                            showGreeting();
                        }
                    } else {
                        chatbotContainer.classList.remove('active');
                        chatbotContainer.style.display = 'none';
                        if (isListening && recognition) {
                            recognition.stop();
                            micBtn.classList.remove('active');
                            isListening = false;
                        }
                    }
                } catch (error) {
                    console.error('Error toggling chatbot:', error);
                    alert('Unable to open chatbot. Please try again later.');
                }
            }, { capture: true });

            // Close Chatbot
            closeBtn.addEventListener('click', () => {
                console.log('Close button clicked'); // Debug
                isChatOpen = false;
                chatbotContainer.classList.remove('active');
                chatbotContainer.style.display = 'none';
                if (isListening && recognition) {
                    recognition.stop();
                    micBtn.classList.remove('active');
                    isListening = false;
                }
            });

            // Prevent Closing on Inner Clicks
            chatbotContainer.addEventListener('click', (e) => {
                e.stopPropagation();
            });

            // Send Message
            sendBtn.addEventListener('click', sendMessage);
            userInput.addEventListener('keypress', (e) => {
                if (e.key === 'Enter') sendMessage();
            });

            function sendMessage() {
                const message = userInput.value.trim();
                if (message) {
                    addUserMessage(message);
                    userInput.value = '';
                    showTypingIndicator();
                    setTimeout(() => processUserMessage(message), 1000);
                }
            }

            function showGreeting() {
                console.log('Showing greeting'); // Debug
                const greeting = "Hi there! 👋 Welcome to KV Associates. I'm your financial assistant. You can speak or type to explore loan options, request a callback, or learn about partnerships. How can I help you today?";
                addBotMessage(greeting);
                speak(greeting);
                showMainOptions();
            }

            function sanitizeInput(text) {
                const div = document.createElement('div');
                div.textContent = text;
                return div.innerHTML;
            }

            function addUserMessage(text) {
                console.log('Adding user message:', text); // Debug
                const messageDiv = document.createElement('div');
                messageDiv.className = 'message user-message';
                messageDiv.textContent = sanitizeInput(text);
                const timeSpan = document.createElement('span');
                timeSpan.className = 'message-time';
                timeSpan.textContent = getCurrentTime();
                messageDiv.appendChild(timeSpan);
                chatMessages.appendChild(messageDiv);
                scrollToBottom();
            }

            function addBotMessage(text) {
                console.log('Adding bot message:', text); // Debug
                const typingIndicator = document.querySelector('.typing-indicator');
                if (typingIndicator) typingIndicator.remove();
                const messageDiv = document.createElement('div');
                messageDiv.className = 'message bot-message';
                messageDiv.innerHTML = text;
                const timeSpan = document.createElement('span');
                timeSpan.className = 'message-time';
                timeSpan.textContent = getCurrentTime();
                messageDiv.appendChild(timeSpan);
                chatMessages.appendChild(messageDiv);
                scrollToBottom();
                speak(text);
            }

            function speak(text) {
                if (!isVoiceEnabled || !speechSynthesis) return;
                console.log('Speaking:', text); // Debug
                speechSynthesis.cancel(); // Clear any ongoing speech
                const utterance = new SpeechSynthesisUtterance(text);
                utterance.lang = 'en-US';
                utterance.pitch = 1;
                utterance.rate = 1;
                utterance.volume = 1;
                speechSynthesis.speak(utterance);
            }

            function showTypingIndicator() {
                console.log('Showing typing indicator'); // Debug
                const existingIndicator = document.querySelector('.typing-indicator');
                if (existingIndicator) existingIndicator.remove();
                const indicatorDiv = document.createElement('div');
                indicatorDiv.className = 'typing-indicator';
                for (let i = 0; i < 3; i++) {
                    indicatorDiv.appendChild(document.createElement('div')).className = 'typing-dot';
                }
                chatMessages.appendChild(indicatorDiv);
                scrollToBottom();
            }

            function showMainOptions() {
                console.log('Showing main options'); // Debug
                currentState = 'main';
                clearQuickReplies();
                const optionsDiv = document.createElement('div');
                optionsDiv.className = 'options-container';
                const options = [
                    { text: 'Explore Loan Options', icon: 'fa-hand-holding-dollar', label: 'Explore loan options' },
                    { text: 'Become a Partner', icon: 'fa-handshake', label: 'Become a partner' },
                    { text: 'Request a Callback', icon: 'fa-phone', label: 'Request a callback' },
                    { text: 'Contact Information', icon: 'fa-envelope', label: 'View contact information' }
                ];
                options.forEach(option => {
                    const btn = document.createElement('button');
                    btn.className = 'option-btn';
                    btn.innerHTML = `<i class="fas ${option.icon}"></i> ${option.text}`;
                    btn.setAttribute('aria-label', option.label);
                    btn.addEventListener('click', () => {
                        console.log(`Option clicked: ${option.text}`); // Debug
                        handleMainOption(option.text);
                    });
                    optionsDiv.appendChild(btn);
                });
                chatMessages.appendChild(optionsDiv);
                addQuickReplies(['Loans', 'Partnership', 'Contact']);
                scrollToBottom();
                if (isVoiceEnabled) {
                    speak('Please select an option or speak your choice.');
                }
            }

            function handleMainOption(option) {
                console.log('Handling main option:', option); // Debug
                if (option.includes('Loan')) {
                    showLoanOptions();
                } else if (option.includes('Partner')) {
                    showPartnerForm();
                } else if (option.includes('Callback')) {
                    showCallbackForm();
                } else if (option.includes('Contact')) {
                    showContactInfo();
                }
            }

            function showLoanOptions() {
                console.log('Showing loan options'); // Debug
                currentState = 'loan-options';
                clearChat();
                const message = "We offer a comprehensive range of loan products to meet your financial needs. Please select a loan type:";
                addBotMessage(message);
                speak(message);
                const loanOptionsDiv = document.createElement('div');
                loanOptionsDiv.className = 'loan-options';
                const loanTypes = [
                    { name: 'Home Loan', icon: 'fa-home', label: 'Home loan' },
                    { name: 'SME/MSME Loan', icon: 'fa-building', label: 'SME/MSME loan' },
                    { name: 'Education Loan', icon: 'fa-graduation-cap', label: 'Education loan' },
                    { name: 'Loan Against Property', icon: 'fa-landmark', label: 'Loan against property' },
                    { name: 'Commercial Property Loan', icon: 'fa-city', label: 'Commercial property loan' },
                    { name: 'Project Loan', icon: 'fa-project-diagram', label: 'Project loan' },
                    { name: 'Other Loan Types', icon: 'fa-list', label: 'Other loan types' }
                ];
                loanTypes.forEach(loan => {
                    const btn = document.createElement('button');
                    btn.className = 'loan-btn';
                    btn.innerHTML = `<i class="fas ${loan.icon}"></i> ${loan.name}`;
                    btn.setAttribute('aria-label', loan.label);
                    btn.addEventListener('click', () => {
                        console.log(`Loan clicked: ${loan.name}`); // Debug
                        showLoanDetails(loan.name);
                    });
                    loanOptionsDiv.appendChild(btn);
                });
                chatMessages.appendChild(loanOptionsDiv);
                addBackButton('Back to Main Menu', showMainOptions);
                addQuickReplies(['Home Loan', 'Business Loan', 'Education Loan']);
                scrollToBottom();
            }

            function showLoanDetails(loanType) {
                console.log('Showing loan details for:', loanType); // Debug
                currentState = 'loan-details';
                currentLoanType = loanType;
                clearChat();
                const intro = `You've selected <strong>${loanType}</strong>. Here are the details:`;
                addBotMessage(intro);
                speak(intro);
                const loanDescriptions = {
                    'Home Loan': 'Our home loans offer competitive interest rates starting from 8.25% p.a. with flexible repayment tenures up to 30 years. Loan amounts range from ₹5 lakhs to ₹10 crores.',
                    'SME/MSME Loan': 'Tailored financing solutions for small and medium enterprises with loan amounts from ₹10 lakhs to ₹5 crores. Quick approval process with minimal documentation.',
                    'Education Loan': 'Finance domestic or international education with loans up to ₹1.5 crores. Moratorium period available until course completion.',
                    'Loan Against Property': 'Get funds up to 60% of your property value at attractive interest rates while retaining ownership of your property.',
                    'Commercial Property Loan': 'Specialized loans for purchasing or constructing commercial properties with repayment tenures up to 15 years.',
                    'Project Loan': 'Comprehensive financing for new projects or expansion of existing businesses with customized repayment schedules.',
                    'Other Loan Types': 'We offer various other loan products including personal loans, vehicle loans, and more. Please contact us for specific requirements.'
                };
                const details = loanDescriptions[loanType] || 'This loan product offers flexible terms and competitive rates. Please contact us for more details.';
                addBotMessage(details);
                speak(details);
                const applyBtn = document.createElement('button');
                applyBtn.className = 'option-btn';
                applyBtn.innerHTML = '<i class="fas fa-file-signature"></i> Apply Now';
                applyBtn.setAttribute('aria-label', `Apply for ${loanType}`);
                applyBtn.style.marginTop = '15px';
                applyBtn.addEventListener('click', () => showApplicationForm(loanType));
                chatMessages.appendChild(applyBtn);
                addBackButton('Back to Loan Options', showLoanOptions);
                scrollToBottom();
            }

            function sendToWhatsApp(formData, refNumber, formType) {
                console.log('Preparing WhatsApp message'); // Debug
                const message = `
                    New ${formType} Submission
                    Reference: ${refNumber}
                    ${Array.from(formData.entries()).map(([key, value]) => `${key.charAt(0).toUpperCase() + key.slice(1).replace(/-/g, ' ')}: ${value}`).join('\n')}
                `.trim();
                const encodedMessage = encodeURIComponent(message);
                const whatsappUrl = `https://api.whatsapp.com/send?phone=${whatsappNumber}&text=${encodedMessage}`;
                window.open(whatsappUrl, '_blank');
            }

         function sendToEmail(formData, refNumber, formType) {
        console.log('Sending email for:', formType, refNumber); // Debug
        const formDataObj = Object.fromEntries(formData.entries());
        const emailBody = {
            to: 'sumitkumarsahu141@gmail.com',
            subject: `New ${formType} Submission - Ref: ${refNumber}`,
            body: `
                New ${formType} Submission
                Reference: ${refNumber}
                ${Object.entries(formDataObj).map(([key, value]) => `${key.charAt(0).toUpperCase() + key.slice(1).replace(/-/g, ' ')}: ${value}`).join('\n')}
            `
        };

        // Send to PHP backend
        fetch('./api/chatbot.php', { // Adjust path if PHP file is in a different directory
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(emailBody)
        })
        .then(res => {
            if (!res.ok) {
                throw new Error(`Email API failed with status: ${res.status}`);
            }
            return res.json();
        })
        .then(data => {
            console.log('Email sent successfully:', data);
            addBotMessage('Your submission has been successfully sent to our team!');
            speak('Your submission has been successfully sent to our team!');
        })
        .catch(err => {
            console.error('Email sending error:', err);
            addBotMessage('Failed to send email notification. Please contact us directly at sumitkumarsahu141@gmail.com.');
            speak('Failed to send email notification. Please contact us directly.');
        });
    }


            function showApplicationForm(loanType) {
                console.log('Showing application form for:', loanType); // Debug
                currentState = 'application-form';
                clearChat();
                const message = `Great! Let's get started with your ${loanType} application. Please fill in your details:`;
                addBotMessage(message);
                speak(message);
                const form = document.createElement('form');
                form.className = 'form-container';
                const fields = [
                    { id: 'full-name', label: 'Full Name', type: 'text', required: true },
                    { id: 'email', label: 'Email Address', type: 'email', required: true },
                    { id: 'phone', label: 'Phone Number', type: 'tel', required: true },
                    { id: 'loan-amount', label: 'Desired Loan Amount (₹)', type: 'number', required: true },
                    { id: 'purpose', label: 'Purpose of Loan', type: 'textarea', required: false }
                ];
                fields.forEach(field => {
                    const group = document.createElement('div');
                    group.className = 'form-group';
                    const label = document.createElement('label');
                    label.htmlFor = field.id;
                    label.textContent = field.label;
                    let input;
                    if (field.type === 'textarea') {
                        input = document.createElement('textarea');
                        input.id = field.id;
                        input.rows = 3;
                    } else {
                        input = document.createElement('input');
                        input.type = field.type;
                        input.id = field.id;
                    }
                    input.setAttribute('aria-label', field.label);
                    if (field.required) input.required = true;
                    group.appendChild(label);
                    group.appendChild(input);
                    form.appendChild(group);
                });
                const submitBtn = document.createElement('button');
                submitBtn.type = 'submit';
                submitBtn.className = 'submit-btn';
                submitBtn.textContent = 'Submit Application';
                submitBtn.setAttribute('aria-label', 'Submit loan application');
                form.appendChild(submitBtn);
                chatMessages.appendChild(form);
                addBackButton('Back to Loan Details', () => showLoanDetails(loanType));
                scrollToBottom();
                form.addEventListener('submit', (e) => {
                    e.preventDefault();
                    console.log('Loan application submitted'); // Debug
                    const formData = new FormData(e.target);
                    formData.append('loan-type', loanType);
                    const refNumber = 'KV-' + Math.floor(100000 + Math.random() * 900000);
                    const successMessage = `Thank you for your ${loanType} application! We've received your details and our representative will contact you within 24 hours.`;
                    addBotMessage(successMessage);
                    speak(successMessage);
                    const refMessage = `Your reference number is: <strong>${refNumber}</strong>. Please quote this in all communications.`;
                    addBotMessage(refMessage);
                    speak(refMessage);
                    sendToWhatsApp(formData, refNumber, 'Loan Application');
                    sendToEmail(formData, refNumber, 'Loan Application');
                    e.target.remove();
                    addBackButton('Back to Main Menu', showMainOptions);
                });
            }

            function showPartnerForm() {
                console.log('Showing partner form'); // Debug
                currentState = 'partner-form';
                clearChat();
                const message = "We're excited about potential collaboration! Please provide your details and we'll contact you to discuss partnership opportunities.";
                addBotMessage(message);
                speak(message);
                const form = document.createElement('form');
                form.className = 'form-container';
                const fields = [
                    { id: 'partner-name', label: 'Your Name', type: 'text', required: true },
                    { id: 'organization', label: 'Organization Name', type: 'text', required: true },
                    { id: 'partner-email', label: 'Email Address', type: 'email', required: true },
                    { id: 'partner-phone', label: 'Phone Number', type: 'tel', required: true },
                    { id: 'partner-type', label: 'Organization Type', type: 'select', options: ['NBFC', 'Bank', 'Financial Institution', 'Other'], required: true },
                    { id: 'partner-message', label: 'Your Message', type: 'textarea', required: false }
                ];
                fields.forEach(field => {
                    const group = document.createElement('div');
                    group.className = 'form-group';
                    const label = document.createElement('label');
                    label.htmlFor = field.id;
                    label.textContent = field.label;
                    let input;
                    if (field.type === 'textarea') {
                        input = document.createElement('textarea');
                        input.id = field.id;
                        input.rows = 3;
                    } else if (field.type === 'select') {
                        input = document.createElement('select');
                        input.id = field.id;
                        field.options.forEach(option => {
                            const opt = document.createElement('option');
                            opt.value = option;
                            opt.textContent = option;
                            input.appendChild(opt);
                        });
                    } else {
                        input = document.createElement('input');
                        input.type = field.type;
                        input.id = field.id;
                    }
                    input.setAttribute('aria-label', field.label);
                    if (field.required) input.required = true;
                    group.appendChild(label);
                    group.appendChild(input);
                    form.appendChild(group);
                });
                const submitBtn = document.createElement('button');
                submitBtn.type = 'submit';
                submitBtn.className = 'submit-btn';
                submitBtn.textContent = 'Submit Partnership Request';
                submitBtn.setAttribute('aria-label', 'Submit partnership request');
                form.appendChild(submitBtn);
                chatMessages.appendChild(form);
                addBackButton('Back to Main Menu', showMainOptions);
                scrollToBottom();
                form.addEventListener('submit', (e) => {
                    e.preventDefault();
                    console.log('Partner form submitted'); // Debug
                    const formData = new FormData(e.target);
                    const refNumber = 'KV-' + Math.floor(100000 + Math.random() * 900000);
                    const successMessage = "Thank you for your partnership request! Our business development team will review your information and contact you within 2 business days.";
                    addBotMessage(successMessage);
                    speak(successMessage);
                    const refMessage = `Your reference number is: <strong>${refNumber}</strong>. Please quote this in all communications.`;
                    addBotMessage(refMessage);
                    speak(refMessage);
                    sendToWhatsApp(formData, refNumber, 'Partnership Request');
                    sendToEmail(formData, refNumber, 'Partnership Request');
                    e.target.remove();
                    addBackButton('Back to Main Menu', showMainOptions);
                });
            }

            function showCallbackForm() {
                console.log('Showing callback form'); // Debug
                currentState = 'callback-form';
                clearChat();
                const message = "We'd be happy to call you back at your convenience. Please provide your details and preferred callback time.";
                addBotMessage(message);
                speak(message);
                const form = document.createElement('form');
                form.className = 'form-container';
                const fields = [
                    { id: 'callback-name', label: 'Your Name', type: 'text', required: true },
                    { id: 'callback-phone', label: 'Phone Number', type: 'tel', required: true },
                    { id: 'callback-time', label: 'Preferred Callback Time', type: 'text', placeholder: 'e.g., Tomorrow between 2-4 PM', required: true }
                ];
                fields.forEach(field => {
                    const group = document.createElement('div');
                    group.className = 'form-group';
                    const label = document.createElement('label');
                    label.htmlFor = field.id;
                    label.textContent = field.label;
                    const input = document.createElement('input');
                    input.type = field.type;
                    input.id = field.id;
                    input.setAttribute('aria-label', field.label);
                    if (field.placeholder) input.placeholder = field.placeholder;
                    if (field.required) input.required = true;
                    group.appendChild(label);
                    group.appendChild(input);
                    form.appendChild(group);
                });
                const submitBtn = document.createElement('button');
                submitBtn.type = 'submit';
                submitBtn.className = 'submit-btn';
                submitBtn.textContent = 'Request Callback';
                submitBtn.setAttribute('aria-label', 'Request callback');
                form.appendChild(submitBtn);
                chatMessages.appendChild(form);
                addBackButton('Back to Main Menu', showMainOptions);
                scrollToBottom();
                form.addEventListener('submit', (e) => {
                    e.preventDefault();
                    console.log('Callback form submitted'); // Debug
                    const formData = new FormData(e.target);
                    const refNumber = 'KV-' + Math.floor(100000 + Math.random() * 900000);
                    const successMessage = "Thank you for your callback request! We'll call you at your preferred time. If you need immediate assistance, please call us at +91 7909999901.";
                    addBotMessage(successMessage);
                    speak(successMessage);
                    const refMessage = `Your reference number is: <strong>${refNumber}</strong>. Please quote this in all communications.`;
                    addBotMessage(refMessage);
                    speak(refMessage);
                    sendToWhatsApp(formData, refNumber, 'Callback Request');
                    sendToEmail(formData, refNumber, 'Callback Request');
                    e.target.remove();
                    addBackButton('Back to Main Menu', showMainOptions);
                });
            }

            function showContactInfo() {
                console.log('Showing contact info'); // Debug
                currentState = 'contact-info';
                clearChat();
                const message = "Here's how you can reach us:";
                addBotMessage(message);
                speak(message);
                const contactDiv = document.createElement('div');
                contactDiv.className = 'options-container';
                const contacts = [
                    { text: '📧 Email: info@kvassociateindia.com', icon: 'fa-envelope', label: 'Email us' },
                    { text: '📞 Phone: +91 7909999901', icon: 'fa-phone', label: 'Call us' },
                    { text: '🏢 Office Hours: Mon-Sat, 9:30 AM to 6:30 PM', icon: 'fa-clock', label: 'Office hours' },
                    { text: '📍 Location: 123 Financial District, Mumbai, India', icon: 'fa-map-marker-alt', label: 'Our location' }
                ];
                contacts.forEach(contact => {
                    const btn = document.createElement('button');
                    btn.className = 'option-btn';
                    btn.style.cursor = 'default';
                    btn.innerHTML = `<i class="fas ${contact.icon}"></i> ${contact.text}`;
                    btn.setAttribute('aria-label', contact.label);
                    contactDiv.appendChild(btn);
                });
                chatMessages.appendChild(contactDiv);
                addBackButton('Back to Main Menu', showMainOptions);
                scrollToBottom();
            }

            function processUserMessage(message) {
                console.log('Processing user message:', message); // Debug
                message = message.toLowerCase();
                if (currentState === 'main') {
                    if (message.includes('loan') || message.includes('finance') || message.includes('borrow')) {
                        showLoanOptions();
                    } else if (message.includes('partner') || message.includes('collaborat') || message.includes('join')) {
                        showPartnerForm();
                    } else if (message.includes('call') || message.includes('callback') || message.includes('contact')) {
                        showCallbackForm();
                    } else if (message.includes('email') || message.includes('phone') || message.includes('address')) {
                        showContactInfo();
                    } else {
                        const errorMessage = "I'm not sure I understand. Please select one of the options below or speak clearly:";
                        addBotMessage(errorMessage);
                        speak(errorMessage);
                        showMainOptions();
                    }
                } else if (currentState === 'loan-options') {
                    const loanTypes = ['home', 'sme', 'msme', 'education', 'property', 'commercial', 'project'];
                    const selectedLoan = loanTypes.find(loan => message.includes(loan));
                    if (selectedLoan) {
                        let loanType = '';
                        if (selectedLoan === 'home') loanType = 'Home Loan';
                        else if (selectedLoan === 'sme' || selectedLoan === 'msme') loanType = 'SME/MSME Loan';
                        else if (selectedLoan === 'education') loanType = 'Education Loan';
                        else if (selectedLoan === 'property') loanType = 'Loan Against Property';
                        else if (selectedLoan === 'commercial') loanType = 'Commercial Property Loan';
                        else if (selectedLoan === 'project') loanType = 'Project Loan';
                        showLoanDetails(loanType);
                    } else {
                        const errorMessage = "Please select a loan type from the options below:";
                        addBotMessage(errorMessage);
                        speak(errorMessage);
                        showLoanOptions();
                    }
                } else {
                    const message = "How else can I assist you?";
                    addBotMessage(message);
                    speak(message);
                    showMainOptions();
                }
            }

            function clearChat() {
                console.log('Clearing chat'); // Debug
                chatMessages.innerHTML = '';
            }

            function clearQuickReplies() {
                console.log('Clearing quick replies'); // Debug
                quickReplyContainer.innerHTML = '';
            }

            function addQuickReplies(replies) {
                console.log('Adding quick replies:', replies); // Debug
                clearQuickReplies();
                replies.forEach(reply => {
                    const btn = document.createElement('button');
                    btn.className = 'quick-reply-btn';
                    btn.textContent = reply;
                    btn.setAttribute('aria-label', `Select ${reply}`);
                    btn.addEventListener('click', () => {
                        console.log(`Quick reply clicked: ${reply}`); // Debug
                        addUserMessage(reply);
                        showTypingIndicator();
                        setTimeout(() => processUserMessage(reply), 1000);
                    });
                    quickReplyContainer.appendChild(btn);
                });
            }

            function addBackButton(text, clickHandler) {
                console.log('Adding back button:', text); // Debug
                const backBtn = document.createElement('button');
                backBtn.className = 'back-btn';
                backBtn.innerHTML = `<i class="fas fa-arrow-left"></i> ${text}`;
                backBtn.setAttribute('aria-label', text);
                backBtn.addEventListener('click', () => {
                    console.log(`Back button clicked: ${text}`); // Debug
                    clickHandler();
                });
                chatMessages.appendChild(backBtn);
                scrollToBottom();
            }

            function scrollToBottom() {
                console.log('Scrolling to bottom'); // Debug
                chatMessages.scrollTop = chatMessages.scrollHeight;
            }

            function getCurrentTime() {
                return new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
            }
        });
    </script>
 
</body>
</html>