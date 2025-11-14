// public/js/rental.js - Enhanced Rental Page JavaScript

document.addEventListener('DOMContentLoaded', function() {
  
  // ========================================
  // RENTAL BOOKING SYSTEM
  // ========================================
  
  let selectedConsole = null;
  let selectedPackage = null;
  let bookingData = {
    console: '',
    package: '',
    duration: '',
    price: 0,
    name: '',
    phone: '',
    date: '',
    time: '',
    notes: ''
  };

  const modal = document.getElementById('bookingModal');
  const closeModalBtn = document.getElementById('closeModal');
  const cancelBookingBtn = document.getElementById('cancelBooking');
  const bookingForm = document.getElementById('bookingForm');
  const consoleSelectButtons = document.querySelectorAll('.btn-select-console');
  
  // ========================================
  // CONSOLE SELECTION
  // ========================================
  
  consoleSelectButtons.forEach(button => {
    button.addEventListener('click', function() {
      const consoleType = this.getAttribute('data-console-type');
      const consoleCard = this.closest('.console-card');
      const selectedPackageInput = consoleCard.querySelector('input[type="radio"]:checked');
      
      if (!selectedPackageInput) {
        showNotification('Pilih paket waktu terlebih dahulu!', 'warning');
        // Highlight package selection
        const packageSelection = consoleCard.querySelector('.package-selection');
        packageSelection.style.animation = 'shake 0.5s ease';
        setTimeout(() => {
          packageSelection.style.animation = '';
        }, 500);
        return;
      }

      const packageOption = selectedPackageInput.closest('.package-option');
      const price = parseInt(packageOption.getAttribute('data-price'));
      const duration = packageOption.getAttribute('data-duration');
      const unit = packageOption.getAttribute('data-unit');
      
      // Set booking data
      bookingData.console = consoleType.toUpperCase();
      bookingData.package = `${duration} ${unit}`;
      bookingData.price = price;
      bookingData.duration = duration;
      bookingData.unit = unit;
      
      // Update modal content
      updateBookingModal();
      
      // Show modal
      openModal();
    });
  });

  // ========================================
  // MODAL CONTROLS
  // ========================================
  
  function openModal() {
    modal.classList.add('active');
    document.body.style.overflow = 'hidden';
  }

  function closeModal() {
    modal.classList.remove('active');
    document.body.style.overflow = '';
    resetForm();
  }

  closeModalBtn?.addEventListener('click', closeModal);
  cancelBookingBtn?.addEventListener('click', closeModal);
  
  // Close modal when clicking overlay
  modal?.querySelector('.booking-modal-overlay')?.addEventListener('click', closeModal);

  // Prevent closing when clicking modal content
  modal?.querySelector('.booking-modal-content')?.addEventListener('click', function(e) {
    e.stopPropagation();
  });

  // Close modal on ESC key
  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape' && modal?.classList.contains('active')) {
      closeModal();
    }
  });

  // ========================================
  // UPDATE BOOKING MODAL
  // ========================================
  
  function updateBookingModal() {
    document.getElementById('selectedConsoleName').textContent = bookingData.console;
    document.getElementById('summaryConsole').textContent = bookingData.console;
    document.getElementById('summaryPackage').textContent = bookingData.package;
    document.getElementById('summaryTotal').textContent = formatRupiah(bookingData.price);
  }

  // ========================================
  // FORM VALIDATION & SUBMISSION
  // ========================================
  
  bookingForm?.addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Get form data
    const formData = new FormData(this);
    bookingData.name = sanitizeInput(formData.get('name'));
    bookingData.phone = sanitizeInput(formData.get('phone'));
    bookingData.date = formData.get('date');
    bookingData.time = formData.get('time');
    bookingData.notes = sanitizeInput(formData.get('notes') || '');
    
    // Validate inputs
    if (!validateBookingData()) {
      return;
    }
    
    // Generate WhatsApp message
    const message = generateWhatsAppMessage();
    
    // Send to WhatsApp (replace with your business phone number)
    const phoneNumber = '6281234567890'; // Ganti dengan nomor WA bisnis Anda
    const whatsappUrl = `https://wa.me/${phoneNumber}?text=${encodeURIComponent(message)}`;
    
    // Open WhatsApp
    window.open(whatsappUrl, '_blank');
    
    // Show success notification
    showNotification('Redirecting ke WhatsApp...', 'success');
    
    // Close modal after a short delay
    setTimeout(() => {
      closeModal();
    }, 1500);
  });

  // ========================================
  // INPUT VALIDATION
  // ========================================
  
  function validateBookingData() {
    // Validate name (max 100 chars, no empty)
    if (!bookingData.name || bookingData.name.trim().length === 0) {
      showNotification('Nama tidak boleh kosong!', 'error');
      return false;
    }
    
    if (bookingData.name.length > 100) {
      showNotification('Nama terlalu panjang (max 100 karakter)!', 'error');
      return false;
    }

    // Validate phone (10-13 digits, numbers only)
    const phoneRegex = /^[0-9]{10,13}$/;
    if (!phoneRegex.test(bookingData.phone)) {
      showNotification('Nomor WhatsApp tidak valid! (10-13 digit angka)', 'error');
      return false;
    }

    // Validate date (not in the past)
    const selectedDate = new Date(bookingData.date);
    const today = new Date();
    today.setHours(0, 0, 0, 0);
    
    if (selectedDate < today) {
      showNotification('Tanggal booking tidak boleh di masa lalu!', 'error');
      return false;
    }

    // Validate time selected
    if (!bookingData.time) {
      showNotification('Pilih jam booking terlebih dahulu!', 'error');
      return false;
    }

    // Validate notes length
    if (bookingData.notes && bookingData.notes.length > 500) {
      showNotification('Catatan terlalu panjang (max 500 karakter)!', 'error');
      return false;
    }

    return true;
  }

  // ========================================
  // SANITIZE INPUT
  // ========================================
  
  function sanitizeInput(input) {
    if (typeof input !== 'string') return '';
    
    // Remove HTML tags and trim
    return input
      .replace(/<[^>]*>/g, '')
      .trim()
      .substring(0, 500); // Max length safety
  }

  // ========================================
  // GENERATE WHATSAPP MESSAGE
  // ========================================
  
  function generateWhatsAppMessage() {
    const dateFormatted = formatDate(bookingData.date);
    
    return `🎮 *BOOKING RENTAL PLAYSTATION*

📱 *Konsol:* ${bookingData.console}
⏱️ *Paket:* ${bookingData.package}
💰 *Total Harga:* ${formatRupiah(bookingData.price)}

👤 *Data Customer:*
Nama: ${bookingData.name}
WhatsApp: ${bookingData.phone}

📅 *Jadwal Booking:*
Tanggal: ${dateFormatted}
Jam Mulai: ${bookingData.time} WIB

${bookingData.notes ? `📝 *Catatan:*\n${bookingData.notes}` : ''}

Mohon konfirmasi ketersediaan. Terima kasih! 🙏`;
  }

  // ========================================
  // FAQ ACCORDION
  // ========================================
  
  const faqQuestions = document.querySelectorAll('.faq-question');
  
  faqQuestions.forEach(question => {
    question.addEventListener('click', function() {
      const faqItem = this.closest('.faq-item');
      const isActive = faqItem.classList.contains('active');
      
      // Close all FAQ items
      document.querySelectorAll('.faq-item').forEach(item => {
        item.classList.remove('active');
      });
      
      // Toggle current item
      if (!isActive) {
        faqItem.classList.add('active');
      }
    });
  });

  // ========================================
  // PACKAGE SELECTION TRACKING
  // ========================================
  
  const packageOptions = document.querySelectorAll('.package-option input[type="radio"]');
  
  packageOptions.forEach(radio => {
    radio.addEventListener('change', function() {
      const packageOption = this.closest('.package-option');
      const consoleCard = this.closest('.console-card');
      
      // Add visual feedback
      consoleCard.querySelectorAll('.package-option').forEach(opt => {
        opt.classList.remove('selected');
      });
      packageOption.classList.add('selected');
      
      // Enable button with animation
      const selectButton = consoleCard.querySelector('.btn-select-console');
      selectButton.style.animation = 'pulse 0.5s ease';
      setTimeout(() => {
        selectButton.style.animation = '';
      }, 500);
    });
  });

  // ========================================
  // UTILITY FUNCTIONS
  // ========================================
  
  function formatRupiah(number) {
    return 'Rp ' + number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
  }

  function formatDate(dateString) {
    const date = new Date(dateString);
    const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
    return date.toLocaleDateString('id-ID', options);
  }

  function resetForm() {
    bookingForm?.reset();
    bookingData = {
      console: '',
      package: '',
      duration: '',
      price: 0,
      name: '',
      phone: '',
      date: '',
      time: '',
      notes: ''
    };
  }

  // ========================================
  // NOTIFICATION SYSTEM
  // ========================================
  
  function showNotification(message, type = 'info') {
    // Remove existing notifications
    const existingNotif = document.querySelector('.rental-notification');
    if (existingNotif) {
      existingNotif.remove();
    }

    // Create notification element
    const notification = document.createElement('div');
    notification.className = `rental-notification rental-notification-${type}`;
    notification.innerHTML = `
      <div class="notification-content">
        <i class="bi bi-${getNotificationIcon(type)}"></i>
        <span>${message}</span>
      </div>
    `;
    
    document.body.appendChild(notification);
    
    // Animate in
    setTimeout(() => {
      notification.classList.add('show');
    }, 10);
    
    // Auto remove after 3 seconds
    setTimeout(() => {
      notification.classList.remove('show');
      setTimeout(() => {
        notification.remove();
      }, 300);
    }, 3000);
  }

  function getNotificationIcon(type) {
    const icons = {
      success: 'check-circle-fill',
      error: 'x-circle-fill',
      warning: 'exclamation-triangle-fill',
      info: 'info-circle-fill'
    };
    return icons[type] || icons.info;
  }

  // ========================================
  // PHONE NUMBER FORMATTING
  // ========================================
  
  const phoneInput = document.getElementById('customerPhone');
  
  phoneInput?.addEventListener('input', function(e) {
    // Only allow numbers
    this.value = this.value.replace(/[^0-9]/g, '');
    
    // Limit to 13 digits
    if (this.value.length > 13) {
      this.value = this.value.substring(0, 13);
    }
  });

  // ========================================
  // SCROLL ANIMATIONS
  // ========================================
  
  const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
  };

  const observer = new IntersectionObserver(function(entries) {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.style.opacity = '1';
        entry.target.style.transform = 'translateY(0)';
      }
    });
  }, observerOptions);

  // Observe elements for scroll animation
  document.querySelectorAll('.console-card, .game-card, .faq-item').forEach(el => {
    el.style.opacity = '0';
    el.style.transform = 'translateY(30px)';
    el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
    observer.observe(el);
  });

  // ========================================
  // CONSOLE CARD HOVER EFFECTS
  // ========================================
  
  const consoleCards = document.querySelectorAll('.console-card');
  
  consoleCards.forEach(card => {
    card.addEventListener('mouseenter', function() {
      this.style.zIndex = '10';
    });
    
    card.addEventListener('mouseleave', function() {
      this.style.zIndex = '1';
    });
  });

  // ========================================
  // SMOOTH SCROLL TO SECTION
  // ========================================
  
  window.scrollToRental = function() {
    const rentalSection = document.querySelector('.console-selection-section');
    if (rentalSection) {
      rentalSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
  };

  // ========================================
  // DATE INPUT - Disable past dates
  // ========================================
  
  const dateInput = document.getElementById('bookingDate');
  if (dateInput) {
    const today = new Date().toISOString().split('T')[0];
    dateInput.setAttribute('min', today);
  }

  // ========================================
  // ANALYTICS & TRACKING (Optional)
  // ========================================
  
  function trackBookingEvent(eventName, data) {
    // Integrate with your analytics system
    if (typeof gtag !== 'undefined') {
      gtag('event', eventName, data);
    }
    
    console.log('Tracking:', eventName, data);
  }

  // Track console selection
  consoleSelectButtons.forEach(button => {
    button.addEventListener('click', function() {
      trackBookingEvent('console_selected', {
        console_type: this.getAttribute('data-console-type')
      });
    });
  });

  // Track form submission
  bookingForm?.addEventListener('submit', function() {
    trackBookingEvent('booking_submitted', {
      console: bookingData.console,
      package: bookingData.package,
      price: bookingData.price
    });
  });

});

// ========================================
// NOTIFICATION STYLES (Add to CSS or inline)
// ========================================

const notificationStyles = `
  <style>
    .rental-notification {
      position: fixed;
      top: 20px;
      right: 20px;
      background: rgba(255, 255, 255, 0.95);
      padding: 1rem 1.5rem;
      border-radius: 12px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
      z-index: 99999;
      transform: translateX(400px);
      transition: transform 0.3s ease;
      max-width: 350px;
    }

    .rental-notification.show {
      transform: translateX(0);
    }

    .notification-content {
      display: flex;
      align-items: center;
      gap: 0.75rem;
      color: #1e293b;
      font-weight: 600;
    }

    .notification-content i {
      font-size: 1.25rem;
    }

    .rental-notification-success {
      background: linear-gradient(135deg, #10b981, #059669);
      color: white;
    }

    .rental-notification-success .notification-content {
      color: white;
    }

    .rental-notification-error {
      background: linear-gradient(135deg, #ef4444, #dc2626);
      color: white;
    }

    .rental-notification-error .notification-content {
      color: white;
    }

    .rental-notification-warning {
      background: linear-gradient(135deg, #f59e0b, #d97706);
      color: white;
    }

    .rental-notification-warning .notification-content {
      color: white;
    }

    @keyframes shake {
      0%, 100% { transform: translateX(0); }
      25% { transform: translateX(-10px); }
      75% { transform: translateX(10px); }
    }

    @media (max-width: 768px) {
      .rental-notification {
        right: 10px;
        left: 10px;
        max-width: calc(100% - 20px);
      }
    }
  </style>
`;

// Inject notification styles
document.head.insertAdjacentHTML('beforeend', notificationStyles);
